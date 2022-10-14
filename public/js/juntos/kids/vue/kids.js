Vue.directive('select2', {
    inserted(el) {
        $(el).on('select2:select', () => {
            const event = new Event('change', { bubbles: true, cancelable: true });
            el.dispatchEvent(event);
        });

        $(el).on('select2:unselect', () => {
            const event = new Event('change', {bubbles: true, cancelable: true})
            el.dispatchEvent(event)
        })
    },
});

const appRecienNacidos = new Vue({
    delimiters: ['[[', ']]'],
    el: '#appKids',
    data: {
        errors: [],
        lists: [],
        total: 0,
        listProvinces: [],
        listDistricts: {},
        red: '',
        distrito: '',
        anio: '',

        anioGrafCred: 'TODOS',
        anioTableRn: 'TODOS',
        lisTableResumRn: [],
        anioTableCredMes: 'TODOS',
        lisTableResumCredMes: [],
        anioTableCred12: 'TODOS',
        lisTableResumCred12: [],
        anioTablePaquete: 'TODOS',
        lisTableResumPaquete: [],

        anioGrafSuple: 'TODOS',
        anioTableSuple45: 'TODOS',
        lisTabResumSuple45: [],
        anioTableSuple611: 'TODOS',
        lisTabResumSuple611: [],

    },
    created: function() {
        this.filtersProv();
        this.listTotal();
        // para controles creds
        this.grafChildsCred();
        this.grafChildsSuple();
    },
    methods: {
        filtersProv: function() {
            axios.post('provinces')
            .then(respuesta => {
                this.listProvinces = respuesta.data;
                this.listProvinces.push({'Departamento': 'TODOS', 'Provincia': 'TODOS'})
                setTimeout(() => $('.show-tick').selectpicker('refresh'));

            }).catch(e => {
                this.errors.push(e)
            })
        },

        filtersDistricts() {
            console.log(this.red);
            this.listDistricts = [];
            axios({
                method: 'POST',
                url: 'districts',
                data: { "id": this.red },
            })
            .then(respuesta => {
                this.listDistricts = respuesta.data;
                this.listDistricts.push({'Departamento': 'TODOS', 'Provincia': 'TODOS', 'Distrito': 'TODOS'});
                setTimeout(() => $('.show-tick').selectpicker('refresh'));

            }).catch(e => {
                this.errors.push(e)
            })
        },

        listTotal: function() {
            axios.post('juntkids/list')
            .then(respuesta => {
                this.total = respuesta.data;

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintNominal: function(){
            const formData = $("#formulario").serialize();
            if (this.red == '') { toastr.error('Seleccione una Red', null, { "closeButton": true, "progressBar": true }); }
            else if (this.distrito == '') { toastr.error('Seleccione un Distrito', null, { "closeButton": true, "progressBar": true }); }
            else if (this.anio == '') { toastr.error('Seleccione un Año', null, { "closeButton": true, "progressBar": true }); }
            else{
                url_ = window.location.origin + window.location.pathname + '/print?' + formData;
                window.open(url_,'_blank');
            }
        },

        // PARA GRAFICAS DE CONTROLES CRED
        grafChildsCred: function(){
            if(this.anioGrafCred == '-'){ this.anioGrafCred = 'TODOS'; }
            axios({
                method: 'POST',
                url: 'juntkids/grafCred',
                data: { "id": this.anioGrafCred },
            })
            .then(respuesta => {
                $('#myChartCred').remove();
                $('.barChartCred').append("<canvas id='myChartCred'></canvas>");
                var CredRn = respuesta.data[1][0];
                var CredMes = respuesta.data[2][0];
                var Cred12 = respuesta.data[3][0];
                var areaChartData = {
                    labels  : ['Rn Nac', '< 1 Año', '1-2 Años'],
                    datasets: [
                        {
                            label: 'Juntos',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            pointRadius: false,
                            data: [CredRn.AVANCE_JUNT, CredMes.AVANCE_JUNT, Cred12.AVANCE_JUNT]
                        },
                        {
                            label: 'HisMinsa',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            pointRadius: false,
                            data: [CredRn.AVANCE_HIS, CredMes.AVANCE_HIS, Cred12.AVANCE_HIS]
                        },
                    ]
                }

                var barChartCanvas = $('#myChartCred').get(0).getContext('2d');
                var barChartData = $.extend(true, {}, areaChartData);
                new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                })

            }).catch(e => {
                this.errors.push(e)
            })
        },

        grafChildsPackage: function(){
            if ($('#paqueteCreds').is(':checked') ) {
                axios({
                    method: 'POST',
                    url: 'juntkids/grafCred',
                    data: { "id": this.anioGrafCred },
                })
                .then(respuesta => {
                    $('#myChartCred').remove();
                    $('.barChartCred').append("<canvas id='myChartCred'></canvas>");
                    var package = respuesta.data[0][0];
                    const paqueteJunt = ((package.AVANCE_JUNTOS / package.DENOMINADOR)*100).toFixed(1);
                    const paqueteHis = ((package.AVANCE_HIS / package.DENOMINADOR)*100).toFixed(1);
                    var areaChartData = {
                        labels  : ['Paquete'],
                        datasets: [
                            {
                                label: 'Juntos',
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                pointRadius: false,
                                data: [ paqueteJunt ]
                            },
                            {
                                label: 'HisMinsa',
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                pointRadius: false,
                                data: [ paqueteHis ]
                            },
                        ]
                    }

                    var barChartCanvas = $('#myChartCred').get(0).getContext('2d');
                    var barChartData = $.extend(true, {}, areaChartData);
                    new Chart(barChartCanvas, {
                        type: 'bar',
                        data: barChartData,
                        options: barChartOptions
                    })
                }).catch(e => {
                    this.errors.push(e)
                })
            }
            else{
                this.grafChildsCred();
            }
        },

        tableResumRn: function(){
            axios({
                method: 'POST',
                url: 'juntkids/tableResumCred',
                data: { "id": this.anioTableRn, "type": "rn" },
            })
            .then(response => {
                console.log(response.data);
                this.lisTableResumRn = response.data[0];

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintRn: function(){
            const formData = $("#formRn").serialize();
            url_ = window.location.origin + window.location.pathname + '/printRn?' + formData;
            window.open(url_,'_blank');
        },

        tableResumCredMes: function(){
            axios({
                method: 'POST',
                url: 'juntkids/tableResumCred',
                data: { "id": this.anioTableCredMes, "type": "credMes" },
            })
            .then(response => {
                console.log(response.data);
                this.lisTableResumCredMes = response.data[1];

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintCredMes: function(){
            const formData = $("#formCredMes").serialize();
            url_ = window.location.origin + window.location.pathname + '/printCredMes?' + formData;
            window.open(url_,'_blank');
        },

        tableResumCred12: function(){
            console.log(this.anioTableCred12);
            axios({
                method: 'POST',
                url: 'juntkids/tableResumCred',
                data: { "id": this.anioTableCred12, "type": "cred12" },
            })
            .then(response => {
                console.log(response.data);
                this.lisTableResumCred12 = response.data[2];

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintCred12: function(){
            const formData = $("#formCred12").serialize();
            url_ = window.location.origin + window.location.pathname + '/printCred12?' + formData;
            window.open(url_,'_blank');
        },

        tableResumPaquete: function(){
            console.log(this.anioTablePaquete);
            axios({
                method: 'POST',
                url: 'juntkids/tableResumCred',
                data: { "id": this.anioTablePaquete, "type": "paquete" },
            })
            .then(response => {
                this.lisTableResumPaquete = response.data[3];
                for(i=0;i<this.lisTableResumPaquete.length;i++){
                    this.lisTableResumPaquete[i].AVAN_JUNT = ((this.lisTableResumPaquete[i].NUM_JUNTOS / this.lisTableResumPaquete[i].DENOMINADOR)*100).toFixed(1);
                    this.lisTableResumPaquete[i].AVAN_HIS = ((this.lisTableResumPaquete[i].NUM_HIS / this.lisTableResumPaquete[i].DENOMINADOR)*100).toFixed(1);
                }
                console.log(this.lisTableResumPaquete);
             

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintPaquete: function(){
            const formData = $("#formPaquete").serialize();
            url_ = window.location.origin + window.location.pathname + '/printPaquete?' + formData;
            window.open(url_,'_blank');
        },

        // PARA GRAFICAS DE SUPLEMENTACIONES
        grafChildsSuple: function(){
            if(this.anioGrafSuple == '-'){ this.anioGrafSuple = 'TODOS'; }
            axios({
                method: 'POST',
                url: 'juntkids/grafSuple',
                data: { "id": this.anioGrafSuple },
            })
            .then(respuesta => {
                $('#myChartSuple').remove();
                $('.barChartSuple').append("<canvas id='myChartSuple'></canvas>");
                var Suple45 = respuesta.data[0][0];
                var Suple611 = respuesta.data[1][0];
                var Suple12 = respuesta.data[2][0];
                var areaChartData = {
                    labels  : ['4-5 Meses', '6-11 Meses', '1-2 Años'],
                    datasets: [
                        {
                            label: 'Juntos',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            pointRadius: false,
                            data: [Suple45.AVANCE_JUNT, Suple611.AVANCE_JUNT, Suple12.AVANCE_JUNT]
                        },
                        {
                            label: 'HisMinsa',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            pointRadius: false,
                            data: [Suple45.AVANCE_HIS, Suple611.AVANCE_HIS, Suple12.AVANCE_HIS]
                        },
                    ]
                }

                var barChartCanvas = $('#myChartSuple').get(0).getContext('2d');
                var barChartData = $.extend(true, {}, areaChartData);
                new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                })

            }).catch(e => {
                this.errors.push(e)
            })
        },

        tableResumSuple45: function(){
            axios({
                method: 'POST',
                url: 'juntkids/tableResumSuple',
                data: { "id": this.anioTableSuple45, "type": "s45" },
            })
            .then(response => {
                console.log(response.data);
                this.lisTabResumSuple45 = response.data[0];

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintSuple45: function(){
            const formData = $("#formSuple45").serialize();
            url_ = window.location.origin + window.location.pathname + '/printSuple5?' + formData;
            window.open(url_,'_blank');
        },

        tableResumSuple6_11: function(){
            axios({
                method: 'POST',
                url: 'juntkids/tableResumSuple',
                data: { "id": this.anioTableSuple611, "type": "s611" },
            })
            .then(response => {
                console.log(response.data);
                this.lisTabResumSuple611 = response.data[1];

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintSuple45: function(){
            const formData = $("#formSuple45").serialize();
            url_ = window.location.origin + window.location.pathname + '/printSuple611?' + formData;
            window.open(url_,'_blank');
        },
    }
})
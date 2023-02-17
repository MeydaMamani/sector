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
        anioTableSuple12: 'TODOS',
        lisTabResumSuple12: [],

        anioGrafVaccine: 'TODOS',
        anioTableVacc2M: 'TODOS',
        lisTabResumVacc2M: [],
        anioTableVacc4M: 'TODOS',
        lisTabResumVacc4M: [],
        anioTableVacc6M: 'TODOS',
        lisTabResumVacc6M: [],

        anioGrafTmz: 'TODOS',
        anioTableTmz6M: 'TODOS',
        lisTabResumTmz6M: [],
        anioTableTmz12M: 'TODOS',
        lisTabResumTmz12M: [],
        anioTableTmz18M: 'TODOS',
        lisTabResumTmz18M: [],
    },
    created: function() {
        this.filtersProv();
        this.listTotal();
        // para controles creds
        this.grafChildsCred();
        this.grafChildsSuple();
        this.grafChildsVaccine();
        this.grafChildsTmz();

        this.grafPack();
        this.grafPackMonth();
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
                this.lisTableResumRn = response.data[0];
                this.red = '';

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
                this.lisTableResumCredMes = response.data[1];
                this.red = '';

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
            axios({
                method: 'POST',
                url: 'juntkids/tableResumCred',
                data: { "id": this.anioTableCred12, "type": "cred12" },
            })
            .then(response => {
                this.lisTableResumCred12 = response.data[2];
                this.red = '';

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
            axios({
                method: 'POST',
                url: 'juntkids/tableResumCred',
                data: { "id": this.anioTablePaquete, "type": "paquete" },
            })
            .then(response => {
                this.red = '';
                this.lisTableResumPaquete = response.data[3];
                for(i=0;i<this.lisTableResumPaquete.length;i++){
                    this.lisTableResumPaquete[i].AVAN_JUNT = ((this.lisTableResumPaquete[i].NUM_JUNTOS / this.lisTableResumPaquete[i].DENOMINADOR)*100).toFixed(1);
                    this.lisTableResumPaquete[i].AVAN_HIS = ((this.lisTableResumPaquete[i].NUM_HIS / this.lisTableResumPaquete[i].DENOMINADOR)*100).toFixed(1);
                }

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
                this.lisTabResumSuple45 = response.data[0];
                this.red = '';

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
                this.lisTabResumSuple611 = response.data[1];
                this.red = '';

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintSuple6_11: function(){
            const formData = $("#formSuple6_11").serialize();
            url_ = window.location.origin + window.location.pathname + '/printSuple611?' + formData;
            window.open(url_,'_blank');
        },

        tableResumSuple1_2: function(){
            axios({
                method: 'POST',
                url: 'juntkids/tableResumSuple',
                data: { "id": this.anioTableSuple12, "type": "s12" },
            })
            .then(response => {
                this.lisTabResumSuple12 = response.data[2];
                this.red = '';

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintSuple1_2: function(){
            const formData = $("#formSuple12").serialize();
            url_ = window.location.origin + window.location.pathname + '/printSuple12?' + formData;
            window.open(url_,'_blank');
        },

        // PARA GRAFICAS DE VACUNAS
        grafChildsVaccine: function(){
            if(this.anioGrafVaccine == '-'){ this.anioGrafVaccine = 'TODOS'; }
            axios({
                method: 'POST',
                url: 'juntkids/grafVaccine',
                data: { "id": this.anioGrafVaccine },
            })
            .then(respuesta => {
                $('#myChartVaccine').remove();
                $('.barChartVaccine').append("<canvas id='myChartVaccine'></canvas>");
                var Vaccine2M = respuesta.data[0][0];
                var Vaccine4M = respuesta.data[1][0];
                var Vaccine6M = respuesta.data[2][0];
                var areaChartData = {
                    labels  : ['2 Meses', '4 Meses', '6 Meses'],
                    datasets: [
                        {
                            label: 'Juntos',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            pointRadius: false,
                            data: [ Vaccine2M.AVANCE_JUNT, Vaccine4M.AVANCE_JUNT, Vaccine6M.AVANCE_JUNT ]
                        },
                        {
                            label: 'HisMinsa',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            pointRadius: false,
                            data: [ Vaccine2M.AVANCE_HIS, Vaccine4M.AVANCE_HIS, Vaccine6M.AVANCE_HIS ]
                        },
                    ]
                }

                var barChartCanvas = $('#myChartVaccine').get(0).getContext('2d');
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

        tableResumVacc2M: function(){
            axios({
                method: 'POST',
                url: 'juntkids/tableResumVaccine',
                data: { "id": this.anioTableVacc2M, "type": "v2m" },
            })
            .then(response => {
                this.lisTabResumVacc2M = response.data[0];
                this.red = '';

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintVaccine2M: function(){
            const formData = $("#formVaccine2M").serialize();
            url_ = window.location.origin + window.location.pathname + '/printVaccine2M?' + formData;
            window.open(url_,'_blank');
        },

        tableResumVacc4M: function(){
            axios({
                method: 'POST',
                url: 'juntkids/tableResumVaccine',
                data: { "id": this.anioTableVacc4M, "type": "v4m" },
            })
            .then(response => {
                this.lisTabResumVacc4M = response.data[1];
                this.red = '';

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintVaccine4M: function(){
            const formData = $("#formVaccine4M").serialize();
            url_ = window.location.origin + window.location.pathname + '/printVaccine4M?' + formData;
            window.open(url_,'_blank');
        },

        tableResumVacc6M: function(){
            axios({
                method: 'POST',
                url: 'juntkids/tableResumVaccine',
                data: { "id": this.anioTableVacc6M, "type": "v6m" },
            })
            .then(response => {
                this.lisTabResumVacc6M = response.data[2];
                this.red = '';

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintVaccine6M: function(){
            const formData = $("#formVaccine6M").serialize();
            url_ = window.location.origin + window.location.pathname + '/printVaccine6M?' + formData;
            window.open(url_,'_blank');
        },

        // PARA GRAFICAS DE TAMIZAJES
        grafChildsTmz: function(){
            if(this.anioGrafTmz == '-'){ this.anioGrafTmz = 'TODOS'; }
            axios({
                method: 'POST',
                url: 'juntkids/grafTmz',
                data: { "id": this.anioGrafTmz },
            })
            .then(respuesta => {
                $('#myChartTmz').remove();
                $('.barChartTmz').append("<canvas id='myChartTmz'></canvas>");
                var Tmz6M = respuesta.data[0][0];
                var Tmz12M = respuesta.data[1][0];
                var Tmz18M = respuesta.data[2][0];
                var areaChartData = {
                    labels  : ['6 Meses', '12 Meses', '18 Meses'],
                    datasets: [
                        {
                            label: 'Juntos',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            pointRadius: false,
                            data: [ Tmz6M.AVANCE_JUNT, Tmz12M.AVANCE_JUNT, Tmz18M.AVANCE_JUNT ]
                        },
                        {
                            label: 'HisMinsa',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            pointRadius: false,
                            data: [ Tmz6M.AVANCE_HIS, Tmz12M.AVANCE_HIS, Tmz18M.AVANCE_HIS ]
                        },
                    ]
                }

                var barChartCanvas = $('#myChartTmz').get(0).getContext('2d');
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

        tableResumTmz6M: function(){
            axios({
                method: 'POST',
                url: 'juntkids/tableResumTmz',
                data: { "id": this.anioTableTmz6M, "type": "t6m" },
            })
            .then(response => {
                this.lisTabResumTmz6M = response.data[0];
                this.red = '';

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintTmz6M: function(){
            const formData = $("#formTmz6M").serialize();
            url_ = window.location.origin + window.location.pathname + '/printTmz6M?' + formData;
            window.open(url_,'_blank');
        },

        tableResumTmz12M: function(){
            axios({
                method: 'POST',
                url: 'juntkids/tableResumTmz',
                data: { "id": this.anioTableTmz12M, "type": "t12m" },
            })
            .then(response => {
                this.lisTabResumTmz12M = response.data[1];
                this.red = '';

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintTmz12M: function(){
            const formData = $("#formTmz12M").serialize();
            url_ = window.location.origin + window.location.pathname + '/printTmz12M?' + formData;
            window.open(url_,'_blank');
        },

        tableResumTmz18M: function(){
            axios({
                method: 'POST',
                url: 'juntkids/tableResumTmz',
                data: { "id": this.anioTableTmz18M, "type": "t18m" },
            })
            .then(response => {
                this.lisTabResumTmz18M = response.data[2];
                this.red = '';

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintTmz18M: function(){
            const formData = $("#formTmz18M").serialize();
            url_ = window.location.origin + window.location.pathname + '/printTmz18M?' + formData;
            window.open(url_,'_blank');
        },

        // PARA PAQUETE NINIO OCTUBRE
        grafPack: function(){
            axios({
                method: 'POST',
                url: 'juntkids/graPack',
                data: '',
            })
            .then(respuesta => {
                $('#myChartPack').remove();
                $('.barChartPack').append("<canvas id='myChartPack'></canvas>");
                var data = respuesta.data[0];
                console.log(data);
                var areaChartData = {
                    labels  : ['D. A. C.', 'Oxapampa', 'Pasco'],
                    datasets: [
                        {
                            label: 'HisMinsa',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            pointRadius: false,
                            data: [ data[0].AVANCE, data[1].AVANCE, data[2].AVANCE ]
                        },
                    ]
                }

                var barChartCanvas = $('#myChartPack').get(0).getContext('2d');
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

        PrintPack: function(){
            // const formData = $("#formTmz18M").serialize();
            url_ = window.location.origin + window.location.pathname + '/printPack';
            window.open(url_,'_blank');
        },

        PrintPackObserved: function(){
            // const formData = $("#formTmz18M").serialize();
            url_ = window.location.origin + window.location.pathname + '/printPackObs';
            window.open(url_,'_blank');
        },

        // PARA PAQUETE NINIO POR MESES
        grafPackMonth: function(){
            axios({
                method: 'POST',
                url: 'juntkids/graPackMonth',
                data: '',
            })
            .then(respuesta => {
                $('#myChartPackMonth').remove();
                $('.barChartPackMonth').append("<canvas id='myChartPackMonth'></canvas>");
                var data = respuesta.data[0];
                console.log(data);
                var areaChartData = {
                    labels  : ['Octubre', 'Noviembre', 'Diciembre', 'Enero', 'Febrero'],
                    datasets: [
                        {
                            label: 'HisMinsa',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            pointRadius: false,
                            data: [ data[4].AVANCE, data[3].AVANCE, data[2].AVANCE, data[1].AVANCE, data[0].AVANCE ]
                        },
                    ]
                }

                var barChartCanvas = $('#myChartPackMonth').get(0).getContext('2d');
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

    }
})
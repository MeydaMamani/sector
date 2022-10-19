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
    el: '#appKidsMet4',
    data: {
        errors: [],
        lists: [],
        total: 0,
        listProvinces: [],
        listDistricts: {},
        red: '',
        distrito: '',
        anio: '',
        // PARA CRED
        anioGrafCred: 'TODOS',
        anioTableRn: 'TODOS',
        lisTableResumRn: [],
        anioTableCredMes: 'TODOS',
        lisTableResumCredMes: [],
        anioTableCred12: 'TODOS',
        lisTableResumCred12: [],
        anioTableCredPack: 'TODOS',
        lisTableResumCredPack: [],
        // PARA SUPLEMENTACION
        anioGrafSuple: 'TODOS',
        anioTablSuple45: 'TODOS',
        lisTablResumSuple45: [],
        anioTablSuple611: 'TODOS',
        lisTablResumSuple611: [],
        anioTablSuple12: 'TODOS',
        lisTablResumSuple12: [],
         // PARA VACUNAS
        anioGrafVac: 'TODOS',
        anioTablVac2M: 'TODOS',
        lisTablResumVac2M: [],
        anioTablVac4M: 'TODOS',
        lisTablResumVac4M: [],
        anioTablVac6M: 'TODOS',
        lisTablResumVac6M: [],
        // PARA TAMIZAJE
        anioGrafTmz: 'TODOS',
        anioTableTmz6M: 'TODOS',
        lisTablResumTmz6M: [],
        anioTableTmz12M: 'TODOS',
        lisTablResumTmz12M: [],

        anioGraf6_11m: 'TODOS',
        lisTablResum6_11M: [],
        anioTabl611: 'TODOS',
    },
    created: function() {
        this.filtersProv();
        this.listTotal();
        // para graficas edad en meses
        this.grafChilds6_11m();
        // para controles creds
        this.grafChildsCred();
        this.grafChildsSuple();
        this.grafChildsVaccine();
        this.grafChildsTmz();
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
            axios.post('met4kids/list')
            .then(response => {
                this.total = response.data;

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
            axios({
                method: 'POST',
                url: 'met4kids/grafCred',
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
                            label: 'HisMinsa',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            pointRadius: false,
                            data: [ CredRn.AVANCE_HIS, CredMes.AVANCE_HIS, Cred12.AVANCE_HIS  ]
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

        // grafChildsPackage: function(){
        //     if ($('#paqueteCreds').is(':checked') ) {
        //         axios({
        //             method: 'POST',
        //             url: 'juntkids/grafCred',
        //             data: { "id": this.anioGrafCred },
        //         })
        //         .then(respuesta => {
        //             $('#myChartCred').remove();
        //             $('.barChartCred').append("<canvas id='myChartCred'></canvas>");
        //             var package = respuesta.data[0][0];
        //             const paqueteJunt = ((package.AVANCE_JUNTOS / package.DENOMINADOR)*100).toFixed(1);
        //             const paqueteHis = ((package.AVANCE_HIS / package.DENOMINADOR)*100).toFixed(1);
        //             var areaChartData = {
        //                 labels  : ['Paquete'],
        //                 datasets: [
        //                     {
        //                         label: 'Juntos',
        //                         backgroundColor: 'rgba(255, 99, 132, 0.2)',
        //                         pointRadius: false,
        //                         data: [ paqueteJunt ]
        //                     },
        //                     {
        //                         label: 'HisMinsa',
        //                         backgroundColor: 'rgba(54, 162, 235, 0.2)',
        //                         pointRadius: false,
        //                         data: [ paqueteHis ]
        //                     },
        //                 ]
        //             }

        //             var barChartCanvas = $('#myChartCred').get(0).getContext('2d');
        //             var barChartData = $.extend(true, {}, areaChartData);
        //             new Chart(barChartCanvas, {
        //                 type: 'bar',
        //                 data: barChartData,
        //                 options: barChartOptions
        //             })
        //         }).catch(e => {
        //             this.errors.push(e)
        //         })
        //     }
        //     else{
        //         this.grafChildsCred();
        //     }
        // },

        tableResumRn: function(){
            axios({
                method: 'POST',
                url: 'met4kids/tableResumCred',
                data: { "id": this.anioTableRn, "type": "rn" },
            })
            .then(response => {
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
                url: 'met4kids/tableResumCred',
                data: { "id": this.anioTableCredMes, "type": "credMes" },
            })
            .then(response => {
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
            axios({
                method: 'POST',
                url: 'met4kids/tableResumCred',
                data: { "id": this.anioTableCred12, "type": "cred12" },
            })
            .then(response => {
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

        tableResumCredPack: function(){
            axios({
                method: 'POST',
                url: 'met4kids/tableResumCred',
                data: { "id": this.anioTableCredPack, "type": "credPack" },
            })
            .then(response => {
                this.lisTableResumCredPack = response.data[0];

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintCred12: function(){
            const formData = $("#formCred12").serialize();
            url_ = window.location.origin + window.location.pathname + '/printCred12?' + formData;
            window.open(url_,'_blank');
        },

        // PARA SUPLEMENTACION
        grafChildsSuple: function(){
            console.log(this.anioGrafSuple);
            axios({
                method: 'POST',
                url: 'met4kids/grafSuple',
                data: { "id": this.anioGrafSuple },
            })
            .then(respuesta => {
                $('#myChartSuple').remove();
                $('.barChartSuple').append("<canvas id='myChartSuple'></canvas>");
                var suple45 = respuesta.data[0][0];
                var suple611 = respuesta.data[1][0];
                var suple12 = respuesta.data[2][0];
                var areaChartData = {
                    labels  : ['4-5 Meses', '6-11 Meses', '1-2 Años'],
                    datasets: [
                        {
                            label: 'HisMinsa',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            pointRadius: false,
                            data: [ suple45.AVANCE_HIS, suple611.AVANCE_HIS, suple12.AVANCE_HIS ]
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
                url: 'met4kids/tableResumSuple',
                data: { "id": this.anioTablSuple45, "type": "s45" },
            })
            .then(response => {
                this.lisTablResumSuple45 = response.data[0];
                console.log(this.lisTablResumSuple45);

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintSuple45: function(){
            const formData = $("#formSuple45").serialize();
            url_ = window.location.origin + window.location.pathname + '/printSuple45?' + formData;
            window.open(url_,'_blank');
        },

        tableResumSuple611: function(){
            axios({
                method: 'POST',
                url: 'met4kids/tableResumSuple',
                data: { "id": this.anioTablSuple611, "type": "s611" },
            })
            .then(response => {
                this.lisTablResumSuple611 = response.data[1];
                console.log(this.lisTablResumSuple611);

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintSuple611: function(){
            const formData = $("#formSuple611").serialize();
            url_ = window.location.origin + window.location.pathname + '/printSuple611?' + formData;
            window.open(url_,'_blank');
        },

        tableResumSuple12: function(){
            axios({
                method: 'POST',
                url: 'met4kids/tableResumSuple',
                data: { "id": this.anioTablSuple12, "type": "s12" },
            })
            .then(response => {
                this.lisTablResumSuple12 = response.data[2];

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintSuple12: function(){
            const formData = $("#formSuple12").serialize();
            url_ = window.location.origin + window.location.pathname + '/printSuple12?' + formData;
            window.open(url_,'_blank');
        },

        // PARA VACUNAS
        grafChildsVaccine: function(){
            console.log(this.anioGrafVac);
            axios({
                method: 'POST',
                url: 'met4kids/grafVaccine',
                data: { "id": this.anioGrafVac },
            })
            .then(respuesta => {
                $('#myChartVaccine').remove();
                $('.barChartVaccine').append("<canvas id='myChartVaccine'></canvas>");
                var vaccine2M = respuesta.data[0][0];
                var vaccine4M = respuesta.data[1][0];
                var vaccine6M = respuesta.data[2][0];
                var areaChartData = {
                    labels  : ['2 Meses', '4 Meses', '6 Meses'],
                    datasets: [
                        {
                            label: 'HisMinsa',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            pointRadius: false,
                            data: [ vaccine2M.AVANCE_HIS, vaccine4M.AVANCE_HIS, vaccine6M.AVANCE_HIS ]
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

        tableResumVac2M: function(){
            console.log(this.anioTablVac2M);
            axios({
                method: 'POST',
                url: 'met4kids/tableResumVac',
                data: { "id": this.anioTablVac2M, "type": "v2m" },
            })
            .then(response => {
                this.lisTablResumVac2M = response.data[0];

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintVac2M: function(){
            const formData = $("#formVaccine2M").serialize();
            url_ = window.location.origin + window.location.pathname + '/printVac12?' + formData;
            window.open(url_,'_blank');
        },

        tableResumVac4M: function(){
            console.log(this.anioTablVac4M);
            axios({
                method: 'POST',
                url: 'met4kids/tableResumVac',
                data: { "id": this.anioTablVac4M, "type": "v4m" },
            })
            .then(response => {
                this.lisTablResumVac4M = response.data[1];

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintVac4M: function(){
            const formData = $("#formVaccine4M").serialize();
            url_ = window.location.origin + window.location.pathname + '/printVac4?' + formData;
            window.open(url_,'_blank');
        },

        tableResumVac6M: function(){
            console.log(this.anioTablVac6M);
            axios({
                method: 'POST',
                url: 'met4kids/tableResumVac',
                data: { "id": this.anioTablVac6M, "type": "v6m" },
            })
            .then(response => {
                this.lisTablResumVac6M = response.data[2];

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintVac6M: function(){
            const formData = $("#formVaccine6M").serialize();
            url_ = window.location.origin + window.location.pathname + '/printVac6?' + formData;
            window.open(url_,'_blank');
        },

        // PARA TAMIZAJE
        grafChildsTmz: function(){
            console.log(this.anioGrafTmz);
            axios({
                method: 'POST',
                url: 'met4kids/grafTmz',
                data: { "id": this.anioGrafTmz },
            })
            .then(respuesta => {
                $('#myChartTmz').remove();
                $('.barChartTmz').append("<canvas id='myChartTmz'></canvas>");
                var Tmz6M = respuesta.data[0][0];
                console.log(Tmz6M);
                var Tmz12M = respuesta.data[1][0];
                var Tmz18M = respuesta.data[2][0];
                var areaChartData = {
                    labels  : ['6 Meses', '12 Meses', '18 Meses'],
                    datasets: [
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
            console.log(this.anioTableTmz6M);
            axios({
                method: 'POST',
                url: 'met4kids/tableResumTmz',
                data: { "id": this.anioTableTmz6M, "type": "tmz6" },
            })
            .then(response => {
                    console.log(response.data);
                this.lisTablResumTmz6M = response.data[0];

            }).catch(e => {
                this.errors.push(e)
            })
        },

        tableResumTmz12M: function(){
            console.log(this.anioTableTmz12M);
            axios({
                method: 'POST',
                url: 'met4kids/tableResumTmz',
                data: { "id": this.anioTableTmz12M, "type": "tmz12" },
            })
            .then(response => {
                    console.log(response.data);
                this.lisTablResumTmz12M = response.data[1];

            }).catch(e => {
                this.errors.push(e)
            })
        },


        tableResumTmz18M: function(){
            console.log(this.anioTableTmz18M);
            axios({
                method: 'POST',
                url: 'met4kids/tableResumTmz',
                data: { "id": this.anioTableTmz18M, "type": "tmz18" },
            })
            .then(response => {
                    console.log(response.data);
                this.lisTablResumTmz18M = response.data[2];

            }).catch(e => {
                this.errors.push(e)
            })
        },

        // PARA GRAFICAS DE CONTROLES CRED
        grafChilds6_11m: function(){
            axios({
                method: 'POST',
                url: 'met4kids/graf6_11m',
                data: { "id": this.anioGrafCred },
            })
            .then(respuesta => {
                $('#myChart6_11m').remove();
                $('.barChart6_11m').append("<canvas id='myChart6_11m'></canvas>");
                var CredRn = respuesta.data[0][0];
                console.log(CredRn);
                var areaChartData = {
                    labels  : ['Paquete'],
                    datasets: [
                        {
                            label: 'HisMinsa',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            pointRadius: false,
                            data: [ CredRn.AVANCE_HIS  ]
                        },
                    ]
                }

                var barChartCanvas = $('#myChart6_11m').get(0).getContext('2d');
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

        tableResum6_11M: function(){
            axios({
                method: 'POST',
                url: 'met4kids/tableResum6_11',
                data: { "id": this.anioTabl611, "type": "6_11" },
            })
            .then(response => {
                    console.log(response.data);
                this.lisTablResum6_11M = response.data[0];

            }).catch(e => {
                this.errors.push(e)
            })
        },

        Print611: function(){
            const formData = $("#form611").serialize();
            url_ = window.location.origin + window.location.pathname + '/print611?' + formData;
            window.open(url_,'_blank');
        },
    }
})
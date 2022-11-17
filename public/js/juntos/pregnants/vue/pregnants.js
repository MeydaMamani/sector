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

        lisTabResumEA: [],
        lisTabResumAP: [],
    },

    created: function() {
        this.filtersProv();
        this.listTotal();
        this.grafPregnantsEA();
        this.grafPregnantsAP();
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
            axios.post('juntpregnants/list')
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
            else{
                url_ = window.location.origin + window.location.pathname + '/print?' + formData;
                window.open(url_,'_blank');
            }
        },

        // PARA EXAMENES AUXILIARES
        grafPregnantsEA: function(){
            axios({
                method: 'POST',
                url: 'juntpregnants/grafEA',
                data: '',
            })
            .then(respuesta => {
                $('#myChartEA').remove();
                $('.barChartEA').append("<canvas id='myChartEA'></canvas>");
                var bateria = respuesta.data[0];
                var areaChartData = {
                    labels  : ['Exámenes Auxiliares'],
                    datasets: [
                        {
                            label: 'Juntos',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            pointRadius: false,
                            data: [ bateria.AVANCE_JUNT ]
                        },
                        {
                            label: 'HisMinsa',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            pointRadius: false,
                            data: [ bateria.AVANCE_HIS]
                        },
                    ]
                }

                var barChartCanvas = $('#myChartEA').get(0).getContext('2d');
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

        tableResumEA: function(){
            axios({
                method: 'POST',
                url: 'juntpregnants/tableResum',
                data: { "type": "examAux" },
            })
            .then(response => {
                this.lisTabResumEA = response.data[0];
                this.red = '';

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintEA: function(){
            const formData = $("#formEA").serialize();
            url_ = window.location.origin + window.location.pathname + '/printEA?' + formData;
            window.open(url_,'_blank');
        },

        // PARA ATENCIONES PRENATALES
        grafPregnantsAP: function(){
            axios({
                method: 'POST',
                url: 'juntpregnants/grafAPN',
                data: '',
            })
            .then(respuesta => {
                $('#myChartAP').remove();
                $('.barChartAP').append("<canvas id='myChartAP'></canvas>");
                var apn = respuesta.data[0];

                var areaChartData = {
                    labels  : ['Atenciones Prenatales'],
                    datasets: [
                        {
                            label: 'Juntos',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            pointRadius: false,
                            data: [ apn.AVANCE_JUNT ]
                        },
                        {
                            label: 'HisMinsa',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            pointRadius: false,
                            data: [ apn.AVANCE_HIS]
                        },
                    ]
                }

                var barChartCanvas = $('#myChartAP').get(0).getContext('2d');
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

        tableResumAP: function(){
            axios({
                method: 'POST',
                url: 'juntpregnants/tableResum',
                data: { "type": "apn" },
            })
            .then(response => {
                this.lisTabResumAP = response.data[1];
                this.red = '';

            }).catch(e => {
                this.errors.push(e)
            })
        },

        PrintAP: function(){
            const formData = $("#formAP").serialize();
            url_ = window.location.origin + window.location.pathname + '/printAPN?' + formData;
            window.open(url_,'_blank');
        },
    }
})
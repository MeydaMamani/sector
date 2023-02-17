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
    el: '#appKidsCuna',
    data: {
        errors: [],
        lists: [],
        total: 0,
        listProvinces: [],
        listDistricts: {},
        red: '',
        distrito: '',
        anio: '',
    },
    created: function() {
        this.filtersProv();
        this.listTotal();
        // para controles creds
        this.grafPack();
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
            axios.post('cunaSaf/list')
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

        // PARA PAQUETE NINIO OCTUBRE
        grafPack: function(){
            axios({
                method: 'POST',
                url: 'cunaSaf/graPack',
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
    }
})
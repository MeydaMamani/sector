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

const appPrematuros = new Vue({
    delimiters: ['[[', ']]'],
    el: '#appPremature',
    data: {
        errors: [],
        lists: [],
        listsResum: [],
        total: 0,
        suplementado: 0,
        no_suplementado: 0,
        avance: 0,
        advanceReg: [],
        provinces: [],
        districts: {},
        date_pn: '',
        date_cnv: '',
        red: '',
        distrito: '',
        anio: '',
        mes: '',
        nameMonth: '',
        nameYear: '',
    },
    created: function() {
        this.filtersProv();
        this.datePn();
        this.listActually();
    },
    methods: {
        filtersProv: function() {
            axios.post('provinces')
            .then(respuesta => {
                this.provinces = respuesta.data;
                setTimeout(() => $('.show-tick').selectpicker('refresh'));

            }).catch(e => {
                this.errors.push(e)
            })
        },

        datePn: function() {
            axios.post('pn')
            .then(respuesta => {
                this.date_pn = respuesta.data[0].DATE_MODIFY;
                getDate = new Date();
                days=(getDate.getUTCDay()-1)*(-1);
                getDate.setDate(getDate.getDate() + days);
                this.date_cnv = getDate.toISOString().split('T')[0];

                setTimeout(() => $('.show-tick').selectpicker('refresh'));

            }).catch(e => {
                this.errors.push(e)
            })
        },

        filtersDistricts() {
            this.districts = [];
            axios({
                method: 'POST',
                url: 'districts',
                data: { "id": this.red },
            })
            .then(respuesta => {
                this.districts = respuesta.data;
                setTimeout(() => $('.show-tick').selectpicker('refresh'));

            }).catch(e => {
                this.errors.push(e)
            })
        },

        listActually: function() {
            const getDate = new Date();
            const currentData = { "red": "TODOS", "distrito": "TODOS", "anio": getDate.getFullYear(), "mes": getDate.getMonth()+1 }
            axios({
                method: 'POST',
                url: 'premature/list',
                data: currentData,
            })
            .then(response => {
                this.getData(response.data[0], response.data[1], response.data[2]);

                this.nameYear = getDate.getFullYear();
                this.nameMonth = new Intl.DateTimeFormat('es-PE', { month: 'long'}).format( getDate.setMonth(getDate.getMonth()));

            }).catch(e => {
                this.errors.push(e)
            })
        },

        listPremature: function() {
            const formData = $("#formulario").serialize();
            if (this.red == '') { toastr.error('Seleccione una Red', null, { "closeButton": true, "progressBar": true }); }
            else if (this.distrito == '') { toastr.error('Seleccione un Distrito', null, { "closeButton": true, "progressBar": true }); }
            else if (this.anio == '') { toastr.error('Seleccione un Año', null, { "closeButton": true, "progressBar": true }); }
            else if (this.mes == '') { toastr.error('Seleccione un Mes', null, { "closeButton": true, "progressBar": true }); }
            else{
                axios({
                    method: 'POST',
                    url: 'premature/list',
                    data: formData,
                })
                .then(response => {
                    this.getData(response.data[0], response.data[1], response.data[2]);
                    this.nameYear = this.anio;
                    const getDate = new Date();
                    this.nameMonth = new Intl.DateTimeFormat('es-PE', { month: 'long'}).format( getDate.setMonth(this.mes-1));

                }).catch(e => {
                    this.errors.push(e)
                })
            }
        },

        getData(data1, data2, data3){
            $(".nominalTable").removeAttr("id");
            $(".nominalTable").attr("id","prematuro");
            this.suplementado=0; this.no_suplementado=0; this.total=0;
            this.lists = data1;
            this.listsResum = data2;
            this.advanceReg = data3;
            for (let i = 0; i < this.lists.length; i++) {
                this.total++;
                this.lists[i].SUPLEMENTADO == 'SI' ? this.suplementado++ : this.no_suplementado++;
            }

            for (let j = 0; j < this.listsResum.length; j++) {
                var avance = (this.listsResum[j].NUMERADOR/this.listsResum[j].DENOMINADOR)*100;
                avance % 1 != 0 ? this.listsResum[j].AVANCE = avance.toFixed(1) : this.listsResum[j].AVANCE = avance;
            }

            for (let k = 0; k < this.advanceReg.length; k++) {
                var a = (this.advanceReg[k].NUM/this.advanceReg[k].DEN)*100;
                a % 1 != 0 ? this.advanceReg[k].ADVANCE = a.toFixed(1) : this.advanceReg[k].ADVANCE = a;
            }

            this.avance = ((this.suplementado / this.total) * 100).toFixed(1);
            $('.knob').val(this.avance + '%').trigger('change');
            $('.footable-page a').filter('[data-page="0"]').trigger('click');
        },

        viewAll: function(){
            this.red == '' && this.distrito == '' && this.anio == '' && this.mes == '' ? this.listActually() : this.listPremature();
        },

        listNoSuple() {
            $(".nominalTable").removeAttr("id");
            $(".nominalTable").attr("id","no_cumplen");
            this.listNoSuplement = [];
            for (let i = 0; i < this.lists.length; i++) {
                if(this.lists[i].SUPLEMENTADO == 'NO'){
                    this.listNoSuplement.push(this.lists[i]);
                }
            }
            this.lists = this.listNoSuplement;
            setTimeout(() => {
                $('.footable-page a').filter('[data-page="0"]').trigger('click')
            }, "100");
            // $('#demo-foo-addrow2').footable();
            // $('#demo-foo-addrow2').data('footable').redraw();
            // $('#demo-foo-filtering').data('footable').redraw();
            // $('#demo-foo-filtering').footable();
            // $('#demo-foo-addrow2').footable();
            // $('.table').footable();
        },

        PrintNominal: function(){
            var red = $('#red').val();
            var dist = $('#distrito').val();
            var anio = $('#anio').val();
            var mes = $('#mes').val();

            const getDate = new Date();
            red == '' ? red = "TODOS" : red;    dist == '' ? dist = "TODOS" : dist;
            anio == '' ? anio = getDate.getFullYear() : anio;     mes == '' ? mes = getDate.getMonth()+1 : mes;

            console.log(red, dist, anio, mes);
            url_ = window.location.origin + window.location.pathname + '/print?r=' + (red) + '&d=' + (dist) + '&a=' + (anio)
            + '&m=' + (mes)  + '&nameMonth=' + (this.nameMonth) + '&pn=' + (this.date_pn) + '&cnv=' + (this.date_cnv);
            window.open(url_,'_blank');
        },
    }
})
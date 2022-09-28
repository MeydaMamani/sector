const appSuplementation = new Vue({
    delimiters: ['[[', ']]'],
    el: '#appKidsMet4',
    data: {
        errors: [],
        anioGrafSuple: 'TODOS',
        anioTableRn: 'TODOS',
        lisTableResumRn: [],
        anioTableCredMes: 'TODOS',
        lisTableResumCredMes: [],
        anioTableCred12: 'TODOS',
        lisTableResumCred12: [],
        anioTableCredPack: 'TODOS',
        lisTableResumCredPack: [],

    },
    created: function() {
        this.grafChildsSuple();
    },
    methods: {

        // PARA GRAFICAS DE CONTROLES CRED
        grafChildsSuple: function(){
            console.log(this.anioGrafSuple);
            axios({
                method: 'POST',
                url: 'met4kids/grafCred',
                data: { "id": this.anioGrafSuple },
            })
            .then(respuesta => {
                $('#myChartSuple').remove();
                $('.barChartSuple').append("<canvas id='myChartSuple'></canvas>");
                console.log(respuesta.data);
                var CredRn = respuesta.data[1][0];
                var CredMes = respuesta.data[2][0];
                var Cred12 = respuesta.data[3][0];
                var areaChartData = {
                    labels  : ['4-5 Meses', '6-11 Meses', '1-2 Años'],
                    datasets: [
                        {
                            label: 'HisMinsa',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            pointRadius: false,
                            data: [ 1, 2, 3  ]
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

        tableResumRn: function(){
            axios({
                method: 'POST',
                url: 'met4kids/tableResumCred',
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
                url: 'met4kids/tableResumCred',
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
            axios({
                method: 'POST',
                url: 'met4kids/tableResumCred',
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

        tableResumCredPack: function(){
            axios({
                method: 'POST',
                url: 'met4kids/tableResumCred',
                data: { "id": this.anioTableCredPack, "type": "credPack" },
            })
            .then(response => {
                console.log(response.data);
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
    }
})
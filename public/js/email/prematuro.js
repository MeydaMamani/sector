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


const appPer = new Vue({
    delimiters: ['[[', ']]'],
    el: '#appEmail',
    data:{
        errors: [],
        anio: '',
        mes: '',
    },
    created: function () {
        // this.inputUser();
        this.listYears();
    },
    methods: {
        listYears: function(){
            const getDate = new Date();
            var n = getDate.getFullYear();
            var select = document.getElementById("anio");
            for(var i = 2022; i<=n; i++)select.options.add(new Option(i,i));
        },

        searchForm: function(){
            // console.log('Estas aqui');
            // const formData = $("#formulario").serialize();
            // console.log(formData);
            // console.log(formData);
            // $(".overlay-wrapper").show();
            // $(".overlay-wrapper").html('<div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-1 pl-3">Cargando...</div></div>')
            axios({
                method: 'GET',
                url: 'send/enviar',
                data: '',
            })
            .then(response => {
                toastr.success('Mensaje Enviado!!', null, { "closeButton": true, "progressBar": true, "timeOut": "1000", });
                // Swal.fire({
                //     title: 'Esta Seguro de Enviar?',
                //     showDenyButton: true,
                //     showCancelButton: false,
                //     confirmButtonText: 'Save',
                //     denyButtonText: `Don't save`,
                //   }).then((result) => {
                //     /* Read more about isConfirmed, isDenied below */
                //     if (result.isConfirmed) {
                //         Swal.fire('Saved!', '', 'success')
                //     }
                //     else if (result.isDenied) {
                //         Swal.fire('Changes are not saved', '', 'info')
                //     }
                // })

                // $(".overlay-wrapper").hide();

            }).catch(e => {
                this.errors.push(e)
            })
        },
    }
})
const appPer = new Vue({
    delimiters: ['[[', ']]'],
    el: '#appPackageKidsPregnant',
    data:{
        errors: [],
        listsKids: [],
        listPregnant: [],
        viewKids: false,
        viewPregnant: false,
        type: 1
    },
    created: function () {
        this.inputUser();
    },
    methods: {
        inputUser: function(){
            setTimeout(() => { this.$refs.focusMe.focus(); }, 200);
        },

        searchFormUser: function(){
            const formData = $("#formulario").serialize();

            if(this.type == 1){
                axios({
                    method: 'POST',
                    url: 'patients/kids',
                    data: formData,
                })
                .then(response => {
                    if(response.data.length < 1){
                        Swal.fire({
                            icon: 'error',
                            title: 'El usuario no ha sido encontrado...!',
                            text: 'Usuario no registrado en Padrón Nominal y His Minsa.',
                        })

                        this.viewKids = false
                        this.viewPregnant = false
                    }else{
                        this.listsKids = response.data[0];
                        this.viewKids = true
                        this.viewPregnant = false
                    }
                    document.getElementById("formulario").reset();

                }).catch(e => {
                    this.errors.push(e)
                })
            }
            else if(this.type == 2){
                axios({
                    method: 'POST',
                    url: 'patients/pregnant',
                    data: formData,
                })
                .then(response => {
                    if(response.data.length < 1){
                        Swal.fire({
                            icon: 'error',
                            title: 'El usuario no ha sido encontrado...!',
                            text: 'Usuario no registrado en Padrón Nominal y His Minsa.',
                        })

                        this.viewKids = false
                        this.viewPregnant = false

                    }else{
                        this.listPregnant = response.data[0];
                        this.viewPregnant = true
                        this.viewKids = false
                    }
                    document.getElementById("formulario").reset();

                }).catch(e => {
                    this.errors.push(e)
                })
            }
        },
    }
})
window.onload = function () {


    var app = new Vue({
        delimiters: ['${', '}'],
        el: '#app',
        data: {
            partenaires: [],
            index: '',
            delected : false
        },

        mounted: function () {
            self = this
            axios.get('/partenaire/get')
                .then(function (response) {
                    console.log(response)
                    if (response.data !== 0){
                        self.partenaires = response.data
                    }
                })
        },

        methods : {
            deletePartModal: function (index) {
                $('.ui.basic.modal')
                    .modal('show', {
                        closable : false
                    })
                ;
                this.index = index
            },

            deletePartenaire: function () {
                self = this
                part = this.partenaires[this.index];
                axios.post('/partenaire/delete',part.id)
                    .then(function (response) {
                        alert(response)
                    })
//                            axios.post()
//                                .then(function (response) {
//                                    if (response !== 1) {
//                                        self.partenaires.splice(self.index)
//                                        self.alert = true
//                                    }
//                                })
            }
        }
    })
}
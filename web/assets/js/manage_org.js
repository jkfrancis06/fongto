window.onload = function () {


    var app = new Vue({
        delimiters: ['${', '}'],
        el: '#app',
        data: {
            type: "",
            organisation : [],
            index: '',
            ind: '',
            delected: false,
            dateCal: '',
            org: {
                adresseOrg: '',
                anneeAdh: $('#example3').val(),
                dateCreation: $('#example1').val(),
                dateEnr: $('#example2').val(),
                formJuridique: '',
                id: '',
                lieuCreation: '',
                missionOrg: '',
                nom: '',
                numAdh: '',
                numeroEnr: '',
                objectifOrg: '',
                paysEnr: '',
                sigle: '',
                typeOrg: '',
                villeEnr: '',
                domaine: {},
                president: {},
                directeur: {}
            }

        },

        mounted: function () {
        },

        methods : {


            cal: function () {
              console.log(this.dateCal);
              console.log($('#cal').val());
            },

            getOrganistions: function () {
                this.organisation = []
                self = this
                axios.post('/organistion/load',this.type)
                    .then(function (response) {
                        console.log(response)
                        if (response.data === 1){
                            self.organisation = [];
                        }else {
                            self.organisation = response.data
                        }
                    })
            },

            deleteOrgModal: function (index) {
                $('.ui.basic.modal')
                    .modal('show', {
                        closable : false
                    })
                ;
                this.index = index
            },

            deleteOrg: function () {
                org = this.organisation[this.index];
                self = this
                axios.post('/organistion/delete', org.id)
                    .then(function (response) {
                        console.log(response)
                        if (response.data == 0){
                            self.organisation.splice(this.index);
                            self.delected = true;
                        }
                    })
            },

            manageOrgMoadal: function (index) {
                this.ind = index
                $('#manageModal')
                    .modal('show')
                ;
                $('#example1').calendar({
                    monthFirst: false,
                    type: 'date',
                    formatter: {
                        date: function (date, settings) {
                            if (!date) return '';
                            var day = date.getDate();
                            var month = date.getMonth() + 1;
                            var year = date.getFullYear();
                            return day + '-' + month + '-' + year;
                        }
                    }
                });
                $('#example2').calendar({
                    monthFirst: false,
                    type: 'date',
                    formatter: {
                        date: function (date, settings) {
                            if (!date) return '';
                            var day = date.getDate();
                            var month = date.getMonth() + 1;
                            var year = date.getFullYear();
                            return day + '-' + month + '-' + year;
                        }
                    }
                });
                $('#example3').calendar({
                    type: 'year'
                });
                this.org = Object.assign({}, this.organisation[index]);
            },

            commitChanges: function () {
                self = this
                this.org.anneeAdh = $('.anneeAdh').val();
                this.org.dateCreation =  $('.dateCreation').val();
                this.org.dateEnr = $('.dateEnr').val();
                console.log(this.org)
                axios.post('/organistion/modify',this.org)
                    .then(function (response) {
                        if (response.data === 0){
                            location.reload()
                        }else {
                            $('#manageModal')
                                .modal('toggle')
                            ;
                        }

                    })
            }

        }

    })
}
window.onload = function () {


    var app = new Vue({
        delimiters: ['${', '}'],
        el: '#app',
        data: {
            type: '',
            search: '',
            organisation : [],
            index: '',
            ind: '',
            type_org: 5,
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

            function filterDomains() {
                var self=this;
                temp = this.organisation.filter(function(cust){return cust.domaine.domainePri.toLowerCase().indexOf(self.search.toLowerCase())>=0;});
                console.log(temp)
            }

        },

        methods : {


            cal: function () {
              console.log(this.dateCal);
              console.log($('#cal').val());
            },

            filterDomains: function() {
                 var self=this;
                temp = this.organisation.filter(function(cust){return cust.domaine.domainePri.toLowerCase().indexOf(self.search.toLowerCase())>=0;});
                console.log(temp)
                this.organisation = temp
              },

            getOrganistions: function () {
                this.organisation = []
                self = this
                var data = {
                    type : this.type_org,
                    form: this.type
                }
                axios.post('/organistion/load',data)
                    .then(function (response) {
                        console.log(response)
                        if (response.data === 1){
                            self.organisation = [];
                        }else {
                            self.organisation = response.data
                        }
                        self.filterDomains()
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
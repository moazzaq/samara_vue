<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <span class="text-secondary">Laravel 8 vue.js Dependent Dropdown Example</span>
        </div>
        <div class="row justify-content-center" style="margin: 20px 0px 20px 0px;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Select Country:</label>
                            <select class='form-control' v-model='country' @change="getStates()">
                                <option value='0' >Select Country</option>
                                <option v-for='data in countries' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select State:</label>
                            <select class='form-control' v-model='state'>
                                <option value='0' >Select State</option>
                                <option v-for='data in states' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Country",
    data(){
        return {
            countries : [],
            states : [],
            country : '',
            state : ''
        }
    },
    created() {
        this.getCountries()
    },
    methods : {
        getCountries(){
            axios.get('/getCountries').then(response =>  {
                    this.countries = response.data;
                }).catch(error => {

                })
        },
        getStates: function() {
            axios.get('/getStates',{
                params: {
                    country_id: this.country
                }
            }).then(function(response){
                this.states = response.data;
            }.bind(this));
        }
    },
}
</script>

<style scoped>

</style>

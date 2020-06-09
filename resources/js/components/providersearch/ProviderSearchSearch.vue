<template>
    <div class="providerSearchBarContainer">
        <v-card
            dense
             outlined>
            <v-row>
                <v-col cols="12">
                    <ValidationObserver v-slot="{ handleSubmit }">
                    <v-form class="providerSearchBar" method='POST' action="/projects/providersearch/search" @submit.prevent="handleSubmit(loadingBar)" ref="searchForm">

                        <v-col cols="3">
                            <v-autocomplete
                                v-model="provider_id"
                                label="Name"
                                name="name"
                                :value="provider_id"
                                :items="providerNames"
                                item-value ="id"
                                item-text ="full_name"
                                outlined
                                class="searchInput"
                                dense
                                ref="providerNameField"
                            >

                            </v-autocomplete>

                        </v-col>
                        <v-col xs="3" md="3">
                            <v-autocomplete
                                v-model="specialty"
                                :value="specialty"
                                name="specialty"
                                label="Specialty"
                                :items ="specialties"
                                outlined
                                class="searchInput"
                                dense
                                ref="specialtyField"
                            >

                            </v-autocomplete>
                        </v-col>

                        <v-col xs="2" md="2">
                            <validation-provider rules="required" name="zip" v-slot="{ errors }">
                                <v-text-field
                                    v-model="zip"
                                    name="zip"
                                    :value="zip"
                                    :error-messages="errors"
                                    label="Zip Code"
                                    prepend-icon="place"
                                    outlined
                                    class="searchInput"
                                    dense
                                    ref="zipField"
                                >
                                </v-text-field>
                            </validation-provider>
                        </v-col>
                        <v-col cols="3">
                            <v-autocomplete
                                v-model="hospital"
                                :value="hospital"
                                name="hospital"
                                label="Hospital"
                                :items ="hospitals"
                                outlined
                                class="searchInput"
                                dense
                                ref="hospitalField"
                            >

                            </v-autocomplete>
                        </v-col>


                        <v-col cols="1" xs="1">
                                <v-btn
                                    id="providerSearchButtonContainer"
                                    color="#A2C7ED"
                                    type="submit"
                                    large>
                                <v-icon style="color: #0A2A60">mdi-account-search</v-icon>
                                </v-btn>

                        </v-col>

                        <!-- Passing CSRF Token for Laravel Form Submission-->
                    <input type="hidden" name="_token" :value="csrf">
                    </v-form>
                    </ValidationObserver>
                </v-col>
            </v-row>
        </v-card>

        <!-- loading progress bar-->
        <v-progress-circular
            v-if="loadingProgress"
            class="providerProgress"
            :size="200"
            :width="10"
            color="#0A2A60"
            indeterminate
        ></v-progress-circular>

    </div>

</template>

<script>

    import { ValidationProvider, ValidationObserver, extend } from 'vee-validate'
    import { required } from 'vee-validate/dist/rules'

    extend('required', {
        ...required,
        message: 'Required.'
    });




    export default {
        name: "ProviderSearchSearch",
        props: ['csrf'],
        components: {
            ValidationProvider,
            ValidationObserver
        },
        data(){
            return {
                provider_id: '',
                specialty: '',
                zip: '',
                hospital: '',
                specialties: [],
                hospitals: [],
                providerNames: [],
                loadingProgress: false

            }
        },
        methods: {
            loadingBar: function() {
                this.loadingProgress = true
                this.$refs.searchForm.$el.submit()

            },
            getSpecialties: function() {
                axios({
                    method: 'GET',
                    url: '/projects/providersearch/api/getspecialties',
                    responseType: 'json'
                }).then(response => {
                   this.specialties = response.data
                }).catch(error => console.log(error));
            },
            getHospitals: function() {
                axios({
                    method: 'GET',
                    url: '/projects/providersearch/api/gethospitals',
                    responseType: 'json'
                }).then(response => {
                    this.hospitals = response.data
                }).catch(error => console.log(error));
            },
            getProviderNames: function() {
                axios({
                    method: 'GET',
                    url: '/projects/providersearch/api/getproviderfullnames',
                    responseType: 'json'
                }).then(response => {
                    this.providerNames = response.data
                }).catch(error => console.log(error));
            },

        },
        created() {
            this.getSpecialties();
            this.getHospitals();
            this.getProviderNames();
        }
    }
</script>

<style lang="sass" scoped>

    .providerSearchBarContainer
        position: sticky
        top: 0
        z-index: 10

    .providerSearchBar

        display: flex
        justify-content: space-around
        align-content: center
        background-color: white


        .searchInput
            align-self: flex-end

    .providerProgress
        position: fixed
        top: 40%
        right: 45%

</style>

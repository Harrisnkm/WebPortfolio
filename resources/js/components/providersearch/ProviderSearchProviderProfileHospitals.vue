<template>
    <div>
        <v-dialog>
            <template v-slot:activator="{on}">

                    <v-list class="providerProfileHospitalAffiliationsList">
                        <v-list-item-group>
                                <v-list-item @click="getProvidersbyHospital(providerData.hosp_afl_ibn_1)" v-if="providerData.hosp_afl_ibn_1" v-on="on"> <p class="hospitalItem">{{L2C(providerData.hosp_afl_ibn_1)}}</p>
                                </v-list-item>
                            <v-list-item @click="getProvidersbyHospital(providerData.hosp_afl_ibn_2)" v-if="providerData.hosp_afl_ibn_2" v-on="on">
                                <p class="hospitalItem">{{L2C(providerData.hosp_afl_ibn_2)}}</p>
                            </v-list-item>
                            <v-list-item @click="getProvidersbyHospital(providerData.hosp_afl_ibn_3)" v-if="providerData.hosp_afl_ibn_3" v-on="on">
                                <p class="hospitalItem">{{L2C(providerData.hosp_afl_ibn_3)}}</p>
                            </v-list-item>
                        </v-list-item-group>
                    </v-list>

            </template>

            <!--dialog box-->
                <div>
                    <v-simple-table>
                        <thead>
                        <tr>
                            <th>Provider</th>
                            <th>Primary Specialty</th>
                            <th>Experience</th>
                            <th>NPI</th>
                            <th>Medicare ID</th>

                        </tr>
                        </thead>
                        <tbody>

                        <tr v-for="provider in providersByHospital">
                            <td>{{L2C(provider.full_name)}}</td>
                            <td>{{L2C(provider.Pri_spec)}}</td>
                            <td>{{providerExperience(provider.Grd_yr)}} Yrs.</td>
                            <td>{{provider.NPI}}</td>
                            <td>{{provider.Ind_PAC_ID}}</td>

                        </tr>

                        </tbody>


                    </v-simple-table>

                </div>

            </v-dialog>
    </div>

</template>

<script>

    import L2C from './providerSearchJS/formatToolkit';

    export default {
        name: "ProviderSearchProviderProfileHospitals",
        props:{
            providerData: Object
        },
        data(){
            return{
                providersByHospital: []
            }
        },
        methods:{
           L2C,
            providerExperience: function(graduationYear){
                return new Date().getFullYear() - graduationYear;
            },
            getProvidersbyHospital(hospital){
                console.log(hospital),
                axios({
                    method: 'GET',
                    url: '/projects/providersearch/api/getAffiliatedHospitals/'+hospital,
                    responseType: 'json'
                }).then(response => {
                    console.log(response.data);
                    let providers = response.data;
                    for (let provider in providers){
                        this.providersByHospital.push(providers[provider])
                    }
                })
            }
        },
        computed: {

        }
    }
</script>

<style lang="scss" scoped>

    .providerProfileHospitalAffiliationsList{
        width: 50%;
    }

    .hospitalItem{
        font-size: 1rem;
    }

</style>

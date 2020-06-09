<template>
    <div>
        <v-dialog class="affiliatedPracticeProvidersDialog">
            <template v-slot:activator="{on}">
                <v-btn class="affiliatedProviders-btn affiliatedProvidersModal" :disabled="isAffiliated" v-on="on">
                    {{isAffiliated ? 'No Affiliations' : 'Affiliated Providers'}}
                </v-btn>
            </template>

            <div>
                    <v-simple-table>
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th>Practice</th>
                                <th>Provider</th>
                                <th>NPI</th>
                                <th>Gender</th>
                                <th>Med School</th>
                                <th>Graduation</th>
                                <th>Primary Specialty</th>
                                <th>MIPS Score</th>
                            </tr>
                        </thead>
                            <tbody>

                                <tr v-for="provider in affiliatedProviders" :content="`<a href='${provider.NPI}' class='affiliatedProviderLink'>Go to Provider</a>`" v-tippy="{interactive: true, trigger:'click', followCursor: 'initial', allowHTML:true}">
                                    <td>{{L2C(provider.Org_nm)}}</td>
                                    <td>{{L2C(provider.full_name)}}</td>
                                    <td>{{provider.providerNPI}}</td>
                                    <td>{{provider.gndr}}</td>
                                    <td>{{L2C(provider.Med_sch)}}</td>
                                    <td>{{provider.Grd_yr}}</td>
                                    <td>{{L2C(provider.Pri_spec)}}</td>
                                    <td>{{provider.final_MIPS_score || 'N/A'}}</td>
                                </tr>

                                </tbody>
                    </template>
                    </v-simple-table>

            </div>


        </v-dialog>
    </div>
</template>

<script>

    import L2C from './providerSearchJS/formatToolkit';

    export default {
        name: "ProviderSearchProviderProfilePracticeProviders",
        props: {
            affiliatedOrgPecos: String
        },
        data(){
            return {
                headers: [
                    { text: 'Practice', value: 'Org_nm'},
                    { text: 'Provider', value: 'full_name'},
                    { text: 'NPI', value: 'NPI'},
                    { text: 'Gender', value: 'gndr'},
                    { text: 'Med School', value: 'Med_sch'},
                    { text: 'Graduation', value: 'Grd_yr'},
                    { text: 'Primary Specialty', value: 'Pri_spec'},
                    { text: 'MIPS Score', value: 'mips_total'}
                ],
                affiliatedProviders: [],
                isAffiliated: false
            }
        },
        methods: {
            L2C,
            getAffiliatedProviders(){
                if(!this.affiliatedOrgPecos){
                    this.isAffiliated = !this.isAffiliated
                }else{

                axios({
                    method: 'GET',
                    url: '/projects/providersearch/api/getAffiliatedProviders/'+this.affiliatedOrgPecos,
                    responseType: 'json'
                }).then(response => {
                    let providers = response.data;
                    for(let provider in providers){

                        this.affiliatedProviders.push(providers[provider])
                    }
                })
                }
            },
        },
        created(){
           this.getAffiliatedProviders();
        }
    }
</script>

<style lang="sass">

    @import '../../../sass/app'

    .affiliatedProvidersModal
        position: absolute
        right: 1rem
        bottom: 1rem

    .affiliatedPracticeProvidersDialog
        max-height: 80% !important
        width: 80% !important


    .affiliatedProviderLink
        text-decoration: none
        color: white
        &:hover
            text-decoration: none

    .affiliatedProviders-btn
        background-color: $royalblue !important
        color: white !important
        font-size: 1rem



</style>

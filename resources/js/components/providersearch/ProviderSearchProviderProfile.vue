<template>
    <div>
        <provider-search-search :csrf="csrf"></provider-search-search>

            <div class="providerProfileContainer">
            <div class="providerProfileMetaData">
                <v-row>
                    <v-col cols="2">
                            <img class="providerProfileAvatar" :src="providerGender(providerData.gndr)"></img>
                    </v-col>
                    <v-col cols="5" class="providerMetaData">
                        <h2 class="providerProfileName">{{providerData.full_name}} <sub class="providerExperienceSub">Exp.
                            {{providerExperience(providerData.Grd_yr)}} Yrs</sub></h2>
                        <p>Gender: {{providerData.gndr}}</p>
                        <p>
                            {{L2C(providerData.adr_ln_1)}}<br>
                            {{providerCSZ}}
                        </p>
                        <p>
                            <strong>NPI:</strong> {{providerData.providerNPI}}
                            <strong class="ml-2">PECOS:</strong> {{providerData.providerPECOS}}
                        </p>

                    </v-col>
                    <v-col cols="5">
                        <v-card flat>
                            <div class="mipsIcon">
                                <img class="mipsIconImage" src="/img/mips_icon_total.png"></img>
                                <div class="mipsScoresRight">
                                    <p class="mipsCategoryTitle mipsTotalTitle">Total Score</p>
                                    <p class="mipsCategoryScore">{{providerData.final_MIPS_score || 'N/A'}}</p>
                                </div>
                            </div>
                            <div class="mipsIcon">
                                <img class="mipsIconImage" src="/img/mips_icon_quality.svg"></img>
                                <div class="mipsScoresRight">
                                    <p class="mipsCategoryTitle">Quality Score</p>
                                    <p class="mipsCategoryScore">{{providerData.quality_category_score || 'N/A'}}</p>
                                </div>
                            </div>

                            <div class="mipsIcon">
                                <img class="mipsIconImage" src="/img/mips_icon_information.svg"></img>
                                <div class="mipsScoresRight">
                                    <p class="mipsCategoryTitle">Interoperability Score</p>
                                    <p class="mipsCategoryScore">{{providerData.ACI_category_score || 'N/A'  }}</p>
                                </div>
                            </div>

                            <div class="mipsIcon">
                                <img class="mipsIconImage" src="/img/mips_icon_activities.svg"></img>
                                <div class="mipsScoresRight">
                                    <p class="mipsCategoryTitle">Improvement Activities Score</p>
                                    <p class="mipsCategoryScore">{{providerData.IA_category_score || 'N/A'}}</p>
                                </div>
                            </div>

                        </v-card>

                    </v-col>
                </v-row>

            </div>
            <v-row>
                <v-col cols="7">
                    <div class="providerProfileProviderData">

                        <v-card class="providerProfileEducation quadBox" flat>
                            <h2 class="quadBoxHeader">Education & Training</h2>
                            <div class="mb-3">
                                <v-row>
                                    <v-col cols="3" class="text-left">
                                        <strong>Medical School:</strong>
                                    </v-col>
                                    <v-col cols="9">
                                        {{L2C(providerData.Med_sch)}}
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col cols="3" class="text-left">
                                        <strong>Graduation Year:</strong>
                                    </v-col>
                                    <v-col cols="9">
                                        {{providerData.Grd_yr}}
                                    </v-col>
                                </v-row>

                            </div>
                            <div>

                                <h4>Primary Specialty</h4>
                                <span>{{L2C(providerData.Pri_spec)}}</span>
                                <!--Run for Loop for the sec specialties (v-for)-->
                                <h4 v-if="providerData.Sec_spec_1" class="mt-4">Secondary Specialties</h4>
                                <span v-if="providerData.Sec_spec_1">{{L2C(providerData.Sec_spec_1)}}</span>
                                <span v-if="providerData.Sec_spec_2">, {{L2C(providerData.Sec_spec_2)}}</span>
                                <span v-if="providerData.Sec_spec_3">, {{L2C(providerData.Sec_spec_3)}}</span>
                                <span v-if="providerData.Sec_spec_4">, {{L2C(providerData.Sec_spec_4)}}</span>
                            </div>

                        </v-card>
                        <v-card class="providerProfileSpecialtyProcedures quadBox" flat>
                            <h2 class="quadBoxHeader"> Specialty Procedures </h2>
                            <!--create specialty procedure table component-->
                            <provider-search-provider-profile-procedures
                                :procedures="specialtyProcedures">

                            </provider-search-provider-profile-procedures>
                        </v-card>


                        <v-card class="providerProfilePracticeAffiliations quadBox" flat>
                            <h2 class="quadBoxHeader">Practice Affiliations</h2>
                            <v-row class="PracticeAffiliationsFields">
                                <v-col cols="3" class="text-left">
                                    <strong>Organization Name:</strong>
                                </v-col>
                                <v-col cols="9">
                                    {{L2C(providerData. Org_nm)}}
                                </v-col>
                            </v-row>
                            <v-row class="PracticeAffiliationsFields">
                                <v-col cols="3" class="text-left">
                                    <strong>Address: </strong>
                                </v-col>
                                <v-col cols="9">
                                    {{L2C(providerData.adr_ln_1)}}<span v-if="providerData.adr_ln_2"><br>
                                    {{L2C(providerData.adr_ln_2)}}</span><br>
                                    {{providerCSZ}}
                                </v-col>
                            </v-row>
                            <v-row class="PracticeAffiliationsFields">
                                <v-col cols="3" class="text-left">
                                    <strong>Org PECOS ID:</strong>
                                </v-col>
                                <v-col cols="9">
                                    {{providerData.Org_PAC_ID}}
                                </v-col>
                            </v-row>
                            <v-row class="PracticeAffiliationsFields">
                                <v-col cols="3" class="text-left">
                                    <strong>Providers: </strong>
                                </v-col>
                                <v-col cols="9">
                                    {{providerData.num_org_mem}}
                                </v-col>
                            </v-row>


                            <provider-search-provider-profile-practice-providers :affiliatedOrgPecos="providerData.Org_PAC_ID"></provider-search-provider-profile-practice-providers>



                        </v-card>
                        <v-card class="providerProfileHospitalAffiliations quadBox" flat>
                            <h2 class="quadBoxHeader">Hospital Affiliations</h2>

                            <provider-search-provider-profile-hospitals :providerData="providerData"></provider-search-provider-profile-hospitals>



                        </v-card>

                    </div>
                </v-col>

                <v-col cols="5">
                    <v-card class="providerProfileGoogleMaps" flat>
                        <provider-search-g-maps-a-p-i :providerAddress="providerFullAddress"></provider-search-g-maps-a-p-i>
                    </v-card>
                </v-col>


            </v-row>



    </div>
        <provider-search-footer></provider-search-footer>
    </div>

</template>

<script>


    import ProviderSearchProviderProfileProcedures from "./ProviderSearchProviderProfileProcedures";
    import ProviderSearchProviderProfilePracticeProviders from "./ProviderSearchProviderProfilePracticeProviders";
    import ProviderSearchProviderProfileHospitals from "./ProviderSearchProviderProfileHospitals";
    import ProviderSearchGMapsAPI from "./ProviderSearchGMapsAPI";
    import L2C from "./providerSearchJS/formatToolkit";
    import ProviderSearchSearch from "./ProviderSearchSearch";
    import ProviderSearchFooter from "./ProviderSearchFooter";


    export default {
        name: "ProviderSearchProviderProfile",
        components: {
            ProviderSearchProviderProfileHospitals,
            ProviderSearchProviderProfilePracticeProviders,
            ProviderSearchProviderProfileProcedures,
            ProviderSearchGMapsAPI,
            ProviderSearchSearch,
            ProviderSearchFooter

        },
        props: {
            provider: String,
            csrf: String
        },
        data(){
            return{
            providerProfile: JSON.parse(this.provider)
            }
        },
        methods: {
            L2C,
            providerGender: function(gender) {

                if(gender == 'F') {
                    return "/img/providerFemale.jpg"
                }else{
                    return "/img/providerMale.jpg"
                }
            },
            providerExperience: function(graduationYear){
                return new Date().getFullYear() - graduationYear;
            }
        },
        computed: {
            providerData: function() {
                return this.providerProfile.providerData[0]
            },
            specialtyProcedures: function() {
                return this.providerProfile.specialtyProcedures
            },
            providerCSZ: function(){
                return L2C(this.providerData.city)+", "+this.providerData.st+" "+this.providerData.zip.slice(0,5);
            },
            providerFullAddress: function(){
               return `${this.providerData.adr_ln_1}, ${this.providerCSZ}`;
            }
        }
    }
</script>

<style lang="sass" scoped>

    @import '../../../sass/app'

    *
        font-family: 'Lato'
        font-size: 1rem

    .providerProfileContainer
        padding: 5rem

        .providerMetaData
            font-size: 1.5rem

        p
            color: $darkgrey
            font-size: 1.3rem

        .providerProfileName
            color: $mediumpurple
            .providerExperienceSub
                color: $darkgrey
                font-size: .6em

        .providerProfileAvatar
            width: 100%
            height: auto

    .mipsIcon
        display: flex

        .mipsIconImage
            height: auto
            width: 25%

        .mipsScoresRight
            padding-left: .5rem


            .mipsCategoryTitle
                font-weight: bold
                font-size: .8rem

                &.mipsTotalTitle
                    font-size: 1.3rem


            .mipsCategoryScore
                font-size: 3rem
                color: $mediumpurple

    .MIPSscores
        margin: .25rem


    .quadBox
        height: auto
        padding-bottom: 10vh
        width: 100%
        padding: 1rem

        &:nth-child(n+2)
            margin-top: 1.5rem

        .quadBoxHeader
            color: $mediumpurple !important
            margin-bottom: 1.5rem


    .providerProfileHospitalAffiliationsList
        width: 50%



</style>

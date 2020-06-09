<template>
   <v-card class="providerCard my-2 text-center" raised>

                <div class="providerCardContainer">

                   <div class="providerCardProviderAvatar">
                        <div class="providerCardProviderAvatarImage">
                            <v-img :src="providerGender(provider.gndr)"></v-img>
                        </div>
                   </div>

                   <div class="providerCardProviderData text-left">
                       <div class="providerCardProviderDataData">
                            <div>
                                <h3 class="providerCardProviderDataFullName">
                                    {{provider.full_name}}
                                    <sub class="providerCardProviderDataExperience">
                                        Exp. {{providerExperience}}</sub>
                                </h3>


                                <p class="providerCardProviderDataSpeciality">{{L2C(provider.Pri_spec)}}</p>

                                <div>
                                    {{L2C(providerOrganization)}}<br>
                                    {{L2C(provider.adr_ln_1)}}<br>
                                    {{providerCSZ}}
                                </div>
                            </div>

                       </div>
                   </div>


           <div class="providerCardMipsTotal">

               <v-row>
                   <v-col cols="9" class="text-right font-weight-bold flexAlignItemsCenter">
                       MIPS Total
                   </v-col>
                   <v-col
                       cols="3"
                       class="text-center">
                       <div class="providerCardMipsTotalBox mipsTotalScore">
                           {{providerTotalMips}}
                       </div>
                   </v-col>
               </v-row>
           </div>

           <div class="providerCardMipsIndividual">
               <v-row>
                   <v-col cols="9" class="text-right">
                       <img class="mipsIcon" src="/img/mips_icon_quality.svg"></img>
                   </v-col>
                   <v-col
                       cols="3"
                       class="text-center mipsIndividualScore">
                       {{providerQuality}}
                   </v-col>
               </v-row>

               <v-row>
                   <v-col
                       cols="9"
                       class="text-right">
                       <img class="mipsIcon" src="/img/mips_icon_information.svg"></img>
                   </v-col>
                   <v-col
                       cols="3"
                       class="text-center mipsIndividualScore">
                       {{providerACI}}
                   </v-col>
               </v-row>
               <v-row>
                   <v-col
                       cols="9"
                       class="text-right">
                       <img class="mipsIcon" src="/img/mips_icon_activities.svg"></img>
                   </v-col>

                   <v-col
                       cols="3"
                       class="text-center mipsIndividualScore">
                       {{providerIA}}
                   </v-col>
           </v-row>

           </div>

           <div class="providerCardProfileLink">
                <v-btn text color="#508FFC" :href="providerProfileLink"> Provider Profile <v-icon right>mdi-account-arrow-right-outline</v-icon> </v-btn>

           </div>


                </div>

   </v-card>
</template>

<script>

    import L2C from "./providerSearchJS/formatToolkit";

    export default {
        name: "ProviderSearchProvidersCard",
        props: {
            provider: Object
        },
        data(){
            return{
                providerProfileLink: `/projects/providersearch/profile/${this.provider.providerNPI}`
            }
        },
        methods: {
            providerGender: function(gender) {

                if(gender == 'F') {
                    return "/img/providerFemale.jpg"
                }else{
                    return "/img/providerMale.jpg"
                }
            },
            L2C
        },
        computed: {
            providerExperience: function() {
                return new Date().getFullYear() - this.provider.Grd_yr;
            },
            providerOrganization: function(){
                return this.provider.Org_nm || this.provider.full_name;
            },
            providerTotalMips: function(){
              return this.provider.final_MIPS_score || 'N/A';
            },
            providerQuality: function(){
                return this.provider.quality_category_score || 'N/A';
            },
            providerACI: function(){
                return this.provider.ACI_category_score || 'N/A';
            },
            providerIA: function(){
                return this.provider.IA_category_score || 'N/A';
            },
            providerCSZ: function(){
                return L2C(this.provider.city)+", "+this.provider.st+" "+this.provider.zip.slice(0,5);
            },


        }
    }
</script>

<style lang="sass" scoped>

    @import '../../../sass/app'

    .providerCard
        box-sizing: border-box
        width: 100%
        height: 20%
        padding: 1em
        background-color: #f9fdff

        @include mQ(desktop)
            width: 48%


        .providerCardContainer
            display: grid
            padding: 1rem


            //Grid Template

            grid-template-columns: 20% 55% 25%
            grid-template-rows: 20% 70% 10%
            grid-template-areas: ". . mipsTotal" "providerAvatar providerData mipsIndividual" ". . profileLink"


            //Grid Areas

            .providerCardProviderAvatar
                grid-area: providerAvatar
                display: flex
                justify-content: flex-end

                .providerCardProviderAvatarImage
                    height: auto
                    width: 100%
                    margin-right: 10%
                    opacity: .7


            .providerCardProviderData
                grid-area: providerData
                display: flex
                align-items: center
                font-size: 1.1rem

                .providerCardProviderDataData
                    display: flex
                    align-items: center

                    .providerCardProviderDataFullName
                        font-size: 2rem
                        color: $mediumpurple
                        .providerCardProviderDataExperience
                            color: $darkgrey
                            font-size: .6em

                    .providerCardProviderDataSpeciality
                        color: $royalblue


            .providerCardMipsTotal
                grid-area: mipsTotal
                display: flex
                justify-content: center
                align-items: center
                color: $mediumpurple
                font-weight: bold
                font-size: 1.5em

                .mipsTotalScore
                    display: flex
                    align-items: center



            .providerCardMipsIndividual
                grid-area: mipsIndividual

                color: $royalblue
                font-weight: bold

                .mipsIcon
                    height: auto
                    width: 40%

                .mipsIndividualScore
                    display: flex
                    align-items: center


            .providerCardProfileLink
                grid-area: profileLink
                padding: 1.5em
                color: $royalblue

                .v-btn
                    width: 100%


</style>

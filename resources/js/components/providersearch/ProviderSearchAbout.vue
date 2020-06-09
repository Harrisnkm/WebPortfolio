<template>
    <v-card>

        <div class="aboutInfoText">
            <h1 class="text-center">ABOUT THIS SITE</h1>

            <div class="aboutInfoContent">
                <p class="aboutText">MIPS is a Merit-based Incentive Payment System implemented by the Centers for Medicare & Medicaid Services to consolidate and replace the previous payment incentive programs: Medicare Electronic Health Records (EHR), Physician Quality Reporting System (PQRS) and the Value-Based Payment Modifier (VBM).<span style="color:red"> [DEMO: DATA ONLY CONTAINS NJ PROVIDERS]</span></p>

                <p class="aboutText">Providers receive payment incentives based on their final score received from four performance categories including:</p>

                <ol class="mipsCriteria aboutText">
                    <li>Quailty</li>
                    <li>Promoting Interoperability</li>
                    <li>Improvement Activities</li>
                    <li>Cost</li>
                </ol>

                <p class="aboutText"><a href="https://qpp.cms.gov/mips/overview" target="_blank">Click Here</a> to read more about the MIPS Program.</p>

                <p class="aboutText"><strong>Disclaimer:</strong> By no means should this website be used as an indication of a provider’s level of competency over another provider. DO NOT use this site to facilitate decisions on which providers to see. </p>

            <p class="aboutText"><strong>Resources:</strong> All datasets can be found on the <a href="https://data.medicare.gov/data/physician-compare" target="_blank">Centers for Medicare & Medicare Services website</a>.</p>
            </div>
        </div>


    </v-card>


</template>

<script>
    export default {
        name: "ProviderSearchAbout"
    }
</script>

<style lang="sass" scoped>

    @import '../../../sass/app'

    .v-card
        color: $darkgrey

    .mipsCriteria
        list-style-type: upper-roman

    .aboutInfoText
        max-width: 70%
        margin: auto
        height: 70vh

        .aboutInfoContent
            font-size: 1.3rem


    h1
        padding: 5vh 0 8vh
        font-size: 4em
        letter-spacing: .5em



</style>

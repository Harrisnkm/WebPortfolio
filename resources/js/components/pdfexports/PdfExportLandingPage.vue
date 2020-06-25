<template>
    <div class="landingPageContainer">

        <div>
            <div class="applicationtitle">
                <h2 class="applicationHeader">PDF Export App</h2>
            </div>

            <v-card class="instructionsContainer">
                <div class="instructions">
                    <h4 class="instructionsHeading">INSTRUCTIONS</h4>
                    <quick-start></quick-start>
                    <ul class="instructionsList">
                        <li v-for="(item,index) in instructions">{{item}} </li>
                    </ul>
                </div>

                <div class="notes red--text mt-5">
                    <p> &ast; NOTE: Demo -- Only 1099 and 1098 Forms active (Nav: Administrative > Taxes) </p>
                </div>
            </v-card>
        </div>

    </div>
</template>

<script>
    import QuickStart from './PdfExportQuickStart'

    export default {
        name: "landingpage",
        components: { QuickStart
        },
        data(){
            return {
                instructions: [
                    "1. Select form from navigation",
                    "2. Select Premade user or Add User (Optional)",
                    "3. Fill out form inputs",
                    '4. Click "Load Data" Button to fill out with dummy data(Optional)',
                    '5. Click "Export PDF" Button to download filled PDF'
                ]
            }
        }
    }

</script>

<style lang="sass" scoped>
    @import '../../../sass/app'

    .landingPageContainer
        display: flex
        height: 85vh
        justify-content: center
        align-items: center
        font-family: 'Red Hat Display'

        .applicationtitle
            margin-bottom: 10vh
            text-align: center
            letter-spacing: .5rem
            color: $brightblue
            text-shadow: 1px 1px $brightblue
            font-family: 'Merriweather'

            .applicationHeader
                font-size: 7rem
                font-weight: bold

    .instructionsContainer
        padding: 5em

        .instructions
            line-height: 1.5rem
            width: 100%
            margin: auto

            .instructionsHeading
                font-weight: bold
                text-align: center
                font-size: 3rem
                letter-spacing: .5rem
                color: $darkgrey
                margin-bottom: 5%



        .instructionsList
            text-align: justify
            list-style-type: none
            font-size: 2rem
            line-height: 2.5rem
            color: $bluegrey




</style>

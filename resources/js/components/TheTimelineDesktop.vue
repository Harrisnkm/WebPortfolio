<template>
    <v-container>

        <div class="timelineContainer">
            <v-row v-for="(item, index) in timelineItems" :key="item.year">
                <v-col cols="6">


                        <div v-if="isEven(index)" class="timelineYear timelineYearLeft" :style="`color:${item.color}`">
                            {{item.year}}
                        </div>

                    <div v-else>
                        <div class="timelineCard timelineCardRight">
                            <h2 class="timelineTitle" :style="`color:${item.color}`"> {{item.title}}</h2>
                            <p class="timelineText"> {{item.text}}</p>
                        </div>
                    </div>

                </v-col>


                <v-col cols="6">
                    <div v-if="isEven(index)">
                        <div class="timelineCard timelineCardLeft">
                            <h2 class="timelineTitle" :style="`color:${item.color}`"> {{item.title}}</h2>
                            <p class="timelineText"> {{item.text}}</p>
                        </div>
                    </div>

                    <div class="timelineYear timelineYearRight" :style="`color:${item.color}`" v-else>
                        {{item.year}}
                    </div>
                </v-col>
            </v-row>
        </div>

    </v-container>
</template>

<script>

    export default {
        name: "TheTimelineDesktop",
        props: {
            timelineItems: Object
        },
        data(){
            return {

            }
        },
        methods: {
            isEven: function(index){
               return (index % 2 == 0) ? true : false
            }
        }
    }
</script>

<style lang="sass" scoped>
    @import '../../sass/app'

    .timelineContainer
        text-align: center

        .timelineCard
            text-align: center
            max-height: 30vw
            min-width: 30%
            padding: 2rem
            overflow: auto

            .timelineTitle
                margin-bottom: 1.5em

            .timelineText
                text-align: justify
                line-height: 1.2rem
                font-size: 1rem
                font-weight: bold

        .timelineYear
            display: flex
            align-items: center
            font-weight: bold
            font-size: 2rem
            height: 100%

        .timelineYearLeft
            justify-content: flex-end


        .timelineYearRight
            justify-content: flex-start





</style>

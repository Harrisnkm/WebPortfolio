<template>
        <v-container>
            <div class="journeyTimelineItems">

               <v-card shaped class="timelineCard" v-for="item in timelineItems" :key="item.title">
                   <h4 class="timelineYear" :style="`color:${item.color}`">{{item.year}}</h4>
                   <h4 class="timelineTitle" :style="`color:${item.color}`">{{item.title}}</h4>
                  <p class="timelineText">
                      {{item.text}}
                  </p>

               </v-card>

            </div>
        </v-container>


</template>

<script>
    export default {
        name: "TheTimelineMobile",
        props: {
          timelineItems: Object
        },
        data(){
            return{

            }

        }
    }
</script>

<style lang="sass" scoped>
    @import '../../sass/app'

    .journeyTimelineItems
        text-align: center
        margin-bottom: 1.5rem

        .timelineCard
            height: auto
            padding: 1rem
            margin-bottom: 1rem

            .timelineYear, .timelineTitle
                font-weight: bold

        .timelineText
            text-align: justify




</style>

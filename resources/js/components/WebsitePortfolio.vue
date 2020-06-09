<template>
    <div>

        <the-showcase></the-showcase>


        <v-lazy
            v-model="LazyAbout"
            :options="{
                threshold: .5
            }"
            min-height="auto"
            transition="fade-transition">
            <the-about></the-about>
        </v-lazy>

        <v-lazy
            v-model="LazyPortfolio"
            :options="{
                threshold: .5
            }"
            min-height="auto"
            transition="fade-transition">
            <the-portfolio></the-portfolio>
        </v-lazy>
        <v-lazy
            v-model="LazyTimeline"
            :options="{
                threshold: .5
            }"
            min-height="auto"
            transition="fade-transition">
            <the-timeline> </the-timeline>
        </v-lazy>


    </div>
</template>

<script>

    import TheTimeline from "./TheTimeline";
    import TheShowcase from './TheShowcase';
    import ThePortfolio from "./ThePortfolio";
    import TheAbout from "./TheAbout";


    export default {
        name: "WebsitePortfolio",
        components: {TheAbout, TheTimeline, TheShowcase, ThePortfolio},
        data() {
            return{
                LazyAbout: false,
                LazyPortfolio: false,
                LazyTimeline: false
            }
        }
    }
</script>

<style lang="sass" scoped>

</style>

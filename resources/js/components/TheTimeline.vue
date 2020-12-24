<template>
    <section id="journeyTimeline">
        <div class="pageHeader">
            journey<span class="textAccent">...</span>
        </div>


        <component :is="timelineView" :timelineItems="items"></component>


        </section>
</template>

<script>

    import TheTimelineMobile from "./TheTimelineMobile";
    import TheTimelineDesktop from "./TheTimelineDesktop";

    export default {
        name: "TheTimeline",
        components: {
            TheTimelineMobile,
            TheTimelineDesktop
        },
        data(){
            return{
                items: [
                    {
                        color: '#FF3E55',
                        year: '2014',
                        animation: 'rotateInDownLeft',
                        title: 'System Administrator',
                        text: 'System Administrator for Medical Software Company. Linux Environment. Network and Security Management. HL7 Interfaces. Server Provisioning. Application and IT Support. Scripting and Automation.'
                    },
                    {
                        color: '#1B242F',
                        year: '2017',
                        animation: 'rotateInDownRight',
                        title: 'Software Developer',
                        text: 'Developer for EHR & Practice Management Software Company. Developed web applications on LAMP Stack. Third Party API Integration. Workflow automation. ASC X12 and HL7 Interfaces. '
                    },
                    {
                        color: '#05C2C9',
                        year: '2018',
                        animation: 'rotateInDownLeft',
                        title: 'Software Developer II',
                        text: 'Lead Technical projects and Application Development. Refactored applications with Laravel/Vue.js. UI/UX Design with Figma. Agile product development with Jira. Workflow automation and streamlined processes with python.'
                    }
                ]
            }
        },
        computed: {
            timelineView: function() {
                return (screen.width < 800) ? 'the-timeline-mobile' : 'the-timeline-desktop'
            }
        }
    }
</script>

<style lang="sass" scoped>

    @import '../../sass/app'

    #journeyTimeline
        height: auto+5vh
        text-align: center
        font-family: 'Red Hat Display'
        color: black

    @include pageHeader('black', $watermelon)


</style>

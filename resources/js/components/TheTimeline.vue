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
                        text: 'Linux System Administrator for Medical Software Company. Network and Security Management. HL7 Interfaces. Server Provisioning. Application and IT Support. Scripting and Automation.'
                    },
                    {
                        color: '#1B242F',
                        year: '2017',
                        animation: 'rotateInDownRight',
                        title: 'Web Developer',
                        text: 'Web Developer for EHR & Practice Management Software Company. Developed SASS products on HTML/CSS/JS, PHP, MySQL hosted on Ubuntu Linux. UI/UX Design with Figma and Balsamiq. Third Party API. Workflow automation. ASC X12 and HL7 Interfaces. '
                    },
                    {
                        color: '#05C2C9',
                        year: '2019',
                        animation: 'rotateInDownLeft',
                        title: 'Operations Manager',
                        text: 'Operations Manager for Practice Management Software Company. Lead Technical projects and Application Development. Client Relations, Accounts Management and Vendor Management. Client Onboarding. Workflow automation and streamlined processes. '
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

<template>
    <section id="theAbout">
        <div class="pageHeader">
            about<span class="textAccent">.</span>
        </div>

        <div class="summary">
            Full stack developer specializing in Healthcare SaaS applications. Writes scalable software that prioritizes business value and user experience.  System Administration and Project Management experience included. Knowledgeable in HIPAA best practices, interoperability and industry standards.
        </div>

        <v-container>
            <v-row>
                <v-col cols="12" md="4" class="skillSection skillSysAdmin">
                    <h2 class="skillHeading">System Administration</h2>

                    <div class="skillsContainer">
                        <div v-for="(item,index) in skills.sysadmin" class="text-center">
                            <i  :class="`fab fa-${item.icon}`" :style="`color: ${item.color}`"><p class="skillName">{{index}}</p></i>
                        </div>

                    </div>
                </v-col>
                <v-col cols="12" md="4" class="skillSection skillWebdev">
                    <h2 class="skillHeading">Web Development</h2>

                    <div class="skillsContainer text-center skillsWebdevContainer">
                        <div v-for="(item,index) in skills.webdev" class="text-center">
                            <!--must use fa instead of fab-->
                            <i v-if="index == 'MySQL'" :class="`fa fa-${item.icon} webdevSkill`" :style="`color: ${item.color}; display:inline; vertical-align: bottom`"><p class="skillName" style="font-weight: normal">{{index}}</p></i>
                            <i :class="`fab fa-${item.icon} webdevSkill`" :style="`color: ${item.color}`" v-else><p class="skillName">{{index}}</p></i>
                        </div>
                    </div>
                </v-col>
                <v-col cols="12" md="4" class="skillSection skillPmUx">
                    <h2 class="skillHeading">Project Management/UX</h2>

                    <div class="skillsContainer">
                        <div v-for="(item,index) in skills.pmux" class="text-center">
                            <i  :class="`fab fa-${item.icon}`" :style="`color: ${item.color}`"><p class="skillName">{{index}}</p></i>
                        </div>

                    </div>
                </v-col>
            </v-row>
        </v-container>


    </section>
</template>

<script>
    export default {
        name: "TheAbout",
        data() {
            return {
                skills: {
                    pmux: {
                        'Figma': { icon: 'figma',  color: '#F89488'},
                        'Jira': { icon: 'jira', color: '#2684FF'},
                        'GitHub': { icon:'github-alt', color: 'black'},
                        'Bitbucket': { icon: 'bitbucket', color: '#205081'},
                        'Office': { icon:'microsoft', color: '#E87E01'},
                        'Slack': { icon:'slack-hash', color: '#0f7965'}
                    },
                    webdev: {

                        'HTML':{ icon:'html5', color: '#e34f26'},
                        'CSS':{ icon:'css3-alt', color: '#1680C0'},
                        'Bootstrap': { icon:'bootstrap', color: '#563D7C'},
                        'SaSS': { icon:'sass', color: '#CF649A'},
                        'PHP': { icon:'php', color: '#8892BF'},
                        'Laravel': { icon:'laravel', color: '#F1513D'},
                        'JS': { icon:'js', color: '#F5DE19'},
                        'Node': { icon:'node', color: '#73AB63'},
                        'VueJS': { icon:'vuejs', color: '#41B883'},
                        'MySQL':{ icon:'database', color: '#1B242F'},
                        'git': { icon:'git-alt', color: '#F05033'}


                    },
                    sysadmin: {

                        'Ubuntu': { icon:'ubuntu', color: '#DD4814'},
                        'CentOS': { icon:'centos', color: '#95257A'},
                        'Windows': { icon:'windows', color: '#318DC2'},
                        'Linux': { icon:'linux', color: 'black'},
                        'aws': { icon:'aws', color: '#ff9900'},
                        'Docker': { icon:'docker', color: '#2496ED'},

                    }
                }
            }
        }
    }
</script>

<style lang="sass" scoped>
    @import '../../sass/app'

    #theAbout
        height: auto
        padding-bottom: 5vh
        text-align: center
        font-family: 'Red Hat Display'
        color: black


        .summary
            width: 60%
            margin: auto
            text-align: justify
            margin-bottom: 2em
            font-size: 1.3rem

            @include mQ(desktop)
                display: none

        @include pageHeader('black', $watermelon)


        .skillsContainer
            display: flex
            justify-content: space-around
            flex-wrap: wrap
            border: solid 1px black
            font-family: 'Red Hat Display'
            font-size: 1.2em
            padding: 1em

            @include mQ(desktop)
                font-size: 2.5em
                padding: .2em

                div
                    width: 100%
                &.skillsWebdevContainer div
                    width: 50%



            .skillHeading
                margin-bottom: 1.5em


            .skillName
                display: inline-block
                width: 100%
                color: black !important

            .fab
                padding: .5em

</style>

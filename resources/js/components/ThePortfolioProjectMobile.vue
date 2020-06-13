<template>
    <v-hover>
        <template v-slot:default="{ hover }">
            <v-card
                raised
                height="100%"
                width="95vw"
                style="margin:0 auto 5%"
                class="portfolioProjectMobile"
            >
                <slot name="screenshot"></slot>
                <v-fade-transition>
                    <v-overlay
                        v-if="hover"
                        absolute
                        color="#F7F7F7"
                    >
                        <div class="projectLinks">
                            <v-btn class="projectLinksBtn toProjectLink">To Project<i class="fa fa-external-link-alt projectIcon"></i></v-btn>
                            <v-btn class="projectLinksBtn projectGithub">View Code<i class="fab fa-github-alt projectIcon"></i></v-btn>
                        </div>
                    </v-overlay>
                </v-fade-transition>
            </v-card>
        </template>
    </v-hover>

</template>

<script>
    export default {
        name: "ThePortfolioProjectMobile",
        props: {
            color: String
        },
        data(){
            return {
                overlay: false
            }
        }
    }
</script>

<style lang="sass" scoped>

    @import '../../sass/app'

    .portfolioProjectMobile
        font-family: 'Red Hat Display'
        margin-bottom: 5vh

    .projectLinks

        color: white

        .projectLinksBtn
            width: 50vw
            margin-bottom: 1rem

            .projectIcon
                margin-left: .5rem


        .toProjectLink
            display: block
            background-color: $lightblue !important

        .projectGithub
            display: block
            background-color: $darkgrey !important


</style>

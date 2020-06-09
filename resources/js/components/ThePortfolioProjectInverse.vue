<template>
    <div class="project">
        <v-row>
            <v-col cols="6" class="projectImage">
                <div class="outer-container">
                    <div class="inner-container-screenshot">
                        <v-hover>
                            <template v-slot:default="{ hover }">
                                <v-card
                                    raised
                                >
                                    <slot name="screenshot"></slot>
                                    <v-fade-transition>
                                        <v-overlay
                                            v-if="hover"
                                            absolute
                                            color="#F7F7F7"
                                        >
                                            <p class="projectDescription">
                                                <slot name="description"></slot>
                                            </p>
                                        </v-overlay>
                                    </v-fade-transition>
                                </v-card>
                            </template>
                        </v-hover>
                    </div>
                </div>

            </v-col>

            <v-col cols="6" class="projectContent">
                <div class="outer-container">
                    <div class="inner-container-content">
                        <div class="projectContainer-links">
                            <v-card
                                raised
                                class="projectLinksCard projectProject"
                                :href="project"
                                target="_blank"
                            >
                                <div>
                                    <slot name="title"></slot>
                                </div>
                            </v-card>

                            <v-card
                                raised
                                class="projectLinksCard projectGithub"
                                :href="github"
                                target="_blank"
                            >
                                <div>
                                    <i class="fab fa-github-alt"></i>
                                </div>
                            </v-card>
                        </div>
                    </div>
                </div>
            </v-col>


        </v-row>

    </div>
</template>

<script>
    export default {
        name: "ThePortfolioProjectInverse",
        props: {
            color: String,
            github: String,
            project: String
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

    @include portFolioProject(true)


</style>

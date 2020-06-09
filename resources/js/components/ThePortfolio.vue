<template>
    <section id="thePortfolio">
        <div class="pageHeader">
            code<span class="textAccent">;</span>
        </div>



            <component :is="activeComponent"  github="https://github.com/Harrisnkm/WebPortfolio/" project="/projects/pdfexport">
                <template #title>
                    <h1 class="mb-7"> PDF Exports </h1>
                </template>

                <template #description>
                    <h3>Fill out forms online and download to PDF</h3>
                </template>

                <template #screenshot>
                    <v-img
                        src="img/pdfExportProjectImage.png">
                    </v-img>
                </template>
            </component>

            <component :is="activeComponentInverse"  github="https://github.com/Harrisnkm/WebPortfolio/" project="/projects/providersearch">
                <template #title>
                    <h1 class="mb-7"> Provider Search </h1>
                </template>

                <template #description>
                    <h3>Centers for Medicare & Medicaid Services Merit-based Incentive Payment System [MIPS] Database to search providers by MIPS metrics</h3>
                </template>
                <template #github>
                    <h3>Github</h3>
                </template>

                <template #screenshot>
                    <v-img
                        src="img/providerSearchProjectImage.svg">
                    </v-img>
                </template>
            </component>


    </section>

</template>

<script>

    import ThePortfolioProject from "./ThePortfolioProject";
    import ThePortfolioProjectInverse from "./ThePortfolioProjectInverse";
    import ThePortfolioProjectMobile from "./ThePortfolioProjectMobile";

    export default {
        name: "ThePortfolio",
        components: {ThePortfolioProject,ThePortfolioProjectInverse, ThePortfolioProjectMobile},
        computed:{
            activeComponent: function() {
              return (screen.width < 800) ? 'the-portfolio-project-mobile' : 'the-portfolio-project'
            },
            activeComponentInverse: function() {
                return (screen.width < 800) ? 'the-portfolio-project-mobile' : 'the-portfolio-project-inverse'
            }

        }
    }
</script>

<style lang="sass" scoped>
    @import '../../sass/app'

    #thePortfolio
        background-color: $darkblue
        color: white
        height: auto
        padding-bottom: 5vh
        text-align: center
        width: 100vw


   @include pageHeader('white', 'white')


</style>

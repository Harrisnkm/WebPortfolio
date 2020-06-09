<template>
    <v-footer>
            <v-col
                class="py-4 text-center"
                cols="12"
            >
                &copy{{ new Date().getFullYear() }} — <strong> HK Solutions LLC.</strong>
            </v-col>

    </v-footer>
</template>

<script>
    export default {
        name: "ProviderSearchFooter",
    }
</script>

<style lang="sass" scoped>

    @import '../../../sass/app'

    .v-footer
        width: 100%
        background-color: $royalblue
        color: white

</style>

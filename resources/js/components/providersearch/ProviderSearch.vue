<template>

    <div class="ProviderSearch">

        <provider-search-showcase></provider-search-showcase>

            <provider-search-search :csrf="csrf"></provider-search-search>
            <provider-search-about></provider-search-about>

            <provider-search-footer></provider-search-footer>

    </div>

</template>

<script>
    import ProviderSearchSearch from "./ProviderSearchSearch";
    import ProviderSearchShowcase from "./ProviderSearchShowcase";
    import ProviderSearchAbout from "./ProviderSearchAbout";
    import ProviderSearchFooter from "./ProviderSearchFooter";
    export default {
        name: 'TheProviderSearch',
        props: ['csrf'],
        components: {
            ProviderSearchFooter,
            ProviderSearchAbout, ProviderSearchShowcase, ProviderSearchSearch}
    }
</script>

<style lang="sass" scoped>

    @import '../../../sass/app'

    *
        font-family: 'Lato'

    .providerSearch
        width: 80vw

</style>

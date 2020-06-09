<template>
    <div>

        <provider-search-search :csrf="csrf"></provider-search-search>


        <div  class="providerCards">
            <provider-search-providers-card :provider="provider" v-for="provider in providerArr" :key="provider.id"></provider-search-providers-card>
        </div>


        <provider-search-footer></provider-search-footer>
    </div>
</template>

<script>

    import ProviderSearchProvidersCard from "./ProviderSearchProvidersCard";
    import ProviderSearchSearch from "./ProviderSearchSearch";
    import ProviderSearchFooter from "./ProviderSearchFooter";
    export default {
        name: "ProviderSearchProviders",
        components: {ProviderSearchFooter, ProviderSearchSearch, ProviderSearchProvidersCard},
        props: {
            providers: String,
            csrf: String
        },
        data() {
            return {
                providerArr: JSON.parse(this.providers)
                }
            }
    }
</script>

<style lang="sass" scoped>

    *
        font-family: 'Lato'

    .providerCards
        display: flex
        flex-wrap: wrap
        justify-content: space-around


</style>

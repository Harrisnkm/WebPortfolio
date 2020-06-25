<template>
    <div>
        <v-dialog v-model="quickStartDialog" hide-overlay width="25vw">
            <template v-slot:activator="{on}">
                <div class="text-center">
                    <v-btn x-large class=" qs-btn" v-on="on">
                       Quick Start
                    </v-btn>
                </div>
            </template>

            <template>
                <v-card class="selectFormCard text-center">
                    <h3 class="selectFormHeader">Select Form</h3>
                    <div>
                        <v-btn class="form-btn" @click="setForm('Form_1099')">1099</v-btn>
                    </div>
                    <div>
                        <v-btn class="form-btn" @click="setForm('Form_1098')">1098</v-btn>
                    </div>
                </v-card>
            </template>

        </v-dialog>
    </div>
</template>

<script>
    export default {
        name: "PdfExportQuickStart",
        data(){
            return{
                quickStartDialog: false
            }
        },
        methods: {
            setForm(formName){
                this.$store.commit('pdfExport/changeActiveForm', {formName: formName})
            }
        }
    }
</script>

<style lang="sass" scoped>
    @import '../../../sass/app'

    *
        font-family: 'Red Hat Display'

    .qs-btn
        background-color: $brightblue !important
        color: white !important
        border-radius: 20px
        width: 40%
        font-size: 2em
        padding: 1.2rem
        margin: 0 auto 10%

    .selectFormCard
        padding: 2rem

        .selectFormHeader
            margin-bottom: 1.5rem
            font-size: 1.8rem

        .form-btn
            background-color: $brightblue !important
            color: white !important
            width: 7rem
            font-size: 1rem
            padding: 1.2rem
            margin: 1rem

</style>

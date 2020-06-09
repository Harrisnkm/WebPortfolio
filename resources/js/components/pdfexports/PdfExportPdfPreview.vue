<template>
    <div>
        <v-dialog>
            <template v-slot:activator="{on}">
                <v-btn class="preview-btn" v-on="on">
                    Preview PDF
                </v-btn>
            </template>

            <pdf :src="`/${formName}.pdf`"></pdf>


        </v-dialog>
    </div>

</template>

<script>

    import pdf from 'vue-pdf'


    export default {
        name: "PdfExportPdfPreview",
        components: {
            pdf
        },
        props: {
            formName: String
        }
    }
</script>

<style lang="sass" scoped>
    @import '../../../sass/app'

    .preview-btn
        background-color: $brightblue !important
        color: white !important
        width: 7rem
        font-size: 1rem
        padding: 1rem



</style>

<template>
    <section class="pdfSection">



        <v-form method="POST" action="#" class="elevation-15 pa-5">

           <div class="formTopbar">
               <span class="formTitle">
                   {{formTitle}}<br>
                   <span class="formDescription">{{formDescription}}</span>
               </span>
               <pdf-export-pdf-preview :formName="pdf"></pdf-export-pdf-preview>

           </div>
            <v-container>
                <v-row>
                    <v-col cols="6">
                        <v-textarea
                            filled
                            label="PAYER’S name, street address, city or town, state or province, country, ZIP or foreign postal code, and telephone no."
                            v-model="form[18]"
                        ></v-textarea>
                    </v-col>
                    <v-col cols="3">
                        <v-currency-field label="1. Rents" v-model="form[1]" prefix="$"></v-currency-field>
                        <v-currency-field label="2. Royalties" v-model="form[2]" prefix="$"></v-currency-field>
                        <v-currency-field label="3. Other Income" v-model="form[3]" prefix="$"></v-currency-field>
                    </v-col>
                    <v-col cols="3" class="alignEnd">
                        <v-currency-field label="4. Federal Income Tax witheld" v-model="form[4]"
                                          prefix="$"></v-currency-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="3">
                        <v-text-field label="Payer's TIN" v-model="form[19]"></v-text-field>
                    </v-col>
                    <v-col cols="3">
                        <v-text-field label="Recipient's TIN" v-model="form[20]"></v-text-field>
                    </v-col>
                    <v-col cols="3">
                        <v-currency-field label="5. Fishing boat proceeds" v-model="form[5]"
                                          prefix="$"></v-currency-field>
                    </v-col>
                    <v-col cols="3">
                        <v-currency-field label="6. Medical and health care payments" v-model="form[6]" prefix="$"/>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="6">
                        <v-text-field label="RECIPIENT's name" v-model="form[21]"></v-text-field>
                    </v-col>
                    <v-col cols="3">
                        <v-checkbox label="7. Payer made direct sales of $5,000 or more of consumer products to a buyer
(recipient) for resale" v-model="form[7]"></v-checkbox>
                    </v-col>
                    <v-col cols="3">
                        <v-text-field label="8. Substitute payments in lieu of dividends or interest" v-model="form[8]"
                                      prefix="$"></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="6">
                        <v-text-field label="Street address (including apt. no.)" v-model="form[21]"></v-text-field>
                    </v-col>
                    <v-col cols="3">
                        <v-currency-field label="9. Crop insurance proceeds" v-model="form[9]"
                                          prefix="$"></v-currency-field>
                    </v-col>
                    <v-col cols="3">
                        <v-currency-field label="10. Gross proceeds paid to an attorney" v-model="form[10]"
                                          prefix="$"></v-currency-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="6">
                        <v-text-field label="City or town, state or province, country, and ZIP of foreign postal code"
                                      v-model="form[23]"></v-text-field>
                    </v-col>
                    <v-spacer></v-spacer>
                    <v-col cols="3">
                        <v-text-field label="12. Section 409A deferrals" v-model="form[12]" prefix="$"></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="4">
                        <v-text-field label="Account Number" v-model="form[24]"></v-text-field>
                    </v-col>
                    <v-col cols="2">
                        <v-checkbox label="FATCA filing requirement" v-model="form[25]"></v-checkbox>
                    </v-col>
                    <v-col cols="3">
                        <v-currency-field label="13. Excess golden parachute payments" v-model="form[13]"
                                          prefix="$"></v-currency-field>
                    </v-col>
                    <v-col cols="3">
                        <v-currency-field label="14. Non-qualified deferred compensation" v-model="form[14]"
                                          prefix="$"></v-currency-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="3" offset="3">
                        <v-currency-field label="State tax withheld" v-model="form[15]" prefix="$"></v-currency-field>
                    </v-col>
                    <v-col cols="3">
                        <v-currency-field label="State/Payer's state no." v-model="form[16]"
                                          prefix="$"></v-currency-field>
                    </v-col>
                    <v-col cols="3">
                        <v-currency-field label="State income" v-model="form[17]" prefix="$"></v-currency-field>
                    </v-col>
                </v-row>

            </v-container>


            <portal to="formButtons">
                <div>
                    <v-btn @click="onSubmit(pdf,form)" class="export-btn">
                        Export PDF

                    </v-btn>
                </div>
                <div>
                    <v-btn @click="fillDemoData(demoData, form)" class="export-btn">
                        Load Data
                    </v-btn>
                </div>

            </portal>
        </v-form>

        <!-- loading progress bar-->
        <v-progress-circular
            v-if="loadingProgress"
            class="pdfProgress"
            :size="200"
            :width="10"
            color="#197EEA"
            indeterminate
        ></v-progress-circular>

    </section>
</template>

<script>

    import formMixin from "./pdfExportFormHelpers"
    import {fillDemoData, demoDataForm_1099} from "./fillDemoData"
    import PdfExportPdfPreview from "../PdfExportPdfPreview";



    export default {
        name: 'Form_1099',
        components: {PdfExportPdfPreview},
        mixins: [formMixin],
        props: {
            selectedUserData: Object

        },
        data() {
            return {
                pdf: 'Form_1099',
                formTitle: '1099-MISC',
                formDescription: 'Miscellaneous Income',
                demoData: demoDataForm_1099,
                form: new Form({
                    //put form key value pairs here
                    1: this[1],
                    2: this[2],
                    3: this[3],
                    4: this[4],
                    5: this[5],
                    6: this[6],
                    7: this[7],
                    8: this[8],
                    9: this[9],
                    10: this[10],
                    11: this[11],
                    12: this[12],
                    13: this[13],
                    14: this[14],
                    15: this[15],
                    16: this[16],
                    17: this[17],
                    18: this[18],
                    19: this[19],
                    20: this[20],
                    21: this[21],
                    22: this[22],
                    23: this[23],
                    24: this[24],
                    25: this[25]
                })
            }
        },
        methods: {
            fillDemoData

        }
    };
</script>


<style lang="sass" scoped>
    @use 'pdfFillableForms'

</style>

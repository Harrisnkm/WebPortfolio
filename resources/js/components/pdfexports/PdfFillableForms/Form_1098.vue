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
                            label="RECIPIENT’S/LENDER’S name, street address, city or town, state or province, country, ZIP or foreign postal code, and telephone no."
                            v-model="form[12]"
                        ></v-textarea>
                    </v-col>
                    <v-col cols="6" class="alignEnd">
                        <v-currency-field label="1. Mortgage interest received from payer(s)/borrower(s)" v-model="form[1]" prefix="$"></v-currency-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="3">
                        <v-text-field label="RECIPIENT'S/LENDER'S Payer's TIN" v-model="form[13]"></v-text-field>
                    </v-col>
                    <v-col cols="3">
                        <v-text-field label="PAYER'S/BORROWER'S TIN" v-model="form[14]"></v-text-field>
                    </v-col>
                    <v-col cols="3">
                        <v-currency-field label="2. Outstanding mortgage principal" v-model="form[2]" prefix="$"></v-currency-field>
                    </v-col>
                    <v-col cols="3">


                        <v-menu
                            v-model="preformattedDate_3"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            transition="scale-transition"
                            offset-y
                            min-width="290px"
                        >
                            <template v-slot:activator="{ on }">
                                <v-text-field
                                    v-model="form[3]"
                                    label="3. Mortgage origination date"
                                    prepend-icon="event"
                                    readonly
                                    v-on="on"
                                ></v-text-field>
                            </template>
                            <v-date-picker v-model="formattedDate_3" @input="preformattedDate_3 = false"></v-date-picker>
                        </v-menu>

                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="6">
                        <v-text-field label="PAYER'S/BORROWER'S name" v-model="form[15]"></v-text-field>
                    </v-col>
                    <v-col cols="3">
                        <v-currency-field label="4. Refund of overpaid interest" v-model="form[4]" prefix="$"></v-currency-field>
                    </v-col>
                    <v-col cols="3">
                        <v-currency-field label="5. Mortgage insurance premiums" v-model="form[5]" prefix="$"></v-currency-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="6">
                        <v-text-field label="City or town, state or province, country, and ZIP of foreign postal code" v-model="form[17]"></v-text-field>
                    </v-col>
                    <v-col cols="6">
                        <v-checkbox label=" If address of property securing mortgage is the same as PAYER’S/BORROWER’S address, the box is checked, or the address or description is entered in box 8." v-model="form[25]"></v-checkbox>
                    </v-col>

                </v-row>
                <v-row>
                    <v-col cols="3">
                        <v-text-field label="9. Number of properties securing the mortgage " v-model="form[9]"></v-text-field>
                    </v-col>
                    <v-col cols="3">
                        <v-text-field label="10. Other" v-model="form[10]"></v-text-field>
                    </v-col>
                    <v-col cols="6">
                        <v-textarea
                            filled
                            label="Address or description of property securing mortgage"
                            v-model="form[8]"
                        ></v-textarea>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="6">
                        <v-text-field label="Account number" v-model="form[18]"></v-text-field>
                    </v-col>
                    <v-spacer></v-spacer>


                    <v-col cols="5">
                        <v-menu
                            v-model="preformattedDate_11"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            transition="scale-transition"
                            offset-y
                            min-width="290px"
                        >
                            <template v-slot:activator="{ on }">
                                <v-text-field
                                    v-model="form[11]"
                                    label="11. Mortgage acquisition date"
                                    prepend-icon="event"
                                    readonly
                                    v-on="on"
                                ></v-text-field>
                            </template>
                            <v-date-picker v-model="formattedDate_11" @input="preformattedDate_11 = false"></v-date-picker>
                        </v-menu>
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
    import {fillDemoData, demoDataForm_1098} from "./fillDemoData";
    import PdfExportPdfPreview from "../PdfExportPdfPreview";

    export default {
        name:'Form_1098',
        mixins: [formMixin],
        components: {PdfExportPdfPreview},
        props: {
            selectedUserData: Object

        },
        data() {
            return {
                pdf:'Form_1098',
                formTitle: '1098',
                formDescription: 'Mortgage Interest Statement',
                demoData: demoDataForm_1098,
                preformattedDate_3: false,
                preformattedDate_11: false,
                formattedDate_3: '',
                formattedDate_11: '',
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
                        18: this[18]
                    })
            }
        },
        methods: {
            fillDemoData
        },
        watch: {

            formattedDate_3: function(date){
                let newDateFormat = this.formatDate(date);
                this.form[3] = newDateFormat;
            },
            formattedDate_11: function(date){
               let newDateFormat= this.formatDate(date);
                this.form[11] = newDateFormat;
            }
        }
    };
</script>


<style lang="sass" scoped>
    @use 'pdfFillableForms'

</style>

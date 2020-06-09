<template>
    <div>
        <v-dialog max-width="40vw" v-model="addNewUserDialog">
            <template v-slot:activator="{on}">
                <v-btn class="cta-btn" v-on="on">
                    Add User
                </v-btn>
            </template>

            <template>
                <v-alert type="success" dismissible elevation="2" :value="msg">
                    New User Added!
                </v-alert>
            </template>

            <v-card>
                <v-card-title class="mb-4">
                    <span class="headline secondary--text ">Add User</span>
                </v-card-title>
                <v-card-text>
                    <v-form class="px-3">
                        <v-container>
                            <v-row>
                                <v-col cols="12" sm="10" md="10">
                                    <v-text-field label="First Name" required v-model="form.firstname"></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col cols="12" sm="10" md="10">
                                    <v-text-field label="Last Name" required v-model="form.lastname"></v-text-field>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-form>
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn class="cta-btn mb-5" @click="addUser">Submit</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

    </div>
</template>

<script>
    export default {
        name: "PdfExportAddNewUser",
        data(){
            return{
                form: new Form({
                    firstname: this.firstname,
                    lastname: this.lastname
                }),
                addNewUserDialog: false,
                msg: false
            }
        },
        methods: {
            addUser(){
                this.form.submit('POST', '/projects/pdfexport/adduser')
                    .then(response => {
                            this.msg = true,
                                this.form.reset(),
                                this.$emit("useradded");

                    })
                    .catch(() => console.log('error occurred'))
            }
        }
    }
</script>

<style lang="sass" scoped>

    @import '../../../sass/app'

    .cta-btn
        background-color: $bluegrey !important
        color: white !important
        width: 7rem
        font-size: 1rem

</style>

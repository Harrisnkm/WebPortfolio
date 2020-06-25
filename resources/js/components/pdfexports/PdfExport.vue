<template>
    <section class="pdfExport">

        <pdf-export-navigation-drawer></pdf-export-navigation-drawer>

            <v-content>
                <div class="mainSection">
                    <!--Landing Page if form is not selected-->
                    <pdf-export-landing-page v-show="!activeForm"></pdf-export-landing-page>

                    <!--If form is displayed-->
                    <div v-show="activeForm">




                        <v-row>
                            <v-col cols="2" class="formActionsNav">
                                <div class="appName text-center">
                                    PDF Export
                                </div>

                                <div class="userSelect text-center">
                                    <h2> Select User</h2>
                                    <br>
                                    <v-select
                                        v-model= "selectedUser"
                                        :items="users"
                                        item-text="fullname"
                                        label="Select User"
                                        prepend-icon="person"
                                        @input="setUser"
                                    ></v-select>
                                </div>

                                    <div class="formActionButtons text-center">
                                        <portal-target name="formButtons"></portal-target>

                                        <pdf-export-add-new-user @useradded="setNewUser"></pdf-export-add-new-user>
                                    </div>



                            </v-col>

                            <!-- PDF form to fill -->

                            <v-col cols="8" offset="3">
                                <div class="formfill text-center">

                                    <component :is="activeForm" :selectedUserData="selectedUserData"></component>

                                </div>
                            </v-col>

                        </v-row>



                    </div>
                </div>
            </v-content>

        <v-footer
            color="#5D98D8"
            app
        >
            <span class="white--text">&copy;2020 HKSolutions LLC</span>
        </v-footer>
    </section>
</template>

<script>
    /*Vuex store*/
    import store from '../../store';
    import { mapState} from 'vuex';

    import PdfExportNavigationDrawer from "./PdfExportNavigationDrawer";
    import PdfExportAddNewUser from "./PdfExportAddNewUser";
    import PdfExportLandingPage from "./PdfExportLandingPage";
    import Form_1099 from "./PdfFillableForms/Form_1099"
    import Form_1098 from "./PdfFillableForms/Form_1098"

    export default {
        name: "PdfExport",
        store,
        props: {

        },
            components: {
                PdfExportLandingPage, PdfExportNavigationDrawer, PdfExportAddNewUser, Form_1099, Form_1098
            },
        data(){
            return {
                selectedUser: '',
                selectedUserData: {},
                users: '',
            }
        },
        computed: {
            ...mapState('pdfExport', {
                activeForm: state => state.activeForm
            })
    },
        methods: {
            setUser(value) {
                var userlist = this.users;

                for (let user of userlist) {

                    if (user.fullname == value) {
                        this.selectedUserData = user;
                    }
                }
            },

            updateCandidates(newUser ='null') {
                axios({
                    method: 'GET',
                    url: '/projects/pdfexport/getusers',
                    responseType: 'json'
                }).then(response => {
                   this.users = response.data;
                    this.users.forEach(user => {
                        user.fullname = user.firstname+" "+user.lastname;
                    });
                    if(newUser != 'null'){
                        let addedUser = this.users[this.users.length-1];
                        console.log(addedUser);
                        this.selectedUser = addedUser.fullname;
                        this.setUser(addedUser.fullname);
                    };
                })
            },
            setNewUser(){
               this.updateCandidates('newuser');

            }

        },
        created() {
           this.users = this.updateCandidates();
        }
    }

</script>

<style lang="sass" scoped>
     @import '../../../sass/app'

     *
        font-family: 'Red Hat Display'

     .mainSection
         width: 85%

     .appName
         color: $brightblue
         font-size: 4em
         text-shadow: 1px 1px $bluegrey

     .formActionsNav
         padding: 1.5em
         height: 100vh
         position: fixed


    .userSelect
        margin-top: 10vh

    .formActionButtons
        margin-top: 15vh


    .formfill
        display: flex
        justify-content: center




</style>

<template>

        <v-navigation-drawer
            permanent
            fixed
            right
            color="#5D98D8"
            dark
            width="15%"
        >

            <v-list>


                <!---parent--->
                <v-list-group
                    prepend-icon="account_circle"

                >
                    <template v-slot:activator>
                        <v-list-item-title>Administrative</v-list-item-title>
                    </template>

                    <!---child--->

                    <v-list-group
                        no-action
                        sub-group

                    >
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title>Change Requests (Empty)</v-list-item-title>
                            </v-list-item-content>
                        </template>

                        <v-list-item
                            v-for="([name,code], i) in administrative.cr"
                            :key="i"
                            link
                        >
                            <v-list-item-title v-text="name"></v-list-item-title>

                        </v-list-item>
                    </v-list-group>

                    <!---child--->
                    <v-list-group
                        sub-group
                        no-action
                    >
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title>Human Resources  (Empty)</v-list-item-title>
                            </v-list-item-content>
                        </template>
                        <v-list-item
                            v-for="([name,code], i) in administrative.hr"
                            :key="i"
                            @click=""
                        >
                            <v-list-item-title v-text="name"></v-list-item-title>
                        </v-list-item>
                    </v-list-group>

                    <!---child--->
                    <v-list-group
                        sub-group
                        no-action
                    >
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title>Taxes</v-list-item-title>
                            </v-list-item-content>
                        </template>
                        <v-list-item
                            v-for="([name,code], i) in administrative.taxes"
                            :key="i"
                            @click=""
                        >

                            <v-list-item-title v-text="name" @click="setForm(code)"></v-list-item-title>

                        </v-list-item>
                    </v-list-group>



                </v-list-group>

                <!---parent--->
                <v-list-group
                    prepend-icon="mdi-map-marker"

                >
                    <template v-slot:activator>
                        <v-list-item-title>Example Component</v-list-item-title>
                    </template>

                    <!---child--->

                    <v-list-group
                        no-action
                        sub-group

                    >
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title>Onboarding (Empty)</v-list-item-title>
                            </v-list-item-content>
                        </template>

                        <v-list-item
                            v-for="([name,code], i) in operations.onboarding"
                            :key="i"
                            link
                        >
                            <v-list-item-title v-text="name"></v-list-item-title>
                        </v-list-item>
                    </v-list-group>

                    <!---child--->
                    <v-list-group
                        sub-group
                        no-action
                    >
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title>Billing (Empty)</v-list-item-title>
                            </v-list-item-content>
                        </template>
                        <v-list-item
                            v-for="([name,code], i) in operations.billing"
                            :key="i"
                            @click=""
                        >
                            <v-list-item-title v-text="name"></v-list-item-title>
                        </v-list-item>
                    </v-list-group>



                </v-list-group>


                <!---parent--->
                <v-list-group
                    prepend-icon="mdi-hospital-box"

                >
                    <template v-slot:activator>
                        <v-list-item-title>Example Component</v-list-item-title>
                    </template>

                    <!---child--->

                    <v-list-group
                        no-action
                        sub-group

                    >
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title>Enrollment (Empty)</v-list-item-title>
                            </v-list-item-content>
                        </template>

                        <v-list-item
                            v-for="([name,code], i) in healthcare.enrollment"
                            :key="i"
                            link
                        >
                            <v-list-item-title v-text="name"></v-list-item-title>
                        </v-list-item>
                    </v-list-group>

                    <!---child--->
                    <v-list-group
                        sub-group
                        no-action
                    >
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title>Claims (Empty)</v-list-item-title>
                            </v-list-item-content>
                        </template>
                        <v-list-item
                            v-for="([name,code], i) in healthcare.claims"
                            :key="i"
                            @click=""
                        >
                            <v-list-item-title v-text="name"></v-list-item-title>
                        </v-list-item>
                    </v-list-group>



                </v-list-group>


            </v-list>


        </v-navigation-drawer>


</template>

<script>

    export default {
        name: "pdfExportNavigationDrawer",
        data(){
            return {
                administrative: {
                    cr: [


                    ],
                    hr: [


                    ],
                    taxes: [
                        ['1099', 'Form_1099'],
                        ['1098', 'Form_1098'],
                    ],
                },
                operations: {
                    onboarding: [


                    ],
                    billing: [
                        ['Invoices', 'null'],
                        ['Notices', 'null'],
                        ['Purchase Orders', 'null'],
                    ],
                },

                healthcare: {
                    enrollment: [


                    ],
                    claims: [

                    ],
                }
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

    .v-list-item:active
        color: black



</style>

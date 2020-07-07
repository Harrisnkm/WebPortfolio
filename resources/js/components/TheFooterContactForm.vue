<template>
        <v-dialog hide-overlay :max-width="dialogWidth" v-model="contactFormDialog">
            <template v-slot:activator="{on}">
                    <div v-on="on">
                       <slot></slot>
                    </div>
            </template>

            <template>
                <v-alert type="info" dismissible elevation="2" :value="msg">
                    Message sent. Thank you!
                </v-alert>
            </template>

            <v-card class="pa-4">
                <ValidationObserver v-slot="{ handleSubmit, reset, invalid }" ref="contactForm">
                    <v-form @submit.prevent="handleSubmit(sendEmail)" >
                <v-card-title class="mb-4">
                    <span class="contactHeadline">Contact Form</span>
                </v-card-title>
                <v-card-text>

                            <v-container>
                                <v-row>
                                    <v-col cols="12">
                                        <validation-provider rules="required" name="contactName" v-slot="{errors}">
                                        <v-text-field label="Name" name="contactName" v-model="form.contactName" :error-messages="errors"></v-text-field>
                                        </validation-provider>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col cols="12">
                                        <validation-provider rules="email|required" name="email" v-slot="{errors}">
                                        <v-text-field label="Email" name="email" v-model="form.email" :error-messages="errors"></v-text-field>
                                        </validation-provider>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col cols="12">
                                        <v-textarea
                                            name="message"
                                            solo
                                            v-model="form.message"
                                            label="Start message..."
                                        ></v-textarea>
                                    </v-col>
                                </v-row>
                            </v-container>
                </v-card-text>
                <v-card-actions>
                    <v-btn class="cta-btn mb-5" :disabled="invalid" type="submit">SEND</v-btn>
                </v-card-actions>
                    </v-form>
                </ValidationObserver>
            </v-card>
        </v-dialog>

</template>

<script>

    import { ValidationProvider, ValidationObserver, extend } from 'vee-validate'
    import { required, email } from 'vee-validate/dist/rules'

    extend('required', required);
    extend('email', email);


    export default {
        name: "TheFooterContactForm",
        components: {
            ValidationProvider,
            ValidationObserver
        },
        data(){
            return {
                form: new Form({
                    contactName: this.contactName,
                    email: this.email,
                    message: this.message
                }),
                contactFormDialog: false,
                msg: false
            }
        },
        methods: {
            sendEmail: function(){
                this.form.submit('POST', '/mail/contactForm')
                    .then(response => {
                        this.msg = true
                        this.form.reset()
                        this.$refs.contactForm.reset()
                    }).catch(() => console.log('error sending email'))
            }


        },
        computed: {
            dialogWidth: function(){
                return (screen.width < 800) ? '100vw' : '50vw'
            }
        }
    }
</script>

<style lang="sass" scoped>

    @import '../../sass/app'

    *
        font-family: "Red Hat Display"

    .contactHeadline
        color: $darkblue
        font-weight: bold
        font-size: 1.2em

        &:hover
            color: $lightblue
            transition: color .2s ease-in

        &:after
            content: ''
            display: block
            width: 4em
            height: 3px
            background-color: $lightblue
            margin: 10px 0 0



    .cta-btn
        border-radius: 10px
        background-color: $lightblue !important
        color: white
        width: 90%
        margin: auto






</style>

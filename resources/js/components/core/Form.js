/*
* Form Class
* */

import Errors from './Errors';

class Form {

    constructor(data) {
        this.originalData = data;

        //this makes it easier to access the properties: form.name instead of form.data.name
        for(let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();

    }

    data () {

        let data ={};

        for(let property in this.originalData){
            data[property] = this[property];
        }

        console.log(data);  //triggers 1st
        return data;
    }

    reset() {

        for (let field in this.originalData) {
            this[field] = '';
        }

        this.errors.clear();

    }

    post(url){
        return this.submit('POST', url);
    }

    delete(url){
        return this.submit('DELETE', url);
    }

    submit(requestType, url, responseType ='json') {

        return new Promise((resolve, reject) => {


            axios({
                method: requestType,
                url: url,
                responseType: responseType,
                data: this.data()
            })

            //rebind .this to the form instance.
                .then(response => {

                   // this.onSuccess(); Add this to the form.vue
                    console.log(response); //third to trigger
                    resolve(response.data);
                }).catch(error => {
                console.log(error); //third to trigger
                this.onFail(error.response.data);

                reject(error.response.data);
            })

        });



    }

    onSuccess() {


        //on successful submit. clear errors just to make sure.

        this.reset();

    }

    onFail(error) {


        this.errors.record(error);

    }

}

export default Form;

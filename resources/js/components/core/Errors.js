/*
 * Errors Class
 * */

class Errors {

    constructor() {
        this.errors = {};
    }

    has(field) {
        return this.errors.hasOwnProperty(field);
    }

    any(){
        //check to see if errors object keys array (field names) has a length greater than 0
        return Object.keys(this.errors).length > 0;
    }

    get(field) {
        if(this.errors[field]){

            return this.errors[field][0];
        }
    }

    record(errors){
        this.errors = errors.errors;
        //console.log(this.errors);

    }

    clear(field) {
        if(field) {
            delete this.errors[field];
            return;
        }

        this.errors = {};
    }
}

export default Errors;

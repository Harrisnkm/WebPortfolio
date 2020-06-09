
export default {

    data() {
      return {
          loadingProgress: false
      }
    },
    methods: {
        //submit Form
        onSubmit(formName,formInstance) {
            this.loadingProgress = !this.loadingProgress
            //ajax call here to send the form data to pdfExportController
            formInstance.submit('POST', `/projects/pdfexport/${formName}`, 'blob')
                .then(response => {
                    console.log(response)
                    this.loadingProgress = !this.loadingProgress
                        this.forceFileDownload(response, formName)
                })
                .catch(() => console.log('error occured'))
        },
        forceFileDownload(response, formName) {
            const url = window.URL.createObjectURL(new Blob([response], {type: 'application/pdf'}));
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', formName); //or any other extension
            document.body.appendChild(link);
            console.log(link);
            link.click();
        },
        // returns formatted date
        formatDate(date) {
            if (!date) return null;
            const [year, month, day] = date.split('-');
            return `${month}/${day}/${year}`
            }
        },
        watch: {
            selectedUserData: function () {

                for (let [key, value] of Object.entries(this.selectedUserData)) {
                    if (this.form[key] || typeof this.form[key] == 'undefined') {
                        this.form[key] = value;
                    }
                }
                deep:true;
            }
        }

}





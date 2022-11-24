export default {
    name: 'alert',
    props: {
        status: {
            type: String,
            default: null,
        },
        message: {
            type: String,
            default: null,
        },
    },
    computed: {
        displayAlert() {
            return this.status && this.message;
        },
        isError() {
            return this.displayAlert && this.status === 'ERROR';
        },
        isSuccess() {
            return this.displayAlert && this.status === 'SUCCESS';
        },
    }
}

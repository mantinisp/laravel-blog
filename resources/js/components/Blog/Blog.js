export default {
    name: 'blog',
    props: {
        blogs: {
            type: Array,
            default: [],
        },
        editable: {
            type: Boolean,
            default: false,
        },
        defaultPage: {
            type: String,
            default: null,
        },
    },
};

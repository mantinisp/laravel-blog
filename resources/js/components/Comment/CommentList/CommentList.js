export default {
    name: 'comment-list',
    props: {
        blogComments: {
            type: Array,
            default: null,
        },
        user: {
            type: Object,
            default: null,
        },
        defaultPage: {
            type: String,
            default: null,
        },
    },
};

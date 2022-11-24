export default {
    name: 'comment-item',
    props: {
        blogComment: {
            type: Object,
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
    computed: {
        formatCommentDate() {
            const createdAt = new Date(this.blogComment.created_at);

            return createdAt.getFullYear() + '-' + createdAt.getMonth() + '-' + createdAt.getDate();
        },
    },
    methods: {
        handleDeleteComment(event) {
            event.preventDefault();
            event.stopPropagation();

            axios.delete(this.defaultPage + /delete-comment/ + this.blogComment.id)
                .then((response) => {
                    if (response.data?.success) {
                        window.location.reload();
                    }
                })
                .catch((error) => {});
        },
    },
};

export default {
    name: 'create-comment',
    props: {
        user: {
            type: Object,
            default: null,
        },
        blog: {
            type: Object,
            default: null,
        },
        createCommentRoute: {
            type: String,
            default: null,
        },
    },
    data() {
        return {
            formData: {
                comment: '',
            },
            isPosting: false,
        };
    },
    methods: {
        submitComment(event) {
            event.preventDefault();
            event.stopPropagation();
            this.isPosting = true;

            const data = new FormData();
            data.append('blog_id', this.blog.id);
            data.append('comment', this.formData.comment);

            axios.post(this.createCommentRoute, data)
                .then((response) => {
                    if (response.data?.success) {
                        window.location.reload();
                    }
                })
                .catch((error) => {})
                .finally(() => {
                    this.isPosting = false;
                });
        },
    },
};

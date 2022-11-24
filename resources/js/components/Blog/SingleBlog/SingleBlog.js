import blogMixin from "../../../mixins/blogMixin";

export default {
    name: 'single-blog',
    props: {
        blog: {
            type: Object,
            default: null,
        },
        defaultPage: {
            type: String,
            default: null,
        },
        editBlogRoute: {
            type: String,
            default: null,
        },
        createCommentRoute: {
            type: String,
            default: null,
        },
        user: {
            type: Object,
            default: null,
        }
    },
    mixins: [blogMixin],
    computed: {
        formatBlogDate() {
            const createdAt = new Date(this.blog.created_at);

            return createdAt.getFullYear() + '-' + createdAt.getMonth() + '-' + createdAt.getDate();
        },
        isUserCanPostComment() {
            return this.user?.id || false;
        }
    },
}

import blogMixin from "../../../mixins/blogMixin";

export default {
    name: "blog-item",
    props: {
        blog: {
            type: Object,
            default: null,
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
    mixins: [blogMixin],
    computed: {
        showBlogPath() {
            return this.blog?.id
                ? `${this.defaultPage}/blog/${this.blog.id}`
                : this.defaultPage;
        },
        editBlogPath() {
            return this.blog?.id
                ? `${this.defaultPage}/edit-blog/${this.blog.id}`
                : null;
        },
        deleteBlogPath() {
            return this.blog?.id ? `${this.defaultPage}/delete-blog/${this.blog.id}` : null;
        },
        blogTitle() {
            return this.blog.title.length > 40 ? this.blog.title.substring(0, 40) + '...' : this.blog.title;
        },
        blogDescription() {
            return this.blog.description.length > 80 ? this.blog.description.substring(0, 80) + '...' : this.blog.description;
        },
    },
    methods: {
        handleDeleteBlog(blog, event) {
            event.preventDefault();
            event.stopPropagation();

            axios.delete(this.deleteBlogPath)
                .then((response) => {
                    if (response.data?.success) {
                        window.location.reload();
                    }
                })
                .catch((error) => {});
        }
    }
}

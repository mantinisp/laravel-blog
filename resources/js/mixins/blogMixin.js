const blogMixin = {
    computed: {
        imagePath() {
            return this.blog?.id && this.blog?.image
                ? `${this.defaultPage}/..${this.blog.image}`
                : `${this.defaultPage}/images/no-image.png`;
        },
        formatBlogDate() {
            const createdAt = new Date(this.blog.created_at);

            return createdAt.getFullYear() + '-' + createdAt.getMonth() + '-' + createdAt.getDate();
        },
    },
};

export default blogMixin;

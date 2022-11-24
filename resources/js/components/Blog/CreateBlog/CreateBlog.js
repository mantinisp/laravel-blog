export default {
    name: 'CreateBlog',
    props: {
        actionRoute: {
            type: String,
            default: null,
        },
        blog: {
            type: Object,
            default: null,
        },
    },
    data() {
        return {
            formData: {
                title: '',
                description: '',
                image: null,
                public: false,
            },
            alertNotification: {
                status: null,
                message: null,
            }
        }
    },
    mounted() {
      if (this.blog?.id) {
          this.formData.title = this.blog?.title;
          this.formData.description = this.blog?.description;
          this.formData.public = this.blog?.public;
      }
    },
    methods: {
        handleImageFileChange(event) {
            this.formData.image = event.target.files[0];
        },
        submitBlog(event) {
            event.preventDefault();
            event.stopPropagation();

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            };
            const data = new FormData();
            data.append('title', this.formData.title);
            data.append('description', this.formData.description);
            data.append('public', this.formData.public ? "1" : "0");

            if (this.formData.image) {
                data.append('image', this.formData.image);
            }
            if (this.blog?.id) {
                this.updateBlogData(data, config);
            } else {
                axios.post(this.actionRoute, data, config)
                    .then((response) => {
                        if (response.data?.data?.id) {
                            this.alertNotification.status = 'SUCCESS';
                            this.alertNotification.message = 'Blog created';
                            window.location.href = response.data.data.path;
                        }
                    })
                    .catch((error) => {
                        if (error.response?.data?.message) {
                            this.alertNotification.status = 'ERROR';
                            this.alertNotification.message = error.response.data.message;
                        }
                    });
            }
        },
        updateBlogData(formData, config) {
            axios.post(this.actionRoute, formData, config)
                .then((response) => {
                    if (response.data?.data?.id) {
                        this.alertNotification.status = 'SUCCESS';
                        this.alertNotification.message = 'Blog updated';
                        window.location.href = response.data.data.path;
                    }
                })
                .catch((error) => {
                    if (error.response?.data?.message) {
                        this.alertNotification.status = 'ERROR';
                        this.alertNotification.message = error.response.data.message;
                    }
                });
        },
    },
}

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('alert', require('./components/Alert/Alert.vue').default);
Vue.component('blog', require('./components/Blog/Blog.vue').default);
Vue.component('blog-list', require('./components/Blog/BlogList/BlogList.vue').default);
Vue.component('blog-item', require('./components/Blog/BlogItem/BlogItem.vue').default);
Vue.component('single-blog', require('./components/Blog/SingleBlog/SingleBlog.vue').default);
Vue.component('create-blog', require('./components/Blog/CreateBlog/CreateBlog.vue').default);

Vue.component('create-comment', require('./components/Comment/CreateComment/CreateComment.vue').default);
Vue.component('comment-list', require('./components/Comment/CommentList/CommentList.vue').default);
Vue.component('comment-item', require('./components/Comment/CommentItem/CommentItem.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

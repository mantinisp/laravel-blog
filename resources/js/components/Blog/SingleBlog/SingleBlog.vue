<template>
    <div v-if="blog.title">
        <div class="p-6 flex flex-wrap">
            <div class="single-blog__image">
                <img class="rounded" :src="imagePath" alt="" />
            </div>
            <div class="single-blog__post pl-0 md:pl-4 pr-0 md:pr-4">
                <div class="w-full flex flex-col md:flex-row justify-center md:justify-end mt-2 md:mt-0">
                    <div>
                        <a v-if="user && user.id === blog.user_id"
                           :href="editBlogRoute"
                           class="text-blue-500 hover:text-blue-700 hover:underline"
                        >
                            Edit blog
                        </a>&nbsp;
                    </div>
                    <div>Author:&nbsp;<strong>{{ blog.user.name }}</strong>&nbsp;</div>
                    <div>Date:&nbsp;<strong>{{ formatBlogDate }}</strong>&nbsp;</div>
                    <div>
                        <button
                            v-if="!blog.public && user && user.id === blog.user_id"
                            type="button"
                            class="inline-block px-4 py-2 bg-red-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out"
                        >
                            Private
                        </button>
                    </div>
                </div>
                <h2 class="font-medium mt-2 text-justify md:text-3xl">
                    {{ blog.title }}
                </h2>
                <p class="mt-2">
                    {{ blog.description }}
                </p>
            </div>
        </div>
        <div class="p-6 single-page__comment-section flex flex-wrap">
            <div class="single-page__comment-field">
                <create-comment
                    v-if="isUserCanPostComment"
                    :user="user"
                    :blog="blog"
                    :create-comment-route="createCommentRoute"
                ></create-comment>
                <div v-else class="font-medium text-gray-900 dark:text-white">
                    If you want to write comment, first you need to login
                </div>
            </div>
            <div v-if="blog.blog_comments && blog.blog_comments.length > 0" class="single-page__comment-list">
                <div>Comments</div>
                <comment-list :blog-comments="blog.blog_comments" :user="user" :default-page="defaultPage"></comment-list>
            </div>
            <div v-else class="single-page__comment-list">
                <div v-if="isUserCanPostComment" class="text-center">No comments</div>
            </div>
        </div>
    </div>
</template>

<script src="./SingleBlog.js"></script>

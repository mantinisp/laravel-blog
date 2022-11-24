<template>
    <ul class="max-w divide-y divide-gray-200 dark:divide-gray-700">
        <comment-item
            v-for="blogComment in blogComments"
            :key="blogComment.id"
            :blog-comment="blogComment"
            :user="user"
            :default-page="defaultPage"
        ></comment-item>
    </ul>
</template>

<script src="./CommentList.js"></script>

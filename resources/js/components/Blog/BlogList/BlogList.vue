<template>
    <div class="flex flex-wrap blog-list">
        <blog-item
            v-for="(blog, index) in blogs"
            :key="index"
            :blog="blog"
            :default-page="defaultPage"
            :editable="editable"
            class="blog-item mb-4"
        />
    </div>
</template>

<script src="./BlogList.js"></script>

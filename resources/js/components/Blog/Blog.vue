<template>
    <div class="pt-3">
        <div v-if="blogs.length > 0">
            <blog-list :blogs="blogs" :editable="editable" :default-page="defaultPage" />
        </div>
        <div class="text-center" v-else>
            We couldn't find any blogs
        </div>
    </div>
</template>

<script src="./Blog.js"></script>

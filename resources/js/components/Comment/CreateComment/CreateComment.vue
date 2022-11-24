<template>
    <div class="mb-6 pr-0 md:pr-4">
        <form method="post" @submit="submitComment" :action="createCommentRoute">
            <label
                for="blog-comment"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >
                Your comment
            </label>
            <textarea
                v-model="formData.comment"
                id="blog-comment"
                class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
            </textarea>
            <button
                type="submit"
                class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-xs w-full sm:w-auto px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                :disabled="isPosting"
            >
                Post
            </button>
        </form>
    </div>
</template>

<script src="./CreateComment.js"></script>

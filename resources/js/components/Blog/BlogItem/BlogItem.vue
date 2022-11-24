<template>
    <div class="flex w-64">
        <div
            class="rounded-lg shadow-lg bg-white"
            :class="{ 'opacity-50': !blog.public }"
        >
            <a class="blog-item__image-container" :href="showBlogPath">
                <img class="rounded-t-lg" :src="imagePath" alt="" />
                <div v-if="editable" class="blog-item__image-editable flex justify-end px-4 pt-4 z-10">
                    <button
                        :id="'dropdownButton-' + blog.id"
                        :data-dropdown-toggle="'dropdown-' + blog.id"
                        class="inline-block text-white dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 rounded-lg text-sm p-1.5"
                        type="button"
                        @click.prevent="$event.stopPropagation()"
                    >
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                    </button>
                    <div :id="'dropdown-' + blog.id" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                        <ul class="py-1" :aria-labelledby="'dropdownButton-' + blog.id">
                            <li>
                                <a
                                    :href="editBlogPath"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                >
                                    Edit
                                </a>
                            </li>
                            <li>
                                <button
                                    type="button"
                                    class="w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                    @click="handleDeleteBlog(blog, $event)"
                                >
                                    Delete
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </a>
            <div class="p-6 flex flex-col blog-item__body">
                <h5 class="flex align-items-center text-gray-900 text-md font-medium mb-2">
                    {{ blogTitle }}
                    <span v-if="blog.blog_comments.length > 0" class="text-gray-500 text-sm ml-1">
                        ({{ blog.blog_comments.length }})
                    </span>
                </h5>
                <div class="text-gray-700 text-sm mb-4" style="flex: 1 1 auto;" v-html="blogDescription"></div>
                <div style="flex-shrink: 0">
                    <div v-if="!editable" class="flex">
                        <a :href="showBlogPath" class="inline-block px-4 py-2 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            Read
                        </a>
                        <div v-if="blog.user && blog.user.name" class="ml-2 font-medium text-decoration-underline">{{ blog.user.name }}</div>
                    </div>
                    <div v-else>
                        <a :href="showBlogPath" class="inline-block px-4 py-2 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            Read
                        </a>
                        <button
                                v-if="blog.public && editable"
                                type="button"
                                class="inline-block px-4 py-2 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out"
                        >
                            Public
                        </button>
                        <button
                                v-else-if="!blog.public && editable"
                                type="button"
                                class="inline-block px-4 py-2 bg-red-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out"
                        >
                            Private
                        </button>
                    </div>
                    <div class="flex justify-end mt-2">{{ formatBlogDate }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script src="./BlogItem.js"></script>

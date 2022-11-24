<template>
    <li class="pb-3 pb-4 pt-4">
        <div class="flex items-center space-x-4">
            <div class="flex-shrink-0">
                <div class="overflow-hidden relative w-10 h-10 bg-gray-100 rounded-full dark:bg-gray-600">
                    <svg class="absolute -left-1 w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                </div>
            </div>
            <div class="flex-1 min-w-0">
                <p
                    class="text-sm font-medium text-gray-900 truncate dark:text-white"
                    :class="{ 'text-blue-500': user && user.id === blogComment.user.id }"
                >
                    {{ blogComment.user.name }}
                </p>
                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                    {{ blogComment.comment }}
                </p>
            </div>
            <div class="flex flex-col items-center text-base font-semibold text-gray-900 dark:text-white">
                {{ formatCommentDate }}
                <button
                    v-if="user && user.id === blogComment.user.id"
                    type="button"
                    class="inline-block px-2 py-1 bg-red-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out"
                    @click="handleDeleteComment"
                >
                    Delete
                </button>
            </div>
        </div>
    </li>
</template>

<script src="./CommentItem.js"></script>

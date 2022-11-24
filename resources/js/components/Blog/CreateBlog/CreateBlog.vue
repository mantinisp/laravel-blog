<template>
    <div class="p-6">
        <div class="pb-3 border-b border-gray-300 ">
            <h3 v-if="blog && blog.id" class="font-medium leading-tight text-3xl mt-0">
                Edit blog
            </h3>
            <h3 v-else class="font-medium leading-tight text-3xl mt-0">
                Create blog
            </h3>
        </div>
        <div class="pt-4">
            <alert
                 v-if="alertNotification.status && alertNotification.message"
                 :status="alertNotification.status"
                 :message="alertNotification.message"
            ></alert>
            <form @submit="submitBlog" enctype="multipart/form-data" :action="actionRoute">
                <div class="relative z-0 mb-6 w-full group">
                    <input
                        v-model="formData.title"
                        type="title"
                        name="title"
                        id="title"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" "
                        required
                    />
                    <label
                        for="title"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Blog title
                    </label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <textarea
                        v-model="formData.description"
                        name="description"
                        id="description"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" "
                        required
                    >
                    </textarea>
                    <label
                        for="description"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Blog description
                    </label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input
                        type="file"
                        id="image"
                        name="image"
                        accept="image/png, image/jpeg"
                        @change="handleImageFileChange"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    />
                </div>
                <div class="flex items-center mb-4">
                    <input
                        v-model="formData.public"
                        id="checkbox-1"
                        type="checkbox"
                        value="1"
                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    >
                    <label
                        for="checkbox-1"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >
                        Public blog?
                    </label>
                </div>
                <button
                    type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                    Submit
                </button>
            </form>
        </div>
    </div>
</template>

<script src="./CreateBlog.js"></script>

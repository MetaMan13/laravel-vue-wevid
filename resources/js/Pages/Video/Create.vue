<template>

    <div class="bg-white w-full px-6 py-6 rounded-md shadow-sm border border-gray-200">
        <div>
            <h2 class="text-3xl">Create a video</h2>
        </div>
        <div class="mt-10">
            <form @submit.prevent="storeVideo">

                <!-- Video title -->
                <div>
                    <div class="flex flex-col">
                        <label class="mb-1 text-base">Video title</label>
                        <input v-model="form.title" type="text" placeholder="Please enter a video title" class="resize-none border border-gray-200 rounded-md focus:ring-transpatent focus:ring-0 focus:border-gray-300 placeholder-gray-400">
                    </div>

                    <div v-if="errors.title" class="mt-2">
                        <p class="text-sm text-red-600">{{ errors.title }}</p>
                    </div>
                </div>

                <!-- Video description -->
                <div class="mt-6">
                    <div class="flex flex-col">
                        <label class="mb-1 text-base">Video description</label>
                        <textarea v-model="form.description" cols="30" rows="10" placeholder="Enter a video description ( optional )" class="resize-none border border-gray-200 rounded-md focus:ring-transpatent focus:ring-0 focus:border-gray-300 placeholder-gray-400"></textarea>
                    </div>

                    <div v-if="errors.description" class="mt-2">
                        <p class="text-sm text-red-600">{{ errors.description }}</p>
                    </div>
                </div>

                <!-- Video file -->
                <div class="mt-6">
                    <div class="flex flex-col">
                        <label for="" class="mb-1 text-base">Video file</label>
                        <input @input="form.file = $event.target.files[0]" type="file" accept="video/mp4,video/x-m4v,video/*" class="hidden">
                        <div class="bg-white py-10 border border-gray-200 rounded-md hover:bg-gray-50">
                            <div class="flex justify-center">
                                <div>
                                    <div class="flex justify-center">
                                        <upload
                                            :height="24"
                                            :width="24"
                                            >
                                        </upload>
                                    </div>
                                    <div class="flex justify-center">
                                        <p>Upload file</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-if="errors.file" class="mt-2">
                        <p class="text-sm text-red-600">{{ errors.file }}</p>
                    </div>
                </div>

                <!-- Form submit -->
                <div class="mt-6">
                    <div>
                        <!-- <button :class="{'bg-gray-100 text-gray-400 cursor-not-allowed' : form.processing }" :disabled="form.processing" class="border border-gray-200 w-full py-4 rounded-md hover:bg-gray-50">Upload Video</button> -->
                        <button :class="{'hidden' : form.processing }" :disabled="form.processing" class="bg-gray-600 text-white border border-gray-200 w-full py-4 rounded-md hover:bg-gray-500">Upload Video</button>
                        <p v-if="form.progress">
                            {{ form.progress.percentage}}%
                        </p>
                        <button v-show="form.processing" class="bg-red-500 text-white border border-gray-200 w-full py-4 rounded-md">Cancel</button>
                    </div>

                    <div>
                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>
                        <p v-if="form.progress">
                            {{ form.progress.percentage}}%
                        </p>
                    </div>
                </div>

            </form>
        </div>
    </div>
</template>

<script>

import { useForm } from '@inertiajs/inertia-vue3'
import UserDashboard from './../../Layouts/UserDashboard.vue'
import Upload from './../../Components/Icons/Upload.vue'

export default {
    layout: UserDashboard,
    components: {
        Upload,
    },
    props: {
        errors: Object,
    },
    data(){
        return{
            form: useForm({
                title: null,
                description: null,
                file: null,
            })
        }
    },
    methods:{
        storeVideo(){
            this.form.post('/dashboard/videos', this.form)
        },
    },
}
</script>
<template>

    <div class="bg-white w-full px-8 py-8 rounded-md shadow-sm border border-gray-200">
        <div class="flex items-center gap-2">
            <h2 class="text-3xl">Create a video</h2>
            <movie
                :width="28"
                :height="28"
                >
            </movie>
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
                        <textarea v-model="form.description" cols="20" rows="7" placeholder="Enter a video description ( optional )" class="border border-gray-200 rounded-md focus:ring-transpatent focus:ring-0 focus:border-gray-300 placeholder-gray-400"></textarea>
                    </div>

                    <div v-if="errors.description" class="mt-2">
                        <p class="text-sm text-red-600">{{ errors.description }}</p>
                    </div>
                </div>

                <!-- Video file -->
                <!-- File upload component START -->
                <div class="mt-6">
                    <div class="flex flex-col">
                        <label for="" class="mb-1 text-base" :class="{ 'hidden' : form.processing }">Video file</label>
                        <input @input="appendFile($event)" id="fileInput" ref="fileInput" type="file" accept="video/mp4,video/x-m4v,video/*" class="hidden">
                        <div :class="{ 'hidden' : form.processing }" class="bg-white border border-gray-200 rounded-md hover:shadow-sm hover:bg-gray-50">
                            <div class="flex justify-center">

                                <!-- If file input is null -->
                                <div v-if="form.file == null" 
                                    @click="openFileExplorer" 
                                    @dragover.prevent @drop.prevent="appendDragAndDropFile($event)" 
                                    class="py-10 w-full h-full cursor-pointer"
                                    >

                                    <div class="flex justify-center">
                                        <upload
                                            :height="24"
                                            :width="24"
                                            >
                                        </upload>
                                    </div>
                                    <div class="flex justify-center mt-2">
                                        <p class="font-semibold">Upload file</p>
                                    </div>
                                </div>

                                <!-- If file is selected -->
                                <div v-if="form.file != null" :class="{ 'hidden' : form.processing }" class="py-6 w-full h-full">

                                    <div class="flex justify-center">
                                        <p>{{ form.file.name }}</p>
                                    </div>

                                    <div class="flex justify-center mt-6">
                                        <button @click="discartFile" :disabled="form.processing" :class="{'cursor-not-allowed' : form.processing }" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 cursor-pointer rounded-md font-semibold flex gap-1 items-center justify-center select-none">
                                            Discart
                                            <trash
                                                :width="16"
                                                :height="16"
                                                class="text-white self-center mb-1"
                                                >
                                            </trash>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-if="errors.file" class="mt-2">
                        <p class="text-sm text-red-600">{{ errors.file }}</p>
                    </div>
                </div>
                <!-- File upload component END -->
                

                <!-- Form submit -->
                <div class="mt-6">
                    <div>
                        <div v-if="form.progress" class="bg-gray-600 rounded-md flex flex-col items-center py-6 -mt-6">
                            <p class="text-gray-300 mb-4">Uploading {{ form.progress.percentage }}%</p>
                            <!-- <p class="text-gray-300 mb-4">Uplaoding 84%</p> -->
                            <img src="/images/icons/loading.png" alt="Spinner" class="h-8 w-8 animate-spin">
                        </div>
                        <button :class="{'bg-gray-600 text-gray-400 cursor-not-allowed hover:bg-gray-600 hidden' : form.processing, 'bg-gray-600 hover:bg-gray-700 text-white' : !form.processing }" :disabled="form.processing" class="text-white border border-gray-200 w-full py-4 rounded-md">Upload Video</button>
                        <button v-show="form.processing" @click="form.cancel()" type="button" class="bg-red-500 hover:bg-red-600 text-white border border-gray-200 w-full py-4 rounded-md mt-4">
                            Cancel
                        </button>
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
import Movie from './../../Components/Icons/Movie.vue'
import Trash from './../../Components/Icons/Trash.vue'

export default {
    layout: UserDashboard,
    components: {
        Upload,
        Movie,
        Trash,
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
        // URL.createObjectURL()
        storeVideo(){
            this.form.post('/dashboard/videos', this.form)
        },
        
        openFileExplorer(){
            this.$refs.fileInput.click()
        },
        appendFile(event){
            this.form.file = event.target.files[0]
        },
        appendDragAndDropFile(){
            this.form.file = event.dataTransfer.files[0]
        },
        discartFile(){
            document.getElementById('fileInput').value = null;
            this.form.file = null
        }
    },
}
</script>
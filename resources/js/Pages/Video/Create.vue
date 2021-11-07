<template>
    <div
        class="
            bg-white
            w-full
            px-8
            py-8
            rounded-md
            shadow-sm
            border border-gray-200
        "
    >
        <div class="flex items-center gap-2">
            <h2 class="text-3xl">Create a video</h2>
            <movie :width="28" :height="28"> </movie>
        </div>
        <div class="mt-10">
            <form @submit.prevent="storeVideo">
                <!-- Video title -->
                <div>
                    <div class="flex flex-col">
                        <label class="mb-1 text-base">Video title</label>
                        <input
                            v-model="form.title"
                            type="text"
                            placeholder="Please enter a video title"
                            class="
                                resize-none
                                border border-gray-200
                                rounded-md
                                focus:ring-transpatent
                                focus:ring-0
                                focus:border-gray-300
                                placeholder-gray-400
                            "
                        />
                    </div>

                    <div v-if="errors.title" class="mt-2">
                        <p class="text-sm text-red-600">{{ errors.title }}</p>
                    </div>
                </div>

                <!-- Video description -->
                <div class="mt-6">
                    <div class="flex flex-col">
                        <label class="mb-1 text-base">Video description</label>
                        <textarea
                            v-model="form.description"
                            cols="20"
                            rows="7"
                            placeholder="Enter a video description ( optional )"
                            class="
                                border border-gray-200
                                rounded-md
                                focus:ring-transpatent
                                focus:ring-0
                                focus:border-gray-300
                                placeholder-gray-400
                            "
                        ></textarea>
                    </div>

                    <div v-if="errors.description" class="mt-2">
                        <p class="text-sm text-red-600">
                            {{ errors.description }}
                        </p>
                    </div>
                </div>

                <!-- Video file -->
                <!-- File upload component START -->
                <div class="mt-6">
                    <div class="flex flex-col">
                        <label class="mb-1 text-base">Video file</label>
                        <input
                            @input="appendFile($event)"
                            id="fileInput"
                            ref="fileInput"
                            type="file"
                            accept="video/mp4"
                            class="hidden"
                        />
                        <div
                            class="
                                bg-white
                                border border-gray-200
                                rounded-md
                                hover:shadow-sm hover:bg-gray-50
                            "
                        >
                            <div class="flex justify-center">
                                <!-- If file input is null -->
                                <div
                                    v-if="form.file == null"
                                    @click="openFileExplorer"
                                    @dragover.prevent
                                    @drop.prevent="
                                        appendDragAndDropFile($event)
                                    "
                                    class="py-9 w-full h-full cursor-pointer"
                                >
                                    <div class="flex justify-center">
                                        <upload :height="24" :width="24">
                                        </upload>
                                    </div>
                                    <div class="flex justify-center mt-2">
                                        <p class="font-semibold">Upload file</p>
                                    </div>
                                    <div
                                        class="
                                            flex
                                            justify-center
                                            mt-0.5
                                            pb-0.5
                                        "
                                    >
                                        <p class="text-xs text-gray-500">
                                            ( .mp4 files only )
                                        </p>
                                    </div>
                                </div>

                                <!-- If file is selected START -->
                                <div
                                    v-if="form.file != null"
                                    @dragover.prevent
                                    @drop.prevent="
                                        appendDragAndDropFile($event)
                                    "
                                    class="w-full h-full"
                                >
                                    <div v-if="videoSource">
                                        <video
                                            ref="videoPreviewElement"
                                            class="
                                                w-full
                                                h-72
                                                border-b border-gray-200
                                                rounded-tl-md rounded-tr-md
                                                bg-gray-800
                                            "
                                            controls
                                            autoplay
                                            loop
                                        >
                                            <source
                                                :src="videoSource"
                                                type="video/mp4"
                                            />
                                        </video>
                                        <div class="px-4 py-4">
                                            <div
                                                class="
                                                    flex
                                                    justify-between
                                                    items-center
                                                "
                                            >
                                                <h3
                                                    class="
                                                        text-2xl
                                                        font-semibold
                                                        underline
                                                    "
                                                >
                                                    File information
                                                </h3>
                                                <div class="">
                                                    <button
                                                        @click="discartFile"
                                                        :disabled="
                                                            form.processing
                                                        "
                                                        :class="{
                                                            'cursor-not-allowed':
                                                                form.processing,
                                                        }"
                                                        class="
                                                            bg-red-500
                                                            hover:bg-red-600
                                                            text-white
                                                            px-6
                                                            py-2
                                                            cursor-pointer
                                                            rounded-md
                                                            font-semibold
                                                            flex
                                                            gap-1
                                                            items-center
                                                            justify-center
                                                            select-none
                                                        "
                                                    >
                                                        Discart
                                                        <trash
                                                            :width="16"
                                                            :height="16"
                                                            class="
                                                                text-white
                                                                self-center
                                                                mb-1
                                                            "
                                                        >
                                                        </trash>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="flex gap-4 mt-4">
                                                <div class="w-full">
                                                    <p
                                                        class="
                                                            text-lg
                                                            font-semibold
                                                        "
                                                    >
                                                        File name:
                                                    </p>
                                                    <p class="text-base">
                                                        {{ form.file.name }}
                                                    </p>
                                                </div>
                                                <div class="w-full">
                                                    <p
                                                        class="
                                                            text-lg
                                                            font-semibold
                                                        "
                                                    >
                                                        Duration:
                                                    </p>
                                                    <p class="text-base">
                                                        {{
                                                            videoDuration
                                                        }}
                                                        seconds
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-4 py-4">
                                        <div>
                                            <h3
                                                class="
                                                    text-2xl
                                                    font-semibold
                                                    underline
                                                "
                                            >
                                                Create Gif
                                            </h3>
                                        </div>
                                        <div class="flex gap-4 mt-4">
                                            <div class="w-full flex flex-col">
                                                <label for="">From:</label>
                                                <!-- <input v-model="form.gifFrom" v-on:keydown.enter.prevent type="number" min="0" :max="videoDuration" step="0.1" class="resize-none border border-gray-200 rounded-md focus:ring-transpatent focus:ring-0 focus:border-gray-300 placeholder-gray-400"> -->
                                                <number-input
                                                    v-model="form.gifFrom"
                                                    v-on:keydown.enter.prevent
                                                    :min="0"
                                                    :max="videoDuration"
                                                    :step="0.1"
                                                >
                                                </number-input>

                                                <div
                                                    v-if="errors.gifFrom"
                                                    class="mt-2"
                                                >
                                                    <p
                                                        class="
                                                            text-sm text-red-600
                                                        "
                                                    >
                                                        {{ errors.gifFrom }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="w-full flex flex-col">
                                                <label for="">To:</label>
                                                <!-- <input v-model="form.gifTo" v-on:keydown.enter.prevent type="number" min="0" :max="videoDuration" step="0.1" class="resize-none border border-gray-200 rounded-md focus:ring-transpatent focus:ring-0 focus:border-gray-300 placeholder-gray-400"> -->

                                                <number-input
                                                    v-model="form.gifTo"
                                                    v-on:keydown.enter.prevent
                                                    :min="0"
                                                    :max="videoDuration"
                                                    :step="0.1"
                                                >
                                                </number-input>

                                                <div
                                                    v-if="errors.gifTo"
                                                    class="mt-2"
                                                >
                                                    <p
                                                        class="
                                                            text-sm text-red-600
                                                        "
                                                    >
                                                        {{ errors.gifTo }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- File selected END -->
                            </div>
                        </div>
                    </div>

                    <div
                        v-if="errors.file"
                        :class="{ hidden: form.file != null }"
                        class="mt-2"
                    >
                        <p class="text-sm text-red-600">{{ errors.file }}</p>
                    </div>
                </div>
                <!-- File upload component END -->
                <!-- Form submit -->
                <div class="mt-6">
                    <div>
                        <div
                            v-if="form.progress"
                            class="
                                bg-gray-600
                                rounded-md
                                flex flex-col
                                items-center
                                py-4
                            "
                        >
                            <p v-if="form.progress" class="text-gray-300">
                                Uploading {{ form.progress.percentage }}%
                            </p>
                            <!-- <p class="text-gray-300 mb-4">Uplaoding 84%</p> -->
                            <!-- <img src="/images/icons/loading.png" alt="Spinner" class="h-8 w-8 animate-spin"> -->
                        </div>
                        <button
                            :class="{
                                hidden: form.progress,
                                'bg-gray-600 text-gray-400 cursor-not-allowed hover:bg-gray-600':
                                    form.progress,
                                'bg-gray-600 hover:bg-gray-700 text-white transition duration-200 ease-in-out':
                                    !form.progress,
                            }"
                            :disabled="form.processing"
                            class="
                                text-white
                                border border-gray-200
                                w-full
                                py-4
                                rounded-md
                            "
                        >
                            Upload Video
                        </button>
                        <button
                            v-show="form.progress"
                            @click="form.cancel()"
                            type="button"
                            class="
                                bg-red-500
                                hover:bg-red-600
                                text-white
                                border border-gray-200
                                w-full
                                py-4
                                rounded-md
                                mt-4
                            "
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import UserDashboard from "./../../Layouts/UserDashboard.vue";
import Upload from "./../../Components/Icons/Upload.vue";
import Movie from "./../../Components/Icons/Movie.vue";
import Trash from "./../../Components/Icons/Trash.vue";
import NumberInput from "./../../Components/Shared/Forms/NumberInput.vue";

export default {
    layout: UserDashboard,
    components: {
        Upload,
        Movie,
        Trash,
        NumberInput,
    },
    props: {
        errors: Object,
    },
    data() {
        return {
            form: useForm({
                title: null,
                description: null,
                file: null,
                gifFrom: 0,
                gifTo: 0,
                duration: null,
            }),
            videoSource: null,
            videoDuration: null,
        };
    },
    methods: {
        storeVideo() {
            this.form.post("/dashboard/videos", this.form);
        },

        openFileExplorer() {
            this.$refs.fileInput.click();
        },
        appendFile(event) {
            if (this.form.file) {
                this.discartFile();
            }

            this.$nextTick(() => {
                this.form.file = event.target.files[0];
                this.handleFileAdded();
            });
        },
        appendDragAndDropFile(event) {
            if (this.form.file) {
                this.discartFile();
            }
            this.$nextTick(() => {
                this.form.file = event.dataTransfer.files[0];
                this.handleFileAdded();
            });
        },
        handleFileAdded() {
            this.videoSource = URL.createObjectURL(this.form.file);

            this.$nextTick(() => {
                const loaded = (data) => {
                    this.videoDuration =
                        Math.round(data.target.duration * 10) / 10;
                    this.form.duration =
                        Math.round(data.target.duration * 10) / 10;
                    this.$refs.videoPreviewElement.removeEventListener(
                        "loadedmetadata",
                        loaded
                    );
                };

                this.$refs.videoPreviewElement.addEventListener(
                    "loadedmetadata",
                    loaded
                );
            });
        },
        discartFile() {
            document.getElementById("fileInput").value = null;
            this.videoSource = null;
            this.form.file = null;
            this.gifFrom = 0;
            this.gifTo = 0;
        },
    },
};
</script>

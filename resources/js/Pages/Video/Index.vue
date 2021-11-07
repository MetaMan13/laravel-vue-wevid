<template>
    <!-- Upper index section -->
    <div class="w-full flex gap-6">
        <div
            class="
                bg-white
                w-full
                border border-gray-200
                shadow-sm
                px-6
                py-6
                flex
                gap-4
                items-center
                rounded-md
            "
        >
            <h2 class="text-3xl">My Videos</h2>
            <movie :height="28" :width="28"> </movie>
        </div>

        <div
            class="
                bg-white
                w-full
                border border-gray-200
                shadow-sm
                px-6
                py-6
                flex
                gap-4
                items-center
                rounded-md
            "
        >
            <h3>Uploaded videos:</h3>
        </div>
    </div>

    <!-- Action bar -->
    <div
        class="
            bg-white
            w-full
            mt-4
            px-6
            py-6
            rounded-md
            border border-gray-200
            shadow-sm
        "
    >
        <div>
            <Link
                :href="route('dashboard.videos.create')"
                class="
                    bg-gray-600
                    rounded-md
                    text-white
                    font-semibold
                    border
                    inline-block
                    border-gray-200
                    px-4
                    py-2
                    hover:bg-gray-700
                "
                >Create video</Link
            >
        </div>
    </div>

    <!-- Content -->
    <div class="w-full mt-4 grid grid-cols-4 gap-4">
        <div
            v-for="video in auth.user.videos"
            v-bind:key="video.id"
            class="bg-white border border-gray-200 shadow-sm rounded-md"
        >
            <div class="relative group">
                <img
                    :src="'/storage/' + video.thumbnail.file_name"
                    class="rounded-tl-md rounded-tr-md group-hover:hidden"
                />
                <img
                    :src="'/storage/' + video.gif.file_name"
                    class="rounded-tl-md rounded-tr-md hidden group-hover:block"
                />

                <div class="hidden group-hover:block">
                    <div
                        class="
                            absolute
                            top-0
                            left-0
                            z-20
                            flex
                            gap-8
                            items-center
                            justify-center
                            w-full
                            h-full
                        "
                    >
                        <Link
                            :href="route('dashboard.videos.edit', [video.id])"
                            class="
                                flex flex-col
                                items-center
                                gap-1
                                justify-center
                                text-gray-300
                                hover:text-white
                            "
                        >
                            <edit :width="22" :height="22"> </edit>
                            <p>Edit</p>
                        </Link>

                        <div
                            @click.prevent="deleteVideo(video)"
                            class="
                                flex flex-col
                                items-center
                                gap-1
                                justify-center
                                text-gray-300
                                hover:text-white
                                cursor-pointer
                            "
                        >
                            <trash :width="22" :height="22"> </trash>
                            <p>Delete</p>
                        </div>
                    </div>

                    <div
                        class="
                            absolute
                            top-0
                            left-0
                            w-full
                            h-full
                            rounded-tl-md
                            opacity-80
                            rounded-tr-md
                            bg-gray-800
                            z-10
                        "
                    ></div>
                </div>
            </div>

            <div class="px-4 py-4">
                <div>
                    <p class="font-semibold capitalize text-sm">
                        {{ video.title }}
                    </p>
                </div>
                <div class="mt-2">
                    <p class="text-sm">{{ video.created_at }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import UserDashboard from "./../../Layouts/UserDashboard.vue";
import { Link } from "@inertiajs/inertia-vue3";
import Movie from "./../../Components/Icons/Movie.vue";
import Edit from "./../../Components/Icons/Edit.vue";
import Trash from "./../../Components/Icons/Trash.vue";

export default {
    layout: UserDashboard,
    components: {
        Link,
        Movie,
        Edit,
        Trash,
    },
    props: {
        auth: Object,
    },
    methods: {
        deleteVideo(video) {
            this.$inertia.delete("/dashboard/videos/" + video.id);
        },
    },
};
</script>

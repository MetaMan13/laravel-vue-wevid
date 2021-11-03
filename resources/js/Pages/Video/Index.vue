<template>
    <div>
        <p>Video INDEX</p>
        <Link :href="route('dashboard.videos.create')">Create</Link>

        <div v-if="$page.props.flash.message">
            {{ $page.props.flash.message }}
        </div>

        <div class="mt-4">
            <div v-for="video in auth.user.videos" v-bind:key="video.id">
                <p>{{ video.title }}</p>
                <video width="320" height="320" muted controls>
                    <source :src="'/storage/' + video.file_name" type="video/mp4">
                </video>
                <Link :href="route('dashboard.videos.edit', [video.id])">Edit</Link>
                <button type="button" @click.once="deleteVideo(video)" class="ml-4">Delete</button>
            </div>
        </div>
    </div>
</template>

<script>

import UserDashboard from './../../Layouts/UserDashboard.vue'
import { Link } from '@inertiajs/inertia-vue3';

export default {
    layout: UserDashboard,
    components: {
        Link,
    },
    props: {
        auth: Object,
    },
    methods: {
        deleteVideo(video)
        {
            this.$inertia.delete('/dashboard/videos/' + video.id)
        }
    }
}
</script>
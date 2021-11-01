<template>
    <div>
        <p>Video INDEX</p>
        <Link :href="route('dashboard.videos.create')">Create</Link>
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
}
</script>
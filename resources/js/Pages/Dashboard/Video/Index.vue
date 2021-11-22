<template>
    <h1>Dashboard Videos Index</h1>

    <div class="flex gap-4">
        <Link :href="route('dashboard.videos.index')">Index</Link>
        <Link :href="route('dashboard.videos.create')">Create</Link>
    </div>
</template>

<script>
import UserDashboard from "@Layouts/UserDashboard";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    layout: UserDashboard,
    components: {
        Link,
    },
};
</script>

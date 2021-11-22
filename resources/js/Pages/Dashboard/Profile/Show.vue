<template>
    <div>
        <p class="font-semibold text-2xl">Profile show</p>
        <p>{{ auth.user.name }}</p>
        <Link
            :href="route('dashboard.profile.edit', [auth.user])"
            v-if="auth.user.id === user.id"
        >Edit profile</Link>
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
    props: {
        auth: Object,
        errors: Object,
        user: Object,
    },
};
</script>

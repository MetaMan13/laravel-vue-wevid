<template>
    <div class="bg-white w-full h-64 border border-gray-200 rounded-md pb-4 shadow-sm">
        <!-- Profile Picture and name -->
        <div
            class="bg-gradient-to-tl from-green-200 to-green-600 h-2/3 w-full rounded-tl-md rounded-tr-md"
        ></div>

        <div class="flex flex-col items-center justify-center relative border-t border-gray-100">
            <!-- Profile Picture -->
            <div class="w-full absolute -top-12 left-0 flex flex-col items-center justify-center">
                <div class="h-20 bg-green-200 w-20 rounded-full"></div>
                <p class="mt-2 text-lg">{{ user.name }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white w-full h-screen mt-4 rounded-md border shadow-sm border-gray-200">
        <p class="font-semibold text-2xl">Profile show</p>
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

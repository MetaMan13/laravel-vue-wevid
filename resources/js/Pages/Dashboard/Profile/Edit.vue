<template>
    <div>
        <p>PROFILE EDIT {{ auth.user.name }}</p>

        <label>Email</label>
        <input type="email" v-model="auth.user.email" />
    </div>
</template>

<script>
import UserDashboard from "@Layouts/UserDashboard";

export default {
    layout: UserDashboard,
    props: {
        auth: Object,
        errors: Object,
    },
};
</script>

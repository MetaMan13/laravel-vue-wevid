<template>
    <div>
        <p>PROFILE EDIT {{ auth.user.name }}</p>
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

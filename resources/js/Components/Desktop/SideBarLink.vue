<template>
    <Link :href="href">
        <slot></slot>
    </Link>
</template>

<script>

import { Link } from '@inertiajs/inertia-vue3';

export default {
    name: 'SideBarLink',
    components: {
        Link,
    },
    props: {
        href: String,
    }
}
</script>
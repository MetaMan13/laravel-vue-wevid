<template>
    <Link :href="href" class="bg-white flex flex-row items-center justify-center gap-2 px-2 py-2 mb-2 rounded-md text-sm border border-gray-200 transition-all duration-150 ease-in-out">
        <div class="flex items-center w-auto">
            <slot name="icon"></slot>
        </div>
        <div v-show="sideBarMenuOpen" class="flex justify-start items-end pt-0.5 w-full">
            <slot name="text"></slot>
        </div>
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
        sideBarMenuOpen: Boolean,
    }
}
</script>
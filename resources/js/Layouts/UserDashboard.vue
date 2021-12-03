<template>
    <!-- Root main layout wrapper -->
    <div class="min-h-screen w-full bg-gray-50 text-gray-700 dark:bg-gray-900 dark:text-gray-300">
        <!-- Navigation -->
        <navigation></navigation>

        <!-- Mobile User Action Bar -->
        <user-action-bar></user-action-bar>

        <!-- Desktop Side Bar -->
        <side-bar @sideBarOpen="sideBarOpen" @sideBarClosed="sideBarClosed" :auth="auth"></side-bar>

        <!-- Content START -->
        <div
            v-bind:class="{
                'lg:ml-56 xl:ml-60': sideBarMenuOpen,
                'lg:ml-18 xl:ml-18': !sideBarMenuOpen,
            }"
            class="pb-12 pt-12 lg:px-4 lg:pb-0 lg:pt-17 lg:pb-4"
        >
            <div class="w-full h-full">
                <slot></slot>
            </div>
        </div>
        <!-- Content END -->
    </div>
    <!-- Root main layout wrapper -->
</template>

<script>
import UserActionBar from "../Components/Mobile/UserActionBar.vue";
import Navigation from "../Components/PageParts/Navigation.vue";
import SideBar from "../Components/Desktop/SideBar.vue";

export default {
    components: {
        Navigation,
        UserActionBar,
        SideBar,
    },
    props: {
        auth: Object,
    },
    data() {
        return {
            hamburgerMenuOpen: false,
            sideBarMenuOpen: true,
        };
    },
    methods: {
        sideBarOpen() {
            this.sideBarMenuOpen = true;
        },
        sideBarClosed() {
            this.sideBarMenuOpen = false;
        },
    },
};
</script>

<template>

    <!-- Root main layout wrapper -->
    <div class="min-h-screen w-full bg-gray-50 text-gray-700">

        <!-- Navigation -->
        <navigation></navigation>
        
        <!-- Mobile User Action Bar -->
        <user-action-bar></user-action-bar>

        <!-- Desktop Side Bar -->
        <side-bar @sideBarOpen="sideBarOpen" @sideBarClosed="sideBarClosed"></side-bar>

        <!-- Content START -->
        <div v-bind:class="{'lg:ml-56 xl:ml-60': sideBarMenuOpen, 'lg:ml-24 xl:ml-24' : !sideBarMenuOpen }" class="pb-12 pt-12 lg:px-4 lg:pb-0 lg:pt-16 lg:pb-4">
            <div class="w-full bg-yellow-100 h-screen">
                <p>Some yellow lemmon tree</p>
            </div>
            <div class="h-screen w-full">
                <form action="">
                    
                </form>
            </div>
            <div class="h-screen w-full bg-yellow-400 flex flex-col justify-end">
                <p>asdas</p>
            </div>
        </div>
        <!-- Content END -->

    </div>
    <!-- Root main layout wrapper -->

</template>

<script>
import UserActionBar from '../Components/Mobile/UserActionBar.vue'
import Navigation from '../Components/PageParts/Navigation.vue'
import SideBar from '../Components/Desktop/SideBar.vue'

export default {
    components: {
        Navigation,
        UserActionBar,
        SideBar,
    },
    data(){
        return{
            hamburgerMenuOpen: false,
            sideBarMenuOpen: true,
        }
    },
    methods: {
        sideBarOpen(){
            this.sideBarMenuOpen = true
        },
        sideBarClosed(){
            this.sideBarMenuOpen = false
        }
    }
}
</script>

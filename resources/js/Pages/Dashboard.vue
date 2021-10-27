<template>

    <!-- Root main layout wrapper -->
    <div class="min-h-screen w-full bg-gray-50 text-gray-700">

        <!-- Navigation -->
        <navigation></navigation>
        
        <!-- Mobile User Action Bar -->
        <user-action-bar></user-action-bar>

        <!-- Desktop Side Bar -->
        <side-bar></side-bar>

        <!-- Content START -->
        <div class="pb-12 pt-12 lg:ml-52 lg:px-6">
            <p>Content</p>
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
        }
    }
}
</script>

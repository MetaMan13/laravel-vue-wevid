<template>

    <!-- Root main layout wrapper -->
    <div class="min-h-screen w-full bg-gray-50">

        <!-- Navigation -->
        <navigation></navigation>
        
        <!-- Mobile User Action Bar -->
        <user-action-bar></user-action-bar>

        <!-- Content START -->
        <div class="pb-12 pt-12">
            <p>Content</p>
            <div class="h-screen w-full"></div>
            <div class="h-screen w-full flex flex-col justify-end">
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

export default {
    components: {
        Navigation,
        UserActionBar,
    },
    data(){
        return{
            hamburgerMenuOpen: false,
        }
    }
}
</script>

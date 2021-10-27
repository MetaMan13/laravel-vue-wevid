<template>
    <div v-bind:class="{ 'lg:w-52': sideBarMenuOpen, 'lg:w-24' : !sideBarMenuOpen }" class="hidden bg-white border-r border-gray-200 shadow-sm lg:block lg:fixed lg:top-0 lg:left-0 lg:min-w-min lg:h-screen lg:z-40 lg:pt-16 lg:px-4">

        <!-- Side Bar Display Toggle button -->
        <div class="absolute -right-3.5 bg-white hover:bg-green-500 hover:text-white py-1 px-1 rounded-full z-40 border border-gray-200">
            <template v-if="sideBarMenuOpen">
                <arrow-left
                    @click="sideBarMenuOpen = false"
                    :height="20" 
                    :width="20"
                    >
                </arrow-left>
            </template>

            <template v-else>
                <arrow-left
                    @click="sideBarMenuOpen = true"
                    :height="20" 
                    :width="20"
                    class="transform rotate-180"
                    >
                </arrow-left>
            </template>
        </div>

        <!-- Side Bar Content -->
        <div>
            <p>Side Bar Content</p>
        </div>
    </div>
</template>

<script>

import ArrowLeft from '../Icons/ArrowLeft.vue'

export default {
    name: 'SideBar',
    components: {
        ArrowLeft,
    },
    data(){
        return{
            sideBarMenuOpen: true,
        }
    },
}
</script>
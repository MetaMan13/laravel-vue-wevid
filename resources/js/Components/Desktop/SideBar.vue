<template>
    <div v-bind:class="{ 'lg:w-52': sideBarMenuOpen, 'lg:w-24' : !sideBarMenuOpen }" class="hidden bg-red-200 lg:block lg:fixed lg:top-0 lg:left-0 lg:min-w-min lg:h-screen lg:z-40 lg:pt-16 lg:px-4">
        <!-- Side Bar Display Toggle button -->
        <!-- lg:w-52 -->
        <div class="absolute -right-4 bg-yellow-600 py-2 px-2 rounded-full">
            <template v-if="sideBarMenuOpen">
                <arrow-left
                    @click="sideBarMenuOpen = false"
                    :height="20" 
                    :width="20"
                    class="text-white"
                    >
                </arrow-left>
            </template>

            <template v-else>
                <arrow-left
                    @click="sideBarMenuOpen = true"
                    :height="20" 
                    :width="20"
                    class="text-white transform rotate-180"
                    >
                </arrow-left>
            </template>
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
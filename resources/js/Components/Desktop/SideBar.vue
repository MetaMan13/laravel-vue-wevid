<template>
    <div v-bind:class="{ 'lg:w-56 xl:w-60': sideBarMenuOpen, 'lg:w-24' : !sideBarMenuOpen }" class="hidden bg-white border-r border-gray-200 shadow-sm overflow-y-scroll lg:block lg:fixed lg:top-0 lg:left-0 lg:min-w-min dynamic-h-screen lg:max-h-auto bg-red-300 lg:z-40 lg:mt-12 lg:pt-4 lg:pb-4 lg:px-4">

        <!-- Side Bar Display Toggle button -->
        <!-- <div class="bg-white hover:bg-green-500 hover:text-white py-1 px-1 rounded-full z-40 border border-gray-200">
            <template v-if="sideBarMenuOpen">
                <arrow-left
                    @click="closeSideBar"
                    :height="20" 
                    :width="20"
                    >
                </arrow-left>
            </template>

            <template v-else>
                <arrow-left
                    @click="openSideBar"
                    :height="20" 
                    :width="20"
                    class="transform rotate-180"
                    >
                </arrow-left>
            </template>
        </div> -->

        <!-- Side Bar Menu Action Buttons -->
        <div class="bg-red-200 w-full py-2">
            <p>ajsdjasjdjasjdasj</p>
        </div>

        <!-- Side Bar Content -->
        <div class="h-full mt-4">

            <!-- Side Menu Links -->
            <div>
                <ul>
                    <li>
                        <side-bar-link 
                            :href="route('dashboard')"
                            :sideBarMenuOpen="sideBarMenuOpen"
                            >
                            <template v-slot:icon>
                                <home
                                :height="22"
                                :width="22"
                                >
                                </home>
                            </template>
                            <template v-slot:text>
                                <p>Home</p>
                            </template>
                        </side-bar-link>
                    </li>

                    <li>
                        <side-bar-link 
                            :href="'/dashboard/test'"
                            :sideBarMenuOpen="sideBarMenuOpen"
                            >
                            <template v-slot:icon>
                                <home
                                :height="22"
                                :width="22"
                                >
                                </home>
                            </template>
                            <template v-slot:text>
                                <p>Dashboardingskatjkasjkdjhkasjk</p>
                            </template>
                        </side-bar-link>
                    </li>

                </ul>
            </div>

            <!-- User Information -->
            <div>

            </div>
        </div>
    </div>
</template>

<script>

import SideBarLink from '../Desktop/SideBarLink.vue'
import ArrowLeft from '../Icons/ArrowLeft.vue'
import Home from '../Icons/Home.vue'

export default {
    name: 'SideBar',
    components: {
        ArrowLeft,
        Home,
        SideBarLink
    },
    data(){
        return{
            sideBarMenuOpen: true,
        }
    },
    methods: {
        closeSideBar(){
            this.sideBarMenuOpen = false
            this.$emit('side-bar-closed')
        },
        openSideBar(){
            this.sideBarMenuOpen = true
            this.$emit('side-bar-open')
        },
    }
}
</script>
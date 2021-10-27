<template>
    <div v-bind:class="{ 'lg:w-56 xl:w-60': sideBarMenuOpen, 'lg:w-24' : !sideBarMenuOpen }" class="hidden bg-white border-r border-gray-200 shadow-sm overflow-y-auto lg:block lg:fixed lg:top-0 lg:left-0 lg:min-w-min dynamic-h-screen lg:max-h-auto lg:z-40 lg:mt-12 lg:pt-4 lg:pb-4 lg:px-4">

        <!-- Side Bar Menu Action Buttons -->
        <div v-bind:class="{ 'flex-col gap-2 items-center' : !sideBarMenuOpen }" class="w-full flex justify-between pb-4 border-b border-gray-200">

            <!-- Darkmode toggle -->
            <template v-if="darkTheme">
                <div class="bg-white px-2 py-2 border border-gray-200 shadow-sm rounded-md hover:bg-green-500 hover:text-white">
                    <sun
                    :height="18"
                    :width="18"
                    >
                    </sun>
                </div>
            </template>

            <template v-else>
                <div class="bg-white px-2 py-2 border border-gray-200 shadow-sm rounded-md hover:bg-green-500 hover:text-white">
                    <moon
                    :height="18"
                    :width="18"
                    >
                    </moon>
                </div>
            </template>

            <!-- Display, close arrows -->
            <template v-if="sideBarMenuOpen">
                <div class="bg-white px-2 py-2 border border-gray-200 shadow-sm rounded-md hover:bg-green-500 hover:text-white">
                    <minimize
                        @click="closeSideBar"
                        :height="18" 
                        :width="18"
                        class="transform rotate-45"
                        >
                    </minimize>
                </div>
            </template>

            <template v-else>
                <div class="bg-white px-2 py-2 border border-gray-200 shadow-sm rounded-md hover:bg-green-500 hover:text-white">
                    <maximize
                        @click="openSideBar"
                        :height="18" 
                        :width="18"
                        class="transform rotate-45"
                        >
                    </maximize>
                </div>
            </template>
        </div>

        <!-- Side Bar Content -->
        <div class="mt-4">
            <!-- Side Menu Links -->
            <div>
                <ul v-bind:class="{'items-center' : !sideBarMenuOpen }" class="flex flex-col">
                    <li>
                        <side-bar-link 
                            :href="route('dashboard')"
                            :sideBarMenuOpen="sideBarMenuOpen"
                            >
                            <template v-slot:icon>
                                <home
                                :height="18"
                                :width="18"
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
                                <user
                                :height="18"
                                :width="18"
                                >
                                </user>
                            </template>
                            <template v-slot:text>
                                <p>Profile</p>
                            </template>
                        </side-bar-link>
                    </li>

                    <li>
                        <side-bar-link 
                            :href="'/dashboard/test'"
                            :sideBarMenuOpen="sideBarMenuOpen"
                            >
                            <template v-slot:icon>
                                <settings
                                :height="18"
                                :width="18"
                                >
                                </settings>
                            </template>
                            <template v-slot:text>
                                <p>Settings</p>
                            </template>
                        </side-bar-link>
                    </li>

                    <li>
                        <side-bar-link 
                            :href="'/dashboard/test'"
                            :sideBarMenuOpen="sideBarMenuOpen"
                            >
                            <template v-slot:icon>
                                <log-out
                                :height="18"
                                :width="18"
                                >
                                </log-out>
                            </template>
                            <template v-slot:text>
                                <p>Log out</p>
                            </template>
                        </side-bar-link>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</template>

<script>

import SideBarLink from '../Desktop/SideBarLink.vue'
import Home from '../Icons/Home.vue'
import Sun from '../Icons/Sun.vue'
import Moon from '../Icons/Moon.vue'
import Settings from '../Icons/Settings.vue'
import Maximize from '../Icons/Maximize.vue'
import Minimize from '../Icons/Minimize.vue'
import LogOut from '../Icons/LogOut.vue'
import User from '../Icons/User.vue'

export default {
    name: 'SideBar',
    components: {
        Home,
        SideBarLink,
        Moon,
        Sun,
        Settings,
        Maximize,
        Minimize,
        LogOut,
        User,
    },
    data(){
        return{
            sideBarMenuOpen: true,
            darkTheme: false,
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
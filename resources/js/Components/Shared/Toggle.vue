<template>
<div class="flex flex-col justify-center items-center">
    <div class="flex justify-center items-center">
    <span class="">
        <sun :width="20" :height="20"></sun>
    </span>
    <!-- Switch Container -->
    <div
        :class="{ 'bg-gray-600': $state.darkMode}"
        class="w-14 h-7 flex items-center bg-gray-100 rounded-full mx-3 px-1 border border-gray-200 dark:border-gray-500"
        @click="handleToggleActive"
    >
    <!-- Switch -->
    <div
        class="bg-white dark:bg-gray-800 w-5 h-5 rounded-full shadow-md transform"
        :class="{ 'translate-x-7': $state.darkMode}"
        ></div>
    </div>
    <span class="">
        <moon :width="20" :height="20" class="transform rotate-12"></moon>
    </span>
</div>

<!-- Toggled switch -->
<div class="flex justify-center items-center mt-4 hidden">
    <span class="">
        <sun></sun>
    </span>
    <!-- Switch Container -->
    <div class="w-14 h-7 flex items-center bg-gray-300 rounded-full mx-3 px-1 bg-green-600" @click="handleToggleActive">
    <!-- Switch -->
    <div class="bg-white w-5 h-5 rounded-full shadow-md transform translate-x-7"></div>
    </div>
        <span class="">
            <moon class="transform rotate-12"></moon>
        </span>
    </div>
</div>
</template>

<script>

import Sun from './../Icons/Sun.vue'
import Moon from './../Icons/Moon.vue'

export default {
    name: 'Toggle',
    components: { Moon, Sun },
    emits: ['theme-toggled'],
    data(){
        return{
            toggleActive: false
        }
    },
    methods: {
        handleToggleActive(){
            this.$state.darkMode = !this.$state.darkMode
        }
    },
}
</script>
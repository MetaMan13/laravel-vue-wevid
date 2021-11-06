<template>
<div class="flex flex-col justify-center items-center">
    <div class="flex justify-center items-center">
    <span class="">
        <sun></sun>
    </span>
    <!-- Switch Container -->
    <div
        :class="{ 'bg-green-600': toggleActive}"
        class="w-14 h-7 flex items-center bg-gray-300 rounded-full mx-3 px-1"
        @click="handleToggleActive"
    >
    <!-- Switch -->
    <div
        class="bg-white w-5 h-5 rounded-full shadow-md transform"
        :class="{ 'translate-x-7': toggleActive}"
        ></div>
    </div>
    <span class="">
        <moon class="transform rotate-12"></moon>
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
    data(){
        return{
            toggleActive: false
        }
    },
    methods: {
        handleToggleActive(){
            this.toggleActive = !this.toggleActive
        }
    }
}
</script>
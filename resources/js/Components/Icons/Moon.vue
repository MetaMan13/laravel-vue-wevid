<template>
    <svg xmlns="http://www.w3.org/2000/svg" 
        :width="width" 
        :height="height" 
        viewBox="0 0 24 24" 
        fill="none" 
        stroke="currentColor" 
        stroke-width="2" 
        stroke-linecap="round" 
        stroke-linejoin="round" 
        class="feather feather-moon">
        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
    </svg>
</template>

<script>

export default {
    name: 'Moon',
    props: {
        height: {
            type: Number,
            default: 18,
        },
        width: {
            type: Number,
            default: 18
        },
    }
}
</script>

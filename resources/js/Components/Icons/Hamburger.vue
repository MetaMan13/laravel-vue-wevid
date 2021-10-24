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
        class="feather feather-menu cursor-pointer">
        <line x1="3" y1="12" x2="21" y2="12"></line>
        <line x1="3" y1="6" x2="21" y2="6"></line>
        <line x1="3" y1="18" x2="21" y2="18"></line>
    </svg>
</template>

<script>

export default {
    name: 'Hamburger',
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

<template>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        :width="width"
        :height="height"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="feather feather-video"
    >
        <polygon points="23 7 16 12 23 17 23 7"></polygon>
        <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
    </svg>
</template>

<script>
export default {
    name: "VideoIcon",
    props: {
        height: {
            type: Number,
            default: 18,
        },
        width: {
            type: Number,
            default: 18,
        },
    },
};
</script>

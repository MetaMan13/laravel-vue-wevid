<template>
    <button
        class="bg-green-500 hover:bg-green-600 dark:bg-green-400 dark:text-green-900 dark:hover:bg-green-300 text-white px-2 py-2 rounded-md font-semibold transition transition-all duration-150 ease-in-out"
    >{{ text }}</button>
</template>

<script>
export default {
    name: "CustomButton",
    props: {
        text: {
            type: String,
            default: "Click me",
        },
    },
};
</script>

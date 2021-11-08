<template>
    <input
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        :type="type"
        :placeholder="placeholder"
        class="dark:bg-gray-700 bg-gray-50 border border-gray-300 dark:border-gray-600 rounded-md focus:border-green-500 focus:ring-green-500 dark:focus:ring-green-100 dark:focus:border-green-100 dark:focus:border-green-300 dark:focus:ring-green-300 placeholder-gray-500 dark:placeholder-gray-400"
    />
</template>

<script>
export default {
    name: "TextInput",
    props: {
        modelValue: String,
        placeholder: {
            type: String,
            default: "Placeholder text",
        },
        type: {
            type: String,
            default: "text",
        },
    },
};
</script>

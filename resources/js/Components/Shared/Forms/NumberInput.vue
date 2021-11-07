<template>
    <input
        :value="modelValue"
        type="number"
        :min="min"
        :max="max"
        :step="step"
        @input="$emit('update:modelValue', $event.target.value)"
        class="
            resize-none
            border border-gray-200
            rounded-md
            focus:ring-transpatent focus:ring-0 focus:border-gray-300
            placeholder-gray-400
        "
    />
</template>

<script>
export default {
    name: "TextInput",
    props: {
        modelValue: [Number, String],
        min: {
            type: Number,
            default: 0,
        },
        max: {
            type: Number,
            default: 0,
        },
        step: {
            type: Number,
            default: 0.1,
        },
    },
    emits: ["update:modelValue"],
    methods: {
        focus() {
            this.$refs.input.focus();
        },
    },
};
</script>

<template>
    <form
        @submit.prevent="submit"
        class="px-4 bg-white dark:bg-gray-800 py-6 flex flex-col gap-2 md:py-6 md:px-6 lg:py-8 lg:px-8 md:gap-4 md:rounded-md shadow-sm border border-gray-100 dark:border-gray-800"
    >
        <div class="flex justify-end pb-2">
            <toggle></toggle>
        </div>

        <div
            class="bg-gray-50 dark:bg-gray-700 px-4 py-4 rounded-md border border-gray-300 dark:border-gray-600"
        >
            <p class="text-sm">
                Forgot your password? No problem. Just let us know your email address
                and we will email you a password reset link that will allow you to
                choose a new one.
            </p>
        </div>

        <div
            v-if="status"
            class="bg-gray-50 dark:bg-gray-700 px-4 py-4 rounded-md border border-gray-300 dark:border-gray-600"
        >
            <p class="text-sm">{{ status }}</p>
        </div>

        <div class="flex flex-col mt-2">
            <label class="text-sm mb-1">Email</label>
            <text-input
                v-model:modelValue="form.email"
                type="email"
                placeholder="Your email address"
            ></text-input>

            <div v-if="errors.email" class="mt-1.5">
                <p class="text-sm text-red-500 dark:text-red-400">{{ errors.email }}</p>
            </div>
        </div>

        <div class="flex flex-col mt-2">
            <button
                :disabled="form.processing"
                class="bg-green-500 hover:bg-green-600 dark:bg-green-400 dark:text-green-900 dark:hover:bg-green-300 text-white px-2 py-2 rounded-md font-semibold transition transition-all duration-150 ease-in-out"
            >Email Password Reset Link</button>
        </div>
    </form>
</template>

<script>
import Auth from "@Layouts/Auth";
import Toggle from "Shared/Toggle";
import TextInput from "Forms/TextInput.vue";

export default {
    layout: Auth,

    components: {
        Toggle,
        TextInput,
    },

    props: {
        status: String,
        errors: Object,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("password.email"));
        },
    },
};
</script>

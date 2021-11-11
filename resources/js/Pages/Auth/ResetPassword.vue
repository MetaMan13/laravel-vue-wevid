<template>
    <form
        @submit.prevent="submit"
        class="px-4 bg-white dark:bg-gray-800 py-6 flex flex-col gap-2 md:py-6 md:px-6 lg:py-8 lg:px-8 md:gap-4 md:rounded-md shadow-sm border border-gray-100 dark:border-gray-800"
    >
        <div class="flex justify-end pb-2">
            <toggle></toggle>
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

        <div class="flex flex-col">
            <label class="text-sm mb-1">Password</label>
            <text-input
                v-model:modelValue="form.password"
                type="password"
                placeholder="Enter password"
            ></text-input>

            <div v-if="errors.password" class="mt-1.5">
                <p class="text-sm text-red-500 dark:text-red-400">{{ errors.password }}</p>
            </div>
        </div>

        <div class="flex flex-col">
            <label class="text-sm mb-1">Repeat your password</label>
            <text-input
                v-model:modelValue="form.password_confirmation"
                type="password"
                placeholder="Repeat your password"
            ></text-input>

            <div v-if="errors.password_confirmation" class="mt-1.5">
                <p class="text-sm text-red-500 dark:text-red-400">{{ errors.password_confirmation }}</p>
            </div>
        </div>

        <div class="w-full flex flex-col mt-2">
            <button
                :disabled="form.processing"
                class="bg-green-500 hover:bg-green-600 dark:bg-green-400 dark:text-green-900 dark:hover:bg-green-300 text-white px-2 py-2 rounded-md font-semibold transition transition-all duration-150 ease-in-out"
            >Reset password</button>
        </div>
    </form>
</template>

<script>
import Auth from "Layouts/Auth";
import Toggle from "Shared/Toggle";
import TextInput from "Forms/TextInput.vue";

export default {
    layout: Auth,
    components: {
        Toggle,
        TextInput,
    },
    props: {
        email: String,
        token: String,
        errors: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                token: this.token,
                email: this.email,
                password: "",
                password_confirmation: "",
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(this.route("password.update"), {
                onFinish: () =>
                    this.form.reset("password", "password_confirmation"),
            });
        },
    },
};
</script>

<template>
    <form
        @submit.prevent="submit"
        class="px-4 bg-white dark:bg-gray-800 py-6 flex flex-col gap-2 md:py-6 md:px-6 lg:py-8 lg:px-8 md:gap-4 md:rounded-md shadow-sm border border-gray-100 dark:border-gray-800"
    >
        <!-- Darkmode toggle -->
        <div class="flex justify-end">
            <toggle></toggle>
        </div>

        <!-- Name -->
        <div class="flex flex-col">
            <label class="text-sm mb-1">Full name</label>
            <text-input v-model:modelValue="form.name" type="text" placeholder="Your full name"></text-input>

            <div v-if="errors.name" class="mt-1.5">
                <p class="text-sm text-red-500 dark:text-red-400">{{ errors.name }}</p>
            </div>
        </div>

        <!-- Email -->
        <div class="flex flex-col">
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

        <!-- Password -->
        <div class="flex flex-col">
            <label class="text-sm mb-1">Password</label>
            <text-input
                v-model:modelValue="form.password"
                type="password"
                placeholder="Your password"
            ></text-input>

            <div v-if="errors.password" class="mt-1.5">
                <p class="text-sm text-red-500 dark:text-red-400">{{ errors.password }}</p>
            </div>
        </div>

        <!-- Password -->
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

        <!-- Login page -->
        <div class="flex flex-col items-start">
            <Link
                :href="route('login')"
                class="underline text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300"
            >Have an account?</Link>
        </div>

        <!-- Submit -->
        <div class="w-full flex flex-col mt-2">
            <button
                :disabled="form.processing"
                class="bg-green-500 hover:bg-green-600 dark:bg-green-400 dark:text-green-900 dark:hover:bg-green-300 text-white px-2 py-2 rounded-md font-semibold transition transition-all duration-150 ease-in-out"
            >Register</button>
        </div>
    </form>
</template>

<script>
import Auth from "Layouts/Auth";
import TextInput from "Forms/TextInput";
import Toggle from "Shared/Toggle";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    layout: Auth,
    components: {
        TextInput,
        Toggle,
        Link,
    },
    props: {
        errors: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(this.route("register"), {
                onFinish: () => this.form.reset("password"),
            });
        },
    },
};
</script>

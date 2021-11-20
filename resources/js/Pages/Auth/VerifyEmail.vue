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
                Thanks for signing up! Before getting started, could you verify your
                email address by clicking on the link we just emailed to you? If you
                didn't receive the email, we will gladly send you another.
            </p>
        </div>

        <div
            class="bg-gray-50 dark:bg-gray-700 px-4 py-4 rounded-md border border-gray-300 dark:border-gray-600"
            v-if="verificationLinkSent"
        >
            <p class="text-sm">
                A new verification link has been sent to the email address you provided
                during registration.
            </p>
        </div>

        <div class="flex flex-col md:flex-row md:justify-between gap-4 mt-4 md:mt-2">
            <button
                :disabled="form.processing"
                class="bg-green-500 hover:bg-green-600 flex-1 dark:bg-green-400 dark:text-green-900 dark:hover:bg-green-300 text-white px-2 py-2 rounded-md font-semibold transition transition-all duration-150 ease-in-out"
            >Resend Verification Email</button>

            <Link
                :href="route('logout')"
                method="post"
                as="button"
                class="bg-gray-800 hover:bg-gray-900 text-white dark:bg-gray-600 dark:text-gray-50 dark:hover:bg-gray-500 px-2 py-2 rounded-md font-semibold transition transition-all duration-150 ease-in-out"
            >Log out</Link>
        </div>
    </form>
</template>

<script>
import Auth from "@Layouts/Auth";
import Toggle from "Shared/Toggle";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    layout: Auth,
    components: {
        Toggle,
        Link,
    },
    props: {
        status: String,
    },
    data() {
        return {
            form: this.$inertia.form(),
        };
    },
    methods: {
        submit() {
            this.form.post(this.route("verification.send"));
        },
    },
    computed: {
        verificationLinkSent() {
            return this.status === "verification-link-sent";
        },
    },
};
</script>

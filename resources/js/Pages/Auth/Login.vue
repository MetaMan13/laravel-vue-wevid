<template>
    <!-- Master Guest layout START -->
    <div class="w-full h-screen bg-gray-100 dark:bg-gray-900 flex flex-col items-center justify-center text-gray-600 dark:text-gray-200">
        <!-- <div class="bg-white dark:bg-gray-800 w-full h-20 flex items-center justify-center">
            <p>Test 123</p>
        </div> -->

        <div class="dark:bg-gray-900 w-full flex flex-col rounded-md md:gap-0 sm:max-w-sm md:max-w-md">

            <!-- Application Logo -->
            <div class="flex gap-1 items-center justify-center py-6 text-center md:py-8">
                <div>
                    <h3 class="font-semibold text-3xl select-none">Wevid</h3>
                </div>
                <div>
                    <feather :width="34" :height="34" class=""></feather>
                </div>
            </div>

            <!-- Login form -->
            <form @submit.prevent="submit" class="px-4 bg-white dark:bg-gray-800 py-6 flex flex-col gap-2 md:py-6 md:px-6 lg:py-8 lg:px-8 md:gap-4 md:rounded-md shadow-sm border border-gray-100 dark:border-gray-800">

                <div class="flex justify-end mb-2">
                    <toggle></toggle>
                </div>

                <div class="flex flex-col">
                    <label class="text-sm mb-1">Email</label>
                    <input v-model="form.email" type="email" class="dark:bg-gray-700 bg-gray-50 border border-gray-300 dark:border-gray-600 rounded-md focus:border-green-500 focus:ring-green-500 dark:focus:ring-green-100 dark:focus:border-green-100 dark:focus:border-green-300 dark:focus:ring-green-300 placeholder-gray-500 dark:placeholder-gray-400" placeholder="Your email address">

                    <div v-if="errors.email" class="mt-1">
                        <p class="text-sm text-red-500">{{ errors.email }}</p>
                    </div>
                </div>

                <div class="flex flex-col">
                    <label class="text-sm mb-1">Password</label>
                    <input v-model="form.password" type="password" class="dark:bg-gray-700 bg-gray-50 border border-gray-300 dark:border-gray-600 rounded-md focus:border-green-500 focus:ring-green-500 dark:focus:ring-green-100 dark:focus:border-green-300 dark:focus:ring-green-300 placeholder-gray-500 dark:placeholder-gray-400" placeholder="Your password">

                    <div v-if="errors.password" class="mt-1">
                        <p class="text-sm text-red-500">{{ errors.password }}</p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row md:justify-between gap-4">
                    <div class="flex gap-2 items-center">
                        <label class="text-sm">Remember me</label>
                        <input v-model="form.remember" type="checkbox" class="text-green-500 dark:bg-gray-700 border border-gray-400 dark:ring-transparent dark:text-gray-900 focus:text-green-500 dark:focus:text-gray-800 focus:ring-green-500 dark:focus:ring-transparent dark:focus:border-transparent dark:focus:outline-none rounded-sm">
                    </div>

                    <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-green-400">
                        Forgot your password?
                    </Link>
                </div>

                <div class="flex flex-col mt-2">
                    <button :disabled="form.processing" class="bg-green-500 hover:bg-green-600 dark:bg-green-400 dark:text-green-900 dark:hover:bg-green-300 text-white px-2 py-2 rounded-md font-semibold transition transition-all duration-150 ease-in-out">Login</button>
                </div>

            </form>

        </div>
    </div>
    <!-- Master Guest Layout END -->
</template>

<script>

import { Link } from '@inertiajs/inertia-vue3'
import Feather from './../../Components/Icons/Feather.vue'
import Toggle from './../../Components/Shared/Toggle.vue'

export default {
    components:{
        Link,
        Feather,
        Toggle,
    },
    props: {
        canResetPassword: Boolean,
        status: String,
        errors: Object,
    },
    data(){
        return{
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: false,
            }),
        }
    },
    methods: {
        removeDarkMode()
        {
            if(document.body.classList.contains('dark')){
                document.body.classList.remove('dark')
            }
        },
        addDarkMode(){
            if(!document.body.classList.contains('dark')){
                document.body.classList.add('dark')
            }
        },
        submit() {
            this.form.post(this.route('login'), {
                onFinish: () => this.form.reset('password'),
            })
        },
    }
}
</script>

<template>
    <!-- Master Guest layout START -->
    <div class="w-full h-screen bg-gray-100 dark:bg-gray-900 dark:text-white flex flex-col items-center justify-center">
        <!-- <div class="bg-white dark:bg-gray-800 w-full h-20 flex items-center justify-center">
            <p>Test 123</p>
        </div> -->

        <div class="absolute top-0 right-0 bg-white dark:bg-gray-800 flex flex-col gap-6 py-4 px-4">
            <button @click="addDarkMode">Add darkmode</button>
            <button @click="removeDarkMode" class="ml-6">remove darkmode</button>
        </div>
        <div class="bg-white dark:bg-gray-800">

            <!-- Application Logo -->
            <div>

            </div>

            <!-- Login form -->
            <div>
                <form @submit.prevent="submit">

                    <div>
                        <label>Email</label>
                        <input v-model="form.email" type="email">
                    </div>

                    <div>
                        <label>Password</label>
                        <input v-model="form.password" type="password">
                    </div>

                    <div>
                        <label>Remember me</label>
                        <input v-model="form.remember" type="checkbox">
                    </div>

                    <div>
                        <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Forgot your password?
                        </Link>

                        <button :disabled="form.processing">Login</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <!-- Master Guest Layout END -->
</template>

<script>

import { Link } from '@inertiajs/inertia-vue3'

export default {
    components:{
        Link,
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
        }
    }
}
</script>

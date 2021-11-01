<template>
    <div>
        <p>Video CREATE</p>
    </div>

    <div class="bg-white mt-4 border-t">
        <form @submit.prevent="storeVideo">

            <div>
                <label for=""></label>
                <input v-model="form.title" type="text" placeholder="Please enter a video title">

                <div v-if="errors.title">
                    {{ errors.title }}
                </div>
            </div>

            <div>
                <label for=""></label>
                <input @input="form.file = $event.target.files[0]" type="file" accept="video/mp4,video/x-m4v,video/*">

                <div v-if="errors.file">
                    {{ errors.file }}
                </div>
            </div>

            <div>
                <button>Store Video</button>
            </div>
        </form>
    </div>
</template>

<script>

import UserDashboard from './../../Layouts/UserDashboard.vue'

export default {
    layout: UserDashboard,
    props: {
        errors: Object,
    },
    data(){
        return{
            form: {
                title: null,
                file: null,
            }
        }
    },
    methods:{
        storeVideo(){
            this.$inertia.post('/dashboard/videos', this.form)
        },
    }
}
</script>
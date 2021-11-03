<template>
    <div>
        <p>Video EDIT</p>
    </div>

    <div class="mt-6">
        <form @submit.prevent="updateVideo" enctype="multipart/form-data">
            <div>
                <label for="">Video title</label>
                <input v-model="form.title" type="text">

                <div v-if="errors.title">
                    {{ errors.title }}
                </div>

                <!-- <label for=""></label> -->
                <input @change="form.file = $event.target.files[0]" type="file" accept="video/mp4,video/x-m4v,video/*"> 

                <div v-if="errors.file">
                    {{ errors.file }}
                </div>

                <button type="submit">Update video</button>
            </div>
        </form>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'

import UserDashboard from './../../Layouts/UserDashboard.vue'

export default {
    layout: UserDashboard,
    components: {

    },
    props: {
        video: Object,
        errors: Object,
    },
    data(){
        return{
            form: useForm({
                _method: 'PATCH',
                title: this.video.title,
                file: null,
            })
        }
    },
    methods: {
        updateVideo(){
            this.form.post('/dashboard/videos/' + this.video.id, this.form)
        }
    }
}
</script>
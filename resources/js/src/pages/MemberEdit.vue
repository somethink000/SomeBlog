<template>
    <div>
        <form class="form" @submit.prevent="updateMember()">

            <p class="title">Edit member {{ member.name }}</p>

            <input class="input" type="file" placeholder="Image" @change="onImageChange">

            <input class="input" v-model="form.name" type="text" placeholder="Name">

            <textarea class="textarea" v-model="form.about" rows="8" placeholder="About"></textarea>

            <button class="submit" type="submit">submit</button>

            <div class="" v-if="error">
                <p>Проверьте правильность введенных полей</p>
            </div>
        </form>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import Spin from "../components/Spin.vue";
import axios from 'axios';

export default defineComponent({
    components: {
        Spin
    },
    data: () => ({
        form: {
            image: null,
            name: "",
            about: ""
        },
        loading: true,
        member: [],
        error: false
    }),
    mounted() {
        this.loadPost(this.$route.params.id);
    },
    methods: {
        loadPost(id) {
            axios.get('/api/v1/member/' + id)
                .then(res => {
                    this.member = res.data;
                    setTimeout(() => {
                        this.loading = false;
                    }, 500);
                })
        },
        updateMember() {
            this.loading = true;
            console.log(this.form);
            axios.patch('/api/v1/member/' + this.member.id, this.form, {
                headers: {
                    'Content-type': 'multipart/form-data'
                }
            })
                .then(res => {
                    if (res.data) {
                        this.$router.push('/');
                    } else {
                        console.log(res.data);
                        setTimeout(() => {
                            this.loading = false;
                        }, 300);
                        this.error = true;
                    }
                })
        },
        onImageChange(e) {
            this.form.image = e.target.files[0]
        }
    }
});
</script>

<style></style>
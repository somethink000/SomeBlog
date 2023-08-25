<template>
    <div>
        <form class="form">

            <p class="title">Edit post</p>


            <input class="input" v-model="form.title" type="text" placeholder="Title">

            <textarea class="textarea" v-model="form.text" rows="8" placeholder="Text" >{{ blog.text }}</textarea>

            <button class="submit" @click.prevent="update">submit</button> 

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
            title: "",
            text: ""
        },
        loading: true,
        blog: [],
        error: false
    }),
    mounted() {
        this.loadPost(this.$route.params.id);
    },
    methods: {
        loadPost(id) {
            axios.get('/api/v1/blog/' + id)
                .then(res => {
                    this.blog = res.data;
                    setTimeout(() => {
                        this.loading = false;
                    }, 500);
                })
        },
        update() {
            this.loading = true;
            axios.patch('/api/v1/blog/' + this.blog.id, this.form, {
                headers: {
                    "Content-type": "application/json"
                }
            })
                .then(res => {
                    if (res.data) {
                        this.$router.push('/blog/' + res.data.id);
                    } else {
                        console.log(res.data);
                        setTimeout(() => {
                            this.loading = false;
                        }, 300);
                        this.error = true;
                    }
                })
        }
    }
});
</script>

<style></style>
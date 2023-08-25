<template>
    <div>

        <form class="form">

            <p class="title">Add post</p>

            <input class="input" v-model="form.link" type="text" placeholder="Link">

            <select class="select" v-model="form.image">
                <option disabled>Select image</option>
                <option v-for="img in images">{{ img }}</option>
            </select>

            <button class="submit" @click.prevent="store">submit</button>

            <div class="" v-if="error">
                <p>Проверьте правильность введенных полей</p>
            </div>
        </form>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import axios from 'axios';

export default defineComponent({
    components: {},
    data: () => ({
        images: [
        'github.svg',
        'artstation.svg',
        'sketchfab.svg',
        'steam.svg',
        'youtube.svg',
    ],
        form: {
            image: "",
            link: ""
        },
        loading: false,
        error: false
    }),
    methods: {
        store() {
            this.loading = true;
            axios.post('/api/v1/link', this.form, {
                headers: {
                    "Content-type": "application/json"
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
        }
    }
});
</script>

<style>
.select{
    margin-top: 2%;
    width: 70%;
    padding: 10px;
    background-color: rgba(0, 0, 0, 0.5);
    border: none;
    color: white;
    border-radius: 4px;
    border-bottom: 1px solid rgb(255, 255, 255);
}

</style>
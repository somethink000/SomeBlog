<template>
    <div>

        <form class="form">

            <p class="title">Add post</p>


            <input class="input" v-model="form.title" type="text" placeholder="Title">

            <textarea class="textarea" v-model="form.text" rows="8" placeholder="Text"></textarea>

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
        form: {
            title: "",
            text: ""
        },
        loading: false,
        error: false
    }),
    methods: {
        store() {
            this.loading = true;
            axios.post('/api/v1/blog', this.form, {
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

<style>
.form {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 15%;
    color: white;
}

.input {
    margin-top: 2%;
    width: 70%;
    padding: 10px;
    background-color: rgba(0, 0, 0, 0.5);
    border: none;
    color: white;
    border-radius: 4px;
    border-bottom: 1px solid rgb(255, 255, 255);
}

.textarea {
    margin-top: 2%;
    width: 70%;
    padding: 3px;
    background-color: rgba(0, 0, 0, 0.5);
    border: none;
    color: white;
    border-radius: 4px;
    border-bottom: 1px solid rgb(255, 255, 255);
}

.submit {
    margin-top: 1%;
    padding: 3px;
    background-color: rgba(0, 0, 0, 0.5);
    border: none;
    color: white;
    font-size: 20px;
    border-radius: 3px;
}

.submit:hover {
    border-bottom: 1px solid rgb(255, 255, 255);
}
</style>
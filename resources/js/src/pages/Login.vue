<template>
    <div>

        <form class="form">

            <p class="title">Login</p>


            <input class="input" v-model="form.email" type="text" placeholder="Email">

            <input class="input" v-model="form.password" type="text" placeholder="Password">

            <button class="submit" @click.prevent="login">submit</button>

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
            email: "",
            password: ""
        },
        loading: false,
        error: false
    }),
    methods: {
        login() {
            this.loading = true;
            axios.post('/login', this.form, {
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

</style>
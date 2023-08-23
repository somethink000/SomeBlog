<template>
    <h1>{{ blog.title }}</h1>
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
        loading: true,
        blog: [],
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
        }
    }
});
</script>

<style></style>
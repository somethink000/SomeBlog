<template>
    <h1 class="blog_title">{{ blog.title }}</h1>
    <div class="blog_text">
        <p>{{ blog.text }}</p>
    </div>
    <p>{{ blog.created_at }}</p>
    
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

<style>
.blog_title{
    margin-top: 15%;
}
.blog_text{
    font-size: 20px;
    padding: 5%;
    border-bottom: 1px solid rgba(255,0,0,0.4);
    border-top: 1px solid rgba(255,0,0,0.4);
}

</style>
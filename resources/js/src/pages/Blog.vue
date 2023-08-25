<template>
    <h1 class="blog_title">{{ blog.title }}</h1>
    <a class="circle-image" :href="'/blog_edit/' + blog.id"><img :src="'/images/edit.svg'" width="32" alt=""></a>
    <a class="circle-image circle-btn" href="" @click.prevent="deleteBlog" ><img :src="'/images/delete.svg'" width="32" alt=""></a>
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
        },
        deleteBlog() {
            axios.delete('/api/v1/blog/' + this.blog.id)
                .then(res => {
                    if (res.data) {
                        this.$router.push('/');
                    } else {
                        console.log(res.data);
                    }
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

.circle-btn{
    border: none;
    background-color: rgba(0, 0, 0, 0);
}

</style>
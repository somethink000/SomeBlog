<template>
	<h1>Blogs</h1>
    <div>
        <spin v-if="loading"></spin>
        <div v-else>
            <Blog
                v-for="blog in blogs"
                :title="blog.title"
            />
        </div>
    </div>
</template>

<script >
	import { defineComponent } from 'vue';
 	import Spin from "../components/Spin.vue";
    import axios from 'axios';
    import Blog from "../components/Blog.vue";
    export default defineComponent({
        components: {
            Spin,
            Blog
        },
        data: () => ({
            loading: true,
            blogs: []
        }),
        mounted() {
            this.loadPosts();
        },
        methods: {
            loadPosts() {
                axios.get('api/v1/blog')
                .then(res => {
					console.log(res.data);
                    this.blogs = res.data;
                    setTimeout(() => {
                        this.loading = false;
                    }, 500)
                })
            }
        }
	});
</script>


<style>
   
</style>

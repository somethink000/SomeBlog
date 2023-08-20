<template>
	<h1>ввыаа</h1>
    <div>
        <spin v-if="loading"></spin>
        <div style="display:flex; flex-wrap: wrap;" v-else>
            <post
                v-for="post in posts"
            />
        </div>
    </div>
</template>

<script >
	import { defineComponent } from 'vue';
 	import Spin from "../components/Spin.vue";
    import axios from 'axios';
    import Post from "../components/Objection.vue";
    export default defineComponent({
        components: {
            Spin,
            Post
        },
        data: () => ({
            loading: true,
            posts: []
        }),
        mounted() {
            this.loadPosts();
        },
        methods: {
            loadPosts() {
                axios.get('api/v1/blog')
                .then(res => {
					console.log(res.data);
                    this.posts = res.data;
                    setTimeout(() => {
                        this.loading = false;
                    }, 500)
                })
            }
        }
	});
</script>


<style scoped>
    .uk-card {
        width: 40%;
        margin-right: 20px;
        margin-bottom: 20px;
    }

    .uk-card:last-child {
        margin-right: 0;
    }
</style>

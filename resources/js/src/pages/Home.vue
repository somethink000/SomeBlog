<template>
    <div class="member">

        <div class="l_side">
            <div class="circle-image"><img src="/images/me.jpg" width="368" alt="" /> </div>
            <p class="title">Some</p>
            <div class="links">
                <div class="circle-image" v-for="link in links"><a :href="link.link"><img :src="'/images/' + link.image"
                            width="46" alt=""></a></div>
            </div>
        </div>

        <div class="r_side">
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                laborum."</p>
        </div>

    </div>

    <div class="blog_box">

        <h1 class="blg">Blogs:
            <a href="/blog/add">
                <div class="circle-image">
                    <img :src="'/images/plus.svg'" width="32" alt="">
                </div>
            </a>
        </h1>

        <spin v-if="loading"></spin>
        <div v-else>
            <div class="blog_article" v-for="blog in blogs">
                <p class="title">{{ blog.title }}</p>
                <div>
                    <router-link class="btn" :to="'/blog/' + blog.id">View
                    </router-link>
                </div>
            </div>
        </div>

    </div>
</template>

<script >
import { defineComponent } from 'vue';
import Spin from "../components/Spin.vue";
import axios from 'axios';
export default defineComponent({
    components: {
        Spin
    },
    data: () => ({
        loading: true,
        blogs: [],
        links: []
    }),
    mounted() {
        this.loadPosts();
    },
    methods: {
        loadPosts() {
            axios.get('/api/v1/blog')
                .then(res => {
                    console.log(res.data);
                    this.blogs = res.data;
                    setTimeout(() => {
                        this.loading = false;
                    }, 500)
                })
            axios.get('/api/v1/link')
                .then(res => {
                    console.log(res.data);
                    this.links = res.data;
                })
        }
    }
});
</script>


<style>
.blog_article {
    margin-top: 2%;
    padding-left: 30px;
    padding-right: 30px;
    box-sizing: border-box;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 5px;
    border-bottom: 1px solid rgb(255, 255, 255);
}

.blg{
    align-items: center;
    display: flex;
}

.links {
    display: flex;
    justify-content: center;
}

.btn {
    color: white;
}

.btn:hover {
    border-bottom: 1px solid rgba(255, 0, 0, 0.4);
    border-radius: 2px;
}

.title {
    margin-top: 10px;
    font-size: 32px;
}

.circle-image {
    flex: auto;
    padding: 10px;


}

img {
    border-radius: 50%;
}

.member {
    display: flex;
    margin-top: 2%;
    align-items: center;

    .l_side {
        text-align: center;

    }

    .r_side {
        padding-left: 10%;
        text-align: center;
    }
}


.blog_box {
    margin-top: 5%;
}</style>

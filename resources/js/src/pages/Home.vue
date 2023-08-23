<template>
    <div class="member">
        <div class="l_side">
            <div class="circle-image"><img src="/images/me.jpg" width="368" alt="" /> </div>
            <p class="title">Some</p>
                <!-- <div class="links">
                    <a href="{{$lnk->link}}"><span class="circle-image"><img src="/images/{{$lnk->image}}" width="46" alt=""></span></a>
                </div>  -->

        </div>
        <div class="r_side">
            <p>Welcome to fish, the friendly interactive shell
                Type help for instructions on how to use fish</p>
        </div>
    </div>
   
    <div class="blog_box">
    <h1>Blogs:</h1>
        <spin v-if="loading"></spin>
        <div v-else>
            <Blog v-for="blog in blogs" 
            :url="blog.id"
            :title="blog.title" />
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
            axios.get('/api/v1/blog')
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
.title{
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


.blog_box{
    margin-top: 5%;
}
</style>

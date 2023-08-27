<template>
    <div class="member">

        <div class="l_side">
            
            <div class="circle-image"><img :src="'/storage/' + member.image" width="368" alt="" /> </div>
            <p class="title">
                {{ member.name }} 
                <a class="circle-image" :href="'/member_edit/' + member.id"><img :src="'/images/edit.svg'" width="32" alt=""></a>
            </p>

            <div class="links">
                <div class="circle-image" v-for="link in links">
                    <a :href="link.link"><img :src="'/images/' + link.image" width="58" alt=""></a>
                    <a href="" class="circle-image" @click.prevent="deleteLink(link.id)"><img :src="'/images/delete.svg'"
                            width="24" alt=""></a>
                </div>

                <a class="circle-image" href="/link/add"><img :src="'/images/plus.svg'" width="32" alt=""></a>
            </div>
        </div>

        <div class="r_side">
            <p>{{ member.about }}</p>
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

        <Spin v-if="loading"></Spin>
        <div class="blog-articles" v-else>
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
        member: [],
        links: []
    }),
    mounted() {
        this.loadPosts();
        this.loadMember();
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
        },
        loadMember() {
            axios.get('/api/v1/member/' + 1)
                .then(res => {
                    this.member = res.data;
                    console.log(this.member.image);
                })
        },
        deleteLink(id) {
            axios.delete('/api/v1/link/' + id)
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
.blog-articles {
    display: flex;
    flex-direction: column-reverse;
}

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

.blg {
    align-items: center;
    display: flex;
}

.links {
    display: flex;
    align-items: center;
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
    padding: 5px;

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


}
</style>

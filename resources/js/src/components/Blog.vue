<template>
    <div class="blog_article">
            <p class="title">{{ title }}</p>
        <div>
           
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
export default defineComponent({
    components: {},
    setup() {
        return {};
    },
    props: {
        title: {
            type: String,
            default: "NULL"
        },
    }

});
</script>

<style>
.blog_article{
    margin-top: 2%;
    box-sizing: border-box;
    display: flex;
    align-items: center;
    /* justify-content: space-between; */
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 5px;
    border-bottom: 1px solid rgb(255, 255, 255);   
}

</style>
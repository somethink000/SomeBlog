<template>
    <div class="blog_article">
        <h1>{{ title }}</h1>
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
    margin-top: 100px;
    border: 1px white;
}

</style>
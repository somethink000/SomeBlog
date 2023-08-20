<template>
    <div class="blog_box">
        <h1>{{title}}</h1>

    </div>
</template>

<script>
import { defineComponent } from 'vue';
    export default defineComponent({
        components: {
            
        },
        setup() {
			return {};
		},
        props: {
             title: {
                 type: String,
                 default: "NULL"
            }
        }
        });
</script>

<style scoped>
.blog_box{
    margin-top: 100px;
    border: 1px white;
}
</style>
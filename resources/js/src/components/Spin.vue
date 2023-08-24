<template>
    <div class="spin"></div>
</template>

<script>
import { defineComponent } from 'vue';
    export default defineComponent({
        name: "Spin",
        components: {},
        setup() {
			return {};
		},
    });
</script>

<style>
    .spin {
        position: absolute;
        /* left: 50%;
        top: 50%; */
        background-color: white;
        transform: translate(-50%, -50%);
    }
</style>
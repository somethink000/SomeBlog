<template>
    <div uk-spinner class="spin"></div>
</template>

<script>
import { defineComponent } from 'vue';
    export default defineComponent({
        components: {},
        setup() {
			return {};
		},
    });
</script>

<style scoped>
    .spin {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<template >
	<div class="body">
		<div class="blur">
			<PrimaryHeader />
			<main class="main">
				<router-view />
			</main>
		</div>
	</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import PrimaryHeader from './components/PrimaryHeader.vue';

export default defineComponent({
	components: {
		PrimaryHeader,
	},
	setup() {
		return {};
	},
});
</script>

<style>
.body {
	margin: 0;
	min-height: 110vh;
	background: url(../images/dark.jpg);
	/* background-attachment: fixed; */
	background-size: 100%; 
	background-repeat: repeat-y;
	.blur{
		backdrop-filter: blur(3px);
		min-height: 110vh;
	}
}

.main {
	color: white;
	width: 1300px;
	margin: 0 auto;
	padding-top: 40px;
	 
}</style>
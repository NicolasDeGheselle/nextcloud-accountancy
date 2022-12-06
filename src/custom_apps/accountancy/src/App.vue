<template>
    <NcAppContent app-name="accountancy">
		<router-view :key="$route.fullPath"></router-view>
	</NcAppContent>
</template>

<script>
import NcAppContent from "@nextcloud/vue/dist/Components/NcAppContent.js";

export default {
	name: 'App',
	components: {
		NcAppContent
	},
	data() {
		return {
		}
	}
};
</script>
<style scoped>

</style>

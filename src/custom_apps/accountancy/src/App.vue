<template>
    <NcAppContent app-name="accountancy">
		<router-view :key="$route.fullPath"></router-view>
		<ConfirmModal />
	</NcAppContent>
</template>

<script>
import ConfirmModal from "./components/ConfirmModal.vue";
import NcAppContent from "@nextcloud/vue/dist/Components/NcAppContent.js";

export default {
	name: 'App',
	components: {
		NcAppContent,
		ConfirmModal
	},
	data() {
		return {
		}
	}
};
</script>
<style scoped>

</style>

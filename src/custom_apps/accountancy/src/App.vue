<template>
    <NcAppContent app-name="accountancy">
		<Dashboard />
	</NcAppContent>
</template>

<script>
import NcAppContent from "@nextcloud/vue/dist/Components/AppContent";
import Dashboard from './layout/Dashboard.vue';

export default {
	name: 'App',
	components: {
		NcAppContent,
		Dashboard
	},
	data() {
		return {
		}
	}
};
</script>
<style scoped>

</style>

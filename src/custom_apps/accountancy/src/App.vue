<template>
    <NcAppContent app-name="accountancy">
		<AccountPage />
	</NcAppContent>
</template>

<script>
import NcAppContent from "@nextcloud/vue/dist/Components/AppContent";
import AccountPage from './layout/AccountPage.vue';

export default {
	name: 'App',
	components: {
		NcAppContent,
		AccountPage
	},
	data() {
		return {
		}
	}
};
</script>
<style scoped>

</style>

<template>
    <NcAppContent app-name="accountancy">
		<Accounts />
	</NcAppContent>
</template>

<script>
import Accounts from "./layout/Accounts"
import NcAppContent from "@nextcloud/vue/dist/Components/AppContent";

export default {
	name: 'App',
	components: {
		Accounts,
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

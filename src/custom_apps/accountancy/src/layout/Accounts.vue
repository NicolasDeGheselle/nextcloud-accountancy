<template>
    <ul>
        <NcListItem
		class="account-item"
        v-for="account in accountsList"
        v-bind:key="account.id"
			:title="account.name"
			:bold="false"
			:details="account.balance + ' €'"
			:counter-number="account.subAccounts ? account.subAccounts.length + ' sub-accounts' : 0"
			counterType="outlined">
			<template #icon>
				
			</template>
			<template #subtitle>
				{{ account.description }}
			</template>
		</NcListItem>
		<NcListItem
			:title="'Total'"
			:bold="true"
			:details="totalBalance + ' €'">
		</NcListItem>
    </ul>
</template>

<script>
import AccountService from "../services/AccountService";
import NcListItem from "@nextcloud/vue/dist/Components/ListItem";

export default {
	name: 'Accounts',
	components: {
		NcListItem
	},
	data() {
		return {
            accountsList: []
		}
	},
	computed: {
		totalBalance() {
			return this.accountsList.reduce((partialSum, a) => partialSum + a.balance, 0);
		}
  	},
    created() {
        this.accountsList = AccountService.All();
    }
};
</script>
<style>
.account-item .counter-bubble__counter {
	max-width: none;
}
</style>
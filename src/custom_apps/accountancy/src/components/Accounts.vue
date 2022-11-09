<template>
    <ul class="simple-list">
		<li class="simple-item"
		   	v-for="account in accountsList"
        	:key="account.id">
			<a class="simple-link">
			<div class="flex-container">
				<span class="name">{{account.name}}</span>
				<Money :balance="account.balance" positiveBalanceClass="text-primary-light"/>
			</div>
			<div class="flex-container">
				<span class="description">{{account.description}}</span>
				<span class="sub-accounts" v-if="account.subAccounts">
					{{account.subAccounts.length + " sub-accounts"}}
				</span>
			</div>
			</a>
		</li>
		<li class="simple-item account-total flex-container">
			<b>Total</b>
			<b><Money :balance="total" positiveBalanceClass="text-primary-light"/></b>
		</li>
    </ul>
</template>

<script>
import Money from "./Money";

export default {
	name: 'Accounts',
	components: {
		Money
	},
	props: {
		accountsList: Array,
		total: Number
	},
	methods: {
		balanceStyle(balance) {
			return {
				"negative-balance": balance <= 0,
				"positive-balance" : balance > 0
			};
		},
		formatBalance(balance) {
			return Utils.FormatBalance(balance);
		}
	}
};
</script>
<style>
.account-total {
	background-color: var(--color-background-hover);
}
.sub-accounts {
	background: var(--color-primary-light);
	padding: 0 0.5rem;
	border-radius: 0.5rem;
}
</style>
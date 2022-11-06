<template>
    <ul class="accounts-list">
		<li class="account-item"
		   	v-for="account in accountsList"
        	:key="account.id">
			<a class="account-link">
			<div class="flex-container">
				<span class="name">{{account.name}}</span>
				<Money :balance="account.balance"/>
			</div>
			<div class="flex-container">
				<span class="description">{{account.description}}</span>
				<span class="sub-accounts" v-if="account.subAccounts">
					{{account.subAccounts.length + " sub-accounts"}}
				</span>
			</div>
			</a>
		</li>
		<li class="account-item account-total flex-container">
			<b>Total</b>
			<b><Money :balance="totalBalance"/></b>
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
		accountsList: Array
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
	},
	computed: {
		totalBalance() {
			return this.accountsList.reduce((partialSum, a) => partialSum + a.balance, 0);
		},
  	}
};
</script>
<style>
.flex-container {
	display: flex;
	justify-content: space-between;
}
.accounts-list {
  list-style-type: none;
  padding: 0;
  margin: 0;
}
.account-item {
	border-top: 1px solid var(--color-background-dark);
}
.account-total {
	background-color: var(--color-background-hover);
}
.account-total, .account-link {
	padding: 0.6rem;
}
.account-link {
	display: block;
}
.account-link:hover {
	background-color: var(--color-background-hover);
}
.account-item .description {
	color: var(--color-text-lighter);
}

.negative-balance {
	color: var(--color-error);
}
.positive-balance {
	color: var(--color-success);
}
</style>
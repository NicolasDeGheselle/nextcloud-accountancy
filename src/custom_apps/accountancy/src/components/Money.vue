<template>
    <span class="money-tag" :class="balanceStyle">{{ formatBalance + moneySymbole }}</span>
</template>

<script>
export default {
	name: 'Money',
    props: {
        balance: Number
    },
	data() {
		return {
			moneySymbole: "€"
		}
	},
	computed: {
		balanceStyle() {
			return {
				"negative-balance": this.balance <= 0,
				"positive-balance" : this.balance > 0
			};
		},
        formatBalance() {
            return this.balance.toFixed(2).replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
	}
};
</script>
<style>
.money-tag .negative-balance {
	color: var(--color-error);
}
.money-tag .positive-balance {
	color: var(--color-primary-light-text);
}
</style>
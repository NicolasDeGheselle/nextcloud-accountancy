<template>
    <span :class="balanceStyle">{{ formatBalance }}</span>
</template>

<script>
export default {
	name: 'Money',
    props: {
        balance: Number,
		positiveBalanceClass: {
      		type: String,
      		default: "text-success"
    	}
    },
	data() {
		return {
			moneySymbole: "€"
		}
	},
	computed: {
		balanceStyle() {
			let style = {};
			if (this.balance > 0) style[this.positiveBalanceClass] = true;

			return style;
		},
        formatBalance() {
			let sign = this.balance > 0 ? "+" : "";
           	return sign + this.balance.toFixed(2).replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, ".") + this.moneySymbole;
        }
	}
};
</script>
<style>
</style>
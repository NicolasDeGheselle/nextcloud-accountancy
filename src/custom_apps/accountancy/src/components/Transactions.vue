<template>
    <ul class="simple-list">
        <li class="simple-item"
        v-for="transaction in transactionsList"
        :key="transaction.id">
            <div class="flex-container">
				<span class="name">{{transaction.name}}</span>
				<Money :balance="transaction.value" />
            </div>
            <div class="flex-container">
				<span class="description">{{transaction.description}}</span>
				<span class="text-light">{{transaction.date}}</span>
            </div>
        </li>
    </ul>
</template>

<script>
import Money from "./Money";

export default {
	name: 'Transactions',
    components: {
		Money
	},
    props: {
        transactionsList: Array
    }
};
</script>
<style>
</style>
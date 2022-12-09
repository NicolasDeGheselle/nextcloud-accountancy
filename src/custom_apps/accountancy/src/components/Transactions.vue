<template>
    <ul class="simple-list">
        <li class="simple-item flex-container"
        v-for="transaction in transactionsList"
        :key="transaction.id"
        :class="{'active': transaction.selected }">
            <NcActionCheckbox :checked="transaction.selected"></NcActionCheckbox>
            <div class="w-100" @click="transaction.selected = !transaction.selected">
                <div class="flex-container">
			    	<span class="name">{{transaction.name}}</span>
			    	<Money :balance="transaction.value" />
                </div>
                <div class="flex-container">
			    	<span class="description">{{transaction.description}}</span>
			    	<span class="text-light">{{transaction.date}}</span>
                </div>
            </div>

        </li>
    </ul>
</template>

<script>
import NcActionCheckbox from "@nextcloud/vue/dist/Components/NcActionCheckbox.js";
import Money from "./Money";

export default {
	name: 'Transactions',
    components: {
		Money, NcActionCheckbox
	},
    props: {
        transactionsList: Array
    }
};
</script>
<style>
</style>
<template>
    <div>
        <div class="row">
            <div class="col col-md-12 content-container">Graph placeholders</div>
            <div class="col col-md-12 content-container">
                <h4 class="content-title">Accounts</h4>
                <Accounts :accountsList="accountsList" />
            </div>
        </div>
        <div class="content-container">
            <h4 class="content-title">Transactions</h4>
            <Transactions :transactionsList="transactionsList" />
        </div>
    </div>
</template>

<script>
import AccountService from "../services/AccountService";
import TransactionService from "../services/TransactionService";

import Accounts from "../components/Accounts.vue";
import Transactions from "../components/Transactions.vue";

export default {
	name: 'Dashboard',
    components: {
        Accounts,
        Transactions
    },
	data() {
		return {
			accountsList: [],
            transactionsList: []
		}
	},
    created() {
        this.accountsList = AccountService.All();
        this.transactionsList = TransactionService.All();
    }
};
</script>
<style>
.content-container {
	border: 1px solid var(--color-background-dark);
    border-radius: 0.4rem;
    margin: 0.1rem;
    padding: 0.4rem 0.6rem;
}

.content-title {
    color: var(--color-text-lighter);
    font-size: 32px;
    margin: 0.6rem 0;
}

.row {
    display: flex;
    flex-wrap: wrap;
}
.col {
  flex-grow: 1;
  flex-shrink: 1;
  flex-basis: 1;
}

.col-6 {
    width: 50%;
}

@media (max-width: 991.98px) {
    .col-md-12 {
        width: 100%;
    }
}
</style>
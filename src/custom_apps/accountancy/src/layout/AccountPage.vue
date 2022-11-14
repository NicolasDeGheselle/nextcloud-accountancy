<template>
    <div>
        <div class="content-container">
            <div class="flex-container main-container">
                <h2 class="main-title">{{account.name}}</h2>
                <Money class="main-money" :balance="account.balance" positiveBalanceClass="text-primary-light"/>
            </div>
        </div>
        <div class="row" v-if="haveSubs">
            <div class="col-6 col-md-12">
                <Graphs class="content-container" :account="account" />
            </div>
            <div class="col-6 col-md-12">
                <div class="content-container">
                    <h4 class="content-title">Accounts</h4>
                    <Accounts :accountsList="account.subAccounts" :total="account.balance"/>
                </div>
            </div>
        </div>
        <div class="content-container">
            <h4 class="content-title">Transactions</h4>
            <Transactions :transactionsList="account.transactions" />
        </div>
    </div>
</template>

<script>
import AccountService from "../services/AccountService";

import Money from "../components/Money.vue";
import Graphs from "../components/Graphs.vue";
import Accounts from "../components/Accounts.vue";
import Transactions from "../components/Transactions.vue";

export default {
	name: 'AccountPage',
    props: ["accountId"],
    components: {
        Accounts,
        Transactions,
        Money,
        Graphs
    },
	data() {
		return {
            account: {
                name: "",
                balance: 0,
                subAccounts: [],
                transactions: []
            },
		}
	},
    computed: {
        haveSubs() {
            return this.account?.hasSubs();
        }
    },
    created() {
        console.log(this);
        if (this.accountId)
            this.account = AccountService.GetById(this.accountId);
        else
            this.account = AccountService.GetRoot();
    }
};
</script>
<style>
.main-title {
    font-weight: lighter;
    font-size: 42px;
    text-transform: capitalize;
    margin: 0;
}
.main-money {
    font-size: 40px;
    font-weight: lighter;
}
.main-container {
    padding: 1rem 2rem;
    align-items: center;
}

#moneyChart {
    max-height: 20rem;
}
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
    font-weight: lighter;
}

</style>
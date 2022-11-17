<template>
    <div>
        <div>
            <div class="flex-container main-container">
                        <Breadcrumbs>
            <Breadcrumb
            v-for="parent in parentTree"
        	:key="parent.id"
            :title="parent.name"
            :to="{ name: (parent.id) ? 'accounts' : 'main', params: { accountId: parent.id }}"/>
        </Breadcrumbs>
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

import Breadcrumbs from "@nextcloud/vue/dist/Components/Breadcrumbs";
import Breadcrumb from "@nextcloud/vue/dist/Components/Breadcrumb";
import Money from "../components/Money.vue";
import Graphs from "../components/Graphs.vue";
import Accounts from "../components/Accounts.vue";
import Transactions from "../components/Transactions.vue";

export default {
	name: 'AccountPage',
    props: ["accountId"],
    components: {
        Breadcrumbs,
        Breadcrumb,
        Accounts,
        Transactions,
        Money,
        Graphs
    },
	data() {
		return {
            account: {
                parents: [],
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
        },
        parentTree() {
            let tree = [{
                id: null,
                name: ""
            }];

            if (this.account.parents?.length)
            {
                tree = tree.concat(this.account.parents)
            }

            if (this.account.id)
            {
                tree.push({
                    id: this.account.id,
                    name: this.account.name
                });
            }

            return tree;
        }
    },
    methods: {
        Load() {
            if (this.accountId)
                this.account = AccountService.GetById(this.accountId);
            else
                this.account = AccountService.GetRoot();
        }
    },
    created() {
        this.Load();
    },
    beforeRouteUpdate(to, from, next) {
    this.name = to.params.name
    next()
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
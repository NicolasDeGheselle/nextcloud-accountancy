<template>
    <div>
        <div>
            <div class="flex-container main-container">
                <div>
                    <NcBreadcrumbs>
                        <NcBreadcrumb
                        v-for="parent in parentTree"
                	    :key="parent.id"
                        :title="parent.name"
                        :to="{ name: (parent.id) ? 'accounts' : 'main', params: { accountId: parent.id }}"/>
                        <template #actions>
                            <NcActions>
                                <template #icon>
		                        	<Plus :size="20" />
		                        </template>
                                <NcActionButton :close-after-click="true" @click="modals.addSubAccount = true">
				            	    <template #icon>
				            	    	<Plus :size="20" />
				            	    </template>
				            	    New sub-account
				                </NcActionButton>
                            </NcActions>
				        </template>
                    </NcBreadcrumbs>
                    <span class="description">{{ account.description }}</span>
                </div>

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
            <div class="flex-container">
                <h4 class="content-title">Transactions</h4>
                <NcActions>
                    <NcActionButton :close-after-click="true" @click="modals.addTransaction = true">
				    	<template #icon>
				    		<Plus :size="20" />
				    	</template>
				    	New transaction
				    </NcActionButton>
                    <NcActionButton :close-after-click="true" @click="modals.addTransaction = true">
				    	<template #icon>
				    		<Upload :size="20" />
				    	</template>
				    	Import transactions
				    </NcActionButton>
                    <NcActionSeparator />
                    <NcActionButton :close-after-click="true" disabled>
				    	<template #icon>
				    		<ArrowAll :size="20" />
				    	</template>
				    	Move
				    </NcActionButton>
                    <NcActionButton :close-after-click="true" disabled>
				    	<template #icon>
				    		<Delete :size="20" />
				    	</template>
				    	Delete
				    </NcActionButton>
                </NcActions>
            </div>
            <Transactions :transactionsList="account.transactions" />
        </div>

        <NcModal
			v-if="modals.addSubAccount"
			@close="modals.addSubAccount = false"
			title="Add sub-account"
			:outTransition="true">
			<div class="modal__content">Add sub account</div>
		</NcModal>
        <NcModal
			v-if="modals.addTransaction"
			@close="modals.addTransaction = false"
			title="Add transaction"
			:outTransition="true">
			<div class="modal__content">Add transaction</div>
		</NcModal>
    </div>
</template>

<script>
import AccountService from "../services/AccountService";

import NcBreadcrumbs from "@nextcloud/vue/dist/Components/NcBreadcrumbs.js";
import NcBreadcrumb from "@nextcloud/vue/dist/Components/NcBreadcrumb.js";
import NcActions from "@nextcloud/vue/dist/Components/NcActions.js";
import NcActionButton from "@nextcloud/vue/dist/Components/NcActionButton.js";
import NcActionSeparator from "@nextcloud/vue/dist/Components/NcActionSeparator.js";
import NcModal from "@nextcloud/vue/dist/Components/NcModal.js";

import Money from "../components/Money.vue";
import Graphs from "../components/Graphs.vue";
import Accounts from "../components/Accounts.vue";
import Transactions from "../components/Transactions.vue";

import Plus from 'vue-material-design-icons/Plus'
import Upload from 'vue-material-design-icons/Upload'
import Delete from 'vue-material-design-icons/Delete'
import ArrowAll from 'vue-material-design-icons/ArrowAll'

export default {
	name: 'AccountPage',
    props: ["accountId"],
    components: {
        NcBreadcrumbs, NcBreadcrumb, NcActions, NcActionButton, NcActionSeparator, NcModal,
        Accounts, Transactions, Money, Graphs,
        Plus, Upload, Delete, ArrowAll
    },
	data() {
		return {
            accountService: new AccountService(),
            account: {
                parents: [],
                name: "",
                balance: 0,
                subAccounts: [],
                transactions: []
            },
            modals: {
                addSubAccount: false,
                addTransaction: false
            }
		}
	},
    computed: {
        haveSubs() {
            return this.account?.subAccounts?.length;
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
                this.account = this.accountService.GetById(this.accountId);
            else
                this.account = this.accountService.GetRoot();
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
/* Override default nextcloud style */
.breadcrumb__crumbs {
    min-width: inherit !important;
}
/*  */
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
    padding: 0.5rem;
    margin-bottom: 0.5rem;
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

@media (max-width: 768px) {
    .main-container{
        flex-wrap: wrap;
        justify-content: center;
    }
}

</style>
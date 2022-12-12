<template>
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
            <NcActionButton :close-after-click="true" :disabled="!haveSelected">
		    	<template #icon>
		    		<ArrowAll :size="20" />
		    	</template>
		    	Move
		    </NcActionButton>
            <NcActionButton :close-after-click="true" :disabled="!haveSelected">
		    	<template #icon>
		    		<Delete :size="20" />
		    	</template>
		    	Delete
		    </NcActionButton>
        </NcActions>
    </div>
    <ul class="simple-list">
        <li class="simple-item flex-container"
        v-for="transaction in transactionsList"
        :key="transaction.id"
        :class="{'active': transaction.selected }">
            <NcActionCheckbox :checked="transaction.selected" @change="(event) => transaction.selected = event.target.checked"></NcActionCheckbox>
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
    <NcModal
	    v-if="modals.addTransaction"
	    @close="modals.addTransaction = false"
	    title="Add transaction"
	    :outTransition="true">
	    <div class="modal__content">
            <h2>New transaction</h2>
            <div class="wrapper">
            <NcTextField label="Name" :label-visible="true"></NcTextField>
            <NcTextField label="Descritption" :label-visible="true"></NcTextField>
            </div>
            <div class="row gapped">
                <div class="col-6">
                    <NcTextField label="Value" :label-visible="true" class="mx-1"></NcTextField>
                </div>
                <div class="col-6">
                    <div class="mx-1">
                        <label class="form-label">Date</label>
                        <NcDatetimePicker type="datetime" />
                    </div>
                </div>
            </div>
        </div>
	</NcModal>
</div>
</template>

<script>
import NcActions from "@nextcloud/vue/dist/Components/NcActions.js";
import NcActionButton from "@nextcloud/vue/dist/Components/NcActionButton.js";
import NcActionCheckbox from "@nextcloud/vue/dist/Components/NcActionCheckbox.js";
import NcActionSeparator from "@nextcloud/vue/dist/Components/NcActionSeparator.js";
import NcModal from "@nextcloud/vue/dist/Components/NcModal.js";
import NcTextField from "@nextcloud/vue/dist/Components/NcTextField.js";
import NcDatetimePicker from "@nextcloud/vue/dist/Components/NcDatetimePicker.js";

import Plus from 'vue-material-design-icons/Plus'
import Upload from 'vue-material-design-icons/Upload'
import Delete from 'vue-material-design-icons/Delete'
import ArrowAll from 'vue-material-design-icons/ArrowAll'

import Money from "./Money";

export default {
	name: 'Transactions',
    components: {
		NcActionCheckbox, NcActions, NcActionButton, NcActionSeparator, NcModal, NcTextField, NcDatetimePicker,
        Plus, Upload, Delete, ArrowAll,
        Money
	},
    props: {
        transactionsList: Array
    },
    data: function () {
      return {
                modals: {
            addTransaction: false
        }
      }
    },
    computed: {
        haveSelected: function() {
            return !!this.transactionsList.find(t => !!t.selected);
        }
    }
};
</script>
<style>
</style>
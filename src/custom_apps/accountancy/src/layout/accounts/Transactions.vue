<template>
<div class="content-container">
    <div class="flex-container">
        <h4 class="content-title">Transactions</h4>
        <NcActions>
            <NcActionButton :close-after-click="true" @click="openModal()">
		    	<template #icon>
		    		<Plus :size="20" />
		    	</template>
		    	New transaction
		    </NcActionButton>
            <NcActionButton :close-after-click="true">
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
            <NcActionButton :close-after-click="true" :disabled="!haveSelected" @click="openModalDelete()">
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
            <div class="w-100 columns">
                <div class="column">
                    <div class="flex-container">
			        	<span class="name">{{transaction.name}}</span>
			        	<Money :balance="transaction.value" />
                    </div>
                    <div class="flex-container">
			        	<span class="description">{{transaction.description}}</span>
			        	<span class="text-light">{{transaction.date}}</span>
                    </div>
                </div>

                <div class="column col-auto" @click="selectOnly(transaction)">
                <NcActions>
                    <NcActionButton :close-after-click="true" @click="openModal(transaction)">
					    <template #icon>
					    	<Pencil :size="20" />
					    </template>
					    Edit
				    </NcActionButton>
                    <NcActionButton :close-after-click="true" @click="openModalDelete(transaction)">
					    <template #icon>
					    	<Delete :size="20" />
					    </template>
					    Delete
				    </NcActionButton>
                </NcActions>
                </div>
            </div>

        </li>
    </ul>
    <ModalTransaction :open.sync="modal.open" :data="modal.data"/>
    <ConfirmModal :open.sync="modalDelete.open" :text="modalDelete.text" title="Delete transaction(s)"/>
</div>
</template>

<script>
import NcActions from "@nextcloud/vue/dist/Components/NcActions.js";
import NcActionButton from "@nextcloud/vue/dist/Components/NcActionButton.js";
import NcActionCheckbox from "@nextcloud/vue/dist/Components/NcActionCheckbox.js";
import NcActionSeparator from "@nextcloud/vue/dist/Components/NcActionSeparator.js";

import ModalTransaction from './ModalTransaction.vue'
import ConfirmModal from '../../components/ConfirmModal.vue'

import Plus from 'vue-material-design-icons/Plus'
import Upload from 'vue-material-design-icons/Upload'
import Delete from 'vue-material-design-icons/Delete'
import ArrowAll from 'vue-material-design-icons/ArrowAll'
import Pencil from 'vue-material-design-icons/Pencil'

import Money from "../../components/Money";

export default {
	name: 'Transactions',
    components: {
		NcActionCheckbox, NcActions, NcActionButton, NcActionSeparator,
        Plus, Upload, Delete, ArrowAll, Pencil,
        Money, ModalTransaction, ConfirmModal
	},
    props: {
        transactionsList: Array
    },
    data: function () {
      return {
        modal: {
            data: null,
            open: false,
        },
        modalDelete: {
            open: false,
            text: ""
        }
      }
    },
    methods: {
        openModal: function(transaction)
        {
            this.modal.open = true;
            this.modal.data = transaction;
        },
        openModalDelete: function() {
            let selected = this.transactionsList.filter(t => !!t.selected);

            if (selected.length > 1) {
                this.modalDelete.text = `Delete these '${selected.length}' transactions ?`;
            }
            else
            {
                this.modalDelete.text = `Delete the transaction '${selected[0].name}' ?`;
            }
            
            this.modalDelete.open = true;
        },
        selectOnly: function(transaction) {
            console.log("test");
            this.transactionsList.forEach(t => t.selected = false);
            transaction.selected = true;
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
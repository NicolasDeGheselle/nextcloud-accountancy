<template>
        <NcModal
			v-if="open"
			@close="$emit('update:open', false)"
			title="Add sub-account"
			:outTransition="true">
	    <div class="modal__content">
            <h2>New sub account</h2>
            <div class="wrapper">
            <NcTextField label="Name" :label-visible="true" :value="account.name"></NcTextField>
            <NcTextField label="Description" :label-visible="true" :value="account.description"></NcTextField>
            </div>

            <NcButton class="ml-auto" type="primary">Send</NcButton>
        </div>
		</NcModal>
</template>

<script>

import NcModal from "@nextcloud/vue/dist/Components/NcModal.js";
import NcTextField from "@nextcloud/vue/dist/Components/NcTextField.js";
import NcButton from "@nextcloud/vue/dist/Components/NcButton.js";
import { Account } from '../../services/AccountService';

export default {
	name: 'ModalAccount',
    components: {
		NcModal, NcTextField, NcButton
	},
    props: {
        open: Boolean,
        account: {
            type: Object,
            default() {
                return new Account();
            }
        }
    }
};
</script>
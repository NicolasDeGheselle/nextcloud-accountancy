<template>
    <NcModal
	    v-if="open"
	    @close="$emit('update:open', false)"
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

            <NcButton class="ml-auto" type="primary">Send</NcButton>
        </div>
	</NcModal>
</template>

<script>
import NcModal from "@nextcloud/vue/dist/Components/NcModal.js";
import NcTextField from "@nextcloud/vue/dist/Components/NcTextField.js";
import NcButton from "@nextcloud/vue/dist/Components/NcButton.js";
import NcDatetimePicker from "@nextcloud/vue/dist/Components/NcDatetimePicker.js";

export default {
	name: 'ModalTransaction',
    components: {
		NcModal, NcTextField, NcButton, NcDatetimePicker
	},
    props: {
        open: Boolean
    }
};
</script>
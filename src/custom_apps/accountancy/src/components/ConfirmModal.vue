<template>
    <NcModal
	    v-if="open"
	    @close="$emit('update:open', false)"
	    :title="title"
	    :outTransition="true">
	    <div class="modal__content">
            <h2>{{ title }}</h2>
            <p>{{ text }}</p>

            <NcButton class="ml-auto" type="primary">Confirm</NcButton>
        </div>
	</NcModal>
</template>

<script>
import NcModal from "@nextcloud/vue/dist/Components/NcModal.js";
import NcButton from "@nextcloud/vue/dist/Components/NcButton.js";

export default {
	name: 'ConfirmModal',
    components: {
		NcModal, NcButton
	},
    props: {
        open: Boolean,
        text: String,
        title: String
    }
};
</script>
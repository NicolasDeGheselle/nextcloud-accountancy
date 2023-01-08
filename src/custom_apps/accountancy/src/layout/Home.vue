<template>
    <div>
        <NcButton @click="modal.show = true" type="primary">Import</NcButton>
		<NcModal
			v-if="modal.show"
			@close="modal.show = false"
			size="small"
			title="Import bank informations"
			:outTransition="true"
			:hasNext="true"
			:hasPrevious="true">
			<div class="modal-content">
				<h3>Import</h3>

				<input type="file" class="w-100"  @change="uploadFiles" accept=".csv"/>
            </div>
		</NcModal>
    </div>
</template>

<script>
import NcModal from "@nextcloud/vue/dist/Components/NcModal.js";
import NcButton from "@nextcloud/vue/dist/Components/NcButton.js";

import IconUpload from "vue-material-design-icons/Upload.vue";

import ImportService from "../services/ImportService";

export default {
	name: 'Home',
    components: {
		IconUpload,
		NcModal, NcButton
	},
    props: ["accountId"],
	data() {
		return {
            text1: "",
            modal: {
                show: false
            }
		}
	},
    computed: {
    },
    methods: {
		uploadFiles: function(event) {
			ImportService.sendFile(event.target.files[0]);
		}
    }
};
</script>
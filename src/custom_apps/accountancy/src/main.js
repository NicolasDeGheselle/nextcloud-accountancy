import { generateFilePath } from '@nextcloud/router'
import '../css/styles.scss'

import Vue from 'vue'
import Vuex from 'vuex'

import App from './App'
import router from './router'

import store from './store'

Vue.use(Vuex)

// eslint-disable-next-line
__webpack_public_path__ = generateFilePath(appName, '', 'js/')

Vue.prototype.OC = window.OC
Vue.prototype.OCA = window.OCA

Vue.mixin({ methods: { t, n } })

export default new Vue({
	render: h => h(App),
	store,
	router
}).$mount('#app');
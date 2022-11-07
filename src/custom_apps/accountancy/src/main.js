import { generateFilePath } from '@nextcloud/router'
import '../css/styles.scss'

import Vue from 'vue'
import App from './App'

// eslint-disable-next-line
__webpack_public_path__ = generateFilePath(appName, '', 'js/')

Vue.prototype.OC = window.OC
Vue.prototype.OCA = window.OCA

Vue.mixin({ methods: { t, n } })

export default new Vue({
	el: '#app',
	render: h => h(App),
})
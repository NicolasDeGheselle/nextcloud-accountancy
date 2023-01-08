import Vue from 'vue'
import Router  from 'vue-router'
import { generateUrl } from '@nextcloud/router'

import Home from './layout/Home';

Vue.use(Router)

export default new Router({
	mode: 'history',
	base: generateUrl('apps/accountancy'),
	linkActiveClass: 'active',
	routes: [
		{
			path: '/',
			name: 'Home',
			component: Home,
		}
	],
})
import Vue from 'vue'
import Router  from 'vue-router'
import { generateUrl } from '@nextcloud/router'

import AccountPage from './layout/accounts/_index';

Vue.use(Router)

export default new Router({
	mode: 'history',
	base: generateUrl('apps/accountancy'),
	linkActiveClass: 'active',
	routes: [
		{
			path: '/',
			name: 'main',
			component: AccountPage,
		},
		{
			path: '/accounts/:accountId',
			name: 'accounts',
			component: AccountPage,
			props:  true
		},
	],
})
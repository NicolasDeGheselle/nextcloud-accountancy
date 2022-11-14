import Vue from 'vue'
import VueRouter  from 'vue-router'
import { generateUrl } from '@nextcloud/router'

import AccountPage from './layout/AccountPage';
import Money from './components/Money';

Vue.use(VueRouter)

export default new VueRouter({
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
			components: Money
		},
	],
})
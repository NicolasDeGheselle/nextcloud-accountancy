import Vue from 'vue'
import Router from 'vue-router'
import { generateUrl } from '@nextcloud/router'

import AccountPage from './layout/AccountPage';

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
			components: {
				default: Note,
				sidebar: Sidebar,
			},
			props: {
				default: true,
				sidebar: true,
			},
		},
	],
})
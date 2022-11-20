<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: Nicolas DE GHESELLE <nicolas@degheselle.fr>
// SPDX-License-Identifier: AGPL-3.0-or-later

/**
 * Create your routes in here. The name is the lowercase name of the controller
 * without the controller part, the stuff after the hash is the method.
 * e.g. page#index -> OCA\Accountancy\Controller\PageController->index()
 *
 * The controller class has to be registered in the application.php file since
 * it's instantiated in there
 */
return [
	'resources' => [
	],
	'routes' => [
		[ 'name' => 'page#index', 'url' => '/', 'verb' => 'GET'],
		[ 'name' => 'page#account', 'url' => '/accounts/{id}', 'verb' => 'GET'],

		// API
		
		['name' => 'account_api#index', 'url' => '/api/v{apiVersion}/accounts', 'verb' => 'GET'],
		['name' => 'account_api#get', 'url' => '/api/v{apiVersion}/accounts/{accountId}', 'verb' => 'GET']
	]
];

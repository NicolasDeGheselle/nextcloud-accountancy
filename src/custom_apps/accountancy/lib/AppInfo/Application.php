<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: Nicolas DE GHESELLE <nicolas@degheselle.fr>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\Accountancy\AppInfo;

use OCP\AppFramework\App;

class Application extends App {
	public const APP_ID = 'accountancy';

	public function __construct() {
		parent::__construct(self::APP_ID);
	}
}

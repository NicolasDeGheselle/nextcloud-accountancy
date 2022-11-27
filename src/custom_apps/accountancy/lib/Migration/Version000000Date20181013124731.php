<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: Nicolas DE GHESELLE <nicolas@degheselle.fr>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\Accountancy\Migration;

use Closure;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\SimpleMigrationStep;
use OCP\Migration\IOutput;

class Version000000Date20181013124731 extends SimpleMigrationStep {

	/**
	 * @param IOutput $output
	 * @param Closure $schemaClosure The `\Closure` returns a `ISchemaWrapper`
	 * @param array $options
	 * @return null|ISchemaWrapper
	 */
	public function changeSchema(IOutput $output, Closure $schemaClosure, array $options) {
		/** @var ISchemaWrapper $schema */
		$schema = $schemaClosure();

		if (!$schema->hasTable('accountancy_accounts')) {
			$table = $schema->createTable('accountancy_accounts');
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'notnull' => true,
			]);
			$table->addColumn('owner', 'string', [
				'notnull' => true,
				'length' => 64,
			]);
			$table->addColumn('name', 'string', [
				'notnull' => true,
				'length' => 50
			]);
			$table->addColumn('description', 'string', [
				'notnull' => true,
				'length' => 250,
			]);
			$table->addColumn('type', 'string', [
				'notnull' => true,
				'length' => 50
			]);
			$table->addColumn('balance', 'float', [
				'notnull' => true
			]);

			$table->setPrimaryKey(['id']);
		}
		return $schema;
	}
}

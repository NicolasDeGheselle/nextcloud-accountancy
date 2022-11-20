<?php

namespace OCA\Accountancy\Db;

use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IDBConnection;
use OCP\AppFramework\Db\QBMapper;

class AccountMapper extends QBMapper {

    private const TABLE_NAME = 'accountancy_acoount';

    public function __construct(IDBConnection $db) {
        parent::__construct($db, TABLE_NAME);
    }

    public function findAll(string $userId) {
        $qb = $this->db->getQueryBuilder();
		$qb->select('id', 'name')
			->from(TABLE_NAME, 'b')
			->where($qb->expr()->eq('owner', $qb->createNamedParameter($userId, IQueryBuilder::PARAM_STR)));
        return $this->findEntities($qb);
    }
}
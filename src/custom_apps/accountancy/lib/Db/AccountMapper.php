<?php

namespace OCA\Accountancy\Db;

use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IDBConnection;
use OCP\AppFramework\Db\QBMapper;

class AccountMapper extends QBMapper {

    public function __construct(IDBConnection $db) {
        parent::__construct($db, 'accountancy_accounts');
    }

    public function findAll(string $userId) : array {
        $qb = $this->db->getQueryBuilder();
		$qb->select('*')
			->from($this->getTableName())
			->where($qb->expr()->eq('owner', $qb->createNamedParameter($userId, IQueryBuilder::PARAM_STR)));
        return $this->findEntities($qb);
    }

    public function findByName(string $userId, string $name) {
        $qb = $this->db->getQueryBuilder();
		$qb->select('*')
			->from($this->getTableName())
			->where($qb->expr()->eq('owner', $qb->createNamedParameter($userId, IQueryBuilder::PARAM_STR)))
            ->andWhere($qb->expr()->eq('name', $qb->createNamedParameter($name, IQueryBuilder::PARAM_STR)));
        return $this->findEntities($qb);
    }

    public function create(Account $account) {
        return parent::insert($account);
    }
}
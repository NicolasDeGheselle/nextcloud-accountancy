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


    /**
     * @throws \OCP\AppFramework\Db\DoesNotExistException if not found
     * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException if more than one result
     */
    public function find(int $id) {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from(TABLE_NAME)
           ->where(
               $qb->expr()->eq('id', $qb->createNamedParameter($id, IQueryBuilder::PARAM_INT))
           );

        return $this->findEntity($qb);
    }

    public function findAll($limit=null, $offset=null) {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from(TABLE_NAME)
           ->setMaxResults($limit)
           ->setFirstResult($offset);

        return $this->findEntities($sql);
    }
}
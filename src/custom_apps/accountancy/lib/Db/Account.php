<?php

namespace OCA\Accountancy\Db;

use OCP\AppFramework\Db\Entity;

class Account extends Entity  {

    protected $parentTree;

    protected $description;
    protected $type;
    protected $balance;

    public function __construct() {
        $this->addType('description',   'string');
        $this->addType('type',          'string');
        $this->addType('balance',       'float');
    }
}
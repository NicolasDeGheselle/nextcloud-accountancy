<?php
namespace OCA\Accountancy\Db;

class Account extends RelationalEntity  {

    protected $parentTree;

    protected $owner;
    protected $name;
    protected $description;
    protected $type;
    protected $balance;

    public function __construct() {
        $this->addType('id',            'integer');
        $this->addType('name',          'string');
        $this->addType('description',   'string');
        $this->addType('type',          'string');
        $this->addType('balance',       'float');

        $this->addResolvable('owner');
    }
}
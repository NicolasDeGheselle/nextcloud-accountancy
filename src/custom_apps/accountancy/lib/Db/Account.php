<?php

namespace OCA\Accountancy\Db;

use OCP\AppFramework\Db\Entity;

class Account extends Entity implements JsonSerializable  {

    protected $parentTree;

    protected $name;
    protected $description;
    protected $type;
    protected $balance;

    public function __construct() {
        $this->addType('id','integer');
        $this->addType('name',          'string');
        $this->addType('description',   'string');
        $this->addType('type',          'string');
        $this->addType('balance',       'float');
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'balance' => $this->balance
        ];
    }
}
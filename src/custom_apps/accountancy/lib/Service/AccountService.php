<?php

namespace OCA\Accountancy\Service;

use OCA\Accountancy\Db\AccountMapper;

class AccountService {

    private AccountMapper $mapper;

    public function __construct(AccountMapper $mapper) {
		$this->mapper = $mapper;
	}

    public function findAll(string $userId): array {
        return $this->mapper->findAll($userId);
	}
}
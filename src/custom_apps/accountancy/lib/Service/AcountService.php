<?php

namespace OCA\Accountancy\Service;

use OCA\Accountancy\Db\AccountMapper;

class AccountService {

    private AccountMapper $accountdMapper;

    public function __construct(
		AccountMapper $accountdMapper,
		?string $userId
	) {
		$this->accountdMapper = $accountdMapper;
	}

    public function findAll() {
        return $this->accountdMapper->findAll($this->userId);
	}
}
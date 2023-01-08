<?php

namespace OCA\Accountancy\Service;

use OCA\Accountancy\Db\AccountMapper;
use OCA\Accountancy\Db\Account;

class CsvAccountConfig {
    public array $AccountNumberPos = [0, 0];
    public array $AccountBalancePos = [0, 0];

    public int $LineTransactionsStart = 0;

    public int $ColDate= 0;
    public int $ColDescription = 0;
    public int $ColValue = 0;
}

class LaBanquePostalConfig extends CsvAccountConfig {
    public function __construct() {
        $this->AccountNumberPos = [4, 1];
        $this->AccountBalancePos = [0, 1];
    
        $this->LineTransactionsStart = 7;
    
        $this->ColDate= 0;
        $this->ColDescription = 1;
        $this->ColValue = 2;
	}
}

class AccountService {

    public string $userId;
    private AccountMapper $mapper;

    public function __construct(AccountMapper $mapper) {
		$this->mapper = $mapper;
	}

    public function findAll(): array {
        return $this->mapper->findAll($this->userId);
	}

    public function fileToDb(string $filePath, string $extension)
    {
        $file = file($filePath);
        switch ($extension) {
            case 'csv':
                // TODO : get config from user choice
                return $this->csvToDb($file, new LaBanquePostalConfig());
                break;
            default:
                throw new Exception("{$extension} extension is not supported.");
        }
    }

    private function csvToDb($file, CsvAccountConfig $config)
    {
        $data = [];
        foreach ($file as $line) {
            $data[] = str_getcsv($line);
        }
        $name = $data[$config->AccountNumberPos[0]][$config->AccountNumberPos[1]];

        $accounts = $this->mapper->findByName($this->userId, $name);
        
        if (count($accounts) == 0)
        {
            $account = new Account();
            $account->setName($name);
            $account->setOwner($this->userId);
            $account = $this->mapper->create($account);
        }
        else
        {
            $account = $accounts[0];
        }
        // Found of create linked account
        // Create transactions linked
        return $account;
    }
}
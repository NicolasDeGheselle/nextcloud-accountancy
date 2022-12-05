<?php

namespace OCA\Accountancy\Controller;

use OCP\AppFramework\ApiController;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

use OCA\Accountancy\Service\AccountService;

class AccountAPIController extends ApiController {

    private AccountService $accountService;
    private ?string $userId;

    	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param AccountService $service
	 * @param $userId
	 */
    public function __construct(string $appName, IRequest $request, AccountService $service, ?string $UserId = null) {
		parent::__construct($appName, $request);
		$this->accountService = $service;
		$this->userId = $UserId;
	}

    /**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * Return all of the boards that the current user has access to.
	 * @throws StatusException
	 */
	public function index() : DataResponse {
		$accounts = $this->accountService->findAll($this->userId);
		return new DataResponse($accounts, HTTP::STATUS_OK);
	}

}
<?php

namespace OCA\Accountancy\Controller;

use OCP\AppFramework\ApiController;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

use OCA\Accountancy\Service\AccountService;

class AccountAPIController extends ApiController {

    private $accountService;

    	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param AccountService $service
	 * @param $userId
	 */
    public function __construct($appName, IRequest $request, AccountService $service, $userId) {
		parent::__construct($appName, $request);
		$this->accountService = $service;
		$this->userId = $userId;
	}

    	/**
	 * @NoAdminRequired
	 * @CORS
	 * @NoCSRFRequired
	 *
	 * Return all of the boards that the current user has access to.
	 * @throws StatusException
	 */
	public function index() {
		$accounts = $this->accountService->findAll();
		$response = new DataResponse($accounts, HTTP::STATUS_OK);
		return $response;
	}

}
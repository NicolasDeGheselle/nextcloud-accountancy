<?php

namespace OCA\Accountancy\Controller;

use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;
use OCP\AppFramework\Http\JSONResponse;
use OCP\Files\IRootFolder;

use OCP\AppFramework\ApiController;
use OCA\Accountancy\Service\AccountService;

class AccountAPIController extends ApiController {

    private AccountService $accountService;
    private string $userId;
	private IRootFolder $storage;

    	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param AccountService $service
	 * @param $userId
	 */
    public function __construct(string $appName, IRequest $request, IRootFolder $storage, AccountService $service, $userId) {
		parent::__construct($appName, $request);
		$this->storage = $storage;
		$this->accountService = $service;
		$this->userId = $userId;

		$this->accountService->userId = $this->userId;
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

	public function import() : JSONResponse {
		$file = $this->request->getUploadedFile('import');

		$extension = end(explode('.', $file['name']));

		try {
			$test = $this->accountService->fileToDb($file['tmp_name'], $extension);
		} catch (Exception $e) {
			return new JSONResponse(array('msg' => 'Error : ' . $e->getMessage()), 400);
		}

		return new JSONResponse(array('msg' => $test));
	}
}
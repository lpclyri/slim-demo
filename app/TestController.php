<?php

namespace App;

use App\TestRepository;

class TestController {
	
	protected $model;

	public function __construct(TestRepository $testRepository) {
		$this->model = $testRepository;
		// $this->model = new TestRepository();
	}

	// get users
	public function index() {
		$res = $this->model->getUsers();
		
		// return $res;
		echo json_encode($res);
	}

	// get user by id
	public function show($id) {
		$res = $this->model->getOne($id);

		echo json_encode($res);
	}
}
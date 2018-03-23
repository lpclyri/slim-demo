<?php

namespace App;

use PDO;
// $db = 
// define('DB', $db);

class TestRepository {
	
	protected $con;
 	// PDO("mysql:host=$host;dbname=$database;port=$port", $user, $pass);
	public function __construct() {
		$db = DB;
		$this->con = new PDO("mysql:host=".$db['host'].";dbname=".$db['database'].";port=".$db['port'], $db['user'], $db['pass']);
	}

	// get users
	public function getUsers() {
		$sql = "select * from slim_users order by name";
		$res = $this->con->query($sql);
		$data = $res->fetchAll(PDO::FETCH_ASSOC);

		return $data;
	}

	// get user by id
	public function getOne($id) {
	    $sql = "SELECT * FROM slim_users WHERE id = $id";
	    $res = $this->con->query($sql);
	    $data = $res->fetchAll(PDO::FETCH_BOTH);

	    return $data;
	}
}
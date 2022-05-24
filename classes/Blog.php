<?php 
require_once "Database.php";
require_once "Session.php";
require_once "Configuration.php";
@Session::init_ses();
class Blog {
	private $dbh;
	protected $stmt;
	protected $query;
	protected $response;
	protected $config;
	public function __construct(){
		$conn = new Database;
		$this->dbh = $conn->osotech_connect();
		$this->alert = new Alert;
		$this->config = new Configuration;
	}
}
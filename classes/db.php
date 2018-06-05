<?php
 
 class Db{

 	private $host = "localhost";
 	private $username = "root";
 	private $pw = "";
 	private $dbName = "todo_oop";
 	public $con;

 	public function __construct(){
 		$this->connect();
 	}

 	public function connect(){
 		$this->con = new mysqli($this->host, $this->username, $this->pw, $this->dbName);
 		if (!$this->con) {
 			echo "Failed to connect to the database";
 		}
 	}
 }

?>
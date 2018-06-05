<?php

class Db{

	public $localhost = "localhost";
	public $user = "root";
	public $pw = "";
	public $dbName = "todo_oop";
	public $con;

	private function connect(){
		$this->con = new mysqli($this->localhost, $this->user, $this->pw, $this->dbName);
	}

	public function __construct(){
		$this->connect();
	}

	public function sanitize($var){
		$return = mysqli_real_escape_string($this->con, $var);
		return $return;
	}

	public function insert($toDo){
		$query = "INSERT INTO todo (todo_desc) VALUES ('$toDo')";
		$res = mysqli_query($this->con, $query);
		if ($res) {
			return true;
		}else{
			return false;
		}	

	}

	public function view(){
		$query = "SELECT * FROM todo";
		$res = mysqli_query($this->con, $query);
		return $res;
	}

	public  function deleteTodo($id){
		$query = "DELETE  FROM todo WHERE id= '$id'";
		$res = mysqli_query($this->con, $query);
		if ($res) {
			return true;
		}else{
			return false;
		}
	}

	public function viewTodo($id){
		$query = "SELECT * FROM todo WHERE id = '$id'";
		$res = mysqli_query($this->con, $query);
		if ($res) {
			return $res;
		}
	}

	public function updateTodo($id, $toDo){
		$query = "UPDATE todo SET todo_desc = '$toDo' WHERE id = '$id' ";
		$res = mysqli_query($this->con, $query);
		if ($res) {
			return true;
		}else{
			return false;
		}
	}


}




	


?>
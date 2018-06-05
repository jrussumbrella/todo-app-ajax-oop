<?php

require_once('db.php');

class Task extends Db{

	public function __construct(){
		parent::__construct();
	}

	public function execute($query){
		$res = $this->con->query($query);
		if ($res) {
			return true;
		}else{
			return false;
		}
	}

	public function sanitize($data){
		$data = $this->con->real_escape_string($data);
		return $data;
	}

	public function getData($query){
		$res = $this->con->query($query);
		return $res;	
	}

	public function delete($id){
		$query = "DELETE FROM todo WHERE id = '$id' ";
		$res = $this->con->query($query);
		if ($res) {
			return true;
		}else{
			return false;
		}
	}


}
	




?>
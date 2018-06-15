<?php

require_once('db.php');

class Task extends Db{

	protected $msg;

	public function setMessage($msg){
		 $this->msg = $msg;
	}

	public function getMessage(){
		return $this->msg;
	}

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

	public function deleteTasks($id){
		foreach ($id as $i) {
			$query = "DELETE FROM todo WHERE id = '$i' ";
			$res = $this->con->query($query);			
		}
			if ($res) {
				return true;
			}else{
				return false;
			}	
	}


	//save multiple tasks
	public function saveTasks($tasksId){
		foreach ($tasksId as $taskId) {
			$query = "UPDATE todo SET is_finished = 1 WHERE id = '$taskId'";
			$res = $this->con->query($query);
		}


		if ($res) {
			return true;
		}else{
			return false;
		}
	}


}
	




?>
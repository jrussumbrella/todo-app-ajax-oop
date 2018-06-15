<?php
	
	require_once('classes/Task.php');

	$task = new Task();
	$msg = "";
	
	if (isset($_POST['addTask'])) {
		$taskName = $task->sanitize($_POST['task_name']);
		$query = "INSERT INTO todo (task_name) VALUES ('$taskName') ";
		$res = $task->execute($query);
		if ($res) {
			$task->setMessage("Task Added");
			echo $task->getMessage(); 
		}else{
			echo "Failed to add another task!";
		}
	}


	if (isset($_POST['getDetails'])) {
		$id = $_POST['id'];
		$query = "SELECT * FROM todo WHERE id = '$id' ";
		$res = $task->getData($query);
		$row = $res->fetch_assoc();
		echo json_encode($row);	
	}


	if (isset($_POST['deleteTask'])) {
		$task_id = $_POST['task_id'];
		$res = $task->delete($task_id);
		if ($res) {
			$task->setMessage("Deleted");
			echo $task->getMessage();
		}else{
			echo "Failed to delete data";
		}
	}


	if (isset($_POST['mulDel'])) {
		$tasks_id = $_POST['id'];
		$res = $task->deleteTasks($tasks_id);
		if ($res) {
			$task->setMessage("Deleted");
			echo $task->getMessage();
		}else{
			echo "Something went wrong";
		}
	}


	if (isset($_POST['updateTask'])) {
		$id = $_POST['id'];
		$column_name = $_POST['column_name'];
		$value = $_POST['value'];
		$query = "UPDATE todo SET $column_name = '$value' WHERE id = '$id' ";
		$res = $task->execute($query);
		if ($res) {
			$task->setMessage("Task Updated");
			echo $task->getMessage();
		}else{
			echo "Something went wrong";
		}
	}

	if (isset($_POST['mulSave'])) {
		$id = $_POST['id'];
		$res = $task->saveTasks($id);
		if ($res) {
			$task->setMessage("Task Finished");
			echo $task->getMessage();		
		}else{
			echo "Something went wrong";
		}	
	}	


	



?>
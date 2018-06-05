<?php
	
	require_once('classes/Task.php');

	$task = new Task();
	$msg = "";

	if (isset($_POST['addTask'])) {
		$taskName = $task->sanitize($_POST['task_name']);
		$query = "INSERT INTO todo (task_name) VALUES ('$taskName') ";
		$res = $task->execute($query);
		if ($res) {
			echo "Added";
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
			echo "Deleted";
		}else{
			echo "Failed to delete data";
		}
	}

	



?>
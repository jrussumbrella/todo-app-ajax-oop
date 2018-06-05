<?php 

	require_once('classes/Task.php');

	$task = new Task();
	$output = "";

	if (isset($_POST['viewTask'])) {
		$query = "SELECT * FROM todo";
		$res = $task->getData($query); 	
	}

	if ($res->num_rows > 0) {
		$output .="
			<table class='table table-responsive'>
				<tr>
					<th> </th>
					<th>My Task</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
		";
		while ($row = $res->fetch_assoc()) {
			$output	.="
				<tr>
				<td> <input type='checkbox'> </td>
				<td> ".$row['task_name']."
				<td> <span class='badge text-center'> Todo </span> </td>
				<td>
					 <button class='btn btn-info btn-sm round'><i class='fas fa-pencil-alt'></i></button> 
					<button class='btn btn-danger btn-sm round btnDelete' data-delete='".$row['id']."'><i class='fas fa-trash-alt'></i></button>	
					</button> <button class='btn btn-success btn-sm round'><i class='far fa-bell'></i></button>
				</td>
				</tr>
			";						
		}
		$output .="</table>";						
	}else{
		$output .="<div class='alert alert-info text-center'> You haven't add your task yet</div>";
	}

	echo $output;



?>
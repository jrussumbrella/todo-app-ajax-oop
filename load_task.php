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
						";
		while ($row = $res->fetch_assoc()) {
			$status = $row['is_finished'];
			if ($status == 1) {
				$value = "Finished";
				$status = "<span class='label label-success text-center'>".$value."</span>";
			}else{
				$value = "To do";
				$status = "<span class='label label-default text-center'>".$value."</span>";
			}
			$output	.="
				<tr>
				<td> <input type='checkbox' class='tasks' value=".$row['id']."> </td>
				<td id='".$row['id']."' width='250px' class='update' data-column='task_name'> ".$row['task_name']."</td>
				<td>".$status."</td>
				<td> <div class='text-center'> 
					 <button type='button' class='btn btn-info btn-sm round editTask margin'data-edit='".$row['id']."' ><i class='fas fa-pencil-alt'></i></button>  
					<button class='btn btn-danger margin btn-sm round btnDelete' data-delete='".$row['id']."'><i class='fas fa-trash-alt'></i></button>	
					</button>
					</div>
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
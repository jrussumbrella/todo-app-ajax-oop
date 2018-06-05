<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php include('functions.php'); ?>
 
<center>
	<h1>EDIT TO DO </h1>
		
	<form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
		<input type="text" name="new_task" placeholder="Input task" value="<?php echo $todo_desc; ?>">
		<input type="submit" name="btnUpdateTask" value="Update">
	</form>
</center>	
</body>
</html>
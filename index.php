<?php include('header.php'); ?>
<body>
<?php 
	
	include('functions.php');
	include('includes/modal.php');

?>	 
<div class="container">
	<div class="row" style="margin-top: 20px;">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading myHeading">
					TO DO APP <span class="pull-right"><button type="button" class="btn btn-info round btn-lg" style="margin-top: 10px" name="btnAddTaskModal" id="btnAddTaskModal" ><i class="fas fa-plus"></i></button></span>
				</div>
				<div class="panel-body">
				<?php if (isset($_SESSION['msg'])): ?>
					 <h3><?php echo $_SESSION['msg']; ?></h3>  
					<?php unset($_SESSION['msg']); ?>
				<?php endif ?>	
			 	<div><?php echo $msg; ?></div>

				<div class="pull-right">
					
				</div>
				
				<div id="loadTask" style="margin-top: 20px;"></div>

				</div>
			</div>
				
		</div>
	</div>
</div>
		
<script type="text/javascript" src="js/jquery.min.js"></script>	
<script type="text/javascript" src="js/bootstrap.min.js"></script>	
<script type="text/javascript" src="js/app.js"></script>	
</body>
</html>
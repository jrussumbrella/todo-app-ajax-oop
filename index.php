<?php include('header.php'); ?>
<body>
<?php 
	
	include('functions.php');
	include('includes/modal.php');

?>	 
<div class="container-fluid">
	
	
	<div class="row" style="margin-top: 20px;">
		<div class="col-md-3 col-xs-12"></div>
		<div class="col-md-6 col-xs-12">
		
			<div class="panel panel-default">
				<div class="panel-heading myHeading">
					My Todo List 
					<div class="dropdown pull-right">
					  <span class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
					  <img src="images/more.png" width="16px">	
					  </span>
					  <ul class="dropdown-menu">
					    <li><a href="#">
					    <input type="checkbox" id="selectAll" name="selectAll" class="selectAll">
					     <label for="selectAll">Select All</label>
					    </a></li>
					  </ul>
					</div>
				
					<div class="pull-right options" style="display: none; padding-right: 10px;">
						<button class="btn btn-danger round btnMulDel floating-button btn-sm" ><i class='fas fa-trash-alt '></i></button>	
						<button  class="btn btn-success round btnMulFin floating-button btn-sm"><i class="fas fa-check"></i></button>	
					</div>
					
				</div>
				<div class="panel-body">

				<div id="notif"></div>
				<?php if (isset($_SESSION['msg'])): ?>
					 <h3><?php echo $_SESSION['msg']; ?></h3>  
					<?php unset($_SESSION['msg']); ?>
				<?php endif ?>	
			 	<div><?php echo $msg; ?></div>

				<div class="pull-right">
					
				</div>
				
				<div id="loadTask"></div>

				</div>
				<div class="panel-footer right" >
					<div class="pull-right">
						<button type="button" class="btn btn-info round btn-lg floating-button" name="btnAddTaskModal" id="btnAddTaskModal" ><i class="fas fa-plus"></i></button>	
					</div>
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
<!-- Modal -->
<div id="addTaskModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center myColor"> New Task</h4>
      </div>
      <div class="modal-body">
        <form method="POST" id="addTaskForm" action="<?php htmlspecialchars("PHP_SELF"); ?>">
        <div class="form-group">
          <input type="text" id="task_name" name="task_name" class="form-control myForm" placeholder="Task Name"> 
        </div>
          <div class="pull-right">
             <button type="submit" class="btn btn-primary"  id="btnAddTask" >Add</button>
          </div>
         
      </form>
      </div>
     
    </div>

  </div>
</div>



<!-- Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center myColor"> Delete task </h4>
      </div>
      <div class="modal-body">
        <form method="POST" id="deleteTaskForm">
          <input class="task_id" type="hidden" name="task_id">
           <h4 class="text-center">Delete task?</h4>
           <div class="pull-right">
             <button type="submit" class="btn btn-danger"  id="btnDeleteTask" >Delete</button>
           </div>
      </form>
      </div>
     
    </div>

  </div>
</div>
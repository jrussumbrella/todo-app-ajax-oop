$(document).ready(function(){

  viewTask();

  //call addtask modal
  $('#btnAddTaskModal').click(function(){
      $('#addTaskModal').modal('show');
  });

  //add task 
  $('#addTaskForm').submit(function(e){
      e.preventDefault();
      $task = $('#task_name').val();
      if ($task == '') {
        alert('Field task is empty');
      }else{
        var formData = $(this).serialize() + "&addTask";
        $.ajax({
            type: "POST",
            url: "functions.php",
            data: formData,
            beforeSend: function(){
              $('#btnAddTask').html('...');
            },
            success: function (response){
                if (response == "Added") {
                    setTimeout(function(){
                       $('#btnAddTask').html('Add');
                       viewTask();
                       $('#addTaskModal').modal('hide');
                    }, 1000);
                }else{
                  alert(response);
                }                
            }
        });   
      }
  });

   //view task 
      function viewTask(){
        var viewTask = 1;
        $.ajax({
            type: "POST",
            data: {viewTask:viewTask},
            url: "load_task.php",
            success: function (response){
              $('#loadTask').html(response);
            }
        });
      }

      function getDetails(id){
        var getDetails = 1;
         $.ajax({
            type: "POST",
            url:"functions.php",
            data: {id:id, getDetails:getDetails},
            dataType: "json",
            success: function(response){
                $('.task_id').val(response.id);
            }

         }); 
      }

   //delete task
   $(document).on('click', '.btnDelete', function(){
      var id = $(this).data('delete');
      getDetails(id);
      $('#deleteModal').modal('show');
   });

   $('#deleteTaskForm').submit(function(e){
      e.preventDefault();
      var formData = $(this).serialize() + "&deleteTask";
  
       $.ajax({
            type: "POST",
            url:"functions.php",
            data: formData,
            success: function(response){
                alert(response);
                viewTask();
            }

         }); 
   });



});


  	
  	
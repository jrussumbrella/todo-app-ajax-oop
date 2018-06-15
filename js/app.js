$(document).ready(function(){

  viewTask();

   function reset(){
      $('#addTaskForm')[0].reset();
      $('#message').html('');
      $('.load').css('display', 'none');
   }

  //call addtask modal
  $('#btnAddTaskModal').click(function(){
    reset();
    $('#addTaskModal').modal('show');
    
  });

  //add task 
  $('#addTaskForm').submit(function(e){
      e.preventDefault();
      $task = $.trim($('#task_name').val());
      if ($task == '') {
        $('#message').html('This field is empty').addClass('text-center text-danger');
      }else{
        $('#message').html('');
        var formData = $(this).serialize() + "&addTask";
        $.ajax({
            type: "POST",
            url: "functions.php",
            data: formData,
            beforeSend: function(){
              $('.load').css('display', 'block');
            },
            success: function (response){
                if (response == "Task Added") {
                    setTimeout(function(){
                       viewTask();
                       $('#addTaskModal').modal('hide');
                    }, 500);
                   
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
      reset();
   });

   $('#deleteTaskForm').submit(function(e){
      e.preventDefault();
      var formData = $(this).serialize() + "&deleteTask";
  
       $.ajax({
            type: "POST",
            url:"functions.php",
            data: formData,
            beforeSend: function(){
              $('.load').css('display', 'block');
            },
            success: function(response){
                if (response == "Deleted") {
                  setTimeout(function(){
                       viewTask();
                       $('#deleteModal').modal('hide');
                       /*$('#notif').html("<i class='fas fa-check'></i> Task " + response).addClass('text-center text-success message').show();
                    }, 500);
                    setTimeout(function(){
                      $('#notif').hide();*/
                    }, 500);  
                }else{
                  alert(response);
                }
                
            }

         }); 
   });

   // make table data editable
  
   $(document).on('click','.editTask', function(){
      var id = $(this).data('edit');
      $("#" + id).attr('contenteditable', true).focus();
   });

   //get data and edit task
   $(document).on('blur', '.update', function(){
      var id = $(this).attr('id');
      var column_name = $.trim($(this).data('column'));
      var value = $.trim($(this).text());
         
      if (value == '') {
        viewTask();
      }else{
        updateTask(id, column_name, value);
        viewTask();  
      }
   });

   
   $(document).on('keypress', '.update', function(e){
      if (this.innerText.length <= 20) {
        return true;
      }else{
        return false;
      } 
      
  });


  

   //update data task
   function updateTask(id, column_name, value){
      var updateTask = 1;
       $.ajax({
          type: "POST",
          url: "functions.php",
          data:{id:id, column_name:column_name, value:value, updateTask:updateTask},
          success: function (response){
              if (response == "Task Updated") {

                    viewTask();
              }
             }

     }); 
    
   }


   // delete task that is checked
   $('.btnMulDel').click(function(){
        var id = [];
        var mulDel = 1;
        $('.tasks:checked').each(function(i){
           id[i] = $(this).val();
        });

        $.ajax({
          type: "POST",
          url: "functions.php",
          data: {id:id, mulDel:mulDel},
          success: function (response){
             if (response == "Deleted") {
                viewTask();
                $('.options').css('display', 'none');
                $('.selectAll').prop('checked', false);        
             }else{
                alert(response);
             }
          } 
        });
      

   });

   // show hide options when checkbox click
   $(document).on('click', '.tasks', function(){
      var tasks = $('.tasks:checked');
      if (tasks.length == 0) {
        $('.options').css('display', 'none');
      }else{      
        $('.options').css('display', 'block');
      }
   });

   //select all checkbox

   $('.selectAll').click(function(){
        if (this.checked) {
            $('.tasks').each(function(){
                this.checked = true;
                $('.options').css('display', 'block');
            });
        }else{
            $('.tasks').each(function(){
                this.checked = false;
                $('.options').css('display', 'none');

            });
        }
   });


   $(document).on('click', '.btnMulFin', function(){

        var id = [];
        var mulSave = 1;
        $('.tasks:checked').each(function(i){
            id [i] = $(this).val();
        });

        $.ajax({
            type: "POST",
            url: "functions.php",
            data:{id:id, mulSave:mulSave},
            success:function(response){
              if (response == "Task Finished") {
                viewTask();
                $('.options').css('display', 'none');
                $('.selectAll').prop('checked', false);        
             }else{
                alert(response);
             }
            }
        });
   });


   



});


  	
  	
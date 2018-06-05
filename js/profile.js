$(document).ready(function(){


    
    
    displayProfilePicture();
    showProfile();
    displayProfile();

    function displayProfile(){
      var user_id = $('.user_id').val();
      var displayProfile = 1;
      $.ajax({
          type: "POST",
          data:{user_id:user_id, displayProfile:displayProfile},
          url:"view_profile.php",
          success: function(response){
            $('#displayProfile').html(response);
          }
      });
    }
    
    
    //function display picture
    function displayProfilePicture(){
      displayProfilePic = 1;
      var email = $('#email').val();
      $.ajax({
        type: 'POST',
        data: {email: email, displayProfilePic:displayProfilePic},
        url: "view_profile.php",
        success:function(response){
           $('#displayImage').html(response);
        }
      });
    }

    function showProfile(){
    var email = $('#email').val();
      $.ajax({
        type: 'POST',
        data: {email: email},
        url: "view_profile.php",
        success:function(response){
           $('#container').html(response);
        }
      });
    
    }


      $('#formUpload').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('uploadPicture', '1');       
        $.ajax({
          type: 'POST',
          url: "view_profile.php",
          data: formData,
          processData: false,
          contentType: false,
          success:function(response){
            displayProfilePicture();
           toastr.success(response)
            $('#formUpload').trigger("reset");
            $('#uploadModal').modal('hide');
        }
      });
    });

      // for displaying users info into edit modal
      function getUserDetails(id){
        getUser = 1;
        $.ajax({
          type: 'POST',
          url: "functions.php",
          dataType:'json',
          data: {id:id, getUser:getUser},
          success:function(response){
            $('#new_name').val(response.name);
            $('.user_id').val(response.id);
            $('#new_username').val(response.username);
            $('#new_email').val(response.email);
          }
        }); 
      }

      //edit profile and show menu
      $('#editProfile').click(function(e){
        e.preventDefault();
        $('#editModal').modal('show');
      });


      //call edit info modal
       $('#btnEditInfo').click(function(e){
          var user_id = $('.user_id').val();
          e.preventDefault();
          getUserDetails(user_id);
           $('#editModal').modal('hide');
           $('#editInfoModal').modal('show');
      });

       //call change picture modal
        $('#btnChangePic').click(function(e){
          e.preventDefault();
           $('#editModal').modal('hide');
           $('#uploadModal').modal('show');
      });

  
     //call change password modal
      $('#btnChangePassword').click(function(e){
          e.preventDefault();
           $('#editModal').modal('hide');
           $('#changePasswordModal').modal('show');
      });

  

      $('#btnKeepLogin').click(function(e){
          window.location.href = 'home.php';
      });
    

      //change password
      $('#changePasswordForm').submit(function(e){
          e.preventDefault();
          var formData = new FormData(this);
          formData.append('changePassword', '1');
          $.ajax({
              type: 'POST',
              url: "functions.php",
              data: formData,
              cache:false,
              processData: false,
              contentType: false,
              beforeSend: function(){
                $('#btnChangePw').html('Loading...'); 
              },
              success: function (response){
                if (response == 1) {
                  setTimeout("window.location.href = 'change_pw_success.php'", 1000);
                }else if (response == 0){
                  setTimeout(function(){
                    $('.message').html("Current password is wrong!");
                    $('#changePasswordForm')[0].reset();
                  }, 1000);
                }else{
                  $('#btnChangePw').html('Change'); 
                  $('.message').html(response);
                }
              },
              complete:function(data){
                 setTimeout(function(){
                     $('#btnChangePw').html('Change'); 
                  }, 1000);
              
             }
          });
      });

      $('#editInfoForm').submit(function(e){
          e.preventDefault();
          var formData = new FormData(this);
          formData.append('editInfo', '1');
          $.ajax({
              type: 'POST',
              url: "functions.php",
              data: formData,
              cache:false,
              processData: false,
              contentType: false,
              beforeSend: function(){
                $('#btnEditInfoUser').html('Updating...'); 
              },
              success: function (response){
                if (response == "Successfully updated info") {
                  setTimeout(function(){
                    toastr.success(response);
                    displayProfile();
                    $('#editInfoModal').modal('hide');
                  }, 1000);
                }else{
                  alert(response);
                }
             },
             complete: function(){
                setTimeout(function(){
                   $('#btnEditInfoUser').html('Update'); 
                }, 1000);
             }
          })
      });



    
      
    });
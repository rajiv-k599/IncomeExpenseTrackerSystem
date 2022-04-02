
  $(document).ready(function(){
    $('#cpwd').keyup(function(){
          var password = $('#pwd').val();
          var confirmpassword = $('#cpwd').val();
          if(confirmpassword!=password){
            $('#Error').html('**Password Not Matched**');
            $('#Error').css('color','red');
            return false;
          } else {
             $('#Error').html('**Password Matched**');
            $('#Error').css('color','green');
            return true;
          }
      

      });
  });
  

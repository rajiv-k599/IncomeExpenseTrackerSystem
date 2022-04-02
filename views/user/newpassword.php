<!DOCTYPE html>
<html>
<head>
	<title>forget password</title>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="/expenseMVC/">
	<?php include_once('link/link.php');?>
	<style type="text/css">
	body {
                 background-image: url(img/login.jpg);
                 background-repeat:no-repeat;
                 background-attachment:scroll;
                  background-size:1600px;
          }
     .box{
	            position: absolute;
	            top: 50%;
	            left: 50%;
	            transform: translate(-50%,-50%);
	            width: 500px;
	            padding:40px;
                background: rgba(0,0,0,.8);
                box-sizing: border-box;
                box-shadow: 0 15px 25px rgba(0,0,0.5);
                border-radius: 10px;
                color:#ffff;
          }
        @media screen and (max-width:700px){
         	h1{
                 font-size: 30px;
                 color: #ffff;
      
                }
             .box {
             	width: 250px;
             	 padding:15px;

                 }
             .box h2{
              	font-size: 15px;

              }
              .box h5{
              	font-size: 12px;

              }
            
         }

</style>
</head>
<body>
	<h1 class="bg-dark text-white"> <a href="User/display" style="text-decoration: none; color: #ffff;">Income and Expenses traker system</a></h1>
	<div class="box">
	     <form>
		       <center><h2>Change Password</h2></center>
		       <br>
	           <center><label><h5>New password</h5></label></center>
	           <input type="password" class="form-control name="" required="">
	           <br>
	           <center><label><h5>Confirm password</h5></label></center>
	           <input type="password" class="form-control name="" required="">
	           <br>
	           <button type="submit" class="btn btn-info active">Submit</button>
	     </form>
    </div>

</body>
</html>
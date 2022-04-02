<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="/expenseMVC/">
	<link rel="stylesheet" href="lib/css/style.css"/>
	 
	 <?php include_once('link/link.php');?>
	 <style type="text/css">
	 	body {
                 background-image: url(img/login.jpg);
                 background-repeat:no-repeat;
                 background-attachment:scroll;
                 background-size:1550px;
             }
         @media screen and (max-width:700px){
         	h1{
                 font-size: 30px;
                 color: #ffff;
      
                }
             .box {
             	width: 250px;

             }

         }

 
	 </style>
</head>
<body>
	<?php
	session_start();
	?>
	<h1 class="bg-dark text-white">
		<a href="User/display" style="text-decoration: none; color: #ffff;">Income and Expenses traker system</a>
	</h1>
	<div class="box">
       <form method="post" action="User/userlogin">
	       <center><h3>Login form</h3></center>
	       <label>Email</label> <br>
	       <input type="Email" name="email" required="">
	     <br>
	     <br>
	       <label>Password</label> <br>
	       <input type="password" name="password" required="">
	     <br>
	     <br>
	       <input type="submit" class="btn btn-success" name="login" value="login">
	     <br>
	       <a href="User/forget" class="btn btn-link">Forget password?</a>
	     <br>
	     <center>
	       <a href="User/register"  class="btn btn-info">Register</a>
	     </center>
   
	 	        
        </form>
    </div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="/expenseMVC/">
	<!--<link rel="stylesheet" href="lib/css/register.css"/>-->
	 <?php include_once('link/link.php');?>
	 <style type="text/css">
	 	body {
                 background-image: url(img/login.jpg);
                 background-repeat:no-repeat;
                 background-attachment:scroll;
                 background-size:1550px

             }
         .box {
	              position: fixed;
           	    top: 50%;
	              left: 50%;
	              transform: translate(-50%,-50%);
	              width: 350px;
                padding:30px;
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
           .box label {
            	   font-size: 12px;
                }
           .box input{
              	height: 25px;
               }
            .box h3{
            	 font-size: 20px;
               }
         }
	 </style>
</head>
<body>
	    <h1 class="bg-dark text-white col-sm-12">
        <a href="User/display" style="text-decoration: none; color: #ffff;">Income and Expenses traker system</a>
      </h1>
	<div class="box">
       <form method="post" action="User/registeruser">
	         <center><h3>Registration form</h3></center>
	           <label>First Name</label> <br>
	           <input type="text" name="firstname" required="">
	              <br>
	           <label>Last Name</label> <br>
	           <input type="text" name="lastname" required="">
	              <br>
	          
	          <label>Email</label> <br>
	          <input type="email" name="email" required="">
	             <br>
	          <label>Gender: </label>
	             <br>
	            <input type="radio" name="gndr" value="Male">Male
	            <input type="radio" name="gndr" value="Female">Female
	            <input type="radio" name="gndr" value="Other">Other
	           <br>
	         <label>Password</label> <br>
	         <input type="password" name="password" >
	          <br>
               <br>
	                <button type="submit" name="register" class="btn btn-info">Register</button> 
               <br>
            <br>
			        
       </form>
    </div>
</body>
</html>
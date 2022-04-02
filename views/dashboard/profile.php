<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
	<base href="/expenseMVC/">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<?php include_once('link/link.php');?>
	 <script type="text/javascript" src="lib/js/main.js"></script>
	 <style type="text/css">
	 	    body{
	 	 	     min-height: 100vh;
                 overflow-x: hidden;
	 	          }
	 	    .page-content{
                        margin-left: 17rem;
                        margin-right: 1rem;
                        transition: all 0.4s;
	 	                 }
	 	    .content.active{
                        margin-left: 1rem;
                        margin-right: 1rem;
	 	                }
	 </style>
</head>
<body>

	<?php include_once('views/shared/sidenav.php');?> 
	
	<?php include_once('views/shared/header.php');?>
	
	
<div class="page-content" id="content">
	<br>
	<div class="container-fluid shadow">
		<section class="container-fluid">
			 
			   <div class="card text-center pt-2 mt-2">
		          <img src="img/avatar.png" width="100" height="100" class="mx-auto d-block"/>
		          <h5></h5>
		       </div>      
        </section>
        <br>
        <section class="container-fluid">
        	 <div class="card pl-2 ">
        	 	<p>Name: <?php echo $_SESSION['Firstname'];  ?>&nbsp;<?php echo $_SESSION['Lastname'];  ?> </p>
        	 	<p>Email: <?php echo $_SESSION['email'];  ?> </p>
        	 	<p>Gender: <?php echo $_SESSION['gender'];  ?></p>
        	 </div>

        </section>
        <br>
        <section class="container-fluid">
        	<div class="card pl-2 pr-2 ">
        		<header><h5 class="text-uppercase pl-2 pt-2"><u>Change Password</u></h5></header>
        	<form method="post" action="User/passwordChange">
                    <div class="form-group">       
                      <label>Current Password</label>
                      <input type="password" placeholder="Password" name="Current" class="form-control" required="true">
                    </div>
                    <div class="form-group">       
                      <label>New Password</label>
                      <input type="password" id="pwd" placeholder="Password" name="New" class="form-control" required="true">
                    </div>
                    <div class="form-group">       
                      <label>Confirm New Password</label>
                      <input type="password" id="cpwd" placeholder="Password" name="confirm" class="form-control" required="true">
                    </div>
                     <div id="Error"></div>
                    <div class="form-group">       
                      <input type="submit" value="Submit" name="Submit" class="btn btn-primary">
                    </div>
                  </form>
              </div>
        </section>

	</div>

</div>

<script type="text/javascript" src="lib/js/password.js"></script>
</body>
</html>
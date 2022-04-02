<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="/expenseMVC/">
 
	<title>Home</title>
	 <link rel="stylesheet" type="text/css" href="lib/css/landing.css">
  	<?php include_once('link/link.php');?>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <style type="text/css">
	 	body {
		         background-color: gray;
		         background-image: url(img/login.jpg);

             background-repeat:no-repeat;
             background-attachment:scroll;
             background-size:1550px;
             background-blend-mode: darken;
             


	         }
        
        .box nav{
          	position: fixed;
        	  left: 85%;
        	  top: 20px;
        }
        .center {
            width: 170px;
            height: 170px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .head {
            font-size: 50px; 
            color: #ffff; 
            font-family: Arial, Helvetica, sans-serif;

        }
         
        .footer-content{
            height: 165px;
        }
   @media screen and (max-width:700px){
         .box {
                height: 45px;
               }

         .box h1{
                 font-size: 12px; 
                 color: #ffff;
      
                }
         .box nav{
                  position: fixed;
                  left: 67%;
                  top: 10px;
                 }
         .box nav a{
                  font-size: 7px;
                 }
         .center{ 
                  width: 100px;
                  height: 100px;
                  position: fixed;
                  top: 50px;
                  left: 40%;
                  }
          .head {
               font-size: 20px; 
                 color: #ffff;
                 position: relative;
                 top: 30px;
               }

          .sub {
               font-size: 10px;
              position: relative;
                 top: 30px;
          }
          footer{

          }
          .footer-content p{
                    max-width: 400px;
                    margin: 5px auto;
                    line-height: 20px;
                    font-size: 10px;

                   }
            .footer-bottom{
                   background: #000;
                   width: 100%;
                   padding: 3px 0;
                   text-align: center;
                  }

        }
         
        
	 </style>
</head>
<body>
	
     <div class="box">
        <h1 class="col-sm-8">Income and Expenses Tracker System</h1>
           <nav class="col-sm-4" >
              <a href="User/login" class="btn btn-success">Login</a> &nbsp; &nbsp;
              <a href="User/register" class="btn btn-info">Register</a>
           </nav>
     </div>
     <br>
     <br>
     <br>
     <br>
     <br>

    <div class="img">
       <img src="img/logo.png" class="center" >
    </div>
    <center>
      <h1 class="head" style="">
        <u><b>Income and Expenses Tracker System</b></u>
      </h1>
    </center>
    <center>
      <h2 class="sub" style="color: white;">Keep your Income and Expenses incheck.</h2>
    </center>
    <br>
	
   <footer>
	   <div class="footer-content">
	       <p>This project aim to provide user a platform to keep track of their incomes and expenses.</br>
	          Income and Expense Tracker System can be used by new job holders, housewife, interns and teenagers, everyone who wants to track their expense.</p>
	        <p>&nbsp; &nbsp; &nbsp;Contact Us</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
      </div>
	    <div class="footer-bottom">
            <p>copyright &copy;2021 . designed by <span>rajiv</span></p>
      </div>
    </footer>

</body>
</html>
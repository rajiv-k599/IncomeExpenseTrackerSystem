<!DOCTYPE html>
<html>
<head>
	<title>header</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="/expenseMVC/">
	<?php include_once('link/link.php');?>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	 <style type="text/css">
	 	
       .sb-topnav{
       	 width: calc(100% - 16rem);
         margin-left: 16rem;
         transition: all 0.4s;
       }
       #content.active {
          width: 100%;
          margin: 0;
         }
       button i{
              font-size: 30px;
	 	}
	 	.navbar-brand {
	 		font-size: 30px;

	 	}
	 	button i:hover {
            color: cyan  !important;
       
        }
	@media (max-width: 768px){
              .navbar-brand {
	 		font-size: 20px;
	 	}
	 	.navbar-bar img{
                 height: 35px;
                 width: 35px;
	 	}
	 	#content {
               width: 100%;
              margin: 0;
             }
         #content.active {
              margin-left: 16rem;
              width: calc(100% - 16rem);
           }
         button i{
              font-size: 20px;
	 	}  

	 	 }


	 </style>
</head>
<body>

<nav class="sb-topnav navbar navbar-expand navbar-dark w-100 " id="content" style="background-color: #343a40" >
    <button class="btn btn-link btn-sm order-lg-0 ml-lg-3 btn-outline-dark" id="sidebarToggle" href="#">
        <i class="fas fa-bars text-light"></i>
      </button>
      &nbsp;
      &nbsp;
      <a class="navbar-brand" href="Dashboard/index">
        <img src="img/logo.png" width="40" height="40" class="d-inline-block align-top mr-1" alt="" />Income and Expenses Tracker System
      </a>
      
     
      
    </nav>
 
    <script type="text/javascript" src="../../lib/js/main.js"></script>
</body>
</html>
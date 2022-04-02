<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>
   
 <base href="/expenseMVC/">
<?php include_once('link/link.php');?>
<script type="text/javascript" src="lib/js/main.js"></script>
 <style type="text/css">
     body {
           
 
         }
       .vertical-nav {
           min-width: 16rem;
            width: 16rem;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #424949;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.4s;
            color: #fff;
             text-decoration: none;
           } 
           .text-gray {
                   color: #fff;
                   padding: 5px;
                   font-size: 25px;
                   padding-left: 10px;
                  }

            ul li{
               line-height: 40px;          
               border-bottom: 1px solid rgba(255,255,255,0.1);
               padding-left: 15px;
               text-decoration: none;

           }
            ul li a{
                color: #fff;
                text-decoration: none;
            }
            .nav-item{
                background-color: #424949;
            }

    #sidebar.active {
           margin-left: -16rem;
            }  
   
    ul li a:hover {
            color: cyan  !important;
             padding-left: 25px;
        }
      
     @media (max-width: 768px) {
        #sidebar {
           margin-left: -17rem;
                 }
        #sidebar.active {
           margin-left: 0;
           }       
       } 
 </style>
   
</head>

<body>

    <!--veticalbar-->
   <div class="vertical-nav " id="sidebar">
  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0"><u>Main menu</u></p>

  <ul class="nav flex-column bg-dark mb-0">
    <li class="nav-item">
      <a href="Dashboard/index" class="nav-link "> Dashboard</a>
    </li>
    <li class="nav-item">
      <a href="Dashboard/category" class="nav-link ">Create category</a>
    </li>
    <li class="nav-item">
      <a href="Income/income" class="nav-link ">Add income</a>
    </li>
    <li class="nav-item">
      <a href="Expense/expense" class="nav-link">Add expense</a>
    </li>
     <li class="nav-item">
      <a href="Income/incomeReport" class="nav-link "> Income report</a>
    </li>
     <li class="nav-item">
      <a href="Expense/expenseReport" class="nav-link">Expense report</a>
    </li>
     <li class="nav-item">
      <a href="Dashboard/savingReport" class="nav-link">Saving report</a>
    </li>
     <li class="nav-item">
      <a href="Dashboard/profile" class="nav-link">Profile </a>
    </li>
     <li class="nav-item">
      <a href="User/Logout" class="nav-link">Logout</a>
    </li>
  </ul>

 
</div>
<script type="text/javascript" src="lib/js/main.js"></script>
</body>
</html>
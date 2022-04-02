<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard</title>
	<base href="/expenseMVC/">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<?php include_once('link/link.php');?>
	
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
	  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Category', 'Amount'],
           
           <?php  while($col1=$status->fetch_assoc()) { 
           echo "['".$col1['incomeName']."',".$col1['SUM(IAmount)']."],";
           } ?>
         
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php  while($col=$status2->fetch_assoc()) { 
           echo"['".$col['expenseName']."',".$col['SUM(EAmount)']."],";
            } ?>
         
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }
    </script>
</head>
<body >
	
	
	<?php include_once('views/shared/sidenav.php');?> 
	
	<?php include_once('views/shared/header.php');?>
	
	
<div class="page-content" id="content">
   <div id="page-wrapper">
	<br>
     <section  class="container-fluid">
	   <div class="row">
	     <div class="col-xl-4 ">
	     	<div class="card shadow">
	     	   <div class="card-body">
	     	   	<div class="col mr-4">
	     	     <div class="name"><strong class="text-uppercase">Income</strong></div>
	     	      <div><span>current month</span></div>
	     	      <?php $total=$incomeAmount->fetch_assoc(); ?>
                  <div class="count-number"><?php echo number_format($total['Amount']);?></div>
                 </div>
	           </div>
	     </div>
	     </div>
	     <div class="col-xl-4 ">
	     	<div class="card shadow">
	     	   <div class="card-body ">
	     	    	<div class="col mr-4">
	     	     <div class="name"><strong class="text-uppercase">expense</strong></div>
	     	      <div><span>current month</span></div>
	     	       <?php $total2=$expenseAmount->fetch_assoc(); ?>
                  <div class="count-number"><?php echo number_format($total2['Amount']);?></div>
                 </div>
	           </div>
	     </div>
	     </div>
	     <div class="col-xl-4 ">
	     	<div class="card shadow">
	     	   <div class="card-body">
	     	    	<div class="col mr-4">
	     	     <div class="name"><strong class="text-uppercase">saving</strong></div>
	     	      <div><span>current month</span></div>
	     	      <?php $saving= $total['Amount']-$total2['Amount']; ?>
                  <div class="count-number"><?php echo number_format($saving); ?></div>
                 </div>
	           </div>
	     </div>
	     </div>
	    
     </div>	
</section>
<br>
<br>
<section class="container-fluid">
	 <div class="row d-flex align-items-md-stretch">
	<div class="col-lg-6 ">
	     	<div class="card shadow">
	     		<div class="card-header d-flex">
	     			<h5>Income chart</h5>
	     		</div>
	     	   <div class="card-body">
	     	   	<div class="col">
	     	     <div id="piechart" style=""></div>
                 </div>
	           </div>
	     </div>
	     </div>
	 <div class="col-lg-6">
	     	<div class="card shadow">
	     		<div class="card-header d-flex">
	     			<h5>Expense chart</h5>
	     		</div>
	     	   <div class="card-body">
	     	   	<div class="col">
	     	     <div id="piechart1" style=""></div>
                 </div>
	           </div>
	     </div>
	     </div>

	</div>
	
</section>
<br>
</div>
</div>
 <script type="text/javascript" src="lib/js/main.js"></script>

</body>
</html>
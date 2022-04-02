<?php
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Saving Report</title>
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
	 <div id="page-wrapper">
	 	
	 	<br>
	<section>
       <div class="container-fluid ">
       	<div class="row">
	     <div class="col-xl-12 ">
       	   <div class="card shadow">
       		 <div class="card-body">
	     	   
       
       	  
          <form class="form-inline" method="POST" action="Dashboard/savingreport">
            <div class="form-group">
                
                   <input type="month" class="form-control" name="date" id="" required="" />
                   &nbsp;
                   &nbsp;
                   <button type="submit" name="insert" class="btn btn-primary">Enter</button>
            </div>
          </form>
    
             </div>
           </div>
          </div>
         </div>
       </div>
    </section>
    <br>
    <section>
       <div class="container-fluid shadow">
        <br>
       <table class="table table-stripped table-bordered" id="Report" >
               <thead class="thead-dark">
                   <tr>
                     <th colspan="2"><center><h5>Saving details</h5></center></th>
                    </tr>
                   
               </thead>
               <tbody>
                 <tr>
                      <th scope="col">Total Income:</th>
                      <?php $itot=$itotal->fetch_assoc() ?>
                        <td scope="col"><?php echo number_format($itot['total']); ?></td>                          
                    </tr>
                  <tr>
                      <th scope="col">Total Expense:</th>
                      <?php $etot=$etotal->fetch_assoc() ?>
                        <td scope="col"><?php echo number_format($etot['total']); ?></td>                          
                    </tr>
                    <tr>
                      <th scope="col">Total Saving:</th>
                        <td scope="col"><?php echo number_format($itot['total']-$etot['total']); ?></td>                          
                    </tr>    
               </tbody>
             </table>
                <button class="btn btn-primary" id="print">print</button>
             <br>
           </div>
    </section>
    </div>	
</div>
<script type="text/javascript">
   $('#print').click(function(){
    var printme=document.getElementById('Report');
    var wme=window.open("","","width=900,height=800");
    wme.document.write(printme.outerHTML);
    wme.document.close();
   
    wme.print();
   
   });
</script>
</body>
</html>
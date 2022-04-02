<?php
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Expense Report</title>
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
       <div class="container-fluid">
       	<div class="row">
	     <div class="col-xl-12 ">
       	   <div class="card shadow">
       		 <div class="card-body">
	     	   
       
       	  
          <form class="form-inline" method="POST" action="Expense/expenseReport">
            <div class="row">
              <div class="col">
                 <div class="form-group">
                      <input type="month" class="form-control" name="date" id="" placeholder="year"  />
                 </div>   
             </div>   
                   &nbsp;
              <div class="col">
                  <div class="form-group">
                    <select class="form-control" name="icat" id="">
                      <option value="">All</option>
                      <?php while($col3=$cat2->fetch_assoc()) { ?>
                         <option value="<?php echo $col3['expenseId']; ?>"><?php echo $col3['expenseName']; ?></option>
                        <?php  } ?>
                    </select>                  
                  </div>   
              </div> 
                   &nbsp;
              <div class="col">     
                <div class="form-group">  
                   <button type="submit" name="insert" class="btn btn-primary">Enter</button>
                 </div>
               </div>
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
          <div class="container-fluid shadow" >
            <br>
            <table class="table table-stripped table-bordered" id="Report" >
               <thead class="thead-dark">
                   <tr>
                     <th colspan="6"><center><h5>Expense details</h5></center></th>
                    </tr>
                    <tr>
                      <th scope="col">Date</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Amount</th>
                        <th scope="col">description</th>
                           
                    </tr>
               </thead>
               <tbody>

                <?php while($col1=$record->fetch_assoc()) { ?>
                   <tr>
                        <td><?php echo date("M d Y",strtotime($col1['EDate']));?></td>
                        <td><?php echo $col1['EName']; ?></td>
                        <td><?php echo $col1['expenseName']; ?></td>
                        <td><?php echo number_format($col1['EAmount']);?></td>
                        <td><?php echo $col1['EDescription']; ?></td>
                       
                    </tr>
                          <?php  } ?>
                     <tr>
                        <td colspan="3">Total:</td>
                         <?php $total=$sum->fetch_assoc(); ?>
                        <td><?php echo number_format($total['sum']); ?></td>
                        <td></td>
                     </tr>
                </tbody>
            </table>
               <button class="btn btn-primary" id="print">print</button>
            <br>
          </div>
          <br>
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
<!DOCTYPE html>
<html>
<head>
	<title>category</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="/expenseMVC/">
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
     #add1 input{
        width: 300px;
        height: 40px;
     } 
     #add2 input{
        width: 300px;
        height: 40px
     } 
    .table tr{
              height: 5px;
    }
	
	</style>
</head>
<body>
	
	<?php include_once('views/shared/sidenav.php');?> 
	
	<?php include_once('views/shared/header.php');?>
   <div class="page-content" id="content">
      <br>
   	   <section>
   	   	 <div class="row">
   	        <div class="container-fluid col-lg-6">

   	        	<div class="card shadow">
   	        	 <div class="card-header d-flex "><h5>Add Income Catagory</h5></div>
   	        	 
   	        	 <div class="card-body">
   	        	<form class="form-inline" id="add1" method="post" action="Dashboard/addIncomeCategory">	 
                         <label for="incomecategory" class="sr-only"></label>
                         <input type="text" name="incomename" id="inlineFormInput" class="form-control">
                         &nbsp;
                         &nbsp;
                         <button type="submit" name="insert" class="btn btn-primary">Add</button>                   
                </form>
               </div>
   	        </div>
            <br>
   	        <div class="card shadow">
   	        <table class="table table-stripped table-bordered">
               <thead class="thead-dark">
  	               <tr>
  		               <th colspan="3"><center><h5>Income Category</h5></center></th>
  	                </tr>
                    <tr>
                        <th scope="col">Name</th>
                       
                        <th scope="col">Action</th>   
                    </tr>
               </thead>
               <tbody>
                 <?php  
                      while($data=$incomedata->fetch_assoc()) { ?>
                  <tr>
                   
                        <td><?php echo $data['incomeName']; ?></td>
                        
                        <td>
		                     <a class="btn btn-danger" href="Dashboard/deleteIncomeCategory?incomeId=<?php echo $data['incomeId']; ?>" onClick="return confirm('Do you want to Delete? Y/N')"> Delete </a>
	                     </td>   
                         </tr>
                       <?php  } ?>
                </tbody>
            </table>
        </div>
   	    </div>
   	    <div class="container-fluid col-lg-6">
   	        	<div class="card shadow">
   	        	 <div class="card-header d-flex "><h5>Add Expense Catagory</h5></div>    	 
   	        	 <div class="card-body">
   	        	   <form class="form-inline" id="add2" method="post" action="Dashboard/addExpenseCategory">	
                      <label for="expensecategory" class="sr-only"></label>
                         <input type="text" name="expensename" id="inlineFormInput" placeholder="" class="form-control">
                         &nbsp;
                         &nbsp;
                         <button type="submit" name="insert1" class="btn btn-primary">Add</button>
                </form>
               </div>
   	        </div>
            <br>
   	        <div class="card shadow">
   	        <table class="table table-stripped table-bordered">
               <thead class="thead-dark">
  	               <tr>
  		               <th colspan="3"><center><h5>Expense Category</h5></center></th>
  	                </tr>
                    <tr>
                        <th scope="col">Name</th>
                       
                        <th scope="col">Action</th>   
                    </tr>
               </thead>
               <tbody>
                <?php  
                      while($d=$expensedata->fetch_assoc()) { ?>
                   <tr>
                        <td><?php echo $d['expenseName']; ?></td>
                       
                        <td>
		                    <a class="btn btn-danger" href="Dashboard/deleteExpenseCategory?Id=<?php echo $d['expenseId'];?>" onClick="return confirm('Do you want to Delete? Y/N')"> Delete </a>
	                     </td>   
                         </tr>
                      <?php  } ?>
                </tbody>
            </table>
        </div>
   	    </div>
   	</div>
   	    </section>
        
         <div id="Modal1" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade text-left">
                                 <div role="document" class="modal-dialog">
                                   <div class="modal-content">
                                     <div class="modal-header">
                                      <h5 id="exampleModalLabel" class="modal-title">Update Income Category </h5>          
                                     </div>
                                     <div class="modal-body">
                                      <?php// $i=$incomeName->fetch_assoc();   ?> 
                            <form method="post" action="Dashboard/updateIncomeCategory">
                                <div class="form-group">
                                  <input type="text" name="incomename"class="form-control" placeholder="<?php echo $i; ?>">
                                </div>
                                <div class="form-group">       
                                  <input type="submit" value="update" class="btn btn-primary">
                                </div>
                          </form>
                                    </div>
                                      <div class="modal-footer">
                                       <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                       </div>
                                 </div>
                                </div>
                              </div>	
   </div>




	

</body>
</html>
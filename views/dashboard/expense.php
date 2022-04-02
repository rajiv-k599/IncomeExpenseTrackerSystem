<!DOCTYPE html>
<html>
<head>
	<title>Add Expense</title>
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
   	     <div class="container-fluid shadow">
   	     	<br>
   	     	<header> 
            <h1 class="h3 display">Add Expense</h1>
          </header>
   	     	 <form class="mt-3" method="POST" action="Expense/InsertExpense">
            <input type="hidden" name="EId" value="<?php echo $expenseId ?>"/>
   	     	 	<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="expensename">Name: </label>
                                        <input type="text" class="form-control" name="ename" id=""
                                            placeholder="Expense name" required="" value="<?php echo $ename; ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="expenseamount">Amount:</label>
                                        <input type="number" class="form-control" name="eamount" id=""
                                            placeholder="Amount" required="" value="<?php echo $eamount; ?>"/>
                                    </div>
                                </div>
                            </div>
                 <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="expensedate">Date: </label>
                                        <input type="date" class="form-control" name="edate" id=""
                                            placeholder="Expense date" required="" value="<?php echo $edate; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="expensecategory">Category:</label>
                                        <select class="form-control" name="ecategory" id="">
                                           <option value=""></option>
                                           <?php while($col=$expensedata->fetch_assoc()) { ?>
                                            
                                             <option value="<?php echo $col['expenseId']; ?>"><?php echo $col['expenseName']; ?></option>
                                            <?php  } ?>
                                            </select>
                                    </div>
                                </div>
                            </div>
                    <div class="row">
                    	      <div class="col">
                                    <div class="form-group">
                    	              <label for="comment">Description:</label>
                                       <textarea class="form-control" rows="3" id="comment" name="edescription" placeholder="<?php echo $edes; ?>" value="<?php echo $edes; ?>"></textarea>
                                   </div>
                               </div>
                    </div> 
                    <div class="row">
                            <div class="col">
                                    <div class="form-group">
                                   <?php 
                                      if($update == true):
                                      ?>
                                        <button type="submit" name="update"  class="btn btn-primary">Update</button> 
                                      <?php else: ?>
                                        <button type="submit" name="insert"  class="btn btn-primary">Insert</button> 
                                      <?php endif; ?> 
                               </div>
                          </div>
                     </div>                 

   	     	 </form>
   	     	
   	     </div>
   	     <br>
   	     <section>
   	      <div class="container-fluid shadow">
            <br>
   	      	<table class="table table-stripped table-bordered">
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
                        <th scope="col">Action</th>   
                    </tr>
               </thead>
               <tbody>
                <?php while($col1=$expenseHistory->fetch_assoc()) { ?>
                   <tr>
                   	    <td><?php echo date("M d Y",strtotime($col1['EDate']));?></td>
                   	    <td><?php echo $col1['EName']; ?></td>
                        <td><?php echo $col1['expenseName']; ?></td>
                        <td><?php echo number_format($col1['EAmount']);?></td>
                        <td><?php echo $col1['EDescription']; ?></td>
                        <td><a class="btn btn-primary" href="Expense/expense?expenseId=<?php echo $col1['EId']; ?>"> Update </a>
		                     <a class="btn btn-danger" href="Expense/deleteExpense?expenseId=<?php echo $col1['EId']; ?>" onClick="return confirm('Do you want to Delete? Y/N')"> Delete </a>
	                       </td>   
                    </tr>
                <?php  } ?>
                </tbody>
            </table>
            <br>
   	      </div>
   	  </section>

   </div>
	

</body>
</html>
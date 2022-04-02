<!DOCTYPE html>
<html>
<head>
	<title>Add Income</title>
	
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
            <h1 class="h3 display">Add Income </h1>
          </header>
        
   	     	 <form class="mt-3" method="POST" action="Income/InsertIncome">
            <input type="hidden" name="IId" value="<?php echo $incomeId ?>"/>
   	     	 	<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="incomename">Name: </label>
                                        <input type="text" class="form-control" name="iname" id=""
                                            placeholder="Income name" required="" value="<?php echo $iname; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="incomeamount">Amount:</label>
                                        <input type="number" class="form-control" name="iamount" id=""
                                            placeholder="Amount" required="" value="<?php echo $iamount; ?>" />
                                    </div>
                                </div>
                            </div>
                 <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="incomedate">Date: </label>
                                        <input type="date" class="form-control" name="idate" id=""
                                            placeholder="Income date" required="" value="<?php echo $idate; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="incomecategory">Category:</label>
                                        <select class="form-control" name="icategory" id="">
                                            <option value=""></option>
                                           <?php while($col1=$incomedata->fetch_assoc()) { ?>

                                            <option value="<?php echo $col1['incomeId']; ?>"><?php echo $col1['incomeName']; ?></option>
                                            <?php  } ?>
                                            </select>
                                    </div>
                                </div>
                            </div>
                    <div class="row">
                    	      <div class="col">
                                    <div class="form-group">
                    	              <label for="comment">Description:</label>
                                       <textarea class="form-control" rows="3" id="comment" name="idescription" placeholder="<?php echo $ides; ?>" value="<?php echo $ides; ?>"></textarea>
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
  		               <th colspan="6"><center><h5>Income details</h5></center></th>
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
                <?php while($col=$incomeHistory->fetch_assoc()) { ?>
                   <tr>
                   	    <td><?php echo date("M d Y",strtotime($col['IDate']));?></td>
                   	    <td><?php echo $col['IName']; ?></td>
                        <td><?php echo $col['incomeName']; ?></td>
                        <td><?php echo number_format($col['IAmount']);?></td>
                        <td><?php echo $col['IDescription']; ?></td>
                        <td><a class="btn btn-primary" href="Income/income?incomeId=<?php echo $col['lId']; ?>" name="update">Update</a>
		                     <a class="btn btn-danger" href="Income/deleteIncome?incomeId=<?php echo $col['lId']; ?>" onClick="return confirm('Do you want to Delete? Y/N')"> Delete </a>
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
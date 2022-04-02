<?php session_start();
 class ExpenseController{
 	private $addexpense;
   	     function __construct(){
              require_once "model/AddExpense.php";
              $this->addexpense=new AddExpense();             
              }
 	  function expense(){
 	     	$UserId=$_SESSION['UserId'];
   	    	$this->addexpense->setUserId($UserId);
             $expensedata=$this->addexpense->expenseCategoryRecord();
             $expenseHistory=$this->addexpense->expenseData();
             $update= false;
             $ename="";
             $eamount="";
             $edate="";
             $edes="";
             if(isset($_GET["expenseId"])){
                   $expenseId=$_GET['expenseId'];
                   $update= true;
                   if(empty($expenseId)){
                        echo "<script>
                               alert ('empty!');
                               location='expense';
                        </script>";
                      }else {
                        $this->addexpense->setEId($expenseId);
                        $result=$this->addexpense->selectUpdate();
                        $view=$result->fetch_assoc();

                        $ename=$view['EName'];
                        $eamount=$view['EAmount'];
                        $edate=$view['EDate'];
                        $edes=$view['EDescription'];
                     
                      }
                    }
      		include './views/dashboard/expense.php';
      	       }
       
        function expenseReport(){

          //for report category
              $UserId=$_SESSION['UserId'];
               $this->addexpense->setUserId($UserId);
              $cat2=$this->addexpense->expenseCategoryRecord();
                //report form validate
                  if(isset($_POST["insert"])){
                        $date=$_POST["date"];
                        $UserId=$_SESSION['UserId'];
                        $expenseCat=$_POST["icat"];
                          if(empty($date) || empty($UserId)){
                                 echo "<script>
                                       alert ('Enter month!');
                                       location='expenseReport';
                                       </script>";
                                 }else{
                                  if(empty($expenseCat)){
                                    $this->addexpense->setUserId($UserId);
                                    $this->addexpense->setEdate($date);
                                    $record=$this->addexpense->viewExpense();
                                    $sum=$this->addexpense->sumExpense();
                                 }else{
                                    $this->addexpense->setUserId($UserId);
                                    $this->addexpense->setEdate($date);
                                    $this->addexpense->setExpenseId($expenseCat);
                                    $record=$this->addexpense->viewExpense2();
                                    $sum=$this->addexpense->sumExpense2();
                                 }
                               }
                             }

          include './views/dashboard/expenseReport.php';
               }
        function InsertExpense(){
           if(isset($_POST["insert"])){
                $UserId=$_SESSION['UserId'];
                $expenseName=$_POST["ename"];
                $expenseAmount=$_POST["eamount"];
                $expenseDate=$_POST["edate"];
                $expenseCategory=$_POST["ecategory"];
                $expenseDescription=$_POST["edescription"];
                //validation check
                if(empty($UserId) || empty($expenseName) || empty($expenseAmount) || empty($expenseDate) || empty($expenseCategory) || empty($expenseDescription)){
                         echo  "<script> alert ('All fields Required!'); 
                                         location='expense';
                                  </script>";
                }else{
                  // sending income data to model

                  $this->addexpense->setUserId($UserId);
                  $this->addexpense->setEname($expenseName);
                  $this->addexpense->setEdate($expenseDate);
                  $this->addexpense->setEamount($expenseAmount);
                  $this->addexpense->setExpenseId($expenseCategory);
                  $this->addexpense->setEdescription($expenseDescription);

                   $i=$this->addexpense->insertExpenseData();
                    if($i==TRUE){
                         echo "<script> alert ('Inserted Successfully!'); 
                                 location='expense';
                              </script>";
                      }else{
                         echo "<script> alert ('Failed to Insert!'); 
                                location='expense';
                               </script>";
                            }
                   }
                }
          if(isset($_POST["update"])){
                     $Eid=$_POST["EId"];
                     $expenseName=$_POST["ename"];
                     $expenseAmount=$_POST["eamount"];
                     $expenseDate=$_POST["edate"];
                     $expenseCategory=$_POST["ecategory"];
                     $expenseDescription=$_POST["edescription"];
                     if(empty($Eid) || empty($expenseName) || empty($expenseAmount) || empty($expenseDate) || empty($expenseCategory) || empty($expenseDescription)){
                                      echo  "<script> alert ('All fields Required!'); 
                                                      location='expense';
                                             </script>";
                                   }else{
                                    $this->addexpense->setEId($Eid);
                                    $this->addexpense->setEname($expenseName);
                                    $this->addexpense->setEdate($expenseDate);
                                    $this->addexpense->setEamount($expenseAmount);
                                    $this->addexpense->setExpenseId($expenseCategory);
                                    $this->addexpense->setEdescription($expenseDescription);
                                     $u=$this->addexpense->updateExpense();
                                     if($u==TRUE){
                                            echo "<script> alert ('Updated Successfully!'); 
                                                    location='expense';
                                                   </script>";
                                                  }else{
                                            echo "<script> alert ('Failed to update!'); 
                                                    location='expense';
                                                   </script>";
                                                  }
                                     }
                                   }              
              }
              function deleteExpense(){
                 //receive expenseid here
                   $expenseId=$_GET['expenseId'];
                    //send data to model
                   if(empty($expenseId)){
                        echo "<script>
                               alert ('empty!');
                               location='expense';
                        </script>";
                      } else {
                        $this->addexpense->setEId($expenseId);
                        $result=$this->addexpense->deleteExpense();
                        if($result==TRUE){
                          echo "<script> alert('Deleted successfully!');
                                         location='expense';
                                </script>";
                              }else{
                                    echo "<script> alert ('Failed to Delete!'); 
                                           location='expense';
                                          </script>";    
                              }
                      }
              }
       
 }
?>
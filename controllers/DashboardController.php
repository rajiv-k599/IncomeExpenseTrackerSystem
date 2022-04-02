<?php session_start();
      class DashboardController{

        private $income;
        private $expensecategory;
        function __construct(){
              require_once "model/IncomeCategory.php";
              $this->income=new IncomeCategory();
              require_once "model/ExpenseCategory.php";
              $this->expensecategory=new ExpenseCategory();
              require_once "model/AddIncome.php";
              $this->addincome=new AddIncome();
              require_once "model/AddExpense.php";
              $this->addexpense=new AddExpense();
              }
       
        

      	function index(){
          if (!isset($_SESSION['UserId'])) {
                header ('Location: ../User/login');
                  exit;
                 }
                  $UserId=$_SESSION['UserId']; 
                 //income section
          
            //send to addincome category model
           $this->addincome->setUserId($UserId);
           //retrive from model
           $incomeAmount=$this->addincome->incomeCurrentSum();
           //income pie chart status
            $status=$this->addincome->incomeStatus();

           //expense section
          
            //send to addexpense category model
           $this->addexpense->setUserId($UserId);
           //retrive from model
           $expenseAmount=$this->addexpense->expenseCurrentSum();
           //expense pie chart status
           $status2=$this->addexpense->expenseStatus();

      		include 'views/dashboard/dashboard.php';
      	     }
      	function category(){
          if (!isset($_SESSION['UserId'])) {
                header ('Location: ../User/login');
                  exit;
                 }
           $UserId=$_SESSION['UserId'];
           //send to income category model
           $this->income->setUserId($UserId);
          $incomedata=$this->income->incomeCategoryRecord();
   /*
           //send data to update
          if(isset($_GET["incomeId"])){
             $incomeId=$_GET["incomeId"];
             $this->income->setIncomeId($incomeId);
             $incomeName=$this->income->IncomeSelect();
           }
*/
             //send to income category model
           $this->expensecategory->setUserId($UserId);
           $expensedata=$this->expensecategory->expenseCategoryRecord();

      		include 'views/dashboard/category.php';

      	       }
       
      	
        function savingreport(){
          
              if(isset($_POST['insert'])){
                   $date=$_POST['date'];
                   $UserId=$_SESSION['UserId'];
                   //income
                      $this->addincome->setUserId($UserId);
                       $this->addincome->setIdate($date);
                       //expense
                        $this->addexpense->setUserId($UserId);
                       $this->addexpense->setEdate($date);
                    //receive from model
                       $itotal=$this->addincome->incomeSaving();
                       $etotal=$this->addexpense->expenseSaving();

                  }
          include './views/dashboard/savingReport.php';
               }
        function profile(){
          if (!isset($_SESSION['UserId'])) {
                header ('Location: ../User/login');
                  exit;
                 }
          include './views/dashboard/profile.php';
               }
            
            function addIncomeCategory(){
                  if(isset($_POST["insert"])){
                        $incomeName=$_POST["incomename"];
                        $UserId=$_SESSION['UserId'];
                      if(empty($incomeName)){
                        echo "<script>
                               alert ('empty!');
                               location='category';
                        </script>";
                      }else{
                        //set values to model
                         $this->income->setUserId($UserId);
                         $this->income->setIncomeName($incomeName);
                        //function call
                        $c=$this->income->incomeCategoryCheck(); 
                       
                        if (mysqli_num_rows($c) >= 1) {
                                                     echo "<script> alert (' Already exist!'); 
                                                               location='category';
                                                        </script>";
                                                    }
                                        else{   
                                                 $i=$this->income->insertIncome();
                                                if($i==TRUE){
                                                       echo "<script> alert ('Inserted Successfully!'); 
                                                              location='category';
                                                             </script>";
                                                   }else{
                                                       echo "<script> alert ('Failed to Insert!'); 
                                                             location='category';
                                                             </script>";
                                                       }
                                              }
                               }
                        }
                }
            function deleteIncomeCategory(){
                 //receive bid here
                   $incomeId=$_GET["incomeId"];
                  //send data to model
                  $this->income->setIncomeId($incomeId);
      
                 //calling delete function
                  $result=$this->income->deleteIncome();
                  if($result==TRUE){
                       echo "<script> alert ('Deleted Successfully!'); 
                             location='category';
                             </script>";
                      }else{
                       echo "<script> alert ('Failed to Delete!'); 
                             location='category';
                             </script>";
                       }

            }
            
            function addExpenseCategory(){
                  if(isset($_POST["insert1"])){
                        $expensename=$_POST["expensename"];
                        $UserId=$_SESSION['UserId'];
                      if(empty($expensename || empty($UserId))){
                        echo "<script>
                               alert ('empty!');
                               location='category';
                        </script>";
                      }else{
                        
                        //set values to model
                        $this->expensecategory->setUserId($UserId);
                        $this->expensecategory->setExpenseName($expensename);

                       $c=$this->expensecategory->expenseCategoryCheck();                       
                        if (mysqli_num_rows($c) >= 1) {
                                                     echo "<script> alert (' Already exist!'); 
                                                               location='category';
                                                        </script>";
                                                    }
                                        else{    
                                              $result=$this->expensecategory->insertExpense();
                                               if($result==TRUE){
                                                    echo "<script> alert ('Inserted Successfully!'); 
                                                          location='category';
                                                         </script>";
                                                    }else{
                                                        echo "<script> alert ('Failed to Insert!'); 
                                                               location='category';
                                                     </script>";
                                                   }
                                            }
                                }
                            }
                      }

         
            function deleteExpenseCategory(){
              
                 //receive expenseid here
                   $Id=$_GET['Id'];
                  //send data to model
                   if(empty($Id)){
                        echo "<script>
                               alert ('empty!');
                               location='category';
                        </script>";
                      } else{
                  $this->expensecategory->setExpenseId($Id);
      
                 //calling delete function
                  $result=$this->expensecategory->deleteExpense();
                  if($result==TRUE){
                       echo "<script> alert ('Deleted Successfully!'); 
                             location='category';
                             </script>";
                      }else{
                       echo "<script> alert ('Failed to Delete!'); 
                             location='category';
                             </script>";
                       }

            }
          
        }
          
      }
?>
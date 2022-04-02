<?php session_start();
   class IncomeController{
   	  private $addincome;
   	     function __construct(){
              require_once "model/AddIncome.php";
              $this->addincome=new AddIncome();             
              }
   	    function income(){

             $UserId=$_SESSION['UserId'];
   	    	$this->addincome->setUserId($UserId);
             $incomedata=$this->addincome->incomeCategoryRecord();
             $incomeHistory=$this->addincome->incomeData();
             $update= false;
             $iname="";
             $iamount="";
             $idate="";
             $ides="";
             if(isset($_GET["incomeId"])){
                   $incomeId=$_GET['incomeId'];
                   $update= true;
                   if(empty($incomeId)){
                        echo "<script>
                               alert ('empty!');
                               location='income';
                        </script>";
                      } else {
                        $this->addincome->setIId($incomeId);
                        $result=$this->addincome->selectUpdate();
                        $view=$result->fetch_assoc();

                        $iname=$view['IName'];
                        $iamount=$view['IAmount'];
                        $idate=$view['IDate'];
                        $ides=$view['IDescription'];
                      
                      }
                    }
      		include './views/dashboard/income.php';
      	       }
      	function incomeReport(){
         $UserId=$_SESSION['UserId'];
          $this->addincome->setUserId($UserId);
             $cat=$this->addincome->incomeCategoryRecord();
                  



          if(isset($_POST["insert"])){
               $date=$_POST["date"];
               $UserId=$_SESSION['UserId'];
                $incomeCat=$_POST["icat"];
               if(empty($date) || empty($UserId)){
                   echo "<script>
                               alert ('Enter month!');
                               location='incomeReport';
                        </script>";
                   }else{
                      if(empty($incomeCat)){
                           $this->addincome->setUserId($UserId);
                           $this->addincome->setIDate($date);
                           $record=$this->addincome->viewIncome();
                           $sum=$this->addincome->incomeSum();
                          }else{
                           $this->addincome->setUserId($UserId);
                           $this->addincome->setIdate($date);
                           $this->addincome->setIncomeId($incomeCat);
                           $record=$this->addincome->viewIncome2();
                           $sum=$this->addincome->incomeSum2();
                            }
                         }
               
               }
            
          include 'views/dashboard/incomeReport.php';

               }  
        function InsertIncome(){
           if(isset($_POST["insert"])){
                $UserId=$_SESSION['UserId'];
                $incomeName=$_POST["iname"];
                $incomeAmount=$_POST["iamount"];
                $incomeDate=$_POST["idate"];
                $incomeCategory=$_POST["icategory"];
                $incomeDescription=$_POST["idescription"];
                //validation check
                if(empty($UserId) || empty($incomeName) || empty($incomeAmount) || empty($incomeDate) || empty($incomeCategory) || empty($incomeDescription)){
                         echo  "<script> alert ('All fields Required!'); 
                                         location='income';
                                  </script>";
                }else{
                  // sending income data to model

                  $this->addincome->setUserId($UserId);
                  $this->addincome->setIname($incomeName);
                  $this->addincome->setIdate($incomeDate);
                  $this->addincome->setIamount($incomeAmount);
                  $this->addincome->setIncomeId($incomeCategory);
                  $this->addincome->setIdescription($incomeDescription);

                   $i=$this->addincome->insertIncomeData();
                    if($i==TRUE){
                         echo "<script> alert ('Inserted Successfully!'); 
                                 location='income';
                              </script>";
                      }else{
                         echo "<script> alert ('Failed to Insert!'); 
                                location='income';
                               </script>";
                            }
                      }
                    }
               if(isset($_POST["update"])){
                     $Iid=$_POST["IId"];
                     $incomeName=$_POST["iname"];
                     $incomeAmount=$_POST["iamount"];
                     $incomeDate=$_POST["idate"];
                     $incomeCategory=$_POST["icategory"];
                     $incomeDescription=$_POST["idescription"];
                     if(empty($Iid) || empty($incomeName) || empty($incomeAmount) || empty($incomeDate) || empty($incomeCategory) || empty($incomeDescription)){
                                      echo  "<script> alert ('All fields Required!'); 
                                                      location='income';
                                             </script>";
                                   }else{
                                    $this->addincome->setIId($Iid);
                                    $this->addincome->setIname($incomeName);
                                    $this->addincome->setIdate($incomeDate);
                                    $this->addincome->setIamount($incomeAmount);
                                    $this->addincome->setIncomeId($incomeCategory);
                                    $this->addincome->setIdescription($incomeDescription);
                                     $u=$this->addincome->updateIncome();
                                     if($u==TRUE){
                                            echo "<script> alert ('Updated Successfully!'); 
                                                    location='income';
                                                   </script>";
                                                  }else{
                                            echo "<script> alert ('Failed to update!'); 
                                                    location='income';
                                                   </script>";
                                                  }
                                     }
                                   }

                  }
               
          function deleteIncome(){
                 //receive income id here
                   $incomeId=$_GET['incomeId'];
                    //send data to model
                   if(empty($incomeId)){
                        echo "<script>
                               alert ('empty!');
                               location='income';
                        </script>";
                      } else {
                        $this->addincome->setIId($incomeId);
                        $result=$this->addincome->deleteIncome();
                        if($result==TRUE){
                          echo "<script> alert('Deleted successfully!');
                                         location='income';
                                </script>";
                              }else{
                                    echo "<script> alert ('Failed to Delete!'); 
                                           location='income';
                                          </script>";    
                              }
                      }
              }

             

         

   }
?>
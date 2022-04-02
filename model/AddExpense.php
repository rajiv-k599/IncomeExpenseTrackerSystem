<?php
class AddExpense{
	//data member
	private $EId;
	private $EName;
	private $expenseId;
	private $EDate;
	private $EAmount;
	private $EDescription;
	private $userId;
     
    public function setEId($EId){
           $this->EId=$EId;
       }
       public function getEId(){
            return $this->EId;
         }

	  public function setEname($EName){
           $this->EName=$EName;
       }
       public function getEname(){
            return $this->EName;
          }

    public function setEdate($EDate){
           $this->EDate=$EDate;
       }
       public function getEdate(){
            return $this->EDate;
          }

    public function setEamount($EAmount){
           $this->EAmount=$EAmount;
       }
       public function getEamount(){
            return $this->EAmount;
          } 

    public function setEdescription($EDescription){
           $this->EDescription=$EDescription;
       }
       public function getEdescription(){
            return $this->EDescription;
          }         
    
    public function setExpenseId($expenseid){
           $this->expenseid=$expenseid;
       }
       public function getExpenseId(){
            return $this->expenseid;
       }

	  public function setUserId($userId){
           $this->userId=$userId;
       }
       public function getUserId(){
            return $this->userId;
          }

      //database connection
       private $conn="";
           function __construct(){
           require_once "service/Config.php";
           $this->conn=Config::getConnection();
              }  
       function expenseCategoryRecord(){
            
              $sql="SELECT * FROM expensecategory WHERE userId=$this->userId ORDER BY expenseId DESC";
              $result=$this->conn->query($sql);
              return $result;
            }  
        function insertExpenseData(){
          $sql="INSERT INTO expense (EName, expenseId, EDate, EAmount, EDescription, userId) VALUES ('$this->EName','$this->expenseid','$this->EDate','$this->EAmount','$this->EDescription','$this->userId')";
          $result=$this->conn->query($sql);
              return $result;
       } 
       // dashboard Status   
       function expenseCurrentSum(){
        $sql="SELECT SUM(EAmount) AS Amount FROM expense WHERE userId = $this->userId AND MONTH(EDate) = MONTH (CURRENT_DATE())";
        $res=$this->conn->query($sql);
        return $res;
       }  

       // dashboards pie charts
       function expenseStatus(){
        $sql="SELECT expenseName, SUM(EAmount) FROM expense LEFT JOIN expensecategory ON expense.expenseId = expensecategory.expenseId WHERE expense.userId=$this->userId AND MONTH(expense.EDate) = MONTH (CURRENT_DATE()) GROUP BY expensecategory.expenseId";
        $res2=$this->conn->query($sql);
        return $res2;
       }

        // crud opration ..
       function expenseData(){
        $sql="SELECT * FROM expense LEFT JOIN expensecategory ON expense.expenseId = expensecategory.expenseId WHERE expense.userId=$this->userId AND MONTH(EDate) = MONTH (CURRENT_DATE()) ORDER BY expense.EDate DESC";
        $res2=$this->conn->query($sql);
        return $res2;
       } 
      
        //select to update
       function selectUpdate(){
        $sql="SELECT * FROM expense WHERE EId=$this->EId";
        $res=$this->conn->query($sql);
        return $res;
       }
       //update data
       function updateExpense(){
       $sql="UPDATE expense SET EName='$this->EName',EAmount=$this->EAmount ,EDate='$this->EDate',expenseId=$this->expenseid ,EDescription='$this->EDescription' WHERE EId=$this->EId";
        $res=$this->conn->query($sql);
        return $res;  
       }

       function deleteExpense(){
        $sql="DELETE FROM expense WHERE EId=$this->EId";
        $res=$this->conn->query($sql);
        return $res;
       }
        //view expanse report without category
        function viewExpense(){
        $sql="SELECT * FROM expense LEFT JOIN expensecategory ON expense.expenseId = expensecategory.expenseId WHERE expense.userId=$this->userId AND expense.EDate LIKE '$this->EDate%'";
        $res3=$this->conn->query($sql);
        return $res3;
       }

       function sumExpense(){
        $sql="SELECT SUM(EAmount) as sum FROM expense LEFT JOIN expensecategory ON expense.expenseId = expensecategory.expenseId WHERE expense.userId=$this->userId AND expense.EDate LIKE '$this->EDate%'";
        $res3=$this->conn->query($sql);
        return $res3;
       }
        //view expense report according to category
        function viewExpense2(){
        $sql="SELECT * FROM expense LEFT JOIN expensecategory ON expense.expenseId = expensecategory.expenseId WHERE expense.userId=$this->userId AND expense.EDate LIKE '$this->EDate%' AND expense.expenseId =$this->expenseid";
        $res3=$this->conn->query($sql);
        return $res3;
       }
       function sumExpense2(){
        $sql="SELECT SUM(EAmount) as sum FROM expense LEFT JOIN expensecategory ON expense.expenseId = expensecategory.expenseId WHERE expense.userId=$this->userId AND expense.EDate LIKE '$this->EDate%' AND expense.expenseId =$this->expenseid";
        $res3=$this->conn->query($sql);
        return $res3;
       }
       //seving Report
       function expenseSaving(){
        $sql="SELECT SUM(EAmount) as total FROM expense LEFT JOIN expensecategory ON expense.expenseId = expensecategory.expenseId WHERE expense.userId=$this->userId AND expense.EDate LIKE '$this->EDate%'";
        $res3=$this->conn->query($sql);
        return $res3;
       }
   }
?>
<?php
class AddIncome{
	//data member
	private $IId;
	private $IName;
	private $incomeId;
	private $IDate;
	private $IAmount;
	private $IDescription;
	private $userId;
     
    public function setIId($IId){
           $this->IId=$IId;
       }
       public function getIId(){
            return $this->IId;
         }


	public function setIname($IName){
           $this->IName=$IName;
       }
       public function getIname(){
            return $this->IName;
          }

    public function setIdate($IDate){
           $this->IDate=$IDate;
       }
       public function getIdate(){
            return $this->IDate;
          }

    public function setIamount($IAmount){
           $this->IAmount=$IAmount;
       }
       public function getIamount(){
            return $this->IAmount;
          } 

    public function setIdescription($IDescription){
           $this->IDescription=$IDescription;
       }
       public function getIdescription(){
            return $this->IDescription;
          }         
    
     public function setIncomeId($incomeid){
           $this->incomeid=$incomeid;
       }
       public function getIncomeId(){
            return $this->incomeid;
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

       function incomeCategoryRecord(){
         //display category record
              $sql1="SELECT * FROM incomecategory WHERE userId=$this->userId ORDER BY incomeId ASC";
              $result=$this->conn->query($sql1);
              return $result;
            }
          
       function insertIncomeData(){
          $sql="INSERT INTO income (IName, incomeId, IDate, IAmount, IDescription, userId) VALUES ('$this->IName','$this->incomeid','$this->IDate','$this->IAmount','$this->IDescription','$this->userId')";
          $result=$this->conn->query($sql);
              return $result;
       }  

       //dashboard status 
       function incomeCurrentSum(){
        $sql="SELECT SUM(IAmount) AS Amount FROM income WHERE userId = $this->userId AND MONTH(IDate) = MONTH (CURRENT_DATE())";
        $res=$this->conn->query($sql);
        return $res;
       } 
        // dashboards pie charts
       function incomeStatus(){
        $sql="SELECT incomeName, SUM(IAmount) FROM income LEFT JOIN incomecategory ON income.incomeId = incomecategory.incomeId WHERE income.userId=$this->userId AND MONTH(income.IDate) = MONTH (CURRENT_DATE()) GROUP BY incomecategory.incomeId";
        $res2=$this->conn->query($sql);
        return $res2;
       }


       // crud opration ..

       function incomeData(){
        $sql="SELECT * FROM income LEFT JOIN incomecategory ON income.incomeId = incomecategory.incomeId WHERE income.userId=$this->userId AND MONTH(IDate) = MONTH (CURRENT_DATE())  ORDER BY income.IDate DESC";
        $res2=$this->conn->query($sql);
        return $res2;
       } 

       //delete income record
       function deleteIncome(){
        $sql="DELETE FROM income WHERE lId=$this->IId";
        $res=$this->conn->query($sql);
        return $res;
       }
       //select to update
       function selectUpdate(){
        $sql="SELECT * FROM income WHERE lId=$this->IId";
        $res=$this->conn->query($sql);
        return $res;
       }
       //update data
       function updateIncome(){
       $sql="UPDATE income SET IName='$this->IName',IAmount=$this->IAmount ,IDate='$this->IDate',incomeId=$this->incomeid ,IDescription='$this->IDescription' WHERE lId=$this->IId";
        $res=$this->conn->query($sql);
        return $res;  
       }


       //report generation
       function viewIncome(){
        $sql="SELECT * FROM income LEFT JOIN incomecategory ON income.incomeId = incomecategory.incomeId WHERE income.userId=$this->userId AND income.IDate LIKE '$this->IDate%'";
        $res3=$this->conn->query($sql);
        return $res3;
       }
       function incomeSum(){
          $sql="SELECT SUM(IAmount) AS sum FROM income LEFT JOIN incomecategory ON income.incomeId = incomecategory.incomeId WHERE income.userId=$this->userId AND income.IDate LIKE '$this->IDate%'";
        $res4=$this->conn->query($sql);
        return $res4;
       }
       function viewIncome2(){
        $sql="SELECT * FROM income LEFT JOIN incomecategory ON income.incomeId = incomecategory.incomeId WHERE income.userId=$this->userId AND income.IDate LIKE '$this->IDate%' AND income.incomeId =$this->incomeid";
        $res3=$this->conn->query($sql);
        return $res3;
       }
       function incomeSum2(){
         $sql="SELECT SUM(IAmount) AS sum FROM income LEFT JOIN incomecategory ON income.incomeId = incomecategory.incomeId WHERE income.userId=$this->userId AND income.IDate LIKE '$this->IDate%' AND income.incomeId =$this->incomeid";
        $res4=$this->conn->query($sql);
        return $res4;
       }
       //seving report
       function incomeSaving(){
          $sql="SELECT SUM(IAmount) AS total FROM income LEFT JOIN incomecategory ON income.incomeId = incomecategory.incomeId WHERE income.userId=$this->userId AND income.IDate LIKE '$this->IDate%'";
        $res4=$this->conn->query($sql);
        return $res4;
       }
   }
?>
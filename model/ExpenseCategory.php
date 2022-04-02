<?php
     class ExpenseCategory{
     	 private $userId;
	     private $expense_id;
	     private $expense_name;
        
       public function setUserId($userId){
           $this->userId=$userId;
       }

       public function getUserId(){
            return $this->userId;
       }
       public function setExpenseId($expenseId){
           $this->expenseId=$expenseId;
       }

       public function getExpenseId(){
            return $this->expenseId;
       }
        public function setExpenseName($expensename){
           $this->expensename=$expensename;
       }

       public function getExpenseName(){
            return $this->expensename;
       }
        //database connection
       private $conn="";
           function __construct(){
           require_once "service/Config.php";
           $this->conn=Config::getConnection();
              }
       public function insertExpense(){
        //insert income category
           $sql="INSERT INTO expensecategory(expenseName,userId) VALUES('$this->expensename','$this->userId')";
            $result=$this->conn->query($sql);
            return $result;
       }
       function expenseCategoryCheck(){
          $sql="SELECT expenseName FROM expensecategory WHERE expenseName = '$this->expensename' AND userId=$this->userId";
          $result=$this->conn->query($sql);
          return $result;
        }
        function expenseCategoryRecord(){
            
              $sql="SELECT * FROM expensecategory WHERE userId=$this->userId ORDER BY expenseId ASC";
              $result=$this->conn->query($sql);
              return $result;
            }
        function deleteExpense(){
          $sql="DELETE FROM expensecategory WHERE expenseId=$this->expenseId";
          $result=$this->conn->query($sql);
          return $result;
        }
       
     }
?>

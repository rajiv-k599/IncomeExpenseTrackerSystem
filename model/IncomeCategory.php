<?php
     class IncomeCategory{
	     private $incomeid;
	     private $incomename;
       private $userId;

       public function setUserId($userId){
           $this->userId=$userId;
       }

       public function getUserId(){
            return $this->userId;
       }
       public function setIncomeId($incomeid){
           $this->incomeid=$incomeid;
       }

       public function getIncomeId(){
            return $this->incomeid;
       }
        public function setIncomeName($incomename){
           $this->incomename=$incomename;
       }

       public function getIncomeName(){
            return $this->incomename;
       }
       //database connection
       private $conn="";
           function __construct(){
           require_once "service/Config.php";
           $this->conn=Config::getConnection();
              }

       function insertIncome(){
        //insert income category
            $sql="INSERT INTO incomecategory(incomeName,userId) VALUES ('$this->incomename','$this->userId')";
            $result=$this->conn->query($sql);
            return $result;
        }
        function incomeCategoryCheck(){
          $sql="SELECT incomeName FROM incomecategory WHERE incomeName = '$this->incomename' AND userId=$this->userId";
          $result=$this->conn->query($sql);
          return $result;
        }
       function incomeCategoryRecord(){
            
              $sql="SELECT * FROM incomecategory WHERE userId=$this->userId ORDER BY incomeId ASC";
              $result=$this->conn->query($sql);
              return $result;
            }
        function IncomeSelect(){
          $sql="SELECT incomeName FROM incomecategory WHERE incomeId=$this->incomeId";
          $result=$this->conn->query($sql);
          return $result;
        }

        function deleteIncome(){
          $sql="DELETE FROM incomecategory WHERE incomeId=$this->incomeid";
          $result=$this->conn->query($sql);
          return $result;
        }
       
       
     }
?>

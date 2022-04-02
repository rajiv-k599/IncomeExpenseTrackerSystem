<?php
class User{
	//data member
	private $userid;
	private $firstname;
	private $lastname;
	private $email;
	private $gender;
	private $password;
  private $newpassword;
     
    public function setUserId($userId){
           $this->userId=$userId;
       }
       public function getUserId(){
            return $this->userId;
       }

    public function setFirstName($firstname){
           $this->firstname=$firstname;
       }
       public function getFirstName(){
            return $this->firstname;
       }

    public function setLastName($lastname){
           $this->lastname=$lastname;
       }
       public function getLastName(){
            return $this->lastname;
       }

    public function setEmail($email){
           $this->email=$email;
       }
       public function getEmail(){
            return $this->email;
       }

    public function setGender($gender){
           $this->gender=$gender;
       }
       public function getGender(){
            return $this->gender;
       }
        
    public function setPassword($password){
           $this->password=$password;
       }
       public function getPassword(){
            return $this->password;
       }
     public function setNewPassword($newpassword){
           $this->newpassword=$newpassword;
       }
       public function getNewPassword(){
            return $this->newpassword;
       }


    private $conn="";
           function __construct(){
           require_once "service/Config.php";
           $this->conn=Config::getConnection();
              }

    function emailcheck(){
          //check email if already exist
           $sql="Select email from user Where email = '$this->email'";
           $c=$this->conn->query($sql);
            return $c;
              }

    function registercheck(){
          //add user deatils
           $sql="INSERT INTO user (FirstName, LastName, email, gender, password) VALUES ('$this->firstname','$this->lastname','$this->email','$this->gender','$this->password')";
           $result=$this->conn->query($sql);
            return $result;
         }

   function CheckUser(){
        
        //login check.
                 $sql="SELECT * FROM user WHERE email='$this->email' AND password='$this->password'";
                 $result=$this->conn->query($sql);
                return $result;
           }
   function CheckPassword(){
        $sql="SELECT * FROM user WHERE userId='$this->userId' AND password='$this->password'";
        $result=$this->conn->query($sql);
                return $result;
   }
   function ChangePassword(){
                $sql="UPDATE user set password='$this->newpassword' where userId='$this->userId'";
                $result=$this->conn->query($sql);
                return $result;
   }

} 

 ?>
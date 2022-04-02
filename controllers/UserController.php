<?php
      class UserController{
        private $user;
          function __construct(){
              require_once "model/User.php";
              $this->user=new User();
              }

      	function display(){
      		include './views/landing.php';

      	}

      	function login(){
      		//open login
      		include './views/user/login.php';

      	}

      	function register(){
      		include './views/user/register.php';

      	}
      	function forget(){
      		include './views/user/forgetpassword.php';

      	}
       function new(){
                  include './views/user/newpassword.php';
            }
       function registeruser(){
                  //receive user data
                  if(isset($_POST["register"])){
                         $firstname=$_POST["firstname"];
                         $lastname=$_POST["lastname"];
                         
                         $email=$_POST["email"];
                         $gender=$_POST["gndr"];
                         $password=$_POST["password"];
                          //validation check
                        if(empty($firstname) || empty($lastname) || empty($email) || empty($gender) || empty($password)){
                                  echo  "<script> alert ('All fields Required!'); 
                                             location='register';
                                         </script>";
                                   }else{
                                    if(strlen($password)>=8){
                                      // send to model
                                    
                                    $this->user->setFirstName($firstname);
                                    $this->user->setLastName($lastname);
                                    $this->user->setEmail($email);
                                    $this->user->setGender($gender);
                                    $this->user->setPassword($password);
                                   
                                    //retrive result from model
                                    $c=$this->user->emailcheck();
                                     if (mysqli_num_rows($c) >= 1) {
                                                     echo "<script> alert ('Email already exist!'); 
                                                               location='register';
                                                        </script>";
                                                    }
                                        else{
                                          $this->user->registercheck();
                                           echo  "<script> alert ('register Sucessfull!'); 
                                                   location='login';
                                                  </script>";
                                              }
                                      }else{
                                        echo "<script> alert ('Miminum 8 character password required!'); 
                                                               location='register';
                                                        </script>";
                                      }
                   }
            }
          }
        function userlogin(){
                  //receive user data
                  if(isset($_POST["login"])){
                        
                         $email=$_POST["email"];
                        
                         $password=$_POST["password"];
                          //validation check
                        if(empty($email) || empty($password)){
                                  echo  "<script> alert ('All fields Required!'); 
                                             location='register';
                                         </script>";
                                   }else{
                                      // send to model
                                        $this->user->setEmail($email);
                                        $this->user->setPassword($password);
                                         $result=$this->user->CheckUser();
                                         $rowcount=mysqli_num_rows($result);
                                        if($rowcount==0){
                                            echo "<script> alert ('Login Failed!'); 
                                             location='Login';
                                             </script>";
                                             }else{
                                              
                                               $data=$result->fetch_assoc();
                                               session_start();
                                                $_SESSION['UserId'] = $data['userId'];
                                                $_SESSION['Firstname'] = $data['Firstname'];
                                                $_SESSION['Lastname'] = $data['Lastname'];
                                                $_SESSION['email'] = $data['email'];
                                                $_SESSION['gender'] = $data['gender'];
                                                $UserIds = $_SESSION['UserId'];
                                              header('Location: ../Dashboard/Index');
                                           }
                                   }
                   }
            }
        function passwordChange(){
          if(isset($_POST['Submit'])) {
            # code...
             session_start();
            $UserId=$_SESSION['UserId'];
            $currentpassword=$_POST['Current'];
            $newpassword=$_POST['New'];
            $this->user->setUserId($UserId);
            $this->user->setPassword($currentpassword);
            
            $result=$this->user->CheckPassword();
            $rowcount=mysqli_num_rows($result);
              if($rowcount==0){
                    echo "<script> alert ('Incorrect Password!'); 
                              location='../Dashboard/profile';
                              </script>";
               }else{
                   $this->user->setUserId($UserId);
                   $this->user->setNewPassword($newpassword);
                   $result=$this->user->ChangePassword();
                   echo "<script> alert ('Password Updated!'); 
                              location='../Dashboard/profile';
                              </script>";
               }
          }

        }

        function logout(){
                  session_start();
                  session_destroy();
                  header('Location: login');
              
            }
          

      } 
 ?>
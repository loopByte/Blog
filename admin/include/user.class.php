<?php

    class User{
        public $id;
        public $username;
        public $fullname;
        public $access;
        
        public function __construct(){
            if(isset($_SESSION['logged'])){
                $this->id = $_SESSION['id'];
                $this->username = $_SESSION['username'];
                $this->fullname = $_SESSION['fullname'];
                $this->access = $_SESSION['access'];
            }
            
            $this->login();
            $this->register();
            $this->logout();
            
        }
        
        public function register(){
            if(isset($_GET['action']) && $_GET['action'] == 'register'){
                global $mysqli;
                
                $username = $_POST['username'];
                $password = crypt($_POST['password'], '$2a$07$kfhenffjkh3nvbesbjsdfghyg$');
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $registered = date("Y-m-d H:i:s");
                
                $query = "INSERT INTO users(username, password, email, fullname, registered)
                    VALUES ('".$username."', '".$password."', '".$email."', '".$fullname."', '".$registered."')";
                $mysqli->query($query);
                
                header("Location: index.php");
            }
        }
        
        public function login_check(){}
        
        public function login(){
            if(isset($_GET['action']) && $_GET['action'] == 'login'){
                global $mysqli;
                
                $username = $_POST['username'];
                $password = crypt($_POST['password'], '$2a$07$kfhenffjkh3nvbesbjsdfghyg$');
                
                $query = "SELECT id, username, fullname, access FROM users WHERE username='".$username."' AND password='".$password."'";
                $result = $mysqli->query($query);
                if($result->num_rows == 1){
                    while($row = $result->fetch_assoc()){
                        if($row['access'] == 3){
                            $_SESSION['logged'] = '1';
                            $this->id = $_SESSION['id'] = $row['id'];
                            $this->username = $_SESSION['username'] = $row['username'];
                            $this->fullname = $_SESSION['fullname'] = $row['fullname'];
                            $this->access = $_SESSION['access'] = $row['access'];
                        }
                    }
                    
                    header("Location: index.php");
                }else{
                    exit("Invalid username or password");
                }
            }
        }
        
        public function logout(){
            if(isset($_GET['action']) && $_GET['action'] == 'logout'){
                session_destroy();
                header("Location: index.php");
            }
        }
        
    }
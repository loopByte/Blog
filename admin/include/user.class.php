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
            $this->remove();
            
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
        
         public static function manage_list(){
            global $mysqli;
            
            $query = "SELECT id, username, fullname, registered FROM users";
            $result = $mysqli->query($query);
            
            echo '<table border="1" class="manage-article">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Username</th>';
            echo '<th>Full name</th>';
            echo '<th>Registered</th>';
            echo '<th>Actions</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while($row = $result->fetch_assoc()){
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['username'] . '</td>';
                echo '<td>' . $row['fullname'] . '</td>';
                echo '<td>' . $row['registered'] . '</td>';
                echo '<td>
                    <a href="edit-user.php?user=edit&id='.$row['id'].'">Edit</a>
                    <a href="manage-user.php?user=remove&id='.$row['id'].'">Delete</a>
                </td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }
        
        public static function remove(){
            if(isset($_GET['user']) && $_GET['user'] == 'remove'){
                global $mysqli;
                
                $query = "DELETE FROM users WHERE id='".$_GET['id']."'";
                $mysqli->query($query);
                header("Location: manage-user.php");
            }
        }
        
        public function logout(){
            if(isset($_GET['action']) && $_GET['action'] == 'logout'){
                session_destroy();
                header("Location: index.php");
            }
        }
        
        public static function edit_fetch(){
            if(isset($_GET['user']) && $_GET['user'] == 'edit'){
                global $mysqli;
                
                $query = "SELECT id, username, fullname, email, access FROM users WHERE id='".$_GET['id']."'";
                $result = $mysqli->query($query);
                return $result->fetch_assoc();
            }
        }
        
        public static function edit(){
            if(isset($_GET['user']) && $_GET['user'] == 'edit_save'){
                global $mysqli;
                
                $id = $_POST['id'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $fullname = $_POST['fullname'];
                $access = $_POST['access'];
                
                $query = "UPDATE users SET username='".$username."', email='".$email."', fullname='".$fullname."', access='".$access."' WHERE id='".$id."'";
                $mysqli->query($query);
                header("Location: manage-user.php");
            }
        }
        
    }
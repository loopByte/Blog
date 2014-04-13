<?php

    class Newsletter{
        public function __construct(){
            $this->subscribe();
            $this->subscribe_check();
        }
        
        public function subscribe(){
            if(isset($_GET['subscribe']) && $_GET['subscribe'] == 'true'){
                global  $mail;
                global  $config;
                
                $email = $_POST['email'];
                
                $mail->isSMTP();
                $mail->Host = $config['smtp_host'];
                $mail->SMTPAuth = true;
                $mail->Username = $config['smtp_username'];
                $mail->Password = $config['smtp_password'];
                $mail->SMTPSecure = $config['smtp_secure'];
                
                $mail->From = $config['smtp_from'];
                $mail->FromName = 'Postmaster';
                $mail->addAddress($email);
                
                $mail->WordWrap = 50;
                $mail->isHTML(true);
                
                $link = 'http://'.$_SERVER['SERVER_NAME'].'/index.php?subscribe=check&email='.$email;
                
                $mail->Subject = 'Yout subscribe to ' . $config['title'];
                $mail->Body    = 'This e-mail has been sent to confirm your subscription to our blog newsletter. Please click <a href="'.$link.'" target="_blank">here</a> to confirm.';
                $mail->send();
                
                header("Location: index.php");
            }
        }
        
        public function subscribe_check(){
            if(isset($_GET['subscribe']) && $_GET['subscribe'] == 'check' && isset($_GET['email'])){
                global $mysqli;
                global $mail;
                global $config;
                
                $email = $_GET['email'];
                
                $query = "INSERT INTO newsletter(email) VALUES('.$email.')";
                $mysqli->query($query);
                
                $mail->isSMTP();
                $mail->Host = $config['smtp_host'];
                $mail->SMTPAuth = true;
                $mail->Username = $config['smtp_username'];
                $mail->Password = $config['smtp_password'];
                $mail->SMTPSecure = $config['smtp_secure'];
                
                $mail->From = $config['smtp_from'];
                $mail->FromName = 'Postmaster';
                $mail->addAddress($email);
                
                $mail->WordWrap = 50;
                $mail->isHTML(true);
                
                $mail->Subject = 'Yout subscribe to ' . $config['title'];
                $mail->Body    = 'Thank you for subscribing to our newsletter. We will e-mail you with updates very soon. Stay tuned!';
                $mail->send();
                
                header("Location: index.php");
            }
        }
    }
<?php
    session_start();
    require_once 'include/autoload.class.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style/default/main.css" />
    </head>
<body>
    <?php if(!isset($_SESSION['logged'])){ ?>
    <div class="login-box">
        <form action="index.php?action=login" method="POST" >
            <input type="text" name="username" placeholder="Username" required /><br />
            <input type="password" name="password" placeholder="Password" required /><br />
            <input type="submit" value="Log In" /><br />
        </form>
    </div>
    <?php }else{ ?>
    
    
    <?php } ?>
</body>
</html>
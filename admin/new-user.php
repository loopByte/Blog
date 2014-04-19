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
        <script src="editor/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({selector:'.editor'});
        </script>
    </head>
<body>
    <?php if(!isset($_SESSION['logged'])){
        header("Location: index.php");
    }else{ ?>
    
    <div class="page">
        <button onclick="back()">Go back</button>
        <script>function back(){window.history.back()}</script>
        <br /><br />
        <form action="new-user.php?action=register" method="POST">
            <input id="input-register" type="text" name="username" placeholder="Username" required /><br />
            <input id="input-register" type="text" name="fullname" placeholder="Full name" required /><br />
            <input id="input-register" type="email" name="email" placeholder="E-mail" required /><br />
            <input id="input-register" type="password" name="password" placeholder="Password" required /><br />
            <input type="submit" value="Add user" />
        </form>
    </div>
    
    <?php } ?>
</body>
</html>
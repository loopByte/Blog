<?php
    session_start();
    require_once 'include/autoload.class.php';
    
    Article::add();
    Article::remove();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style/default/main.css" />
    </head>
<body>
    <?php if(!isset($_SESSION['logged'])){
        header("Location: index.php");
    }else{ ?>
    
    <div class="page">
        <button onclick="back()">Go back</button>
        <script>function back(){window.history.back()}</script>
        <br /><br />
        <?php Article::manage_list(); ?>
    </div>
    
    <?php } ?>
</body>
</html>
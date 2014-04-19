<?php
    session_start();
    require_once 'include/autoload.class.php';
    
    $data = User::edit_fetch();
    User::edit();

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
        <form action="edit-user.php?user=edit_save" method="POST">
            <input id="input-register" type="text" value="<?=$data['username']?>" name="username" placeholder="Username" required /><br />
            <input id="input-register" type="text" value="<?=$data['fullname']?>" name="fullname" placeholder="Full name" required /><br />
            <input id="input-register" type="email" value="<?=$data['email']?>" name="email" placeholder="E-mail" required /><br />
            <input type="radio" name="access" value="1" <?php if($data['access'] == 1){echo 'checked';} ?> />Normal user<br />
            <input type="radio" name="access" value="2" <?php if($data['access'] == 2){echo 'checked';} ?> />Some access<br />
            <input type="radio" name="access" value="3" <?php if($data['access'] == 3){echo 'checked';} ?> />Admin<br />
            <input type="hidden" value="<?=$data['id']?>" name="id" />
            <input type="submit" value="Update user" />
        </form>
    </div>
    
    <?php } ?>
</body>
</html>
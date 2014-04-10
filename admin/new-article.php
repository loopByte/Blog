<?php
    session_start();
    require_once 'include/autoload.class.php';
    
    Article::add();

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
        <form action="new-article.php?action=new-article" method="POST">
            <input type="text" name="title" placeholder="Article title" required /><br />
            <textarea class="editor" name="content">Article content goes here...</textarea>
            <input type="text" name="tags" placeholder="Tags" /><br />
            <input type="checkbox" name="wrap" value="1" id="wrap" /> Wrap article content<br />
            <input type="submit" value="Submit article" />
        </form>
    </div>
    
    <?php } ?>
</body>
</html>
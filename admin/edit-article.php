<?php
    session_start();
    require_once 'include/autoload.class.php';
    
    $data = Article::edit_fetch();
    Article::edit();

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
        <form action="edit-article.php?article=edit_save" method="POST">
            <input type="text" name="title" value="<?=$data['title']?>" required /><br />
            <textarea class="editor" name="content"><?=$data['content']?></textarea>
            <input type="text" name="tags" value="<?=$data['tags']?>" placeholder="Tags" /><br />
            <?php
                if($data['wrap']){
                    $checked = 'checked';
                }else{
                    $checked = '';
                }
            ?>
            <input type="checkbox" name="wrap" value="1" id="wrap" <?=$checked?>/> Wrap article content<br />
            <input type="hidden" name="id" value="<?=$data['id']?>" />
            <input type="submit" value="Submit article" />
        </form>
    </div>
    
    <?php } ?>
</body>
</html>
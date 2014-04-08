<?php

    require_once 'include/autoload.class.php';
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?=$blog->title?></title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style/default/main.css" />
    </head>
<body>
   <header class="header">
       <header>
           <h1><?=$blog->title?></h1>
           <h3><?=$blog->description?></h3>
       </header>
   </header>
   <div class="page">
        <?php
            if(!empty($_GET['page'])){$page = $_GET['page'];}
            else{$page = '';}
            switch($page){
                case '':
                    $article->get_articles();
                break;
                
                case 'article':
                    echo '<div class="article">';
                    echo '<h1>' . $article->title . '</h1>';
                    echo '<article>' . $article->content . '</article>';
                    echo '<br /><br />';
                    echo '<time datetime="'.$article->postdate.'">' . $article->postdate . '</time>';
                    echo '</div>';
                break;
            }
        ?>
   </div>
   <footer class="footer">
       <footer>
            <div class="subscribe">
                <form>
                    <input type="email" name="email" placeholder="Subscribe" required />
                    <input type="submit" value="Subscribe" />
                </form>
            </div>
       </footer>
       <div class="copy-right">&copy;<?=$blog->title?> 2014</div>
   </footer>
</body>
</html>
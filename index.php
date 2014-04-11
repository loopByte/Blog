<?php
    
    define('ROOT', dirname(__FILE__));
    define('DS', DIRECTORY_SEPARATOR);
    
    require_once ROOT . DS . 'config.php';
    require_once ROOT . DS . 'include/autoload.class.php';
    
?>
<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
    <head>
        <title><?=$config['title']?></title>
        <meta charset="utf-8" />
        <meta name="description" content="<?=$config['description']?>" />
        <link rel="stylesheet" type="text/css" href="style/default/main.css" />
        <?=$ogp->set()?>
    </head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ro_RO/all.js#xfbml=1&appId=730897020268369";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
   <header class="header">
       <header>
           <h1><?=$config['title']?></h1>
           <h3><?=$config['description']?></h3>
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
                    echo '<button onclick="back()">Go back</button>';
                    echo '<script>function back(){window.history.back()}</script>';
                    echo '<div class="article">';
                    echo '<h1>' . $article->title . '</h1>';
                    echo '<article>' . $article->content . '</article>';
                    echo '<div style="float: left" class="fb-like" data-href="http://'.$_SERVER['SERVER_NAME'].'/index.php?page=article&id='.$_GET['id'].'" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>';
                    echo '<br /><br />';
                    echo '<time datetime="'.$article->postdate.'">' . $article->postdate . '</time>';
                    echo '</div>';
                    echo '<div style="float: left" class="fb-comments" data-href="http://'.$_SERVER['SERVER_NAME'].'/index.php?page=article&id='.$_GET['id'].'" data-numposts="5" data-colorscheme="light" data-width="960"></div>';
                break;
            }
        ?>
   </div>
   <footer class="footer">
       <footer>
            <div class="subscribe">
                <form action="index.php?subscribe=true" method="POST">
                    <input type="email" name="email" placeholder="Subscribe" required />
                    <input type="submit" value="Subscribe" />
                </form>
            </div>
       </footer>
       <div class="copy-right">&copy;<?=$config['title']?> 2014</div>
   </footer>
</body>
</html>
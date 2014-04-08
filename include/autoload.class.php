<?php

    define('ROOT', dirname(__FILE__));
    define('DS', DIRECTORY_SEPARATOR);
    
    require_once ROOT . DS . 'mysql.class.php';
    require_once ROOT . DS . 'blog.class.php';
    require_once ROOT . DS . 'article.class.php';
    require_once ROOT . DS . 'ogp.class.php';
    
    $blog = new Blog();
    $article = new Article();
    $ogp = new OGP();
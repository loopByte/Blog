<?php
    
    require_once ROOT . DS . 'include/mysql.class.php';
    require_once ROOT . DS . 'include/blog.class.php';
    require_once ROOT . DS . 'include/article.class.php';
    require_once ROOT . DS . 'include/ogp.class.php';
    require_once ROOT . DS . 'libraries/PHPMailer/PHPMailerAutoload.php';
    require_once ROOT . DS . 'include/newsletter.class.php';
    
    $blog = new Blog();
    $article = new Article();
    $ogp = new OGP();
    $mail = new PHPMailer;
    $newsletter = new Newsletter();
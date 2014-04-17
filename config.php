<?php
    
    /* Config array definition */
    $config = array();
    
    /* Blog configuration */
    $config['title'] = 'PHP Blog';
    $config['description'] = 'Simple blog written in PHP';
    
    /* MySQL configuration */
    $config['mysql_host'] = '127.0.0.1';
    $config['mysql_user'] = 'blog';
    $config['mysql_password'] = 'blog';
    $config['mysql_database'] = 'blog';
    
    /* SMTP configuration */
    $config['smtp_host'] = 'smtp.mailgun.org';
    $config['smtp_username'] = 'postmaster@sandbox7524.mailgun.org';
    $config['smtp_password'] = '95x3q99uwvp4';
    $config['smtp_secure'] = 'tls';
    $config['smtp_from'] = 'postmaster@sandbox7524.mailgun.org';
<?php

    $mysqli = new mysqli($config['mysql_host'],  $config['mysql_user'], $config['mysql_password'], $config['mysql_database']);
    
    if($mysqli->connect_errno){
        exit('MySQL error.');
    }
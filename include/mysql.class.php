<?php

    $mysqli = new mysqli('127.0.0.1',  'blog', 'blog', 'blog');
    
    if($mysqli->connect_errno){
        exit('MySQL error.');
    }
<?php

    class Blog{
        public $title;
        public $description;
        
        public function __construct(){
            $this->get_title();
            $this->get_description();
        }
        
        public function get_title(){
            global $mysqli;
            $query = "SELECT value FROM settings WHERE name='title'";
            $result = $mysqli->query($query);
            $result = $result->fetch_assoc();
            $this->title = $result['value'];
        }
        
        public function get_description(){
            global $mysqli;
            $query = "SELECT value FROM settings WHERE name='description'";
            $result = $mysqli->query($query);
            $result = $result->fetch_assoc();
            $this->description = $result['value'];
        }
    }
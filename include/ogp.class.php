<?php

    class OGP{
        public $title;
        public $type;
        public $description;
        public $url;
        public $image;
        
        public function __construct(){}
        
        public function set(){
            global $config;
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = NULL;
            }
            if($page == 'article'){
                $id = $_GET['id'];
                
                global $config;
                
                global $mysqli;
                $query = "SELECT title FROM articles WHERE id='".$id."'";
                $result = $mysqli->query($query);
                while($row = $result->fetch_assoc()){
                    $this->title = $row['title'];
                }
                $this->type = 'article';
                $this->description = $config['description'];
                $this->url = 'http://' . $_SERVER['SERVER_NAME'] . '/index.php?page=article&id=' . $id;
                $this->image = 'http://' . $_SERVER['SERVER_NAME'] . '/media/images/ogp.png';
            }else{
                $this->title = $config['title'];
                $this->description = $config['description'];
                $this->type = 'website';
                $this->url = 'http://' . $_SERVER['SERVER_NAME'];
                $this->image = 'http://' . $_SERVER['SERVER_NAME'] . '/media/images/ogp.png';
                
            }
            
            
            $ogp = '<meta property="og:title" content="'.$this->title.'" />';
            $ogp .= '<meta property="og:type" content="'.$this->type.'" />';
            $ogp .= '<meta property="og:url" content="'.$this->url.'" />';
            $ogp .= '<meta property="og:image" content="'.$this->image.'" />';
            $ogp .= '<meta property="og:image:type" content="image/png">';
            $ogp .= '<meta property="og:image:width" content="400"/>';
            $ogp .= '<meta property="og:image:height" content="300"/>';
            
            return $ogp;
        }
    }
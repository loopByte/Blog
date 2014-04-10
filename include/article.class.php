<?php

    class Article{
        public $id;
        public $title;
        public $content;
        public $postdate;
        
        public function __construct(){
            if(!empty($_GET['page']) && !empty($_GET['id'])){
                $this->id = $_GET['id'];
                $this->get_article();
            }
        }
        
        public static function get_articles(){
            global $mysqli;
            
            $query = "SELECT * FROM articles";
            $result = $mysqli->query($query);
            while($row = $result->fetch_assoc()){
                $content = $row['content'];
                if($row['wrap'] == 1){
                    if(strlen($content) > 3000){
                        $content = substr($content, 0, 3000);
                        $content .= '<a href="index.php?page=article&id='.$row['id'].'">[Continue reading]</a>';
                    }else{
                        $content = $content;
                    }
                }else{
                    $content = $row['content'];
                }
                echo '<div class="article">';
                echo '<h1><a href="index.php?page=article&id='.$row['id'].'">' . $row['title'] . '</a></h1>';
                echo '<article>' . $content . '</article>';
                echo '<br /><br />';
                echo '<time datetime="'.$row['postdate'].'">' . $row['postdate'] . '</time>';
                echo '</div>';
            }
        }
        
        public function get_article(){
            global $mysqli;
            
            $query = "SELECT * FROM articles WHERE id='".$this->id."'";
            $result = $mysqli->query($query);
            while($row = $result->fetch_assoc()){
                $this->title = $row['title'];
                $this->content = $row['content'];
                $this->postdate = $row['postdate'];
            }
        }
        
        public static function  add(){
            if(isset($_GET['action']) && $_GET['action'] == 'new-article'){
                global $mysqli;
                
                $title = $_POST['title'];
                $content = $_POST['content'];
                $tags = $_POST['tags'];
                $postdate = date("Y-m-d H:i:s");
                $wrap = $_POST['wrap'];
                
                $query = "INSERT INTO articles(title, content, postdate, tags, wrap)
                    VALUES('".$title."', '".$content."', '".$postdate."', '".$tags."', '".$wrap."')";
                $mysqli->query($query);
                header("Location: index.php");
            }
        }
    }
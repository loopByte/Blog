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
        
        public static function manage_list(){
            global $mysqli;
            
            $query = "SELECT id, title, postdate FROM articles";
            $result = $mysqli->query($query);
            
            echo '<table border="1" class="manage-article">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Title</th>';
            echo '<th>Post date</th>';
            echo '<th>Actions</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while($row = $result->fetch_assoc()){
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['title'] . '</td>';
                echo '<td>' . $row['postdate'] . '</td>';
                echo '<td>
                    <a href="edit-article.php?article=edit&id='.$row['id'].'">Edit</a>
                    <a href="manage-article.php?article=remove&id='.$row['id'].'">Delete</a>
                </td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }
        
        public static function remove(){
            if(isset($_GET['article']) && $_GET['article'] == 'remove'){
                global $mysqli;
                
                $query = "DELETE FROM articles WHERE id='".$_GET['id']."'";
                $mysqli->query($query);
                header("Location: manage-article.php");
            }
        }
        
        public static function edit_fetch(){
            if(isset($_GET['article']) && $_GET['article'] == 'edit'){
                global $mysqli;
                
                $query = "SELECT * FROM articles WHERE id='".$_GET['id']."'";
                $result = $mysqli->query($query);
                return $result->fetch_assoc();
            }
        }
        
        public static function edit(){
            if(isset($_GET['article']) && $_GET['article'] == 'edit_save'){
                global $mysqli;
                
                $id = $_POST['id'];
                $title = $_POST['title'];
                $content = $_POST['content'];
                $tags = $_POST['tags'];
                $postdate = date("Y-m-d H:i:s");
                $wrap = $_POST['wrap'];
                
                $query = "UPDATE articles SET title='".$title."', content='".$content."', postdate='".$postdate."', tags='".$tags."', wrap='".$wrap."' WHERE id='".$id."'";
                $mysqli->query($query);
                header("Location: manage-article.php");
            }
        }
    }
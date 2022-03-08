<?php
    class BlogService{
        private $blog;
        
        private $table = "blogs";
        
        public function insertBlog($conn, $title, $content,$picture,$full_name,$posted_by,$category_id){
            
                $sql = "INSERT INTO ".$this->table."(title,content,picture,full_name,created_at,posted_by, category_id) VALUES ('$title','$content','$picture','$full_name',NOW(),'$posted_by','$category_id')";
                                                               
                $isInserted = $conn->query($sql);

                if($isInserted){
                    return "New blog was posted";
                }
                else{
                    return "Oops! Something went wrong!";
                }
    
        }
      
        public function getAllBlogs($conn){
            $sql = "SELECT * FROM ".$this->table;
            
            $blogs = array();
            $result = $conn->query($sql);
    
            while($row = $result->fetch_object()){
                $id = $row->id;
                $title = $row->title;
                $content = $row->content;
                $picture = $row->picture;
                $full_name = $row->full_name;
                $posted_by = $row->posted_by;
                $category_id = $row->category_id;}
                
                $this->blog = new Blog($title, $content, $picture, $full_name, $posted_by, $category_id);
                if($content != ""){
                    $this->blog->setDesc($content);
                }
                else{
                    $this->blog->setDesc("Blank Description");
                }
               
                
                array_push($blogs, $this->blog);
            }
            
            return $blogs;
        }
    }
?>
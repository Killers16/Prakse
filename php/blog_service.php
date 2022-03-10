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

         public function updateBlog($conn, $id, $newTitle){
            $sql = "UPDATE ".$this->table." SET title = '$newTitle' WHERE id_blog = $id";
            
            $isUpdated = $conn->query($sql);
            
            if($isUpdated){
                return "<br> Blog is updated!";
            }
            else{
                return "<br> Update process has failed!";
            }
        }
        
        public function deleteBlog($conn, $id){
            $sql = "DELETE FROM ".$this->table." WHERE id_blog = $id";
            
            $isDeleted = $conn->query($sql);
            
            if($isDeleted){
                return "<br> Blog deleted!";
            }
            else{
                return "<br> Delete process has failed!";
            }
        }

         public function getBlogID($conn, $title):int{
            $sql = "SELECT id_blog FROM ".$this->table." WHERE title = '$title'";
            
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $id = $row['id_blog'];
            
            return $id;
        }
        
        public function getBlogByID($conn, $id):Blog{
            $sql = "SELECT title FROM ".$this->table." WHERE id_blog = $id";
            
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $title = $row['title'];
            
            $this->blog = new Blog($title);
            
            return $id;
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
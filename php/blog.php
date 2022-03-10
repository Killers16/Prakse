<?php
    include_once('user.php');

    class Blog{
        private $id;
        private $title;
        private $picture;
        private $content;
        private $full_name;
        private $posted_by;
        
        public function __construct($title, $content, $picture, $full_name){
            $this->title = $title;
            $this->content = $content;
            $this->picture = $picture;
            $this->full_name = $full_name;
        }
        
        public function setID(int $id){
            $this->id = $id;
        }
        
        public function setTitle($title){
            $this->title = $title;
        }
        
        public function setContent($content){
            $this->content = $content;
        }

        public function setPicture($picture){
            $this->picture = $picture;
        }

        public function setFullName($full_name){
            $this->full_name = $full_name;
        }

        public function setUser(User $posted_by){
            $this->posted_by = $posted_by;
        }

        
        public function getID(){
            return $this->id;
        }
        
        public function getTitle(){
            return $this->title;
        }
        
        public function getContent(){
            return $this->content;
        }

        public function getPicture(){
            return $this->picture;
        }

        public function getFullName(){
            return $this->full_name;
        }

        public function getUser():User{
            return $this->posted_by;
        }

    }
?>
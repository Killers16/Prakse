<?php
    class UserService{
        private $user;
        
        private $table = "users";
        
        public function getUserByName($conn, $username){
            $sql = "SELECT id_user,username,email FROM ".$this->table." WHERE username = '$username'";
            
            $result = $conn->query($sql);
            
            $row = $result->fetch_assoc();
            if($row != null){
                $id = $row['id_user'];
                $username = $row['username'];
                $uemail = $row['email'];

                $this->user = new User($username,$uemail);
                $this->user->setID($id);

                return $this->user;
            }
            else{
                return "There's no user with this username!";
            }
        }

        public function getUserPassword($conn, $username){
            $sql = "SELECT id_user,psw,email FROM ".$this->table." WHERE username = '$username'";
            
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if($row != null){
                $id = $row['id_user'];
                $uemail = $row['email'];
                $password = $row['psw'];

                $this->user = new User($username,$uemail);
                $this->user->setID($id);
                $this->user->setPassword($password);

                return $this->user;
            }
            else{
                return "There's no such user registered!";
            }
        }

        public function getUserByID($conn, $id){
            $sql = "SELECT username,email FROM ".$this->table." WHERE id_user = $id";
            
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if($row != null){
                $username = $row['username'];
                $uemail = $row['email'];

                $this->user = new User($username,$uemail);

                return $this->user;
            }
            else{
                return "There's no user with this id!";
            }
        }
    }
?>
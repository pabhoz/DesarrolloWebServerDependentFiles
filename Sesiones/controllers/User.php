<?php

    class User extends Controller{
        
        function __construct() {
            parent::__construct();
        }
        
        public function signUp(){
            
            //name,username,email,password
            if( isset($_POST["name"]) && isset($_POST["username"]) &&
                isset($_POST["email"]) && isset($_POST["password"])){
                
                $data["name"] = $_POST["name"];
                $data["username"] = $_POST["username"];
                $data["email"] = $_POST["email"];
                $data["password"] = $_POST["password"];
                
                echo $this->model->signUp($data);
            }
            
        }
        
        public function signIn(){
            
            if( isset($_POST["username"]) && isset($_POST["password"])){
                
                $response = $this->model->signIn('*',"username = '".$_POST["username"]."'");
                $response = $response[0];
                
                if($response["password"] == $_POST["password"]){
                    $this->createSession($response["username"],$response["id"]);
                    echo 1;
                }
            }
        }
        
        function createSession($username,$id){
            Session::setValue('U_NAME', $username);
            Session::setValue('ID', $id);
        }
        
        function destroySession(){
            Session::destroy();
            header('location:'.URL);
        }
    }
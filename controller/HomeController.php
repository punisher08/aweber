<?php
// UserController.php

namespace Controller;
use Controller\Middleware\Redirect;
use Database\Database;


class HomeController extends Redirect {
    public $config;
    public $db;
    public $redirect;

    public function __construct($config) {

        $this->config = new $config;
        $this->db = Database::getInstance($config)->getConnection();
    }
    /**
     *  Return home page
     */
    public function index(){
        
        return $this->view($this->config,'home',array());
    }
    /**
     *  Return Login page
     */
    public function login(){
        
        return $this->view($this->config,'auth/login',array());
    }
    /**
     *  Return Registration Page
     */
    public function registration(){

        return $this->view($this->config,'auth/register',array());
    }
    /**
     *  Login verification
     */
    public function signin(){
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $authenticate = $this->authenticate($username,$password);
        header('Location: /dashboard');

    }
    /**
     *  Register User Account
     */
    public function account_create() {
        extract($_POST);
        $pass = password_hash($password, PASSWORD_DEFAULT);
        // Check if the user already exists
        $userExists = $this->checkUserExists($email,$username);
    
        if ($userExists) {
            header('Location: /register?result=false');
            exit();
            
        } else {
            $status = 0;
            $query = $this->db->prepare("INSERT INTO `users`(`id`, `role`, `email`, `username`, `password`, `password_token`, `password_token_exp`, `created_at`) 
            VALUES (NULL,1,:email, :username, :password,NULL,NULL,NOW())");
            $query->bindParam(':email', ($email));
            $query->bindParam(':username', ( $username));
            $query->bindParam(':password', ($pass));       
            $result = $query->execute();
            if($result){
                header('Location: /login');
                exit();
            }else{
                header('Location: /register?result=false');
                exit();
            } 
        }
    }
     /**
     *  Validate email and username if already taken by other user
     */  
    private function checkUserExists($email,$username) {
        $query = $this->db->prepare("SELECT * FROM `users` WHERE `email` = :email OR `username` = :username");
        $query->bindParam(':email', $email);
        $query->bindParam(':username', $username);
        $query->execute();
        $user = $query->fetch();
        return !empty($user);
    }

}

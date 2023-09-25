<?php
namespace Controller\Middleware;
use Controller\Middleware\Api;

class Auth {
    private $user;
    // $this->config; Use for get config data
    // $this->db; Use for db connection
    public function __construct() {

     
    }

    public function authenticate($accesToken) {
       
            $this->setAuthenticatedUser($accesToken );  
    }
    
    

    public function logout() {
        $this->clearAuthenticatedUser();
    }

    protected function isAuthenticated() {
       $this->getSessionStatus();
        if(isset($_SESSION['auth'])){
            return $_SESSION['auth'];
        }else{
            return false;
        }
    }

    private function setAuthenticatedUser($accesToken) {
        $this->getSessionStatus();
        $_SESSION['access_token'] = $accesToken;
        $_SESSION['auth'] = true;
    }

    private function clearAuthenticatedUser() {
        $this->getSessionStatus();
        unset($_SESSION['access_token']);
     
    }
    public function getSessionStatus() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }


}

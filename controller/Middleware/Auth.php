<?php
namespace Controller\Middleware;
use Controller\Middleware\Api;

class Auth {
    private $user;
    // $this->config; Use for get config data
    // $this->db; Use for db connection
    public function __construct() {

     
    }

    public function authenticate($username, $password) {
        // Use prepared statement to avoid SQL injection
        $query = $this->db->prepare("SELECT * FROM `users` WHERE `username` = :username");
        $query->bindParam(':username', $username);
        $query->execute();
        $user = $query->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
          
            $this->setAuthenticatedUser($user );
            $response = ['data' => $user, 'result' => true];
            return $response;
        } else {
          
            // User doesn't exist or password doesn't match
            header('Location: /login?message=user is not registered.');
            exit();
        }
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

    private function setAuthenticatedUser($user) {
        $this->getSessionStatus();
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['id'] = $user['id'];
    
        $_SESSION['auth'] = true;
    }

    private function clearAuthenticatedUser() {
        $this->getSessionStatus();
        unset($_SESSION['username']);
        unset( $_SESSION['email']);
        unset($_SESSION['id']);
        unset($_SESSION['auth']);
     
    }
    public function getSessionStatus() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }


}

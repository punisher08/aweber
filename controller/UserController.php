<?php
namespace Controller;

use Controller\Middleware\Redirect;
use Database\Database;

class UserController extends Redirect {
    public $config;
    public $db;

    public function __construct($config) {

        $this->config = new $config;
        $this->db = Database::getInstance($config)->getConnection();
        
       
        if(!$this->isAuthenticated()){
            header('Location: /login');
            exit();
        }
    }
 
    /**
     *  Logout current User
     */
    public function signout() {
        $this->logout();
        header('Location: /login');
     }

 }

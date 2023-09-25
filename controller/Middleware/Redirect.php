<?php

namespace Controller\Middleware;
use Controller\Middleware\Auth;

class Redirect extends Auth{

    protected $config;

    public function __construct() {
        parent::__construct();
        $this->config = $config;
    }

    public static function view($config,$url,$data = []) {
        $page = $config->get('base_path') .'/views/'.$url.'.php';
    
        Redirect::findOrFail($page,$data);
    }

    public static function to($path) {
    
      include dirname(dirname(__FILE__)) .'/'.$path;
    }
    public static function findOrFail($page,$data = []) {
        if (file_exists($page)) {
            include $page;
        } else {
            Redirect::to('404.php');
        }
    }
}


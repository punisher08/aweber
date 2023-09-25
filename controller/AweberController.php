<?php
namespace Controller;
use Controller\Middleware\Redirect;
use Database\Database;
use League\OAuth2\Client\Provider\GenericProvider;


class AweberController extends Redirect {
    public $config;
    public $db;
    public $provider;



    public function __construct($config) {

        $this->config = new $config;
        $this->db = Database::getInstance($config)->getConnection();
     
        require_once $this->config->get('base_path').'/vendor/autoload.php';     

        if(!defined('BASE_URL')){
            define('BASE_URL',$this->config->get('base_path'));
        }
       
    }

    public function index(){
        
        return $this->view($this->config,'aweber/login',array());
        
    }
    public function add_form(){
        
        return $this->view($this->config,'aweber/add',array());
    }
    public function generate_access_token(){

        require_once $this->config->get('base_path').'/plugins/aweber.php';
        
        
    }

    public function oauth_callback(){

        require_once $this->config->get('base_path').'/plugins/aweber.php';
        
        if(!empty($accessToken)){
            /** Set acces token to session */
            $this->authenticate($accessToken);
            echo 'Your access token is: '.$accessToken;

        }else{

          echo 'No generated access token, Please try again';
          echo '<a href="/">Return to homepage</a>';

        }
    }

    public function user_subscribed(){
        
        return $this->view($this->config,'home',array());
      
    }

    public function add_subscriber(){

        require_once $this->config->get('base_path').'/plugins/aweber-create-subscriber.php';
    }
  

    public function getCollection($client, $accessToken, $url) {
        $collection = array();
        while (isset($url)) {
            $request = $client->get($url,
                ['headers' => ['Authorization' => 'Bearer ' . $accessToken]]
            );
            $body = $request->getBody();
            $page = json_decode($body, true);
            $collection = array_merge($page['entries'], $collection);
            $url = isset($page['next_collection_link']) ? $page['next_collection_link'] : null;
        }
        return $collection;
    }


}
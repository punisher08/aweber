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
        if(!$this->isAuthenticated()){
            header('Location: /login');
            exit();
        }
       
    }
    /**
     *  Return admin dashboard
     */
    public function index(){
        
        return $this->view($this->config,'aweber/dashboard',array());
        
    }
    /**
     *  Return a Form
     *  @param $name String ,$email String ,$custom_fields Array
     *  
     */
    public function add_form(){
        
        return $this->view($this->config,'aweber/add',array());
    }

    /**
     *  Return an access token use to authenticate request on AWEBER API
     *  description: Login to your account then the token will be generated, you need to copy the access token and place it inside config.php 
     *  @param $access_token
     *  
     */
    public function generate_access_token(){

        require_once $this->config->get('base_path').'/plugins/aweber.php'; 
        
    }

    public function oauth_callback(){

        require_once $this->config->get('base_path').'/plugins/aweber.php';
        
        if(!empty($accessToken)){
            /** Set acces token to session */
            $this->setaccesstoken($accessToken);
            echo 'Your access token is: '.$accessToken;

        }else{

          echo 'No generated access token, Please try again';
          echo '<a href="/aweber/subscriber/form">Return</a>';

        }
    }
    /**
     * Authorized Callback URL Allow-list:
     * description: This is set on the AWEBER API APP Settings
     */
    public function user_subscribed(){
        
        return $this->view($this->config,'home',array());
      
    }
    /**
     * API Call to create subscriber to AWEBER API
     * @param $name String ,$email String ,$custom_fields Array
     */
    public function add_subscriber(){

        require_once $this->config->get('base_path').'/plugins/aweber-create-subscriber.php';
    }
  
    /**
     * Access to AWEBER to check collection if existing
     * return $collection
     */
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
    /**
     * Save access token to session
     *  @param $accessToken
     */
    public function setaccesstoken($accessToken){
        $this->getSessionStatus();
        $_SESSION['accessToken'] = $accessToken;
    }


}
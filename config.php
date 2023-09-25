<?php
require 'database/Database.php'; // Include the Database class


class Config {
    private $data = [];

    public function __construct() {
        $this->data = [
            'database_host' => 'localhost',
            'database_user' => 'root',
            'database_password' => '',
            'database_name' => '',
            'base_path' => dirname(__FILE__),
            // other configuration values
            'client_id' => '',
            'client_secret' => '',
            'access_token' => '',
            'redirect_uri' => 'https://news.jretech.com/api/aweber/v1/oauth',
            'list_id' => '',
            'accountId' => '',
        ];
    }

    public function get($key) {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }
    public static function getInstance($className, $config)
    {
        if (!isset(self::$instances[$className])) {
            self::$instances[$className] = new $className($config);
        }
        return self::$instances[$className];
    }
}

$config = new Config();
$db = Database\Database::getInstance($config);

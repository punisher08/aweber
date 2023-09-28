<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$autoloadPath = __DIR__.'/autoload/autoload.php';
$configPath = __DIR__.'/config.php';

if (file_exists($autoloadPath )  && file_exists($configPath ) ) {
    require_once (__DIR__.'/autoload/autoload.php');
    require_once (__DIR__.'/config.php');
} 

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    /** AWEBER API */
    '/' => 'AweberController@index',
    '/dashboard' => 'AweberController@index',
    '/api/aweber/v1/subscribed' => 'AweberController@user_subscribed',
    '/api/aweber/v1/oauth' => 'AweberController@oauth_callback',
    // Generate access token
    '/api/aweber/accesstoken' => 'AweberController@generate_access_token',
    '/aweber/subscriber/add' => 'AweberController@add_subscriber',
    '/aweber/subscriber/form' => 'AweberController@add_form',
    
    '/login' => 'HomeController@login',
    '/signin' => 'HomeController@signin',
    '/register' => 'HomeController@registration',
    '/account/create' => 'HomeController@account_create',
    '/signout' => 'UserController@signout',
];

$route = $routes[$requestPath] ?? '@';

list($controllerName, $actionName) = explode('@', $route);


$controllerNamespace = 'Controller\\' . $controllerName;

if (class_exists($controllerNamespace)) {
    $controller = new $controllerNamespace($config);
    if (method_exists($controller, $actionName)) {
        $controller->$actionName();
    } else {
        require_once __DIR__.'/action-not-found.php';
    }
} else {
    require_once __DIR__.'/404.php';
}

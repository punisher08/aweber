<?php
require_once dirname(__DIR__).'/vendor/autoload.php';
use League\OAuth2\Client\Provider\GenericProvider;

$scopes = array(
        'account.read',
        'list.read',
        'list.write',
        'subscriber.read',
        'subscriber.write',
        'email.read',
        'email.write',
        'subscriber.read-extended',
        'landing-page.read'
    );
    
     $provider = new \League\OAuth2\Client\Provider\GenericProvider([
        'clientId' => $this->config->get('client_id'),
        'clientSecret' => $this->config->get('client_secret'),
        'redirectUri' => $this->config->get('redirect_uri'),
        'scopes' => $scopes,
        'scopeSeparator' => ' ',
        'urlAuthorize' =>  'https://auth.aweber.com/oauth2/authorize',
        'urlAccessToken' =>  'https://auth.aweber.com/oauth2/token/token',
        'urlResourceOwnerDetails' => 'https://api.aweber.com/1.0/accounts'
    ]);
    $code = $_GET['code'];

    if(!isset($code)){
        $authorizationUrl = $provider->getAuthorizationUrl();
        $_SESSION['oauth2state'] = $provider->getState();
        header('Location: ' . $authorizationUrl);
        exit();
    }else{

        $code = $_GET['code'];

        $token = $provider->getAccessToken('authorization_code', [
            'code' => $code
        ]);
    
        $accessToken = $token->getToken();
        $refreshToken = $token->getRefreshToken();
    }




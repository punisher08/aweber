<?php
require_once dirname(__DIR__).'/vendor/autoload.php';

use GuzzleHttp\Client;

$base_url = 'https://api.aweber.com/1.0/';
$client = new GuzzleHttp\Client();
extract($_POST);
$inputString = $custom_fields;

// Initialize an empty array to store the key-value pairs
$keyValueArray = [];
$inputString = str_replace(["\n", "\r", ' '], '', $inputString);
$pairs = explode(',', $inputString);
$fields = [];
foreach ($pairs as $item) {
    $parts = explode(':', $item);
    if (count($parts) === 2) {

        $key = trim($parts[0]);
        $value = trim($parts[1]);
        $fields[$key] = $value;
    }
}

$client_id = $this->config->get('client_id');
$client_secret = $this->config->get('client_secret');
$accessToken = $this->config->get('access_token'); 

/** Check Custom fields if exist */
$accounts = $this->getCollection($client, $accessToken, BASE_URL . 'accounts');
$account = $accounts[0];  // choose the first account

// // Get a list to manage custom fields on
$listsUrl = $account['lists_collection_link'];
$lists = $this->getCollection($client, $accessToken, $listsUrl);
$list = $lists[0];  // choose the first list

// Check if custom fields already exist with the names we use below
$customFieldsUrl = $list['custom_fields_collection_link'];
$customFields = $this->getCollection($client, $accessToken, $customFieldsUrl);


foreach ($customFields as $entry) {
    if (in_array($entry['name'], $fields, true)) {
        echo "A custom field called {$entry['name']} already exists on {$list['name']}\n";
        exit();
    }
}
$body = [
    'ad_tracking' => 'ebook',
    'custom_fields' => $fields,
    'email' => $email,
    'ip_address' => '192.168.1.1',
    'last_followup_message_number_sent' => 0,
    'misc_notes' => 'string',
    'name' => $name,
    'strict_custom_fields' => 'true',
    'tags' => [
      'subscriber',
      'email',
    ]
  ];

$headers = [
    'Content-Type' => 'application/json',
    'Accept' => 'application/json',
    // 'User-Agent' => 'AWeber-PHP-code-sample/1.0',
    'Authorization' => 'Bearer ' . $accessToken
];

$listId = $this->config->get('list_id');
$accountId=  $this->config->get('accountId');
$url = "https://api.aweber.com/1.0/accounts/{$accountId}/lists/{$listId}/subscribers";
$response = $client->post($url, ['json' => $body, 'headers' => $headers]);
echo $response->getHeader('Location')[0];








<?php
require_once dirname(__DIR__).'/vendor/autoload.php';

use GuzzleHttp\Client;

$base_url = 'https://api.aweber.com/1.0/';
$client = new GuzzleHttp\Client();

$client_id = $this->config->get('client_id');
$client_secret = $this->config->get('client_secret');
$accessToken = $this->config->get('access_token'); 

// Get an account to manage custom fields on
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
    if (in_array($entry['name'], ['Test', 'Renamed'], true)) {
        echo "A custom field called {$entry['name']} already exists on {$list['name']}\n";
        exit();
    }
}
// Create a custom field called Test
$createResponse = $client->post($customFieldsUrl, [
    'form_params' => ['ws.op' => 'create', 'name' => 'Test'],
    'headers' => ['Authorization' => 'Bearer ' . $accessToken]]);
$fieldUrl = $createResponse->getHeader('Location')[0];
echo "Create new custom field at {$fieldUrl}\n";

// Update the custom field
$updateResponse = $client->patch($fieldUrl, [
    'json' => ['name' => 'Renamed', 'is_subscriber_updateable' => true],
    'headers' => ['Authorization' => 'Bearer ' . $accessToken]]);
$updatedField = json_decode($updateResponse->getBody(), true);
echo "Updated the custom field: ";
print_r($updatedField);

// Delete the custom field
$client->delete($fieldUrl, 
    ['headers' => ['Authorization' => 'Bearer ' . $accessToken]]);
echo "Deleted the custom field\n";








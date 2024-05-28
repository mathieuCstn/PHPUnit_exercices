<?php

namespace App;

use GuzzleHttp\Client;

class ApiClient {
    private $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function getData($url) {
        $response = $this->client->get($url);
        return json_decode($response->getBody(), true);
    }
}

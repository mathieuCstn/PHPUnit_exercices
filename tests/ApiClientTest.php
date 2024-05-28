<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use App\ApiClient;

class ApiClientTest extends TestCase {
    public function testGetData() {
        $response = new Response(200, [], json_encode(['key' => 'value']));
        
        // On modifie une méthode existante (get()) avec onlyMethods(); On aurait utilisé addMethods() si elle n'existait pas
        $clientMock = $this->getMockBuilder(Client::class)
                           ->onlyMethods(['get'])
                           ->getMock();
        
        // Ici on détermine ce qui devra être retourné
        $clientMock->expects($this->once())
                   ->method('get')
                   ->with($this->equalTo('http://example.com'))
                   ->willReturn($response);
        
        $apiClient = new ApiClient($clientMock);
        $data = $apiClient->getData('http://example.com');
        
        $this->assertEquals(['key' => 'value'], $data);
    }
}

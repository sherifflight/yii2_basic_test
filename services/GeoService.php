<?php
namespace app\services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\StreamInterface;

class GeoService
{
    protected $client;

    const GET_REQUEST = 'GET';
    const POST_REQUEST = 'POST';

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param string $ipAddress
     * @return string|null
     * @throws GuzzleException
     */
    public function getUserCityByIpAddress(string $ipAddress) : ?string
    {
        $response = $this->client->request(
            self::GET_REQUEST,
            'http://api.sypexgeo.net/json/' . $ipAddress
        );

        if ($response->getStatusCode() !== 200) {
            return null;
        }

        return $response->getBody()->getContents();
    }
}

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
        $cityName = null;
        $response = $this->client->request(
            self::GET_REQUEST,
            'http://api.sypexgeo.net/json/' . $ipAddress
        );

        if ($response->getStatusCode() !== 200) {
            return null;
        }
        try {
            $content = $response->getBody()->getContents();
            /** @noinspection PhpComposerExtensionStubsInspection */
            $decodedContent = json_decode($content, true);

            $cityName = $decodedContent['city']['name_ru'];
        } catch (\Exception $exception) {
            return null;
        }

        return $cityName;
    }
}

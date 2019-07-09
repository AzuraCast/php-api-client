<?php
declare(strict_types=1);

namespace AzuraCast\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

abstract class AbstractClient
{
    /**
     * @var Client
     */
    protected $httpClient;

    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return array
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     * @throws GuzzleException
     */
    public function request(
        string $method = 'GET',
        string $uri = '',
        array $options = []
    ): array {
        $response = $this->httpClient->request($method, $uri, $options);

        if (403 === $response->getStatusCode()) {
            throw new Exception\AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if (200 !== $response->getStatusCode()) {
            throw new Exception\ClientRequestException(sprintf(
                'Call to "%s" returned non-successful response with code %s and body: %s',
                $uri,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        return json_decode($response->getBody()->getContents(), true);
    }
}

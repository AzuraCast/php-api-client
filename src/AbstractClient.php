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
        $this->setHttpClient($httpClient);
    }

    /**
     * @return Client
     */
    public function getHttpClient(): Client
    {
        return $this->httpClient;
    }

    /**
     * @param Client $httpClient
     *
     * @return AbstractClient
     */
    public function setHttpClient(Client $httpClient): AbstractClient
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     *
     * @return mixed
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function request(
        string $method = 'GET',
        string $uri = '',
        array $options = []
    ) {
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

<?php
declare(strict_types=1);

namespace AzuraCast\Api;

use AzuraCast\Api\Dto;
use GuzzleHttp\Psr7\Uri;

class Client extends AbstractClient
{
    public function admin(): AdminClient
    {
        return new AdminClient($this->httpClient);
    }

    /**
     * @return Dto\NowPlayingDto[]
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function nowPlaying(): array
    {
        $response = $this->request('GET', 'nowplaying');

        $nowPlayingDtoArray = [];
        foreach ($response as $nowPlayingData) {
            $nowPlayingDtoArray[] = Dto\NowPlayingDto::fromArray($nowPlayingData);
        }
        return $nowPlayingDtoArray;
    }

    /**
     * @return Dto\StationDto[]
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function stations(): array
    {
        $stationDataArray = $this->request('GET', 'stations');

        $stationDtoArray = [];
        foreach ($stationDataArray as $stationData) {
            $stationDtoArray[] = Dto\StationDto::fromArray($stationData);
        }
        return $stationDtoArray;
    }

    /**
     * @param string|int $stationId
     *
     * @return StationClient
     */
    public function station($stationId): StationClient
    {
        return new StationClient($this->httpClient, $stationId);
    }

    /**
     * @param string $host
     * @param string|null $apiKey
     * @param \GuzzleHttp\Client|null $existingClient An existing HTTP client to pull configuration from.
     *
     * @return Client
     */
    public static function create(
        string $host,
        ?string $apiKey = null,
        ?\GuzzleHttp\Client $existingClient = null
    ): self {
        if ($existingClient instanceof \GuzzleHttp\Client) {
            $options = $existingClient->getConfig();
        } else {
            $options = [];
        }

        $baseUri = new Uri($host);
        if (empty($baseUri->getScheme())) {
            $baseUri = $baseUri->withScheme('http');
        }
        $baseUri = $baseUri->withPath('/api/');

        $options['base_uri'] = (string)$baseUri;

        $options['allow_redirects'] = true;
        $options['http_errors'] = false;

        if (null !== $apiKey) {
            $options['headers']['Authorization'] = 'Bearer ' . $apiKey;
        }

        $httpClient = new \GuzzleHttp\Client($options);
        return new self($httpClient);
    }
}

<?php
declare(strict_types=1);

namespace AzuraCast\Api;

use AzuraCast\Api\Dto;

class Client extends AbstractClient
{
    public function admin(): AdminClient
    {
        return new AdminClient($this->httpClient);
    }

    /**
     * @return Dto\NowPlayingDto[]
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
     * @return StationClient
     */
    public function station($stationId): StationClient
    {
        return new StationClient($this->httpClient, $stationId);
    }

    /**
     * @param string $host
     * @param string|null $apiKey
     * @return self
     */
    public static function create(
        string $host,
        ?string $apiKey = null
    ): self {
        $options = [
            'base_uri' => $host . '/api/',
            'allow_redirects' => true,
            'http_errors' => false
        ];

        if ($apiKey !== null) {
            $options['headers'] = [
                'Authorization' => 'Bearer ' . $apiKey
            ];
        }

        $httpClient = new \GuzzleHttp\Client($options);
        return new self($httpClient);
    }
}

<?php
declare(strict_types=1);

namespace AzuraCast\Api\Station;

use AzuraCast\Api\AbstractStationClient;
use AzuraCast\Api\Dto;
use AzuraCast\Api\Exception;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;

class StreamersClient extends AbstractStationClient
{
    /**
     * @return Dto\StreamerDto[]
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function list(): array
    {
        $streamersData = $this->request(
            'GET',
            sprintf('station/%s/streamers', $this->stationId)
        );

        $streamers = [];
        foreach ($streamersData as $streamerData) {
            $streamers[] = Dto\StreamerDto::fromArray($streamerData);
        }
        return $streamers;
    }

    /**
     * @param int $streamerId
     *
     * @return Dto\StreamerDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function get(int $streamerId): Dto\StreamerDto
    {
        $streamerData = $this->request(
            'GET',
            sprintf('station/%s/streamer/%s', $this->stationId, $streamerId)
        );

        return Dto\StreamerDto::fromArray($streamerData);
    }

    /**
     * @param string $username
     * @param string $password
     * @param string $displayName
     * @param string $comments
     * @param bool $isActive
     *
     * @return Dto\StreamerDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function create(
        string $username,
        string $password,
        string $displayName,
        string $comments,
        bool $isActive
    ): Dto\StreamerDto {
        $linksDto = new Dto\LinksDto('');
        $streamerDto = new Dto\StreamerDto(
            0,
            $username,
            $password,
            $displayName,
            $comments,
            $isActive,
            $linksDto
        );

        $streamerData = $this->request(
            'POST',
            sprintf('station/%s/streamers', $this->stationId),
            ['json' => $streamerDto]
        );

        return Dto\StreamerDto::fromArray($streamerData);
    }

    /**
     * @param int $streamerId
     * @param string $username
     * @param string $password
     * @param string $displayName
     * @param string $comments
     * @param bool $isActive
     *
     * @return Dto\StreamerDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function update(
        int $streamerId,
        string $username,
        string $password,
        string $displayName,
        string $comments,
        bool $isActive
    ): Dto\StreamerDto {
        $linksDto = new Dto\LinksDto('');
        $streamerDto = new Dto\StreamerDto(
            $streamerId,
            $username,
            $password,
            $displayName,
            $comments,
            $isActive,
            $linksDto
        );

        $this->request(
            'PUT',
            sprintf('station/%s/streamer/%s', $this->stationId, $streamerId),
            ['json' => $streamerDto]
        );

        return $streamerDto;
    }

    /**
     * @param int $streamerId
     *
     * @return void
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function delete(int $streamerId): void
    {
        $this->request(
            'DELETE',
            sprintf('station/%s/streamer/%s', $this->stationId, $streamerId)
        );
    }
}

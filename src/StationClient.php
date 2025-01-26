<?php
declare(strict_types=1);

namespace AzuraCast\Api;

use AzuraCast\Api\Station;
use AzuraCast\Api\Dto;
use AzuraCast\Api\Exception;
use DateTime;

class StationClient extends AbstractStationClient
{
    /**
     * @return Dto\StationDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function get(): Dto\StationDto
    {
        $stationData = $this->request('GET', sprintf(
            'station/%s',
            $this->stationId
        ));

        return Dto\StationDto::fromArray($stationData);
    }

    /**
     * @return Dto\NowPlayingDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function nowPlaying(): Dto\NowPlayingDto
    {
        $nowPlayingData = $this->request('GET', sprintf(
            'nowplaying/%s',
            $this->stationId
        ));

        return Dto\NowPlayingDto::fromArray($nowPlayingData);
    }

    /**
     * @return Station\RequestsClient
     */
    public function requests(): Station\RequestsClient
    {
        return new Station\RequestsClient($this->httpClient, $this->stationId);
    }

    /**
     * @return Dto\StationStatusDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function status(): Dto\StationStatusDto
    {
        $stationStatusData = $this->request('GET', sprintf(
            'station/%s/status',
            $this->stationId
        ));

        return Dto\StationStatusDto::fromArray($stationStatusData);
    }

    /**
     * @return void
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function restart(): void
    {
        $this->request('POST', sprintf(
            'station/%s/restart',
            $this->stationId
        ));
    }

    /**
     * @param string $action
     *
     * @return void
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function frontend(string $action): void
    {
        $this->request('POST', sprintf(
            'station/%s/frontend/%s',
            $this->stationId,
            $action
        ));
    }

    /**
     * @param string $action
     *
     * @return void
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function backend(string $action): void
    {
        $this->request('POST', sprintf(
            'station/%s/backend/%s',
            $this->stationId,
            $action
        ));
    }

        /**
     * @param DateTime|null $start
     * @param DateTime|null $end
     *
     * @return Dto\SongHistoryDto[]
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */

    public function history(?DateTime $start = null, ?DateTime $end = null): array
    {
        $queryParams = [];

        // Only add "start" if we actually have a DateTime object
        if ($start instanceof DateTime) {
            // Adjust the format string to what your API expects
            $queryParams['start'] = $start->format('Y-m-d H:i:s');
        }

        // Only add "end" if we actually have a DateTime object
        if ($end instanceof DateTime) {
            $queryParams['end'] = $end->format('Y-m-d H:i:s');
        }

        $queryString = http_build_query($queryParams);

        $endpoint = sprintf('station/%s/history', $this->stationId);
        if (!empty($queryString)) {
            $endpoint .= '?' . $queryString;
        }

        $songHistoryDataArray = $this->request('GET', $endpoint);

        $songHistory = [];
        foreach ($songHistoryDataArray as $songHistoryData) {
            $songHistory[] = Dto\SongHistoryDto::fromArray($songHistoryData);
        }

        return $songHistory;
    }

    /**
     * @return Dto\ListenerDto[]
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function listeners(): array
    {
        $listenerDataArray = $this->request('GET', sprintf(
            'station/%s/listeners',
            $this->stationId
        ));

        $listenerDtoArray = [];
        foreach ($listenerDataArray as $listenerData) {
            $listenerDtoArray[] = Dto\ListenerDto::fromArray($listenerData);
        }
        return $listenerDtoArray;
    }

    /**
     * @return Station\MediaClient
     */
    public function media(): Station\MediaClient
    {
        return new Station\MediaClient($this->httpClient, $this->stationId);
    }

    /**
     * @return Dto\MountpointDto[]
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function mounts(): array
    {
        $mountpointsData = $this->request(
            'GET',
            sprintf('station/%s/mounts', $this->stationId)
        );

        $mountpoints = [];
        foreach ($mountpointsData as $mountpointData) {
            $mountpoints[] = Dto\MountpointDto::fromArray($mountpointData);
        }
        return $mountpoints;
    }

    /**
     * @return Station\StreamersClient
     */
    public function streamers(): Station\StreamersClient
    {
        return new Station\StreamersClient($this->httpClient, $this->stationId);
    }
}

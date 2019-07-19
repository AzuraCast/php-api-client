<?php
declare(strict_types=1);

namespace AzuraCast\Api\Station;

use AzuraCast\Api\AbstractStationClient;
use AzuraCast\Api\Dto;
use AzuraCast\Api\Exception;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;

class RequestsClient extends AbstractStationClient
{
    /**
     * @param int $page
     * @param int $perPage
     *
     * @return Dto\RequestableSongsDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function list(int $page = 1, int $perPage = -1): Dto\RequestableSongsDto
    {
        $requestableSongsData = $this->request('GET', sprintf(
            'station/%s/requests?per_page=%d&page=%d',
            $this->stationId,
            $perPage,
            $page
        ));

        return Dto\RequestableSongsDto::fromArray($requestableSongsData);
    }

    /**
     * @param string $uniqueId
     *
     * @return void
     *
     * @throws Exception\ClientRequestException
     * @throws Exception\RequestsDisabledException
     */
    public function submit(string $uniqueId): void
    {
        try {
            $this->request('POST', sprintf(
                'station/%s/request/%s',
                $this->stationId,
                $uniqueId
            ));
        } catch (Exception\AccessDeniedException $e) {
            throw new Exception\RequestsDisabledException($e->getMessage(), $e->getCode(), $e);
        }
    }
}

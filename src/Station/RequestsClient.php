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
     * @return Dto\RequestableSongsDto
     */
    public function list(int $page = 1): Dto\RequestableSongsDto
    {
        $requestableSongsData = $this->request('GET', sprintf(
            'station/%s/requests?per_page=50&page=%s',
            $this->stationId,
            $page
        ));

        return Dto\RequestableSongsDto::fromArray($requestableSongsData);
    }

    /**
     * @return Dto\RequestableSongsDto[]
     */
    public function all(): array
    {
        $requestableSongsDto = $this->list(1);

        $requests = function() use ($requestableSongsDto) {
            for ($page = 1; $page <= $requestableSongsDto->getPagesTotal(); $page++) {
                $uri = sprintf('station/%s/requests?per_page=50&page=%s', $this->stationId, $page);
                yield new Request('GET', $uri);
            }
        };

        $requestableSongs = [];
        $pool = new Pool($this->httpClient, $requests, [
            'concurrency' => 5,
            'fulfilled' => function ($response, $index) use (&$requestableSongs) {
                if ($response->getStatusCode() !== 200) {
                    return;
                }

                $requestableSongsData = json_decode($response->getBody()->getContents(), true);
                $requestableSongs[] = Dto\RequestableSongsDto::fromArray($requestableSongsData);
            }
        ]);

        $promise = $pool->promise();
        $promise->wait();

        return $requestableSongs;
    }

    /**
     * @param string $uniqueId
     * @return void
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

<?php
declare(strict_types=1);

namespace AzuraCast\Api;

use GuzzleHttp\Client;

abstract class AbstractStationClient extends AbstractClient
{
    /** @var string|int */
    protected $stationId;

    /**
     * @param Client $httpClient
     * @param string|int $stationId
     */
    public function __construct(Client $httpClient, $stationId)
    {
        parent::__construct($httpClient);

        $this->stationId = $stationId;
    }
}

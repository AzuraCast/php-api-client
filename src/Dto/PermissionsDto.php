<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

use JsonSerializable;

class PermissionsDto implements JsonSerializable
{
    /**
     * @var string[]
     */
    protected $global;

    /**
     * @var string[]
     */
    protected $station;

    /**
     * @param array $global
     * @param array $station
     */
    public function __construct(array $global, array $station)
    {
        $this->setGlobal($global)
            ->setStation($station);
    }

    /**
     * @return array
     */
    public function getGlobal(): array
    {
        return $this->global;
    }

    /**
     * @param array $global
     *
     * @return PermissionsDto
     */
    public function setGlobal(array $global): PermissionsDto
    {
        $this->global = $global;

        return $this;
    }

    /**
     * @return array
     */
    public function getStation(): array
    {
        return $this->station;
    }

    /**
     * @param array $station
     *
     * @return PermissionsDto
     */
    public function setStation(array $station): PermissionsDto
    {
        $this->station = $station;

        return $this;
    }

    /**
     * @param int $stationId
     * @param string $permission
     *
     * @return PermissionsDto
     */
    public function addStation(int $stationId, string $permission): PermissionsDto
    {
        if (!isset($this->station[$stationId])) {
            $this->station[$stationId] = [];
        }

        $this->station[$stationId][] = $permission;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        return [
            'global' => $this->getGlobal(),
            'station' => $this->getStation()
        ];
    }

    /**
     * @param array $permissionsData
     *
     * @return PermissionsDto
     */
    public static function fromArray(array $permissionsData): self
    {
        return new self(
            $permissionsData['global'],
            $permissionsData['station']
        );
    }
}

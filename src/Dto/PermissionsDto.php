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
     * @param string[] $global
     * @param string[] $station
     */
    public function __construct(array $global, array $station)
    {
        $this->setGlobal($global)
            ->setStation($station);
    }

    /**
     * @return string[]
     */
    public function getGlobal(): array
    {
        return $this->global;
    }

    /**
     * @param string[] $global
     *
     * @return PermissionsDto
     */
    public function setGlobal(array $global): PermissionsDto
    {
        $this->global = $global;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getStation(): array
    {
        return $this->station;
    }

    /**
     * @param string[] $station
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

        return $this;
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
     * @param mixed[] $permissionsData
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

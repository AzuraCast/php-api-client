<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient\Dto;

use JsonSerializable;

class PermissionsDto implements JsonSerializable {
	/**
	 * @var string[]
	 */
	protected $global;

	/**
	 * @var string[]
	 */
	protected $station;

	public function __construct(array $global, array $station) {
		$this->setGlobal($global)
			->setStation($station);
	}

	/**
	 * @return array
	 */
	public function getGlobal(): array {
		return $this->global;
	}

	/**
	 * @param array $global
	 *
	 * @return PermissionsDto
	 */
	public function setGlobal(array $global): PermissionsDto {
		$this->global = $global;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getStation(): array {
		return $this->station;
	}

	/**
	 * @param array $station
	 *
	 * @return PermissionsDto
	 */
	public function setStation(array $station): PermissionsDto {
		$this->station = $station;

		return $this;
	}

	/**
	 * @param int $stationId
	 * @param string $permission
	 *
	 * @return PermissionsDto
	 */
	public function addStation(int $stationId, string $permission): PermissionsDto {
		$this->station[$stationId][] = $permission;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize() {
		return [
			'global' => $this->getGlobal(),
			'station' => $this->getStation()
		];
	}
}

<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient\Transformer;

use Vaalyn\AzuraCastApiClient\Dto\StationStatusDto;

class StationStatusDtoTransformer {
	/**
	 * @param array $stationStatusData
	 *
	 * @return StationStatusDto
	 */
	public function arrayToDto(array $stationStatusData): StationStatusDto {
		return new StationStatusDto(
			$stationStatusData['backend_running'],
			$stationStatusData['frontend_running']
		);
	}
}

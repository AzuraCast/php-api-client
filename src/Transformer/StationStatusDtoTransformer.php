<?php

declare(strict_types = 1);

namespace AzuraCast\AzuraCastApiClient\Transformer;

use AzuraCast\AzuraCastApiClient\Dto\StationStatusDto;

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

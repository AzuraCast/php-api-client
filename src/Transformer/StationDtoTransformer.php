<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient\Transformer;

use Vaalyn\AzuraCastApiClient\Dto\StationDto;

class StationDtoTransformer {
	/**
	 * @param array $stationData
	 *
	 * @return StationDto
	 */
	public function arrayToDto(array $stationData): StationDto {
		$mountDtoTransformer = new MountDtoTransformer();
		$remoteDtoTransformer = new RemoteDtoTransformer();

		$mounts = [];
		$remotes = [];

		foreach ($stationData['mounts'] as $mountData) {
			$mounts[] = $mountDtoTransformer->arrayToDto($mountData);
		}

		foreach ($stationData['remotes'] as $remoteData) {
			$remotes[] = $remoteDtoTransformer->arrayToDto($remoteData);
		}

		return new StationDto(
			$stationData['id'],
			$stationData['name'],
			$stationData['shortcode'],
			$stationData['description'],
			$stationData['frontend'],
			$stationData['backend'],
			$stationData['listen_url'],
			$stationData['is_public'],
			$mounts,
			$remotes
		);
	}
}

<?php

declare(strict_types = 1);

namespace AzuraCast\AzuraCastApiClient\Transformer;

use AzuraCast\AzuraCastApiClient\Dto\ListenerDto;

class ListenerDtoTransformer {
	/**
	 * @param array $listenerData
	 *
	 * @return ListenerDto
	 */
	public function arrayToDto(array $listenerData): ListenerDto {
		$locationDtoTransformer = new LocationDtoTransformer();

		$locationDto = $locationDtoTransformer->arrayToDto($listenerData['location']);

		return new ListenerDto(
			$listenerData['ip'],
			$listenerData['user_agent'],
			$listenerData['is_mobile'],
			$listenerData['connected_on'],
			$listenerData['connected_time'],
			$locationDto
		);
	}
}

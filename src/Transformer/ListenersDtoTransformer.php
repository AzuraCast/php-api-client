<?php

declare(strict_types = 1);

namespace AzuraCast\AzuraCastApiClient\Transformer;

use AzuraCast\AzuraCastApiClient\Dto\ListenersDto;

class ListenersDtoTransformer {
	/**
	 * @param array $listenersData
	 *
	 * @return ListenersDto
	 */
	public function arrayToDto(array $listenersData): ListenersDto {
		return new ListenersDto(
			$listenersData['current'],
			$listenersData['unique'],
			$listenersData['total']
		);
	}
}

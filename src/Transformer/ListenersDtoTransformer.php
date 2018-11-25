<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient\Transformer;

use Vaalyn\AzuraCastApiClient\Dto\ListenersDto;

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

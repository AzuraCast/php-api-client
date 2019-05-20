<?php

declare(strict_types = 1);

namespace AzuraCast\AzuraCastApiClient\Transformer;

use AzuraCast\AzuraCastApiClient\Dto\LiveDto;

class LiveDtoTransformer {
	/**
	 * @param array $liveData
	 *
	 * @return LiveDto
	 */
	public function arrayToDto(array $liveData): LiveDto {
		return new LiveDto(
			$liveData['is_live'],
			$liveData['streamer_name']
		);
	}
}

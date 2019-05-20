<?php

declare(strict_types = 1);

namespace AzuraCast\AzuraCastApiClient\Transformer;

use AzuraCast\AzuraCastApiClient\Dto\StreamerDto;

class StreamerDtoTransformer {
	/**
	 * @param array $streamerData
	 *
	 * @return StreamerDto
	 */
	public function arrayToDto(array $streamerData): StreamerDto {
		$linksDtoTransformer = new LinksDtoTransformer();

		$linksDto = $linksDtoTransformer->arrayToDto($streamerData['links']);

		return new StreamerDto(
			$streamerData['id'],
			$streamerData['streamer_username'],
			$streamerData['streamer_password'],
			$streamerData['display_name'],
			$streamerData['comments'],
			$streamerData['is_active'],
			$linksDto
		);
	}
}

<?php

declare(strict_types = 1);

namespace AzuraCast\AzuraCastApiClient\Transformer;

use AzuraCast\AzuraCastApiClient\Dto\MountDto;

class MountDtoTransformer {
	/**
	 * @param array $mountData
	 *
	 * @return MountDto
	 */
	public function arrayToDto(array $mountData): MountDto {
		return new MountDto(
			$mountData['name'],
			$mountData['is_default'],
			$mountData['url'],
			$mountData['bitrate'],
			$mountData['format']
		);
	}
}

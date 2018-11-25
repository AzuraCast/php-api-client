<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient\Transformer;

use Vaalyn\AzuraCastApiClient\Dto\MountDto;

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

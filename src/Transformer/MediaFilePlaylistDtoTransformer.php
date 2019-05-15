<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient\Transformer;

use Vaalyn\AzuraCastApiClient\Dto\MediaFilePlaylistDto;

class MediaFilePlaylistDtoTransformer {
	/**
	 * @param array $mediaFilePlaylistData
	 *
	 * @return MediaFilePlaylistDto
	 */
	public function arrayToDto(array $mediaFilePlaylistData): MediaFilePlaylistDto {
		return new MediaFilePlaylistDto(
			$mediaFilePlaylistData['id'],
			$mediaFilePlaylistData['name'],
			$mediaFilePlaylistData['weight']
		);
	}
}

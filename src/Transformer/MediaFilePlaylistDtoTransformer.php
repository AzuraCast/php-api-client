<?php

declare(strict_types = 1);

namespace AzuraCast\AzuraCastApiClient\Transformer;

use AzuraCast\AzuraCastApiClient\Dto\MediaFilePlaylistDto;

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

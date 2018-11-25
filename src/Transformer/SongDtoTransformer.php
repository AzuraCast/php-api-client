<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient\Transformer;

use Vaalyn\AzuraCastApiClient\Dto\SongDto;

class SongDtoTransformer {
	/**
	 * @param array $songData
	 *
	 * @return SongDto
	 */
	public function arrayToDto(array $songData): SongDto {
		return new SongDto(
			$songData['id'],
			$songData['text'],
			$songData['artist'],
			$songData['title'],
			$songData['album'],
			$songData['lyrics'],
			$songData['art'],
			$songData['custom_fields']
		);
	}
}

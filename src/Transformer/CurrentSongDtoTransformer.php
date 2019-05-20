<?php

declare(strict_types = 1);

namespace AzuraCast\AzuraCastApiClient\Transformer;

use AzuraCast\AzuraCastApiClient\Dto\CurrentSongDto;

class CurrentSongDtoTransformer {
	/**
	 * @param array $currentSongData
	 *
	 * @return CurrentSongDto
	 */
	public function arrayToDto(array $currentSongData): CurrentSongDto {
		$songDtoTransformer = new SongDtoTransformer();

		$songDto = $songDtoTransformer->arrayToDto($currentSongData['song']);

		return new CurrentSongDto(
			$currentSongData['elapsed'],
			$currentSongData['remaining'],
			$currentSongData['sh_id'],
			$currentSongData['played_at'],
			$currentSongData['duration'],
			$currentSongData['playlist'],
			$currentSongData['is_request'],
			$songDto
		);
	}
}

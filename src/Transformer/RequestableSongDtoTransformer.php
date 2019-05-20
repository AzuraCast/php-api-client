<?php

declare(strict_types = 1);

namespace AzuraCast\AzuraCastApiClient\Transformer;

use AzuraCast\AzuraCastApiClient\Dto\RequestableSongDto;

class RequestableSongDtoTransformer {
	/**
	 * @param array $requestableSongData
	 *
	 * @return RequestableSongDto
	 */
	public function arrayToDto(array $requestableSongData): RequestableSongDto {
		$songDtoTransformer = new SongDtoTransformer();

		$song = $songDtoTransformer->arrayToDto($requestableSongData['song']);

		return new RequestableSongDto(
			$requestableSongData['request_id'],
			$requestableSongData['request_url'],
			$song
		);
	}
}

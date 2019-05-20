<?php

declare(strict_types = 1);

namespace AzuraCast\AzuraCastApiClient\Transformer;

use AzuraCast\AzuraCastApiClient\Dto\SongHistoryDto;

class SongHistoryDtoTransformer {
	/**
	 * @param array $songHistoryData
	 *
	 * @return SongHistoryDto
	 */
	public function arrayToDto(array $songHistoryData): SongHistoryDto {
		$songDtoTransformer = new SongDtoTransformer();

		$songDto = $songDtoTransformer->arrayToDto($songHistoryData['song']);

		return new SongHistoryDto(
			$songHistoryData['sh_id'],
			$songHistoryData['played_at'],
			$songHistoryData['duration'],
			$songHistoryData['playlist'],
			$songHistoryData['is_request'],
			$songDto
		);
	}
}

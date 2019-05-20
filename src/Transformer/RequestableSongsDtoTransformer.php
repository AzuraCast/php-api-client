<?php

declare(strict_types = 1);

namespace AzuraCast\AzuraCastApiClient\Transformer;

use AzuraCast\AzuraCastApiClient\Dto\RequestableSongsDto;

class RequestableSongsDtoTransformer {
	/**
	 * @param array $requestableSongsData
	 *
	 * @return RequestableSongsDto
	 */
	public function arrayToDto(array $requestableSongsData): RequestableSongsDto {
		$paginationLinksDtoTransformer = new PaginationLinksDtoTransformer();
		$requestableSongDtoTransformer = new RequestableSongDtoTransformer();

		$paginationLinks = $paginationLinksDtoTransformer->arrayToDto($requestableSongsData['links']);

		$requestableSongs = [];

		foreach ($requestableSongsData['rows'] as $requestableSongData) {
			$requestableSongs[] = $requestableSongDtoTransformer->arrayToDto($requestableSongData);
		}

		return new RequestableSongsDto(
			$requestableSongsData['page'],
			$requestableSongsData['per_page'],
			$requestableSongsData['total'],
			$requestableSongsData['total_pages'],
			$paginationLinks,
			$requestableSongs
		);
	}
}

<?php

declare(strict_types = 1);

namespace AzuraCast\AzuraCastApiClient\Transformer;

use AzuraCast\AzuraCastApiClient\Dto\PaginationLinksDto;

class PaginationLinksDtoTransformer {
	/**
	 * @param array $paginationLinksData
	 *
	 * @return PaginationLinksDto
	 */
	public function arrayToDto(array $paginationLinksData): PaginationLinksDto {
		return new PaginationLinksDto(
			$paginationLinksData['first'],
			$paginationLinksData['previous'],
			$paginationLinksData['next'],
			$paginationLinksData['last']
		);
	}
}

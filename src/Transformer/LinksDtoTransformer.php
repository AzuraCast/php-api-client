<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient\Transformer;

use Vaalyn\AzuraCastApiClient\Dto\LinksDto;

class LinksDtoTransformer {
	/**
	 * @param array $linksData
	 *
	 * @return LinksDto
	 */
	public function arrayToDto(array $linksData): LinksDto {
		return new LinksDto($linksData['self']);
	}
}

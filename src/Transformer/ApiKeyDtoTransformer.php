<?php

declare(strict_types = 1);

namespace AzuraCast\AzuraCastApiClient\Transformer;

use AzuraCast\AzuraCastApiClient\Dto\ApiKeyDto;

class ApiKeyDtoTransformer {
	/**
	 * @param array $apiKeyData
	 *
	 * @return ApiKeyDto
	 */
	public function arrayToDto(array $apiKeyData): ApiKeyDto {
		return new ApiKeyDto(
			$apiKeyData['id'],
			$apiKeyData['comment']
		);
	}
}

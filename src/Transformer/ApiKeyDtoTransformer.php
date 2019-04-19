<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient\Transformer;

use Vaalyn\AzuraCastApiClient\Dto\ApiKeyDto;

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

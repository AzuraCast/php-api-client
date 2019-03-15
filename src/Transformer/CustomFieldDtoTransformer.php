<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient\Transformer;

use Vaalyn\AzuraCastApiClient\Dto\CustomFieldDto;

class CustomFieldDtoTransformer {
	/**
	 * @param array $customFieldData
	 *
	 * @return CustomFieldDto
	 */
	public function arrayToDto(array $customFieldData): CustomFieldDto {
		return new CustomFieldDto(
			(int) $customFieldData['id'],
			$customFieldData['name'],
			$customFieldData['short_name']
		);
	}
}

<?php

declare(strict_types = 1);

namespace AzuraCast\AzuraCastApiClient\Transformer;

use AzuraCast\AzuraCastApiClient\Dto\PermissionsDto;

class PermissionsDtoTransformer {
	/**
	 * @param array $permissionsData
	 *
	 * @return PermissionsDto
	 */
	public function arrayToDto(array $permissionsData): PermissionsDto {
		return new PermissionsDto(
			$permissionsData['global'],
			$permissionsData['station']
		);
	}
}

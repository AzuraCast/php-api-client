<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient\Transformer;

use Vaalyn\AzuraCastApiClient\Dto\RoleDto;

class RoleDtoTransformer {
	/**
	 * @param array $roleData
	 *
	 * @return RoleDto
	 */
	public function arrayToDto(array $roleData): RoleDto {
		$permissionsDtoTransformer = new PermissionsDtoTransformer();

		$permissionsDto = $permissionsDtoTransformer->arrayToDto($roleData['permissions']);

		return new RoleDto(
			$roleData['id'],
			$roleData['name'],
			$permissionsDto
		);
	}
}

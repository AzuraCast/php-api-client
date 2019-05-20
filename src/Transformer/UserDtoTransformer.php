<?php

declare(strict_types = 1);

namespace AzuraCast\AzuraCastApiClient\Transformer;

use AzuraCast\AzuraCastApiClient\Dto\UserDto;

class UserDtoTransformer {
	/**
	 * @param array $userData
	 *
	 * @return UserDto
	 */
	public function arrayToDto(array $userData): UserDto {
		$roleDtoTransformer = new RoleDtoTransformer();
		$apiKeyDtoTransformer = new ApiKeyDtoTransformer();
		$linksDtoTransformer = new LinksDtoTransformer();

		$roles = [];
		$apiKeys = [];

		foreach ($userData['roles'] as $roleData) {
			$roles[] = $roleDtoTransformer->arrayToDto($roleData);
		}

		foreach ($userData['api_keys'] as $apiKeyData) {
			$apiKeys[] = $apiKeyDtoTransformer->arrayToDto($apiKeyData);
		}

		$linksDto = $linksDtoTransformer->arrayToDto($userData['links']);

		return new UserDto(
			$userData['id'],
			$userData['email'],
			$userData['name'] ?? '',
			$userData['locale'] ?? '',
			$userData['theme'] ?? '',
			$userData['created_at'],
			$userData['updated_at'],
			$roles,
			$apiKeys,
			$linksDto
		);
	}
}

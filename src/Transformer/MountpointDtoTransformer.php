<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient\Transformer;

use Vaalyn\AzuraCastApiClient\Dto\MountpointDto;

class MountpointDtoTransformer {
	/**
	 * @param array $mountpointData
	 *
	 * @return MountpointDto
	 */
	public function arrayToDto(array $mountpointData): MountpointDto {
		$linksDtoTransformer = new LinksDtoTransformer();

		$linksDto = $linksDtoTransformer->arrayToDto($mountpointData['links']);

		return new MountpointDto(
			$mountpointData['id'],
			$mountpointData['name'],
			$mountpointData['display_name'],
			$mountpointData['is_visible_on_public_pages'],
			$mountpointData['is_default'],
			$mountpointData['is_public'],
			$mountpointData['enable_autodj'],
			$mountpointData['autodj_format'],
			$mountpointData['autodj_bitrate'],
			$linksDto
		);
	}
}

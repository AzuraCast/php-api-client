<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient\Transformer;

use Vaalyn\AzuraCastApiClient\Dto\RemoteDto;

class RemoteDtoTransformer {
	/**
	 * @param array $remoteData
	 *
	 * @return RemoteDto
	 */
	public function arrayToDto(array $remoteData): RemoteDto {
		return new RemoteDto(
			$remoteData['url'],
			$remoteData['bitrate'],
			$remoteData['format']
		);
	}
}

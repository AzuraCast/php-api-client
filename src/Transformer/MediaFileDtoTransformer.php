<?php

declare(strict_types = 1);

namespace AzuraCast\AzuraCastApiClient\Transformer;

use AzuraCast\AzuraCastApiClient\Dto\MediaFileDto;
use AzuraCast\AzuraCastApiClient\Dto\MediaFileCustomFieldDto;

class MediaFileDtoTransformer {
	/**
	 * @param array $mediaFileData
	 *
	 * @return MediaFileDto
	 */
	public function arrayToDto(array $mediaFileData): MediaFileDto {
		$mediaFilePlaylistDtoTransformer = new MediaFilePlaylistDtoTransformer();

		$playlists = [];
		$customFields = [];

		foreach ($mediaFileData['playlists'] as $playlistData) {
			$playlists[] = $mediaFilePlaylistDtoTransformer->arrayToDto($playlistData);
		}

		foreach ($mediaFileData['custom_fields'] as $id => $value) {
			$customFields[] = new MediaFileCustomFieldDto((int) $id, $value);
		}

		return new MediaFileDto(
			$mediaFileData['id'],
			$mediaFileData['song_id'],
			$mediaFileData['title'] ?? '',
			$mediaFileData['artist'] ?? '',
			$mediaFileData['album'] ?? '',
			$mediaFileData['lyrics'] ?? '',
			$mediaFileData['isrc'] ?? '',
			$mediaFileData['length'] ?? 0,
			$mediaFileData['length_text'] ?? '',
			$mediaFileData['path'],
			$mediaFileData['mtime'],
			$mediaFileData['fade_overlap'] ?? 0.0,
			$mediaFileData['fade_in'] ?? 0.0,
			$mediaFileData['fade_out'] ?? 0.0,
			$mediaFileData['cue_in'] ?? 0.0,
			$mediaFileData['cue_out'] ?? 0.0,
			$customFields,
			$mediaFileData['unique_id'],
			$playlists
		);
	}
}

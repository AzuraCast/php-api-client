<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient\Transformer;

use Vaalyn\AzuraCastApiClient\Dto\NowPlayingDto;

class NowPlayingDtoTransformer {
	/**
	 * @param array $nowPlayingData
	 *
	 * @return NowPlayingDto
	 */
	public function arrayToDto(array $nowPlayingData): NowPlayingDto {
		$stationDtoTransformer = new StationDtoTransformer();
		$listenersDtoTransformer = new ListenersDtoTransformer();
		$liveDtoTransformer = new LiveDtoTransformer();
		$currentSongDtoTransformer = new CurrentSongDtoTransformer();
		$songHistoryDtoTransformer = new SongHistoryDtoTransformer();

		$stationDto = $stationDtoTransformer->arrayToDto($nowPlayingData['station']);
		$listenersDto = $listenersDtoTransformer->arrayToDto($nowPlayingData['listeners']);
		$liveDto = $liveDtoTransformer->arrayToDto($nowPlayingData['live']);
		$currentSongDto = $currentSongDtoTransformer->arrayToDto($nowPlayingData['now_playing']);
		$nextSongDto = $songHistoryDtoTransformer->arrayToDto($nowPlayingData['playing_next']);

		$songHistory = [];

		foreach ($nowPlayingData['song_history'] as $songHistoryData) {
			$songHistory[] = $songHistoryDtoTransformer->arrayToDto($songHistoryData);
		}

		return new NowPlayingDto(
			$stationDto,
			$listenersDto,
			$liveDto,
			$currentSongDto,
			$nextSongDto,
			$songHistory,
			$nowPlayingData['cache']
		);
	}
}

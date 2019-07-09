<?php

declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class NowPlayingDto
{
    /**
     * @var StationDto
     */
    protected $station;

    /**
     * @var ListenersDto
     */
    protected $listeners;

    /**
     * @var LiveDto
     */
    protected $live;

    /**
     * @var CurrentSongDto
     */
    protected $currentSong;

    /**
     * @var SongHistoryDto[]
     */
    protected $songHistory;

    /**
     * @var string
     */
    protected $cache;

    /**
     * @param array $nowPlayingData
     */
    public function __construct(array $nowPlayingData)
    {
        $songHistory = [];
        foreach ($nowPlayingData['song_history'] as $songHistoryData) {
            $songHistory[] = new SongHistoryDto($songHistoryData);
        }

        $this->setStation(new StationDto($nowPlayingData['station']))
            ->setListeners(new ListenersDto($nowPlayingData['listeners']))
            ->setLive(new LiveDto($nowPlayingData['live']))
            ->setCurrentSong(new CurrentSongDto($nowPlayingData['now_playing']))
            ->setSongHistory($songHistory)
            ->setCache($nowPlayingData['cache']);
    }

    /**
     * @return StationDto
     */
    public function getStation(): StationDto
    {
        return $this->station;
    }

    /**
     * @param StationDto $station
     *
     * @return NowPlayingDto
     */
    public function setStation(StationDto $station): NowPlayingDto
    {
        $this->station = $station;

        return $this;
    }

    /**
     * @return ListenersDto
     */
    public function getListeners(): ListenersDto
    {
        return $this->listeners;
    }

    /**
     * @param ListenersDto $listeners
     *
     * @return NowPlayingDto
     */
    public function setListeners(ListenersDto $listeners): NowPlayingDto
    {
        $this->listeners = $listeners;

        return $this;
    }

    /**
     * @return LiveDto
     */
    public function getLive(): LiveDto
    {
        return $this->live;
    }

    /**
     * @param LiveDto $live
     *
     * @return NowPlayingDto
     */
    public function setLive(LiveDto $live): NowPlayingDto
    {
        $this->live = $live;

        return $this;
    }

    /**
     * @return CurrentSongDto
     */
    public function getCurrentSong(): CurrentSongDto
    {
        return $this->currentSong;
    }

    /**
     * @param CurrentSongDto $currentSong
     *
     * @return NowPlayingDto
     */
    public function setCurrentSong(CurrentSongDto $currentSong): NowPlayingDto
    {
        $this->currentSong = $currentSong;

        return $this;
    }

    /**
     * @return SongHistoryDto[]
     */
    public function getSongHistory(): array
    {
        return $this->songHistory;
    }

    /**
     * @param SongHistoryDto[] $songHistory
     *
     * @return NowPlayingDto
     */
    public function setSongHistory(array $songHistory): NowPlayingDto
    {
        $this->songHistory = $songHistory;

        return $this;
    }

    /**
     * @return string
     */
    public function getCache(): string
    {
        return $this->cache;
    }

    /**
     * @param string $cache
     *
     * @return NowPlayingDto
     */
    public function setCache(string $cache): NowPlayingDto
    {
        $this->cache = $cache;

        return $this;
    }
}

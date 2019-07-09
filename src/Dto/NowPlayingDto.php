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
     * @param StationDto $station
     * @param ListenersDto $listeners
     * @param LiveDto $live
     * @param CurrentSongDto $currentSong
     * @param SongHistoryDto[] $songHistory
     * @param string $cache
     */
    public function __construct(
        StationDto $station,
        ListenersDto $listeners,
        LiveDto $live,
        CurrentSongDto $currentSong,
        array $songHistory,
        string $cache
    ) {
        $this->setStation($station)
            ->setListeners($listeners)
            ->setLive($live)
            ->setCurrentSong($currentSong)
            ->setSongHistory($songHistory)
            ->setCache($cache);
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

    /**
     * @param array $nowPlayingData
     *
     * @return NowPlayingDto
     */
    public static function fromArray(array $nowPlayingData): self
    {
        $songHistory = [];
        foreach ($nowPlayingData['song_history'] as $songHistoryData) {
            $songHistory[] = SongHistoryDto::fromArray($songHistoryData);
        }

        return new NowPlayingDto(
            StationDto::fromArray($nowPlayingData['station']),
            ListenersDto::fromArray($nowPlayingData['listeners']),
            LiveDto::fromArray($nowPlayingData['live']),
            CurrentSongDto::fromArray($nowPlayingData['now_playing']),
            $songHistory,
            $nowPlayingData['cache']
        );
    }
}

<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class CurrentSongDto
{
    /**
     * @var int
     */
    protected $elapsed;

    /**
     * @var int
     */
    protected $remaining;

    /**
     * @var int
     */
    protected $songHistoryId;

    /**
     * @var int
     */
    protected $playedAt;

    /**
     * @var int
     */
    protected $duration;

    /**
     * @var string
     */
    protected $playlist;

    /**
     * @var bool
     */
    protected $isRequest;

    /**
     * @var SongDto
     */
    protected $song;

    /**
     * @param int $elapsed
     * @param int $remaining
     * @param int $songHistoryId
     * @param int $playedAt
     * @param int $duration
     * @param string $playlist
     * @param bool $isRequest
     * @param SongDto $song
     */
    public function __construct(
        int $elapsed,
        int $remaining,
        int $songHistoryId,
        int $playedAt,
        int $duration,
        string $playlist,
        bool $isRequest,
        SongDto $song
    ) {
        $this->setElapsed($elapsed)
            ->setRemaining($remaining)
            ->setSongHistoryId($songHistoryId)
            ->setPlayedAt($playedAt)
            ->setDuration($duration)
            ->setPlaylist($playlist)
            ->setIsRequest($isRequest)
            ->setSong($song);
    }

    /**
     * @return int
     */
    public function getElapsed(): int
    {
        return $this->elapsed;
    }

    /**
     * @param int $elapsed
     *
     * @return CurrentSongDto
     */
    public function setElapsed(int $elapsed): CurrentSongDto
    {
        $this->elapsed = $elapsed;

        return $this;
    }

    /**
     * @return int
     */
    public function getRemaining(): int
    {
        return $this->remaining;
    }

    /**
     * @param int $remaining
     *
     * @return CurrentSongDto
     */
    public function setRemaining(int $remaining): CurrentSongDto
    {
        $this->remaining = $remaining;

        return $this;
    }

    /**
     * @return int
     */
    public function getSongHistoryId(): int
    {
        return $this->songHistoryId;
    }

    /**
     * @param int $songHistoryId
     *
     * @return CurrentSongDto
     */
    public function setSongHistoryId(int $songHistoryId): CurrentSongDto
    {
        $this->songHistoryId = $songHistoryId;

        return $this;
    }

    /**
     * @return int
     */
    public function getPlayedAt(): int
    {
        return $this->playedAt;
    }

    /**
     * @param int $playedAt
     *
     * @return CurrentSongDto
     */
    public function setPlayedAt(int $playedAt): CurrentSongDto
    {
        $this->playedAt = $playedAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     *
     * @return CurrentSongDto
     */
    public function setDuration(int $duration): CurrentSongDto
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlaylist(): string
    {
        return $this->playlist;
    }

    /**
     * @param string $playlist
     *
     * @return CurrentSongDto
     */
    public function setPlaylist(string $playlist): CurrentSongDto
    {
        $this->playlist = $playlist;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsRequest(): bool
    {
        return $this->isRequest;
    }

    /**
     * @param bool $isRequest
     *
     * @return CurrentSongDto
     */
    public function setIsRequest(bool $isRequest): CurrentSongDto
    {
        $this->isRequest = $isRequest;

        return $this;
    }

    /**
     * @return SongDto
     */
    public function getSong(): SongDto
    {
        return $this->song;
    }

    /**
     * @param SongDto $song
     *
     * @return CurrentSongDto
     */
    public function setSong(SongDto $song): CurrentSongDto
    {
        $this->song = $song;

        return $this;
    }

    /**
     * @param array $currentSongData
     * @return CurrentSongDto
     */
    public static function fromArray(array $currentSongData): self
    {
        return new self(
            $currentSongData['elapsed'],
            $currentSongData['remaining'],
            $currentSongData['sh_id'],
            $currentSongData['played_at'],
            $currentSongData['duration'],
            $currentSongData['playlist'],
            $currentSongData['is_request'],
            SongDto::fromArray($currentSongData['song'])
        );
    }
}

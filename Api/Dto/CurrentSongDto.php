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
     * @param array $currentSongData
     */
    public function __construct(array $currentSongData = [])
    {
        $this->setElapsed($currentSongData['elapsed'])
            ->setRemaining($currentSongData['remaining'])
            ->setSongHistoryId($currentSongData['sh_id'])
            ->setPlayedAt($currentSongData['played_at'])
            ->setDuration($currentSongData['duration'])
            ->setPlaylist($currentSongData['playlist'])
            ->setIsRequest($currentSongData['is_request'])
            ->setSong(new SongDto($currentSongData['song']));
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
     * @return self
     */
    public function setElapsed(int $elapsed): self
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
     * @return self
     */
    public function setRemaining(int $remaining): self
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
     * @return self
     */
    public function setSongHistoryId(int $songHistoryId): self
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
     * @return self
     */
    public function setPlayedAt(int $playedAt): self
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
     * @return self
     */
    public function setDuration(int $duration): self
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
     * @return self
     */
    public function setPlaylist(string $playlist): self
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
     * @return self
     */
    public function setIsRequest(bool $isRequest): self
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
     * @return self
     */
    public function setSong(SongDto $song): self
    {
        $this->song = $song;

        return $this;
    }
}

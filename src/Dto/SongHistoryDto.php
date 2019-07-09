<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class SongHistoryDto
{
    /**
     * @var int
     */
    protected $id;

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
     * @param int $id
     * @param int $playedAt
     * @param int $duration
     * @param string $playlist
     * @param bool $isRequest
     * @param SongDto $song
     */
    public function __construct(
        int $id,
        int $playedAt,
        int $duration,
        string $playlist,
        bool $isRequest,
        SongDto $song
    ) {
        $this->setId($id)
            ->setPlayedAt($playedAt)
            ->setDuration($duration)
            ->setPlaylist($playlist)
            ->setIsRequest($isRequest)
            ->setSong($song);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return SongHistoryDto
     */
    public function setId(int $id): SongHistoryDto
    {
        $this->id = $id;

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
     * @return SongHistoryDto
     */
    public function setPlayedAt(int $playedAt): SongHistoryDto
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
     * @return SongHistoryDto
     */
    public function setDuration(int $duration): SongHistoryDto
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
     * @return SongHistoryDto
     */
    public function setPlaylist(string $playlist): SongHistoryDto
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
     * @return SongHistoryDto
     */
    public function setIsRequest(bool $isRequest): SongHistoryDto
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
     * @return SongHistoryDto
     */
    public function setSong(SongDto $song): SongHistoryDto
    {
        $this->song = $song;

        return $this;
    }

    /**
     * @param array $songHistoryData
     *
     * @return SongHistoryDto
     */
    public static function fromArray(array $songHistoryData): self
    {
        return new self(
            $songHistoryData['sh_id'],
            $songHistoryData['played_at'],
            $songHistoryData['duration'],
            $songHistoryData['playlist'],
            $songHistoryData['is_request'],
            SongDto::fromArray($songHistoryData['song'])
        );
    }
}

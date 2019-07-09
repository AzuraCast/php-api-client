<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class RequestableSongDto
{
    /**
     * @var string
     */
    protected $requestableSongId;

    /**
     * @var string
     */
    protected $requestUrl;

    /**
     * @var SongDto
     */
    protected $song;

    /**
     * @param string $requestableSongId
     * @param string $requestUrl
     * @param SongDto $song
     */
    public function __construct(string $requestableSongId, string $requestUrl, SongDto $song)
    {
        $this->setRequestableSongId($requestableSongId)
            ->setRequestUrl($requestUrl)
            ->setSong($song);
    }

    /**
     * @return string
     */
    public function getRequestableSongId(): string
    {
        return $this->requestableSongId;
    }

    /**
     * @param string $requestableSongId
     *
     * @return RequestableSongDto
     */
    public function setRequestableSongId(string $requestableSongId): RequestableSongDto
    {
        $this->requestableSongId = $requestableSongId;

        return $this;
    }

    /**
     * @return string
     */
    public function getRequestUrl(): string
    {
        return $this->requestUrl;
    }

    /**
     * @param string $requestUrl
     *
     * @return RequestableSongDto
     */
    public function setRequestUrl(string $requestUrl): RequestableSongDto
    {
        $this->requestUrl = $requestUrl;

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
     * @return RequestableSongDto
     */
    public function setSong(SongDto $song): RequestableSongDto
    {
        $this->song = $song;

        return $this;
    }

    /**
     * @param array $requestableSongData
     *
     * @return RequestableSongDto
     */
    public static function fromArray(array $requestableSongData): self
    {
        return new self(
            $requestableSongData['request_id'],
            $requestableSongData['request_url'],
            SongDto::fromArray($requestableSongData['song'])
        );
    }
}

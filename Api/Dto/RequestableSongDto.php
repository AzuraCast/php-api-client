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
     * @param array $requestableSongData
     */
    public function __construct(array $requestableSongData)
    {
        $this->setRequestableSongId($requestableSongData['request_id'])
            ->setRequestUrl($requestableSongData['request_url'])
            ->setSong(new SongDto($requestableSongData['song']));
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
}

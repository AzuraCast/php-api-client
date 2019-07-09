<?php

declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class RemoteDto
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var int
     */
    protected $bitrate;

    /**
     * @var string
     */
    protected $format;

    /**
     * @param array $remoteData
     */
    public function __construct(array $remoteData)
    {
        $this->setUrl($remoteData['url'])
            ->setBitrate($remoteData['bitrate'])
            ->setFormat($remoteData['format']);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return RemoteDto
     */
    public function setUrl(string $url): RemoteDto
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return int
     */
    public function getBitrate(): int
    {
        return $this->bitrate;
    }

    /**
     * @param int $bitrate
     *
     * @return RemoteDto
     */
    public function setBitrate(int $bitrate): RemoteDto
    {
        $this->bitrate = $bitrate;

        return $this;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $format
     *
     * @return RemoteDto
     */
    public function setFormat(string $format): RemoteDto
    {
        $this->format = $format;

        return $this;
    }
}

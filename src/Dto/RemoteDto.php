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
     * @var int|null
     */
    protected $bitrate;

    /**
     * @var string|null
     */
    protected $format;

    /**
     * @param string $url
     * @param int|null $bitrate
     * @param string|null $format
     */
    public function __construct(
        string $url,
        ?int $bitrate,
        ?string $format
    ) {
        $this->setUrl($url)
            ->setBitrate($bitrate)
            ->setFormat($format);
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
     * @return int|null
     */
    public function getBitrate(): ?int
    {
        return $this->bitrate;
    }

    /**
     * @param int|null $bitrate
     *
     * @return RemoteDto
     */
    public function setBitrate(?int $bitrate): RemoteDto
    {
        $this->bitrate = $bitrate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * @param string|null $format
     *
     * @return RemoteDto
     */
    public function setFormat(?string $format): RemoteDto
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @param mixed[] $remoteData
     *
     * @return RemoteDto
     */
    public static function fromArray(array $remoteData): self
    {
        return new self(
            $remoteData['url'],
            $remoteData['bitrate'],
            $remoteData['format']
        );
    }
}

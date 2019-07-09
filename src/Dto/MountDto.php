<?php

declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class MountDto
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $isDefault;

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
     * @param string $name
     * @param bool $isDefault
     * @param string $url
     * @param int $bitrate
     * @param string $format
     */
    public function __construct(
        string $name,
        bool $isDefault,
        string $url,
        int $bitrate,
        string $format
    ) {
        $this->setName($name)
            ->setIsDefault($isDefault)
            ->setUrl($url)
            ->setBitrate($bitrate)
            ->setFormat($format);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return MountDto
     */
    public function setName(string $name): MountDto
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }

    /**
     * @param bool $isDefault
     *
     * @return MountDto
     */
    public function setIsDefault(bool $isDefault): MountDto
    {
        $this->isDefault = $isDefault;

        return $this;
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
     * @return MountDto
     */
    public function setUrl(string $url): MountDto
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
     * @return MountDto
     */
    public function setBitrate(int $bitrate): MountDto
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
     * @return MountDto
     */
    public function setFormat(string $format): MountDto
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @param array $mountData
     *
     * @return MountDto
     */
    public static function fromArray(array $mountData): self
    {
        return new self(
            $mountData['name'],
            $mountData['is_default'],
            $mountData['url'],
            $mountData['bitrate'],
            $mountData['format']
        );
    }
}

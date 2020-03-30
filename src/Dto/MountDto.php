<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class MountDto implements \JsonSerializable
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $path;

    /**
     * @var bool
     */
    protected $isDefault;

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
     * @param string $name
     * @param string|null $path
     * @param bool $isDefault
     * @param string $url
     * @param int|null $bitrate
     * @param string|null $format
     */
    public function __construct(string $name, ?string $path, bool $isDefault, string $url, ?int $bitrate, ?string $format)
    {
        $this->name = $name;
        $this->path = $path;
        $this->isDefault = $isDefault;
        $this->url = $url;
        $this->bitrate = $bitrate;
        $this->format = $format;
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
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @param string|null $path
     *
     * @return MountDto
     */
    public function setPath(?string $path): MountDto
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
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
     * @return int|null
     */
    public function getBitrate(): ?int
    {
        return $this->bitrate;
    }

    /**
     * @param int|null $bitrate
     *
     * @return MountDto
     */
    public function setBitrate(?int $bitrate): MountDto
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
     * @return MountDto
     */
    public function setFormat(?string $format): MountDto
    {
        $this->format = $format;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'name'       => $this->name,
            'path'       => $this->path,
            'is_default' => $this->isDefault,
            'url'        => $this->url,
            'bitrate'    => $this->bitrate,
            'format'     => $this->format,
        ];
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
            $mountData['path'] ?? null,
            $mountData['is_default'],
            $mountData['url'],
            $mountData['bitrate'],
            $mountData['format']
        );
    }
}

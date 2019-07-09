<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class StationDto
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $shortcode;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $frontend;

    /**
     * @var string
     */
    protected $backend;

    /**
     * @var string
     */
    protected $listenUrl;

    /**
     * @var bool
     */
    protected $isPublic;

    /**
     * @var MountDto[]
     */
    protected $mounts;

    /**
     * @var RemoteDto[]
     */
    protected $remotes;

    /**
     * @param int $id
     * @param string $name
     * @param string $shortcode
     * @param string $description
     * @param string $frontend
     * @param string $backend
     * @param string $listenUrl
     * @param bool $isPublic
     * @param MountDto[] $mounts
     * @param RemoteDto[] $remotes
     */
    public function __construct(
        int $id,
        string $name,
        string $shortcode,
        string $description,
        string $frontend,
        string $backend,
        string $listenUrl,
        bool $isPublic,
        array $mounts,
        array $remotes
    ) {
        $this->setId($id)
            ->setName($name)
            ->setShortcode($shortcode)
            ->setDescription($description)
            ->setFrontend($frontend)
            ->setBackend($backend)
            ->setListenUrl($listenUrl)
            ->setIsPublic($isPublic)
            ->setMounts($mounts)
            ->setRemotes($remotes);
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
     * @return StationDto
     */
    public function setId(int $id): StationDto
    {
        $this->id = $id;

        return $this;
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
     * @return StationDto
     */
    public function setName(string $name): StationDto
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getShortcode(): string
    {
        return $this->shortcode;
    }

    /**
     * @param string $shortcode
     *
     * @return StationDto
     */
    public function setShortcode(string $shortcode): StationDto
    {
        $this->shortcode = $shortcode;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return StationDto
     */
    public function setDescription(string $description): StationDto
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getFrontend(): string
    {
        return $this->frontend;
    }

    /**
     * @param string $frontend
     *
     * @return StationDto
     */
    public function setFrontend(string $frontend): StationDto
    {
        $this->frontend = $frontend;

        return $this;
    }

    /**
     * @return string
     */
    public function getBackend(): string
    {
        return $this->backend;
    }

    /**
     * @param string $backend
     *
     * @return StationDto
     */
    public function setBackend(string $backend): StationDto
    {
        $this->backend = $backend;

        return $this;
    }

    /**
     * @return string
     */
    public function getListenUrl(): string
    {
        return $this->listenUrl;
    }

    /**
     * @param string $listenUrl
     *
     * @return StationDto
     */
    public function setListenUrl(string $listenUrl): StationDto
    {
        $this->listenUrl = $listenUrl;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsPublic(): bool
    {
        return $this->isPublic;
    }

    /**
     * @param bool $isPublic
     *
     * @return StationDto
     */
    public function setIsPublic(bool $isPublic): StationDto
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    /**
     * @return MountDto[]
     */
    public function getMounts(): array
    {
        return $this->mounts;
    }

    /**
     * @param MountDto[] $mounts
     *
     * @return StationDto
     */
    public function setMounts(array $mounts): StationDto
    {
        $this->mounts = $mounts;

        return $this;
    }

    /**
     * @return RemoteDto[]
     */
    public function getRemotes(): array
    {
        return $this->remotes;
    }

    /**
     * @param RemoteDto[] $remotes
     *
     * @return StationDto
     */
    public function setRemotes(array $remotes): StationDto
    {
        $this->remotes = $remotes;

        return $this;
    }

    /**
     * @param array $stationData
     *
     * @return StationDto
     */
    public static function fromArray(array $stationData): self
    {
        $mounts = [];
        foreach ($stationData['mounts'] as $mountData) {
            $mounts[] = MountDto::fromArray($mountData);
        }

        $remotes = [];
        foreach ($stationData['remotes'] as $remoteData) {
            $remotes[] = RemoteDto::fromArray($remoteData);
        }

        return new self(
            $stationData['id'],
            $stationData['name'],
            $stationData['shortcode'],
            $stationData['description'],
            $stationData['frontend'],
            $stationData['backend'],
            $stationData['listen_url'],
            $stationData['is_public'],
            $mounts,
            $remotes
        );
    }
}

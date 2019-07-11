<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class AdminRelaysDto
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
     * @var string|null
     */
    protected $description;

    /**
     * @var string|null
     */
    protected $url;

    /**
     * @var string|null
     */
    protected $genre;

    /**
     * @var string
     */
    protected $shortcode;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var int|null
     */
    protected $port;

    /**
     * @var string|null
     */
    protected $password;

    /**
     * @var MountDto[]
     */
    protected $mounts;

    /**
     * AdminRelaysDto constructor.
     * @param int $id
     * @param string $name
     * @param string|null $description
     * @param string|null $url
     * @param string|null $genre
     * @param string $shortcode
     * @param string $type
     * @param int|null $port
     * @param string|null $password
     * @param MountDto[] $mounts
     */
    public function __construct(
        int $id,
        string $name,
        ?string $description,
        ?string $url,
        ?string $genre,
        string $shortcode,
        string $type,
        ?int $port,
        ?string $password,
        array $mounts
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->url = $url;
        $this->genre = $genre;
        $this->shortcode = $shortcode;
        $this->type = $type;
        $this->port = $port;
        $this->password = $password;
        $this->mounts = $mounts;
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
     * @return AdminRelaysDto
     */
    public function setId(int $id): AdminRelaysDto
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
     * @return AdminRelaysDto
     */
    public function setName(string $name): AdminRelaysDto
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return AdminRelaysDto
     */
    public function setDescription(?string $description): AdminRelaysDto
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return AdminRelaysDto
     */
    public function setUrl(?string $url): AdminRelaysDto
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGenre(): ?string
    {
        return $this->genre;
    }

    /**
     * @param string|null $genre
     * @return AdminRelaysDto
     */
    public function setGenre(?string $genre): AdminRelaysDto
    {
        $this->genre = $genre;
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
     * @return AdminRelaysDto
     */
    public function setShortcode(string $shortcode): AdminRelaysDto
    {
        $this->shortcode = $shortcode;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return AdminRelaysDto
     */
    public function setType(string $type): AdminRelaysDto
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPort(): ?int
    {
        return $this->port;
    }

    /**
     * @param int|null $port
     * @return AdminRelaysDto
     */
    public function setPort(?int $port): AdminRelaysDto
    {
        $this->port = $port;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     * @return AdminRelaysDto
     */
    public function setPassword(?string $password): AdminRelaysDto
    {
        $this->password = $password;
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
     * @return AdminRelaysDto
     */
    public function setMounts(array $mounts): AdminRelaysDto
    {
        $this->mounts = $mounts;
        return $this;
    }

    /**
     * @param array $stationData
     *
     * @return AdminRelaysDto
     */
    public static function fromArray(array $stationData): self
    {
        $mounts = [];
        foreach ($stationData['mounts'] as $mountData) {
            $mounts[] = MountDto::fromArray($mountData);
        }

        return new self(
            (int)$stationData['id'],
            $stationData['name'],
            $stationData['description'],
            $stationData['url'],
            $stationData['genre'],
            $stationData['shortcode'],
            $stationData['type'],
            (int)$stationData['port'],
            $stationData['password'],
            $mounts
        );
    }
}

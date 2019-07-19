<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class AdminRelayDto implements \JsonSerializable
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
    protected $relayPassword;

    /**
     * @var string|null
     */
    protected $adminPassword;

    /**
     * @var MountDto[]
     */
    protected $mounts;

    /**
     * @param int $id
     * @param string $name
     * @param string|null $description
     * @param string|null $url
     * @param string|null $genre
     * @param string $shortcode
     * @param string $type
     * @param int|null $port
     * @param string|null $relayPassword
     * @param string|null $adminPassword
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
        ?string $relayPassword,
        ?string $adminPassword,
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
        $this->relayPassword = $relayPassword;
        $this->adminPassword = $adminPassword;
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
     *
     * @return AdminRelayDto
     */
    public function setId(int $id): AdminRelayDto
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
     * @return AdminRelayDto
     */
    public function setName(string $name): AdminRelayDto
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
     *
     * @return AdminRelayDto
     */
    public function setDescription(?string $description): AdminRelayDto
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
     *
     * @return AdminRelayDto
     */
    public function setUrl(?string $url): AdminRelayDto
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
     *
     * @return AdminRelayDto
     */
    public function setGenre(?string $genre): AdminRelayDto
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
     *
     * @return AdminRelayDto
     */
    public function setShortcode(string $shortcode): AdminRelayDto
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
     *
     * @return AdminRelayDto
     */
    public function setType(string $type): AdminRelayDto
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
     *
     * @return AdminRelayDto
     */
    public function setPort(?int $port): AdminRelayDto
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRelayPassword(): ?string
    {
        return $this->relayPassword;
    }

    /**
     * @param string|null $relayPassword
     *
     * @return AdminRelayDto
     */
    public function setRelayPassword(?string $relayPassword): AdminRelayDto
    {
        $this->relayPassword = $relayPassword;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAdminPassword(): ?string
    {
        return $this->adminPassword;
    }

    /**
     * @param string|null $adminPassword
     *
     * @return AdminRelayDto
     */
    public function setAdminPassword(?string $adminPassword): AdminRelayDto
    {
        $this->adminPassword = $adminPassword;

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
     * @return AdminRelayDto
     */
    public function setMounts(array $mounts): AdminRelayDto
    {
        $this->mounts = $mounts;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'id'        => $this->id,
            'name'      => $this->description,
            'url'       => $this->url,
            'genre'     => $this->genre,
            'shortcode' => $this->shortcode,
            'type'      => $this->type,
            'port'      => (int)$this->port,
            'relay_pw'  => $this->relayPassword,
            'admin_pw'  => $this->adminPassword,
            'mounts'    => $this->mounts,
        ];
    }

    /**
     * @param array $stationData
     *
     * @return AdminRelayDto
     */
    public static function fromArray(array $stationData): self
    {
        $mounts = [];
        foreach ($stationData['mounts'] as $mountData) {
            $mounts[] = MountDto::fromArray($mountData);
        }

        if (!empty($stationData['password'])) {
            $relayPw = $adminPw = $stationData['password'];
        } else {
            $relayPw = $stationData['relay_pw'];
            $adminPw = $stationData['admin_pw'];
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
            $relayPw,
            $adminPw,
            $mounts
        );
    }
}

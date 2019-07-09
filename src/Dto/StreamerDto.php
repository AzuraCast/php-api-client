<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

use JsonSerializable;

class StreamerDto implements JsonSerializable
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $displayName;

    /**
     * @var string
     */
    protected $comments;

    /**
     * @var bool
     */
    protected $isActive;

    /**
     * @var LinksDto
     */
    protected $links;

    /**
     * @param int $id
     * @param string $username
     * @param string $password
     * @param string $displayName
     * @param string $comments
     * @param bool $isActive
     * @param LinksDto $links
     */
    public function __construct(
        int $id,
        string $username,
        string $password,
        string $displayName,
        string $comments,
        bool $isActive,
        LinksDto $links
    ) {
        $this->setId($id)
            ->setUsername($username)
            ->setPassword($password)
            ->setDisplayName($displayName)
            ->setComments($comments)
            ->setIsActive($isActive)
            ->setLinks($links);
    }

    /**
     * @return int
     */
    function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return StreamerDto
     */
    function setId(int $id): StreamerDto
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return StreamerDto
     */
    function setUsername(string $username): StreamerDto
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return StreamerDto
     */
    function setPassword(string $password): StreamerDto
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * @param string $displayName
     *
     * @return StreamerDto
     */
    function setDisplayName(string $displayName): StreamerDto
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * @return string
     */
    function getComments(): string
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     *
     * @return StreamerDto
     */
    function setComments(string $comments): StreamerDto
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * @return bool
     */
    function getIsActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     *
     * @return StreamerDto
     */
    function setIsActive(bool $isActive): StreamerDto
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return LinksDto
     */
    function getLinks(): LinksDto
    {
        return $this->links;
    }

    /**
     * @param LinksDto $links
     *
     * @return StreamerDto
     */
    function setLinks(LinksDto $links): StreamerDto
    {
        $this->links = $links;

        return $this;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'streamer_username' => $this->getUsername(),
            'streamer_password' => $this->getPassword(),
            'display_name' => $this->getDisplayName(),
            'comments' => $this->getComments(),
            'is_active' => $this->getIsActive(),
            'links' => $this->getLinks()
        ];
    }

    /**
     * @param array $streamerData
     *
     * @return StreamerDto
     */
    public static function fromArray(array $streamerData): self
    {
        return new self(
            $streamerData['id'],
            $streamerData['streamer_username'],
            $streamerData['streamer_password'],
            $streamerData['display_name'],
            $streamerData['comments'],
            $streamerData['is_active'],
            LinksDto::fromArray($streamerData['links'])
        );
    }
}

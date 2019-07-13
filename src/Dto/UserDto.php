<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

use JsonSerializable;

class UserDto implements JsonSerializable
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $authPassword;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $locale;

    /**
     * @var string
     */
    protected $theme;

    /**
     * @var int
     */
    protected $createdAt;

    /**
     * @var int
     */
    protected $updatedAt;

    /**
     * @var RoleDto[]
     */
    protected $roles;

    /**
     * @var ApiKeyDto[]
     */
    protected $apiKeys;

    /**
     * @var LinksDto
     */
    protected $links;

    /**
     * @param int $id
     * @param string $email
     * @param string $name
     * @param string $locale
     * @param string $theme
     * @param int $createdAt
     * @param int $updatedAt
     * @param array $roles
     * @param array $apiKeys
     * @param LinksDto $links
     */
    public function __construct(
        int $id,
        string $email,
        string $name,
        string $locale,
        string $theme,
        int $createdAt,
        int $updatedAt,
        array $roles,
        array $apiKeys,
        LinksDto $links
    ) {
        $this->setId($id)
            ->setEmail($email)
            ->setAuthPassword('')
            ->setName($name)
            ->setLocale($locale)
            ->setTheme($theme)
            ->setCreatedAt($createdAt)
            ->setUpdatedAt($updatedAt)
            ->setRoles($roles)
            ->setApiKeys($apiKeys)
            ->setLinks($links);
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
     * @return UserDto
     */
    public function setId(int $id): UserDto
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return UserDto
     */
    public function setEmail(string $email): UserDto
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthPassword(): string
    {
        return $this->authPassword;
    }

    /**
     * @param string $authPassword
     *
     * @return UserDto
     */
    public function setAuthPassword(string $authPassword): UserDto
    {
        $this->authPassword = $authPassword;

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
     * @return UserDto
     */
    public function setName(string $name): UserDto
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     *
     * @return UserDto
     */
    public function setLocale(string $locale): UserDto
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return string
     */
    public function getTheme(): string
    {
        return $this->theme;
    }

    /**
     * @param string $theme
     *
     * @return UserDto
     */
    public function setTheme(string $theme): UserDto
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     *
     * @return UserDto
     */
    public function setCreatedAt(int $createdAt): UserDto
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    /**
     * @param int $updatedAt
     *
     * @return UserDto
     */
    public function setUpdatedAt(int $updatedAt): UserDto
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return RoleDto[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param RoleDto[] $roles
     *
     * @return UserDto
     */
    public function setRoles(array $roles): UserDto
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @param RoleDto $role
     *
     * @return UserDto
     */
    public function addRole(RoleDto $role): UserDto
    {
        $this->roles[] = $role;

        return $this;
    }

    /**
     * @return ApiKeyDto[]
     */
    public function getApiKeys(): array
    {
        return $this->apiKeys;
    }

    /**
     * @param ApiKeyDto[] $apiKeys
     *
     * @return UserDto
     */
    public function setApiKeys(array $apiKeys): UserDto
    {
        $this->apiKeys = $apiKeys;

        return $this;
    }

    /**
     * @param ApiKeyDto $apiKey
     *
     * @return UserDto
     */
    public function addApiKey(ApiKeyDto $apiKey): UserDto
    {
        $this->apiKeys[] = $$apiKey;

        return $this;
    }

    /**
     * @return LinksDto
     */
    public function getLinks(): LinksDto
    {
        return $this->links;
    }

    /**
     * @param LinksDto $links
     *
     * @return UserDto
     */
    public function setLinks(LinksDto $links): UserDto
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
            'email' => $this->getEmail(),
            'auth_password' => $this->getAuthPassword(),
            'name' => $this->getName(),
            'locale' => $this->getLocale(),
            'theme' => $this->getTheme(),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
            'roles' => $this->getRoles(),
            'api_keys' => $this->getApiKeys(),
            'links' => $this->getLinks()
        ];
    }

    /**
     * @param array $userData
     *
     * @return UserDto
     */
    public static function fromArray(array $userData): self
    {
        $roles = [];
        foreach ($userData['roles'] as $roleData) {
            $roles[] = RoleDto::fromArray($roleData);
        }

        $apiKeys = [];
        foreach ($userData['api_keys'] as $apiKeyData) {
            $apiKeys[] = ApiKeyDto::fromArray($apiKeyData);
        }

        return new self(
            $userData['id'],
            $userData['email'],
            $userData['name'] ?? '',
            $userData['locale'] ?? '',
            $userData['theme'] ?? '',
            $userData['created_at'],
            $userData['updated_at'],
            $roles,
            $apiKeys,
            LinksDto::fromArray($userData['links'])
        );
    }
}

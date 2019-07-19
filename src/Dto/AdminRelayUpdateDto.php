<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class AdminRelayUpdateDto implements \JsonSerializable
{
    /**
     * @var string|null
     */
    protected $baseUrl;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var bool|null
     */
    protected $isVisibleOnPublicPages;

    /**
     * @var array|null
     */
    protected $nowplaying;

    /**
     * @param string|null $baseUrl
     * @param string|null $name
     * @param bool|null $isVisibleOnPublicPages
     * @param array|null $nowplaying
     */
    public function __construct(?string $baseUrl, ?string $name, ?bool $isVisibleOnPublicPages, ?array $nowplaying)
    {
        $this->baseUrl = $baseUrl;
        $this->name = $name;
        $this->isVisibleOnPublicPages = $isVisibleOnPublicPages;
        $this->nowplaying = $nowplaying;
    }

    /**
     * @return string|null
     */
    public function getBaseUrl(): ?string
    {
        return $this->baseUrl;
    }

    /**
     * @param string|null $baseUrl
     *
     * @return AdminRelayUpdateDto
     */
    public function setBaseUrl(?string $baseUrl): AdminRelayUpdateDto
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return AdminRelayUpdateDto
     */
    public function setName(?string $name): AdminRelayUpdateDto
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function isVisibleOnPublicPages(): ?bool
    {
        return $this->isVisibleOnPublicPages;
    }

    /**
     * @param bool|null $isVisibleOnPublicPages
     *
     * @return AdminRelayUpdateDto
     */
    public function setIsVisibleOnPublicPages(?bool $isVisibleOnPublicPages): AdminRelayUpdateDto
    {
        $this->isVisibleOnPublicPages = $isVisibleOnPublicPages;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getNowplaying(): ?array
    {
        return $this->nowplaying;
    }

    /**
     * @param array|null $nowplaying
     *
     * @return AdminRelayUpdateDto
     */
    public function setNowplaying(?array $nowplaying): AdminRelayUpdateDto
    {
        $this->nowplaying = $nowplaying;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'base_url' => $this->baseUrl,
            'name' => $this->name,
            'is_visible_on_public_pages' => $this->isVisibleOnPublicPages,
            'nowplaying' => $this->nowplaying,
        ];
    }
}

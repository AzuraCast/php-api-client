<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class DeviceDto
{
    /**
     * @var string|null
     */
    protected $client;

    /**
     * @var bool
     */
    protected $isBrowser;

    /**
     * @var bool
     */
    protected $isMobile;

    /**
     * @var bool
     */
    protected $isBot;

    /**
     * @var string|null
     */
    protected $browserFamily;

    /**
     * @var string|null
     */
    protected $osFamily;

    /**
     * @param string|null $client
     * @param bool $isBrowser
     * @param bool $isMobile
     * @param bool $isBot
     * @param string|null $browserFamily
     * @param string|null $osFamily
     */
    public function __construct(
        ?string $client,
        bool $isBrowser,
        bool $isMobile,
        bool $isBot,
        ?string $browserFamily,
        ?string $osFamily
    ) {
        $this->setClient($client)
            ->setIsBrowser($isBrowser)
            ->setIsMobile($isMobile)
            ->setIsBot($isBot)
            ->setBrowserFamily($browserFamily)
            ->setOsFamily($osFamily);
    }

    /**
     * @return string|null
     */
    public function getClient(): ?string
    {
        return $this->client;
    }

    /**
     * @param string|null $client
     *
     * @return DeviceDto
     */
    public function setClient(?string $client): DeviceDto
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsBrowser(): bool
    {
        return $this->isBrowser;
    }

    /**
     * @param bool $isBrowser
     *
     * @return DeviceDto
     */
    public function setIsBrowser(bool $isBrowser): DeviceDto
    {
        $this->isBrowser = $isBrowser;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsMobile(): bool
    {
        return $this->isMobile;
    }

    /**
     * @param bool $isMobile
     *
     * @return DeviceDto
     */
    public function setIsMobile(bool $isMobile): DeviceDto
    {
        $this->isMobile = $isMobile;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsBot(): bool
    {
        return $this->isBot;
    }

    /**
     * @param bool $isBot
     *
     * @return DeviceDto
     */
    public function setIsBot(bool $isBot): DeviceDto
    {
        $this->isBot = $isBot;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBrowserFamily(): ?string
    {
        return $this->browserFamily;
    }

    /**
     * @param string|null $browserFamily
     *
     * @return DeviceDto
     */
    public function setBrowserFamily(?string $browserFamily): DeviceDto
    {
        $this->browserFamily = $browserFamily;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOsFamily(): ?string
    {
        return $this->osFamily;
    }

    /**
     * @param string|null $osFamily
     *
     * @return DeviceDto
     */
    public function setOsFamily(?string $osFamily): DeviceDto
    {
        $this->osFamily = $osFamily;

        return $this;
    }

    /**
     * @param mixed[] $deviceData
     *
     * @return DeviceDto
     */
    public static function fromArray(array $deviceData): self
    {
        return new self(
            $deviceData['client'] ?? null,
            $deviceData['is_browser'],
            $deviceData['is_mobile'],
            $deviceData['is_bot'],
            $deviceData['browser_family'] ?? null,
            $deviceData['os_family'] ?? null
        );
    }
}

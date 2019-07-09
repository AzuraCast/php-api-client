<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class ListenerDto
{
    /**
     * @var string
     */
    protected $ipAddress;

    /**
     * @var string
     */
    protected $userAgent;

    /**
     * @var bool
     */
    protected $isMobile;

    /**
     * @var int
     */
    protected $connectedAt;

    /**
     * @var int
     */
    protected $connectionDuration;

    /**
     * @var LocationDto
     */
    protected $location;

    /**
     * @param string $ipAddress
     * @param string $userAgent
     * @param bool $isMobile
     * @param int $connectedAt
     * @param int $connectionDuration
     * @param LocationDto $location
     */
    public function __construct(
        string $ipAddress,
        string $userAgent,
        bool $isMobile,
        int $connectedAt,
        int $connectionDuration,
        LocationDto $location
    ) {
        $this->setIpAddress($ipAddress)
            ->setUserAgent($userAgent)
            ->setIsMobile($isMobile)
            ->setConnectedAt($connectedAt)
            ->setConnectionDuration($connectionDuration)
            ->setLocation($location);
    }

    /**
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     *
     * @return ListenerDto
     */
    public function setIpAddress(string $ipAddress): ListenerDto
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * @param string $userAgent
     *
     * @return ListenerDto
     */
    public function setUserAgent(string $userAgent): ListenerDto
    {
        $this->userAgent = $userAgent;

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
     * @return ListenerDto
     */
    public function setIsMobile(bool $isMobile): ListenerDto
    {
        $this->isMobile = $isMobile;

        return $this;
    }

    /**
     * @return int
     */
    public function getConnectedAt(): int
    {
        return $this->connectedAt;
    }

    /**
     * @param int $connectedAt
     *
     * @return ListenerDto
     */
    public function setConnectedAt(int $connectedAt): ListenerDto
    {
        $this->connectedAt = $connectedAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getConnectionDuration(): int
    {
        return $this->connectionDuration;
    }

    /**
     * @param int $connectionDuration
     *
     * @return ListenerDto
     */
    public function setConnectionDuration(int $connectionDuration): ListenerDto
    {
        $this->connectionDuration = $connectionDuration;

        return $this;
    }

    /**
     * @return LocationDto
     */
    public function getLocation(): LocationDto
    {
        return $this->location;
    }

    /**
     * @param LocationDto $location
     *
     * @return ListenerDto
     */
    public function setLocation(LocationDto $location): ListenerDto
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @param array $listenerData
     *
     * @return ListenerDto
     */
    public static function fromArray(array $listenerData): self
    {
        return new self(
            $listenerData['ip'],
            $listenerData['user_agent'],
            $listenerData['is_mobile'],
            $listenerData['connected_on'],
            $listenerData['connected_time'],
            LocationDto::fromArray($listenerData['location'])
        );
    }
}

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
     * @param array $listenerData
     */
    public function __construct(array $listenerData)
    {
        $this->setIpAddress($listenerData['ip'])
            ->setUserAgent($listenerData['user_agent'])
            ->setIsMobile($listenerData['is_mobile'])
            ->setConnectedAt($listenerData['connected_on'])
            ->setConnectionDuration($listenerData['connected_time'])
            ->setLocation(new LocationDto($listenerData['location']));
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
}

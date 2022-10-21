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
     * @var string
     */
    protected $hash;

    /**
     * @var int
     */
    protected $connectedAt;

    /**
     * @var int
     */
    protected $connectedUntil;

    /**
     * @var int
     */
    protected $connectionDuration;

    /**
     * @var DeviceDto
     */
    protected $device;

    /**
     * @var LocationDto
     */
    protected $location;

    /**
     * @param string $ipAddress
     * @param string $userAgent
     * @param int $connectedAt
     * @param int $connectedUntil
     * @param int $connectionDuration
     * @param DeviceDto $deviceDto
     * @param LocationDto $location
     */
    public function __construct(
        string $ipAddress,
        string $userAgent,
        string $hash,
        int $connectedAt,
        int $connectedUntil,
        int $connectionDuration,
        DeviceDto $deviceDto,
        LocationDto $location
    ) {
        $this->setIpAddress($ipAddress)
            ->setUserAgent($userAgent)
            ->setHash($hash)
            ->setConnectedAt($connectedAt)
            ->setConnectedUntil($connectedUntil)
            ->setConnectionDuration($connectionDuration)
            ->setDevice($deviceDto)
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
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     *
     * @return ListenerDto
     */
    public function setHash(string $hash): ListenerDto
    {
        $this->hash = $hash;

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
    public function getConnectedUntil(): int
    {
        return $this->connectedUntil;
    }

    /**
     * @param int $connectedUntil
     *
     * @return ListenerDto
     */
    public function setConnectedUntil(int $connectedUntil): ListenerDto
    {
        $this->connectedUntil = $connectedUntil;

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
     * @return DeviceDto
     */
    public function getDevice(): DeviceDto
    {
        return $this->device;
    }

    /**
     * @param DeviceDto $device
     *
     * @return ListenerDto
     */
    public function setDevice(DeviceDto $device): ListenerDto
    {
        $this->device = $device;

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
     * @param mixed[] $listenerData
     *
     * @return ListenerDto
     */
    public static function fromArray(array $listenerData): self
    {
        return new self(
            $listenerData['ip'],
            $listenerData['user_agent'],
            $listenerData['hash'],
            $listenerData['connected_on'],
            $listenerData['connected_until'],
            $listenerData['connected_time'],
            DeviceDto::fromArray($listenerData['device']),
            LocationDto::fromArray($listenerData['location'])
        );
    }
}

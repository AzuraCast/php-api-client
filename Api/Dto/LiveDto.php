<?php

declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class LiveDto
{
    /**
     * @var bool
     */
    protected $isLive;

    /**
     * @var string
     */
    protected $streamerName;

    /**
     * @param array $liveData
     */
    public function __construct(array $liveData)
    {
        $this->setIsLive($liveData['is_live'])
            ->setStreamerName($liveData['streamer_name']);
    }

    /**
     * @return bool
     */
    public function getIsLive(): bool
    {
        return $this->isLive;
    }

    /**
     * @param bool $isLive
     *
     * @return LiveDto
     */
    public function setIsLive(bool $isLive): LiveDto
    {
        $this->isLive = $isLive;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreamerName(): string
    {
        return $this->streamerName;
    }

    /**
     * @param string $streamerName
     *
     * @return LiveDto
     */
    public function setStreamerName(string $streamerName): LiveDto
    {
        $this->streamerName = $streamerName;

        return $this;
    }
}

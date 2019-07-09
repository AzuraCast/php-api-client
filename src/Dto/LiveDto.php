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
     * @param bool $isLive
     * @param string $streamerName
     */
    public function __construct(bool $isLive, string $streamerName)
    {
        $this->setIsLive($isLive)
            ->setStreamerName($streamerName);
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

    /**
     * @param array $liveData
     *
     * @return LiveDto
     */
    public static function fromArray(array $liveData): self
    {
        return new self(
            $liveData['is_live'],
            $liveData['streamer_name']
        );
    }
}

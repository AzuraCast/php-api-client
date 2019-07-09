<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class StationStatusDto
{
    /**
     * @var bool
     */
    protected $backendRunning;

    /**
     * @var bool
     */
    protected $frontendRunning;

    /**
     * @param bool $backendRunning
     * @param bool $frontendRunning
     */
    public function __construct(bool $backendRunning, bool $frontendRunning)
    {
        $this->setBackendRunning($backendRunning)
            ->setFrontendRunning($frontendRunning);
    }

    /**
     * @return bool
     */
    public function getBackendRunning(): bool
    {
        return $this->backendRunning;
    }

    /**
     * @param bool $backendRunning
     *
     * @return StationStatusDto
     */
    public function setBackendRunning(bool $backendRunning): StationStatusDto
    {
        $this->backendRunning = $backendRunning;

        return $this;
    }

    /**
     * @return bool
     */
    public function getFrontendRunning(): bool
    {
        return $this->frontendRunning;
    }

    /**
     * @param bool $frontendRunning
     *
     * @return StationStatusDto
     */
    public function setFrontendRunning(bool $frontendRunning): StationStatusDto
    {
        $this->frontendRunning = $frontendRunning;

        return $this;
    }

    /**
     * @param array $stationStatusData
     *
     * @return StationStatusDto
     */
    public static function fromArray(array $stationStatusData): self
    {
        return new self(
            $stationStatusData['backend_running'],
            $stationStatusData['frontend_running']
        );
    }
}

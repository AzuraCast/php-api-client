<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class ListenersDto
{
    /**
     * @var int
     */
    protected $current;

    /**
     * @var int
     */
    protected $unique;

    /**
     * @var int
     */
    protected $total;

    /**
     * @param array $listenersData
     */
    public function __construct(array $listenersData)
    {
        $this->setCurrent($listenersData['current'])
            ->setUnique($listenersData['unique'])
            ->setTotal($listenersData['total']);
    }

    /**
     * @return int
     */
    public function getCurrent(): int
    {
        return $this->current;
    }

    /**
     * @param int $current
     *
     * @return ListenersDto
     */
    public function setCurrent(int $current): ListenersDto
    {
        $this->current = $current;

        return $this;
    }

    /**
     * @return int
     */
    public function getUnique(): int
    {
        return $this->unique;
    }

    /**
     * @param int $unique
     *
     * @return ListenersDto
     */
    public function setUnique(int $unique): ListenersDto
    {
        $this->unique = $unique;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     *
     * @return ListenersDto
     */
    public function setTotal(int $total): ListenersDto
    {
        $this->total = $total;

        return $this;
    }
}

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
     * @param int $current
     * @param int $unique
     * @param int $total
     */
    public function __construct(int $current, int $unique, int $total)
    {
        $this->setCurrent($current)
            ->setUnique($unique)
            ->setTotal($total);
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

    /**
     * @param array $listenersData
     *
     * @return ListenersDto
     */
    public static function fromArray(array $listenersData): self
    {
        return new self(
            $listenersData['current'],
            $listenersData['unique'],
            $listenersData['total']
        );
    }
}

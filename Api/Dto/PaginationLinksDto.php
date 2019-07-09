<?php

declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class PaginationLinksDto
{
    /**
     * @var string
     */
    protected $first;

    /**
     * @var string
     */
    protected $previous;

    /**
     * @var string
     */
    protected $next;

    /**
     * @var string
     */
    protected $last;

    /**
     * @param array $paginationLinksData
     */
    public function __construct(array $paginationLinksData)
    {
        $this->setFirst($paginationLinksData['first'])
            ->setPrevious($paginationLinksData['previous'])
            ->setNext($paginationLinksData['next'])
            ->setLast($paginationLinksData['last']);
    }

    /**
     * @return string
     */
    public function getFirst(): string
    {
        return $this->first;
    }

    /**
     * @param string $first
     *
     * @return PaginationLinksDto
     */
    public function setFirst(string $first): PaginationLinksDto
    {
        $this->first = $first;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrevious(): string
    {
        return $this->previous;
    }

    /**
     * @param string $previous
     *
     * @return PaginationLinksDto
     */
    public function setPrevious(string $previous): PaginationLinksDto
    {
        $this->previous = $previous;

        return $this;
    }

    /**
     * @return string
     */
    public function getNext(): string
    {
        return $this->next;
    }

    /**
     * @param string $next
     *
     * @return PaginationLinksDto
     */
    public function setNext(string $next): PaginationLinksDto
    {
        $this->next = $next;

        return $this;
    }

    /**
     * @return string
     */
    public function getLast(): string
    {
        return $this->last;
    }

    /**
     * @param string $last
     *
     * @return PaginationLinksDto
     */
    public function setLast(string $last): PaginationLinksDto
    {
        $this->last = $last;

        return $this;
    }
}

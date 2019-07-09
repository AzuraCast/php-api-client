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
     * @param string $first
     * @param string $previous
     * @param string $next
     * @param string $last
     */
    public function __construct(string $first, string $previous, string $next, string $last)
    {
        $this->setFirst($first)
            ->setPrevious($previous)
            ->setNext($next)
            ->setLast($last);
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

    /**
     * @param array $paginationLinksData
     *
     * @return PaginationLinksDto
     */
    public static function fromArray(array $paginationLinksData): self
    {
        return new self(
            $paginationLinksData['first'],
            $paginationLinksData['previous'],
            $paginationLinksData['next'],
            $paginationLinksData['last']
        );
    }
}

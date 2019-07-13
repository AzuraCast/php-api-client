<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class RequestableSongsDto
{
    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $songsPerPage;

    /**
     * @var int
     */
    protected $songsTotal;

    /**
     * @var int
     */
    protected $pagesTotal;

    /**
     * @var PaginationLinksDto
     */
    protected $paginationLinks;

    /**
     * @var RequestableSongDto[]
     */
    protected $requestableSongs;

    /**
     * @param int $page
     * @param int $songsPerPage
     * @param int $songsTotal
     * @param int $pagesTotal
     * @param PaginationLinksDto $paginationLinks
     * @param RequestableSongDto[] $requestableSongs
     */
    public function __construct(
        int $page,
        int $songsPerPage,
        int $songsTotal,
        int $pagesTotal,
        PaginationLinksDto $paginationLinks,
        array $requestableSongs
    ) {
        $this->setPage($page)
            ->setSongsPerPage($songsPerPage)
            ->setSongsTotal($songsTotal)
            ->setPagesTotal($pagesTotal)
            ->setPaginationLinks($paginationLinks)
            ->setRequestableSongs($requestableSongs);
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     *
     * @return RequestableSongsDto
     */
    public function setPage(int $page): RequestableSongsDto
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return int
     */
    public function getSongsPerPage(): int
    {
        return $this->songsPerPage;
    }

    /**
     * @param int $songPerPage
     *
     * @return RequestableSongsDto
     */
    public function setSongsPerPage(int $songPerPage): RequestableSongsDto
    {
        $this->songsPerPage = $songPerPage;

        return $this;
    }

    /**
     * @return int
     */
    public function getSongsTotal(): int
    {
        return $this->songsTotal;
    }

    /**
     * @param int $songsTotal
     *
     * @return RequestableSongsDto
     */
    public function setSongsTotal(int $songsTotal): RequestableSongsDto
    {
        $this->songsTotal = $songsTotal;

        return $this;
    }

    /**
     * @return int
     */
    public function getPagesTotal(): int
    {
        return $this->pagesTotal;
    }

    /**
     * @param int $pagesTotal
     *
     * @return RequestableSongsDto
     */
    public function setPagesTotal(int $pagesTotal): RequestableSongsDto
    {
        $this->pagesTotal = $pagesTotal;

        return $this;
    }

    /**
     * @return PaginationLinksDto
     */
    public function getPaginationLinks(): PaginationLinksDto
    {
        return $this->paginationLinks;
    }

    /**
     * @param PaginationLinksDto $paginationLinks
     *
     * @return RequestableSongsDto
     */
    public function setPaginationLinks(PaginationLinksDto $paginationLinks): RequestableSongsDto
    {
        $this->paginationLinks = $paginationLinks;

        return $this;
    }

    /**
     * @return RequestableSongDto[]
     */
    public function getRequestableSongs(): array
    {
        return $this->requestableSongs;
    }

    /**
     * @param RequestableSongDto[] $requestableSongs
     *
     * @return RequestableSongsDto
     */
    public function setRequestableSongs(array $requestableSongs): RequestableSongsDto
    {
        $this->requestableSongs = $requestableSongs;

        return $this;
    }

    /**
     * @param array $requestableSongsData
     *
     * @return RequestableSongsDto
     */
    public static function fromArray(array $requestableSongsData): self
    {
        $requestableSongs = [];
        foreach ($requestableSongsData['rows'] as $requestableSongData) {
            $requestableSongs[] = RequestableSongDto::fromArray($requestableSongData);
        }

        return new self(
            $requestableSongsData['page'],
            $requestableSongsData['per_page'],
            $requestableSongsData['total'],
            $requestableSongsData['total_pages'],
            PaginationLinksDto::fromArray($requestableSongsData['links']),
            $requestableSongs
        );
    }
}

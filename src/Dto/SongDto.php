<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class SongDto
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $artist;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $album;

    /**
     * @var string
     */
    protected $lyrics;

    /**
     * @var string
     */
    protected $art;

    /**
     * @var array
     */
    protected $customFields;

    /**
     * @param string $id
     * @param string $text
     * @param string $artist
     * @param string $title
     * @param string $album
     * @param string $lyrics
     * @param string $art
     * @param array $customFields
     */
    public function __construct(
        string $id,
        string $text,
        string $artist,
        string $title,
        string $album,
        string $lyrics,
        string $art,
        array $customFields
    ) {
        $this->setId($id)
            ->setText($text)
            ->setArtist($artist)
            ->setTitle($title)
            ->setAlbum($album)
            ->setLyrics($lyrics)
            ->setArt($art)
            ->setCustomFields($customFields);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return SongDto
     */
    public function setId(string $id): SongDto
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return SongDto
     */
    public function setText(string $text): SongDto
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getArtist(): string
    {
        return $this->artist;
    }

    /**
     * @param string $artist
     *
     * @return SongDto
     */
    public function setArtist(string $artist): SongDto
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return SongDto
     */
    public function setTitle(string $title): SongDto
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getAlbum(): string
    {
        return $this->album;
    }

    /**
     * @param string $album
     *
     * @return SongDto
     */
    public function setAlbum(string $album): SongDto
    {
        $this->album = $album;

        return $this;
    }

    /**
     * @return string
     */
    public function getLyrics(): string
    {
        return $this->lyrics;
    }

    /**
     * @param string $lyrics
     *
     * @return SongDto
     */
    public function setLyrics(string $lyrics): SongDto
    {
        $this->lyrics = $lyrics;

        return $this;
    }

    /**
     * @return string
     */
    public function getArt(): string
    {
        return $this->art;
    }

    /**
     * @param string $art
     *
     * @return SongDto
     */
    public function setArt(string $art): SongDto
    {
        $this->art = $art;

        return $this;
    }

    /**
     * @return array
     */
    public function getCustomFields(): array
    {
        return $this->customFields;
    }

    /**
     * @param array $customFields
     *
     * @return SongDto
     */
    public function setCustomFields(array $customFields): SongDto
    {
        $this->customFields = $customFields;

        return $this;
    }

    /**
     * @param array $songData
     *
     * @return SongDto
     */
    public static function fromArray(array $songData): self
    {
        return new self(
            $songData['id'],
            $songData['text'],
            $songData['artist'],
            $songData['title'],
            $songData['album'],
            $songData['lyrics'],
            $songData['art'],
            $songData['custom_fields']
        );
    }
}

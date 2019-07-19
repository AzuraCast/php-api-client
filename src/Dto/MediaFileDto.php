<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

use JsonSerializable;

class MediaFileDto implements JsonSerializable
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $songId;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $artist;

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
    protected $isrc;

    /**
     * @var int
     */
    protected $length;

    /**
     * @var string
     */
    protected $lengthText;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var int
     */
    protected $mtime;

    /**
     * @var float
     */
    protected $fadeOverlap;

    /**
     * @var float
     */
    protected $fadeIn;

    /**
     * @var float
     */
    protected $fadeOut;

    /**
     * @var float
     */
    protected $cueIn;

    /**
     * @var float
     */
    protected $cueOut;

    /**
     * @var MediaFilePlaylistDto[]
     */
    protected $playlists;

    /**
     * @var string
     */
    protected $uniqueId;

    /**
     * @var MediaFileCustomFieldDto[]
     */
    protected $customFields;

    /**
     * @param int $id
     * @param string $songId
     * @param string $title
     * @param string $artist
     * @param string $album
     * @param string $lyrics
     * @param string $isrc
     * @param int $length
     * @param string $lengthText
     * @param string $path
     * @param int $mtime
     * @param float $fadeOverlap
     * @param float $fadeIn
     * @param float $fadeOut
     * @param float $cueIn
     * @param float $cueOut
     * @param MediaFilePlaylistDto[] $playlists
     * @param string $uniqueId
     * @param MediaFileCustomFieldDto[] $customFields
     */
    public function __construct(
        int $id,
        string $songId,
        string $title,
        string $artist,
        string $album,
        string $lyrics,
        string $isrc,
        int $length,
        string $lengthText,
        string $path,
        int $mtime,
        float $fadeOverlap,
        float $fadeIn,
        float $fadeOut,
        float $cueIn,
        float $cueOut,
        array $playlists,
        string $uniqueId,
        array $customFields
    ) {
        $this->setId($id)
            ->setSongId($songId)
            ->setTitle($title)
            ->setArtist($artist)
            ->setAlbum($album)
            ->setLyrics($lyrics)
            ->setIsrc($isrc)
            ->setLength($length)
            ->setLengthText($lengthText)
            ->setPath($path)
            ->setMtime($mtime)
            ->setFadeOverlap($fadeOverlap)
            ->setFadeIn($fadeIn)
            ->setFadeOut($fadeOut)
            ->setCueIn($cueIn)
            ->setCueOut($cueOut)
            ->setPlaylists($playlists)
            ->setUniqueId($uniqueId)
            ->setCustomFields($customFields);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return MediaFileDto
     */
    public function setId(int $id): MediaFileDto
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getSongId(): string
    {
        return $this->songId;
    }

    /**
     * @param string $songId
     *
     * @return MediaFileDto
     */
    public function setSongId(string $songId): MediaFileDto
    {
        $this->songId = $songId;

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
     * @return MediaFileDto
     */
    public function setTitle(string $title): MediaFileDto
    {
        $this->title = $title;

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
     * @return MediaFileDto
     */
    public function setArtist(string $artist): MediaFileDto
    {
        $this->artist = $artist;

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
     * @return MediaFileDto
     */
    public function setAlbum(string $album): MediaFileDto
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
     * @return MediaFileDto
     */
    public function setLyrics(string $lyrics): MediaFileDto
    {
        $this->lyrics = $lyrics;

        return $this;
    }

    /**
     * @return string
     */
    public function getIsrc(): string
    {
        return $this->isrc;
    }

    /**
     * @param string $isrc
     *
     * @return MediaFileDto
     */
    public function setIsrc(string $isrc): MediaFileDto
    {
        $this->isrc = $isrc;

        return $this;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     *
     * @return MediaFileDto
     */
    public function setLength(int $length): MediaFileDto
    {
        $this->length = $length;

        return $this;
    }

    /**
     * @return string
     */
    public function getLengthText(): string
    {
        return $this->lengthText;
    }

    /**
     * @param string $lengthText
     *
     * @return MediaFileDto
     */
    public function setLengthText(string $lengthText): MediaFileDto
    {
        $this->lengthText = $lengthText;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     *
     * @return MediaFileDto
     */
    public function setPath(string $path): MediaFileDto
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return int
     */
    public function getMtime(): int
    {
        return $this->mtime;
    }

    /**
     * @param int $mtime
     *
     * @return MediaFileDto
     */
    public function setMtime(int $mtime): MediaFileDto
    {
        $this->mtime = $mtime;

        return $this;
    }

    /**
     * @return float
     */
    public function getFadeOverlap(): float
    {
        return $this->fadeOverlap;
    }

    /**
     * @param float $fadeOverlap
     *
     * @return MediaFileDto
     */
    public function setFadeOverlap(float $fadeOverlap): MediaFileDto
    {
        $this->fadeOverlap = $fadeOverlap;

        return $this;
    }

    /**
     * @return float
     */
    public function getFadeIn(): float
    {
        return $this->fadeIn;
    }

    /**
     * @param float $fadeIn
     * @return MediaFileDto
     */
    public function setFadeIn(float $fadeIn): MediaFileDto
    {
        $this->fadeIn = $fadeIn;

        return $this;
    }

    /**
     * @return float
     */
    public function getFadeOut(): float
    {
        return $this->fadeOut;
    }

    /**
     * @param float $fadeOut
     *
     * @return MediaFileDto
     */
    public function setFadeOut(float $fadeOut): MediaFileDto
    {
        $this->fadeOut = $fadeOut;

        return $this;
    }

    /**
     * @return float
     */
    public function getCueIn(): float
    {
        return $this->cueIn;
    }

    /**
     * @param float $cueIn
     *
     * @return MediaFileDto
     */
    public function setCueIn(float $cueIn): MediaFileDto
    {
        $this->cueIn = $cueIn;

        return $this;
    }

    /**
     * @return float
     */
    public function getCueOut(): float
    {
        return $this->cueOut;
    }

    /**
     * @param float $cueOut
     *
     * @return MediaFileDto
     */
    public function setCueOut(float $cueOut): MediaFileDto
    {
        $this->cueOut = $cueOut;

        return $this;
    }

    /**
     * @return MediaFilePlaylistDto[]
     */
    public function getPlaylists(): array
    {
        return $this->playlists;
    }

    /**
     * @param MediaFilePlaylistDto[] $playlists
     *
     * @return MediaFileDto
     */
    public function setPlaylists(array $playlists): MediaFileDto
    {
        $this->playlists = $playlists;

        return $this;
    }

    /**
     * @return string
     */
    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }

    /**
     * @param string $uniqueId
     *
     * @return MediaFileDto
     */
    public function setUniqueId(string $uniqueId): MediaFileDto
    {
        $this->uniqueId = $uniqueId;

        return $this;
    }

    /**
     * @return MediaFileCustomFieldDto[]
     */
    public function getCustomFields(): array
    {
        return $this->customFields;
    }

    /**
     * @param MediaFileCustomFieldDto[] $customFields
     *
     * @return MediaFileDto
     */
    public function setCustomFields(array $customFields): MediaFileDto
    {
        $this->customFields = $customFields;

        return $this;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'song_id' => $this->getSongId(),
            'title' => $this->getTitle(),
            'artist' => $this->getArtist(),
            'album' => $this->getAlbum(),
            'lyrics' => $this->getLyrics(),
            'isrc' => $this->getIsrc(),
            'length' => $this->getLength(),
            'length_text' => $this->getLengthText(),
            'path' => $this->getPath(),
            'mtime' => $this->getMtime(),
            'fade_overlap' => $this->getFadeOverlap(),
            'fade_in' => $this->getFadeIn(),
            'fade_out' => $this->getFadeOut(),
            'cue_in' => $this->getCueIn(),
            'cue_out' => $this->getCueOut(),
            'playlists' => $this->getPlaylists(),
            'unique_id' => $this->getUniqueId(),
            'custom_fields' => $this->getCustomFields()
        ];
    }

    /**
     * @param array $mediaFileData
     *
     * @return self
     */
    public static function fromArray(array $mediaFileData): self
    {
        $playlists = [];
        foreach ($mediaFileData['playlists'] as $playlistData) {
            $playlists[] = MediaFilePlaylistDto::fromArray($playlistData);
        }

        $customFields = [];
        foreach ($mediaFileData['custom_fields'] as $id => $value) {
            $customFields[] = new MediaFileCustomFieldDto((int)$id, $value);
        }

        return new MediaFileDto(
            $mediaFileData['id'],
            $mediaFileData['song_id'],
            $mediaFileData['title'] ?? '',
            $mediaFileData['artist'] ?? '',
            $mediaFileData['album'] ?? '',
            $mediaFileData['lyrics'] ?? '',
            $mediaFileData['isrc'] ?? '',
            $mediaFileData['length'] ?? 0,
            $mediaFileData['length_text'] ?? '',
            $mediaFileData['path'],
            $mediaFileData['mtime'],
            $mediaFileData['fade_overlap'] ?? 0.0,
            $mediaFileData['fade_in'] ?? 0.0,
            $mediaFileData['fade_out'] ?? 0.0,
            $mediaFileData['cue_in'] ?? 0.0,
            $mediaFileData['cue_out'] ?? 0.0,
            $playlists,
            $mediaFileData['unique_id'],
            $customFields
        );
    }
}

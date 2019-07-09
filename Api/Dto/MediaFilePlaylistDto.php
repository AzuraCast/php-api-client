<?php

declare(strict_types=1);

namespace AzuraCast\Api\Dto;

use JsonSerializable;

class MediaFilePlaylistDto implements JsonSerializable
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $weight;

    /**
     * @param array $mediaFilePlaylistData
     */
    public function __construct(array $mediaFilePlaylistData)
    {
        $this->setId($mediaFilePlaylistData['id'])
            ->setName($mediaFilePlaylistData['name'])
            ->setWeight($mediaFilePlaylistData['weight']);
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
     * @return MediaFilePlaylistDto
     */
    public function setId(int $id): MediaFilePlaylistDto
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return MediaFilePlaylistDto
     */
    public function setName(string $name): MediaFilePlaylistDto
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     *
     * @return MediaFilePlaylistDto
     */
    public function setWeight(int $weight): MediaFilePlaylistDto
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'weight' => $this->getWeight()
        ];
    }
}

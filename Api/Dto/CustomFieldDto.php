<?php

declare(strict_types=1);

namespace AzuraCast\Api\Dto;

use JsonSerializable;

class CustomFieldDto implements JsonSerializable
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
     * @var string
     */
    protected $shortName;

    /**
     * @param array $customFieldData
     */
    public function __construct(array $customFieldData)
    {
        $this->setId((int)$customFieldData['id'])
            ->setName($customFieldData['name'])
            ->setShortName($customFieldData['short_name']);
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
     * @return CustomFieldDto
     */
    public function setId(int $id): CustomFieldDto
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
     * @return CustomFieldDto
     */
    public function setName(string $name): CustomFieldDto
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getShortName(): string
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     *
     * @return CustomFieldDto
     */
    public function setShortName(string $shortName): CustomFieldDto
    {
        $this->shortName = $shortName;

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
            'short_name' => $this->getShortName()
        ];
    }
}

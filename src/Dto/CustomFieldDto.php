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
     * @param int $id
     * @param string $name
     * @param string $shortName
     */
    public function __construct(int $id, string $name, string $shortName)
    {
        $this->setId($id)
            ->setName($name)
            ->setShortName($shortName);
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

    /**
     * @param array $customFieldData
     * @return CustomFieldDto
     */
    public static function fromArray(array $customFieldData): self
    {
        return new self(
            (int)$customFieldData['id'],
            $customFieldData['name'],
            $customFieldData['short_name']
        );
    }
}

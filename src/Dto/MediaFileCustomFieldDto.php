<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class MediaFileCustomFieldDto
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $value;

    /**
     * @param int $id
     * @param string $value
     */
    public function __construct(int $id, string $value)
    {
        $this->setId($id)
            ->setValue($value);
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
     * @return MediaFileCustomFieldDto
     */
    public function setId(int $id): MediaFileCustomFieldDto
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return MediaFileCustomFieldDto
     */
    public function setValue(string $value): MediaFileCustomFieldDto
    {
        $this->value = $value;

        return $this;
    }
}

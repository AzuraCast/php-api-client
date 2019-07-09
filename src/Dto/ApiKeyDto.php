<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

use JsonSerializable;

class ApiKeyDto implements JsonSerializable
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $comment;

    /**
     * @param string $id
     * @param string $comment
     */
    public function __construct(string $id, string $comment)
    {
        $this->setId($id)
            ->setComment($comment);
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
     * @return ApiKeyDto
     */
    public function setId(string $id): ApiKeyDto
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     *
     * @return ApiKeyDto
     */
    public function setComment(string $comment): ApiKeyDto
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'comment' => $this->getComment()
        ];
    }

    /**
     * @param array $apiKeyData
     * @return ApiKeyDto
     */
    public static function fromArray(array $apiKeyData): self
    {
        return new self(
            $apiKeyData['id'],
            $apiKeyData['comment']
        );
    }
}

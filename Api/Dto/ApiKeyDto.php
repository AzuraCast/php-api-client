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
     * @param array $apiKeyData
     */
    public function __construct(array $apiKeyData = [])
    {
        $this->setId($apiKeyData['id']);
        $this->setComment($apiKeyData['comment']);
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
}

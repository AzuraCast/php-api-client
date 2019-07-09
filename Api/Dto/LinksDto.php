<?php

declare(strict_types=1);

namespace AzuraCast\Api\Dto;

use JsonSerializable;

class LinksDto implements JsonSerializable
{
    /**
     * @var string
     */
    protected $self;

    /**
     * @param array $linksData
     */
    public function __construct(array $linksData)
    {
        $this->setSelf($linksData['self']);
    }

    /**
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * @param string $self
     *
     * @return LinksDto
     */
    public function setSelf(string $self): LinksDto
    {
        $this->self = $self;

        return $this;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        return [
            'self' => $this->getSelf()
        ];
    }
}

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
     * @param string $self
     */
    public function __construct(string $self)
    {
        $this->setSelf($self);
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

    /**
     * @param array $linksData
     *
     * @return LinksDto
     */
    public static function fromArray(array $linksData): self
    {
        return new self($linksData['self']);
    }
}

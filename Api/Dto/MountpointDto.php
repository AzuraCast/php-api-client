<?php

declare(strict_types=1);

namespace AzuraCast\Api\Dto;

use JsonSerializable;

class MountpointDto implements JsonSerializable
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
    protected $displayName;

    /**
     * @var bool
     */
    protected $isVisibleOnPublicPages;

    /**
     * @var bool
     */
    protected $isDefault;

    /**
     * @var bool
     */
    protected $isPublic;

    /**
     * @var bool
     */
    protected $enableAutodj;

    /**
     * @var string
     */
    protected $autodjFormat;

    /**
     * @var int
     */
    protected $autodjBitrate;

    /**
     * @var LinksDto
     */
    protected $links;

    /**
     * @param array $mountpointData
     */
    public function __construct(array $mountpointData)
    {
        $this->setId($mountpointData['id'])
            ->setName($mountpointData['name'])
            ->setDisplayName($mountpointData['display_name'])
            ->setIsVisibleOnPublicPages($mountpointData['is_visible_on_public_pages'])
            ->setIsDefault($mountpointData['is_default'])
            ->setIsPublic($mountpointData['is_public'])
            ->setEnableAutodj($mountpointData['enable_autodj'])
            ->setAutodjFormat($mountpointData['autodj_format'])
            ->setAutodjBitrate($mountpointData['autodj_bitrate'])
            ->setLinks(new LinksDto($mountpointData['links']));
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
     * @return MountpointDto
     */
    public function setId(int $id): MountpointDto
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
     * @return MountpointDto
     */
    public function setName(string $name): MountpointDto
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * @param string $displayName
     *
     * @return MountpointDto
     */
    public function setDisplayName(string $displayName): MountpointDto
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsVisibleOnPublicPages(): bool
    {
        return $this->isVisibleOnPublicPages;
    }

    /**
     * @param bool $isVisibleOnPublicPages
     *
     * @return MountpointDto
     */
    public function setIsVisibleOnPublicPages(bool $isVisibleOnPublicPages): MountpointDto
    {
        $this->isVisibleOnPublicPages = $isVisibleOnPublicPages;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }

    /**
     * @param bool $isDefault
     *
     * @return MountpointDto
     */
    public function setIsDefault(bool $isDefault): MountpointDto
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsPublic(): bool
    {
        return $this->isPublic;
    }

    /**
     * @param bool $isPublic
     *
     * @return MountpointDto
     */
    public function setIsPublic(bool $isPublic): MountpointDto
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    /**
     * @return bool
     */
    public function getEnableAutodj(): bool
    {
        return $this->enableAutodj;
    }

    /**
     * @param bool $enableAutodj
     *
     * @return MountpointDto
     */
    public function setEnableAutodj(bool $enableAutodj): MountpointDto
    {
        $this->enableAutodj = $enableAutodj;

        return $this;
    }

    /**
     * @return string
     */
    public function getAutodjFormat(): string
    {
        return $this->autodjFormat;
    }

    /**
     * @param string $autodjFormat
     *
     * @return MountpointDto
     */
    public function setAutodjFormat(string $autodjFormat): MountpointDto
    {
        $this->autodjFormat = $autodjFormat;

        return $this;
    }

    /**
     * @return int
     */
    public function getAutodjBitrate(): int
    {
        return $this->autodjBitrate;
    }

    /**
     * @param int $autodjBitrate
     *
     * @return MountpointDto
     */
    public function setAutodjBitrate(int $autodjBitrate): MountpointDto
    {
        $this->autodjBitrate = $autodjBitrate;

        return $this;
    }

    /**
     * @return LinksDto
     */
    public function getLinks(): LinksDto
    {
        return $this->links;
    }

    /**
     * @param LinksDto $linksDto
     *
     * @return MountpointDto
     */
    public function setLinks(LinksDto $linksDto): MountpointDto
    {
        $this->links = $linksDto;

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
            'display_name' => $this->getDisplayName(),
            'is_visible_on_public_pages' => $this->getIsVisibleOnPublicPages(),
            'is_default' => $this->getIsDefault(),
            'is_public' => $this->getIsPublic(),
            'enable_autodj' => $this->getEnableAutodj(),
            'autodj_format' => $this->getAutodjFormat(),
            'autodj_bitrate' => $this->getAutodjBitrate(),
            'links' => $this->getLinks()
        ];
    }
}

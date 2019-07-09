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
     * @param int $id
     * @param string $name
     * @param string $displayName
     * @param bool $isVisibleOnPublicPages
     * @param bool $isDefault
     * @param bool $isPublic
     * @param bool $enableAutodj
     * @param string $autodjFormat
     * @param int $autodjBitrate
     * @param LinksDto $linksDto
     */
    public function __construct(
        int $id,
        string $name,
        string $displayName,
        bool $isVisibleOnPublicPages,
        bool $isDefault,
        bool $isPublic,
        bool $enableAutodj,
        string $autodjFormat,
        int $autodjBitrate,
        LinksDto $linksDto
    ) {
        $this->setId($id)
            ->setName($name)
            ->setDisplayName($displayName)
            ->setIsVisibleOnPublicPages($isVisibleOnPublicPages)
            ->setIsDefault($isDefault)
            ->setIsPublic($isPublic)
            ->setEnableAutodj($enableAutodj)
            ->setAutodjFormat($autodjFormat)
            ->setAutodjBitrate($autodjBitrate)
            ->setLinks($linksDto);
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

    /**
     * @param array $mountpointData
     *
     * @return MountpointDto
     */
    public static function fromArray(array $mountpointData): self
    {
        return new self(
            $mountpointData['id'],
            $mountpointData['name'],
            $mountpointData['display_name'],
            $mountpointData['is_visible_on_public_pages'],
            $mountpointData['is_default'],
            $mountpointData['is_public'],
            $mountpointData['enable_autodj'],
            $mountpointData['autodj_format'],
            $mountpointData['autodj_bitrate'],
            LinksDto::fromArray($mountpointData['links'])
        );
    }
}

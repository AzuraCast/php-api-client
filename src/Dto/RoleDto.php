<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

use JsonSerializable;

class RoleDto implements JsonSerializable
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
     * @var PermissionsDto
     */
    protected $permissions;

    /**
     * @param int $id
     * @param string $name
     * @param PermissionsDto $permissions
     */
    public function __construct(int $id, string $name, PermissionsDto $permissions)
    {
        $this->setId($id)
            ->setName($name)
            ->setPermissions($permissions);
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
     * @return RoleDto
     */
    public function setId(int $id): RoleDto
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
     * @return RoleDto
     */
    public function setName(string $name): RoleDto
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return PermissionsDto
     */
    public function getPermissions(): PermissionsDto
    {
        return $this->permissions;
    }

    /**
     * @param PermissionsDto $permissions
     *
     * @return RoleDto
     */
    public function setPermissions(PermissionsDto $permissions): RoleDto
    {
        $this->permissions = $permissions;

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
            'permissions' => $this->getPermissions()
        ];
    }

    /**
     * @param array $roleData
     *
     * @return RoleDto
     */
    public static function fromArray(array $roleData): self
    {
        return new self(
            $roleData['id'],
            $roleData['name'],
            PermissionsDto::fromArray($roleData['permissions'])
        );
    }
}

<?php
declare(strict_types=1);

namespace AzuraCast\Api\Admin;

use AzuraCast\Api\AbstractClient;
use AzuraCast\Api\Dto;
use AzuraCast\Api\Exception;

class RolesClient extends AbstractClient
{
    /**
     * @return Dto\RoleDto[]
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function list(): array
    {
        $rolesData = $this->request('GET', 'admin/roles');

        $roles = [];
        foreach ($rolesData as $roleData) {
            $roles[] = Dto\RoleDto::fromArray($roleData);
        }
        return $roles;
    }

    /**
     * @param int $roleId
     *
     * @return Dto\RoleDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function get(int $roleId): Dto\RoleDto
    {
        $roleData = $this->request(
            'GET',
            sprintf('admin/role/%s', $roleId)
        );

        return Dto\RoleDto::fromArray($roleData);
    }

    /**
     * @param string $name
     * @param string[] $permissionsGlobal
     * @param string[] $permissionsStation
     *
     * @return Dto\RoleDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function create(string $name, array $permissionsGlobal, array $permissionsStation): Dto\RoleDto
    {
        $permissions = new Dto\PermissionsDto($permissionsGlobal, $permissionsStation);
        $roleDto = new Dto\RoleDto(0, $name, $permissions);

        $roleData = $this->request(
            'POST',
            'admin/roles',
            ['json' => $roleDto]
        );

        return Dto\RoleDto::fromArray($roleData);
    }

    /**
     * @param int $roleId
     * @param string $name
     * @param string[] $permissionsGlobal
     * @param string[] $permissionsStation
     *
     * @return Dto\RoleDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function update(
        int $roleId,
        string $name,
        array $permissionsGlobal,
        array $permissionsStation
    ): Dto\RoleDto {
        $permissionsDto = new Dto\PermissionsDto($permissionsGlobal, $permissionsStation);
        $roleDto = new Dto\RoleDto($roleId, $name, $permissionsDto);

        $this->request(
            'PUT',
            sprintf('admin/role/%s', $roleId),
            ['json' => $roleDto]
        );

        return $roleDto;
    }

    /**
     * @param int $roleId
     *
     * @return void
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function delete(int $roleId): void
    {
        $this->request(
            'DELETE',
            sprintf('admin/role/%s', $roleId)
        );
    }
}

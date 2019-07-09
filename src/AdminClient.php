<?php
declare(strict_types=1);

namespace AzuraCast\Api;

use AzuraCast\Api\Admin;

class AdminClient extends AbstractClient
{
    /**
     * @return Admin\CustomFieldsClient
     */
    public function customFields(): Admin\CustomFieldsClient
    {
        return new Admin\CustomFieldsClient($this->httpClient);
    }

    /**
     * @return Admin\UsersClient
     */
    public function users(): Admin\UsersClient
    {
        return new Admin\UsersClient($this->httpClient);
    }

    /**
     * @return Dto\PermissionsDto
     */
    public function permissions(): Dto\PermissionsDto
    {
        $permissionsData = $this->request('GET', 'admin/permissions');
        return Dto\PermissionsDto::fromArray($permissionsData);
    }

    /**
     * @return Admin\RolesClient
     */
    public function roles(): Admin\RolesClient
    {
        return new Admin\RolesClient($this->httpClient);
    }

    /**
     * @return Admin\SettingsClient
     */
    public function settings(): Admin\SettingsClient
    {
        return new Admin\SettingsClient($this->httpClient);
    }

}

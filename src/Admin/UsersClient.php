<?php
declare(strict_types=1);

namespace AzuraCast\Api\Admin;

use AzuraCast\Api\AbstractClient;
use AzuraCast\Api\Dto;
use AzuraCast\Api\Exception;

class UsersClient extends AbstractClient
{
    /**
     * @return Dto\UserDto[]
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function list(): array
    {
        $usersData = $this->request('GET', 'admin/users');

        $users = [];
        foreach ($usersData as $userData) {
            $users[] = Dto\UserDto::fromArray($userData);
        }
        return $users;
    }

    /**
     * @param int $userId
     *
     * @return Dto\UserDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function get(int $userId): Dto\UserDto
    {
        $userData = $this->request(
            'GET',
            sprintf('admin/user/%s', $userId)
        );

        return Dto\UserDto::fromArray($userData);
    }

    /**
     * @param string $email
     * @param string $authPassword
     * @param string $name
     * @param string $locale
     * @param string $theme
     * @param array $roles
     * @param array $apiKeys
     *
     * @return Dto\UserDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function create(
        string $email,
        string $authPassword,
        string $name,
        string $locale,
        string $theme,
        array $roles,
        array $apiKeys
    ): Dto\UserDto {
        $userDto = new Dto\UserDto(
            0,
            $email,
            $name,
            $locale,
            $theme,
            time(),
            time(),
            $roles,
            $apiKeys,
            new Dto\LinksDto('')
        );
        $userDto->setAuthPassword($authPassword);

        $userData = $this->request(
            'POST',
            'admin/users',
            ['json' => $userDto]
        );

        return Dto\UserDto::fromArray($userData);
    }

    /**
     * @param int $userId
     * @param string $email
     * @param string $authPassword
     * @param string $name
     * @param string $locale
     * @param string $theme
     * @param array $roles
     * @param array $apiKeys
     *
     * @return Dto\UserDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function update(
        int $userId,
        string $email,
        string $authPassword,
        string $name,
        string $locale,
        string $theme,
        array $roles,
        array $apiKeys
    ): Dto\UserDto {
        $userDto = new Dto\UserDto(
            $userId,
            $email,
            $name,
            $locale,
            $theme,
            time(),
            time(),
            $roles,
            $apiKeys,
            new Dto\LinksDto('')
        );
        if ($authPassword !== '') {
            $userDto->setAuthPassword($authPassword);
        }

        $this->request(
            'PUT',
            sprintf('admin/user/%s', $userId),
            ['json' => $userDto]
        );

        $userDto->setAuthPassword('');
        return $userDto;
    }

    /**
     * @param int $userId
     *
     * @return void
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function delete(int $userId): void
    {
        $this->request(
            'DELETE',
            sprintf('admin/user/%s', $userId)
        );
    }
}

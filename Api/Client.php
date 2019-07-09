<?php
declare(strict_types=1);

namespace AzuraCast\Api;

use DateTime;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use AzuraCast\Api\Dto;
use AzuraCast\Api\Exception;

class Client extends AbstractClient
{
    /**
     * @return Dto\NowPlayingDto[]
     */
    public function nowPlaying(): array
    {
        $response = $this->request('GET', 'nowplaying');

        $nowPlayingDtoArray = [];
        foreach ($response as $nowPlayingData) {
            $nowPlayingDtoArray[] = new Dto\NowPlayingDto($nowPlayingData);
        }
        return $nowPlayingDtoArray;
    }

    /**
     * @param string|int $stationId
     * @return Dto\NowPlayingDto
     */
    public function nowPlayingOnStation($stationId): Dto\NowPlayingDto
    {
        $nowPlayingData = $this->request('GET', sprintf(
            'nowplaying/%s',
            $stationId
        ));

        return new Dto\NowPlayingDto($nowPlayingData);
    }

    /**
     * @return Dto\StationDto[]
     */
    public function stations(): array
    {
        $stationDataArray = $this->request('GET', 'stations');

        $stationDtoArray = [];
        foreach ($stationDataArray as $stationData) {
            $stationDtoArray[] = new Dto\StationDto($stationData);
        }
        return $stationDtoArray;
    }

    /**
     * @param string|int $stationId
     * @return Dto\StationDto
     */
    public function station($stationId): Dto\StationDto
    {
        $stationData = $this->request('GET', sprintf(
            'station/%s',
            $stationId
        ));

        return new Dto\StationDto($stationData);
    }

    /**
     * @param string|int $stationId
     * @param int $page
     * @return Dto\RequestableSongsDto
     */
    public function requestableSongs($stationId, int $page = 1): Dto\RequestableSongsDto
    {
        $requestableSongsData = $this->request('GET', sprintf(
            'station/%s/requests?per_page=50&page=%s',
            $stationId,
            $page
        ));

        return new Dto\RequestableSongsDto($requestableSongsData);
    }

    /**
     * @param string|int $stationId
     * @return Dto\RequestableSongsDto[]
     */
    public function allRequestableSongs($stationId): array
    {
        $requestableSongsDto = $this->requestableSongs($stationId, 1);

        $requests = function (int $stationId) use ($requestableSongsDto) {
            for ($page = 1; $page <= $requestableSongsDto->getPagesTotal(); $page++) {
                $uri = sprintf('station/%s/requests?per_page=50&page=%s', $stationId, $page);
                yield new Request('GET', $uri);
            }
        };

        $requestableSongs = [];
        $pool = new Pool($this->httpClient, $requests($stationId), [
            'concurrency' => 5,
            'fulfilled' => function ($response, $index) use (&$requestableSongs) {
                if ($response->getStatusCode() !== 200) {
                    return;
                }

                $requestableSongsData = json_decode($response->getBody()->getContents(), true);
                $requestableSongs[] = new Dto\RequestableSongsDto($requestableSongsData);
            }
        ]);

        $promise = $pool->promise();
        $promise->wait();

        return $requestableSongs;
    }

    /**
     * @param string|int $stationId
     * @param string $uniqueId
     * @return void
     */
    public function requestSong($stationId, string $uniqueId): void
    {
        try {
            $this->request('POST', sprintf(
                'station/%s/request/%s',
                $stationId,
                $uniqueId
            ));
        } catch (Exception\AccessDeniedException $e) {
            throw new Exception\RequestsDisabledException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param string|int $stationId
     * @return Dto\StationStatusDto
     */
    public function stationStatus($stationId): Dto\StationStatusDto
    {
        $stationStatusData = $this->request('GET', sprintf(
            'station/%s/status',
            $stationId
        ));

        return new Dto\StationStatusDto($stationStatusData);
    }

    /**
     * @param string|int $stationId
     * @return void
     */
    public function restartStation($stationId): void
    {
        $this->request('POST', sprintf(
            'station/%s/restart',
            $stationId
        ));
    }

    /**
     * @param string|int $stationId
     * @param string $action
     * @return void
     */
    public function performFrontendAction($stationId, string $action): void
    {
        $this->request('POST', sprintf(
            'station/%s/frontend/%s',
            $stationId,
            $action
        ));
    }

    /**
     * @param string|int $stationId
     * @param string $action
     * @return void
     */
    public function performBackendAction($stationId, string $action): void
    {
        $this->request('POST', sprintf(
            'station/%s/backend/%s',
            $stationId,
            $action
        ));
    }

    /**
     * @param string|int $stationId
     * @param DateTime|null $start
     * @param DateTime|null $end
     *
     * @return Dto\SongHistoryDto[]
     */
    public function stationHistory($stationId, ?DateTime $start = null, ?DateTime $end = null): array
    {
        $songHistoryDataArray = $this->request('GET', sprintf(
            'station/%s/history',
            $stationId
        ));

        $songHistory = [];
        foreach ($songHistoryDataArray as $songHistoryData) {
            $songHistory[] = new Dto\SongHistoryDto($songHistoryData);
        }
        return $songHistory;
    }

    /**
     * @param string|int $stationId
     *
     * @return Dto\ListenerDto[]
     */
    public function listenerDetails($stationId): array
    {
        $listenerDataArray = $this->request('GET', sprintf(
            'station/%s/listeners',
            $stationId
        ));

        $listenerDtoArray = [];
        foreach ($listenerDataArray as $listenerData) {
            $listenerDtoArray[] = new Dto\ListenerDto($listenerData);
        }
        return $listenerDtoArray;
    }

    /**
     * @param string|int $stationId
     * @param string $uniqueId
     *
     * @return resource|bool
     */
    public function mediaAlbumArt($stationId, string $uniqueId)
    {
        $uri = sprintf('station/%s/art/%s', $stationId, $uniqueId);

        $response = $this->httpClient->get($uri);

        if ($response->getStatusCode() !== 200 && $response->getStatusCode() !== 404) {
            throw new Exception\ClientRequestException(sprintf(
                'Call to "%s" returned non-successful response with code %s and body: %s',
                $uri,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        $imageData = $response->getBody()->getContents();
        return imagecreatefromstring($imageData);
    }

    /**
     * @param string|int $stationId
     *
     * @return Dto\MediaFileDto[]
     */
    public function mediaFiles($stationId): array
    {
        $mediaFilesDataArray = $this->request('GET', sprintf(
            'station/%s/files',
            $stationId
        ));

        $mediaFileDtoArray = [];
        foreach ($mediaFilesDataArray as $mediaFileData) {
            $mediaFileDtoArray[] = new Dto\MediaFileDto($mediaFileData);
        }
        return $mediaFileDtoArray;
    }

    /**
     * @param string|int $stationId
     * @param Dto\UploadFileDto $uploadFile
     *
     * @return Dto\MediaFileDto
     */
    public function uploadMediaFile($stationId, Dto\UploadFileDto $uploadFile): Dto\MediaFileDto
    {
        $mediaFileData = $this->request('POST',
            sprintf('station/%s/files', $stationId),
            ['json' => $uploadFile]
        );

        return new Dto\MediaFileDto($mediaFileData);
    }

    /**
     * @param string|int $stationId
     *
     * @return Dto\MountpointDto[]
     */
    public function mountpoints($stationId): array
    {
        $mountpointsData = $this->request('GET', sprintf(
            'station/%s/mounts',
            $stationId
        ));

        $mountpoints = [];
        foreach ($mountpointsData as $mountpointData) {
            $mountpoints[] = new Dto\MountpointDto($mountpointData);
        }
        return $mountpoints;
    }

    /**
     * @return Dto\CustomFieldDto[]
     */
    public function customFields(): array
    {
        $customFieldsData = $this->request('GET', 'admin/custom_fields');

        $customFields = [];
        foreach ($customFieldsData as $customFieldData) {
            $customFields[] = new Dto\CustomFieldDto($customFieldData);
        }
        return $customFields;
    }

    /**
     * @param int $customFieldId
     *
     * @return Dto\CustomFieldDto
     */
    public function customField(int $customFieldId): Dto\CustomFieldDto
    {
        $customFieldData = $this->request('GET', sprintf(
            'admin/custom_field/%s',
            $customFieldId
        ));

        return new Dto\CustomFieldDto($customFieldData);
    }

    /**
     * @param string $name
     * @param string $shortName
     *
     * @return Dto\CustomFieldDto
     */
    public function createCustomField(string $name, string $shortName): Dto\CustomFieldDto
    {
        $customFieldDto = (new Dto\CustomFieldDto([]))
            ->setId(0)
            ->setName($name)
            ->setShortName($shortName);

        $customFieldData = $this->request('POST', 'admin/custom_fields', ['json' => $customFieldDto]);
        return new Dto\CustomFieldDto($customFieldData);
    }

    /**
     * @param int $customFieldId
     * @param string $name
     * @param string $shortName
     *
     * @return Dto\CustomFieldDto
     */
    public function updateCustomField(int $customFieldId, string $name, string $shortName): Dto\CustomFieldDto
    {
        $customFieldDto = (new Dto\CustomFieldDto([]))
            ->setId($customFieldId)
            ->setName($name)
            ->setShortName($shortName);

        $response = $this->httpClient->put(
            sprintf('admin/custom_field/%s', $customFieldId),
            ['json' => $customFieldDto]
        );

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "admin/custom_field/%s" returned non-successful response with code %s and body: %s',
                $customFieldId,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        return $customFieldDto;
    }

    /**
     * @param int $customFieldId
     *
     * @return void
     */
    public function deleteCustomField(int $customFieldId): void
    {
        $response = $this->httpClient->delete(sprintf(
            'admin/custom_field/%s', $customFieldId
        ));

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "admin/custom_field/%s" returned non-successful response with code %s and body: %s',
                $customFieldId,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }
    }

    /**
     * @return UserDto[]
     */
    public function users(): array
    {
        $response = $this->httpClient->get('admin/users');

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "/admin/users" returned non-successful response with code %s and body: %s',
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        $usersData = json_decode($response->getBody()->getContents(), true);

        $userDtoTransformer = new UserDtoTransformer();

        $users = [];

        foreach ($usersData as $userData) {
            $users[] = $userDtoTransformer->arrayToDto($userData);
        }

        return $users;
    }

    /**
     * @param int $userId
     *
     * @return UserDto
     */
    public function user(int $userId): UserDto
    {
        $response = $this->httpClient->get(sprintf(
            'admin/user/%s',
            $userId
        ));

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "admin/user/%s" returned non-successful response with code %s and body: %s',
                $userId,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        $userData = json_decode($response->getBody()->getContents(), true);

        $userDtoTransformer = new UserDtoTransformer();

        return $userDtoTransformer->arrayToDto($userData);
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
     * @return UserDto
     */
    public function createUser(
        string $email,
        string $authPassword,
        string $name,
        string $locale,
        string $theme,
        array $roles,
        array $apiKeys
    ): UserDto {
        $userDto = new UserDto(
            0,
            $email,
            $name,
            $locale,
            $theme,
            time(),
            time(),
            $roles,
            $apiKeys,
            new LinksDto('')
        );

        $userDto->setAuthPassword($authPassword);

        $response = $this->httpClient->post(
            'admin/users',
            ['json' => $userDto]
        );

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "admin/users" returned non-successful response with code %s and body: %s',
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        $userData = json_decode($response->getBody()->getContents(), true);

        $userDtoTransformer = new UserDtoTransformer();

        return $userDtoTransformer->arrayToDto($userData);
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
     * @return UserDto
     */
    public function updateUser(
        int $userId,
        string $email,
        string $authPassword,
        string $name,
        string $locale,
        string $theme,
        array $roles,
        array $apiKeys
    ): UserDto {
        $userDto = new UserDto(
            $userId,
            $email,
            $name,
            $locale,
            $theme,
            time(),
            time(),
            $roles,
            $apiKeys,
            new LinksDto('')
        );

        if ($authPassword !== '') {
            $userDto->setAuthPassword($authPassword);
        }

        $response = $this->httpClient->put(
            sprintf('admin/user/%s', $userId),
            ['json' => $userDto]
        );

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "admin/user/%s" returned non-successful response with code %s and body: %s',
                $userId,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        $userDto->setAuthPassword('');

        return $userDto;
    }

    /**
     * @param int $userId
     *
     * @return void
     */
    public function deleteUser(int $userId): void
    {
        $response = $this->httpClient->delete(sprintf(
            'admin/user/%s', $userId
        ));

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "admin/user/%s" returned non-successful response with code %s and body: %s',
                $userId,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }
    }

    /**
     * @return PermissionsDto
     */
    public function permissions(): PermissionsDto
    {
        $response = $this->httpClient->get('admin/permissions');

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "/admin/permissions" returned non-successful response with code %s and body: %s',
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        $permissionsData = json_decode($response->getBody()->getContents(), true);

        $permissionsDtoTransformer = new PermissionsDtoTransformer();

        return $permissionsDtoTransformer->arrayToDto($permissionsData);
    }

    /**
     * @return RoleDto[]
     */
    public function roles(): array
    {
        $response = $this->httpClient->get('admin/roles');

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "/admin/roles" returned non-successful response with code %s and body: %s',
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        $rolesData = json_decode($response->getBody()->getContents(), true);

        $roleDtoTransformer = new RoleDtoTransformer();

        $roles = [];

        foreach ($rolesData as $roleData) {
            $roles[] = $roleDtoTransformer->arrayToDto($roleData);
        }

        return $roles;
    }

    /**
     * @param string $name
     * @param string[] $permissionsGlobal
     * @param string[] $permissionsStation
     *
     * @return RoleDto
     */
    public function createRole(string $name, array $permissionsGlobal, array $permissionsStation): RoleDto
    {
        $permissions = new PermissionsDto($permissionsGlobal, $permissionsStation);
        $roleDto = new RoleDto(0, $name, $permissions);

        $response = $this->httpClient->post(
            'admin/roles',
            ['json' => $roleDto]
        );

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "admin/roles" returned non-successful response with code %s and body: %s',
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        $roleData = json_decode($response->getBody()->getContents(), true);

        $roleDtoTransformer = new RoleDtoTransformer();

        return $roleDtoTransformer->arrayToDto($roleData);
    }

    /**
     * @param int $roleId
     *
     * @return RoleDto
     */
    public function role(int $roleId): RoleDto
    {
        $response = $this->httpClient->get(sprintf(
            'admin/role/%s',
            $roleId
        ));

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "admin/role/%s" returned non-successful response with code %s and body: %s',
                $roleId,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        $roleData = json_decode($response->getBody()->getContents(), true);

        $roleDtoTransformer = new RoleDtoTransformer();

        return $roleDtoTransformer->arrayToDto($roleData);
    }

    /**
     * @param int $roleId
     * @param string $name
     * @param string[] $permissionsGlobal
     * @param string[] $permissionsStation
     *
     * @return RoleDto
     */
    public function updateRole(
        int $roleId,
        string $name,
        array $permissionsGlobal,
        array $permissionsStation
    ): RoleDto {
        $permissionsDto = new PermissionsDto($permissionsGlobal, $permissionsStation);
        $roleDto = new RoleDto($roleId, $name, $permissionsDto);

        $response = $this->httpClient->put(
            sprintf('admin/role/%s', $roleId),
            ['json' => $roleDto]
        );

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "admin/role/%s" returned non-successful response with code %s and body: %s',
                $roleId,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        return $roleDto;
    }

    /**
     * @param int $roleId
     *
     * @return void
     */
    public function deleteRole(int $roleId): void
    {
        $response = $this->httpClient->delete(sprintf(
            'admin/role/%s', $roleId
        ));

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "admin/role/%s" returned non-successful response with code %s and body: %s',
                $roleId,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }
    }

    /**
     * @return SettingsDto
     */
    public function settings(): SettingsDto
    {
        $response = $this->httpClient->get('admin/settings');

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "admin/settings" returned non-successful response with code %s and body: %s',
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        $settingsData = json_decode($response->getBody()->getContents(), true);

        $settingsDtoTransformer = new SettingsDtoTransformer();

        return $settingsDtoTransformer->arrayToDto($settingsData);
    }

    /**
     * @param string $baseUrl
     * @param string $instanceName
     * @param string $timezone
     * @param bool $preferBrowserUrl
     * @param bool $useRadioProxy
     * @param int $historyKeepDays
     * @param bool $alwaysUseSsl
     * @param string $apiAccessControl
     * @param string $analytics
     * @param bool $centralUpdatesChannel
     * @param string $publicTheme
     * @param bool $hideAlbumArt
     * @param string $homepageRedirectUrl
     * @param string $defaultAlbumArtUrl
     * @param bool $hideProductName
     * @param string $customCssPublic
     * @param string $customJsPublic
     * @param string $customCssInternal
     *
     * @return SettingsDto
     */
    public function updateSettings(
        string $baseUrl,
        string $instanceName,
        string $timezone,
        bool $preferBrowserUrl,
        bool $useRadioProxy,
        int $historyKeepDays,
        bool $alwaysUseSsl,
        string $apiAccessControl,
        string $analytics,
        bool $centralUpdatesChannel,
        string $publicTheme,
        bool $hideAlbumArt,
        string $homepageRedirectUrl,
        string $defaultAlbumArtUrl,
        bool $hideProductName,
        string $customCssPublic,
        string $customJsPublic,
        string $customCssInternal
    ): SettingsDto {
        $settingsDto = new SettingsDto(
            $baseUrl,
            $instanceName,
            $timezone,
            $preferBrowserUrl,
            $useRadioProxy,
            $historyKeepDays,
            $alwaysUseSsl,
            $apiAccessControl,
            $analytics,
            $centralUpdatesChannel,
            $publicTheme,
            $hideAlbumArt,
            $homepageRedirectUrl,
            $defaultAlbumArtUrl,
            $hideProductName,
            $customCssPublic,
            $customJsPublic,
            $customCssInternal
        );

        $response = $this->httpClient->put(
            'admin/settings',
            ['json' => $settingsDto]
        );

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "admin/settings" returned non-successful response with code %s and body: %s',
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        return $settingsDto;
    }

    /**
     * @param int $stationId
     *
     * @return StreamerDto[]
     */
    public function streamers(int $stationId): array
    {
        $response = $this->httpClient->get(sprintf(
            'station/%s/streamers',
            $stationId
        ));

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "station/%s/streamers" returned non-successful response with code %s and body: %s',
                $stationId,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        $streamersData = json_decode($response->getBody()->getContents(), true);

        $streamerDtoTransformer = new StreamerDtoTransformer();

        $streamers = [];

        foreach ($streamersData as $streamerData) {
            $streamers[] = $streamerDtoTransformer->arrayToDto($streamerData);
        }

        return $streamers;
    }

    /**
     * @param int $stationId
     * @param string $username
     * @param string $password
     * @param string $displayName
     * @param string $comments
     * @param bool $isActive
     *
     * @return StreamerDto
     */
    public function createStreamer(
        int $stationId,
        string $username,
        string $password,
        string $displayName,
        string $comments,
        bool $isActive
    ): StreamerDto {
        $linksDto = new LinksDto('');
        $streamerDto = new StreamerDto(
            0,
            $username,
            $password,
            $displayName,
            $comments,
            $isActive,
            $linksDto
        );

        $response = $this->httpClient->post(
            sprintf('station/%s/streamers', $stationId),
            ['json' => $streamerDto]
        );

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "station/%s/streamers" returned non-successful response with code %s and body: %s',
                $stationId,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        $streamerData = json_decode($response->getBody()->getContents(), true);

        $streamerDtoTransformer = new StreamerDtoTransformer();

        return $streamerDtoTransformer->arrayToDto($streamerData);
    }

    /**
     * @param int $stationId
     * @param int $streamerId
     *
     * @return StreamerDto
     */
    public function streamer(int $stationId, int $streamerId): StreamerDto
    {
        $response = $this->httpClient->get(sprintf(
            'station/%s/streamer/%s',
            $stationId,
            $streamerId
        ));

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "station/%s/streamer/%s" returned non-successful response with code %s and body: %s',
                $stationId,
                $streamerId,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        $streamerData = json_decode($response->getBody()->getContents(), true);

        $streamerDtoTransformer = new StreamerDtoTransformer();

        return $streamerDtoTransformer->arrayToDto($streamerData);
    }

    /**
     * @param int $stationId
     * @param int $streamerId
     * @param string $username
     * @param string $password
     * @param string $displayName
     * @param string $comments
     * @param bool $isActive
     *
     * @return StreamerDto
     */
    public function updateStreamer(
        int $stationId,
        int $streamerId,
        string $username,
        string $password,
        string $displayName,
        string $comments,
        bool $isActive
    ): StreamerDto {
        $linksDto = new LinksDto('');
        $streamerDto = new StreamerDto(
            $streamerId,
            $username,
            $password,
            $displayName,
            $comments,
            $isActive,
            $linksDto
        );

        $response = $this->httpClient->put(
            sprintf('station/%s/streamer/%s', $stationId, $streamerId),
            ['json' => $streamerDto]
        );

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "station/%s/streamer/%s" returned non-successful response with code %s and body: %s',
                $stationId,
                $streamerId,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        return $streamerDto;
    }

    /**
     * @param int $stationId
     * @param int $streamerId
     *
     * @return void
     */
    public function deleteStreamer(int $stationId, int $streamerId): void
    {
        $response = $this->httpClient->delete(sprintf(
            'station/%s/streamer/%s',
            $stationId,
            $streamerId
        ));

        if ($response->getStatusCode() === 403) {
            throw new AccessDeniedException(
                $response->getBody()->getContents()
            );
        }

        if ($response->getStatusCode() !== 200) {
            throw new ClientRequestException(sprintf(
                'Call to "station/%s/streamer/%s" returned non-successful response with code %s and body: %s',
                $stationId,
                $streamerId,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }
    }
}

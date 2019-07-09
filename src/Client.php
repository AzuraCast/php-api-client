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
            $nowPlayingDtoArray[] = Dto\NowPlayingDto::fromArray($nowPlayingData);
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

        return Dto\NowPlayingDto::fromArray($nowPlayingData);
    }

    /**
     * @return Dto\StationDto[]
     */
    public function stations(): array
    {
        $stationDataArray = $this->request('GET', 'stations');

        $stationDtoArray = [];
        foreach ($stationDataArray as $stationData) {
            $stationDtoArray[] = Dto\StationDto::fromArray($stationData);
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

        return Dto\StationDto::fromArray($stationData);
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

        return Dto\RequestableSongsDto::fromArray($requestableSongsData);
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

        return Dto\StationStatusDto::fromArray($stationStatusData);
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
            $songHistory[] = Dto\SongHistoryDto::fromArray($songHistoryData);
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
            $listenerDtoArray[] = Dto\ListenerDto::fromArray($listenerData);
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
        $mediaFilesDataArray = $this->request(
            'GET',
            sprintf('station/%s/files', $stationId)
        );

        $mediaFileDtoArray = [];
        foreach ($mediaFilesDataArray as $mediaFileData) {
            $mediaFileDtoArray[] = Dto\MediaFileDto::fromArray($mediaFileData);
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
        $mediaFileData = $this->request(
            'POST',
            sprintf('station/%s/files', $stationId),
            ['json' => $uploadFile]
        );

        return Dto\MediaFileDto::fromArray($mediaFileData);
    }

    /**
     * @param string|int $stationId
     *
     * @return Dto\MountpointDto[]
     */
    public function mountpoints($stationId): array
    {
        $mountpointsData = $this->request(
            'GET',
            sprintf('station/%s/mounts',$stationId)
        );

        $mountpoints = [];
        foreach ($mountpointsData as $mountpointData) {
            $mountpoints[] = Dto\MountpointDto::fromArray($mountpointData);
        }
        return $mountpoints;
    }

    /**
     * @return Dto\CustomFieldDto[]
     */
    public function customFields(): array
    {
        $customFieldsData = $this->request(
            'GET',
            'admin/custom_fields'
        );

        $customFields = [];
        foreach ($customFieldsData as $customFieldData) {
            $customFields[] = Dto\CustomFieldDto::fromArray($customFieldData);
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
        $customFieldData = $this->request(
            'GET',
            sprintf('admin/custom_field/%s', $customFieldId)
        );

        return Dto\CustomFieldDto::fromArray($customFieldData);
    }

    /**
     * @param string $name
     * @param string $shortName
     *
     * @return Dto\CustomFieldDto
     */
    public function createCustomField(string $name, string $shortName): Dto\CustomFieldDto
    {
        $customFieldDto = new Dto\CustomFieldDto(
            0,
            $name,
            $shortName
        );

        $customFieldData = $this->request('POST', 'admin/custom_fields', ['json' => $customFieldDto]);
        return Dto\CustomFieldDto::fromArray($customFieldData);
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
        $customFieldDto = new Dto\CustomFieldDto(
            $customFieldId,
            $name,
            $shortName
        );

        $this->request(
            'PUT',
            sprintf('admin/custom_field/%s', $customFieldId),
            ['json' => $customFieldDto]
        );

        return $customFieldDto;
    }

    /**
     * @param int $customFieldId
     *
     * @return void
     */
    public function deleteCustomField(int $customFieldId): void
    {
        $this->request(
            'DELETE',
            sprintf('admin/custom_field/%s', $customFieldId)
        );
    }

    /**
     * @return Dto\UserDto[]
     */
    public function users(): array
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
     */
    public function user(int $userId): Dto\UserDto
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
     */
    public function createUser(
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
     */
    public function deleteUser(int $userId): void
    {
        $this->request(
            'DELETE',
            sprintf('admin/user/%s', $userId)
        );
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
     * @return Dto\RoleDto[]
     */
    public function roles(): array
    {
        $rolesData = $this->request('GET', 'admin/roles');

        $roles = [];
        foreach ($rolesData as $roleData) {
            $roles[] = Dto\RoleDto::fromArray($roleData);
        }
        return $roles;
    }

    /**
     * @param string $name
     * @param string[] $permissionsGlobal
     * @param string[] $permissionsStation
     *
     * @return Dto\RoleDto
     */
    public function createRole(string $name, array $permissionsGlobal, array $permissionsStation): Dto\RoleDto
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
     *
     * @return Dto\RoleDto
     */
    public function role(int $roleId): Dto\RoleDto
    {
        $roleData = $this->request(
            'GET',
            sprintf('admin/role/%s', $roleId)
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
     */
    public function updateRole(
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
     */
    public function deleteRole(int $roleId): void
    {
        $this->request(
            'DELETE',
            sprintf('admin/role/%s', $roleId)
        );
    }

    /**
     * @return Dto\SettingsDto
     */
    public function settings(): Dto\SettingsDto
    {
        $settingsData = $this->request('GET', 'admin/settings');

        return Dto\SettingsDto::fromArray($settingsData);
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
     * @return Dto\SettingsDto
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
    ): Dto\SettingsDto {
        $settingsDto = new Dto\SettingsDto(
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

        $this->request(
            'PUT',
            'admin/settings',
            ['json' => $settingsDto]
        );

        return $settingsDto;
    }

    /**
     * @param int $stationId
     *
     * @return Dto\StreamerDto[]
     */
    public function streamers(int $stationId): array
    {
        $streamersData = $this->request(
            'GET',
            sprintf('station/%s/streamers', $stationId)
        );

        $streamers = [];
        foreach ($streamersData as $streamerData) {
            $streamers[] = Dto\StreamerDto::fromArray($streamerData);
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
     * @return Dto\StreamerDto
     */
    public function createStreamer(
        int $stationId,
        string $username,
        string $password,
        string $displayName,
        string $comments,
        bool $isActive
    ): Dto\StreamerDto {
        $linksDto = new Dto\LinksDto('');
        $streamerDto = new Dto\StreamerDto(
            0,
            $username,
            $password,
            $displayName,
            $comments,
            $isActive,
            $linksDto
        );

        $streamerData = $this->request(
            'POST',
            sprintf('station/%s/streamers', $stationId),
            ['json' => $streamerDto]
        );

        return Dto\StreamerDto::fromArray($streamerData);
    }

    /**
     * @param int $stationId
     * @param int $streamerId
     *
     * @return Dto\StreamerDto
     */
    public function streamer(int $stationId, int $streamerId): Dto\StreamerDto
    {
        $streamerData = $this->request(
            'GET',
            sprintf('station/%s/streamer/%s', $stationId, $streamerId)
        );

        return Dto\StreamerDto::fromArray($streamerData);
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
     * @return Dto\StreamerDto
     */
    public function updateStreamer(
        int $stationId,
        int $streamerId,
        string $username,
        string $password,
        string $displayName,
        string $comments,
        bool $isActive
    ): Dto\StreamerDto {
        $linksDto = new Dto\LinksDto('');
        $streamerDto = new Dto\StreamerDto(
            $streamerId,
            $username,
            $password,
            $displayName,
            $comments,
            $isActive,
            $linksDto
        );

        $this->request(
            'PUT',
            sprintf('station/%s/streamer/%s', $stationId, $streamerId),
            ['json' => $streamerDto]
        );

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
        $this->request(
            'DELETE',
            sprintf('station/%s/streamer/%s', $stationId, $streamerId)
        );
    }
}

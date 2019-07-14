<?php
declare(strict_types=1);

namespace AzuraCast\Api;

use AzuraCast\Api\Dto\UploadFileDto;
use AzuraCast\Api\Exception\ClientRequestException;
use PHPUnit\Framework\TestCase;

class AzuraCastApiClientTest extends TestCase
{
    /**
     * @return void
     */
    public function testNowPlayingSuccessful(): void
    {
        $api = $this->createApiClient();

        $nowPlayingArray = $api->nowPlaying();

        $this->assertNotCount(0, $nowPlayingArray);
    }

    /**
     * @return void
     */
    public function testNowPlayingOnStationSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->nowPlaying();

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testStationsSuccessful(): void
    {
        $api = $this->createApiClient();

        $stations = $api->stations();

        $this->assertNotCount(0, $stations);
    }

    /**
     * @return void
     */
    public function testStationSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->get();

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testStationStatusSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->status();

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testStationHistorySuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->history();

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testRequestableSongsSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->requests()->list();

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testMediaAlbumArtSuccessful(): void
    {
        $api = $this->createApiClient();
        $mediaApi = $api->station($this->getStationId())->media();

        $mediaFiles = $mediaApi->list();

        $albumArtResource = $mediaApi->art(
            $mediaFiles[0]->getUniqueId()
        );

        $this->assertTrue(is_resource($albumArtResource));
    }

    /**
     * @return void
     */
    public function testMediaFilesSuccessful(): void
    {
        $api = $this->createApiClient();
        $mediaApi = $api->station($this->getStationId())->media();

        $mediaFiles = $mediaApi->list();

        $this->assertNotCount(0, $mediaFiles);
    }

    /**
     * @return void
     */
    public function testUploadMediaFileSuccessful(): void
    {
        $api = $this->createApiClient();

        $uploadFileDto = new UploadFileDto(
            'test.mp3',
            file_get_contents(__DIR__ . '/../resources/test.mp3')
        );

        $api->station($this->getStationId())->media()->upload($uploadFileDto);

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testRequestSongSuccessful(): void
    {
        $api = $this->createApiClient();
        $requestsApi = $api->station($this->getStationId())->requests();

        $requestableSongs = $requestsApi->list();

        try {
            $requestsApi->submit(
                $requestableSongs->getRequestableSongs()[0]->getRequestableSongId()
            );
        } catch(ClientRequestException $e) {
            // Ignore the "already requested" error.
            if (false === stripos($e->getMessage(), 'already requested')) {
                throw $e;
            }
        }

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testListenerDetailsSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->listeners();

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testRestartStationSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->restart();

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testPerformFrontendActionSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->frontend('restart');

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testPerformBackendActionSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->backend('restart');

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testCustomFieldsSuccessful(): void
    {
        $api = $this->createApiClient();
        $customFieldsApi = $api->admin()->customFields();

        $name = $this->uniqid();
        $shortName = $this->uniqid();

        // CREATE
        $customFieldDto = $customFieldsApi->create(
            $name,
            $shortName
        );
        $this->assertSame($name, $customFieldDto->getName());
        $this->assertSame($shortName, $customFieldDto->getShortName());

        // GET
        $customFieldGet = $customFieldsApi->get($customFieldDto->getId());
        $this->assertSame($customFieldGet->getName(), $customFieldDto->getName());

        // LIST ALL
        $customFields = $customFieldsApi->list();
        $this->assertNotCount(0, $customFields);

        // UPDATE
        $name = $this->uniqid();
        $shortName = $this->uniqid();

        $customFieldDto = $customFieldsApi->update(
            $customFields[0]->getId(),
            $name,
            $shortName
        );
        $this->assertSame($name, $customFieldDto->getName());
        $this->assertSame($shortName, $customFieldDto->getShortName());

        // DELETE
        $customFieldsApi->delete($customFields[0]->getId());

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testUsersSuccessful(): void
    {
        $api = $this->createApiClient();
        $usersApi = $api->admin()->users();

        // CREATE
        $email = $this->uniqid() . '@example.com';
        $authPassword = $this->uniqid();
        $name = $this->uniqid();
        $locale = 'en_US';
        $theme = 'dark';

        $userDto = $usersApi->create(
            $email,
            $authPassword,
            $name,
            $locale,
            $theme,
            [],
            []
        );

        $this->assertSame($email, $userDto->getEmail());
        $this->assertSame($name, $userDto->getName());
        $this->assertSame($locale, $userDto->getLocale());
        $this->assertSame($theme, $userDto->getTheme());

        // GET
        $userGet = $usersApi->get($userDto->getId());
        $this->assertSame($userGet->getName(), $userDto->getName());

        // LIST ALL
        $users = $usersApi->list();
        $this->assertNotCount(0, $users);

        // UPDATE
        $email = $this->uniqid() . '@example.com';
        $authPassword = $this->uniqid();
        $name = $this->uniqid();
        $locale = 'de_DE';
        $theme = 'dark';

        $userUpdated = $usersApi->update(
            $userDto->getId(),
            $email,
            $authPassword,
            $name,
            $locale,
            $theme,
            [],
            []
        );

        $this->assertSame($userUpdated->getEmail(), $email);

        // DELETE
        $usersApi->delete($userDto->getId());
        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testPermissionsSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->admin()->permissions();

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testRolesSuccessful(): void
    {
        $api = $this->createApiClient();
        $rolesApi = $api->admin()->roles();

        // CREATE
        $roleName = $this->uniqid();

        $roleDto = $rolesApi->create(
            $roleName,
            [],
            []
        );
        $this->assertSame($roleName, $roleDto->getName());

        // GET
        $roleGet = $rolesApi->get($roleDto->getId());
        $this->assertSame($roleGet->getName(), $roleDto->getName());

        // LIST ALL
        $roles = $rolesApi->list();
        $this->assertNotCount(0, $roles);

        // UPDATE
        $roleName = $this->uniqid();

        $roleUpdated = $rolesApi->update(
            $roleDto->getId(),
            $roleName,
            [],
            []
        );

        $this->assertSame($roleName, $roleUpdated->getName());

        // DELETE
        $rolesApi->delete($roleDto->getId());
        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testSettingsSuccessful(): void
    {
        $api = $this->createApiClient();
        $settingsApi = $api->admin()->settings();

        $settingsDto = $settingsApi->list();

        $settingsApi->update(
            $settingsDto->getBaseUrl(),
            $settingsDto->getInstanceName(),
            $settingsDto->getTimezone(),
            $settingsDto->getPreferBrowserUrl(),
            $settingsDto->getUseRadioProxy(),
            $settingsDto->getHistoryKeepDays(),
            $settingsDto->getAlwaysUseSsl(),
            $settingsDto->getApiAccessControl(),
            $settingsDto->getAnalytics(),
            $settingsDto->getCentralUpdatesChannel(),
            $settingsDto->getPublicTheme(),
            $settingsDto->getHideAlbumArt(),
            $settingsDto->getHomepageRedirectUrl(),
            $settingsDto->getDefaultAlbumArtUrl(),
            $settingsDto->getHideProductName(),
            $settingsDto->getCustomCssPublic(),
            $settingsDto->getCustomJsPublic(),
            $settingsDto->getCustomCssInternal()
        );

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testStreamersSuccessful(): void
    {
        $api = $this->createApiClient();
        $streamersApi = $api->station($this->getStationId())->streamers();

        // CREATE
        $username = $this->uniqid();
        $password = $this->uniqid();
        
        $streamerDto = $streamersApi->create(
            $username,
            $password,
            $this->uniqid(),
            $this->uniqid(),
            true
        );
        $this->assertSame($streamerDto->getUsername(), $username);
        
        // GET
        $streamerGet = $streamersApi->get($streamerDto->getId());
        
        $this->assertSame($streamerDto->getUsername(), $streamerGet->getUsername());
        
        // LIST ALL
        $streamers = $streamersApi->list();
        
        $this->assertNotCount(0, $streamers);
        
        // UPDATE
        $username = $this->uniqid();
        $password = $this->uniqid();

        $streamerUpdate = $streamersApi->update(
            $streamerDto->getId(),
            $username,
            $password,
            $streamerDto->getDisplayName(),
            $streamerDto->getComments(),
            $streamerDto->getIsActive()
        );
        
        $this->assertSame($streamerUpdate->getUsername(), $username);
        
        // DELETE
        $streamersApi->delete($streamerDto->getId());

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testMountpointsSuccessful(): void
    {
        $api = $this->createApiClient();

        $mountpoints = $api->station($this->getStationId())->mounts();

        $this->assertNotCount(0, $mountpoints);
    }

    /**
     * @return Client
     */
    private function createApiClient(): Client
    {
        return Client::create($this->getHost(), $this->getApiKey());
    }

    /**
     * @return string
     */
    private function getHost(): string
    {
        return getenv('AZURACAST_HOST') ?? '';
    }

    /**
     * @return string
     */
    private function getApiKey(): string
    {
        return getenv('AZURACAST_API_KEY') ?? '';
    }

    /**
     * @return int
     */
    private function getStationId(): int
    {
        return (int)getenv('AZURACAST_STATION_ID') ?? 1;
    }

    /**
     * @return string
     */
    private function uniqid(): string
    {
        return uniqid('', false);
    }
}

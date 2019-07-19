<?php
declare(strict_types=1);

namespace AzuraCast\Api;

use AzuraCast\Api\Dto\UploadFileDto;
use AzuraCast\Api\Exception\ClientRequestException;
use Dotenv\Dotenv;
use Faker\Factory as Faker;
use PHPUnit\Framework\TestCase;

class AzuraCastApiClientTest extends TestCase
{
    /**
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        if (getenv('AZURACAST_HOST') === false) {
            $dotenv = Dotenv::create(__DIR__ . '/../..');
            $dotenv->load();
        }
    }

    /**
     * @return void
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testNowPlayingSuccessful(): void
    {
        $api = $this->createApiClient();

        $nowPlayingArray = $api->nowPlaying();

        $this->assertNotCount(0, $nowPlayingArray);
    }

    /**
     * @return void
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testNowPlayingOnStationSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->nowPlaying();

        $this->assertTrue(true);
    }

    /**
     * @return void
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testStationsSuccessful(): void
    {
        $api = $this->createApiClient();

        $stations = $api->stations();

        $this->assertNotCount(0, $stations);
    }

    /**
     * @return void
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testStationSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->get();

        $this->assertTrue(true);
    }

    /**
     * @return void
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testStationStatusSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->status();

        $this->assertTrue(true);
    }

    /**
     * @return void
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testStationHistorySuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->history();

        $this->assertTrue(true);
    }

    /**
     * @return void
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testRequestableSongsSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->requests()->list();

        $this->assertTrue(true);
    }

    /**
     * @return void
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testUploadMediaFileSuccessful(): void
    {
        $api = $this->createApiClient();
        $mediaApi = $api->station($this->getStationId())->media();

        $uploadFileDto = new UploadFileDto(
            'test.mp3',
            file_get_contents(__DIR__ . '/../resources/test.mp3')
        );

        $mediaDto = $mediaApi->upload($uploadFileDto);

        $mediaFiles = $mediaApi->list();
        $this->assertNotCount(0, $mediaFiles);

        $albumArtResource = $mediaApi->art(
            $mediaDto->getUniqueId()
        );

        $this->assertTrue(is_resource($albumArtResource));
    }

    /**
     * @return void
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     * @throws Exception\RequestsDisabledException
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
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testListenerDetailsSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->listeners();

        $this->assertTrue(true);
    }

    /**
     * @return void
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testRestartStationSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->restart();

        $this->assertTrue(true);
    }

    /**
     * @return void
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testPerformFrontendActionSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->frontend('restart');

        $this->assertTrue(true);
    }

    /**
     * @return void
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testPerformBackendActionSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->station($this->getStationId())->backend('restart');

        $this->assertTrue(true);
    }

    /**
     * @return void
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testCustomFieldsSuccessful(): void
    {
        $api = $this->createApiClient();
        $customFieldsApi = $api->admin()->customFields();

        $faker = Faker::create();

        $name = $faker->word;
        $shortName = strtolower(str_replace(' ', '_', $name));

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
        $name = $faker->word;
        $shortName = strtolower(str_replace(' ', '_', $name));

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
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testUsersSuccessful(): void
    {
        $api = $this->createApiClient();
        $usersApi = $api->admin()->users();

        // CREATE
        $faker = Faker::create();

        $email = $faker->email;
        $authPassword = $faker->password;
        $name = $faker->name;
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
        $email = $faker->email;
        $authPassword = $faker->password;
        $name = $faker->name;
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
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testPermissionsSuccessful(): void
    {
        $api = $this->createApiClient();

        $api->admin()->permissions();

        $this->assertTrue(true);
    }

    /**
     * @return void
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testRolesSuccessful(): void
    {
        $api = $this->createApiClient();
        $rolesApi = $api->admin()->roles();

        // CREATE
        $faker = Faker::create();

        $roleName = $faker->jobTitle;

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
        $roleName = $faker->jobTitle;

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
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
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
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
     */
    public function testStreamersSuccessful(): void
    {
        $api = $this->createApiClient();
        $streamersApi = $api->station($this->getStationId())->streamers();

        // CREATE
        $faker = Faker::create();

        $username = $faker->userName;
        $password = $faker->word;
        $name = $faker->name;
        $comments = $faker->words(5, true);
        
        $streamerDto = $streamersApi->create(
            $username,
            $password,
            $name,
            $comments,
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
        $username = $faker->userName;
        $password = $faker->word;

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
     *
     * @throws ClientRequestException
     * @throws Exception\AccessDeniedException
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
        $azuracastHost = getenv('AZURACAST_HOST');

        if ($azuracastHost === false) {
            return '';
        }

        return $azuracastHost;
    }

    /**
     * @return string
     */
    private function getApiKey(): string
    {
        $azuracastApiKey = getenv('AZURACAST_API_KEY');

        if ($azuracastApiKey === false) {
            return '';
        }

        return $azuracastApiKey;
    }

    /**
     * @return int
     */
    private function getStationId(): int
    {
        $azuracastStationId = getenv('AZURACAST_STATION_ID');

        if ($azuracastStationId === false) {
            return 1;
        }

        return (int)$azuracastStationId;
    }
}

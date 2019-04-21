<?php

declare(strict_types=1);

namespace Vaalyn\AzuraCastApiClient;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

class AzuraCastApiClientTest extends TestCase {
	/**
	 * @return void
	 */
	public static function setUpBeforeClass(): void {
		$dotenv = Dotenv::create(__DIR__ . '/../..');
		$dotenv->load();
    }

	/**
	 * @return void
	 */
	public function testNowPlayingSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$nowPlayingArray = $azuraCastApiClient->nowPlaying();

		$this->assertNotCount(0, $nowPlayingArray);
	}

	/**
	 * @return void
	 */
	public function testNowPlayingOnStationSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$azuraCastApiClient->nowPlayingOnStation($this->getStationId());

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testStationsSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$stations = $azuraCastApiClient->stations();

		$this->assertNotCount(0, $stations);
	}

	/**
	 * @return void
	 */
	public function testStationSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$azuraCastApiClient->station($this->getStationId());

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testStationStatusSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$azuraCastApiClient->stationStatus($this->getStationId());

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testStationHistorySuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$azuraCastApiClient->stationHistory($this->getStationId());

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testRequestableSongsSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$azuraCastApiClient->requestableSongs($this->getStationId());

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testAllRequestableSongsSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$allRequestableSongs = $azuraCastApiClient->allRequestableSongs($this->getStationId());

		$this->assertNotCount(0, $allRequestableSongs);
	}

	/**
	 * @return void
	 */
	public function testSongAlbumArtSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$requestableSongs = $azuraCastApiClient->requestableSongs($this->getStationId());

		$albumArtResource = $azuraCastApiClient->songAlbumArt(
			$this->getStationId(),
			$requestableSongs->getRequestableSongs()[0]->getSong()->getId()
		);

		$this->assertTrue(is_resource($albumArtResource));
	}

	/**
	 * @return void
	 */
	public function testRequestSongSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$requestableSongs = $azuraCastApiClient->requestableSongs($this->getStationId());

		$azuraCastApiClient->requestSong(
			$this->getStationId(),
			$requestableSongs->getRequestableSongs()[0]->getRequestableSongId()
		);

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testListenerDetailsSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$azuraCastApiClient->listenerDetails($this->getStationId());

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testRestartStationSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$azuraCastApiClient->restartStation($this->getStationId());

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testPerformFrontendActionSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$azuraCastApiClient->performFrontendAction($this->getStationId(), 'restart');

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testPerformBackendActionSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$azuraCastApiClient->performBackendAction($this->getStationId(), 'restart');

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testCustomFieldsSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$customFields = $azuraCastApiClient->customFields();

		$this->assertNotCount(0, $customFields);
	}

	/**
	 * @return void
	 */
	public function testCusomFieldSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$customFields = $azuraCastApiClient->customFields();

		$azuraCastApiClient->customField(
			$customFields[0]->getId()
		);

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testCreateCustomFieldSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$name = uniqid();
		$shortName = uniqid();

		$customFieldDto = $azuraCastApiClient->createCustomField($name, $shortName);

		$this->assertSame($name, $customFieldDto->getName());
		$this->assertSame($shortName, $customFieldDto->getShortName());
	}

	/**
	 * @return void
	 */
	public function testUpdateCustomFieldSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$customFields = $azuraCastApiClient->customFields();

		$name = uniqid();
		$shortName = uniqid();

		$customFieldDto = $azuraCastApiClient->updateCustomField(
			$customFields[0]->getId(),
			$name,
			$shortName
		);

		$this->assertSame($name, $customFieldDto->getName());
		$this->assertSame($shortName, $customFieldDto->getShortName());
	}

	/**
	 * @return void
	 */
	public function testDeleteCustomFieldSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$customFields = $azuraCastApiClient->customFields();

		$azuraCastApiClient->deleteCustomField(
			$customFields[0]->getId()
		);

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testUsersSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$users = $azuraCastApiClient->users();

		$this->assertNotCount(0, $users);
	}

	/**
	 * @return void
	 */
	public function testUserSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$users = $azuraCastApiClient->users();

		$azuraCastApiClient->user(
			$users[0]->getId()
		);

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testCreateUserSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$email = uniqid() . '@example.com';
		$authPassword = uniqid();
		$name = uniqid();
		$timezone = 'Europe/Berlin';
		$locale = 'de_DE';
		$theme = 'dark';
		$roles = [];
		$apiKeys = [];

		$userDto = $azuraCastApiClient->createUser(
			$email,
			$authPassword,
			$name,
			$timezone,
			$locale,
			$theme,
			$roles,
			$apiKeys
		);

		$this->assertSame($email, $userDto->getEmail());
		$this->assertSame($name, $userDto->getName());
		$this->assertSame($timezone, $userDto->getTimezone());
		$this->assertSame($locale, $userDto->getLocale());
		$this->assertSame($theme, $userDto->getTheme());
	}

	/**
	 * @return void
	 */
	public function testUpdateUserSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$email = uniqid() . '@example.com';
		$authPassword = uniqid();
		$name = uniqid();
		$timezone = 'Europe/Berlin';
		$locale = 'de_DE';
		$theme = 'dark';
		$roles = [];
		$apiKeys = [];

		$userDto = $azuraCastApiClient->createUser(
			$email,
			$authPassword,
			$name,
			$timezone,
			$locale,
			$theme,
			$roles,
			$apiKeys
		);

		foreach ($azuraCastApiClient->users() as $user) {
			if ($user->getName() !== $name) {
				continue;
			}

			$userDto = $user;
		}

		$azuraCastApiClient->updateUser(
			$userDto->getId(),
			$userDto->getEmail(),
			$authPassword,
			$userDto->getName(),
			$userDto->getTimezone(),
			$userDto->getLocale(),
			$userDto->getTheme(),
			$userDto->getRoles(),
			$userDto->getApiKeys()
		);

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testDeleteUserSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$email = uniqid() . '@example.com';
		$authPassword = uniqid();
		$name = uniqid();
		$timezone = 'Europe/Berlin';
		$locale = 'de_DE';
		$theme = 'dark';
		$roles = [];
		$apiKeys = [];

		$userDto = $azuraCastApiClient->createUser(
			$email,
			$authPassword,
			$name,
			$timezone,
			$locale,
			$theme,
			$roles,
			$apiKeys
		);

		foreach ($azuraCastApiClient->users() as $user) {
			if ($user->getName() !== $name) {
				continue;
			}

			$userDto = $user;
		}

		$azuraCastApiClient->deleteUser($userDto->getId());

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testPermissionsSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$permissions = $azuraCastApiClient->users();

		$azuraCastApiClient->permissions();

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testRolesSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$roles = $azuraCastApiClient->roles();

		$this->assertNotCount(0, $roles);
	}

	/**
	 * @return void
	 */
	public function testCreateRoleSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$role = $azuraCastApiClient->createRole(
			uniqid(),
			[],
			[]
		);

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testRoleSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$roles = $azuraCastApiClient->roles();

		$azuraCastApiClient->role(
			$roles[0]->getId()
		);

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testUpdateRoleSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$name = uniqid();
		$newName = uniqid();
		$permissionsGlobal = [];
		$permissionsStation = [];

		$roleDto = $azuraCastApiClient->createRole($name, $permissionsGlobal, $permissionsStation);

		$roleDto = $azuraCastApiClient->updateRole(
			$roleDto->getId(),
			$newName,
			$permissionsGlobal,
			$permissionsStation
		);

		$this->assertSame($newName, $roleDto->getName());
	}

	/**
	 * @return void
	 */
	public function testDeleteRoleSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$name = uniqid();
		$permissionsGlobal = [];
		$permissionsStation = [];

		$roleDto = $azuraCastApiClient->createRole($name, $permissionsGlobal, $permissionsStation);

		foreach ($azuraCastApiClient->roles() as $role) {
			if ($role->getName() !== $name) {
				continue;
			}

			$roleDto = $role;
		}

		$azuraCastApiClient->deleteRole($roleDto->getId());

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testSettingsSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$settings = $azuraCastApiClient->settings();

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testUpdateSettingsSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$settingsDto = $azuraCastApiClient->settings();

		$settingsDto = $azuraCastApiClient->updateSettings(
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
	public function testStreamersSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$streamer = $azuraCastApiClient->createStreamer(
			$this->getStationId(),
			uniqid(),
			uniqid(),
			uniqid(),
			uniqid(),
			true
		);

		$streamers = $azuraCastApiClient->streamers($this->getStationId());

		$this->assertNotCount(0, $streamers);
	}

	/**
	 * @return void
	 */
	public function testCreateStreamerSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$streamer = $azuraCastApiClient->createStreamer(
			$this->getStationId(),
			uniqid(),
			uniqid(),
			uniqid(),
			uniqid(),
			true
		);

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testStreamerSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$streamer = $azuraCastApiClient->createStreamer(
			$this->getStationId(),
			uniqid(),
			uniqid(),
			uniqid(),
			uniqid(),
			true
		);

		$streamerDto = $azuraCastApiClient->streamer(
			$this->getStationId(),
			$streamer->getId()
		);

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testUpdateStreamerSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$username = uniqid();
		$password = uniqid();
		$displayName = uniqid();
		$comments = uniqid();
		$isActive = true;

		$streamer = $azuraCastApiClient->createStreamer(
			$this->getStationId(),
			$username,
			$password,
			$displayName,
			$comments,
			$isActive
		);

		$streamerDto = $azuraCastApiClient->updateStreamer(
			$this->getStationId(),
			$streamer->getId(),
			$username,
			$password,
			$displayName,
			$comments,
			false
		);

		$this->assertSame(false, $streamerDto->getIsActive());
	}

	/**
	 * @return void
	 */
	public function testDeleteStreamerSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$username = uniqid();
		$password = uniqid();
		$displayName = uniqid();
		$comments = uniqid();
		$isActive = true;

		$streamerDto = $azuraCastApiClient->createStreamer(
			$this->getStationId(),
			$username,
			$password,
			$displayName,
			$comments,
			$isActive
		);

		foreach ($azuraCastApiClient->streamers($this->getStationId()) as $streamer) {
			if ($streamer->getUsername() !== $username) {
				continue;
			}

			$streamerDto = $streamer;
		}

		$azuraCastApiClient->deleteStreamer(
			$this->getStationId(),
			$streamerDto->getId()
		);

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testMountpointsSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$mountpoints = $azuraCastApiClient->mountpoints($this->getStationId());

		$this->assertNotCount(0, $mountpoints);
	}

	/**
	 * @return AzuraCastApiClient
	 */
	private function createApiClient(): AzuraCastApiClient {
		return new AzuraCastApiClient($this->getHost(), $this->getApiKey());
	}

	/**
	 * @return string
	 */
	private function getHost(): string {
		return getenv('AZURACAST_HOST') ?? '';
	}

	/**
	 * @return string
	 */
	private function getApiKey(): string {
		return getenv('AZURACAST_API_KEY') ?? '';
	}

	/**
	 * @return int
	 */
	private function getStationId(): int {
		return (int) getenv('AZURACAST_STATION_ID') ?? 1;
	}
}

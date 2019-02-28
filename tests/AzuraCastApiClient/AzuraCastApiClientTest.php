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
			$requestableSongs->getRequestableSongs()[0]->getSong()->getId()
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

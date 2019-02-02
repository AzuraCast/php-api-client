<?php

declare(strict_types=1);

namespace Vaalyn\AzuraCastApiClient;

use PHPUnit\Framework\TestCase;

class AzuraCastApiClientTest extends TestCase {
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

		$azuraCastApiClient->nowPlayingOnStation(1);

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

		$azuraCastApiClient->station(1);

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testStationStatusSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$azuraCastApiClient->stationStatus(1);

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testRequestableSongsSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$azuraCastApiClient->requestableSongs(1);

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testAllRequestableSongsSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$allRequestableSongs = $azuraCastApiClient->allRequestableSongs(1);

		$this->assertNotCount(0, $allRequestableSongs);
	}

	/**
	 * @return void
	 */
	public function testRequestSongSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$requestableSongs = $azuraCastApiClient->requestableSongs(1);

		$azuraCastApiClient->requestSong(
			1,
			$requestableSongs->getRequestableSongs()[0]->getSong()->getId()
		);

		$this->assertTrue(true);
	}

	/**
	 * @return void
	 */
	public function testListenerDetailsSuccessful(): void {
		$azuraCastApiClient = $this->createApiClient();

		$azuraCastApiClient->listenerDetails(1);

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
		return 'http://demo.azuracast.com';
	}

	/**
	 * @return string
	 */
	private function getApiKey(): string {
		return '';
	}
}

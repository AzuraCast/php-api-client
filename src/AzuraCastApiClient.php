<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient;

use GuzzleHttp\Client;
use Vaalyn\AzuraCastApiClient\Dto\ListenerDto;
use Vaalyn\AzuraCastApiClient\Dto\NowPlayingDto;
use Vaalyn\AzuraCastApiClient\Dto\StationDto;
use Vaalyn\AzuraCastApiClient\Dto\RequestableSongsDto;
use Vaalyn\AzuraCastApiClient\Exception\AzuraCastApiAccessDeniedException;
use Vaalyn\AzuraCastApiClient\Exception\AzuraCastApiClientRequestException;
use Vaalyn\AzuraCastApiClient\Exception\AzuraCastRequestsDisabledException;
use Vaalyn\AzuraCastApiClient\Transformer\ListenerDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\NowPlayingDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\RequestableSongsDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\StationDtoTransformer;

class AzuraCastApiClient {
	/**
	 * @var Client
	 */
	protected $httpClient;

	/**
	 * @param string $host
	 * @param string|null $apiKey
	 */
	public function __construct(string $host, ?string $apiKey = null) {
		$this->httpClient = $this->createHttpClient($host, $apiKey);
	}

	/**
	 * @return NowPlayingDto[]
	 */
	public function nowPlaying(): array {
		$response = $this->httpClient->get('nowplaying');

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "/nowplaying" returned non-successful response with code %s and body: %s',
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}

		$nowPlayingDataArray = json_decode($response->getBody()->getContents(), true);

		$nowPlayingDtoTransformer = new NowPlayingDtoTransformer();

		$nowPlayingDtoArray = [];

		foreach ($nowPlayingDataArray as $nowPlayingData) {
			$nowPlayingDtoArray[] = $nowPlayingDtoTransformer->arrayToDto($nowPlayingData);
		}

		return $nowPlayingDtoArray;
	}

	/**
	 * @param int $stationId
	 *
	 * @return NowPlayingDto
	 */
	public function nowPlayingOnStation(int $stationId): NowPlayingDto {
		$response = $this->httpClient->get(sprintf(
			'nowplaying/%s',
			$stationId
		));

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "/nowplaying/%s" returned non-successful response with code %s and body: %s',
				$stationId,
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}

		$nowPlayingData = json_decode($response->getBody()->getContents(), true);

		$nowPlayingDtoTransformer = new NowPlayingDtoTransformer();

		return $nowPlayingDtoTransformer->arrayToDto($nowPlayingData);
	}

	/**
	 * @return StationDto[]
	 */
	public function stations(): array {
		$response = $this->httpClient->get('stations');

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "/stations" returned non-successful response with code %s and body: %s',
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}

		$stationDataArray = json_decode($response->getBody()->getContents(), true);

		$stationDtoTransformer = new StationDtoTransformer();

		$stationDtoArray = [];

		foreach ($stationDataArray as $stationData) {
			$stationDtoArray[] = $stationDtoTransformer->arrayToDto($stationData);
		}

		return $stationDtoArray;
	}

	/**
	 * @param int $stationId
	 *
	 * @return StationDto
	 */
	public function station(int $stationId): StationDto {
		$response = $this->httpClient->get(sprintf(
			'station/%s',
			$stationId
		));

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "/station/%s" returned non-successful response with code %s and body: %s',
				$stationId,
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}

		$stationData = json_decode($response->getBody()->getContents(), true);

		$stationDtoTransformer = new StationDtoTransformer();

		return $stationDtoTransformer->arrayToDto($stationData);
	}

	/**
	 * @param int $stationId
	 * @param int $page
	 *
	 * @return RequestableSongsDto
	 */
	public function requestableSongs(int $stationId, int $page = 1): RequestableSongsDto {
		$response = $this->httpClient->get(sprintf(
			'station/%s/requests?page=%s',
			$stationId,
			$page
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastRequestsDisabledException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "/station/%s/requests?page=%s" returned non-successful response with code %s and body: %s',
				$stationId,
				$page,
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}

		$requestableSongsData = json_decode($response->getBody()->getContents(), true);

		$requestableSongsDtoTransformer = new RequestableSongsDtoTransformer();

		return $requestableSongsDtoTransformer->arrayToDto($requestableSongsData);
	}

	/**
	 * @param int $stationId
	 * @param string $uniqueId
	 *
	 * @return void
	 */
	public function requestSong(int $stationId, string $uniqueId): void {
		$response = $this->httpClient->post(sprintf(
			'station/%s/request/%s',
			$stationId,
			$uniqueId
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastRequestsDisabledException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "/station/%s/request/%s" returned non-successful response with code %s and body: %s',
				$stationId,
				$uniqueId,
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}
	}

	/**
	 * @param int $stationId
	 *
	 * @return ListenerDto[]
	 */
	public function listenerDetails(int $stationId): array {
		$response = $this->httpClient->get(sprintf(
			'station/%s/listeners',
			$stationId
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "/station/%s/listeners" returned non-successful response with code %s and body: %s',
				$stationId,
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}

		$listenerDataArray = json_decode($response->getBody()->getContents(), true);

		$listenerDtoTransformer = new ListenerDtoTransformer();

		$listenerDtoArray = [];

		foreach ($listenerDataArray as $listenerData) {
			$listenerDtoArray[] = $listenerDtoTransformer->arrayToDto($listenerData);
		}

		return $listenerDtoArray;
	}

	/**
	 * @param int $stationId
	 *
	 * @return void
	 */
	public function restartStation(int $stationId): void {
		$response = $this->httpClient->post(sprintf(
			'station/%s/restart',
			$stationId
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "/station/%s/restart" returned non-successful response with code %s and body: %s',
				$stationId,
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}
	}

	/**
	 * @param int $stationId
	 * @param string $action
	 *
	 * @return void
	 */
	public function performFrontendAction(int $stationId, string $action): void {
		$response = $this->httpClient->post(sprintf(
			'station/%s/frontend/%s',
			$stationId,
			$action
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "/station/%s/frontend/%s" returned non-successful response with code %s and body: %s',
				$stationId,
				$action,
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}
	}

	/**
	 * @param int $stationId
	 * @param string $action
	 *
	 * @return void
	 */
	public function performBackendAction(int $stationId, string $action): void {
		$response = $this->httpClient->post(sprintf(
			'station/%s/backend/%s',
			$stationId,
			$action
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "/station/%s/frontend/%s" returned non-successful response with code %s and body: %s',
				$stationId,
				$action,
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}
	}

	/**
	 * @param string $baseUri
	 * @param string|null $apiKey
	 *
	 * @return Client
	 */
	protected function createHttpClient(string $baseUri, ?string $apiKey): Client {
		$options = [
			'base_uri' => $baseUri . '/api/',
			'allow_redirects' => true,
		];

		if ($apiKey !== null) {
			$options['headers'] = [
				'Authorization' => 'Bearer ' . $apiKey
			];
		}

		return new Client($options);
	}
}

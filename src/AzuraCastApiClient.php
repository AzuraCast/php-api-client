<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient;

use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Vaalyn\AzuraCastApiClient\Dto\UserDto;
use Vaalyn\AzuraCastApiClient\Dto\LinksDto;
use Vaalyn\AzuraCastApiClient\Dto\ListenerDto;
use Vaalyn\AzuraCastApiClient\Dto\NowPlayingDto;
use Vaalyn\AzuraCastApiClient\Dto\StationDto;
use Vaalyn\AzuraCastApiClient\Dto\CustomFieldDto;
use Vaalyn\AzuraCastApiClient\Dto\SongHistoryDto;
use Vaalyn\AzuraCastApiClient\Dto\StationStatusDto;
use Vaalyn\AzuraCastApiClient\Dto\RequestableSongsDto;
use Vaalyn\AzuraCastApiClient\Exception\AzuraCastApiAccessDeniedException;
use Vaalyn\AzuraCastApiClient\Exception\AzuraCastApiClientRequestException;
use Vaalyn\AzuraCastApiClient\Exception\AzuraCastRequestsDisabledException;
use Vaalyn\AzuraCastApiClient\Transformer\ListenerDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\NowPlayingDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\CustomFieldDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\SongHistoryDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\StationStatusDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\RequestableSongsDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\StationDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\UserDtoTransformer;

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
	 *
	 * @return StationStatusDto
	 */
	public function stationStatus(int $stationId): StationStatusDto {
		$response = $this->httpClient->get(sprintf(
			'station/%s/status',
			$stationId
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "/station/%s" returned non-successful response with code %s and body: %s',
				$stationId,
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}

		$stationStatusData = json_decode($response->getBody()->getContents(), true);

		$stationStatusDtoTransformer = new StationStatusDtoTransformer();

		return $stationStatusDtoTransformer->arrayToDto($stationStatusData);
	}

	/**
	 * @param int $stationId
	 * @param \DateTime|null $start
	 * @param \DateTime|null $end
	 *
	 * @return SongHistoryDto[]
	 */
	public function stationHistory(int $stationId, ?\DateTime $start = null, ?\DateTime $end = null): array {
		$response = $this->httpClient->get(sprintf(
			'station/%s/history',
			$stationId
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "/station/%s/history" returned non-successful response with code %s and body: %s',
				$stationId,
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}

		$songHistoryDataArray = json_decode($response->getBody()->getContents(), true);

		$songHistoryDtoTransformer = new SongHistoryDtoTransformer();

		$songHistory = [];

		foreach ($songHistoryDataArray as $songHistoryData) {
			$songHistory[] = $songHistoryDtoTransformer->arrayToDto($songHistoryData);
		}

		return $songHistory;
	}

	/**
	 * @param int $stationId
	 * @param int $page
	 *
	 * @return RequestableSongsDto
	 */
	public function requestableSongs(int $stationId, int $page = 1): RequestableSongsDto {
		$response = $this->httpClient->get(sprintf(
			'station/%s/requests?per_page=50&page=%s',
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
	 *
	 * @return RequestableSongsDto[]
	 */
	public function allRequestableSongs(int $stationId): array
	{
		$requestableSongsDto = $this->requestableSongs($stationId, 1, 50);

		$requests = function (int $stationId) use($requestableSongsDto) {
			for ($page = 1; $page <= $requestableSongsDto->getPagesTotal(); $page++) {
				$uri = sprintf('station/%s/requests?per_page=50&page=%s', $stationId, $page);
				yield new Request('GET', $uri);
			}
		};

		$requestableSongs = [];

		$requestableSongsDtoTransformer = new RequestableSongsDtoTransformer();

		$pool = new Pool($this->httpClient, $requests($stationId), [
			'concurrency' => 5,
			'fulfilled' => function ($response, $index) use(&$requestableSongs, $requestableSongsDtoTransformer) {
				if ($response->getStatusCode() !== 200) {
					return;
				}

				$requestableSongsData = json_decode($response->getBody()->getContents(), true);
				$requestableSongs[] = $requestableSongsDtoTransformer->arrayToDto($requestableSongsData);
			}
		]);

		$promise = $pool->promise();
		$promise->wait();

		return $requestableSongs;
	}

	/**
	 * @param int $stationId
	 * @param string $uniqueId
	 *
	 * @return resource|bool
	 */
	public function songAlbumArt(int $stationId, string $uniqueId) {
		$response = $this->httpClient->get(sprintf(
			'station/%s/art/%s',
			$stationId,
			$uniqueId
		));

		if ($response->getStatusCode() !== 200 && $response->getStatusCode() !== 404) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "/station/%s" returned non-successful response with code %s and body: %s',
				$stationId,
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}

		$imageData = $response->getBody()->getContents();

		return imagecreatefromstring($imageData);
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
				'Call to "/station/%s/backend/%s" returned non-successful response with code %s and body: %s',
				$stationId,
				$action,
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}
	}

	/**
	 * @return CustomFieldDto[]
	 */
	public function customFields(): array {
		$response = $this->httpClient->get('admin/custom_fields');

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "/admin/custom_fields" returned non-successful response with code %s and body: %s',
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}

		$customFieldsData = json_decode($response->getBody()->getContents(), true);

		$customFieldDtoTransformer = new CustomFieldDtoTransformer();

		$customFields = [];

		foreach ($customFieldsData as $customFieldData) {
			$customFields[] = $customFieldDtoTransformer->arrayToDto($customFieldData);
		}

		return $customFields;
	}

	/**
	 * @param int $customFieldId
	 *
	 * @return CustomFieldDto
	 */
	public function customField(int $customFieldId): CustomFieldDto {
		$response = $this->httpClient->get(sprintf(
			'admin/custom_field/%s',
			$customFieldId
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "admin/custom_field/%s" returned non-successful response with code %s and body: %s',
				$customFieldId,
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}

		$customFieldData = json_decode($response->getBody()->getContents(), true);

		$customFieldDtoTransformer = new CustomFieldDtoTransformer();

		return $customFieldDtoTransformer->arrayToDto($customFieldData);
	}

	/**
	 * @param string $name
	 * @param string $shortName
	 *
	 * @return CustomFieldDto
	 */
	public function createCustomField(string $name, string $shortName): CustomFieldDto {
		$customFieldDto = new CustomFieldDto(0, $name, $shortName);

		$response = $this->httpClient->post(
			'admin/custom_fields',
			['json' => $customFieldDto]
		);

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "admin/custom_fields" returned non-successful response with code %s and body: %s',
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}

		$customFieldData = json_decode($response->getBody()->getContents(), true);

		$customFieldDtoTransformer = new CustomFieldDtoTransformer();

		return $customFieldDtoTransformer->arrayToDto($customFieldData);
	}

	/**
	 * @param int $customFieldId
	 * @param string $name
	 * @param string $shortName
	 *
	 * @return CustomFieldDto
	 */
	public function updateCustomField(int $customFieldId, string $name, string $shortName): CustomFieldDto {
		$customFieldDto = new CustomFieldDto($customFieldId, $name, $shortName);

		$response = $this->httpClient->put(
			sprintf('admin/custom_field/%s', $customFieldId),
			['json' => $customFieldDto]
		);

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
	public function deleteCustomField(int $customFieldId): void {
		$response = $this->httpClient->delete(sprintf(
			'admin/custom_field/%s', $customFieldId
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
	public function users(): array {
		$response = $this->httpClient->get('admin/users');

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
	public function user(int $userId): UserDto {
		$response = $this->httpClient->get(sprintf(
			'admin/user/%s',
			$userId
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "admin/user/%s" returned non-successful response with code %s and body: %s',
				$customFieldId,
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
	 * @param string $timezone
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
		string $timezone,
		string $locale,
		string $theme,
		array $roles,
		array $apiKeys
	): UserDto {
		$userDto = new UserDto(
			0,
			$email,
			$name,
			$timezone,
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
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
	 * @param string $baseUri
	 * @param string|null $apiKey
	 *
	 * @return Client
	 */
	public function createHttpClient(string $baseUri, ?string $apiKey): Client {
		$options = [
			'base_uri' => $baseUri . '/api/',
			'allow_redirects' => true,
			'http_errors' => false
		];

		if ($apiKey !== null) {
			$options['headers'] = [
				'Authorization' => 'Bearer ' . $apiKey
			];
		}

		return new Client($options);
	}
}

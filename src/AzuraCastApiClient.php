<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient;

use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Vaalyn\AzuraCastApiClient\Dto\RoleDto;
use Vaalyn\AzuraCastApiClient\Dto\UserDto;
use Vaalyn\AzuraCastApiClient\Dto\LinksDto;
use Vaalyn\AzuraCastApiClient\Dto\ListenerDto;
use Vaalyn\AzuraCastApiClient\Dto\SettingsDto;
use Vaalyn\AzuraCastApiClient\Dto\StreamerDto;
use Vaalyn\AzuraCastApiClient\Dto\MediaFileDto;
use Vaalyn\AzuraCastApiClient\Dto\MountpointDto;
use Vaalyn\AzuraCastApiClient\Dto\NowPlayingDto;
use Vaalyn\AzuraCastApiClient\Dto\StationDto;
use Vaalyn\AzuraCastApiClient\Dto\UploadFileDto;
use Vaalyn\AzuraCastApiClient\Dto\CustomFieldDto;
use Vaalyn\AzuraCastApiClient\Dto\PermissionsDto;
use Vaalyn\AzuraCastApiClient\Dto\SongHistoryDto;
use Vaalyn\AzuraCastApiClient\Dto\StationStatusDto;
use Vaalyn\AzuraCastApiClient\Dto\RequestableSongsDto;
use Vaalyn\AzuraCastApiClient\Exception\AzuraCastApiAccessDeniedException;
use Vaalyn\AzuraCastApiClient\Exception\AzuraCastApiClientRequestException;
use Vaalyn\AzuraCastApiClient\Exception\AzuraCastRequestsDisabledException;
use Vaalyn\AzuraCastApiClient\Transformer\RoleDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\ListenerDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\SettingsDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\StreamerDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\MediaFileDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\MountpointDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\NowPlayingDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\CustomFieldDtoTransformer;
use Vaalyn\AzuraCastApiClient\Transformer\PermissionsDtoTransformer;
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
	 * @param string $uniqueId
	 *
	 * @return resource|bool
	 */
	public function mediaAlbumArt(int $stationId, string $uniqueId) {
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
	 *
	 * @return MediaFileDto[]
	 */
	public function mediaFiles(int $stationId): array {
		$response = $this->httpClient->get(sprintf(
			'station/%s/files',
			$stationId
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "/station/%s/files" returned non-successful response with code %s and body: %s',
				$stationId,
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}

		$mediaFilesDataArray = json_decode($response->getBody()->getContents(), true);

		$mediaFileDtoTransformer = new MediaFileDtoTransformer();

		$mediaFileDtoArray = [];

		foreach ($mediaFilesDataArray as $mediaFileData) {
			$mediaFileDtoArray[] = $mediaFileDtoTransformer->arrayToDto($mediaFileData);
		}

		return $mediaFileDtoArray;
	}

	/**
	 * @param int $stationId
	 * @param UploadFileDto $uploadFile
	 *
	 * @return MediaFileDto
	 */
	public function uploadMediaFile(int $stationId, UploadFileDto $uploadFile): MediaFileDto {
		$response = $this->httpClient->post(
			sprintf('station/%s/files', $stationId),
			['json' => $uploadFile]
		);

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "/station/%s/files" returned non-successful response with code %s and body: %s',
				$stationId,
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}

		$mediaFileData = json_decode($response->getBody()->getContents(), true);

		$mediaFileDtoTransformer = new MediaFileDtoTransformer();

		return $mediaFileDtoTransformer->arrayToDto($mediaFileData);
	}

	/**
	 * @param int $stationId
	 *
	 * @return MountpointDto[]
	 */
	public function mountpoints(int $stationId): array {
		$response = $this->httpClient->get(sprintf(
			'station/%s/mounts',
			$stationId
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "station/%s/mounts" returned non-successful response with code %s and body: %s',
				$stationId,
				$response->getStatusCode(),
				$response->getBody()->getContents()
			));
		}

		$mountpointsData = json_decode($response->getBody()->getContents(), true);

		$mountpointDtoTransformer = new MountpointDtoTransformer();

		$mountpoints = [];

		foreach ($mountpointsData as $mountpointData) {
			$mountpoints[] = $mountpointDtoTransformer->arrayToDto($mountpointData);
		}

		return $mountpoints;
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
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
	public function deleteUser(int $userId): void {
		$response = $this->httpClient->delete(sprintf(
			'admin/user/%s', $userId
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
	public function permissions(): PermissionsDto {
		$response = $this->httpClient->get('admin/permissions');

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
	public function roles(): array {
		$response = $this->httpClient->get('admin/roles');

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
	public function createRole(string $name, array $permissionsGlobal, array $permissionsStation): RoleDto {
		$permissions = new PermissionsDto($permissionsGlobal, $permissionsStation);
		$roleDto = new RoleDto(0, $name, $permissions);

		$response = $this->httpClient->post(
			'admin/roles',
			['json' => $roleDto]
		);

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
	public function role(int $roleId): RoleDto {
		$response = $this->httpClient->get(sprintf(
			'admin/role/%s',
			$roleId
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
	public function deleteRole(int $roleId): void {
		$response = $this->httpClient->delete(sprintf(
			'admin/role/%s', $roleId
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
	public function settings(): SettingsDto {
		$response = $this->httpClient->get('admin/settings');

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
	public function streamers(int $stationId): array {
		$response = $this->httpClient->get(sprintf(
			'station/%s/streamers',
			$stationId
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
	public function streamer(int $stationId, int $streamerId): StreamerDto {
		$response = $this->httpClient->get(sprintf(
			'station/%s/streamer/%s',
			$stationId,
			$streamerId
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
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
	public function deleteStreamer(int $stationId, int $streamerId): void {
		$response = $this->httpClient->delete(sprintf(
			'station/%s/streamer/%s',
			$stationId,
			$streamerId
		));

		if ($response->getStatusCode() === 403) {
			throw new AzuraCastApiAccessDeniedException(
				$response->getBody()->getContents()
			);
		}

		if ($response->getStatusCode() !== 200) {
			throw new AzuraCastApiClientRequestException(sprintf(
				'Call to "station/%s/streamer/%s" returned non-successful response with code %s and body: %s',
				$stationId,
				$streamerId,
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

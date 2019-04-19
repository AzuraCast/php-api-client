This PHP library provides an API client for the [AzuraCast](https://github.com/AzuraCast/AzuraCast) JSON API.

# Usage

```
$azuraCastApiClient = new AzuraCastApiClient(
	'<IP-Address | Host>',
	'<API Key>'
);

$nowPlaying = $azuraCastApiClient->nowPlaying();

echo $nowPlaying->getCurrentSong()->getSong()->getTitle();
```

# Available Endpoints

### Now Playing
`GET` `/nowplaying`
```
$azuraCastApiClient->nowPlaying();
```

`GET` `/nowplaying/{station_id}`
```
$azuraCastApiClient->nowPlayingOnStation(int $stationId);
```

### Stations: General
`GET` `/stations`
```
$azuraCastApiClient->stations();
```

`GET` `/station/{station_id}`
```
$azuraCastApiClient->station(int $stationId);
```

### Stations: Song Requests
`GET` `/station/{station_id}/requests`
```
$azuraCastApiClient->requestableSongs(int $stationId, int $page = 1);
```
```
$azuraCastApiClient->allRequestableSongs(int $stationId);
```

`POST` `/station/{station_id}/request/{request_id}`
```
$azuraCastApiClient->requestSong(int $stationId, string $uniqueId);
```

### Stations: Service Control
`GET` `/station/{station_id}/status`
```
$azuraCastApiClient->stationStatus(int $stationId);
```

`POST` `/station/{station_id}/restart`
```
$azuraCastApiClient->restartStation(int $stationId);
```

`POST` `/station/{station_id}/frontend/{action}`
```
$azuraCastApiClient->performFrontendAction(int $stationId, string $action);
```

`POST` `/station/{station_id}/backend/{action}`
```
$azuraCastApiClient->performBackendAction(int $stationId, string $action);
```

### Stations: History
`GET` `/station/{station_id}/history`
```
$azuraCastApiClient->stationHistory(int $stationId, ?\DateTime $start = null, ?\DateTime $end = null);
```

### Stations: Listeners
`GET` `/station/{station_id}/listeners`
```
$azuraCastApiClient->listenerDetails(int $stationId);
```

### Stations: Media
`GET` `/station/{station_id}/art/{media_id}`
```
$azuraCastApiClient->songAlbumArt(int $stationId, string $uniqueId);
```

### Administration: Custom Fields
`GET` `/admin/custom_fields`
```
$azuraCastApiClient->customFields();
```

`POST` `/admin/custom_fields`
```
$azuraCastApiClient->customField(int $customFieldId);
```

`GET` `/admin/custom_fields/{id}`
```
$azuraCastApiClient->createCustomField(string $name, string $shortName);
```

`PUT` `/admin/custom_fields/{id}`
```
$azuraCastApiClient->updateCustomField(int $customFieldId, string $name, string $shortName);
```

`DELETE` `/admin/custom_fields/{id}`
```
$azuraCastApiClient->deleteCustomField(int $customFieldId);
```

### Administration: Users
`GET` `/admin/users`
```
$azuraCastApiClient->users();
```

`POST` `/admin/users`
```
$azuraCastApiClient->createUser(
	string $email,
	string $authPassword,
	string $name,
	string $timezone,
	string $locale,
	string $theme,
	array $roles,
	array $apiKeys
);
```

`GET` `/admin/user/{id}`
```
$azuraCastApiClient->user(int $userId);
```

`PUT` `/admin/user/{id}`
```
$azuraCastApiClient->updateUser(
	int $userId,
	string $email,
	string $authPassword,
	string $name,
	string $timezone,
	string $locale,
	string $theme,
	array $roles,
	array $apiKeys
);
```

`DELETE` `/admin/user/{id}`
```
$azuraCastApiClient->deleteUser(int $userId);
```

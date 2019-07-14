This PHP library provides an API client for the [AzuraCast](https://github.com/AzuraCast/AzuraCast) JSON API.

# Installation

It is highly recommended to use the [Composer]() package manager to install this client by running this command:

```bash
composer require azuracast/php-api-client
```

# Usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$api = \AzuraCast\Api\Client::create(
	'<IP-Address | Host>',
	'<API Key>'
);

$nowPlaying = $api->nowPlaying();

echo $nowPlaying->getCurrentSong()->getSong()->getTitle();
```

# Available Endpoints

### Now Playing
`GET` `/nowplaying`
```
$api->nowPlaying();
```

`GET` `/nowplaying/{station_id}`
```
$api->station($station_id)->nowPlaying();
```

### Stations: General
`GET` `/stations`
```
$api->stations();
```

`GET` `/station/{station_id}`
```
$api->station($stationId)->get();
```

### Stations: Song Requests
`GET` `/station/{station_id}/requests`
```
$api->station($stationId)->requests()->list();
```

`POST` `/station/{station_id}/request/{request_id}`
```
$api->station($stationId)->requests()->submit($uniqueId);
```

### Stations: Service Control
`GET` `/station/{station_id}/status`
```
$api->station($stationId)->status();
```

`POST` `/station/{station_id}/restart`
```
$api->station($stationId)->restart();
```

`POST` `/station/{station_id}/frontend/{action}`
```
$api->station($stationId)->frontend($action);
```

`POST` `/station/{station_id}/backend/{action}`
```
$api->station($stationId)->backend($action);
```

### Stations: History
`GET` `/station/{station_id}/history`
```
$api->station($stationId)->history(?\DateTime $start = null, ?\DateTime $end = null);
```

### Stations: Listeners
`GET` `/station/{station_id}/listeners`
```
$api->station($stationId)->listeners();
```

### Stations: Media
`GET` `/station/{station_id}/art/{media_id}`
```
$api->station($stationId)->media()->art($uniqueId);
```

`GET` `/station/{station_id}/files`
```
$api->station($stationId)->media()->list();
```

`POST` `/station/{station_id}/files`
```
$api->station($stationId)->media()->upload(UploadFileDto $uploadFile);
```

### Stations: Mount Points
`GET` `/station/{station_id}/mounts`
```
$api->station($stationId)->mounts();
```

### Station: Streamers/DJs
`GET` `/station/{station_id}/streamers`
```
$api->station($stationId)->streamers()->list();
```

`GET` `/station/{station_id}/streamer/{id}`
```
$api->station($stationId)->streamers()->get(int $streamerId);
```

`POST` `/station/{station_id}/streamers`
```
$api->station($stationId)->streamers()->create(
	string $username,
	string $password,
	string $displayName,
	string $comments,
	bool $isActive
);
```

`PUT` `/station/{station_id}/streamer/{id}`
```
$api->station($stationId)->streamers()->update(
	string $username,
	string $password,
	string $displayName,
	string $comments,
	bool $isActive
);
```

`DELETE` `/station/{station_id}/streamer/{id}`
```
$api->station($stationId)->streamers()->delete($streamerId);
```

### Administration: Custom Fields
`GET` `/admin/custom_fields`
```
$api->admin()->customFields()->list();
```

`POST` `/admin/custom_fields`
```
$api->admin()->customFields()->get(int $customFieldId);
```

`GET` `/admin/custom_fields/{id}`
```
$api->admin()->customFields()->create(string $name, string $shortName);
```

`PUT` `/admin/custom_fields/{id}`
```
$api->admin()->customFields()->update(int $customFieldId, string $name, string $shortName);
```

`DELETE` `/admin/custom_fields/{id}`
```
$api->admin()->customFields()->delete(int $customFieldId);
```

### Administration: Users
`GET` `/admin/users`
```
$api->admin()->users()->list();
```

`GET` `/admin/user/{id}`
```
$api->admin()->users()->get(int $userId);
```

`POST` `/admin/users`
```
$api->admin()->users()->create(
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


`PUT` `/admin/user/{id}`
```
$api->admin()->users()->update(
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
$api->admin()->users()->delete(int $userId);
```

### Administration: Roles
`GET` `/admin/permissions`
```
$api->admin()->permissions();
```

`GET` `/admin/roles`
```
$api->admin()->roles()->list();
```

`GET` `/admin/role/{id}`
```
$api->admin()->roles()->get(int $roleId);
```

`POST` `/admin/roles`
```
$api->admin()->roles()->create(
	string $name,
	string[] $permissionsGlobal,
	string[] $permissionsStation
);
```

`PUT` `/admin/role/{id}`
```
$api->admin()->roles()->update(
	int $roleId
	string $name
	string[] $permissionsGlobal
	string[] $permissionsStation
);
```

`DELETE` `/admin/role/{id}`
```
$api->admin()->roles()->delete(int $roleId);
```

### Administration: Settings
`GET` `/admin/settings`
```
$api->admin()->settings()->list();
```

`PUT` `/admin/settings`
```
$api->admin()->settings()->update(
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
);
```

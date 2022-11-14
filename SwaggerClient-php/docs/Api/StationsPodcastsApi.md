# Swagger\Client\StationsPodcastsApi

All URIs are relative to *http://azuracast.local/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**addEpisode**](StationsPodcastsApi.md#addepisode) | **POST** /station/{station_id}/podcast/{podcast_id}/episodes | 
[**addPodcast**](StationsPodcastsApi.md#addpodcast) | **POST** /station/{station_id}/podcasts | 
[**deleteEpisode**](StationsPodcastsApi.md#deleteepisode) | **DELETE** /station/{station_id}/podcast/{podcast_id}/episode/{id} | 
[**deletePodcast**](StationsPodcastsApi.md#deletepodcast) | **DELETE** /station/{station_id}/podcast/{id} | 
[**editEpisode**](StationsPodcastsApi.md#editepisode) | **PUT** /station/{station_id}/podcast/{podcast_id}/episode/{id} | 
[**editPodcast**](StationsPodcastsApi.md#editpodcast) | **PUT** /station/{station_id}/podcast/{id} | 
[**getEpisode**](StationsPodcastsApi.md#getepisode) | **GET** /station/{station_id}/podcast/{podcast_id}/episode/{id} | 
[**getEpisodes**](StationsPodcastsApi.md#getepisodes) | **GET** /station/{station_id}/podcast/{podcast_id}/episodes | 
[**getPodcast**](StationsPodcastsApi.md#getpodcast) | **GET** /station/{station_id}/podcast/{id} | 
[**getPodcasts**](StationsPodcastsApi.md#getpodcasts) | **GET** /station/{station_id}/podcasts | 
[**stationStationIdPodcastPodcastIdArtDelete**](StationsPodcastsApi.md#stationstationidpodcastpodcastidartdelete) | **DELETE** /station/{station_id}/podcast/{podcast_id}/art | 
[**stationStationIdPodcastPodcastIdArtGet**](StationsPodcastsApi.md#stationstationidpodcastpodcastidartget) | **GET** /station/{station_id}/podcast/{podcast_id}/art | 
[**stationStationIdPodcastPodcastIdArtPost**](StationsPodcastsApi.md#stationstationidpodcastpodcastidartpost) | **POST** /station/{station_id}/podcast/{podcast_id}/art | 
[**stationStationIdPodcastPodcastIdEpisodeEpisodeIdArtDelete**](StationsPodcastsApi.md#stationstationidpodcastpodcastidepisodeepisodeidartdelete) | **DELETE** /station/{station_id}/podcast/{podcast_id}/episode/{episode_id}/art | 
[**stationStationIdPodcastPodcastIdEpisodeEpisodeIdArtGet**](StationsPodcastsApi.md#stationstationidpodcastpodcastidepisodeepisodeidartget) | **GET** /station/{station_id}/podcast/{podcast_id}/episode/{episode_id}/art | 
[**stationStationIdPodcastPodcastIdEpisodeEpisodeIdArtPost**](StationsPodcastsApi.md#stationstationidpodcastpodcastidepisodeepisodeidartpost) | **POST** /station/{station_id}/podcast/{podcast_id}/episode/{episode_id}/art | 
[**stationStationIdPodcastPodcastIdEpisodeEpisodeIdMediaDelete**](StationsPodcastsApi.md#stationstationidpodcastpodcastidepisodeepisodeidmediadelete) | **DELETE** /station/{station_id}/podcast/{podcast_id}/episode/{episode_id}/media | 
[**stationStationIdPodcastPodcastIdEpisodeEpisodeIdMediaGet**](StationsPodcastsApi.md#stationstationidpodcastpodcastidepisodeepisodeidmediaget) | **GET** /station/{station_id}/podcast/{podcast_id}/episode/{episode_id}/media | 
[**stationStationIdPodcastPodcastIdEpisodeEpisodeIdMediaPost**](StationsPodcastsApi.md#stationstationidpodcastpodcastidepisodeepisodeidmediapost) | **POST** /station/{station_id}/podcast/{podcast_id}/episode/{episode_id}/media | 

# **addEpisode**
> \Swagger\Client\Model\ApiPodcastEpisode addEpisode($station_id_required, $podcast_id, $body)



Create a new podcast episode.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$podcast_id = "podcast_id_example"; // string | Podcast ID
$body = new \Swagger\Client\Model\ApiPodcastEpisode(); // \Swagger\Client\Model\ApiPodcastEpisode | 

try {
    $result = $apiInstance->addEpisode($station_id_required, $podcast_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->addEpisode: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **podcast_id** | **string**| Podcast ID |
 **body** | [**\Swagger\Client\Model\ApiPodcastEpisode**](../Model/ApiPodcastEpisode.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\ApiPodcastEpisode**](../Model/ApiPodcastEpisode.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **addPodcast**
> \Swagger\Client\Model\ApiPodcast addPodcast($station_id_required, $body)



Create a new podcast.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$body = new \Swagger\Client\Model\ApiPodcast(); // \Swagger\Client\Model\ApiPodcast | 

try {
    $result = $apiInstance->addPodcast($station_id_required, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->addPodcast: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **body** | [**\Swagger\Client\Model\ApiPodcast**](../Model/ApiPodcast.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\ApiPodcast**](../Model/ApiPodcast.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteEpisode**
> \Swagger\Client\Model\ApiStatus deleteEpisode($station_id_required, $podcast_id, $id)



Delete a single podcast episode.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$podcast_id = "podcast_id_example"; // string | Podcast ID
$id = "id_example"; // string | Podcast Episode ID

try {
    $result = $apiInstance->deleteEpisode($station_id_required, $podcast_id, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->deleteEpisode: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **podcast_id** | **string**| Podcast ID |
 **id** | **string**| Podcast Episode ID |

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deletePodcast**
> \Swagger\Client\Model\ApiStatus deletePodcast($station_id_required, $id)



Delete a single podcast.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$id = "id_example"; // string | Podcast ID

try {
    $result = $apiInstance->deletePodcast($station_id_required, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->deletePodcast: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **id** | **string**| Podcast ID |

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **editEpisode**
> \Swagger\Client\Model\ApiStatus editEpisode($station_id_required, $podcast_id, $id, $body)



Update details of a single podcast episode.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$podcast_id = "podcast_id_example"; // string | Podcast ID
$id = "id_example"; // string | Podcast Episode ID
$body = new \Swagger\Client\Model\ApiPodcastEpisode(); // \Swagger\Client\Model\ApiPodcastEpisode | 

try {
    $result = $apiInstance->editEpisode($station_id_required, $podcast_id, $id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->editEpisode: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **podcast_id** | **string**| Podcast ID |
 **id** | **string**| Podcast Episode ID |
 **body** | [**\Swagger\Client\Model\ApiPodcastEpisode**](../Model/ApiPodcastEpisode.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **editPodcast**
> \Swagger\Client\Model\ApiStatus editPodcast($station_id_required, $id, $body)



Update details of a single podcast.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$id = "id_example"; // string | Podcast ID
$body = new \Swagger\Client\Model\ApiPodcast(); // \Swagger\Client\Model\ApiPodcast | 

try {
    $result = $apiInstance->editPodcast($station_id_required, $id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->editPodcast: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **id** | **string**| Podcast ID |
 **body** | [**\Swagger\Client\Model\ApiPodcast**](../Model/ApiPodcast.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getEpisode**
> \Swagger\Client\Model\ApiPodcastEpisode getEpisode($station_id_required, $podcast_id, $id)



Retrieve details for a single podcast episode.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$podcast_id = "podcast_id_example"; // string | Podcast ID
$id = "id_example"; // string | Podcast Episode ID

try {
    $result = $apiInstance->getEpisode($station_id_required, $podcast_id, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->getEpisode: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **podcast_id** | **string**| Podcast ID |
 **id** | **string**| Podcast Episode ID |

### Return type

[**\Swagger\Client\Model\ApiPodcastEpisode**](../Model/ApiPodcastEpisode.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getEpisodes**
> \Swagger\Client\Model\ApiPodcastEpisode[] getEpisodes($station_id_required, $podcast_id)



List all current episodes for a given podcast ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$podcast_id = "podcast_id_example"; // string | Podcast ID

try {
    $result = $apiInstance->getEpisodes($station_id_required, $podcast_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->getEpisodes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **podcast_id** | **string**| Podcast ID |

### Return type

[**\Swagger\Client\Model\ApiPodcastEpisode[]**](../Model/ApiPodcastEpisode.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPodcast**
> \Swagger\Client\Model\ApiPodcast getPodcast($station_id_required, $id)



Retrieve details for a single podcast.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$id = "id_example"; // string | Podcast ID

try {
    $result = $apiInstance->getPodcast($station_id_required, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->getPodcast: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **id** | **string**| Podcast ID |

### Return type

[**\Swagger\Client\Model\ApiPodcast**](../Model/ApiPodcast.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPodcasts**
> \Swagger\Client\Model\ApiPodcast[] getPodcasts($station_id_required)



List all current podcasts.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 

try {
    $result = $apiInstance->getPodcasts($station_id_required);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->getPodcasts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |

### Return type

[**\Swagger\Client\Model\ApiPodcast[]**](../Model/ApiPodcast.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stationStationIdPodcastPodcastIdArtDelete**
> \Swagger\Client\Model\ApiStatus stationStationIdPodcastPodcastIdArtDelete($station_id_required, $podcast_id)



Removes the album art for a podcast.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$podcast_id = "podcast_id_example"; // string | Podcast ID

try {
    $result = $apiInstance->stationStationIdPodcastPodcastIdArtDelete($station_id_required, $podcast_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->stationStationIdPodcastPodcastIdArtDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **podcast_id** | **string**| Podcast ID |

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stationStationIdPodcastPodcastIdArtGet**
> stationStationIdPodcastPodcastIdArtGet($station_id_required, $podcast_id)



Gets the album art for a podcast.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$podcast_id = "podcast_id_example"; // string | Podcast ID

try {
    $apiInstance->stationStationIdPodcastPodcastIdArtGet($station_id_required, $podcast_id);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->stationStationIdPodcastPodcastIdArtGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **podcast_id** | **string**| Podcast ID |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stationStationIdPodcastPodcastIdArtPost**
> \Swagger\Client\Model\ApiStatus stationStationIdPodcastPodcastIdArtPost($station_id_required, $podcast_id)



Sets the album art for a podcast.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$podcast_id = "podcast_id_example"; // string | Podcast ID

try {
    $result = $apiInstance->stationStationIdPodcastPodcastIdArtPost($station_id_required, $podcast_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->stationStationIdPodcastPodcastIdArtPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **podcast_id** | **string**| Podcast ID |

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stationStationIdPodcastPodcastIdEpisodeEpisodeIdArtDelete**
> \Swagger\Client\Model\ApiStatus stationStationIdPodcastPodcastIdEpisodeEpisodeIdArtDelete($station_id_required, $podcast_id, $episode_id)



Removes the album art for a podcast episode.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$podcast_id = "podcast_id_example"; // string | Podcast ID
$episode_id = "episode_id_example"; // string | Podcast Episode ID

try {
    $result = $apiInstance->stationStationIdPodcastPodcastIdEpisodeEpisodeIdArtDelete($station_id_required, $podcast_id, $episode_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->stationStationIdPodcastPodcastIdEpisodeEpisodeIdArtDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **podcast_id** | **string**| Podcast ID |
 **episode_id** | **string**| Podcast Episode ID |

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stationStationIdPodcastPodcastIdEpisodeEpisodeIdArtGet**
> stationStationIdPodcastPodcastIdEpisodeEpisodeIdArtGet($station_id_required, $podcast_id, $episode_id)



Gets the album art for a podcast episode.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$podcast_id = "podcast_id_example"; // string | Podcast ID
$episode_id = "episode_id_example"; // string | Podcast Episode ID

try {
    $apiInstance->stationStationIdPodcastPodcastIdEpisodeEpisodeIdArtGet($station_id_required, $podcast_id, $episode_id);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->stationStationIdPodcastPodcastIdEpisodeEpisodeIdArtGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **podcast_id** | **string**| Podcast ID |
 **episode_id** | **string**| Podcast Episode ID |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stationStationIdPodcastPodcastIdEpisodeEpisodeIdArtPost**
> \Swagger\Client\Model\ApiStatus stationStationIdPodcastPodcastIdEpisodeEpisodeIdArtPost($station_id_required, $podcast_id, $episode_id)



Sets the album art for a podcast episode.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$podcast_id = "podcast_id_example"; // string | Podcast ID
$episode_id = "episode_id_example"; // string | Podcast Episode ID

try {
    $result = $apiInstance->stationStationIdPodcastPodcastIdEpisodeEpisodeIdArtPost($station_id_required, $podcast_id, $episode_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->stationStationIdPodcastPodcastIdEpisodeEpisodeIdArtPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **podcast_id** | **string**| Podcast ID |
 **episode_id** | **string**| Podcast Episode ID |

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stationStationIdPodcastPodcastIdEpisodeEpisodeIdMediaDelete**
> \Swagger\Client\Model\ApiStatus stationStationIdPodcastPodcastIdEpisodeEpisodeIdMediaDelete($station_id_required, $podcast_id, $episode_id)



Removes the media for a podcast episode.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$podcast_id = "podcast_id_example"; // string | Podcast ID
$episode_id = "episode_id_example"; // string | Podcast Episode ID

try {
    $result = $apiInstance->stationStationIdPodcastPodcastIdEpisodeEpisodeIdMediaDelete($station_id_required, $podcast_id, $episode_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->stationStationIdPodcastPodcastIdEpisodeEpisodeIdMediaDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **podcast_id** | **string**| Podcast ID |
 **episode_id** | **string**| Podcast Episode ID |

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stationStationIdPodcastPodcastIdEpisodeEpisodeIdMediaGet**
> stationStationIdPodcastPodcastIdEpisodeEpisodeIdMediaGet($station_id_required, $podcast_id, $episode_id)



Gets the media for a podcast episode.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$podcast_id = "podcast_id_example"; // string | Podcast ID
$episode_id = "episode_id_example"; // string | Podcast Episode ID

try {
    $apiInstance->stationStationIdPodcastPodcastIdEpisodeEpisodeIdMediaGet($station_id_required, $podcast_id, $episode_id);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->stationStationIdPodcastPodcastIdEpisodeEpisodeIdMediaGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **podcast_id** | **string**| Podcast ID |
 **episode_id** | **string**| Podcast Episode ID |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stationStationIdPodcastPodcastIdEpisodeEpisodeIdMediaPost**
> \Swagger\Client\Model\ApiStatus stationStationIdPodcastPodcastIdEpisodeEpisodeIdMediaPost($station_id_required, $podcast_id, $episode_id)



Sets the media for a podcast episode.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsPodcastsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$podcast_id = "podcast_id_example"; // string | Podcast ID
$episode_id = "episode_id_example"; // string | Podcast Episode ID

try {
    $result = $apiInstance->stationStationIdPodcastPodcastIdEpisodeEpisodeIdMediaPost($station_id_required, $podcast_id, $episode_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsPodcastsApi->stationStationIdPodcastPodcastIdEpisodeEpisodeIdMediaPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **podcast_id** | **string**| Podcast ID |
 **episode_id** | **string**| Podcast Episode ID |

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


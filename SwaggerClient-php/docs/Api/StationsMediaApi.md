# Swagger\Client\StationsMediaApi

All URIs are relative to *http://azuracast.local/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**addFile**](StationsMediaApi.md#addfile) | **POST** /station/{station_id}/files | 
[**deleteFile**](StationsMediaApi.md#deletefile) | **DELETE** /station/{station_id}/file/{id} | 
[**editFile**](StationsMediaApi.md#editfile) | **PUT** /station/{station_id}/file/{id} | 
[**getFile**](StationsMediaApi.md#getfile) | **GET** /station/{station_id}/file/{id} | 
[**getFiles**](StationsMediaApi.md#getfiles) | **GET** /station/{station_id}/files | 
[**stationStationIdArtMediaIdDelete**](StationsMediaApi.md#stationstationidartmediaiddelete) | **DELETE** /station/{station_id}/art/{media_id} | 
[**stationStationIdArtMediaIdGet**](StationsMediaApi.md#stationstationidartmediaidget) | **GET** /station/{station_id}/art/{media_id} | 
[**stationStationIdArtMediaIdPost**](StationsMediaApi.md#stationstationidartmediaidpost) | **POST** /station/{station_id}/art/{media_id} | 

# **addFile**
> \Swagger\Client\Model\StationMedia addFile($station_id_required, $body)



Upload a new file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsMediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$body = new \Swagger\Client\Model\ApiUploadFile(); // \Swagger\Client\Model\ApiUploadFile | 

try {
    $result = $apiInstance->addFile($station_id_required, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsMediaApi->addFile: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **body** | [**\Swagger\Client\Model\ApiUploadFile**](../Model/ApiUploadFile.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\StationMedia**](../Model/StationMedia.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteFile**
> \Swagger\Client\Model\ApiStatus deleteFile($station_id_required, $id)



Delete a single file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsMediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$id = 789; // int | Media ID

try {
    $result = $apiInstance->deleteFile($station_id_required, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsMediaApi->deleteFile: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **id** | **int**| Media ID |

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **editFile**
> \Swagger\Client\Model\ApiStatus editFile($station_id_required, $id, $body)



Update details of a single file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsMediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$id = 789; // int | Media ID
$body = new \Swagger\Client\Model\StationMedia(); // \Swagger\Client\Model\StationMedia | 

try {
    $result = $apiInstance->editFile($station_id_required, $id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsMediaApi->editFile: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **id** | **int**| Media ID |
 **body** | [**\Swagger\Client\Model\StationMedia**](../Model/StationMedia.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFile**
> \Swagger\Client\Model\StationMedia getFile($station_id_required, $id)



Retrieve details for a single file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsMediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$id = 789; // int | Media ID

try {
    $result = $apiInstance->getFile($station_id_required, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsMediaApi->getFile: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **id** | **int**| Media ID |

### Return type

[**\Swagger\Client\Model\StationMedia**](../Model/StationMedia.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFiles**
> \Swagger\Client\Model\StationMedia[] getFiles($station_id_required)



List all current uploaded files.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsMediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 

try {
    $result = $apiInstance->getFiles($station_id_required);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsMediaApi->getFiles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |

### Return type

[**\Swagger\Client\Model\StationMedia[]**](../Model/StationMedia.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stationStationIdArtMediaIdDelete**
> \Swagger\Client\Model\ApiStatus stationStationIdArtMediaIdDelete($station_id_required, $id)



Removes the album art for a track.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsMediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$id = new \Swagger\Client\Model\Id1(); // \Swagger\Client\Model\Id1 | Media ID

try {
    $result = $apiInstance->stationStationIdArtMediaIdDelete($station_id_required, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsMediaApi->stationStationIdArtMediaIdDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **id** | [**\Swagger\Client\Model\Id1**](../Model/.md)| Media ID |

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stationStationIdArtMediaIdGet**
> stationStationIdArtMediaIdGet($station_id_required, $media_id)



Returns the album art for a song, or a generic image.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\StationsMediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$media_id = "media_id_example"; // string | The station media unique ID

try {
    $apiInstance->stationStationIdArtMediaIdGet($station_id_required, $media_id);
} catch (Exception $e) {
    echo 'Exception when calling StationsMediaApi->stationStationIdArtMediaIdGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **media_id** | **string**| The station media unique ID |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stationStationIdArtMediaIdPost**
> \Swagger\Client\Model\ApiStatus stationStationIdArtMediaIdPost($station_id_required, $id)



Sets the album art for a track.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsMediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$id = new \Swagger\Client\Model\Id(); // \Swagger\Client\Model\Id | Media ID

try {
    $result = $apiInstance->stationStationIdArtMediaIdPost($station_id_required, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsMediaApi->stationStationIdArtMediaIdPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **id** | [**\Swagger\Client\Model\Id**](../Model/.md)| Media ID |

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


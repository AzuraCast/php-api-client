# Swagger\Client\StationsGeneralApi

All URIs are relative to *http://azuracast.local/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getStation**](StationsGeneralApi.md#getstation) | **GET** /station/{station_id} | 
[**getStations**](StationsGeneralApi.md#getstations) | **GET** /stations | 
[**stationStationIdFallbackDelete**](StationsGeneralApi.md#stationstationidfallbackdelete) | **DELETE** /station/{station_id}/fallback | 
[**stationStationIdFallbackGet**](StationsGeneralApi.md#stationstationidfallbackget) | **GET** /station/{station_id}/fallback | 
[**stationStationIdFallbackPost**](StationsGeneralApi.md#stationstationidfallbackpost) | **POST** /station/{station_id}/fallback | 

# **getStation**
> \Swagger\Client\Model\ApiNowPlayingStation getStation($station_id_required)



Return information about a single station.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\StationsGeneralApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 

try {
    $result = $apiInstance->getStation($station_id_required);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsGeneralApi->getStation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |

### Return type

[**\Swagger\Client\Model\ApiNowPlayingStation**](../Model/ApiNowPlayingStation.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getStations**
> \Swagger\Client\Model\ApiNowPlayingStation[] getStations()



Returns a list of stations.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\StationsGeneralApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->getStations();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsGeneralApi->getStations: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\ApiNowPlayingStation[]**](../Model/ApiNowPlayingStation.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stationStationIdFallbackDelete**
> \Swagger\Client\Model\ApiStatus stationStationIdFallbackDelete($station_id_required)



Removes the custom fallback track for a station.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsGeneralApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 

try {
    $result = $apiInstance->stationStationIdFallbackDelete($station_id_required);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsGeneralApi->stationStationIdFallbackDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stationStationIdFallbackGet**
> stationStationIdFallbackGet($station_id_required)



Get the custom fallback track for a station.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsGeneralApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 

try {
    $apiInstance->stationStationIdFallbackGet($station_id_required);
} catch (Exception $e) {
    echo 'Exception when calling StationsGeneralApi->stationStationIdFallbackGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stationStationIdFallbackPost**
> \Swagger\Client\Model\ApiStatus stationStationIdFallbackPost($station_id_required)



Update the custom fallback track for the station.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsGeneralApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 

try {
    $result = $apiInstance->stationStationIdFallbackPost($station_id_required);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsGeneralApi->stationStationIdFallbackPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


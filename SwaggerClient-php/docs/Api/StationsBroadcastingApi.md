# Swagger\Client\StationsBroadcastingApi

All URIs are relative to *http://azuracast.local/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**stationStationIdStereoToolConfigurationDelete**](StationsBroadcastingApi.md#stationstationidstereotoolconfigurationdelete) | **DELETE** /station/{station_id}/stereo-tool-configuration | 
[**stationStationIdStereoToolConfigurationGet**](StationsBroadcastingApi.md#stationstationidstereotoolconfigurationget) | **GET** /station/{station_id}/stereo-tool-configuration | 
[**stationStationIdStereoToolConfigurationPost**](StationsBroadcastingApi.md#stationstationidstereotoolconfigurationpost) | **POST** /station/{station_id}/stereo-tool-configuration | 

# **stationStationIdStereoToolConfigurationDelete**
> \Swagger\Client\Model\ApiStatus stationStationIdStereoToolConfigurationDelete($station_id_required)



Removes the Stereo Tool configuration file for a station.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsBroadcastingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 

try {
    $result = $apiInstance->stationStationIdStereoToolConfigurationDelete($station_id_required);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsBroadcastingApi->stationStationIdStereoToolConfigurationDelete: ', $e->getMessage(), PHP_EOL;
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

# **stationStationIdStereoToolConfigurationGet**
> stationStationIdStereoToolConfigurationGet($station_id_required)



Get the Stereo Tool configuration file for a station.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsBroadcastingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 

try {
    $apiInstance->stationStationIdStereoToolConfigurationGet($station_id_required);
} catch (Exception $e) {
    echo 'Exception when calling StationsBroadcastingApi->stationStationIdStereoToolConfigurationGet: ', $e->getMessage(), PHP_EOL;
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

# **stationStationIdStereoToolConfigurationPost**
> \Swagger\Client\Model\ApiStatus stationStationIdStereoToolConfigurationPost($station_id_required)



Update the Stereo Tool configuration file for a station.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsBroadcastingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 

try {
    $result = $apiInstance->stationStationIdStereoToolConfigurationPost($station_id_required);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsBroadcastingApi->stationStationIdStereoToolConfigurationPost: ', $e->getMessage(), PHP_EOL;
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


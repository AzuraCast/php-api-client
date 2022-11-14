# Swagger\Client\StationsHLSStreamsApi

All URIs are relative to *http://azuracast.local/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**addHlsStream**](StationsHLSStreamsApi.md#addhlsstream) | **POST** /station/{station_id}/hls_streams | 
[**deleteHlsStream**](StationsHLSStreamsApi.md#deletehlsstream) | **DELETE** /station/{station_id}/hls_stream/{id} | 
[**editHlsStream**](StationsHLSStreamsApi.md#edithlsstream) | **PUT** /station/{station_id}/hls_stream/{id} | 
[**getHlsStream**](StationsHLSStreamsApi.md#gethlsstream) | **GET** /station/{station_id}/hls_stream/{id} | 
[**getHlsStreams**](StationsHLSStreamsApi.md#gethlsstreams) | **GET** /station/{station_id}/hls_streams | 

# **addHlsStream**
> \Swagger\Client\Model\StationMount addHlsStream($station_id_required, $body)



Create a new HLS stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsHLSStreamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$body = new \Swagger\Client\Model\StationMount(); // \Swagger\Client\Model\StationMount | 

try {
    $result = $apiInstance->addHlsStream($station_id_required, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsHLSStreamsApi->addHlsStream: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **body** | [**\Swagger\Client\Model\StationMount**](../Model/StationMount.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\StationMount**](../Model/StationMount.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteHlsStream**
> \Swagger\Client\Model\ApiStatus deleteHlsStream($station_id_required, $id)



Delete a single HLS stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsHLSStreamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$id = 789; // int | HLS Stream ID

try {
    $result = $apiInstance->deleteHlsStream($station_id_required, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsHLSStreamsApi->deleteHlsStream: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **id** | **int**| HLS Stream ID |

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **editHlsStream**
> \Swagger\Client\Model\ApiStatus editHlsStream($station_id_required, $id, $body)



Update details of a single HLS stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsHLSStreamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$id = 789; // int | HLS Stream ID
$body = new \Swagger\Client\Model\StationMount(); // \Swagger\Client\Model\StationMount | 

try {
    $result = $apiInstance->editHlsStream($station_id_required, $id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsHLSStreamsApi->editHlsStream: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **id** | **int**| HLS Stream ID |
 **body** | [**\Swagger\Client\Model\StationMount**](../Model/StationMount.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getHlsStream**
> \Swagger\Client\Model\StationMount getHlsStream($station_id_required, $id)



Retrieve details for a single HLS stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsHLSStreamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$id = 789; // int | HLS Stream ID

try {
    $result = $apiInstance->getHlsStream($station_id_required, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsHLSStreamsApi->getHlsStream: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **id** | **int**| HLS Stream ID |

### Return type

[**\Swagger\Client\Model\StationMount**](../Model/StationMount.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getHlsStreams**
> \Swagger\Client\Model\StationMount[] getHlsStreams($station_id_required)



List all current HLS streams.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsHLSStreamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 

try {
    $result = $apiInstance->getHlsStreams($station_id_required);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsHLSStreamsApi->getHlsStreams: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |

### Return type

[**\Swagger\Client\Model\StationMount[]**](../Model/StationMount.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


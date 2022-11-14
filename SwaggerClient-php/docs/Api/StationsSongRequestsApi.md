# Swagger\Client\StationsSongRequestsApi

All URIs are relative to *http://azuracast.local/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getRequestableSongs**](StationsSongRequestsApi.md#getrequestablesongs) | **GET** /station/{station_id}/requests | 
[**submitSongRequest**](StationsSongRequestsApi.md#submitsongrequest) | **POST** /station/{station_id}/request/{request_id} | 

# **getRequestableSongs**
> \Swagger\Client\Model\ApiStationRequest[] getRequestableSongs($station_id_required)



Return a list of requestable songs.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\StationsSongRequestsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 

try {
    $result = $apiInstance->getRequestableSongs($station_id_required);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsSongRequestsApi->getRequestableSongs: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |

### Return type

[**\Swagger\Client\Model\ApiStationRequest[]**](../Model/ApiStationRequest.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **submitSongRequest**
> \Swagger\Client\Model\ApiStatus submitSongRequest($station_id_required, $request_id)



Submit a song request.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\StationsSongRequestsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$request_id = "request_id_example"; // string | The requestable song ID

try {
    $result = $apiInstance->submitSongRequest($station_id_required, $request_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsSongRequestsApi->submitSongRequest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **request_id** | **string**| The requestable song ID |

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


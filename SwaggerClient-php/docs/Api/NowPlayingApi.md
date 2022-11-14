# Swagger\Client\NowPlayingApi

All URIs are relative to *http://azuracast.local/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**nowplayingGet**](NowPlayingApi.md#nowplayingget) | **GET** /nowplaying | 
[**nowplayingStationIdGet**](NowPlayingApi.md#nowplayingstationidget) | **GET** /nowplaying/{station_id} | 

# **nowplayingGet**
> \Swagger\Client\Model\ApiNowPlaying[] nowplayingGet()



Returns a full summary of all stations' current state.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\NowPlayingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->nowplayingGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NowPlayingApi->nowplayingGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\ApiNowPlaying[]**](../Model/ApiNowPlaying.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **nowplayingStationIdGet**
> \Swagger\Client\Model\ApiNowPlaying nowplayingStationIdGet($station_id_required)



Returns a full summary of the specified station's current state.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\NowPlayingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 

try {
    $result = $apiInstance->nowplayingStationIdGet($station_id_required);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NowPlayingApi->nowplayingStationIdGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |

### Return type

[**\Swagger\Client\Model\ApiNowPlaying**](../Model/ApiNowPlaying.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


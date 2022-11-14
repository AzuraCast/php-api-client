# Swagger\Client\StationsSchedulesApi

All URIs are relative to *http://azuracast.local/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getSchedule**](StationsSchedulesApi.md#getschedule) | **GET** /station/{station_id}/schedule | 

# **getSchedule**
> \Swagger\Client\Model\ApiStationSchedule[] getSchedule($station_id_required, $now, $rows)



Return upcoming and currently ongoing schedule entries.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\StationsSchedulesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$now = "now_example"; // string | The date/time to compare schedule items to. Defaults to the current date and time.
$rows = 56; // int | The number of upcoming/ongoing schedule entries to return. Defaults to 5.

try {
    $result = $apiInstance->getSchedule($station_id_required, $now, $rows);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsSchedulesApi->getSchedule: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **now** | **string**| The date/time to compare schedule items to. Defaults to the current date and time. | [optional]
 **rows** | **int**| The number of upcoming/ongoing schedule entries to return. Defaults to 5. | [optional]

### Return type

[**\Swagger\Client\Model\ApiStationSchedule[]**](../Model/ApiStationSchedule.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


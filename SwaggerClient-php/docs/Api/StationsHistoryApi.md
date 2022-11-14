# Swagger\Client\StationsHistoryApi

All URIs are relative to *http://azuracast.local/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getStationHistory**](StationsHistoryApi.md#getstationhistory) | **GET** /station/{station_id}/history | 

# **getStationHistory**
> \Swagger\Client\Model\ApiDetailedSongHistory[] getStationHistory($station_id_required, $start, $end)



Return song playback history items for a given station.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\StationsHistoryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$station_id_required = new \Swagger\Client\Model\StationIdRequired(); // \Swagger\Client\Model\StationIdRequired | 
$start = "start_example"; // string | The start date for records, in YYYY-MM-DD format.
$end = "end_example"; // string | The end date for records, in YYYY-MM-DD format.

try {
    $result = $apiInstance->getStationHistory($station_id_required, $start, $end);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StationsHistoryApi->getStationHistory: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **station_id_required** | [**\Swagger\Client\Model\StationIdRequired**](../Model/.md)|  |
 **start** | **string**| The start date for records, in YYYY-MM-DD format. | [optional]
 **end** | **string**| The end date for records, in YYYY-MM-DD format. | [optional]

### Return type

[**\Swagger\Client\Model\ApiDetailedSongHistory[]**](../Model/ApiDetailedSongHistory.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


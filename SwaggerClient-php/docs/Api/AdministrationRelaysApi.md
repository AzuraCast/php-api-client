# Swagger\Client\AdministrationRelaysApi

All URIs are relative to *http://azuracast.local/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**internalGetRelayDetails**](AdministrationRelaysApi.md#internalgetrelaydetails) | **GET** /internal/relays | 

# **internalGetRelayDetails**
> \Swagger\Client\Model\ApiAdminRelay[] internalGetRelayDetails()



Returns all necessary information to relay all 'relayable' stations.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\AdministrationRelaysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->internalGetRelayDetails();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdministrationRelaysApi->internalGetRelayDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\ApiAdminRelay[]**](../Model/ApiAdminRelay.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


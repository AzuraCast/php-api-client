# Swagger\Client\MiscellaneousApi

All URIs are relative to *http://azuracast.local/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**3092a8238a915a0b6b324f2a90942a94**](MiscellaneousApi.md#3092a8238a915a0b6b324f2a90942a94) | **GET** /time | 
[**bc32a129ca3e8ad2060b71bdd90da78d**](MiscellaneousApi.md#bc32a129ca3e8ad2060b71bdd90da78d) | **GET** /status | 

# **3092a8238a915a0b6b324f2a90942a94**
> \Swagger\Client\Model\ApiTime 3092a8238a915a0b6b324f2a90942a94()



Returns the time (with formatting) in GMT and the user's local time zone, if logged in.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\MiscellaneousApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->3092a8238a915a0b6b324f2a90942a94();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MiscellaneousApi->3092a8238a915a0b6b324f2a90942a94: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\ApiTime**](../Model/ApiTime.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bc32a129ca3e8ad2060b71bdd90da78d**
> \Swagger\Client\Model\ApiSystemStatus bc32a129ca3e8ad2060b71bdd90da78d()



Returns an affirmative response if the API is active.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\MiscellaneousApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->bc32a129ca3e8ad2060b71bdd90da78d();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MiscellaneousApi->bc32a129ca3e8ad2060b71bdd90da78d: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\ApiSystemStatus**](../Model/ApiSystemStatus.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


# Swagger\Client\AdministrationStorageLocationsApi

All URIs are relative to *http://azuracast.local/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**addStorageLocation**](AdministrationStorageLocationsApi.md#addstoragelocation) | **POST** /admin/storage_locations | 
[**deleteStorageLocation**](AdministrationStorageLocationsApi.md#deletestoragelocation) | **DELETE** /admin/storage_location/{id} | 
[**editStorageLocation**](AdministrationStorageLocationsApi.md#editstoragelocation) | **PUT** /admin/storage_location/{id} | 
[**getStorageLocation**](AdministrationStorageLocationsApi.md#getstoragelocation) | **GET** /admin/storage_location/{id} | 
[**getStorageLocations**](AdministrationStorageLocationsApi.md#getstoragelocations) | **GET** /admin/storage_locations | 

# **addStorageLocation**
> \Swagger\Client\Model\ApiAdminStorageLocation addStorageLocation($body)



Create a new storage location.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\AdministrationStorageLocationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\ApiAdminStorageLocation(); // \Swagger\Client\Model\ApiAdminStorageLocation | 

try {
    $result = $apiInstance->addStorageLocation($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdministrationStorageLocationsApi->addStorageLocation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ApiAdminStorageLocation**](../Model/ApiAdminStorageLocation.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\ApiAdminStorageLocation**](../Model/ApiAdminStorageLocation.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteStorageLocation**
> \Swagger\Client\Model\ApiStatus deleteStorageLocation($id)



Delete a single storage location.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\AdministrationStorageLocationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 789; // int | Storage Location ID

try {
    $result = $apiInstance->deleteStorageLocation($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdministrationStorageLocationsApi->deleteStorageLocation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Storage Location ID |

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **editStorageLocation**
> \Swagger\Client\Model\ApiStatus editStorageLocation($id, $body)



Update details of a single storage location.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\AdministrationStorageLocationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 789; // int | Storage Location ID
$body = new \Swagger\Client\Model\ApiAdminStorageLocation(); // \Swagger\Client\Model\ApiAdminStorageLocation | 

try {
    $result = $apiInstance->editStorageLocation($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdministrationStorageLocationsApi->editStorageLocation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Storage Location ID |
 **body** | [**\Swagger\Client\Model\ApiAdminStorageLocation**](../Model/ApiAdminStorageLocation.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\ApiStatus**](../Model/ApiStatus.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getStorageLocation**
> \Swagger\Client\Model\ApiAdminStorageLocation getStorageLocation($id)



Retrieve details for a single storage location.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\AdministrationStorageLocationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 789; // int | User ID

try {
    $result = $apiInstance->getStorageLocation($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdministrationStorageLocationsApi->getStorageLocation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| User ID |

### Return type

[**\Swagger\Client\Model\ApiAdminStorageLocation**](../Model/ApiAdminStorageLocation.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getStorageLocations**
> \Swagger\Client\Model\ApiAdminStorageLocation[] getStorageLocations()



List all current storage locations in the system.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: ApiKey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');

$apiInstance = new Swagger\Client\Api\AdministrationStorageLocationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getStorageLocations();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdministrationStorageLocationsApi->getStorageLocations: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\ApiAdminStorageLocation[]**](../Model/ApiAdminStorageLocation.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


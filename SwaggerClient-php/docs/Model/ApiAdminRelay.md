# ApiAdminRelay

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Station ID | [optional] 
**name** | **string** | Station name | [optional] 
**shortcode** | **string** | Station \&quot;short code\&quot;, used for URL and folder paths | [optional] 
**description** | **string** | Station description | [optional] 
**url** | **string** | Station homepage URL | [optional] 
**genre** | **string** | The genre of the station | [optional] 
**type** | **string** | Which broadcasting software (frontend) the station uses | [optional] 
**port** | **int** | The port used by this station to serve its broadcasts. | [optional] 
**relay_pw** | **string** | The relay password for the frontend (if applicable). | [optional] 
**admin_pw** | **string** | The administrator password for the frontend (if applicable). | [optional] 
**mounts** | [**\Swagger\Client\Model\ApiNowPlayingStationMount[]**](ApiNowPlayingStationMount.md) | *_/ | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


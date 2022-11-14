# ApiNowPlayingStationQueue

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**cued_at** | **int** | UNIX timestamp when the AutoDJ is expected to queue the song for playback. | [optional] 
**played_at** | **int** | UNIX timestamp when playback is expected to start. | [optional] 
**duration** | **int** | Duration of the song in seconds | [optional] 
**playlist** | **string** | Indicates the playlist that the song was played from, if available, or empty string if not. | [optional] 
**is_request** | **bool** | Indicates whether the song is a listener request. | [optional] 
**song** | [**\Swagger\Client\Model\ApiSong**](ApiSong.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


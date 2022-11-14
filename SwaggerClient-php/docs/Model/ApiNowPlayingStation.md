# ApiNowPlayingStation

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Station ID | [optional] 
**name** | **string** | Station name | [optional] 
**shortcode** | **string** | Station \&quot;short code\&quot;, used for URL and folder paths | [optional] 
**description** | **string** | Station description | [optional] 
**frontend** | **string** | Which broadcasting software (frontend) the station uses | [optional] 
**backend** | **string** | Which AutoDJ software (backend) the station uses | [optional] 
**listen_url** | [****](.md) | The full URL to listen to the default mount of the station | [optional] 
**url** | **string** | The public URL of the station. | [optional] 
**public_player_url** | [****](.md) | The public player URL for the station. | [optional] 
**playlist_pls_url** | [****](.md) | The playlist download URL in PLS format. | [optional] 
**playlist_m3u_url** | [****](.md) | The playlist download URL in M3U format. | [optional] 
**is_public** | **bool** | If the station is public (i.e. should be shown in listings of all stations) | [optional] 
**mounts** | [**\Swagger\Client\Model\ApiNowPlayingStationMount[]**](ApiNowPlayingStationMount.md) | *_/ | [optional] 
**remotes** | [**\Swagger\Client\Model\ApiNowPlayingStationRemote[]**](ApiNowPlayingStationRemote.md) | *_/ | [optional] 
**hls_enabled** | **bool** | If the station has HLS streaming enabled. | [optional] 
**hls_url** | [****](.md) | The full URL to listen to the HLS stream for the station. | [optional] 
**hls_listeners** | **int** | HLS Listeners | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


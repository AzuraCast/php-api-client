# StationPlaylist

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** |  | [optional] 
**type** | **string** |  | [optional] 
**source** | **string** |  | [optional] 
**order** | **string** |  | [optional] 
**remote_url** | **string** |  | [optional] 
**remote_type** | **string** |  | [optional] 
**remote_buffer** | **int** | The total time (in seconds) that Liquidsoap should buffer remote URL streams. | [optional] 
**is_enabled** | **bool** |  | [optional] 
**is_jingle** | **bool** | If yes, do not send jingle metadata to AutoDJ or trigger web hooks. | [optional] 
**play_per_songs** | **int** |  | [optional] 
**play_per_minutes** | **int** |  | [optional] 
**play_per_hour_minute** | **int** |  | [optional] 
**weight** | **int** |  | [optional] 
**include_in_requests** | **bool** |  | [optional] 
**include_in_on_demand** | **bool** | Whether this playlist&#x27;s media is included in &#x27;on demand&#x27; download/streaming if enabled. | [optional] 
**backend_options** | **string** |  | [optional] 
**avoid_duplicates** | **bool** |  | [optional] 
**schedule_items** | [**null[]**](.md) | StationSchedule&gt; *_/ | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


# StationMedia

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**song_id** | **string** |  | [optional] 
**text** | **string** |  | [optional] 
**artist** | **string** |  | [optional] 
**title** | **string** |  | [optional] 
**unique_id** | **string** | A unique identifier associated with this record. | [optional] 
**album** | **string** | The name of the media file&#x27;s album. | [optional] 
**genre** | **string** | The genre of the media file. | [optional] 
**lyrics** | **string** | Full lyrics of the track, if available. | [optional] 
**isrc** | **string** | The track ISRC (International Standard Recording Code), used for licensing purposes. | [optional] 
**length** | **float** | The song duration in seconds. | [optional] 
**length_text** | **string** | The formatted song duration (in mm:ss format) | [optional] 
**path** | **string** | The relative path of the media file. | [optional] 
**mtime** | **int** | The UNIX timestamp when the database was last modified. | [optional] 
**amplify** | **float** | The amount of amplification (in dB) to be applied to the radio source (liq_amplify) | [optional] 
**fade_overlap** | **float** | The length of time (in seconds) before the next song starts in the fade (liq_start_next) | [optional] 
**fade_in** | **float** | The length of time (in seconds) to fade in the next track (liq_fade_in) | [optional] 
**fade_out** | **float** | The length of time (in seconds) to fade out the previous track (liq_fade_out) | [optional] 
**cue_in** | **float** | The length of time (in seconds) from the start of the track to start playing (liq_cue_in) | [optional] 
**cue_out** | **float** | The length of time (in seconds) from the CUE-IN of the track to stop playing (liq_cue_out) | [optional] 
**art_updated_at** | **int** | The latest time (UNIX timestamp) when album art was updated. | [optional] 
**playlists** | [**null[]**](.md) | StationPlaylistMedia&gt; *_/ | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


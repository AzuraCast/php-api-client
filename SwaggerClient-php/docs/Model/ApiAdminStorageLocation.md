# ApiAdminStorageLocation

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**type** | **string** | The type of storage location. | [optional] 
**adapter** | **string** | The storage adapter to use for this location. | [optional] 
**path** | **string** | The local path, if the local adapter is used, or path prefix for S3/remote adapters. | [optional] 
**s3_credential_key** | **string** | The credential key for S3 adapters. | [optional] 
**s3_credential_secret** | **string** | The credential secret for S3 adapters. | [optional] 
**s3_region** | **string** | The region for S3 adapters. | [optional] 
**s3_version** | **string** | The API version for S3 adapters. | [optional] 
**s3_bucket** | **string** | The S3 bucket name for S3 adapters. | [optional] 
**s3_endpoint** | **string** | The optional custom S3 endpoint S3 adapters. | [optional] 
**dropbox_auth_token** | **string** | The optional Dropbox Auth Token. | [optional] 
**sftp_host** | **string** | The host for SFTP adapters | [optional] 
**sftp_username** | **string** | The username for SFTP adapters | [optional] 
**sftp_password** | **string** | The password for SFTP adapters | [optional] 
**sftp_port** | **int** | The port for SFTP adapters | [optional] 
**sftp_private_key** | **string** | The private key for SFTP adapters | [optional] 
**sftp_private_key_pass_phrase** | **string** | The private key pass phrase for SFTP adapters | [optional] 
**storage_quota** | **string** |  | [optional] 
**storage_quota_bytes** | **string** |  | [optional] 
**storage_used** | **string** |  | [optional] 
**storage_used_bytes** | **string** |  | [optional] 
**storage_available** | **string** |  | [optional] 
**storage_available_bytes** | **string** |  | [optional] 
**storage_used_percent** | **int** |  | [optional] 
**is_full** | **bool** |  | [optional] 
**uri** | **string** | The URI associated with the storage location. | [optional] 
**stations** | **string[]** | The stations using this storage location, if any. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


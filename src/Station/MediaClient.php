<?php
declare(strict_types=1);

namespace AzuraCast\Api\Station;

use AzuraCast\Api\AbstractStationClient;
use AzuraCast\Api\Dto;
use AzuraCast\Api\Exception;

class MediaClient extends AbstractStationClient
{
    /**
     * @param string $uniqueId
     *
     * @return resource|bool
     *
     * @throws Exception\ClientRequestException
     */
    public function art(string $uniqueId)
    {
        $uri = sprintf('station/%s/art/%s', $this->stationId, $uniqueId);

        $response = $this->httpClient->get($uri);

        if ($response->getStatusCode() !== 200 && $response->getStatusCode() !== 404) {
            throw new Exception\ClientRequestException(sprintf(
                'Call to "%s" returned non-successful response with code %s and body: %s',
                $uri,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }

        $imageData = $response->getBody()->getContents();
        return imagecreatefromstring($imageData);
    }

    /**
     * @return Dto\MediaFileDto[]
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function list(): array
    {
        $mediaFilesDataArray = $this->request(
            'GET',
            sprintf('station/%s/files', $this->stationId)
        );

        $mediaFileDtoArray = [];
        foreach ($mediaFilesDataArray as $mediaFileData) {
            $mediaFileDtoArray[] = Dto\MediaFileDto::fromArray($mediaFileData);
        }
        return $mediaFileDtoArray;
    }

    /**
     * @param Dto\UploadFileDto $uploadFile
     *
     * @return Dto\MediaFileDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function upload(Dto\UploadFileDto $uploadFile): Dto\MediaFileDto
    {
        $mediaFileData = $this->request(
            'POST',
            sprintf('station/%s/files', $this->stationId),
            ['json' => $uploadFile]
        );

        return Dto\MediaFileDto::fromArray($mediaFileData);
    }
}

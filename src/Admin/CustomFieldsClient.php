<?php
declare(strict_types=1);

namespace AzuraCast\Api\Admin;

use AzuraCast\Api\AbstractClient;
use AzuraCast\Api\Dto;
use AzuraCast\Api\Exception;

class CustomFieldsClient extends AbstractClient
{
    /**
     * @return Dto\CustomFieldDto[]
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function list(): array
    {
        $customFieldsData = $this->request(
            'GET',
            'admin/custom_fields'
        );

        $customFields = [];
        foreach ($customFieldsData as $customFieldData) {
            $customFields[] = Dto\CustomFieldDto::fromArray($customFieldData);
        }
        return $customFields;
    }

    /**
     * @param int $customFieldId
     *
     * @return Dto\CustomFieldDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function get(int $customFieldId): Dto\CustomFieldDto
    {
        $customFieldData = $this->request(
            'GET',
            sprintf('admin/custom_field/%s', $customFieldId)
        );

        return Dto\CustomFieldDto::fromArray($customFieldData);
    }

    /**
     * @param string $name
     * @param string $shortName
     *
     * @return Dto\CustomFieldDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function create(
        string $name,
        string $shortName
    ): Dto\CustomFieldDto {
        $customFieldDto = new Dto\CustomFieldDto(
            0,
            $name,
            $shortName
        );

        $customFieldData = $this->request('POST', 'admin/custom_fields', ['json' => $customFieldDto]);
        return Dto\CustomFieldDto::fromArray($customFieldData);
    }

    /**
     * @param int $customFieldId
     * @param string $name
     * @param string $shortName
     *
     * @return Dto\CustomFieldDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function update(
        int $customFieldId,
        string $name,
        string $shortName
    ): Dto\CustomFieldDto {
        $customFieldDto = new Dto\CustomFieldDto(
            $customFieldId,
            $name,
            $shortName
        );

        $this->request(
            'PUT',
            sprintf('admin/custom_field/%s', $customFieldId),
            ['json' => $customFieldDto]
        );

        return $customFieldDto;
    }

    /**
     * @param int $customFieldId
     *
     * @return void
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function delete(int $customFieldId): void
    {
        $this->request(
            'DELETE',
            sprintf('admin/custom_field/%s', $customFieldId)
        );
    }
}

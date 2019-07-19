<?php
declare(strict_types=1);

namespace AzuraCast\Api\Admin;

use AzuraCast\Api\AbstractClient;
use AzuraCast\Api\Dto;
use AzuraCast\Api\Exception;

class SettingsClient extends AbstractClient
{
    /**
     * @return Dto\SettingsDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function list(): Dto\SettingsDto
    {
        $settingsData = $this->request('GET', 'admin/settings');

        return Dto\SettingsDto::fromArray($settingsData);
    }

    /**
     * @param string $baseUrl
     * @param string $instanceName
     * @param string $timezone
     * @param bool $preferBrowserUrl
     * @param bool $useRadioProxy
     * @param int $historyKeepDays
     * @param bool $alwaysUseSsl
     * @param string $apiAccessControl
     * @param string $analytics
     * @param bool $centralUpdatesChannel
     * @param string $publicTheme
     * @param bool $hideAlbumArt
     * @param string $homepageRedirectUrl
     * @param string $defaultAlbumArtUrl
     * @param bool $hideProductName
     * @param string $customCssPublic
     * @param string $customJsPublic
     * @param string $customCssInternal
     *
     * @return Dto\SettingsDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function update(
        string $baseUrl,
        string $instanceName,
        string $timezone,
        bool $preferBrowserUrl,
        bool $useRadioProxy,
        int $historyKeepDays,
        bool $alwaysUseSsl,
        string $apiAccessControl,
        string $analytics,
        bool $centralUpdatesChannel,
        string $publicTheme,
        bool $hideAlbumArt,
        string $homepageRedirectUrl,
        string $defaultAlbumArtUrl,
        bool $hideProductName,
        string $customCssPublic,
        string $customJsPublic,
        string $customCssInternal
    ): Dto\SettingsDto {
        $settingsDto = new Dto\SettingsDto(
            $baseUrl,
            $instanceName,
            $timezone,
            $preferBrowserUrl,
            $useRadioProxy,
            $historyKeepDays,
            $alwaysUseSsl,
            $apiAccessControl,
            $analytics,
            $centralUpdatesChannel,
            $publicTheme,
            $hideAlbumArt,
            $homepageRedirectUrl,
            $defaultAlbumArtUrl,
            $hideProductName,
            $customCssPublic,
            $customJsPublic,
            $customCssInternal
        );

        $this->request(
            'PUT',
            'admin/settings',
            ['json' => $settingsDto]
        );

        return $settingsDto;
    }
}

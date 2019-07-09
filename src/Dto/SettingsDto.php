<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

use JsonSerializable;

class SettingsDto implements JsonSerializable
{
    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var string
     */
    protected $instanceName;

    /**
     * @var string
     */
    protected $timezone;

    /**
     * @var bool
     */
    protected $preferBrowserUrl;

    /**
     * @var bool
     */
    protected $useRadioProxy;

    /**
     * @var int
     */
    protected $historyKeepDays;

    /**
     * @var bool
     */
    protected $alwaysUseSsl;

    /**
     * @var string
     */
    protected $apiAccessControl;

    /**
     * @var string
     */
    protected $analytics;

    /**
     * @var bool
     */
    protected $centralUpdatesChannel;

    /**
     * @var string
     */
    protected $publicTheme;

    /**
     * @var bool
     */
    protected $hideAlbumArt;

    /**
     * @var string
     */
    protected $homepageRedirectUrl;

    /**
     * @var string
     */
    protected $defaultAlbumArtUrl;

    /**
     * @var bool
     */
    protected $hideProductName;

    /**
     * @var string
     */
    protected $customCssPublic;

    /**
     * @var string
     */
    protected $customJsPublic;

    /**
     * @var string
     */
    protected $customCssInternal;

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
     */
    public function __construct(
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
    ) {
        $this->setBaseUrl($baseUrl)
            ->setInstanceName($instanceName)
            ->setTimezone($timezone)
            ->setPreferBrowserUrl($preferBrowserUrl)
            ->setUseRadioProxy($useRadioProxy)
            ->setHistoryKeepDays($historyKeepDays)
            ->setAlwaysUseSsl($alwaysUseSsl)
            ->setApiAccessControl($apiAccessControl)
            ->setAnalytics($analytics)
            ->setCentralUpdatesChannel($centralUpdatesChannel)
            ->setPublicTheme($publicTheme)
            ->setHideAlbumArt($hideAlbumArt)
            ->setHomepageRedirectUrl($homepageRedirectUrl)
            ->setDefaultAlbumArtUrl($defaultAlbumArtUrl)
            ->setHideProductName($hideProductName)
            ->setCustomCssPublic($customCssPublic)
            ->setCustomJsPublic($customJsPublic)
            ->setCustomCssInternal($customCssInternal);
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     *
     * @return SettingsDto
     */
    public function setBaseUrl(string $baseUrl): SettingsDto
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getInstanceName(): string
    {
        return $this->instanceName;
    }

    /**
     * @param string $instanceName
     *
     * @return SettingsDto
     */
    public function setInstanceName(string $instanceName): SettingsDto
    {
        $this->instanceName = $instanceName;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     *
     * @return SettingsDto
     */
    public function setTimezone(string $timezone): SettingsDto
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * @return bool
     */
    public function getPreferBrowserUrl(): bool
    {
        return $this->preferBrowserUrl;
    }

    /**
     * @param bool $preferBrowserUrl
     *
     * @return SettingsDto
     */
    public function setPreferBrowserUrl(bool $preferBrowserUrl): SettingsDto
    {
        $this->preferBrowserUrl = $preferBrowserUrl;

        return $this;
    }

    /**
     * @return bool
     */
    public function getUseRadioProxy(): bool
    {
        return $this->useRadioProxy;
    }

    /**
     * @param bool $useRadioProxy
     *
     * @return SettingsDto
     */
    public function setUseRadioProxy(bool $useRadioProxy): SettingsDto
    {
        $this->useRadioProxy = $useRadioProxy;

        return $this;
    }

    /**
     * @return int
     */
    public function getHistoryKeepDays(): int
    {
        return $this->historyKeepDays;
    }

    /**
     * @param int $historyKeepDays
     *
     * @return SettingsDto
     */
    public function setHistoryKeepDays(int $historyKeepDays): SettingsDto
    {
        $this->historyKeepDays = $historyKeepDays;

        return $this;
    }

    /**
     * @return bool
     */
    public function getAlwaysUseSsl(): bool
    {
        return $this->alwaysUseSsl;
    }

    /**
     * @param bool $alwaysUseSsl
     *
     * @return SettingsDto
     */
    public function setAlwaysUseSsl(bool $alwaysUseSsl): SettingsDto
    {
        $this->alwaysUseSsl = $alwaysUseSsl;

        return $this;
    }

    /**
     * @return string
     */
    public function getApiAccessControl(): string
    {
        return $this->apiAccessControl;
    }

    /**
     * @param string $apiAccessControl
     *
     * @return SettingsDto
     */
    public function setApiAccessControl(string $apiAccessControl): SettingsDto
    {
        $this->apiAccessControl = $apiAccessControl;

        return $this;
    }

    /**
     * @return string
     */
    public function getAnalytics(): string
    {
        return $this->analytics;
    }

    /**
     * @param string $analytics
     *
     * @return SettingsDto
     */
    public function setAnalytics(string $analytics): SettingsDto
    {
        $this->analytics = $analytics;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCentralUpdatesChannel(): bool
    {
        return $this->centralUpdatesChannel;
    }

    /**
     * @param bool $centralUpdatesChannel
     *
     * @return SettingsDto
     */
    public function setCentralUpdatesChannel(bool $centralUpdatesChannel): SettingsDto
    {
        $this->centralUpdatesChannel = $centralUpdatesChannel;

        return $this;
    }

    /**
     * @return string
     */
    public function getPublicTheme(): string
    {
        return $this->publicTheme;
    }

    /**
     * @param string $publicTheme
     *
     * @return SettingsDto
     */
    public function setPublicTheme(string $publicTheme): SettingsDto
    {
        $this->publicTheme = $publicTheme;

        return $this;
    }

    /**
     * @return bool
     */
    public function getHideAlbumArt(): bool
    {
        return $this->hideAlbumArt;
    }

    /**
     * @param bool $hideAlbumArt
     *
     * @return SettingsDto
     */
    public function setHideAlbumArt(bool $hideAlbumArt): SettingsDto
    {
        $this->hideAlbumArt = $hideAlbumArt;

        return $this;
    }

    /**
     * @return string
     */
    public function getHomepageRedirectUrl(): string
    {
        return $this->homepageRedirectUrl;
    }

    /**
     * @param string $homepageRedirectUrl
     *
     * @return SettingsDto
     */
    public function setHomepageRedirectUrl(string $homepageRedirectUrl): SettingsDto
    {
        $this->homepageRedirectUrl = $homepageRedirectUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultAlbumArtUrl(): string
    {
        return $this->defaultAlbumArtUrl;
    }

    /**
     * @param string $defaultAlbumArtUrl
     *
     * @return SettingsDto
     */
    public function setDefaultAlbumArtUrl(string $defaultAlbumArtUrl): SettingsDto
    {
        $this->defaultAlbumArtUrl = $defaultAlbumArtUrl;

        return $this;
    }

    /**
     * @return bool
     */
    public function getHideProductName(): bool
    {
        return $this->hideProductName;
    }

    /**
     * @param bool $hideProductName
     *
     * @return SettingsDto
     */
    public function setHideProductName(bool $hideProductName): SettingsDto
    {
        $this->hideProductName = $hideProductName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomCssPublic(): string
    {
        return $this->customCssPublic;
    }

    /**
     * @param string $customCssPublic
     *
     * @return SettingsDto
     */
    public function setCustomCssPublic(string $customCssPublic): SettingsDto
    {
        $this->customCssPublic = $customCssPublic;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomJsPublic(): string
    {
        return $this->customJsPublic;
    }

    /**
     * @param string $customJsPublic
     *
     * @return SettingsDto
     */
    public function setCustomJsPublic(string $customJsPublic): SettingsDto
    {
        $this->customJsPublic = $customJsPublic;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomCssInternal(): string
    {
        return $this->customCssInternal;
    }

    /**
     * @param string $customCssInternal
     *
     * @return SettingsDto
     */
    public function setCustomCssInternal(string $customCssInternal): SettingsDto
    {
        $this->customCssInternal = $customCssInternal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        return [
            'base_url' => $this->baseUrl,
            'instance_name' => $this->instanceName,
            'timezone' => $this->timezone,
            'prefer_browser_url' => $this->preferBrowserUrl,
            'use_radio_proxy' => $this->useRadioProxy,
            'history_keep_days' => $this->historyKeepDays,
            'always_use_ssl' => $this->alwaysUseSsl,
            'api_access_control' => $this->apiAccessControl,
            'analytics' => $this->analytics,
            'central_updates_channel' => $this->centralUpdatesChannel,
            'public_theme' => $this->publicTheme,
            'hide_album_art' => $this->hideAlbumArt,
            'homepage_redirect_url' => $this->homepageRedirectUrl,
            'default_album_art_url' => $this->defaultAlbumArtUrl,
            'hide_product_name' => $this->hideProductName,
            'custom_css_public' => $this->customCssPublic,
            'custom_js_public' => $this->customJsPublic,
            'custom_css_internal' => $this->customCssInternal
        ];
    }

    /**
     * @param array $settingsData
     *
     * @return SettingsDto
     */
    public static function fromArray(array $settingsData): self
    {
        return new self(
            $settingsData['base_url'],
            $settingsData['instance_name'],
            $settingsData['timezone'],
            (bool)$settingsData['prefer_browser_url'],
            (bool)$settingsData['use_radio_proxy'],
            $settingsData['history_keep_days'],
            (bool)$settingsData['always_use_ssl'],
            $settingsData['api_access_control'] ?? '',
            $settingsData['analytics'],
            (bool)$settingsData['central_updates_channel'],
            $settingsData['public_theme'],
            (bool)$settingsData['hide_album_art'],
            $settingsData['homepage_redirect_url'] ?? '',
            $settingsData['default_album_art_url'] ?? '',
            (bool)$settingsData['hide_product_name'],
            $settingsData['custom_css_public'] ?? '',
            $settingsData['custom_js_public'] ?? '',
            $settingsData['custom_css_internal'] ?? ''
        );
    }
}

<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient\Transformer;

use Vaalyn\AzuraCastApiClient\Dto\SettingsDto;

class SettingsDtoTransformer {
	/**
	 * @param array $settingsData
	 *
	 * @return SettingsDto
	 */
	public function arrayToDto(array $settingsData): SettingsDto {
		return new SettingsDto(
			$settingsData['base_url'],
			$settingsData['instance_name'],
			$settingsData['timezone'],
			(bool) $settingsData['prefer_browser_url'],
			(bool) $settingsData['use_radio_proxy'],
			$settingsData['history_keep_days'],
			(bool) $settingsData['always_use_ssl'],
			$settingsData['api_access_control'] ?? '',
			$settingsData['analytics'],
			(bool) $settingsData['central_updates_channel'],
			$settingsData['public_theme'],
			(bool) $settingsData['hide_album_art'],
			$settingsData['homepage_redirect_url'] ?? '',
			$settingsData['default_album_art_url'] ?? '',
			(bool) $settingsData['hide_product_name'],
			$settingsData['custom_css_public'] ?? '',
			$settingsData['custom_js_public'] ?? '',
			$settingsData['custom_css_internal'] ?? ''
		);
	}
}

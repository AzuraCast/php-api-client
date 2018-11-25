<?php

declare(strict_types = 1);

namespace Vaalyn\AzuraCastApiClient\Dto;

class RequestableSongDto {
	/**
	 * @var int
	 */
	protected $requestableSongId;

	/**
	 * @var string
	 */
	protected $requestUrl;

	/**
	 * @var SongDto
	 */
	protected $song;

	/**
	 * @param int $requestableSongId
	 * @param string $requestUrl
	 * @param SongDto $song
	 */
	public function __construct(int $requestableSongId, string $requestUrl, SongDto $song) {
		$this->setRequestableSongId($requestableSongId)
			->setRequestUrl($requestUrl)
			->setSong($song);
	}

	/**
	 * @return int
	 */
	public function getRequestableSongId(): int {
		return $this->requestableSongId;
	}

	/**
	 * @param int $requestableSongId
	 *
	 * @return RequestableSongDto
	 */
	public function setRequestableSongId(int $requestableSongId): RequestableSongDto {
		$this->requestableSongId = $requestableSongId;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getRequestUrl(): string {
		return $this->requestUrl;
	}

	/**
	 * @param string $requestUrl
	 *
	 * @return RequestableSongDto
	 */
	public function setRequestUrl(string $requestUrl): RequestableSongDto {
		$this->requestUrl = $requestUrl;

		return $this;
	}

	/**
	 * @return SongDto
	 */
	public function getSong(): SongDto {
		return $this->song;
	}

	/**
	 * @param SongDto $song
	 *
	 * @return RequestableSongDto
	 */
	public function setSong(SongDto $song): RequestableSongDto {
		$this->song = $song;

		return $this;
	}
}

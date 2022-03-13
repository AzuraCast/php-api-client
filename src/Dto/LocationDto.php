<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class LocationDto
{
    /**
     * @var string
     */
    protected $status;

    /**
     * @var string|null
     */
    protected $latitude;

    /**
     * @var string|null
     */
    protected $longitude;

    /**
     * @var string|null
     */
    protected $timezone;

    /**
     * @var string|null
     */
    protected $region;

    /**
     * @var string|null
     */
    protected $country;

    /**
     * @var string|null
     */
    protected $city;

    /**
     * @var string
     */
    protected $message;

    /**
     * @param string $status
     * @param string|null $latitude
     * @param string|null $longitude
     * @param string|null $timezone
     * @param string|null $region
     * @param string|null $country
     * @param string|null $city
     * @param string $message
     */
    public function __construct(
        string $status,
        ?string $latitude,
        ?string $longitude,
        ?string $timezone,
        ?string $region,
        ?string $country,
        ?string $city,
        string $message
    ) {
        $this->setStatus($status)
            ->setLatitude($latitude)
            ->setLongitude($longitude)
            ->setTimezone($timezone)
            ->setRegion($region)
            ->setCountry($country)
            ->setCity($city)
            ->setMessage($message);
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return LocationDto
     */
    public function setStatus(string $status): LocationDto
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    /**
     * @param string|null $latitude
     *
     * @return LocationDto
     */
    public function setLatitude(?string $latitude): LocationDto
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    /**
     * @param string|null $longitude
     *
     * @return LocationDto
     */
    public function setLongitude(?string $longitude): LocationDto
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * @param string|null $timezone
     *
     * @return LocationDto
     */
    public function setTimezone(?string $timezone): LocationDto
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * @param string|null $region
     *
     * @return LocationDto
     */
    public function setRegion(?string $region): LocationDto
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     *
     * @return LocationDto
     */
    public function setCountry(?string $country): LocationDto
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     *
     * @return LocationDto
     */
    public function setCity(?string $city): LocationDto
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     *
     * @return LocationDto
     */
    public function setMessage(string $message): LocationDto
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param mixed[] $locationData
     *
     * @return LocationDto
     */
    public static function fromArray(array $locationData): self
    {
        $lat = $locationData['lat'] ?? null;
        $lon = $locationData['lon'] ?? null;

        return new self(
            $locationData['status'],
            ($lat !== null) ? (string)$lat : $lat,
            ($lon !== null) ? (string)$lon : $lon,
            $locationData['timezone'] ?? null,
            $locationData['region'] ?? null,
            $locationData['country'] ?? null,
            $locationData['city'] ?? null,
            $locationData['message']
        );
    }
}

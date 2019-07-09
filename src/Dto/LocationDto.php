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
     * @var string
     */
    protected $latitude;

    /**
     * @var string
     */
    protected $longitude;

    /**
     * @var string
     */
    protected $timezone;

    /**
     * @var string
     */
    protected $region;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $message;

    /**
     * @param string $status
     * @param string $latitude
     * @param string $longitude
     * @param string $timezone
     * @param string $region
     * @param string $country
     * @param string $city
     * @param string $message
     */
    public function __construct(
        string $status,
        string $latitude,
        string $longitude,
        string $timezone,
        string $region,
        string $country,
        string $city,
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
     * @return string
     */
    public function getLatitude(): string
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     *
     * @return LocationDto
     */
    public function setLatitude(string $latitude): LocationDto
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return string
     */
    public function getLongitude(): string
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     *
     * @return LocationDto
     */
    public function setLongitude(string $longitude): LocationDto
    {
        $this->longitude = $longitude;

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
     * @return LocationDto
     */
    public function setTimezone(string $timezone): LocationDto
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $region
     *
     * @return LocationDto
     */
    public function setRegion(string $region): LocationDto
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return LocationDto
     */
    public function setCountry(string $country): LocationDto
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return LocationDto
     */
    public function setCity(string $city): LocationDto
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
     * @param array $locationData
     *
     * @return LocationDto
     */
    public static function fromArray(array $locationData): self
    {
        return new self(
            $locationData['status'],
            (string)$locationData['lat'],
            (string)$locationData['lon'],
            $locationData['timezone'],
            $locationData['region'],
            $locationData['country'],
            $locationData['city'],
            $locationData['message']
        );
    }
}

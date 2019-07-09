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
     * @param array $locationData
     */
    public function __construct(array $locationData)
    {
        $this->setStatus($locationData['status'])
            ->setLatitude((string)$locationData['lat'])
            ->setLongitude((string)$locationData['lon'])
            ->setTimezone($locationData['timezone'])
            ->setRegion($locationData['region'])
            ->setCountry($locationData['country'])
            ->setCity($locationData['city'])
            ->setMessage($locationData['message']);
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
}

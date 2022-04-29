<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class LocationDto
{
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
     * @var string|null
     */
    protected $description;

    /**
     * @param string|null $latitude
     * @param string|null $longitude
     * @param string|null $region
     * @param string|null $country
     * @param string|null $city
     * @param string|null $description
     */
    public function __construct(
        ?string $latitude,
        ?string $longitude,
        ?string $region,
        ?string $country,
        ?string $city,
        ?string $description
    ) {
        $this->setLatitude($latitude)
            ->setLongitude($longitude)
            ->setRegion($region)
            ->setCountry($country)
            ->setCity($city)
            ->setDescription($description);
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
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return LocationDto
     */
    public function setDescription(?string $description): LocationDto
    {
        $this->description = $description;

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
            ($lat !== null) ? (string)$lat : $lat,
            ($lon !== null) ? (string)$lon : $lon,
            $locationData['region'] ?? null,
            $locationData['country'] ?? null,
            $locationData['city'] ?? null,
            $locationData['description'] ?? null
        );
    }
}

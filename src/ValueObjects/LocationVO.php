<?php
namespace mghddev\speed\ValueObjects;

/**
 * Class LocationVO
 * @package mghddev\speed\ValueObjects
 */
class LocationVO
{
    /**
     * @var string | null
     */
    protected $postal_code;

    /**
     * @var string
     */
    protected $address;

    /**
     * @var string | null
     */
    protected $region;

    /**
     * @var string | null
     */
    protected $district;

    /**
     * @var string | null
     */
    protected $latitude;

    /**
     * @var string | null
     */
    protected $longitude;

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    /**
     * @param string|null $postal_code
     * @return LocationVO
     */
    public function setPostalCode(?string $postal_code)
    {
        $this->postal_code = $postal_code;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return LocationVO
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
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
     * @return LocationVO
     */
    public function setRegion(?string $region)
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDistrict(): ?string
    {
        return $this->district;
    }

    /**
     * @param string|null $district
     * @return LocationVO
     */
    public function setDistrict(?string $district)
    {
        $this->district = $district;
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
     * @return LocationVO
     */
    public function setLatitude(?string $latitude)
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
     * @return LocationVO
     */
    public function setLongitude(?string $longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

}
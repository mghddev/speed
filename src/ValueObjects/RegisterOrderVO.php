<?php
namespace mghddev\speed\ValueObjects;

use DateTime;

/**
 * Class RegisterOrderVO
 * @package mghddev\speed
 */
class RegisterOrderVO
{

    /**
     * @var string | null
     */
    protected $code;

    /**
     * @var string
     */
    protected $national_code;

    /**
     * @var string
     */
    protected $full_name;

    /**
     * @var string | null
     */
    protected $company;

    /**
     * @var string | null
     */
    protected $phone;

    /**
     * @var string | null
     */
    protected $mobile;

    /**
     * @var string | null
     */
    protected $description;

    /**
     * @var DateTime | null
     */
    protected $delivery_date;

    /**
     * @var int
     */
    protected $shift;

    /**
     * @var int | null
     */
    protected $cost_of_destination;

    /**
     * @var bool | null
     */
    protected $has_return;

    /**
     * @var string | null
     */
    protected $return_details;

    /**
     * @var LocationVO
     */
    protected $location;

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     * @return RegisterOrderVO
     */
    public function setCode(?string $code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getNationalCode(): string
    {
        return $this->national_code;
    }

    /**
     * @param string $national_code
     * @return RegisterOrderVO
     */
    public function setNationalCode(string $national_code)
    {
        $this->national_code = $national_code;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->full_name;
    }

    /**
     * @param string $full_name
     * @return RegisterOrderVO
     */
    public function setFullName(string $full_name)
    {
        $this->full_name = $full_name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param string|null $company
     * @return RegisterOrderVO
     */
    public function setCompany(?string $company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return RegisterOrderVO
     */
    public function setPhone(?string $phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    /**
     * @param string|null $mobile
     * @return RegisterOrderVO
     */
    public function setMobile(?string $mobile)
    {
        $this->mobile = $mobile;
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
     * @return RegisterOrderVO
     */
    public function setDescription(?string $description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDeliveryDate(): ?DateTime
    {
        return $this->delivery_date;
    }

    /**
     * @param DateTime|null $delivery_date
     * @return RegisterOrderVO
     */
    public function setDeliveryDate(?DateTime $delivery_date)
    {
        $this->delivery_date = $delivery_date;
        return $this;
    }

    /**
     * @return int
     */
    public function getShift(): int
    {
        return $this->shift;
    }

    /**
     * @param int $shift
     * @return RegisterOrderVO
     */
    public function setShift(int $shift)
    {
        $this->shift = $shift;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCostOfDestination(): ?int
    {
        return $this->cost_of_destination;
    }

    /**
     * @param int|null $cost_of_destination
     * @return RegisterOrderVO
     */
    public function setCostOfDestination(?int $cost_of_destination)
    {
        $this->cost_of_destination = $cost_of_destination;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasReturn(): ?bool
    {
        return $this->has_return;
    }

    /**
     * @param bool|null $has_return
     * @return RegisterOrderVO
     */
    public function setHasReturn(?bool $has_return)
    {
        $this->has_return = $has_return;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReturnDetails(): ?string
    {
        return $this->return_details;
    }

    /**
     * @param string|null $return_details
     * @return RegisterOrderVO
     */
    public function setReturnDetails(?string $return_details)
    {
        $this->return_details = $return_details;
        return $this;
    }

    /**
     * @return LocationVO
     */
    public function getLocation(): LocationVO
    {
        return $this->location;
    }

    /**
     * @param LocationVO $location
     * @return RegisterOrderVO
     */
    public function setLocation(LocationVO $location)
    {
        $this->location = $location;
        return $this;
    }


}
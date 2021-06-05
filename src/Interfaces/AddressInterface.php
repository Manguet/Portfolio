<?php

namespace App\Interfaces;

/**
 * @author Benjamin Manguet
 */
interface AddressInterface
{
    /**
     * @return string|null
     */
    public function getAddress(): ?string;

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): void;

    /**
     * @return string|null
     */
    public function getAddress2(): ?string;

    /**
     * @param string|null $address2
     */
    public function setAddress2(?string $address2): void;

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string;

    /**
     * @param string|null $postalCode
     */
    public function setPostalCode(?string $postalCode): void;

    /**
     * @return string|null
     */
    public function getCity(): ?string;

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void;

    /**
     * @return string|null
     */
    public function getCountry(): ?string;

    /**
     * @param string|null $country
     */
    public function setCountry(?string $country): void;
}
<?php

namespace App\Interfaces;

use DateTime;

/**
 * @author Benjamin Manguet
 */
interface PersonnalDataInterface
{
    /**
     * @return string
     */
    public function getFirstname(): string;

    /**
     * @param string $firstname
     *
     * @return $this
     */
    public function setFirstname(string $firstname): self;

    /**
     * @return string
     */
    public function getLastname(): string;

    /**
     * @param string $lastname
     *
     * @return $this
     */
    public function setLastname(string $lastname): self;

    /**
     * @return string|null
     */
    public function getPhone(): ?string;
    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void;

    /**
     * @return string|null
     */
    public function getPhone2(): ?string;

    /**
     * @param string|null $phone2
     */
    public function setPhone2(?string $phone2): void;

    /**
     * @return null|string
     */
    public function isAvailable(): ?string;

    /**
     * @param string $isAvailable
     *
     * @return $this
     */
    public function setIsAvailable(string $isAvailable):self;

    /**
     * @return null|string
     */
    public function getWorkAt(): ?string;

    /**
     * @param string $workAt
     */
    public function setWorkAt(string $workAt): void;

    /**
     * @return null|DateTime
     */
    public function getBirthdate(): ?DateTime;

    /**
     * @param DateTime $birthdate
     */
    public function setBirthdate(DateTime $birthdate): void;
}
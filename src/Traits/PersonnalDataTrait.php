<?php

namespace App\Traits;

use App\Entity\User;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Benjamin Manguet
 */
trait PersonnalDataTrait
{
    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=180, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=180, nullable=false)
     */
    private $lastname;

    /**
     * @var null|string
     *
     * @ORM\Column(name="phone", type="string", length=10, nullable=true)
     */
    private $phone;

    /**
     * @var null|string
     *
     * @ORM\Column(name="phone2", type="string", length=10, nullable=true)
     */
    private $phone2;

    /**
     * @var null|string
     *
     * @ORM\Column(name="is_available", type="string", nullable=false)
     */
    private $isAvailable;

    /**
     * @var null|string
     *
     * @ORM\Column(name="work_at", type="string", nullable=true)
     */
    private $workAt;

    /**
     * @var null|DateTime
     *
     * @ORM\Column(name="birthdate", type="datetime", nullable=true)
     */
    private $birthdate;

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     *
     * @return $this
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     *
     * @return $this
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return chunk_split($this->phone, 2, ' ');
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $phone = str_replace(' ', '', $phone);

        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getPhone2(): ?string
    {
        return chunk_split($this->phone2, 2, ' ');
    }

    /**
     * @param string|null $phone2
     */
    public function setPhone2(?string $phone2): void
    {
        $phone2 = str_replace(' ', '', $phone2);

        $this->phone2 = $phone2;
    }

    /**
     * @return null|string
     */
    public function isAvailable(): ?string
    {
        return $this->isAvailable;
    }

    /**
     * @param string $isAvailable
     *
     * @return $this
     */
    public function setIsAvailable(string $isAvailable):self
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getWorkAt(): ?string
    {
        return $this->workAt;
    }

    /**
     * @param string $workAt
     */
    public function setWorkAt(string $workAt): void
    {
        $this->workAt = $workAt;
    }

    /**
     * @return null|DateTime
     */
    public function getBirthdate(): ?DateTime
    {
        return $this->birthdate;
    }

    /**
     * @param DateTime $birthdate
     */
    public function setBirthdate(DateTime $birthdate): void
    {
        $this->birthdate = $birthdate;
    }
}
<?php

namespace App\Entity;

use App\Repository\ToolRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ToolRepository::class)
 */
class Tool
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $site;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $host;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hostAddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hostAddress2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hostPostalCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hostCity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hostCountry;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $societyName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSite(): ?string
    {
        return $this->site;
    }

    public function setSite(?string $site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getHost(): ?string
    {
        return $this->host;
    }

    public function setHost(?string $host): self
    {
        $this->host = $host;

        return $this;
    }

    public function getHostAddress(): ?string
    {
        return $this->hostAddress;
    }

    public function setHostAddress(?string $hostAddress): self
    {
        $this->hostAddress = $hostAddress;

        return $this;
    }

    public function getHostAddress2(): ?string
    {
        return $this->hostAddress2;
    }

    public function setHostAddress2(?string $hostAddress2): self
    {
        $this->hostAddress2 = $hostAddress2;

        return $this;
    }

    public function getHostPostalCode(): ?string
    {
        return $this->hostPostalCode;
    }

    public function setHostPostalCode(?string $hostPostalCode): self
    {
        $this->hostPostalCode = $hostPostalCode;

        return $this;
    }

    public function getHostCity(): ?string
    {
        return $this->hostCity;
    }

    public function setHostCity(?string $hostCity): self
    {
        $this->hostCity = $hostCity;

        return $this;
    }

    public function getHostCountry(): ?string
    {
        return $this->hostCountry;
    }

    public function setHostCountry(?string $hostCountry): self
    {
        $this->hostCountry = $hostCountry;

        return $this;
    }

    public function getSocietyName(): ?string
    {
        return $this->societyName;
    }

    public function setSocietyName(?string $societyName): self
    {
        $this->societyName = $societyName;

        return $this;
    }
}

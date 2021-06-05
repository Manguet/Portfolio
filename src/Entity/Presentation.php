<?php

namespace App\Entity;

use App\Repository\PresentationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PresentationRepository::class)
 */
class Presentation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var null|string
     *
     * @ORM\Column(name="presentation", type="text", nullable=true)
     */
    private $presentation;

    /**
     * @var null|string
     *
     * @ORM\Column(name="presentation_en", type="text", nullable=true)
     */
    private $presentationEn;

    /**
     * @ORM\Column(name="is_actually_used", type="boolean", nullable=true)
     */
    private $isActuallyUsed;

    /**
     * @ORM\Column(name="liscences", type="string", length=255, nullable=true)
     */
    private $liscences;

    /**
     * @ORM\Column(name="liscences_en", type="string", length=255, nullable=true)
     */
    private $liscencesEn;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $locality;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(?string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPresentationEn(): ?string
    {
        return $this->presentationEn;
    }

    /**
     * @param string|null $presentationEn
     */
    public function setPresentationEn(?string $presentationEn): void
    {
        $this->presentationEn = $presentationEn;
    }

    public function getIsActuallyUsed(): ?bool
    {
        return $this->isActuallyUsed;
    }

    public function setIsActuallyUsed(?bool $isActuallyUsed): self
    {
        $this->isActuallyUsed = $isActuallyUsed;

        return $this;
    }

    public function getLiscences(): ?string
    {
        return $this->liscences;
    }

    public function setLiscences(?string $liscences): self
    {
        $this->liscences = $liscences;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLiscencesEn()
    {
        return $this->liscencesEn;
    }

    /**
     * @param mixed $liscencesEn
     */
    public function setLiscencesEn($liscencesEn): void
    {
        $this->liscencesEn = $liscencesEn;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(?string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }
}

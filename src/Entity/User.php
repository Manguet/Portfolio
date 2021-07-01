<?php

namespace App\Entity;

use App\Interfaces\AddressInterface;
use App\Interfaces\PersonnalDataInterface;
use App\Repository\UserRepository;
use App\Traits\AddressTrait;
use App\Traits\PersonnalDataTrait;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 *
 * @author Benjamin Manguet
 */
class User implements UserInterface, AddressInterface, PersonnalDataInterface
{
    use AddressTrait;
    use PersonnalDataTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=180, unique=true, nullable=false)
     */
    private $email;

    /**
     * @ORM\Column(name="roles", type="string")
     */
    private $roles;

    /**
     * @var string The hashed password
     *
     * @ORM\Column(type="string")
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return 'Administrateur : ' . $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        return explode(',', $this->roles);
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}

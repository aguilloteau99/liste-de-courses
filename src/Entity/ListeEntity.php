<?php

namespace App\Entity;

use App\Repository\ListeEntityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListeEntityRepository::class)
 */
class ListeEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isBuy;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIsBuy(): ?bool
    {
        return $this->isBuy;
    }

    public function setIsBuy(bool $isBuy): self
    {
        $this->isBuy = $isBuy;

        return $this;
    }
}

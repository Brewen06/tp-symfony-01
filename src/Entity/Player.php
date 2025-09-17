<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
#[ORM\Table(name: "tbl_players")]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $xp = null;

    #[ORM\ManyToOne(inversedBy: 'players')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Level $level = null;

    #[ORM\Column(length: 50)]
    private ?string $groups = null;

    #[ORM\ManyToOne(inversedBy: 'catégories')]
    private ?Categories $categories = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Archer = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Chevalier = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Mage = null;


    public function __construct()
    {
        $this->catégories = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->label;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getXp(): ?int
    {
        return $this->xp;
    }

    public function setXp(?int $xp): static
    {
        $this->xp = $xp;

        return $this;
    }

    public function getLevel(): ?Level
    {
        return $this->level;
    }

    public function setLevel(?Level $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getGroups(): ?string
    {
        return $this->groups;
    }

    public function setGroups(string $groups): static
    {
        $this->groups = $groups;

        return $this;
    }

    public function getCatégories(): ?Categories
    {
        return $this->catégories;
    }

    public function setCatégories(?Categories $catégories): static
    {
        $this->catégories = $catégories;

        return $this;
    }

    public function getCategories(): ?Categories
    {
        return $this->categories;
    }

    public function setCategories(?Categories $categories): static
    {
        $this->categories = $categories;

        return $this;
    }

    public function getArcher(): ?string
    {
        return $this->Archer;
    }

    public function setArcher(?string $Archer): static
    {
        $this->Archer = $Archer;

        return $this;
    }

    public function getChevalier(): ?string
    {
        return $this->Chevalier;
    }

    public function setChevalier(?string $Chevalier): static
    {
        $this->Chevalier = $Chevalier;

        return $this;
    }

    public function getMage(): ?string
    {
        return $this->Mage;
    }

    public function setMage(?string $Mage): static
    {
        $this->Mage = $Mage;

        return $this;
    }


    

}
<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
#[ORM\Table(name: "tbl_categories")]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Player>
     */
    #[ORM\OneToMany(targetEntity: Player::class, mappedBy: 'catégories')]
    private Collection $players;

    /**
     * @var Collection<int, Player>
     */
    #[ORM\OneToMany(targetEntity: Player::class, mappedBy: 'categories')]
    private Collection $catégories;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    

    public function __construct()
    {
        $this->players = new ArrayCollection();
        $this->catégories = new ArrayCollection();
       
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
    /**
     * @return Collection<int, Player>
     */
    public function getCatégories(): Collection
    {
        return $this->catégories;
    }

    public function addCatGory(Player $catGory): static
    {
        if (!$this->catégories->contains($catGory)) {
            $this->catégories->add($catGory);
            $catGory->setCategories($this);
        }

        return $this;
    }

    public function removeCatGory(Player $catGory): static
    {
        if ($this->catégories->removeElement($catGory)) {
            // set the owning side to null (unless already changed)
            if ($catGory->getCategories() === $this) {
                $catGory->setCategories(null);
            }
        }

        return $this;
    }

    
   
}

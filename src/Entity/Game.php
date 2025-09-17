<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function __construct()
    {
        $this->players = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name . ' (' . $this->started_at->format('d/m/Y H:i') . ' )';
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}

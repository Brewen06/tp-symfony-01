<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "tbl_players")]
class Player
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $name;

    public function getId(): int 
    {
        return $this->id;
    }
    public function getName(): int 
    {
        return $this->name;
    }
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }
    public function setName($name): self 
    {
        $this->name = $name;
        return $this;
    }
}
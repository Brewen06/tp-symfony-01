<?php

namespace App\Controller; 

use App\Entity\Player;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerController extends AbstractController
{
    private PlayerRepository $playerRepository;
    private EntityManagerInterface $entityManager;


    public function __construct(PlayerRepository $playerRepository, EntityManagerInterface $entityManager)
    {
        $this->playerRepository = $playerRepository;
        $this->entityManager = $entityManager;
    }
    
    #[Route('player/delete/{id}', name: 'delete_player')]
    public function delete(int $id): Response
    {
        $player = $this->playerRepository->find($id);
        if ($player) {
            $this->entityManager->remove($player);
            $this->entityManager->flush();
            return new Response('Player with id' .$id. 'deleted');
        } else {
            return new Response('Player with id' .$id. 'not found', 404);
        }
    }

    #[Route('/player/', name:'app_player')]
    public function index(): Response
    {
        $players = $this->playerRepository->findAll();

        return $this->render('player/index.html.twig', [
            'players' => $players,
        ]);
    }

    #[Route('/player/create', name: 'create_player')]
    public function create(): Response
    {
        $player = new Player();
        $player->setName('Link');
        $player->setXp('100');

        $this->$entityManager->persist($player);
        $entityManager->flush();

        return new Response('Player created with id '.$player->getId());
    }

}
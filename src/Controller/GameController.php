<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GameController extends AbstractController
{
    #[Route('/', name: 'app_game')]
    public function index(): Response
    {
       
        $info = 'Bonjour';
        return $this->render('index.html.twig', [
            'information' => $info
        ]);
    }
    #[Route('/go/{id}', name: 'start')]
    public function go(int $id): Response
    {
        $info = "La partie N°$id est lancée";
        return new Response($info);
    }
}
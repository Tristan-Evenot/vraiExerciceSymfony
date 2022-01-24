<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BibliothequeRepository;

class IndexController extends AbstractController {
    private BibliothequeRepository $bibliothequeRepository;

    public function __construct(BibliothequeRepository $bibliothequeRepository) {
        $this->bibliothequeRepository = $bibliothequeRepository;
    }

    #[Route('/', name: 'index')]
    public function index(): Response {
        $bibliotheques = $this->bibliothequeRepository->findAll();
        return $this->render('index.html.twig', [
            'bibliotheques' => $bibliotheques,
        ]);
    }
}

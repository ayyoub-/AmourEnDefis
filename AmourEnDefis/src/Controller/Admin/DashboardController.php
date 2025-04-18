<?php

namespace App\Controller\Admin;

use App\Repository\DefisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'admin')]
class DashboardController extends AbstractController
{
    public function __construct(private readonly DefisRepository $defiRepository)
    {
    }

    #[Route('/defis', name: 'admin_defi')]
    public function defisList(): Response
    {
        $defis = $this->defiRepository->findAll();

        return $this->render('admin/defi/index.html.twig', [
            'defis' => $defis,
        ]);
    }
}

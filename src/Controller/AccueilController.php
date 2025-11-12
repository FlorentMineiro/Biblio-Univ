<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
   #[Route('/')]
   public function index() : Response
   {
    $nbOuv = random_int(10,10000);
     return $this->render("accueil.html.twig",[
        "nbOuv" => $nbOuv,
     ]);
   }
}

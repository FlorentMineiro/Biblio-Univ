<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class LivreController extends AbstractController
{
  private array $livres = 
  [
    1 => [
 'id' => 1,
 'titre' => 'Introduction aux Algorithmes',
 'auteur' => 'Thomas H. Cormen',
 'isbn' => '978-2100545261',
 'genre' => 'informatique',
 'annee_publication' => 2010,
 'nombre_pages' => 1200,
 'disponible' => true,
 'nombre_exemplaires' => 3,
 'resume' => 'Manuel de référence couvrant les algorithmes fondamentaux et les structures de 
données.',
 'editeur' => 'Dunod',
 'cote' => 'INF.004.COR'
 ],
 2 => [
 'id' => 2,
 'titre' => 'Le Rouge et le Noir',
 'auteur' => 'Stendhal',
 'isbn' => '978-2070360024',
 'genre' => 'litterature',
 'annee_publication' => 1830,
 'nombre_pages' => 720,
 'disponible' => false,
 'nombre_exemplaires' => 0,
 'resume' => 'Roman emblématique du XIXe siècle suivant les ambitions de Julien Sorel.',
 'editeur' => 'Gallimard',
'cote' => 'LIT.840.STE'
 ],
 3 => [
 'id' => 3,
 'titre' => 'Physique Quantique - Fondements et Applications',
 'auteur' => 'Michel Le Bellac',
 'isbn' => '978-2759807802',
 'genre' => 'sciences',
 'annee_publication' => 2013,
 'nombre_pages' => 450,
 'disponible' => true,
 'nombre_exemplaires' => 2,
 'resume' => 'Introduction moderne à la mécanique quantique avec applications pratiques.',
 'editeur' => 'EDP Sciences',
 'cote' => 'PHY.530.LEB'
   ]
 
 ];
  
   #[Route('/Catalogue')]
   public function app_catalogue_liste() : Response
   {


         
              return $this->render('Catalogue/catalogue.html.twig', [
               
                  'livres' => $this->livres,
                      
         
        ]);
         
             
   }

   #[Route('/livre/{id}')]
   public function livre(int $id) : Response
   {
   
     
 
          return $this->render('description.html.twig', [
               
                  'livre' => $this->livres[$id] ?? null,
                      
         
        ]);
        
        if (!isset($this->livres[$id]) )//peut marcher selon les compilateur : !$this->livres[$id]
        {
         throw $this->createNotFoundException("Ce livre n'existe pas ");
        }
           

        
   }
   #[Route('/catalogue/genre/{genre}')]
   public function genre(string $genreLivre) : Response
   {
     
    
   return $this->render('Catalogue/genre/genre.html.twig',[
      'genreLivre'=> $this->livres[$genreLivre],
      
 ]);

   }
  
   
   
  
}

<?php

namespace App\Controller;

use App\Entity\Partie;
use App\Form\PartieType;
use App\Repository\PartieRepository;
use App\Repository\PersonnageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/partie')]
class PartieController extends AbstractController
{
    
    #[Route('/partie/{id}/{is_modified?null}', name: 'app_partie_en_cours', methods: ['POST', 'GET'])]
    public function partieEnCours($is_modified, Partie $partie, Request $request, EntityManagerInterface $entityManager, PersonnageRepository $personnageRep): Response
    {
        //On vide les persos a chaque entrée si jamais il revient en arrière pour pas cumuler les joueurs
        // foreach ($partie->getPersonnages() as $key) {
        //     $partie->removePersonnage($key);
        // }
        
        $quest = $request->request->all();
        foreach ($quest as $key => $value) {
          $personnage = $personnageRep->find($value);
          $partie->addPersonnage($personnage);
          $entityManager->persist($partie);
        } 
        $entityManager->flush();
        
        return $this->render('partie/en_cours.html.twig', [
            'partie' => $partie,
            'is_modified'=>$is_modified
        ]);
    }
   
    #[Route('/new/{id_partie?null}', name: 'app_partie_new', methods: ['GET', 'POST'])]
    public function app_partie_new(Request $request, PartieRepository $partieRepository ,$id_partie, EntityManagerInterface $entityManager): Response
    {
       
        $user = $this->getUser();
        $user->setRoles(['GAME_MASTER']);

        $entityManager->persist($user);
        $entityManager->flush();

        $id_partie != 'null'? $partie=$partieRepository->find($id_partie):$partie = new Partie();
        $form = $this->createForm(PartieType::class, $partie,['user'=>$this->getUser()] );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $partieRepository->add($partie);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_partie_new', ["id_partie"=>$partie->getId()], Response::HTTP_SEE_OTHER);
        }
            return $this->renderForm('partie/new.html.twig', [
                'partie' => $partie,
                'form' => $form,
                'id_partie'=>$id_partie
                ]);
        
    }

    
    

    #[Route('/{id}/edit', name: 'app_partie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Partie $partie, PartieRepository $partieRepository): Response
    {
        $form = $this->createForm(PartieType::class, $partie, ['user'=>$this->getUser()]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $partieRepository->add($partie);
            return $this->redirectToRoute('app_partie_new', ["id"=>$partie->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('partie/edit.html.twig', [
            'partie' => $partie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_partie_delete', methods: ['POST'])]
    public function delete(Request $request, Partie $partie, PartieRepository $partieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$partie->getId(), $request->request->get('_token'))) {
            $partieRepository->remove($partie);
        }

        return $this->redirectToRoute('app_partie_new', [], Response::HTTP_SEE_OTHER);
    }
}

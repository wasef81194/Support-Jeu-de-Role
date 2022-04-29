<?php

namespace App\Controller;

use App\Entity\Amitie;
use App\Entity\User;
use App\Form\RechercheAmisType;
use App\Form\UserType;
use App\Repository\AmitieRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }


    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }



    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }
    //Gère la recherche d'amis + l'ajout d'amis********************************************************
    #[Route('/{id}/{joueur_ami?null}', name: 'app_user_show', methods: ['GET', 'POST'])]
    public function show(User $user, Request $request,EntityManagerInterface $entityManager, $joueur_ami,UserRepository $userRepo): Response
    {
        $amis_du_joueur = null;
        //Partie recherche de joueurs//////////////////////
        $joueur_recherche='null';
        $form = $this->createForm(RechercheAmisType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //Je vient chercher la value du form et fait un querybuilder pour voir si le pseudo existe
            $joueur_recherche = $userRepo->findPseudo($form["pseudo"]->getData());  
        }
        //Partie recherche de joueurs//////////////////////


        //Partie ajout d'amis//////////////////////
        if ($joueur_ami != 'null') {
            //$amis_du_joueur = $userRepo->find($joueur_ami)->getAmities();
            $nouvel_ami = $userRepo->find($joueur_ami);
            $amitie = new Amitie();
            $amitie->setAmi1($user)
                    ->setAmi2($nouvel_ami);
            $entityManager->persist($amitie);
            $entityManager->flush();
            return $this->redirectToRoute('app_user_show', ['id'=>$user->getId()], Response::HTTP_SEE_OTHER);
        }



        
        return $this->renderForm('user/show.html.twig', [
            'user' => $user,
            'form' => $form,
            'joueur_recherche'=>$joueur_recherche,
            'amis_du_joueur'=> $amis_du_joueur
        ]);
    }


    
    #[Route('/ami/delete/{amitie_id}', name: 'delet_friend', methods: ['GET', 'POST'])]
    public function deleteFriend(Request $request, $amitie_id, AmitieRepository $amitieRep, EntityManagerInterface $entityManager): Response
    {   
        $user = $this->getUser();

        $amitie = $amitieRep->find($amitie_id);

        $entityManager->remove($amitie);
        $entityManager->flush();
      
        return $this->redirectToRoute('app_user_show', ['id'=>$user->getId()], Response::HTTP_SEE_OTHER);
    }
  

  


  
}
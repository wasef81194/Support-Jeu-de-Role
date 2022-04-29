<?php

namespace App\Controller;

use App\Entity\Armes;
use App\Form\Armes1Type;
use App\Repository\ArmesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/armes')]
class ArmesController extends AbstractController
{
    #[Route('/', name: 'app_armes_index', methods: ['GET'])]
    public function index(ArmesRepository $armesRepository): Response
    {
        return $this->render('armes/index.html.twig', [
            'armes' => $armesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_armes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ArmesRepository $armesRepository): Response
    {
        $arme = new Armes();
        $form = $this->createForm(Armes1Type::class, $arme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $armesRepository->add($arme);
            return $this->redirectToRoute('app_armes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('armes/new.html.twig', [
            'arme' => $arme,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_armes_show', methods: ['GET'])]
    public function show(Armes $arme): Response
    {
        return $this->render('armes/show.html.twig', [
            'arme' => $arme,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_armes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Armes $arme, ArmesRepository $armesRepository): Response
    {
        $form = $this->createForm(Armes1Type::class, $arme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $armesRepository->add($arme);
            return $this->redirectToRoute('app_armes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('armes/edit.html.twig', [
            'arme' => $arme,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_armes_delete', methods: ['POST'])]
    public function delete(Request $request, Armes $arme, ArmesRepository $armesRepository): Response
    {
        $personnage = $arme->getPersonnage();
        if ($this->isCsrfTokenValid('delete'.$arme->getId(), $request->request->get('_token'))) {
            $armesRepository->remove($arme);
        }
        return $this->redirectToRoute('personnage_edit', ['id'=>$personnage->getId()], Response::HTTP_SEE_OTHER);
    }
}

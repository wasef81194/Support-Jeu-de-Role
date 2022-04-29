<?php

namespace App\Controller;

use App\Entity\Vertus;
use App\Form\Vertus1Type;
use App\Repository\VertusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/vertus')]
class VertusController extends AbstractController
{
    #[Route('/', name: 'app_vertus_index', methods: ['GET'])]
    public function index(VertusRepository $vertusRepository): Response
    {
        return $this->render('vertus/index.html.twig', [
            'vertuses' => $vertusRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_vertus_new', methods: ['GET', 'POST'])]
    public function new(Request $request, VertusRepository $vertusRepository): Response
    {
        $vertu = new Vertus();
        $form = $this->createForm(Vertus1Type::class, $vertu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vertusRepository->add($vertu);
            return $this->redirectToRoute('app_vertus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vertus/new.html.twig', [
            'vertu' => $vertu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vertus_show', methods: ['GET'])]
    public function show(Vertus $vertu): Response
    {
        return $this->render('vertus/show.html.twig', [
            'vertu' => $vertu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_vertus_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Vertus $vertu, VertusRepository $vertusRepository): Response
    {
        $form = $this->createForm(Vertus1Type::class, $vertu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vertusRepository->add($vertu);
            return $this->redirectToRoute('app_vertus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vertus/edit.html.twig', [
            'vertu' => $vertu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vertus_delete', methods: ['POST'])]
    public function delete(Request $request, Vertus $vertu, VertusRepository $vertusRepository): Response
    {
        $personnage = $vertu->getPersonnage();
        if ($this->isCsrfTokenValid('delete'.$vertu->getId(), $request->request->get('_token'))) {
            $vertusRepository->remove($vertu);
        }
        return $this->redirectToRoute('personnage_edit', ['id'=>$personnage->getId()], Response::HTTP_SEE_OTHER);
    }
}

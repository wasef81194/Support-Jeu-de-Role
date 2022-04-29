<?php

namespace App\Controller;

use App\Entity\AttributAmeliores;
use App\Form\AttributAmelioresType;
use App\Repository\AttributAmelioresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/attribut/ameliores')]
class AttributAmelioresController extends AbstractController
{
    #[Route('/', name: 'app_attribut_ameliores_index', methods: ['GET'])]
    public function index(AttributAmelioresRepository $attributAmelioresRepository): Response
    {
        return $this->render('attribut_ameliores/index.html.twig', [
            'attribut_ameliores' => $attributAmelioresRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_attribut_ameliores_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AttributAmelioresRepository $attributAmelioresRepository): Response
    {
        $attributAmeliore = new AttributAmeliores();
        $form = $this->createForm(AttributAmelioresType::class, $attributAmeliore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $attributAmelioresRepository->add($attributAmeliore);
            return $this->redirectToRoute('app_attribut_ameliores_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('attribut_ameliores/new.html.twig', [
            'attribut_ameliore' => $attributAmeliore,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_attribut_ameliores_show', methods: ['GET'])]
    public function show(AttributAmeliores $attributAmeliore): Response
    {
        return $this->render('attribut_ameliores/show.html.twig', [
            'attribut_ameliore' => $attributAmeliore,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_attribut_ameliores_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AttributAmeliores $attributAmeliore, AttributAmelioresRepository $attributAmelioresRepository): Response
    {
        $form = $this->createForm(AttributAmelioresType::class, $attributAmeliore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $attributAmelioresRepository->add($attributAmeliore);
            return $this->redirectToRoute('app_attribut_ameliores_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('attribut_ameliores/edit.html.twig', [
            'attribut_ameliore' => $attributAmeliore,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_attribut_ameliores_delete', methods: ['POST'])]
    public function delete(Request $request, AttributAmeliores $attributAmeliore, AttributAmelioresRepository $attributAmelioresRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$attributAmeliore->getId(), $request->request->get('_token'))) {
            $attributAmelioresRepository->remove($attributAmeliore);
        }

        return $this->redirectToRoute('app_attribut_ameliores_index', [], Response::HTTP_SEE_OTHER);
    }
}

<?php

namespace App\Controller;

use App\Entity\Recompence;
use App\Form\Recompence1Type;
use App\Repository\RecompenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/recompence')]
class RecompenceController extends AbstractController
{
    #[Route('/', name: 'app_recompence_index', methods: ['GET'])]
    public function index(RecompenceRepository $recompenceRepository): Response
    {
        return $this->render('recompence/index.html.twig', [
            'recompences' => $recompenceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_recompence_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RecompenceRepository $recompenceRepository): Response
    {
        $recompence = new Recompence();
        $form = $this->createForm(Recompence1Type::class, $recompence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recompenceRepository->add($recompence);
            return $this->redirectToRoute('app_recompence_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('recompence/new.html.twig', [
            'recompence' => $recompence,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_recompence_show', methods: ['GET'])]
    public function show(Recompence $recompence): Response
    {
        return $this->render('recompence/show.html.twig', [
            'recompence' => $recompence,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_recompence_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Recompence $recompence, RecompenceRepository $recompenceRepository): Response
    {
        $form = $this->createForm(Recompence1Type::class, $recompence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recompenceRepository->add($recompence);
            return $this->redirectToRoute('app_recompence_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('recompence/edit.html.twig', [
            'recompence' => $recompence,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_recompence_delete', methods: ['POST'])]
    public function delete(Request $request, Recompence $recompence, RecompenceRepository $recompenceRepository): Response
    {
        $personnage = $recompence->getPersonnage();

        if ($this->isCsrfTokenValid('delete'.$recompence->getId(), $request->request->get('_token'))) {
            $recompenceRepository->remove($recompence);
        }
 return $this->redirectToRoute('personnage_edit', ['id'=>$personnage->getId()], Response::HTTP_SEE_OTHER);
    }
}

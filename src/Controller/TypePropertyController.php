<?php

namespace App\Controller;

use App\Entity\TypeProperty;
use App\Form\TypePropertyType;
use App\Repository\TypePropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/types')]
class TypePropertyController extends AbstractController
{
    #[Route('/', name: 'app_types', methods: ['GET'])]
    public function index(TypePropertyRepository $typePropertyRepository): Response
    {
        return $this->render('type_property/index.html.twig', [
            'type_properties' => $typePropertyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_type_property_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $typeProperty = new TypeProperty();
        $form = $this->createForm(TypePropertyType::class, $typeProperty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($typeProperty);
            $entityManager->flush();

            return $this->redirectToRoute('app_type_property_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_property/new.html.twig', [
            'type_property' => $typeProperty,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_property_show', methods: ['GET'])]
    public function show(TypeProperty $typeProperty): Response
    {
        return $this->render('type_property/show.html.twig', [
            'type_property' => $typeProperty,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_property_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeProperty $typeProperty, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TypePropertyType::class, $typeProperty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_type_property_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_property/edit.html.twig', [
            'type_property' => $typeProperty,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_property_delete', methods: ['POST'])]
    public function delete(Request $request, TypeProperty $typeProperty, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeProperty->getId(), $request->request->get('_token'))) {
            $entityManager->remove($typeProperty);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_type_property_index', [], Response::HTTP_SEE_OTHER);
    }
}

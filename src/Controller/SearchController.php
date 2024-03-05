<?php

namespace App\Controller;

use App\Form\SearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(): Response
    {
    
        return $this->render('search/search.html.twig', [
           'controller_name'=>'SearchController',
        ]);
    }

    public function searchBar()
    {
        $form = $this->create
    }
}

<?php

namespace App\Controller;

use App\Form\SearchAnnonceType;
use App\Repository\PropertysRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request,
     PropertysRepository $propertysRepository,
     PaginatorInterface $paginator): Response
    {
        
$form = $this->createForm(SearchAnnonceType::class);
$search = $form->handleRequest($request);
if($form->isSubmitted() && $form->isValid()) {
    //on recherche les annonces correspondant aux mots clés
    $propertys = $propertysRepository->search($search
    ->get('mots')
    ->getData());
}
  $propertys = $paginator->paginate(
        $propertysRepository->findAll(),
        $request->query->getInt('page', 1),
        4
    );

return $this->render('home/home.html.twig', [
'controller_name' => 'HomeController',
'propertys' => $propertys,
'form'=>$form->createView(),
]);
        
    }

}

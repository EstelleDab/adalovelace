<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\SearchArticleFormType;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(): Response
    {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }


public function searchArticle(Request $request)
{
    $searchForm= $this->createForm(SearchArticleFormType::class);
    return $this->render('search/index.html.twig', [
        'form' => $searchForm->createView(),
    ]);
}
}
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request; 
use App\Controller\ArticleController;
use App\Form\SearchArticleFormType;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]


    public function new (Request $request): Response
    {
        $form = $this->createForm(SearchArticleFormType ::class);
        return $this->render('search/index.html.twig', [
            'form' => $form,
        ]);
    } 



}

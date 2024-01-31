<?php

namespace App\Controller;
use App\Form\SearchArticleFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request; 
use App\Controller\ArticleController;


class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]



    public function index(): Response
    {
        $form = $this->createForm(SearchArticleFormType::class);  
        return $this->renderForm('search/index.html.twig', [
            'form' => $form,
            'controller_name' => 'SearchController'
        ]);
        
    }



}

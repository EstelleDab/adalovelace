<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\SearchArticleFormType;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]




public function searchArticle(Request_$request)
{
    $searchArticleForm= $this->createFormBuilder(SearchArticleFormType::class);
    return $this->render('search/index.html.twig', [
        'form' => $searchArticleForm->createView(),
    ]);

}


}

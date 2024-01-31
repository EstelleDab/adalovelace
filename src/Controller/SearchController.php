<?php

namespace App\Controller;

use App\Form\SearchArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class SearchController extends AbstractController
{
    #[Route('/search', name: 'search_article')]
    public function searchArticle(Request $request)
    {
        $searchArticleForm = $this->createForm(SearchArticleType::class);
        return $this->render('search/article.html.twig', [
            'search_form' => $searchArticleForm->createView(),
        ]);
    }
}
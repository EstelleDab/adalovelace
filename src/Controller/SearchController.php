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
    #[Route('/search', name: 'search_article', methods: ['GET'])]
    public function searchArticle(Request $request)
    {
        
        $form = $this->createForm(SearchArticleType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('article/index.html.twig', [
                'articles' => $articleRepository->findAll(),
            ]);

        }

        return $this->render('search/article.html.twig', [
            'search_form' => $searchArticleForm->createView(),
        ]);


    }
}



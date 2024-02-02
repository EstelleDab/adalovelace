<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/article')]
class ArticleController extends AbstractController
{
    #[Route('/', name: 'article_index', methods: ['GET'])]
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('article/index.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'article_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('article/new.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }




    #[Route('/show/{id}', name: 'article_show', methods: ['GET'])]
    public function show(Article $article): Response
    {
        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }

    #[Route('/edit/{id}/edit', name: 'article_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Article $article, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('article/edit.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }


    #[Route('/search', name: 'article_search', methods: ['GET', 'POST'])]
    public function search(Request $request, ArticleRepository $articleRepository): Response
    {
        $form = $this->createFormBuilder()
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Catégorie 1' => '1',
                    'Catégorie 2' => '2',
                ],
            ])
            ->add('query', TextType::class)
            ->getForm();

        $form->handleRequest($request);

        $articles = [];
        $articlescateg = [];

        if ($form->isSubmitted() && $form->isValid()) {
            $search = $form->get('query')->getData();
            $categ =  $form->get('category')->getData();

            $articles= $articleRepository->findByKeyword($search, $categ); /*Appel de la fonction créée dans ArticleRepository*/

            /* boucle for each pour ajouter le 2ème critère*/
            foreach($articles as $article){
                $category=$article->getCategory()->getId();
                if ($category == $categ){
                    array_push($articlescateg, $article);
                }
            }
        }

        return $this->render('/article/search.html.twig',[
            'form' => $form->createView(),
            'articles' => $articlescateg, /* ici on retourne le tableau double-trié */
        ]); 
    }


    #[Route('/delete/{id}', name: 'article_delete', methods: ['POST'])]
    public function delete(Request $request, Article $article, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_index', [], Response::HTTP_SEE_OTHER);
    }
}

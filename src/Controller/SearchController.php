<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Form\AbstractType;
use App\Form\SearchArticleFormType;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]




public function index(): Response
{
    $form= $this->buildForm(SearchArticleFormType::class);
    return $this->render('search/index.html.twig', [
        'form' => $form->buildView(),
    ]);

}


}

<?php
        namespace App\DataFixtures;
        
        use App\Entity\Article;
        use App\Entity\Category;
        use Doctrine\Bundle\FixturesBundle\Fixture;
        use Doctrine\Persistence\ObjectManager;
        
        class AppFixtures extends Fixture
        {
            public function load(ObjectManager $manager): void
            {
                // $product = new Product();
                // $manager->persist($product);
                $categorie1 = new Category();
                $categorie->setName("Ciel !");
                $manager->persist($categorie);
        
                $categorie2 = new Category();
                $categorie->setName("Ada LoveLace Team");
                $manager->persist($categorie);
        
        
                $article = new Article();
                $article->setTitle("Distinguer le Vrai du Faux");
                $article->setContent("Déjà commencer par ne pas laisser le stress envoyer des messages du genre 'il faut que tu aies la bonne réponse!");
                $article->setCategory($categorie1);
                $manager->persist($article);
        
                $article = new Article();
                $article->setTitle("La comtesse");
                $article->setContent("Pionniere de la programmation informatique, la Comtesse de Lovelace est connue pour ses travaux sur la machine analytique de Charles Babbage. Elle est 'a l origine du premier programme  destin@e à être excécuté par une machine !");
                $article->setCategory($categorie2);
                $manager->persist($article);
        
                $article = new Article();
                $article->setTitle("L'oeuf ou la poule ?");
                $article->setContent("Ou plutôt 9 et les boules !");
                $article->setCategory($categorie1);
                $manager->persist($article);
        
                $article = new Article();
                $article->setTitle("La symbolique du nombre 7");
                $article->setContent("Il paraîtrait que ce nombre symboliserait la perfection divine... pour moi le 7 de 7/20 certes times avec divin mais symbolise plutôt simplement un gros foirage... et pas sure que la personne responsable ait quelque chose de divin pour le coup!");
                $article->setCategory($categorie1);
                $manager->persist($article);
        
                $article = new Article();
                $article->setTitle("Franssouah");
                $article->setContent("Le seul de la team à utiliser des mots chelou comme adi, bouerer, ou bousin...(un truc du Limousin?) Comme les autres de l'équipe il aime ca pas mal plus bien quand ca marche !");
                $article->setCategory($categorie2);
                $manager->persist($article);
        
        
                $article = new Article();
                $article->setTitle("Amanda");
                $article->setContent("La force tranquille de l'equipe... Pleine de contradiction, elle est en t shirt quand on sort les mouffles... bon aprés pas sûrs qu en Afrique du Sud ils connaissent les moufles?? En tous cas elle sait garder la tete froide et calmer les deux autres agités du bocal quand il faut");
                $article->setCategory($categorie2);
                $manager->persist($article);
                $manager->flush();
        
                $article = new Article();
                $article->setTitle("Estelle");
                $article->setContent("La reine du partiel foiré mais qui ne se décourage pas pour autant... (Toulouse rime avec To lose mais ca elle ne l admettra pas !) Elle ne lache rien surtout pas la pression !(on ne précise pas si c'est en pinte ou en demi) Comme le reste de l''equipe elle préfère quand même plus bien quand ca marche !");
                $article->setCategory($categorie2);
                $manager->persist($article);
                $manager->flush();
            }
        }
        

        $manager->flush();
    }
}

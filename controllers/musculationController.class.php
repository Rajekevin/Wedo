<?php

class musculationController{

	public function indexAction($args){
		session_start();
		$v = new view();
		$v->setView("musculation");


		$var = implode ($args);

		$article = new article();
		$thisArticle = $article->getOneBy(['id'=>$var]);
		$v->assign('thisArticle',$thisArticle);
		
		$Allarticle = Article::FindAll();

		//TOUS LES ARTICLES
		$lastArticle = $article->getAllBy([],['id'=>'DESC'],[]);
		$v->assign('lastArticle', $lastArticle);


			/*	PAGINATION */

			$total = count($Allarticle);//Nombre d'article
            $articlesParPage=6; //Nombre d'articles par page
            $nombreDePages=ceil($total/$articlesParPage);
            if(isset($_GET['page'])){
                 $pageActuelle=intval($_GET['page']);

            		$util = new Util();

            //     $pageActuelle = $util->isNumber($_GET['page']);
            //     if($pageActuelle>$nombreDePages)
            //     {
            //         $pageActuelle=$nombreDePages;
            //     }
            // }else{
            //     $pageActuelle=1;
            // }


            if(false === $pageActuelle){
			    $pageActuelle = 1;
			}
			else if($pageActuelle > $nombreDePages)
			{
			    $pageActuelle=$nombreDePages;
			}
			}else{
			    $pageActuelle = 1;
			}
            $premiereEntree=($pageActuelle-1)*$articlesParPage;
            // La requête sql pour récupérer les messages de la page actuelle.
            $articles= Article::Attrapelestous([$premiereEntree,$articlesParPage],'title', "*", "ASC");
            $v->assign('pageActuelle', $pageActuelle);
            $v->assign('nombreDePages',$nombreDePages);
            
            $v->assign("articles", $articles);



	}
}
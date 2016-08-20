

<?php
echo "mdr";

$idArticle=$_POST['id']; //id de l'article

$article = new article();
if($_POST['id']){
	
    $articles = article::findById($idArticle);  //récupère l'objet article en fonction de l'id         
              
	$prev_like = $articles->getInterest(); //récupère le nombre de like de l'article



		
		$idUser = Membre::findBy("login",$_SESSION['login'],"string");
		$idLogin=$idUser->getId();	//id_USER 

	

/*###################TEST POUR SAVOIR SI L'USER A DEJA VOTE ###################################### */
			$test = new interest();
	
			$interests = $test->getAllBy(["id_user"=>$_SESSION['id']],['id'=>'DESC'],"");
			//si l'user à déjà voté 
			foreach ($interests as $key=>$interest){ 				


			$articlos= $interests[$key]['id_article'];

			if($articlos==$idArticle){

					echo"hey t'as déja voté mon gars";
					$foo =TRUE;

				}
				
			}

			if($_POST['type'] < 1 && $foo==TRUE){
				echo " vous avez déjà liker";
			}else{
				echo "RAS";

					 echo "LIKE";
					$like = ($prev_like + 1);
					$articles->setInterest($like);
					$articles->save();

					$interest = new interest();
					$login = membre::findBy("login", $_SESSION['login'], "string");

					$idLogin=$login->getId();
					$interest->setIdUser($idLogin);
					$interest->setIdArticle($idArticle);	
					$interest->setDate(date("Y-m-d H:i:s"));	
					$interest->save();
					?>

					<script>
					  $("#likeCount"+messageID).html(C+1);
      				  $(this).addClass("heartAnimation").attr("rel","unlike");
      				</script>
			<?php }


/*###################END TEST ###################################### */







 
$i = new interest();

if($i->userExist($idLogin)){ //vérifie si l'user existe dans la table Interest | déjà liker des articles
				

					//si oui, on récupère l'id_user de la table interest
					$Login = Interest::findBy("id_user",$idLogin,"int");
					$interestLogin=$Login->getIdUser();

					$interestArticle=$Login->getIdArticle();				

				}else{								
					
					$interestLogin = 0;

				}


if($i->articleExist($idArticle)){// Verif : Si l'article existe dans la table interest
				

				$ArticleLike = Interest::findBy("id_article",$idArticle,"int");
				//Si oui, on recherche l'id article dans la table
				$ArticleLikes=$ArticleLike->getIdArticle();		

				}else{			
					
					$ArticleLikes = 0;
				}		 		


//Si l'id de la session correspond à l'id_user de la table Interest && l'id de l'article correspond à l'idArticle de la table interest
// 	if($_POST['type'] < 1 && $idLogin==$interestLogin&& $idArticle==$interestArticle&&$articlos==$idArticle){

	
// 		echo " vous avez déjà liker";
		
// 	}else{

// 		 echo "LIKE";
// 		$like = ($prev_like + 1);
// 		$articles->setInterest($like);
// 		$articles->save();

// 		$interest = new interest();
// 		$login = membre::findBy("login", $_SESSION['login'], "string");

// 		$idLogin=$login->getId();
// 		$interest->setIdUser($idLogin);
// 		$interest->setIdArticle($idArticle);	
// 		$interest->setDate(date("Y-m-d H:i:s"));	
// 		$interest->save();
		
// 	}



}




?>
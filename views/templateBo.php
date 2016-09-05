<!DOCTYPE html>
<html>	
	<head>
		<meta charset="UTF-8">
		<title>WEDO</title>
		
		<link rel="stylesheet" href="<?= WEBROOT; ?>/public/css/font-awesome/css/font-awesome.min.css" > 
		<link rel="icon" type="image/png" href="<?= WEBROOT; ?>/public/img/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="<?= WEBROOT; ?>/public/css/admin.css">
		<link rel="stylesheet" type="text/css" href="<?= WEBROOT; ?>/public/css/menu_bo.css">

		<script type="text/javascript" src="<?= WEBROOT; ?>/lib/ckeditor/ckeditor.js"></script>
		

	</head>
	<body>
		
		<div id="fixedTop">
			
			<div id="goBack">

				<div id="home" class="col-3 fleft">
					<a href="http://wedo-awesome.herokuapp.com">
						<i class="fa fa-home" aria-hidden="true"></i> WEDO 
					</a>
				</div>
				<div id="Logout" class="col-3 fRight">
					<a href=" <?= LINK.'admin/deconnexion'?>">


					<i class="fa fa-power-off" aria-hidden="true"></i>
					DECONNEXION</a>
				</div> 			
			</div>
			
			<?php  if (isset($_SESSION['login']))
                            { 
            		?>
			 <p>Bonjour <?php echo $_SESSION['login'];?></p>
             			<ul class="iconeBO">
					<li></li>
					<li></li>
				</ul>

			</div>
			<div id="fixedTop2">
  			<div id="menuBo">
			<ul id="menu-accordeon1">
  			   <li>
  			   		<a href="<?= LINK.'/admin/index'; ?>">
      			   		<i class="icon-dashboard"></i>
      			   		<i class="fa fa-tachometer" aria-hidden="true"></i>	
      			   		Tableau de bord
  			   		</a>
      		   	</li>
			</ul>

			<ul id="menu-accordeon2">          
          		<li><a href=""><i class="fa fa-book fa-fw" aria-hidden="true"></i> Categorie</a>
            		<ul>
              			<li><a href="<?= LINK.'/admin/categorie/categorielist'; ?>"><i class="fa fa-book fa-fw" aria-hidden="true"></i> Tous les Categories</a></li>
                    	<li><a href="<?= LINK.'/admin/createcategorie'; ?>"><i class="fa  fa-plus" aria-hidden="true"></i> Ajouter une categorie</a></li>

            		</ul>
         		</li>
			</ul>


			<ul id="menu-accordeon3">          
          		<li><a href=""><i class="fa fa-book fa-fw" aria-hidden="true"></i> Article</a>
            		<ul>
              			<li><a href="<?= LINK.'/admin/articlelist'; ?>"><i class="fa fa-book fa-fw" aria-hidden="true"></i> Tous les articles</a></li>
              			<li><a href="<?= LINK.'/admin/mesArticles'; ?>"></i> Mes Articles</a></li> 
              			<li><a href="<?= LINK.'/admin/createArticle'; ?>"><i class="fa  fa-plus" aria-hidden="true"></i> Ajouter un article</a></li>

            		</ul>
         		</li>
			</ul>
			<ul id="menu-accordeon4">           
         		<li><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Utilisateurs</a>
            		<ul>
               		  	<li><a href="<?= LINK.'/admin/userlist'; ?>"><i class="fa fa-users" aria-hidden="true"></i> Liste des utilisateurs</a></li>
              			<li><a href="<?= LINK.'/admin/createuser'; ?>"><i class="fa  fa-plus" aria-hidden="true"></i> Ajouter un utilisateur</a></li>
            		</ul>
         		</li>
			</ul>
			<ul id="menu-accordeon5">
          		<li><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> Commentaire</a>
            		<ul>
               		  <li><a href="<?= LINK.'/admin/commentairelist'; ?>"><i class="fa fa-comment-o" aria-hidden="true"></i> Liste des commentaires</a></li>
               		 <!--  <li><a href="#"><i class="fa  fa-plus" aria-hidden="true"></i> Ajouter un commentaire</a></li> -->
           			</ul>
         		</li>
			</ul>
			<ul id="menu-accordeon6">
           		<li><a href=""><i class="fa fa-magic" aria-hidden="true"></i> Options du site</a>
            		<ul>
               		  	<li><a href="<?= LINK.'/admin/themeCustom'; ?>"><i class="fa fa-eyedropper" aria-hidden="true"></i> Personnaliser votre site</a></li>
               		 	<li><a href="#"></a></li>
            		</ul>
         		</li>
			</ul>
				 
  		</div>
	</div>

		<div id="fixedLeft">
			
			<section id = "sideBar">

				
				

				<img src="<?= WEBROOT; ?>public/img/avatar/<?= $_SESSION['avatar']; ?>" width="90px" height="90px" />


			

				<?php
				setlocale(LC_TIME, 'fra_fra');
				echo strftime(' %H:%M');// 16:03	
				?> <br>

				<?php			
				echo strftime(' %A %d %B %Y'); // jeudi 11 octobre 2012
				?>

				
			</section>
			<section id = "sideBar">


	

				
			</section>
		</div> 

		<!-- FIN TEMPLATE BO -->
		<div id="fixedCenter">
			<?php include $this->view; ?>
		</div>
	</body>
</html>

<?php }else{ echo" Vous n'êtes pas autorisé à être ici ;(" ; } ?>
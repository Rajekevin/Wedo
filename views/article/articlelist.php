dans view>article>articlelist.php


<section class="articles homepage_articles">
<?php foreach ($categorielist as $key => $value): ?>
    
  

     <div class="content">

   

    

     <?php

        $a = new article();       

        $idCategorie = Article::findBy("id_category",$value['id'],"int");
       
        //on récupère tous les 3 derniers articles en fonction de chaque catégorie
        $articles = $a->getAllBy(['id_category' => $value['id']], ['id' => 'DESC'] ,[]);

        ?>
     <div class="article_list"> 

                <div class="article">
                    <center><i><h2><?= $value['name']; ?></h2></i> </center> 

                    <p><?php 
                    $nbArticles= count($articles);
                    if($nbArticles > 1) {
                      print_r($nbArticles." articles");
                      ?>
                
          
                    </p>
                    <a href="<?= ARTICLE.$value['name'] ?>">
                    <div class="divImageZoom">
                    
                    </div>
                    </a>
                    
                    <a class="Wedo_Button" href="<?= CATEGORIE.$value['name'] ?>">Je découvre les articles ..</a>

                       <?php }else{
                      print_r("pas encore d'articles"); ?>
                       <a class="Wedo_Button" href="#">Bientôt</a>
                   <?php }?>
          </div>


         </div>
  




     
     </div> 
     
 <?php endforeach; ?>

 <div class="lineclear"></div>



 

  </section> 
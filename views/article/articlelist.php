<section class="articles homepage_articles">
<?php foreach ($categorielist as $key => $value): ?>
    
  

     <div class="content">
    

<?php $title = $value['name'];  ?>

     <?php
    $c = new categorie();
    $a = new article();
        //On cherche tous les catégories
        $categorie = $c->getAllBy([],['id'=>'ASC'],'');

        

        $idCategorie = Article::findBy("id_category",$value['id'],"int");
       
        //on récupère tous les 3 derniers articles en fonction de chaque catégorie
        $articles = $a->getAllBy(['id_category' => $value['id']], ['id' => 'DESC'] ,'');

        ?>

         
      <?php foreach ($articles as $key => $value): ?>



            <div class="article_list"> 

                <div class="article">
                    <center><i><h2><?= $title; ?></h2></i> </center> 

                    <div class="logo_article"><img src="<?= WEBROOT; ?>public/img/article/<?= $value['img']; ?>" /></div> 
                    <a href="<?= ARTICLE.$value['title'] ?>">
                    <img class="top" src="<?= WEBROOT; ?>public/img/article/<?= $value['img']; ?>" />
                    </a>
                    <h3></h3><p></p>
                    <a class="Wedo_Button" href="">Je commente</a>
          </div>


         </div>


         <?php endforeach; ?>


     
     </div> 
     
 <?php endforeach; ?>

 <div class="lineclear"></div>



 

  </section> 
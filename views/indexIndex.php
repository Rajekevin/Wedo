<section class="banner_container" id="banner">

  
     <center><span class="header-title border-full relative">It's time to be awesome 
            
    </span> </center>


</section>




<section class="articles white Apropos">
    <div class="content">

        <h1 id="navbar1">A PROPOS<br><br></h1>
        <h2>A propos</h2>
        <div class="content">
                WEDO



                        <p class="paragraphe"><a href="#"></a></p><img class="img_about"></img><p></p>
                        test
                        Voyez comme il bouge notre mascotte Wedo, pour prouvez que vous l'aimez utilisez #WeLoveWedo !
                            <br/>Né en Septembre 2015 sous l’impulsion de quatre passionnés qui souhaitaient partagés leurs passions sportives. <br/>Wedo a pour objectif de devenir la référence de la Musculation/Fitness.
                             Dès ses débuts, Wedo  s’est attaché à rassembler tous les passionés sportives autour d'un seul et même Hashtag #Wedo.
                             Ce Hashtag est la base de notre concept. A chaque fois que vous dépensez physiquement, ou  que vous faites tout un autre sport, dégainez votre smartphone et
                            et utilisez le #Wedo sur les Réseaux sociaux.


                       

                        <h4 class="article3">Nos Competences</h4>
                        <p class="article1"><br><br>L'équipe est composés de quatres rédacteurs qui publieront les derniers articles concernant la Musculation et Fitness pour ne rien rater de votre Passion</p>



    </div>
</div>
</section>



<!-- <section class="articles grey"  >
    <div class="content">
       <!--  <h2>Musculation</h2> -->
    

            <?php

function format_url($str)
    {
    $str = mb_strtolower($str);
    $str = utf8_decode($str);
    $str = strtr($str, utf8_decode('àâäãáåçéèêëíìîïñóòôöõøùúûüýÿ'), 'aaaaaaceeeeiiiinoooooouuuuyy');
    $str = preg_replace('`[^a-z0-9]+`', '-', $str);
    $str = trim($str, '-');
    return $str;
    }

    // $url=format_url($value['title']);

?>

          
<!--                         <div class="lineclear"></div>
            <a class="Wedo_Button see_more white" href="">Voir tous les articles Musculation</a>
        </div>
    </div>
</section> -->








  <section class="articles homepage_articles" >
<?php foreach ($categorielist as $key => $value): ?>
  <?php $title = $value['name'];  ?>   
 

     <div class="content"  id="<?php echo $title; ?>">
         <i><h1 id="navbar2"><?= $title; ?><br/></h1></i>




     <?php
  
  
        //On cherche tous les catégories
        $categorie = $c->getAllBy([],['id'=>'ASC'],'');

        

        $idCategorie = Article::findBy("id_category",$value['id'],"int");
       
        //on récupère tous les 3 derniers articles en fonction de chaque catégorie
        $articles = $a->getAllBy(['id_category' => $value['id']], ['id' => 'DESC'] ,3);

        ?>

         
      <?php foreach ($articles as $key => $value): ?>

     <?php   

     $categorieName = Categorie::findBy("id",$value['id_category'],"int"); 
   
     $categorieName= $categorieName->getName();

     ?>


    <?php if ($categorieName=="Sportif"){ ?>
        
   <div class="content">
      
        <div class="sportifs_list">

                <div class="sportif">

                    
                  <div class="intern_sportif">
                    <div class="logo_sportif"><img alt="<?= $value['description']; ?>"  src="<?= WEBROOT; ?>public/img/article/<?= $value['img']; ?>" /></div>
                    <h3><a href="<?= ARTICLE.$value['title'] ?>"><?= $value['title']; ?></a></h3>
                    <a class="Wedo_Button" href="">J'aime</a>
                  </div>
                </div>        
             
                        
          </div>

</div>

       
   
     <?php }else{ ?>

            <div class="article_list"> 

                <div class="article">
                    <center><i><h4><?= $value['title']; ?></h4></i> </center> 

                    <div class="logo_article"><img alt="<?= $value['description']; ?>" src="<?= WEBROOT; ?>public/img/article/<?= $value['img']; ?>" /></div> 
                    <a href="<?= ARTICLE.$value['title'] ?>">
                    <div class="divImageZoom">
                    <img class="top" src="<?= WEBROOT; ?>public/img/article/<?= $value['img']; ?>" />
                    </div>
                    </a>
                    
                    <a class="Wedo_Button" href="">Je commente</a>
          </div>


         </div>

<?php } ?>




    

         <?php endforeach; ?>


    <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>
     <br/> <br/> <br/> <br/> <br/> <br/> 


      
     </div> 
     
 <?php endforeach; ?>

 <div class="lineclear"></div>



 

  </section> 
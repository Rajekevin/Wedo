<section class="banner_container" id="banner">

  
     <center><span class="header-title border-full relative">It's time to be awesome !
            
    </span> </center>


</section>




<section class="articles white Apropos">
    <div class="content">

        <h1 id="navbar1">A PROPOS<br><br></h1>
        <h2>A propos</h2>
        <div class="container">
                WEDO



                        <p class="paragraphe"><a href="#"></a></p><li class="img_about"></li><p></p>
                        test
                        Voyez comme il bouge notre mascotte Wedo, pour prouvez que vous l'aimez utilisez #WeLoveWedo !
                            <br/>Né en Septembre 2015 sous l’impulsion de quatre passionnés qui souhaitaient partagés leurs passions sportives. <br/>Wedo a pour objectif de devenir la référence de la Musculation/Fitness.
                             Dès ses débuts, le groupe s’est attaché à rassembler touts les passionés sportives autour d'un seul et même Hashtag #Wedo.
                             Ce Hashtag est la base de notre concept. A chaque que vous dépensez physiquement, ou  que vous faites tout un autre sport, dégainez votre smartphone et
                            et utilisez le #Wedo sur les Réseaux sociaux.


                            <h4 class="article2b">Passion</h4>
                        <p class="article1"><br><br>Avant tout la musculation et fitness reste notre passion et j'espère que pour vous aussi, sinon on est pour vous le faire
                            partager<br><br></p>

                        <h4 class="article3">Nos Competences</h4>
                        <p class="article1"><br><br>L'équipe est composés de quatres rédacteurs qui publieront les derniers articles concernant
                            la Musculation et Fitness pour ne rien rater de votre Passion</p>



    </div>
</div>
</section>



<section class="articles grey"  id="musculation">
    <div class="content">
       <!--  <h2>Musculation</h2> -->
       <h1 id="navbar2">Derniers articles<br><br></h1>

 

       <h2>Musculation</h2>
        <div class="article_list">

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

            <?php foreach ($articlelist as $key => $value):
             $url=format_url($value['title']); ?>
           <!--  <?php if($value['id_category']==1){ ?> -->
            <?php if(!empty($value['img'])); ?>
                <div class="article">

                    <div class="logo_article"><img src="<?= WEBROOT; ?>public/img/article/<?= $value['img']; ?>" /></div>
                    <a href="<?= ARTICLE.$url ?>">
                    <img class="top" src="<?= WEBROOT; ?>public/img/article/<?= $value['img']; ?>" />
                    </a>
                    <h3></h3><p></p>
                    <a class="Wedo_Button" href="">Je commente</a>
                </div>
                    <!--       <?php } ?>  -->                   
            <?php endforeach; ?>



           <!--      <div class="article">
                    <div class="logo_article"><img src=""></div>
                    <img class="top" src="">
                    <h3></h3><p></p>
                    <a class="Wedo_Button" href="">Je commente</a>
                </div>
                <div class="article">
                    <div class="logo_article"><img src=""></div>
                    <img class="top" src="">
                    <h3></h3><p></p>
                    <a class="Wedo_Button" href="">Je commente</a>
                </div> -->
                        <div class="lineclear"></div>
            <a class="Wedo_Button see_more white" href="">Voir tous les articles Musculation</a>
        </div>
    </div>
</section>




<section class="articles grey" id="Fitness">
    <div class="content">
        <h2>Fitness</h2>
        <div class="article_list">
                            <div class="article">
                    <div class="logo_article"><img src=""></div>
                    <img class="top" src="">
                    <h3></h3><p></p>
                    <a class="Wedo_Button" href="">Je commente</a>
                </div>
                <div class="article">
                    <div class="logo_article"><img src=""></div>
                    <img class="top" src="">
                    <h3></h3><p></p>
                    <a class="Wedo_Button" href="">Je commente</a>
                </div>
                <div class="article">
                    <div class="logo_article"><img src=""></div>
                    <img class="top" src="">
                    <h3></h3><p></p>
                    <a class="Wedo_Button" href="">Je commente</a>
                </div>
                        <div class="lineclear"></div>
            <a class="Wedo_Button see_more white" href="">Voir tous les articles Fitness</a>
        </div>
    </div>
</section>


<section class="articles homepage_articles">
    <div class="content">
        <h1 id="navbar2">EVENEMENTS A VENIR<br><br></h1>
        <h2></h2>
        <div class="article_list">
                 <div class="article">
                    <div class="logo_article"><img src=""></div>
                    <img class="top" src="">
                    <h3>Color Run</h3><p>Du 29/07/2016 au 31/07/2016</p>
                    <a class="Wedo_Button" href="">Je Participe</a>
                </div>
                            <div class="article">
                    <div class="logo_article"><img src=""></div>
                    <img class="top" src="">
                    <h3>Marathon Paris</h3><p>Du 29/07/2016 au 31/07/2016</p>
                    <a class="Wedo_Button" href="">Je Participe</a>
                </div>
                <div class="article">
                    <div class="logo_article"><img src=""></div>
                    <img class="top" src="">
                    <h3>Tour de France</h3><p>Du 19/08/2016 au 21/08/2016</p>
                    <a class="Wedo_Button" href="">Je Participe</a>
                </div>
                        <div class="lineclear"></div>
            <a class="Wedo_Button see_more" href="">Voir tous les évenements</a>
        </div>
    </div>
</section>




<section class="articles sportifs">
    <div class="content">
        <h2>Sportifs</h2>
        <div class="sportifs_list">
                <div class="sportif">
                  <div class="intern_sportif">
                    <div class="logo_sportif"><a href=""><img src=""></a></div>
                    <h3><a href="">Teddy Rinner</a></h3>
                    <a class="Wedo_Button" href="">Événements à venir</a>
                  </div>
                </div>
                            <div class="sportif">
                  <div class="intern_sportif">
                    <div class="logo_sportif"><a href="#"><img src=""></a></div>
                    <h3><a href="">Martial</a></h3>
                    <a class="Wedo_Button" href="">Événements à venir</a>
                  </div>
                </div>
                            <div class="sportif">
                  <div class="intern_sportif">
                    <div class="logo_sportif"><a href=""><img src=""></a></div>
                    <h3><a href="">Usain Bolt</a></h3>
                    <a class="Wedo_Button" href="/sportife/slipknot">Événements à venir</a>
                  </div>
                </div>
                            <div class="sportif">
                  <div class="intern_sportif">
                    <div class="logo_sportif"><a href=""><img src=""></a></div>
                    <h3><a href="">Zidane</a></h3>
                    <a class="Wedo_Button" href="">cc</a>
                  </div>
                </div>
                        <div class="lineclear"></div>
            <a class="Wedo_Button see_more" href="">Voir tous les sportifs</a>
        </div>
    </div>
</section>


  <section class="articles homepage_articles">
<?php foreach ($categorielist as $key => $value): ?>
  <?php $title = $value['name'];  ?>   
  <i><h1 id="navbar2"><?= $title; ?><br/></h1></i>

     <div class="content">




     <?php
    $c = new categorie();
    $a = new article();
        //On cherche tous les catégories
        $categorie = $c->getAllBy([],['id'=>'ASC'],'');

        

        $idCategorie = Article::findBy("id_category",$value['id'],"int");
       
        //on récupère tous les 3 derniers articles en fonction de chaque catégorie
        $articles = $a->getAllBy(['id_category' => $value['id']], ['id' => 'DESC'] ,3);

        ?>

         
      <?php foreach ($articles as $key => $value): ?>



            <div class="article_list"> 

                <div class="article">
                    <center><i><h2><?= $value['title']; ?></h2></i> </center> 

                    <div class="logo_article"><img src="<?= WEBROOT; ?>public/img/article/<?= $value['img']; ?>" /></div> 
                    <a href="<?= ARTICLE.$value['title'] ?>">
                    <img class="top" src="<?= WEBROOT; ?>public/img/article/<?= $value['img']; ?>" />
                    </a>
                    <h5></h5><p> <?= $value['title']; ?></p>
                    <a class="Wedo_Button" href="">Je commente</a>
          </div>


         </div>


         <?php endforeach; ?>


    <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>
     <br/> <br/> <br/> <br/> <br/> <br/> 


      
     </div> 
     
 <?php endforeach; ?>

 <div class="lineclear"></div>



 

  </section> 
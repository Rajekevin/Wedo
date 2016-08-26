<div class="membre_profil">
    <section class="membre_profil">
        <div class="content">
         <div class="membre_info" id="informations">
            <div class="membre_menu">
               
<style>
.drop{
  border:2px dotted #bdc3c7;
  padding:20px;
  margin-bottom:20px;
  width:100%;
  height:100px;
  color: #bdc3c7;
  font-size:200%;
}
</style>




           
                <ul class="listing">

                    
                </ul>
            </div>
        
       
                <h2>Mes informations</h2>
              
                <hr>
                <p><img src="<?= WEBROOT; ?>public/img/avatar/<?= $avatar; ?>" width="90px" height="90px" ></p>
                <p>Pseudo : <?php echo $login; ?> </p>
                <p class="location">Location : <?php echo $ville; ?></p>
                <p>Inscrit(e) depuis le : <?php echo $date; ?></p>
                <br>     <div class="infos">

                <?php if($statut==1){
                  echo "<p>Admin</p>";
                  }else{
                    echo "<p>membre</p>";
                    } ?>
                    
                    
                     
                  
                    <hr>
                 
                 
                  


                    
                  
                    <p class="mini_bio"></p>

          <?php if ($login == $_SESSION['login']): ?>
            
         
              

              

                     <a href="<?= LINK;?>user/updateProfil?login=<?= $login ?>"> Modifier vote profil </a>

                 <?php endif ?>
              

                </div>
            </div>


       

              <div class="membre_info" id="next_events">
                <h2>Mes dernières participations</h2>
                <hr>
                <div class="list_events">
                    <div class="event">
                   </div>
                    <h3></h3>
                    <p></p>
                    <a class="call_to" href=""></a></div>                   
                    <div class="lineclear"></div>


 
      <?php if ($userCom==true) {
        # code...
      foreach ($coms as $key => $value):   ?>
      <?php 
     $idArt = $value['id_article']; 

       $idArticle = article::findById($idArt);                
              $Title = $idArticle->getTitle();

              echo "Titre de l'article : ".$Title;

              ?>
        <span>
          <br/>
            <?= "Mon commentaire : ".$value['commentaire']; ?> <br/>
            <a href="<?= $value['url'] ?>">Cliquez-ici pour retrouver l'article</a><br/>
          </span>


      <?php endforeach;  }?>


    
            </div>






<!--sportif-->

<div class="membre_info" id="next_events">


                <h2>Mes sportifs préférés</h2>
                <hr>
                <div class="list_events">
                    <div class="event">
                   </div>
                    <h3></h3>
                    <p></p>
                    <a class="call_to" href=""></a></div>                   
                    <div class="lineclear"></div>
 <?php if (isset($_SESSION['login'])){ ?>

  
  <?php foreach($interest as $key => $toto):   ?>
      <?php 


     $idArt = $toto['id_article']; 

       $idArticle = article::findById($idArt);                
              $Title = $idArticle->getTitle();
              $Img = $idArticle->getImg();

              


              $CategorieArticle = $idArticle->getIdCategory();
              

        
         $categorieName = categorie::findBy("id",$CategorieArticle,"int"); 

         
   if($categorieName==true){
        $categorieName= $categorieName->getName();

     
     if ($categorieName!="Sportif") {
      echo "";}else{
        ?>

       <div class="membre_info" id="next_events">
            <h2></h2>     
              
             <?php  echo "Sportif : ".$Title; ?>
             <div class="sportifs_list">
             <div class="sportif">
            <div class="logo_sportif">
             <center>  <img  src="<?= WEBROOT; ?>public/img/article/<?= $Img; ?>" /></center>

             </div>
             </div>
             </div>
              </div>
 <?php } }?>

  

   


      <?php endforeach; ?>

</div>


<div class="membre_info" id="next_events">


                <h2>Mes Articles préférés</h2>
                <hr>
                <div class="list_events">
                    <div class="event">
                   </div>
                    <h3></h3>
                    <p></p>
                    <a class="call_to" href=""></a></div>                   
                    <div class="lineclear"></div>

 <?php if (isset($interest)){ ?>
       <?php foreach($interest as $key => $toto):   ?>
      <?php 
     $idArt = $toto['id_article']; 

       $idArticle = article::findById($idArt);                
              $Title = $idArticle->getTitle();
              $Img = $idArticle->getImg();           


              $CategorieArticle = $idArticle->getIdCategory();
              


         $categorieName = Categorie::findBy("id",$CategorieArticle,"int");


         if ($categorieName==true) { 
   
        $categorieName= $categorieName->getName();

     

        if ($categorieName!="Sportif") {?>



       
           



        
<div class="membre_info" id="next_events">
            <h2></h2>     
                
             <?php  echo "Titre de l'article : ".$Title; ?>
             <div class="sportifs_list">
             <div class="sportif">
            <div class="logo_sportif">
             <img  src="<?= WEBROOT; ?>public/img/article/<?= $Img; ?>" />
             </div>
             </div>
             </div>
              </div>



             
      <?php  } } ?>     

   


      <?php endforeach; ?>

</div>


<?php } }else{
  echo "";}?>





            <div class="image"></div>
                <hr>
                <div class="list_events">
                    <div class="event">
                   </div>
                    <h3></h3>
                    <p></p><a class="call_to" href=""></a></div>                    
                    <div class="lineclear"></div>
            </div>
        </div>
        
        
            <div class="lineclear"></div>
        </div>

       
  <script src="script.js"></script>
  <script src="drop.js"></script>



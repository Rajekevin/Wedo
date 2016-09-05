<body class="loginPage">

 <div class="container-fluid">

        <div id="header">

            <div class="row-fluid">

                <div class="navbar">
                    <div class="navbar-inner">
                      <div class="container">
                        <div class="span1">&nbsp;</div>
                          <div class="span4 offset3">
                          <a class="brand" href="http://www.wedo-awesome.com/">WEDO </a></div>


<div class="col-12 tabFirst">


  <p class="titleTB">Faites parti de l'aventure avec <i>Wedo </i> ! </p>
  <p class="sousTitleTB">Wedo Dashboard va vous aider à prendre en main votre site.</p>
  <div class="col-12" style="padding: 0;">
    <div class="col-3 debut">
      <h3>Mentions Légales</h3>
      <a href="<?= LINK.'/admin/themeCustom'; ?>" class="personnalize">Mettre à jours les Mentions Légales</a>
    </div>
    <div class="col-3 debut">
      <h3>Administration</h3>
      <ul>
        <li><a href="<?= LINK.'/admin/createArticle'; ?>"><i class="fa fa-bookmark" aria-hidden="true"></i> Ecrire un article</a></li>
      
        <li><a href="<?= LINK.'index'; ?>" target="_blank"><i class="fa fa-laptop" aria-hidden="true"></i> Afficher le site</a></li>
      </ul>
    </div>
    <div class="col-3 debut">
      <h3>Plus d'actions :</h3>
      <ul>
       
        <li><a href="<?= LINK.'admin/articlelist'; ?>"><i class="fa fa-file-text" aria-hidden="true"></i> Gerer les articles</a></li>
        <li><a href="<?= LINK.'/admin/commentairelist'; ?>"><i class="fa fa-comments" aria-hidden="true"></i> Moderer les commentaires</a></li>
      </ul>
    </div>
  </div>
</div>

<div id="table">

<table   background: "#ebebeb" border="1" cellpadding="10" cellspacing="1" width="100%">
  <tr>
    <th colspan="3">Statistiques de Wedo</th>
  </tr>
  <tr>
    <td>
      Nombre de commentaires en base
    </td>
    <td>
      Nombre d'articles en base
    </td>
    <td>
      Nombre d'utilisateur en base
    </td>
  </tr>
  <tr>
    <td>
      <?php
        $nbCommentaires = count($commentaires);
        if($nbCommentaires > 1) {
          print_r($nbCommentaires." commentaires");
        }else{
          print_r($nbCommentaires." commentaire");
        }
      ?>
    </td>
    <td>
      <?php
        $articles = count($articles);
        if($articles > 1) {
          print_r($articles." articles");
        }else{
          print_r($articles." article");
        }
      ?>
    </td>
    <td>
      <?php
        $users = count($users);
        if($users > 1) {
          print_r($users." utilisateurs");
        }else{
          print_r($users." utilisateur");
        }
      ?>
    </td>
  </tr>
</table>  



<table border="1" cellpadding="10" cellspacing="1" width="100%">
  <tr>
    <th colspan="4">Activite - Dernier commentaire</th>
    <?php foreach ($commentaire as $key => $value): 


  $idUser= Membre::findById($value['id_user']);                
  $avatar = $idUser->getAvatar();   
?>
  </tr>
  <tr>
    <td>
           <div class="logo_article"><a class="article" href="<?= WEBROOT; ?>user/profil?name=<?= $value['nom_user']; ?>"> <img src="<?= WEBROOT; ?>public/img/avatar/<?= $avatar; ?>"  ></a></div> 
      
    </td>
    <td>
        <p>Par <span style="color: #673636;"><?= $value['nom_user']; ?></span> </p>
  <p>le <?= $value['date']; ?></p>
    </td>
    <td>
      <?= $value['commentaire']; ?>
    </td>
    
     
  <?php endforeach; ?>
    
  </tr>
</table>

</div>                 
                      </div>
                    </div>
                  </div>
                

            </div>

        </div>

    </div>
  

 




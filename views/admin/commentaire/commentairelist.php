<!-- Liste des commentaires -->

<div id ="ArticlesList">
<table border="1" cellpadding="10" cellspacing="1" width="100%">
  <tr>
    <th colspan="6">
      Liste des Commentaires
    </th>
  </tr>
  <tr>
    <th>Id</th>
    <th>Image</th>
    <th>Membre</th>
    <th>Commentaire</th>
    <th>Date</th>
    <th>Action</th>
  </tr>
  <?php foreach ($commentairelist as $key => $value) :


       $idUser= Membre::findById($value['id_user']);                
  $avatar = $idUser->getAvatar();  ?>  


  <tr>
    <article>
      <td>
        <?php if(!empty($value['id'])): ?>
          <?= $value['id']; ?>        
        <?php endif; ?>
      </td>
      <td>
      
            <a href="<?= WEBROOT; ?>user/profil?name=<?= $value['nom_user']; ?>"> <img src="<?= WEBROOT; ?>public/img/avatar/<?= $avatar; ?>"  width="90px" height="90px" ></a>
    
      </td>
      <td>
        <i><?= $value['nom_user']; ?></i>
      </td>
      <td>
        <?php 
          $texte = $value['commentaire']; 
          echo $texte;
          $taille =strlen($texte);
          if($taille > 20){
            echo substr($texte, 0, -1000).'[...]';
          }
        ?>
      </td>
      <td>
        <?= 
          $value['date']; 
        ?>
      </td>
      <td>
       
          <br>
        
        <?php
            /* demo */
            $id=$value['id']; 
            //echo '<a href="updateArticle?id=' . $id .'" name="modifier">Modifier</a>';
          ?><br>
          <a href="removecommentaire?id=<?php echo $id; ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));">
           <i class="fa fa-trash" aria-hidden="true"></i>
	  </a>
      </td>
    </article>
  </tr>
  <?php endforeach; ?>
</table>
</div>
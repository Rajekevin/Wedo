<div id ="ArticlesList">
<table border="1" cellpadding="10" cellspacing="1" width="100%">
  <tr>
    <th colspan="4">Liste des Utilisateurs</th>
  </tr>
  <tr>
    <td>Login</td>
    <td>E-Mail</td>
    <td>Statut</td>
    <td>Action</td>
  </tr>
  <?php foreach ($userlist as $key => $value): ?>
  <tr>
    <article>
    <td>
      <?= $value['login']; ?>
    </td>
    <td>
      <?= $value['mail']; ?>
    </td>
    <td>
      <i><?= $value['statut']; ?></i>
    </td>
    <td>
      <?php
        /* demo */
        $id=$value['id']; 
       
      echo '<a href="updateUser?id=' . $id .'" name="modifier">
             <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>';?> 
      <a href="removeUser?id=<?php echo $id; ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));">
         <i class="fa fa-trash" aria-hidden="true"></i>
      </a>    

    </td>
   </article>
  </tr>
  <?php endforeach; ?>
</table>
</div>
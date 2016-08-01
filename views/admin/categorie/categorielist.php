      <!-- Liste des articles -->

<div id ="ArticlesList">

<table border="1" cellpadding="10" cellspacing="1" width="100%">
  <tr>
    <th colspan="5">
      Liste catégorie
    </th>
  </tr>

    <tr>
    <article>
      <td>Id</td>
      <td>Nom</td>
      
      <td>Description</td>
      <td>Action</td>
  </tr>
  <?php foreach ($categorielist as $key => $value): ?>

  <tr>
      <td>
        <div>
          <?= $value['id']; ?>
        </div>
      </td>
      <td>
        <div>
         
          <i><?= $value['name']; ?></i>   
        </div>
      </td>
  
      <td>
        <div>
              <?php 
              $texte = $value['description']; 
              echo $texte;
              //echo substr($texte, 0, -50).'...';
            ?>
        </div>
      </td>
      <td>
        <div>
          <div>
            <?php $des= $value['description']; ?>
            <?php
              /* demo */
              $id=$value['id']; 
              echo '<a href="../updateCategorie?id=' . $id .'" name="modifier">
                       <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>';
            ?>
            <a href="../removeCategorie?id=<?php echo $id; ?>" 
              onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </td>
    </article>
  </tr>
  <?php endforeach; ?>
</table>


</div>



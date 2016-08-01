<div id ="ArticlesList">

<table border="1" cellpadding="10" cellspacing="1" width="100%">
  <tr>
    <th colspan="5">
      Mes Articles
    </th>
  </tr>
  <?php foreach ($articles as $key => $value): ?>
  <tr>
    <article>
      <td>Id</td>
      <td>Image</td>
      <td>Titre</td>
      <td>Description</td>
      <td>Action</td>
  </tr>
  <tr>
      <td>
        <div>
          <?= $value['id']; ?>
        </div>
      </td>
      <td>
        <div>
          <?php if(!empty($value['img']));?> 
          <img src="<?= WEBROOT; ?>public/img/article/<?= $value['img']; ?>" />     
        </div>
      </td>
      <td>
        <div>
            <i><?= $value['title']; ?></i>
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
              echo '<a href="updateArticle?id=' . $id .'" name="modifier">
                       <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>';
            ?>
            <a href="removeArticle?id=<?php echo $id; ?>" 
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



<section class="articles homepage_articles">
<div class="content">
<?php foreach ($articles as $key => $value): ?>
	      <div class="article_list"> 

                <div class="article">
                    <center><i><h2><?= $value['title']; ?></h2></i> </center> 

                    <div class="logo_article"><img  src="<?= WEBROOT; ?>public/img/article/<?= $value['img']; ?>" /></div> 
                    <a href="<?= ARTICLE.$value['title'] ?>">
                    <div class="divImageZoom">
                    <img class="top" src="<?= WEBROOT; ?>public/img/article/<?= $value['img']; ?>" />
                    </div>
                    </a>
                    <h5></h5><p> <?= $value['title']; ?></p>
                    <a class="Wedo_Button" href="">Je commente</a>
          </div>


         </div>


	<?php endforeach; ?>

</div>

</section>
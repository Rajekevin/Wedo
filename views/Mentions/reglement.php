<div id="home" class="site-content">

	<section class="articles white">
		<h1>▪ MENTIONS LEGALES<br><br></h1>
		<div class="content">
	        <?php foreach ($page as $key => $value):  ?>

	        <?php if($value['title']=="Mentions Legale"){ ?>
	        
	      <?= $value['contenu']; ?>
	        
	        
	        <?php  } 
	        endforeach; ?>        
	    </div>
	</section>

	<div class="site-cache" id="site-cache"></div>
	<div class="headContent"></div>

	                
	</div>
</div>
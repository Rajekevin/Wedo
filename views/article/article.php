
<?php foreach ($article as $key => $value): 
	?>
<?php endforeach; ?>
<script>
function cwRating(id,type,target){



	$.ajax({
		type:'POST',
		url:'../rating',
		data:'id='+id+'&type='+type,

		success:function(msg){
			if(msg == 'err'){
				alert('Some problem occured, please try again.');
			}else{
				$('#'+target).html(msg);
				var $idArticle =$('#idArticle'); //id que je souhaite envoyé vers mon script php
			}
		}
	});
}




</script>



<style type="text/css">
.row{ margin:20px 20px 20px 20px;}
.ratings{ font-size:25px !important;}
.thumbnail img {
    width: 100%;
}

.ratings {
    padding-right: 10px;
    padding-left: 10px;
    color: #d17581;
}

.thumbnail {
    padding: 0;
}

.thumbnail .caption-full {
    padding: 9px;
    color: #333;
}
.glyphicon-thumbs-up:hover{ color:#008000; cursor:pointer;}
.glyphicon-thumbs-down:hover{ color: #E10000; cursor:pointer;}
.counter{ color:#333333;}
.thumbnail img{height:200px;}
</style>
	

<?php
$a = new article();


// $id= intval($idArticle);

// $tab=$a->getOneBy(['id'=>$id]);



$tab=$a->getOneBy(['id'=>$idArticle]);




?>





<div id="home" class="site-content">

<section class="articles white">
	<div class="content">
	<label>
		<h5>Article : <?php echo $tab['title']; ?> de <?php echo $tab['auteur']; ?> le <?php echo $tab['date']; ?> </h5> 
		
	</label>

	<p>

		<?php if(!empty($tab['img'])); ?>
			
				<img src="<?= WEBROOT; ?>public/img/article/<?= $tab['img']; ?>" />


	</p>


	


	<label>
		 
		<p name="content"><?php echo $tab['contenu'];?></p>
		<input id="idArticle" type="hidden" value="<?php echo $idArticle;?>">  </input>
	</label>
</div>

</section>




    <div class="ratings">
            <p class="pull-right"></p>
            <p>
                <!-- Like Icon HTML -->
                <span class="fa fa-heart" onClick="cwRating(<?php echo $tab['id']; ?>,1,'like_count<?php echo $tab['interest']; ?>')"></span>&nbsp;
                <!-- Like Counter -->
                <span class="counter" id="like_count<?php echo $tab['id']; ?>"><?php echo $tab['interest']; ?></span>&nbsp;&nbsp;&nbsp;
                
                <!-- Dislike Icon HTML -->
                <span class="fa fa-heart-o" onClick="cwRating(<?php echo $tab['id']; ?>,0,'dislike_count<?php echo $tab['interest']; ?>')"></span>&nbsp;
                <!-- Dislike Counter -->
                <span class="counter" id="dislike_count<?php echo $tab['interest']; ?>"><?php echo $tab['interest']; ?></span>
            </p>
        </div>


<!-- SECTION COMMENTAIRE -->
<!-- 	<section id="com">
		<div class='container'>
			<div class='commentaire'>
				<h2>Commentaires</h2>
				<hr class="sep-foot">
				<div class='col-m-12'>
					<div class="col-12">
						<?php 
							if(isset($_SESSION['id']) && isset($_SESSION['token']) && isset($_SESSION['statut']) && isset($_SESSION['login']))
							{
								// $this->createForm($form, $errors);

					echo"<form id='comm' name='comm'  action='' method='post'>";
                    
                     // echo"<textarea  type='text' name='t' id='t' required='' tabindex='2' />";
                        echo "<textarea form='comm' name='content' id='content'> </textarea> ";
                    

 							echo"<input type='hidden' name='comm' value='ddjodj' />";

                
                    
               
                       echo"  <input type='submit' value='Je commente !' id='comm' name='comm' tabindex='2'>";
                    
                echo"</form>";

                
                    
							}
							else
							{
								echo "Vous devez vous connecter pour pouvoir poster un commentaire.";
							}
						?>
					</div>
					<div id='comments'>
						<div class='col-m-12'>
							<?php 					

								foreach ($commentaires as $key => $value): 
									if($thisArticle['id'] == $value['id_article'] ): 

										// AND $value['approuver'] == 1
							?>	
							<div class='comment-body'>
								<div class='auteur-post'>
									<img class='avatar' src='../../public/img/' alt='photo_user'/>
									<img class="avatar" src="<?= WEBROOT; ?>membres/avatar/<?= $photo; ?>" alt="photo utilisateur"/> 	
									<span class='comment-author'><?= $value['nom_user']; ?></span> <span class='comment-date'>le 
									<?=  date("d/m/Y", strtotime($value['date'])); ?></span>
									<p>
										<?= $value['commentaire']; ?>
									</p>
								</div>
							</div>			
							<?php 
									 endif;
								endforeach;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<!-- END SECTION COMMENTAIRE -->


	
<!-- </div> -->

<!--  $test = $a->save(['id'=>$id]);

 var_dump($a->save(['id'=>$id])); -->


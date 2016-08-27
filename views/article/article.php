
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
				
			}
		}
	});


}






	$(document).ready(function()
	{
    
	$('body').on("click",'.heart',function()
    {




    	
    	var A=$(this).attr("id");
    	var B=A.split("like");
        var messageID=B[1];
        var C=parseInt($("#likeCount"+messageID).html());
    	$(this).css("background-position","")
        var D=$(this).attr("rel");
       
        if(D === 'like') 
        {      
        $("#likeCount"+messageID).html(C+1);
        $(this).addClass("heartAnimation").attr("rel","unlike");

        
        }
        else
        {
        $("#likeCount"+messageID).html(C-1);
        $(this).removeClass("heartAnimation").attr("rel","like");
        $(this).css("background-position","left");
        }


    });


	});
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




	.heart_icon {
		background: url("/public/img/article/like/twitter-heart-button.png");
		background-size: 2900px;
		background-repeat: no-repeat;
		height: 100px;
		width: 100px;
		cursor: pointer;
		position: relative;
		text-align: center;

	}
 
	.heart {
		background: url(/public/img/article/like/twitter-heart-button.png);
		background-position: left;
		background-repeat: no-repeat;
		height: 50px;
		width: 68px;
		cursor: pointer;
		position: absolute;
		left:-14px;
		background-size:1450px; //actual background size 2900px


		}
		body{color: #333333}
    #container{
    	margin:0 auto;
    	width: 900px;
    	font-family: arial;
    }
    .heart {
	    background: url(/public/img/article/like/twitter-heart-button.png);
	    background-position: left;
	    background-repeat: no-repeat;
	    height: 50px;
	    width: 68px;
	    text-align:center;
	    cursor: pointer;
	    position: absolute;
	    left:75%;
        background-size:2900%
    }
    .heart:hover, .heart:focus{
    background-position: right;
	}

    @-webkit-keyframes heartBlast {
    0% {
	    background-position: left;
	}
	100% {
	    background-position: right;
	}
	}

	@keyframes heartBlast {
	    0% {
	    background-position: left;
	}
	100% {
	    background-position: right;
	}
	}

	.heartAnimation {
    display: inline-block;
    -webkit-animation-name: heartBlast;
    animation-name: heartBlast;
    -webkit-animation-duration: .8s;
    animation-duration: .8s;
    -webkit-animation-iteration-count: 1;
    animation-iteration-count: 1;
    -webkit-animation-timing-function: steps(28);
    animation-timing-function: steps(28);
    background-position: right;
    }
    .feed p{font-family: 'Georgia', Times, Times New Roman, serif; font-size: 25px;}
    .feed{clear: both; margin-bottom: :20px; height: 100px; position: relative;}
  
    .likeCount{font-family: 'Georgia', Times, Times New Roman, serif; margin-top: 13px;margin-left: 80%;font-size: 16px;color: #999999}
    
	
</style>



<!-- 	
<?php phpinfo(); ?> -->
<?php
$a = new article();


// $id= intval($idArticle);

// $tab=$a->getOneBy(['id'=>$id]);



$tab=$a->getOneBy(['id'=>$idArticle]);


$idArticle=$tab['id'];


?>





<div id="home" class="site-content">

<section class="articles white">
	<div class="content">
	<label>
	
		<h5>Article : <?php echo $tab['title']; ?> de <?php echo $tab['auteur']; ?> le <?php echo $tab['date']; ?> </h5> 
		
	</label>

	<p>

		<?php if(!empty($tab['img'])); ?>
			
				<img class="illusArticle" src="<?= WEBROOT; ?>public/img/article/<?= $tab['img']; ?>" />


	</p>


	

	<div class="articleContenu">
	
	<?php $title =$tab['title']; ?>
		<p name="content"><?php echo $tab['contenu'];?></p>
		<input id="idArticle" type="hidden" value="<?php echo $idArticle;?>">  </input>
	

	</div>
</div>

<div class="feed" id="feed2">

	<div class="ratings">      
      

		<div class="feed" id="feed1">


		<?php

		if (isset($_SESSION['login'])) { ?>
			
		
				<div class="heart " id="like1" rel="like"  onClick="cwRating(<?php echo $tab['id']; ?>,0,'dislike_count<?php echo $tab['interest']; ?>')"></div> 


			<div class="likeCount counter" id="likeCount1 like_count<?php echo $tab['id']; ?>"><?php echo $tab['interest']; ?>
			
			</div>

		<?php }else{ ?>


		

				<div class="heart"  rel="like"></div> <div class="likeCount" onClick="clo();" id="likeCount2"><?php echo $tab['interest']; ?></div>

		
<?php } ?>
		
		</div>

	
			
		</div>
  </div>




</section>


<!-- SECTION COMMENTAIRE -->
<section class="commentaires">
		<div class='container'>
			<div class='commentaire'>
				<!-- <h2>Commentaires</h2> -->




<a href="https://twitter.com/share" class="twitter-share-button" data-via="WedoAwesome" data-size="large" data-hashtags="Wedo">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>


<a href="http://twitter.com/share" class="twitter-share-button">Tweet</a>
				<p> Laissez un commentaire ici </p>
				<hr class="sep-foot">
				<div class='col-m-12'>
					<div class="col-12">
						<?php 
							if(isset($_SESSION['id']) && isset($_SESSION['token']) && isset($_SESSION['statut']) && isset($_SESSION['login']))
							{
								// $this->createForm($form, $errors);

				

						if(isset($sendCommentaire)){
						 echo $sendCommentaire;
						   echo" <meta http-equiv='refresh' content='2;$title' />";
						}

					if(isset($msg)){
						 echo $msg;
						   
						}


					echo"<form id='comm' name='comm'  action='' method='post'>";                    
                     // echo"<textarea  type='text' name='t' id='t' required='' tabindex='2' />";
                    echo "<textarea form='comm' name='content' id='content'> </textarea> ";                  

 					echo"<input type='hidden' name='comm' value='ddjodj' />"; 

 					   

 					echo"<input type='hidden' name='idArticle' value=$idArticle  />";           
                    
               
                    echo" <div class='call_to_long'> <input type='submit' value='Je commente !'   id='comm' name='comm' tabindex='2'></div>";
                   
               		echo"</form>";

             
                    
							}
							else
							{
								echo "Vous devez vous connecter pour pouvoir poster un commentaire.";
							}
						?>
					</div>
					
					<div id='#'>
						<div class='col-m-12'>
							 <h3>Commentaires</h3>
							<?php 										

								foreach ($commentaires as $key => $value): 
									if($thisArticle['id'] == $value['id_article']): 

									
							?>

							<?php

							   $idUser= Membre::findById($value['id_user']);                
				              $avatar = $idUser->getAvatar();
				             ?>	
						

							
							   
							        <article>
							          <div>
							           <a href="<?= WEBROOT; ?>user/profil?name=<?= $value['nom_user']; ?>"> <img src="<?= WEBROOT; ?>public/img/avatar/<?= $avatar; ?>"  width="90px" height="90px" ></a>
							          </div>
							          <div class="blocCommentaire">
							              <p class="login"><?= $value['nom_user']; ?></p>
							           
							            <p class="timeComment"> <span class='comment-date'>le 
									<?=  date("d/m/Y", strtotime($value['date'])); ?></span></p>
							        
							            
							           
							          </div>


							        </article>

							         <p id="comments"><?= $value['commentaire']; ?> </p>
							          
							    <hr>
							  

							 			
							<?php 
									 endif;
								endforeach;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!-- END SECTION COMMENTAIRE -->





	
<!-- </div> -->

<!--  $test = $a->save(['id'=>$id]);

 var_dump($a->save(['id'=>$id])); -->


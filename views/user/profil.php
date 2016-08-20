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
            
         
                  <div class="drop">drop file here</div>
                
                <div id="dropfile">Drop an image from your computer</div>

                <div class="drop">Drop files here</div> 
                <form action="upload" method="post" id="myForm" enctype="multipart/form-data">
                    <input type="file" name="file" id="file"><br>
                    <input type="submit" name="submit" class="btn btn-success" value="Upload Image">
                </form>

                <div class="progress progress-striped active">
                  <div class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                         <span class="sr-only">0% Complete</span>
                  </div>
                </div>

              

                     <a href="<?= LINK;?>user/updateProfil?login=<?= $login ?>"> Modier vote profil </a>

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
            <a href="<?= ARTICLE.$value['id_article'] ?>">Cliquez-ici pour retrouver l'article</a><br/>
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
              

        
         $categorieName = Categorie::findBy("id",$CategorieArticle,"int"); 

         
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





<?php  }else{
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


  <script type="text/javascript">
    

    $(".drop").on('dragover drop', function(e) { 
    e.preventDefault();
    e.stopPropagation();
});

$(".drop").on('dragover, dragenter', function(e){
  $(".drop").addClass('onenter')
  
});

$(".drop").on('drop', function(e) {
  droppedFiles = e.originalEvent.dataTransfer.files;
  reader = new FileReader();
  reader.onload = function(e){
    var img = new Image();
    img.src = e.target.result;
    img.width = 500;
    document.body.appendChild(img);
  };
  
  reader.readAsDataURL(droppedFiles[0]);
});


$(function(){

  //select the drop container
  var obj = $('.drop');

  // dragover event listener
  obj.on('dragover',function(e){
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border',"2px solid #16a085");
  });

  //drop event listener
  obj.on('drop',function(e){
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border',"2px dotted #bdc3c7");

    //capture the files
    var files = e.originalEvent.dataTransfer.files;
    var file =files[0];
    //console.log(file);

    //upload the file using xhr object
    upload(file);

    

  });

  function upload(file){

    //create xhr object

    xhr = new XMLHttpRequest();

    //check if the uploading file is image
    if(xhr.upload && check(file.type))
    {
    //initiate request
    xhr.open('post','drop',true);

    //set headers
    xhr.setRequestHeader('Content-Type',"multipart/form-data");
    xhr.setRequestHeader('X-File-Name',file.fileName);
    xhr.setRequestHeader('X-File-Size',file.fileSize);
    xhr.setRequestHeader('X-File-Type',file.fileType);

    //send the file
    xhr.send(file);

    //event listener
    xhr.upload.addEventListener("progress",function(e){
      var progress= (e.loaded/e.total)*100;
      $('.progress').show();
      $('.progress-bar').css('width',progress+"%");
    },false);

    //upload complete check
    xhr.onreadystatechange = function (e){
      if(xhr.readyState ===4)
      {
        if(xhr.status==200)
        {
          $('.progress').hide();
          $(".image").html("<img src='"+xhr.responseText+"' width='100%'/>");
        }
      }
    }
    }
    else
      alert("please upload only images");
  }

  //function to check the image type
  function check(image){
    switch(image){
      case 'image/jpeg':
      return 1;
      case 'image/png':
      return 1;
      case 'image/gif':
      return 1;
      default:
      return 0;
    }
  }

});
  </script>
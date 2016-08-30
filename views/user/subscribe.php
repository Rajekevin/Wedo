
  <!--       <script type="text/javascript">

         
          

            

            // $('#subscribe').on('submit',function(){

            //    alert('ou sont les putains');
            //   var login = $('#login').val();

            //    if(login=='')
            //     {
            //       $("#erreur").html('Le login doit faire plus dun caractère !');
                  
            //   }

            //   alert("ok");


            //   return false;
            // });


            $(function() { //shorthand document.ready function
                alert('ok');
              });
          });
          

          </script> -->





<section class="articles grey"  id="musculation">
    <div class="content">
       <!--  <h2>Musculation</h2> -->
     <!--   <h1 id="navbar2">Connexion<br><br></h1> -->

       
        <div class="article_list">

        	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

<div class="testbox">
  <h1>Inscription</h1>
 <?php 

if(isset($msg_error)){
 echo $msg_error;
}
 ?>
  <form  method="post" id="subscribe">
    <!--   <hr> -->
<div id="erreur">
</div>

    <div class="gender">
      <input type="radio" value="homme" id="male" name="sexe" checked/>
      <label for="male" class="radio" >Homme</label>
      <input type="radio" value="femme" id="female" name="sexe" />
      <label for="female" class="radio">Femme</label>


   </div> 
 <!--    <div class="accounttype">
      <input type="radio" value="None" id="radioOne" name="account" checked/>
      <label for="radioOne" class="radio" chec>Personal</label>
      <input type="radio" value="None" id="radioTwo" name="account" />
      <label for="radioTwo" class="radio">Company</label>
    </div> -->
  <!-- <hr> -->


  <label id="icon" for="name"><i class="icon-envelope "></i></label>
  <input type="text" name="email" id="name" placeholder="Email" value="<?php if (isset($_POST['email'])) echo htmlentities(trim($_POST['email'])); ?>" required/><br/>


  <label id="icon" for="name"><i class="icon-user"></i></label>
  <input type="text" name="login" id="login" placeholder="Votre pseudo" required/><br/>


  <label id="icon" for="name"><i class="icon-shield"></i></label>
  <input type="password" name="pass1" id="name" placeholder="Mot de passe" required/><br/>
  

  <label id="icon" for="name"><i class="icon-shield"></i></label>
  <input type="password" name="pass2"  id="name" placeholder="Retapez votre mot de passe" required/><br/>

  <label id="icon" for="name"><i class="icon-calendar"></i></label>
  <input type="date" name="birth" id="name" placeholder="Date de naissance" required/><br/>

  <label id="icon" for="name"><i  class="icon-globe"></i></label>
  <input type="text" name="ville" id="name" placeholder="Ville" required/><br/>


 
   <p>En cliquant ci-dessous, vous acceptez nos <a href="http://wedo-awesome.herokuapp.com/reglement">Conditions Generales d'Utilisation (CGU) </a> <input type="checkbox" id="agree" required />.</p>
 <!--   <a href="#"  class="button">Inscription</a> -->

   <input id="subscribe" type="submit" value="Inscription"  >
  </form>
</div>



        
  
               
        </div>
    </div>
</section>



<script type="text/javascript">

// $(document).ready(function(){
//     $('#agree').change(function(){
//         var checked = $(this).prop("checked");
//         if(checked){
//             $('#continue').removeAttr('disabled');
//         }else{
//             $('#continue').attr('disabled','disabled');
//         }

//     });
// });

</script>
<div class="login-page">
  <div class="form">

 <?php 

if(isset($msg_error)){
 echo $msg_error;
}
 ?>
   
    <form method="POST"  class="login-form" >
      <input type="text" id="email" name="email" placeholder="Email"/>
      <input type="password"  id="pass" name="pass" placeholder="Mot de Passe"/>
     
      <!--  <button type="submit" value="Connexion" >  Connexion</button> -->

      <input type="submit" value="Connexion">
      <p class="message">Pas encore inscrit ? <a href="<?= WEBROOT; ?>/user/subscribe">Cliquez-ici</a></p>
      <p class="message"> <a href="<?= WEBROOT; ?>/user/subscribe">Mot de passe oublié</a></p>
    </form>
  </div>
</div>
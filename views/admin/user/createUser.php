<?php foreach ($createuser as $key => $value): ?>

<?php endforeach; ?>


    <?php
    //hiihihihi
    ini_set("display_errors",0);error_reporting(0);
    ?>
<?php
    $membre = new membre();


    //$id= intval($_GET["id"]);

    $tab=$membre->getOneBy(['id'=>$id]);

    //$id=$a->setId($tab['id']);

    if(isset($_POST['login'])&& isset($_POST['pass'])&&isset($_POST['birth'])&&isset($_POST['mail']))
    {
        $pwd = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        
		$membre = new membre(); 
		$membre->setLogin($_POST['login']);
		$membre->setSexe($_POST['sexe']);			
		$membre->setPass($pwd);
		$membre->setVille($_POST['ville']);
		$membre->setMail($_POST['mail']);
		$membre->setStatut($_POST['statut']);
		$membre->setToken();

		$membre->save();


        echo "Votre utilisateur à été creer :)";

        echo"Vous allez être redirigé à la liste des utilisateurs du site Wedo dans 5s...... ";
               ?>
            <meta http-equiv="refresh" content="4;userlist" />
<?php
	}
?>


<table border="0" cellpadding="" cellspacing="1" width="100%">
 <tr>
    <th colspan="4">Creer un utilisateur</th>
  </tr>


<form name="inscription" method="post" action="" >
    <tr><td>Cochez votre genre : </td><br>

    <td><?php foreach ($sexe as $key=>$sexe):?>
        <label for="<?php echo $sexe;?>"> 
            <?php echo $sexe;?> 
        </label> : <input type="radio" required="" name="sexe" id="<?php echo $key;?>" checked value="<?php echo $sexe;?> ">
        <br />
    <?php endforeach;?></td></tr>


    <tr>
    <td><label>Login </label></td>
    <td><input type="text" name="login" required=""  value="<?php echo $tab['login']; ?>"></td></tr><br />

    <tr>
    <td><label>Votre E-mail </label></td>
    <td><input type="text" name="mail" required="" value="<?php echo $tab['mail']; ?>"></tr><br />

    <tr>
    <td><label>Saisissez un mot de passe </label></td>
    <td><input type="password" id="mdp" required=""  name="pass" class="mdp"  value="<?php echo $tab['pass']; ?>"></tr><br />

    <tr>
    <td><label>Resaisissez le mot de passe </label></td>
   <td> <input type="password" id="mdp" required=""  class="mdp" name="pass1" value=""></tr><br />

     <tr>
    <td><label>Date de Naissance</label></td>
    <td><input type="date" name="birth" required="" placeholder="jj/mm/aaaa" value="<?php echo $tab['birth']; ?>"></tr><br />

     <tr>
    <td><label> Statut </label> </td>
     <td><input type ="number" name="statut" required="" value="<?php echo $tab['statut']; ?>"></tr><br/>

     <tr>
    <td><label for="pays">Votre ville</label> :</td>
     <td><input type="text" name="ville" id="name" required="" placeholder="Ville"/></tr>
    </select>  
   
   <tr> <td><input type="submit" value="Voilà! Je créer un utilisateur :)"></td></tr>

</table>
    </p>
</form>


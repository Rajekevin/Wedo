<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulaire</title>

<link rel="stylesheet" href="public/css/formStyle.css">

</head>
<body>

<div id="resultat">
<center>
	<form>
		<fieldset> 
<?php
	$nbrVariables = champDefini(); 
?>


<?php
	function champDefini () //Permet de tester l'existence des variables renseignés dans le formulaire
	{
		$nbrVariables = 0;
		if (isset($_POST['nom']) && $_POST['nom'] != "")
		{
			echo "Le nom saisie est : <br />";
			echo $_POST['nom'];
			echo "  <br/><br/>";
			$nbrVariables = $nbrVariables + 1;
		}	
		else
		{
			echo "La variable 'nom' n'existe point <br />";
			$_POST['nom'] = "";
		}
		if (isset($_POST['prenom']) && $_POST['prenom'] != "")
		{
			echo "Le prenom saisie est : <br />";
			echo $_POST['prenom'];
			echo "  <br/><br/>";
			$nbrVariables = $nbrVariables + 1;
		}
		else
		{
			echo "La variable 'prenom' n'existe point <br />";
			$_POST['prenom'] = "";
		}
		if (isset($_POST['date']) && $_POST['date'] != "")
		{
			echo "La date saisie est : <br />";
			echo $_POST['date'];
			echo "  <br/><br/>";
			$nbrVariables = $nbrVariables + 1;
		}
		else
		{
			echo "La variable 'date' n'existe point <br />";
			$_POST['date'] = "";
		}
		if (isset($_POST['Monsieur']) || isset($_POST['Madame']))
		{
			echo "La variable 'Civilité' existe <br />";
			$nbrVariables = $nbrVariables + 1;
		}
		else
			echo "La variable 'Civilité' n'existe point <br />";
		if (isset($_POST['mail']) && $_POST['mail'] != "")
		{
			echo "Le mail saisie est : <br />";
			echo $_POST['mail'];
			echo "  <br/><br/>";
			$nbrVariables = $nbrVariables + 1;
		}
		else
		{
			echo "La variable 'mail' n'existe point <br />";
			$_POST['mail'] = "";
		}
		if (isset($_POST['commentaire']) && $_POST['commentaire'] != "")
		{
			echo "Le commentaire saisie est : <br />";
			echo $_POST['commentaire'];
			echo "  <br/><br/>";
		}
		else
		{
			echo "Vous n'avez pas saisie de commentaire <br />";
			$_POST['commentaire'] = "";
		}
		if (isset($_POST['password']) && $_POST['password'] != "")
		{
			echo "Le Mot de passe saisie est : <br />";
			echo $_POST['password'];
			echo "  <br/><br/>";
			$nbrVariables = $nbrVariables + 1;
		}
		else
			echo "Le Mot de passe n'est pas saisie <br />";
		if (isset($_POST['confirme_password']) && $_POST['confirme_password'] != "")
		{
			echo "Le Mot de passe de comfirmation saisie est : <br />";
			echo $_POST['confirme_password'];
			echo "  <br/><br/>";
			$nbrVariables = $nbrVariables + 1;
		}
		else
			echo "Le Mot de passe de comfirmation n'est pas saisie <br />";
		if (isset($_POST['CGU']))
		{
			echo "Les Conditions Générales d'Utilisations  sont  acceptés <br /><br />";
			$nbrVariables = $nbrVariables + 1;
		}
		else
			echo "Les Conditions Générales d'Utilisations ne sont pas acceptés <br /><br />";
		return $nbrVariables;
	} //Fin de la fonction
	function continuerVerification ($nbrVariables) // Permet de déterminer on continue à exécuter le code
	{
		if ($nbrVariables == 8) 
			return true;
		else
			return false;
	}
	function isPrenom ()
	{
		if (strlen($_POST['prenom']) > 1)
			return true;
		else
			return false;
	}
	function isNom ()
	{
		if (strlen($_POST['nom']) > 1)
			return true;
		else
			return false;
	}
	function nomEtPrenomIdentique ()
	{
		if (strcmp($_POST['prenom'], $_POST['nom']) == 0)
			return true; 
		else
			return false; 
	}
	function isPassword ()
	{
		if (strlen($_POST['password']) >= 8 && strlen($_POST['password']) <= 12)
			return true; // SI le mot de passe compris entre 8 et 12 caractères
		else
			return false;
	}
	function PasswordIdentique ()
	{
		if (strcmp($_POST['password'], $_POST['confirme_password']) == 0)
			return true; 
		else
			return false; 
	}
	function isMail ()
	{
		if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
			return true; //Si l'adresse email est valide
		else
			return false;
	}
	function isPays ()
	{
		if ($_POST['ville'] == 'Parizis' || $_POST['ville'] == 'Lyon' || $_POST['ville'] == 'Marseille'|| $_POST['ville'] == 'Lille'|| $_POST['ville'] == 'Calais'|| $_POST['ville'] == 'Bordeaux'|| $_POST['ville'] == 'Reims')
			return true;
		else
			return false;
	}
	if (continuerVerification($nbrVariables)) //Permet de verifiés les champs renseignés.
	{
		if (isPrenom())
			echo "Le prénom est valide <br />";
		else
			echo "<b>Le prénom n'est pas valide</b> <br />";
		if (isNom())
			echo "Le nom est valide <br />";
		else
			echo "<b>Le nom n'est pas valide</b> <br />";
		if (nomEtPrenomIdentique() == false)
			echo "Le prénom et le nom sont différents <br />";
		else
			echo "<b>Le prénom et le nom sont identiques</b> <br />"; 
		if (isPassword())
			echo "Le mot de passe est valide <br />";
		else
			echo "<b>Le mot de passe n'est pas valide</b> <br />";
		if (PasswordIdentique())
			echo "Les mots de passe sont identiques <br />"; 
		else
			echo "<b>Les mots de passe sont différents</b> <br />"; 
		if (isMail())
			echo "L'email est valide <br />";
		else
			echo "<b>L'email n'est pas valide</b> <br />";
		if (isVille())
			echo "La ville est valide <br />";
		else
			echo "<b>La ville n'est pas valide</b> <br />";
	}
	else
	{
		echo "Tous les champs ne sont pas valides ou non remplis.";
	}
	
?>
		</fieldset>
     </form>
</center>
</div>


</body>
</html>
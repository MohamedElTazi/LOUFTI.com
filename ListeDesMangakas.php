<!DOCTYPE html>
<html>
<head>
<title>Liste des Mangakas</title>
<meta charset="utf-8" />
</head>
<body>
<?php 
	//connexion au serveur MySQL
	include "connexion.php";

	$requete="insert into Mangaka values ('".$_POST["NomMangaka"]."','".$_POST["PrenomMangaka"]."');";
	$resultat= $mysqli->query($requete);
	echo "voici la requête sql qui va être exécutée : <br />".$requete; //Affichage de contrôle 
	  if ( !$resultat ) //permet de tester si la requête a été exécutée
		{
		   echo "<h1>insertion dans la base zoo effectuée</h1>";	//alors on indique que l'insert a réussi
		}
		else echo "Echec";	//sinon on indique qu'il a échoué
	
	$mysqli->close();	//On ferme la connexion à MySQL
?>
<h3><a href="index.php">RETOUR au menu de la base manga</a></h3>
</body>
</html>
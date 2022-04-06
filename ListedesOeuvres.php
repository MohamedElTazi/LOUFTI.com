<!DOCTYPE html>
<html>
<head>
<title>Liste des Oeuvres</title>
<meta charset="utf-8" />
</head>
<body>
<?php 
	//connexion au serveur MySQL
	include "connexion.php";

	$requete="insert into Oeuvre values ('".$_POST["NomManga"]."','".$_POST["GenreManga"]."','".$_POST["DateSortie"]."','".$_POST["NomMangaka"]."','".$_POST["PrenomMangaka"]."',".$_POST["PrixManga"].");";
	$resultat= $mysqli->query($requete) or die('Erreur SQL !<br />'.$requete.'<br />'.$mysqli->error);
	echo "voici la requête sql qui va être exécutée : <br />".$requete; //Affichage de contrôle 
	 
	
	$mysqli->close();	//On ferme la connexion à MySQL
?>
<h3><a href="index.html">RETOUR au menu de la base manga</a></h3>
</body>
</html>
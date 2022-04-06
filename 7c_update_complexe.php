<?php
   session_start();
?>
<!DOCTYPE html>

<html>
<head>
<title>Liste des Mangaka</title>
<meta charset="utf-8" />
</head>
<body>
<?php 
	//connexion au serveur MySQL
include "connect.php";

  // gestion des cas particuliers
  // le champ peut comporter un guillemet qui va gêner MySQL
  $nom=addslashes($_POST["NomManga"]);

  $requete="update manga set oeuvre = '".$_POST["NomManga"]."', Nom ='".$NomManga."',set oeuvre = '"$_POST["DateSortie"].", Parution ='".$DateSortie."',set oeuvre = '"$_POST["Genre"].", Genre ='".$GenreManga."',set oeuvre = '"$_POST["NomMangaka"].", Nom ='".$NomMangaka."',set oeuvre = '"$_POST["NomMangaka"].", Prenom Mangaka ='".$PrenomMangaka."',set oeuvre = '"$_POST["PrixManga"].", Prix ='".$PrixManga."' where NomManga=".$_POST["NomManga"].";";

 echo $requete;
 $resultat= $connexion->query($requete);
 if ( ! $resultat)
 {      echo "<h1>echec de la requête $requete</h1>";
        echo  $connexion->error();
 }
 else
 {
          echo "<h1>mise a jour effectuée</h1>";
 }
 
$mysqli->close();	//On ferme la connexion à MySQL
?>
<h3><a href="index.html">RETOUR au menu de la base manga</a></h3>
</body>
</html>
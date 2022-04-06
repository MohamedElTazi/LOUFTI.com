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
  $requete="select * from Oeuvre where NomManga='".$_POST["numero"]."';";
  $resultat= $connexion->query($requete);
  $ligne=$resultat->fetch_array();
  
  
  
  
  
  echo '<form action="7c_update_complexe.php" method="post">';
  echo '<h2>Modification des informations sur le manga</h2>';
  echo '<p>NomManga :';
  echo '<input type="text" name="NomManga" value="'.$ligne["NomManga"].'" size="20" readonly />';
  echo 'Genre :';
  echo '<input type="text" name="GenreManga" size="20" value='.$ligne["GenreManga"].'><br />';
  echo 'Nom Mangaka :';
  echo '<input type="text" name="NomMangaka" size="20" value='.$ligne["NomMangaka"].'><br />';
  echo 'Prenom Mangaka :';
  echo '<input type="text" name="PrenomMangaka" size="20" value='.$ligne["PrenomMangaka"].'><br />';
  echo 'Nom :';
  echo '<input type="text" name="DateSortie" size="20" value='.$ligne["DateSortie"].'><br />';
  echo 'Nom :';
  echo '<input type="text" name="PrixManga" size="20" value='.$ligne["PrixManga"].'><br />';
  
  
  
  
  
  echo '<p /><input type="submit" name="validation" value="Modifier"><p />';
  echo '<input type="reset" name="annuler" value="annuler" />';
  echo "</form>";

  
$connexion->close();	//On ferme la connexion à MySQL
?>
<h3><a href="index.html">RETOUR au menu de la base manga</a></h3>
</body>
</html>


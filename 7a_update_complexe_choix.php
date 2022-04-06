<!DOCTYPE html>

<html>
<head>
<title>mise à jour mangaka</title>
<meta charset="utf-8" />
</head>
<body>
<?php
	//connexion au serveur MySQL
include "connect.php";
  echo '<form action="7b_update_complexe_saisie.php" method="post">';
  echo "<h2>Sélection du Mangaka</h2>";
  echo "<p />Sélectionnez le Mangaka concerné :<p />";
  $requete="select * from Oeuvre;";
  $resultat= $connexion->query($requete);
  echo"<table cellpadding='5' border='1' class='tableau'>
     <td>Nom</td>
    <td>Genre</td>
    <td>Date parution</td>
    <td>Nom Mangaka</td>
	<td>Prénom Mangaka</td>
    <td>Prix</td>";
while($ligne=$resultat->fetch_assoc())
{
    extract($ligne);
    echo "<tr> <td class='td'>$NomManga</td>
    <td>$GenreManga</td>
    <td>$DateSortie</td>
    <td>$NomMangaka</td>
    <td>$PrenomMangaka</td>
	<td>$PrixManga €</td>
    </tr>";
}
echo "</table>";
  $requete="select NomManga from Oeuvre;";
  echo '<select name="numero">';
  $resultat= $connexion->query($requete);
  while ($ligne=$resultat->fetch_array())
  { echo '<option value = "' . $ligne["NomManga"] . '">' . $ligne["NomManga"] . ' </option>';
  }// chaque résultat de la requête devient un élément de la liste de choix
echo '</select name="numero">';
  echo '<p /><input type="submit" name="validation" value="Modifier"><p />';

  echo '<input type="reset" name="annuler" value="annuler" />';
  echo "</form>";
  
$connexion->close();	//On ferme la connexion à MySQL
?>
<h3><a href="index.html">RETOUR au menu de la base manga</a></h3>
</body>
</html>


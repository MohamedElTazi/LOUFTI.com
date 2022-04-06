<html>
<head>
	<title>Oeuvre</title>
	<link rel="stylesheet" href="style.css">
</head>

<?php 
//connexion a la base de données
include "index.html";
include "connexion.php";



//ecriture requête
$sql = "select * from oeuvre";



//execution requête
$req = $mysqli->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.$mysqli->connect_error);


//récupération des données 
echo"<table cellpadding='5' border='1' class='tableau'>
     <td>Nom</td>
    <td>Genre</td>
    <td>Date parution</td>
    <td>Nom Mangaka</td>
	<td>Prénom Mangaka</td>
    <td>Prix</td>";
while($ligne=$req->fetch_assoc())
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
?>
</hmtl>
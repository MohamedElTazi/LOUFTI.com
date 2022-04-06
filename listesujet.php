<html>
<head>
	<title>FAQ</title>
	<link rel="stylesheet" href="style.css">
</head>

<?php 
//connexion a la base de données
include "index.html";
include "connexion.php";



//ecriture requête
$sql = "select * from FAQ";



//execution requête
$req = $connexion->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.$connexion->connect_error);


//récupération des données 
echo"<table cellpadding='5' border='1' class='tableau'>
     <td>Sujet</td>
    <td>Réponse</td>
while($ligne=$req->fetch_assoc())
{
    extract($ligne);
    echo "<tr> <td>$Sujet</td> <td>$Réponse</td> </tr>";
}
?>
</hmtl>
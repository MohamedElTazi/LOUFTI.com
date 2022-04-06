<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Table de la base manga</title>
<meta charset="utf-8" />
 <header class="bandeau">
 	<nav>
                
           <a href="index.html"><img src="images/logo.png" class="logo" >
           <ul>
                       <li> <a href="ListeMangaTab.php"><img src="images/oeuvrelogo.png" class="button"></a></li>
					   <li> <a href="AjoutMangaka.html"><img src="images/mangakalogo.png" class="button"></a></li>
                       <li><a href="AjoutOeuvre.html"><img src="images/ajouterlogo.png" class="button"></a></li>
                       <li><a href="7a_update_complexe_choix.php"><img src="images/FAQlogo.png" class="button"></a></li>
           </ul>
  
            
    </nav>
 </header>
</head>
<body>
<?php
	//connexion au serveur MySQL
	include "connexion.php";

	// La requête  

	$table="oeuvre";
	$requete="select * from ".$table.";";
	$resultat= $mysqli->query($requete);

	// L'en tête des colonnes du tableau
	echo "<h1>Table : ".$table."</h1>";	// le . sert à concaténer une variable et du texte. Le résultat en HTML sera : "<h1>Table : animaux </h1>"
	echo '<p /><table border="2" width="75%">';	//Début du tableau
	echo "<tr>";	//Début de la première ligne de titre
	//Mysql_num_fields renvoie le nombre de champs (cad de colonnes) dans le tableau. 
	//En français : "On commence avec i=0, tant que i est inférieur au nombre de champs du tableau $resultat on exécute le code entre accolades, et on ajoute 1 à i"
	for( $i=0; $i < $resultat->field_count; $i++)  
	{
		  echo "<th>".$resultat->fetch_field_direct($i)->name."</th>";	//On récupère le nom du champ 0, puis 1, 2... jusqu'à les avoir tous, et à chaque fois on encadre le nom dans une balise <th> (en-tête de tableau)
	}
	echo "</tr>";	//Fin de la ligne de titre

	//  le parcours des lignes et des champs
	//Pour afficher chaque ligne
	while($ligne=$resultat->fetch_array()) // Pour chaque ligne du tableau $resultat,
	{    echo "<tr>"; // on crée une ligne en html
		 //Pour afficher tous les champs de la ligne, plutot que d'indiquer leur nom (comme dans le script 1), on va demander l'affichage du champ 0, puis 1, etc... jusqu'à les avoir tous
		$i=0; // On initialise le compteur $i
		while($i<$resultat->field_count) // Tant que $i est inférieur au nombre de champs (colonnes)
		{
			echo "<td>$ligne[$i]</td>";//On affiche le champ $i de la ligne
			$i++;//et on incrémente $i de 1
		}
		echo "</tr>"; // on ferme la ligne
	}

	// fin du tableau et compte des lignes
	echo "</table><p />";
	echo "Il y a ".$resultat->num_rows." lignes dans la table ".$table;
	$resultat->free(); //On vide le résultat de la requête
	$mysqli->close();	//On ferme la connexion à MySQL
?>
<h3><a href="index.html">retour a l'accueil de LOUFTI.COM</a></h3>
</body>
</html>


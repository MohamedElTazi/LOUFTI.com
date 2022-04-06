    <html>
    <head>
	<title>LOUFTI.com</title>
	<link rel="stylesheet" href="style.css">
<body>
 <header class="bandeau">
 	<nav>
                
           <a href="index.html"><img src="images/logo.png" class="logo" >
           <ul>
                       <li> <a href="listeoeuvre.php"><img src="images/oeuvrelogo.png" class="button"></a></li>
                       <li><a href="login.php"><img src="images/adminlogo.png" class="button"></a></li>
                       <li><a href="ajouteroeubre.php"><img src="images/ajouterlogo.png" class="button"></a></li>
                       <li><a href="FAQ.html"><img src="images/FAQlogo.png" class="button"></a></li>
           </ul>
  
            
    </nav>
 </header>
<title>FAQ</title>
    </head>
    <body>

    <!-- on place un lien permettant d'accéder à la page contenant le formulaire d'insertion d'un nouveau sujet -->
    <a href="./insert_sujet.php">Insérer un sujet</a>

    <br /><br />

    <?php
    // on se connecte à notre base de données
    include "connexion.php";
	if ($mysqli->connect_errno) {
		echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->error;
	}

    // préparation de la requete
    $sql = 'SELECT id, auteur, titre, date_derniere_reponse FROM manga ORDER BY date_derniere_reponse DESC';

    // on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
    $req = $mysqli->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.$mysqli->connect_error);

    // on compte le nombre de sujets du forum
    $nb_sujets = $req->field_count;

    if ($nb_sujets == 0) {
    	echo 'Aucun sujet';
    }
    else {
    	?>
    	<table width="500" border="1"><tr>
    	<td>
    	Auteur
    	</td><td>
    	Titre du sujet
    	</td><td>
    	Date dernière réponse
    	</td></tr>
    	<?php
    	// on va scanner tous les tuples un par un
    	while ($data = $req->fetch_array()) {

    	// on décompose la date
    	sscanf($data['date_derniere_reponse'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);

    	// on affiche les résultats
    	echo '<tr>';
    	echo '<td>';

    	// on affiche le nom de l'auteur de sujet
    	echo $data['auteur'];
    	echo '</td><td>';

    	// on affiche le titre du sujet, et sur ce sujet, on insère le lien qui nous permettra de lire les différentes réponses de ce sujet
    	echo '<a href="./lire_sujet.php?id_sujet_a_lire=' . $data['id'] . '">' . $data['titre'] . '</a>';

    	echo '</td><td>';

    	// on affiche la date de la dernière réponse de ce sujet
    	echo $jour . '-' . $mois . '-' . $annee . ' ' . $heure . ':' . $minute;
    	}
    	?>
    	</td></tr></table>
    	<?php
    }

    // on libère l'espace mémoire alloué pour cette requête
    $req->free();
    // on ferme la connexion à la base de données.
    $connexion->close();
    ?>
    </body>
    </html>
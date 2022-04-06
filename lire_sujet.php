    <html>
    <head>
    <title>Lecture d'un sujet</title>
    <meta charset='utf-8' />
	 <header class="bandeau">
	 <link rel="stylesheet" href="style.css">
 	<nav>
                
           <a href="index.html"><img src="images/logo.png" class="logo" >
           <ul>
                       <li> <a href="ListeMangaTab.php"><img src="images/oeuvrelogo.png" class="button"></a></li>
					   <li> <a href="AjoutMangaka.html"><img src="images/mangakalogo.png" class="button"></a></li>
                       <li><a href="AjoutOeuvre.html"><img src="images/ajouterlogo.png" class="button"></a></li>
                       <li><a href="FAQ.php"><img src="images/FAQlogo.png" class="button"></a></li>
           </ul>
  
            
    </nav>
 </header>
    </head>
    <body>

    <?php
    if (!isset($_GET['id_sujet_a_lire'])) {
    	echo 'Sujet non défini.';
    }
    else {
    ?>
    	<table width="500" border="1"><tr>
    	<td>
    	Auteur
    	</td><td>
    	Messages
    	</td></tr>
    	<?php
    	// on se connecte à notre base de données
        $connexion = new mysqli(// A COMPLETER ICI);
		if ($connexion->connect_errno) {
			echo "Echec lors de la connexion à MySQL : (" . $connexion->connect_errno . ") " . $connexion->connect_error;
		}
    	// A COMPLETER A PARTIR D'ICI
    	


        //NE RIEN MODIFIER APRES CES LIGNES
    	// on libère l'espace mémoire alloué pour cette reqête
    	$req->free();
    	// on ferme la connection à la base de données.
    	$connexion->close();
    	?>

    	<!-- on ferme notre table html -->
    	</table>
    	<br /><br />
    	<!-- on insère un lien qui nous permettra de rajouter des réponses à ce sujet -->
    	<a href="./insert_reponse.php?numero_du_sujet=<?php echo $_GET['id_sujet_a_lire']; ?>">Répondre</a>
    	<?php
    }
    ?>
    <br /><br />
    <!-- on insère un lien qui nous permettra de retourner à l'accueil du forum -->
    <a href="./index.html">Retour à l'accueil</a>

    </body>
    </html>
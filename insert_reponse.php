    <?php
    // on teste si le formulaire a été soumis
    if (isset ($_POST['go']) && $_POST['go']=='Poster') {
    	// on teste le contenu de la variable $auteur
    	if (!isset($_POST['auteur']) || !isset($_POST['message']) || !isset($_GET['numero_du_sujet'])) {
    	$erreur = 'Les variables nécessaires au script ne sont pas définies.';
    	}
    	else {
    	if (empty($_POST['auteur']) || empty($_POST['message']) || empty($_GET['numero_du_sujet'])) {
    		$erreur = 'Au moins un des champs est vide.';
    	}
    	// si tout est bon, on peut commencer l'insertion dans la base
    	else {
    		// on se connecte à notre base de données
    		$connexion = new mysqli(// A COMPLETER ICI);
			if ($connexion->connect_errno) {
				echo "Echec lors de la connexion à MySQL : (" . $connexion->connect_errno . ") " . $connexion->error;
			}

    		// on recupere la date de l'instant présent
    		$date = date("Y-m-d H:i:s");
			// A COMPLETER A PARTIR D'ICI
    	


			//NE RIEN MODIFIER APRES CES LIGNES
    		// on ferme la connexion à la base de données
    		$connexion->close();

    		// on redirige vers la page de lecture du sujet en cours
    		header('Location: lire_sujet.php?id_sujet_a_lire='.$_GET['numero_du_sujet']);

    		// on termine le script courant
    		exit;
    	}
    	}
    }
    ?>

    <html>
    <head>
    <title>Insertion d'une nouvelle réponse</title>
	<meta charset='utf-8' />
    </head>

    <body>

    <!-- on fait pointer le formulaire vers la page traitant les données -->
    <form action="insert_reponse.php?numero_du_sujet=<?php echo $_GET['numero_du_sujet']; ?>" method="post">
    <table>
    <tr><td>
    <b>Auteur :</b>
    </td><td>
    <input type="text" name="auteur" maxlength="30" size="50" value="<?php if (isset($_POST['auteur'])) echo $_POST['auteur']; ?>">
    </td></tr><tr><td>
    <b>Message :</b>
    </td><td>
    <textarea name="message" cols="50" rows="10"><?php if (isset($_POST['message'])) echo $_POST['message']; ?></textarea>
    </td></tr><tr><td><td align="right">
    <input type="submit" name="go" value="Poster">
    </td></tr></table>
    </form>
    <?php
    if (isset($erreur)) echo '<br /><br />',$erreur;
    ?>
    </body>
    </html>
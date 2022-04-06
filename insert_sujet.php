    <?php
    // on teste si le formulaire a été soumis
    if (isset ($_POST['go']) && $_POST['go']=='Poster') {
    	// on teste la déclaration de nos variables
    	if (!isset($_POST['auteur']) || !isset($_POST['titre']) || !isset($_POST['message'])) {
    	$erreur = 'Les variables nécessaires au script ne sont pas définies.';
    	}
    	else {
    	// on teste si les variables ne sont pas vides
    	if (empty($_POST['auteur']) || empty($_POST['titre']) || empty($_POST['message'])) {
    		$erreur = 'Au moins un des champs est vide.';
    	}

    	// si tout est bon, on peut commencer l'insertion dans la base
    	else {
    		// on se connecte à notre base
			$connexion = new mysqli(// A COMPLETER ICI);
			if ($connexion->connect_errno) {
				echo "Echec lors de la connexion à MySQL : (" . $connexion->connect_errno . ") " . $connexion->connect_error;
			}

    		// A COMPLETER A PARTIR D'ICI
    	


            //NE RIEN MODIFIER APRES CES LIGNES
    		// on ferme la connexion à la base de données
    		$connexion->close();

    		// on redirige vers la page d'accueil
    		header('Location: index.php');

    		// on termine le script courant
    		exit;
    	}
    	}
    }
    ?>
    <html>
    <head>
    <title>Insertion d'un nouveau sujet</title>
    <meta charset='utf-8' />
    </head>

    <body>

    <!-- on fait pointer le formulaire vers la page traitant les données -->
    <form action="insert_sujet.php" method="post">
    <table>
    <tr><td>
    <b>Auteur :</b>
    </td><td>
    <input type="text" name="auteur" maxlength="30" size="50" value="<?php if (isset($_POST['auteur'])) echo $_POST['auteur']; ?>">
    </td></tr><tr><td>
    <b>Titre :</b>
    </td><td>
    <input type="text" name="titre" maxlength="50" size="50" value="<?php if (isset($_POST['titre'])) echo $_POST['titre']; ?>">
    </td></tr><tr><td>
    <b>Message :</b>
    </td><td>
    <textarea name="message" cols="50" rows="10"><?php if (isset($_POST['message'])) echo $_POST['message']; ?></textarea>
    </td></tr><tr><td><td align="right">
    <input type="submit" name="go" value="Poster">
    </td></tr></table>
    </form>
    <?php
    // on affiche les erreurs éventuelles
    if (isset($erreur)) echo '<br /><br />',$erreur;
    ?>
    </body>
    </html>

<?php     
$mysqli = new mysqli("localhost:3307", "root", "", "MANGA");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>

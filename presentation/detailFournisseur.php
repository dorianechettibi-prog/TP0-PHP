<?php
// PARTIE DONNES ---------------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/DialogueBD.php';
try {
// on crée un objet référant la classe DialogueBD
    $id = $_GET['id'];
    $undlg = new DialogueBD();
    $Emprunteurs = $undlg->getUnEmprunteurs($id);


} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<!-- PARTIE AFFICHAGE --------------------------------------------------->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Détail Emprunts</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>

<h1><?php echo $Emprunteurs->nom; ?></h1>
<h2>Liste des Emprunt</h2>
<table>
    <tr><th>Id</th><th>Nom</th><th>Prenom</th><th>Adresse</th><th>Email</th></tr>
    <?php
    // Itération sur les lignes du tableau associatif (résultat requête SQL)
   echo "<tr>";
echo "<td>" . $Emprunteurs->id . "</td>";
echo "<td>" . $Emprunteurs->nom . "</td>";
echo "<td>" . $Emprunteurs->prenom . "</td>";
echo "<td>" . $Emprunteurs->adresse . "</td>";
echo "<td>" . $Emprunteurs->email . "</td>";
echo "</tr>"

    ?>
</table>

</body>
</html>


<?php
// PARTIE DONNES ---------------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/DialogueBD.php';
try {
// on crée un objet référant la classe DialogueBD
    $undlg = new DialogueBD();
    $Livres = $undlg->getTousLesLivres();
} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<!-- PARTIE AFFICHAGE --------------------------------------------------->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link href ="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="/design.css"/>
    <title>Tableau des Livres</title>
</head>
<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>
<h1>Tableau des Livres</h1>
<table class="table table-bordered table-striped table-responsive">
    <tr><th>Id</th><th>Titre</th><th>Auteur</th><th>Genre</th><th></th></tr>
    <?php
    // Itération sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($Livres as $ligne) {
        $id = $ligne['id'];
        $titre = $ligne['titre'];
        $auteur = $ligne['auteur'];
        $genre= $ligne['genre'];

        echo "<tr><td>$id</td><td>$titre</td><td>$auteur</td><td>$genre</td>";
        echo "<td><a href='detailFournisseur.php?id=$id'>voir le détail</a></td></tr>";
    }
    ?>

</table>

</body>
</html>

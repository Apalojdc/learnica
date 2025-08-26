<?php
    // Je fais la pagination de mes documents
$DocsParPage = 9;

$PageCourrent = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Recuperation du numéro de page
$Offset = ($PageCourrent - 1) * $DocsParPage; // Calcul du Offset, c'est le fait de calculer combien sera sur chaque page

// recuperation des données depuis la bd

$sqlprepar= "SELECT * FROM documentpdf ORDER BY IdPDF DESC LIMIT :limitdoc OFFSET :offsetdoc";
$RecupeDonnees = $pdo->prepare($sqlprepar);
$RecupeDonnees->bindValue(':limitdoc', $DocsParPage,PDO::PARAM_INT);
$RecupeDonnees->bindValue(':offsetdoc', $Offset, PDO::PARAM_INT);
$RecupeDonnees->execute();

$MesPdf = $RecupeDonnees->fetchAll();

// if (!empty($MesPdf)) {
//     echo "Des documents ont été trouvés !<br>";
// } else {
//     echo "Aucun document trouvé.<br>";
// }
?>
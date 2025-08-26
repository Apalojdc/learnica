
    <?php
    // Étape 1 : Compter le nombre total de documents
    $sqlTotal = "SELECT COUNT(*) FROM documentpdf";
    $totalDocs = $pdo->query($sqlTotal)->fetchColumn();

    // Étape 2 : Calculer le nombre total de pages
    $totalPages = ceil($totalDocs / $DocsParPage);


    if ($totalPages > 1) {
    echo '<div class="pagination">';

    // Bouton Précédent
    if ($PageCourrent > 1) {
        echo '<a href="?page=' . ($PageCourrent - 1) . '" class="prev">« Précédent</a>';
    } else {
        // Bouton désactivé si page 1
        echo '<span class="disabled">« Précédent</span>';
    }

    // Numéros de pages
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?page=' . $i . '"';
        if ($i == $PageCourrent) echo ' class="active"';
        echo '>' . $i . '</a>';
    }

    // Bouton Suivant
    if ($PageCourrent < $totalPages) {
        echo '<a href="?page=' . ($PageCourrent + 1) . '" class="next">Suivant »</a>';
    } else {
        // Bouton désactivé si dernière page
        echo '<span class="disabled">Suivant »</span>';
    }

    echo '</div>';
}

?>
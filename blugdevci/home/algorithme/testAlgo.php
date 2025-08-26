<?php

session_start(); // Démarrer une session

include(__DIR__.'/../../login/connexion.php'); // Assurez-vous que $pdo est une connexion PDO
$messageSucces = "";

if (isset($_POST['ajouter'])) {
    // Vérification des champs non vides
    if (!empty($_POST['titre']) && !empty($_POST['libelle']) && !empty($_POST['corrige'])) {
                    // Récupération et sécurisation des données du formulaire
                    $titre = htmlspecialchars($_POST['titre']);
                    $libelle = htmlspecialchars($_POST['libelle']);
                    $corrige = htmlspecialchars($_POST['corrige']);
                    $temps = date('Y-m-d H:i:s');

                     // Préparation de la requête d'insertion
                $sql = $pdo->prepare("
                INSERT INTO exercices_algo (titre, libelle, corrige) 
                VALUES (:titre, :libelle, :corrige)
            ");
             // Liaison des paramètres
             $sql->bindValue(':titre', $titre);
             $sql->bindValue(':libelle', $libelle);
             $sql->bindValue(':corrige', $corrige);
            //  $sql->bindValue(':temps', $temps);

                            
                // Exécution de la requête
                $succes = $sql->execute();

                
                if ($succes) {
                    // Récupérer les données de l'utilisateur nouvellement inscrit
                    $testalgoId = $pdo->lastInsertId();
                    $testalgoQuery = $pdo->prepare("SELECT * FROM traitement WHERE id = :id");
                    $testalgoQuery->bindValue(':id', $testalgoId);
                    $testalgoQuery->execute();
                    $testalgoData = $testalgoQuery->fetch(PDO::FETCH_ASSOC);

                    // Stocker les données dans la session
                    $_SESSION['testalgo'] = [
                        'id' => $testalgoData['id'],
                        'titre' => $testalgoData['titre'],
                        'libelle' => $testalgoData['libelle'],
                        'corrige' => $testalgoData['corrige']
                    ];

                    // Redirection vers l'accueil
                    header("LOCATION: /monblug/home/algoritme/exercice");
                    exit();
                } else {
                    echo "Erreur lors de l'ajout. Veuillez réessayer.";
                }
                }

    
}

?>
<?php 
include(__DIR__.'/../../header/header.php');
?>
<body>
    <div class="site-header">
        <h1 class="site-title">Plateforme de Tests d'Algorithmes</h1>
</div>
    <main class="content-area">
        <section>
            <?php

                // Requête pour récupérer le dernier enregistrement
                $query = $pdo->query("SELECT * FROM exercices_algo ORDER BY id_exercice DESC LIMIT 1");

                // Récupération des données
                $lastElement = $query->fetch(PDO::FETCH_ASSOC);

                // Affichage du résultat
                if ($lastElement) {
                    echo '<b class="test">' .$lastElement['titre'].'</b>'; // Affiche les détails du dernier enregistrement
                    echo "<p>".$lastElement['libelle']."</p>";
                } else {
                    echo "Aucun enregistrement trouvé.";
                }
            ?>
        </section>
        <!-- Section pour ajouter un exercice -->
        <section class="content-block add-exercise-section">
            <h2 class="block-title">Ajouter un nouvel exercice</h2>
            <form class="custom-form" id="exercise-form" method="POST">
                <label class="form-label" for="exercise-title">Titre :</label>
                <input class="form-control" type="text" id="exercise-title" name="titre" placeholder="Ex: Calculer la somme des nombres pairs" required>
                
                <label class="form-label" for="exercise-description">Description :</label>
                <textarea class="form-control" id="exercise-description" name="libelle" rows="5" placeholder="Décrivez l'exercice ici..." required></textarea>
                
                <label class="form-label" for="exercise-correct">Corrigé :</label>
                <textarea class="form-control" id="exercise-correct" name="corrige" rows="5" placeholder="Décrivez l'exercice ici..." required></textarea>
                
                <button class="form-submit-btn" type="submit" name="ajouter">Ajouter</button>
            </form>
        </section>
    </main>
    <footer class="site-footer">
        <p class="footer-info">&copy; 2024 BlugDev - Tous droits réservés</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>

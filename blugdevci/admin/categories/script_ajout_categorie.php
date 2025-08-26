<?php
    include(__DIR__.'/../../login/connexion.php');

    if(isset($_POST['envoyer'])){
        $titre = htmlspecialchars($_POST['titre']);
        $description = htmlspecialchars($_POST['description']);

        // Insertion dans la base de données
        $stmt = $pdo->prepare("INSERT INTO categorie (titre_categorie, description_cat) VALUES (:titre, :descriptio_cat)");
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':descriptio_cat', $description);
        $success_statut = $stmt->execute();
        if($success_statut){
            header('Location: /monblug/admin?success=Catégorie ajoutée avec succès');
        } else {
            header('Location: /monblug/admin?error=Erreur lors de l\'ajout de la catégorie');
        }
    }
?>
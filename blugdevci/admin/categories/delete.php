<?php
    // Script de suppression d'un commentaire
    include(__DIR__.'/../../login/connexion.php');
   if(isset($_GET['id'])){
        $id_categorie = htmlspecialchars($_GET['id']);
        $supprime_donnee = $pdo->prepare('DELETE FROM categories WHERE id_categorie = :id');
        $supprime_donnee->bindParam(':id', $id_categorie, PDO::PARAM_INT);
        $succes = $supprime_donnee->execute();

        if($succes) {
            echo "Catégorie supprimée avec succès.";
            exit();
        } else {
            echo "Erreur lors de la suppression de la catégorie.";
        }
    }
    ?>
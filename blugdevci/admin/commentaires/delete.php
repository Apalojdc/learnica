<?php
    // Script de suppression d'un commentaire
    include(__DIR__.'/../../login/connexion.php');
   if(isset($_GET['id'])){
        $id_commentaire = htmlspecialchars($_GET['id']);
        $supprime_donnee = $pdo->prepare('DELETE FROM commentaires WHERE id_commentaire = :id');
        $supprime_donnee->bindParam(':id', $id_commentaire, PDO::PARAM_INT);
        $succes = $supprime_donnee->execute();

        if($succes) {
            echo "Commentaire supprimé avec succès.";
            exit();
        } else {
            echo "Erreur lors de la suppression du commentaire.";
        }
    }
?>
<?php
    // Script de suppression d'un commentaire
    include(__DIR__.'/../../login/connexion.php');
    if(isset($_GET['id'])){
        $suppression = $pdo->prepare('DELETE FROM message WHERE id_commentaire = :id');
        $id_a_supprimer = htmlspecialchars($_GET['id']);
        $id_a_supprimer->bindParam(':id', $id_a_supprimer, PDO::PARAM_INR);
        $succès = $suppression->execute();

        if($succès) {
        echo "Message supprimé avec succès.";
            exit();
        } else {
            echo "Erreur lors de la suppression du message.";
        }
    }
?>
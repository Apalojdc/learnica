<?php
    // Script de suppression d'un commentaire
    include(__DIR__.'/../../login/connexion.php');
    $suppression = $pdo->prepare('DELETE FROM forums WHERE id_forum = :id');
    $id_a_supprimer = htmlspecialchars($_GET['id']);
    $id_a_supprimer->bindValue(':id', $id_a_supprimer, PDO::PARAM_INR);
    $succès = $suppression->execute();

    if($succès) {
       echo "Forum supprimé avec succès.";
        exit();
    } else {
        echo "Erreur lors de la suppression du Forum.";
    }
    ?>
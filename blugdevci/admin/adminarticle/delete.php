<?php 

     include(__DIR__.'/../../login/connexion.php');
     if(isset($_GET['id'])){
        $id_article = htmlspecialchars($_GET['id']);
        $supprime_donnee = $pdo->prepare('DELETE FROM articles WHERE id_article = :id');
        $supprime_donnee->bindParam(':id',$id_article, PDO::PARAM_INT);
        $succes = $supprime_donnee->execute();
     }
?>
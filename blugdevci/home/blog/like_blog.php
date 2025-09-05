<?php
// header('Content-Type: application/json');
    include(__DIR__.'/../../login/connexion.php');

    if(isset($_POST['articleId']) && isset($_POST['action'])){
        $articleId = intval($_POST['articleId']);
        $action = $_POST['action'];

        if($action === 'like'){
            $update_like = $pdo->prepare('UPDATE articles SET articule_likes = articule_likes + 1 WHERE id_article = :articleId');
            $update_like->bindValue(':articleId', $articleId);
            $update_like->execute();
        }elseif($action === 'unlike'){
            $update_like = $pdo->prepare('UPDATE articles SET articule_likes = articule_likes - 1 WHERE id_article = :articleId AND articule_likes > 0');
            $update_like->bindValue(':articleId', $articleId);
            $update_like->execute();
        }

        // Récupérer le nouveau nombre de likes
        $get_likes = $pdo->prepare('SELECT articule_likes FROM articles WHERE id_article = :articleId');
        $get_likes->bindValue(':articleId', $articleId);
        $get_likes->execute();
        $likes = $get_likes->fetch(PDO::FETCH_ASSOC);

        echo json_encode(['likes' => $likes['articule_likes']]);
        exit();
    }
?>
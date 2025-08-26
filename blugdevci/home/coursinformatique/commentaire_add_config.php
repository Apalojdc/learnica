<?php
session_start(); // très important sinon $_SESSION est vide

// error_reporting(E_ALL);
// ini_set('display_errors',1);
// include(__DIR__.'/../include_fichiers/if_no_connect.php');
// include('config.php');
include(__DIR__.'/../../login/connexion.php');

if(isset($_POST['idDoc'], $_POST['commentaire'])){
   
    $commentaire = htmlspecialchars($_POST['commentaire']);
    $idDoc = (int) $_POST['idDoc'];
    $idUser = $_SESSION['user']['id_user']; // récupérer l'utilisateur connecté

    // Insertion du commentaire
    // $stmt = $pdo->prepare('INSERT INTO commentaire(id_user_commente, id_document_commente, content_commente) VALUES(:id_user, :id_doc, :commentaire)');
    //     $stmt->bindValue(':id_user', $idUser);
    //     $stmt->bindValue(':id_doc', $idDoc);
    //     $stmt->bindValue(':commentaire', $commentaire);
    // $succes = $stmt->execute();

    try {
        $stmt = $pdo->prepare('INSERT INTO commentaire(id_user_commente, id_document_commente, content_commente)
            VALUES(:id_user, :id_doc, :commentaire)');
        $stmt->bindValue(':id_user', $idUser);
        $stmt->bindValue(':id_doc', $idDoc);
        $stmt->bindValue(':commentaire', $commentaire);
        $succes = $stmt->execute();
        // var_dump($succes);
    } catch (PDOException $e) {
        die("Erreur SQL : " . $e->getMessage());
    }
    
    // Récupérer le nom complet de l’utilisateur
    $user = $pdo->prepare("SELECT Nom_complet FROM users WHERE Id_User = ?");
    $user->execute([$idUser]);
    $user = $user->fetch();

    if($succes && $user){
        // renvoyer directement le HTML du nouveau commentaire
        echo '
        <div class="blog-system-comment">
            <div class="blog-system-comment-author-avatar"><span>'.substr($user["Nom_complet"],0,2).'</span></div>
            <div class="blog-system-comment-content">
                <div class="blog-system-comment-header">
                    <span class="blog-system-comment-author">'.htmlspecialchars($user["Nom_complet"]).'</span>
                    <span class="blog-system-comment-date">'.date("Y-m-d H:i:s").'</span>
                </div>
                <div class="blog-system-comment-text">'.htmlspecialchars($commentaire).'</div>
            </div>
        </div>';
    } else {
        echo "Erreur lors de l'envoi du commentaire.";
    }
}
?>
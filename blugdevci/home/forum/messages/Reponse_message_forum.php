<?php
    session_start();
    include(__DIR__.'/../../../login/connexion.php');
    
    //if(isset($_GET['id'])){
        if(($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['envoyer'])){
            if(!empty($_POST['reponse_content'])){
                 var_dump($_GET['id']);
                $reponse_content = htmlspecialchars($_POST['reponse_content']);
                //$id_forum =
                $id_user = $_SESSION['user']['id_user'];

                $reponse_requete = $pdo->prepare('INSERT INTO message_users(id_user, id_forum, texte_message) VALUES(:id_user, :id_forum, :texte_message)');
                $reponse_requete->bindValue(':id_user', $id_user, PDO::PARAM_INT);
                $reponse_requete->bindValue(':id_forum', intval($id_forum), PDO::PARAM_INT);
                $reponse_requete->bindValue(':texte_message', $reponse_content, PDO::PARAM_STR);
                $success_statut = $reponse_requete->execute();

                if( $success_statut ){
                    $succes_message = "message envoyé avec succès";
                    header('Location: /monblug/home/forums/forum_view_users?id='.$id_forum.'&success_message='.urlencode($succes_message));
                    exit();
                }else{
                    $error_message = "Une erreur s'est produite lors de l'envoi du message.";
                    header('Location: /monblug/home/forums/forum_view_users?id='.$id_forum.'&error_message='.urlencode($error_message));
                    exit();
                }  
            }else{
                $error_message = "Le contenu du message ne peut pas être vide.";
                header('Location: /monblug/home/forums/forum_view_users?id='.$id_forum.'&error_message='.urlencode($error_message));
                exit();
            }
        } 
   // }

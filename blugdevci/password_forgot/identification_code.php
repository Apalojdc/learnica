<?php
    // Connexion a la base de données
    include(__DIR__."/../login/connexion.php");

    // Verification de l'existance du champ username ou email non vide
    if (isset($_POST['verifier'])){
        if(!empty($_POST['username_verify'])){
            $username_verify = htmlspecialchars($_POST['username_verify']);

            // Recuperation de l'utilisateur
            $sql = "SELECT * FROM users WHERE mel = :username_verify OR mel = :username_verify";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':username_verify', $username_verify);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if($user){
                header("Location: /monblug/home/update/password/page?num=".$user['Id_User']);
                exit();
            }else{
                $error = "L'utilisateur n'existe pas ou l'email n'est pas valide";
                header("Location: /monblug/home/identification/page?error=".$error);
                exit();
            }
        }else{
            $error = "Veuillez entrer un nom d'utilisateur ou une adresse email valide";
            header("Location: /monblug/home/identification/page?error=".$error);
            exit();
        }
    }
?>
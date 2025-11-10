<?php

    // Connexion a la base de données
    include(__DIR__."/../login/connexion.php");

    if (isset($_GET['num'])){
        $num_user = htmlspecialchars($_GET['num']);
        $num_user = intval($num_user);
        if(isset($_POST['password_update'])){
            if(!empty($_POST['password']) && !empty($_POST['password_confirm'])){
                $password = htmlspecialchars($_POST['password']);
                $password_confirm = htmlspecialchars($_POST['password_confirm']);
                if($password == $password_confirm){
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "UPDATE users SET mdp = :password_update WHERE Id_User = :num_user";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':password_update', $password);
                    $stmt->bindValue(':num_user', $num_user);
                    $stmt->execute();
                    header("Location: /monblug/login");
                    exit();
                }else{
                    $error = "Les mots de passe ne correspondent pas";
                    // header("Location: /monblug/home/update/password/page?error=".$error);
                    echo $error;
                    exit();
                }
            }else{
                // $error = "Veuillez entrer un mot de passe et un mot de passe de confirmation";
                // header("Location: /monblug/home/update/password/page?error=".$error."&num_user=".$num_user);
                echo "Veuillez entrer un mot de passe et un mot de passe de confirmation";
                exit();
            }
        }
    }
    // else{
    //     header("Location: /monblug/home/identification/page");
    //     exit();
    // }
?>
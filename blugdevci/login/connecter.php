<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('connexion.php'); // Assurez-vous que $pdo est une instance de connexion PDO

// Vérifier si le formulaire a été soumis
if (isset($_POST['connecter'])) {
    // Récupération des données du formulaire avec filtrage
    $email = filter_input(INPUT_POST, 'mel', FILTER_SANITIZE_EMAIL);
    $password = $_POST['mdp']; // Pas besoin de filtrer le mot de passe ici

    // Vérification des champs obligatoires
    if (!empty($email) && !empty($password)) {
        try {
            // Préparer la requête pour chercher l'utilisateur
            $stmt = $pdo->prepare("SELECT * FROM users WHERE mel = :email");
            $stmt->bindValue(':email', $email);
            $stmt->execute();

            $statut = $pdo->prepare("SELECT * FROM users");
            $statut->execute();
            $statut = $statut->fetch(PDO::FETCH_ASSOC);

            if($statut['statut'] == 0){
                $error = "Compte non activé ou supprimé. Veuillez contacter l'administrateur.";
            }

            // Vérifier si l'utilisateur existe
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                // Vérifier le mot de passe avec password_verify
                if (password_verify($password, $user['mdp'])) {
                    // Stocker les données utilisateur dans la session
                    $_SESSION['user'] = [
                        'Id_User' => $user['Id_User'],
                        'nom_complet' => $user['nom_complet'],
                        'mel' => $user['mel'],
                        'role' => $user['role'],
                        'statut' => $user['statut'],
                    ];

                    // Rediriger l'utilisateur vers la page d'accueil
                    if($user['mel'] === "coulapalo@gmail.com"){
                        header("Location: /monblug/admin");
                        exit();
                    }elseif($user['role'] == "admin"){
                        header("Location: /monblug/admin");
                        exit();
                    }else{
                        header("Location: /monblug/accueil");
                        exit();
                    }
                } else {
                    // Mot de passe incorrect
                    $error = "mdp incorrect.";
                }
            } else {
                // L'utilisateur n'existe pas
                $error = "Identifiants incorrects. Vérifiez votre email et votre mot de passe.";
            }
        } catch (PDOException $e) {
            // Gestion des erreurs PDO
            $error = "Erreur lors de la connexion. Veuillez réessayer plus tard.";
        }
    } else {
        // Champs vides
        $error = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
                // Afficher un message d'erreur si nécessaire
                if (isset($error)) {
                    echo "<p style='color: red;'>htmlspecialchars($error)</p>";
                }
                ?>
</body>
</html>
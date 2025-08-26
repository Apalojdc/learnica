<?php
       // Informations de connexion
       $host = 'sql102.infinityfree.com'; // Nom d'hôte MySQL
       $dbname = 'if0_37755922_devblug'; // Nom de la base de données
       $username = 'if0_37755922'; // Nom d'utilisateur MySQL
       $password = 'SimpleCodeur06T'; // Mot de passe MySQL (le même que votre mot de passe vPanel)
       
    try {
        // Création de la connexion avec PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch (PDOException $e) {
        // Gérer les erreurs de connexion
        echo "Erreur de connexion : " . $e->getMessage();
    }    
?>
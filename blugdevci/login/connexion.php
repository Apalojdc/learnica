<?php
         // Informations de connexion
          $host = 'localhost'; // Nom d'hôte MySQL
          $dbname = 'blog_ci'; // Nom de la base de données
          $username = 'root'; // Nom d'utilisateur MySQL
          $password = ''; // Mot de passe MySQL (le même que votre mot de passe vPanel)
          
    try {
        // Création de la connexion avec PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch (PDOException $e) {
        // Gérer les erreurs de connexion
        echo "Erreur de connexion : " . $e->getMessage();
    }    
?>
<?php
session_start(); // Démarrer la session

// Supprimer toutes les variables de session
session_unset();

// Détruire la session
session_destroy();

// Rediriger l'utilisateur vers la page de connexion ou d'accueil publique
header("Location: /monblug/backup"); // Remplacez `login.php` par la page de votre choix
exit();

?>

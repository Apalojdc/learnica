<?php
    session_start();

    if(($_SESSION['user']['mail'])){
        session_unset();
        session_destroy();
        header('Location: /monblug/achat/package/formation/API/test/connexion');
    }
?>
<?php
    session_start();
   if(!($_SESSION['user']['id_user'])){
        session_unset();
        session_destroy();
        header('Location: /monblug/login');
    }
?>
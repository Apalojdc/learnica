<?php
// Afficher les erreurs pour débogage (à désactiver en production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Désactive OPCache si possible
if (function_exists('ini_set')) {
    @ini_set('opcache.enable', '0');
}

// Récupérer la partie chemin de l'URL, par ex: 'Accueil', 'Admin', etc.
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_uri = preg_replace('#^/monblug/#', '', $request_uri); // retire le prefixe uniquement au début

// Définir les routes avec chemins relatifs depuis la racine
$routes = [

    /* * Routes principales du site
     * Chaque route est associée à un fichier PHP qui gère la logique de cette route.
     */
    ''           => 'blugdevci/index.php',
    'backup'           => 'blugdevci/index.php',
    'accueil'    => 'blugdevci/home/index.php',
    'accueilAncien'    => 'blugdevci/indexAncien.php',

    /**
     * Les pages pour l'accueil
     */
    'accueil/a_propos/learnica/teams'    => 'blugdevci/home/a_propos/a_propos.php',

    /******* Les routes admins *******/
    // 'admin'      => 'blugdevci/admin/admin.php',
    'admin'      => 'blugdevci/admin/index.php',
    'admin/dashboard'      => 'blugdevci/admin/index.php',
    // Les routes pour les pages articles admin
    'admin/articles/show'      => 'blugdevci/admin/adminarticle/show.php',
    'admin/articles/create'      => 'blugdevci/admin/adminarticle/index.php',
    'admin/articles/update'      => 'blugdevci/admin/adminarticle/update.php',
    'admin/articles/delete'      => 'blugdevci/admin/adminarticle/delete.php',
    // Les routes pour les pages document admin
    'admin/documents/create'      => 'blugdevci/admin/documentadmin/index.php',
    'admin/documents/show'      => 'blugdevci/admin/documentadmin/show.php',
    'admin/documents/update'      => 'blugdevci/admin/documentadmin/update.php',
    'admin/documents/upload'      => 'blugdevci/admin/documentadmin/upload.php',
    'admin/documents/delete'      => 'blugdevci/admin/documentadmin/delete.php',
    // Les routes pour les pages forums admin
    'admin/forums/create'      => 'blugdevci/admin/forums/index.php',
    'admin/forums/show'      => 'blugdevci/admin/forums/show.php',
    'admin/forums/update'      => 'blugdevci/admin/forums/update.php',
    'admin/forums/upload'      => 'blugdevci/admin/forums/upload.php',
    // Les routes pour les pages catégories admin
    'admin/categorie/create'     => 'blugdevci/admin/categories/index.php',
    'admin/categorie/show'      => 'blugdevci/admin/categories/show.php',
    'admin/categorie/update'    => 'blugdevci/admin/categories/update.php',
    'admin/categorie/script_ajout_categorie'    => 'blugdevci/admin/categories/script_ajout_categorie.php',
    // Les routes pour les pages commentaires admin
    'admin/commentaire/index'     => 'blugdevci/admin/commentaires/index.php',
    // 'admin/commentaire/add/page'     => 'blugdevci/admin/commentaires/commentaire_add_config.php',
    // Les routes pour les pages messages admin
    'admin/message/index'     => 'blugdevci/admin/messages/index.php',
    // 'admin/message/reponse'     => 'blugdevci/admin/messages/Reponse_message_forum.php',
    // Les routes pour les pages users admin
    'admin/user/index'     => 'blugdevci/admin/usersadmin/index.php',
    'admin/user/show'     => 'blugdevci/admin/usersadmin/show.php',
    'admin/user/delete'     => 'blugdevci/admin/usersadmin/delete.php',
    'admin/user/update'     => 'blugdevci/admin/usersadmin/update.php',
    // 'admin/user/index'     => 'blugdevci/admin/users/delete.php',

    /******* Les routes d'authentification du site ********************/
    //Les routes pour la connexion
    'login'      => 'blugdevci/login/authentification.php',
    'user/logout'     => 'blugdevci/logout/logout.php',
    'auth'       => 'blugdevci/login/connecter.php',
    'inscription/page'       => 'blugdevci/login/inscription.php',
    'login/page'       => 'blugdevci/login/login.php',
    'update/password/page'       => 'blugdevci/login/updatepassword.php',
    'update/password/username/mail'       => 'blugdevci/login/usernameormail.php',

    // Les routes pour mon portofolio
    'simplecodeur' => 'blugdevci/SimpleCodeur/simplecodeur.php',

    /* Les routes pour acceder aux differentes page de cours */
    'home/cours/informatique'      => 'blugdevci/home/coursinformatique/index.php',
    'home/cours/cours_react'      => 'blugdevci/home/react_cours/introductionReact.php',
    'home/exo/add/commentaires'      => 'blugdevci/home/coursinformatique/commentaire_add_config.php',

    // Routes pour mes pages d'exercice et challenges
    'exercices/content/page'      => 'blugdevci/home/coursinformatique/exercices.php',
    'exercices/list/content/page'      => 'blugdevci/home/coursinformatique/list_exercice.php',

    // Routes pour le profil utilisateur
    'mon_profil/content/page_view'      => 'blugdevci/home/users/profile.php',

    // Les routes pour acceder aux exercices:
    'home/algoritme/ajouter/exercice'   =>  'blugdevci/home/algorithme/testAlgo.php',
    'home/algoritme/exercice'   =>  'blugdevci/home/algorithme/algo.php',
    'home/algoritme/exercie/send_is_success'   =>  'blugdevci/home/algorithme/succes.php',
    // Les routes de la page de cours
    'home/algorithmes'=> 'blugdevci/home/CoursAlgo.php',
    'home/reseau'   => 'blugdevci/home/reseaux.html',
    'home/admindocument'=> 'blugdevci/home/document/documents.php',
    'home/telechargers'=> 'blugdevci/home/document/document.php',
    'home/tutoriel'   => 'blugdevci/home/tutoriel.php',
    'home/frontEnd'   => 'blugdevci/home/frontEnd.php',
    'home/backEnd'    => 'blugdevci/home/BackEnd.php',
    'home/machineLearning' => 'blugdevci/home/machinelearning/index.php',
    'home/contact/contact' => 'blugdevci/home/contact/contact.php',

    // Pour les tutoriels
    'achat/package/formation/php' => 'blugdevci/home/packagePHP/index.php',
    'tutoriel/fprmation/php/videos' => 'blugdevci/home/packagePHP/tutoriel.php',
    'achat/package/formation/API/test' => 'blugdevci/home/packagePHP/api.php',
    'achat/package/formation/API/test/connexion' => 'blugdevci/home/packagePHP/connexion.php',
    'achat/package/formation/API/test/deconnexion' => 'blugdevci/home/packagePHP/deconnexion.php',

    // Les routes pour acceder aux differentes page d'articles.
    'home/article' => 'blugdevci/home/article/index.php',
    // Les routes de mon blog
    'home/blogs/blog_page'       => 'blugdevci/home/blog/index.php',// Mon blog routing
    'home/blogs/blog_view_page'       => 'blugdevci/home/blog/blog_view.php',// Mon blog routing
    'home/blogs/blog_ajout_script'       => 'blugdevci/home/blog/script_ajout_commentaire.php',// script pour ajouter un commentaire
    //Les routes de mon forum
    'home/forums/forum_page'       => 'blugdevci/home/forum/index.php',// Mon forum routing
    'home/forums/forum_membres_page'       => 'blugdevci/home/forum/membres.php',// Mon forum routing
    'home/forums/forum_ressources_page'       => 'blugdevci/home/forum/ressources.php',// Mon forum routing
    'home/forums/forum_aide_page'       => 'blugdevci/home/forum/aide.php',// Mon forum routing
    'home/forums/forum_list_sujets_page'       => 'blugdevci/home/forum/list_sujets_forum.php',// Mon forum routing
    'home/forums/forum_view_users'       => 'blugdevci/home/forum/forum_view_users.php',// Mon forum routing
    'home/forums/reponse'       => 'blugdevci/home/forum/messages/Reponse_message_forum.php',// Mon forum routing

    // Les actions des users sur le site
    'home/actionUsers/read_article'       => 'blugdevci/home/actionUsers/read_article.php',
    'home/forum/read_forum'       => 'blugdevci/home/forum/read_forum.php',

    // Les routes pour les tutos
];

// Vérifier si la route existe
if (array_key_exists($request_uri, $routes)) {
    $file = __DIR__ . '/' . $routes[$request_uri];
    if (file_exists($file)) {
        include $file;
    } else {
        http_response_code(404);
        echo "Erreur 404 : La page demandée est introuvable (fichier manquant).";
    }
} else {
    http_response_code(404);
    // Fichier 404 dans ton projet, sinon message simple
    $file404 = __DIR__ . '/blugdevci/erreurs/404Erreur.php';
    if (file_exists($file404)) {
        include $file404;
    } else {
        echo "Erreur 404 : Page non trouvée.";
    }
}

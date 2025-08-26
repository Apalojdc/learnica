<?php
session_start();
include(__DIR__.'/../../login/connexion.php');

    // Recuperation de tous les sujets par catégorie
    $id_categorie = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : null;
    $forum_sujets_recupe = $pdo->prepare('SELECT 
    id_forum,
    titre_forum,
    slug_form,
    description_forum,
    id_auteur,
    id_categorie,
    nbr_vue_forum,
    nbr_reponse_forum,
    dernier_post_a,
    statut_forum,
    modifie_le,
    cree_le,
    Nom_complet,
    nbr_likes_forum
    FROM forum INNER JOIN users ON forum.id_auteur = users.Id_User WHERE id_forum = :id_forum ORDER BY cree_le DESC');
    $forum_sujets_recupe->bindValue(':id_forum', $id_categorie, PDO::PARAM_INT);
    $forum_sujets_recupe->execute();
    $sujet = $forum_sujets_recupe->fetch();


// Recuperer les messages par utilisateur
if (isset($_GET['id'])) {
    $id_forum = htmlspecialchars($_GET['id']);
    // Requete pour recuperer les messages de l'utilisateur
    $query = $pdo->prepare('SELECT texte_message, nbr_likes, nbr_reponses, date_envoie, Nom_complet FROM message_users INNER JOIN users ON message_users.id_user = users.Id_User WHERE id_forum = :id_forum ORDER BY date_envoie DESC');
    $query->bindValue(':id_forum', $id_forum, PDO::PARAM_INT);
    $query->execute();
    $user_messages = $query->fetchAll(PDO::FETCH_ASSOC);
   
} else {
    // Redirection si l'ID du forum n'est pas fourni
    header('Location: /monblug/home/forums/forum_page');
    exit();
}
// echo "<pre>";
// print_r($sujet);
// echo "</pre>";
    // var_dump( $user_messages);

     if(isset($_GET['id'])){
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
   }

   if(isset($_POST['likes'])){
    $like_add = $pdo->prepare('UPDATE forum SET nbr_likes_forum = nbr_likes_forum + 1 WHERE id_forum = :id_forum');
    $like_add->bindValue(':id_forum',$_POST['id_forum']);
    $like_add->execute();
   }elseif(isset($_POST['dislikes'])){
    $like_add = $pdo->prepare('UPDATE forum SET nbr_likes_forum = nbr_likes_forum - 1 WHERE id_forum = :id_forum');
    $like_add->bindValue(':id_forum',$_POST['id_forum']);
    $like_add->execute();
   }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment optimiser les performances de React ? - TechForum</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .forum-main-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #ffffff;
            position: relative;
        }

        /* Particles Background Effect */
        .forum-main-container::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(0, 255, 136, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(0, 255, 136, 0.05) 0%, transparent 50%);
            pointer-events: none;
            z-index: 1;
        }

        /* Header */
        .forum-header {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-bottom: 1px solid rgba(0, 255, 136, 0.2);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
        }

        .forum-header-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .forum-logo {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(0, 255, 136, 0.3);
            animation: logoGlow 3s ease-in-out infinite alternate;
            text-decoration: none;
        }

        @keyframes logoGlow {
            from { filter: drop-shadow(0 0 5px rgba(0, 255, 136, 0.3)); }
            to { filter: drop-shadow(0 0 15px rgba(0, 255, 136, 0.6)); }
        }

        .forum-nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .forum-nav-link {
            color: #b0b0b0;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .forum-nav-link:hover, .forum-nav-link.forum-active {
            color: #00ff88;
            background: rgba(0, 255, 136, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.2);
        }

        .forum-user-menu {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .forum-search-bar {
            background: #2a2a2a;
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 20px;
            padding: 0.7rem 1.5rem;
            color: #ffffff;
            width: 300px;
            transition: all 0.3s ease;
        }

        .forum-search-bar:focus {
            outline: none;
            border-color: #00ff88;
            box-shadow: 0 0 0 2px rgba(0, 255, 136, 0.2);
            transform: scale(1.02);
        }

        .forum-user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #000;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 255, 136, 0.3);
        }

        .forum-user-avatar:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 5px 20px rgba(0, 255, 136, 0.5);
        }

        /* Main Content */
        .topic-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        /* Breadcrumb */
        .forum-breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #888;
            margin-bottom: 2rem;
            padding: 0.5rem 1rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 8px;
            border-left: 3px solid #00ff88;
        }

        .forum-breadcrumb a {
            color: #00d4ff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forum-breadcrumb a:hover {
            color: #00ff88;
        }

        /* Topic Header */
        .topic-header {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
        }

        .topic-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .topic-header:hover::before {
            left: 100%;
        }

        .topic-title {
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .topic-meta {
            display: flex;
            gap: 2rem;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .topic-author {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #00d4ff;
            font-weight: 600;
        }

        .author-avatar {
            width: 32px;
            height: 32px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            color: #000;
            font-weight: 600;
        }

        .topic-date {
            color: #888;
            font-size: 0.9rem;
        }

        .topic-category {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.3rem 0.8rem;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .topic-stats {
            display: flex;
            gap: 2rem;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .topic-stat {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 80px;
            padding: 0.5rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 8px;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .topic-stat-number {
            color: #00d4ff;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
        }

        .topic-stat-label {
            color: #888;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Reaction System */
        .topic-reactions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .reaction-btn {
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            border: 1px solid rgba(0, 255, 136, 0.2);
            border-radius: 8px;
            padding: 0.8rem 1.5rem;
            color: #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            text-decoration: none;
        }

        .reaction-btn:hover {
            border-color: rgba(0, 255, 136, 0.4);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.2);
        }

        .reaction-btn.liked {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border-color: transparent;
        }

        .reaction-btn.disliked {
            background: linear-gradient(45deg, #ff6b6b, #ff8e8e);
            color: #000;
            border-color: transparent;
        }

        /* Topic Content */
        .topic-content {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2.5rem;
            margin-bottom: 3rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            line-height: 1.8;
            font-size: 1.05rem;
        }

        .topic-content p {
            margin-bottom: 1.5rem;
        }

        .topic-content h3 {
            color: #00ff88;
            margin: 2rem 0 1rem 0;
            font-size: 1.3rem;
        }

        .topic-content ul, .topic-content ol {
            margin: 1rem 0 1.5rem 2rem;
        }

        .topic-content li {
            margin-bottom: 0.5rem;
        }

        .topic-content code {
            background: #0a0a0a;
            border: 1px solid rgba(0, 255, 136, 0.2);
            border-radius: 4px;
            padding: 0.2rem 0.5rem;
            font-family: 'Courier New', monospace;
            color: #00d4ff;
        }

        .topic-content pre {
            background: #0a0a0a;
            border: 1px solid rgba(0, 255, 136, 0.2);
            border-radius: 8px;
            padding: 1.5rem;
            overflow-x: auto;
            margin: 1.5rem 0;
        }

        /* Messages Section */
        .messages-section {
            margin-top: 3rem;
        }

        .messages-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid rgba(0, 255, 136, 0.2);
        }

        .messages-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #00ff88;
        }

        .messages-count {
            color: #888;
            font-size: 0.9rem;
        }

        .sort-messages {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .sort-select {
            background: #2a2a2a;
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            color: #ffffff;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .sort-select:focus {
            outline: none;
            border-color: #00ff88;
            box-shadow: 0 0 0 2px rgba(0, 255, 136, 0.2);
        }

        /* Message Item */
        .message-item {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            position: relative;
            transition: all 0.3s ease;
        }

        .message-item:hover {
            border-color: rgba(0, 255, 136, 0.3);
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(0, 255, 136, 0.1);
        }

        .message-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .message-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .message-author-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #000;
        }

        .message-author-info {
            display: flex;
            flex-direction: column;
        }

        .message-author-name {
            color: #00d4ff;
            font-weight: 600;
            font-size: 1rem;
        }

        .message-author-badge {
            background: rgba(0, 255, 136, 0.2);
            color: #00ff88;
            font-size: 0.7rem;
            padding: 0.2rem 0.5rem;
            border-radius: 6px;
            margin-top: 0.2rem;
            width: fit-content;
        }

        .message-date {
            color: #888;
            font-size: 0.9rem;
        }

        .message-content {
            color: #e0e0e0;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }

        .message-content p {
            margin-bottom: 1rem;
        }

        .message-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid rgba(0, 255, 136, 0.1);
        }

        .message-reactions {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .message-reaction-btn {
            background: rgba(0, 255, 136, 0.05);
            border: 1px solid rgba(0, 255, 136, 0.2);
            border-radius: 6px;
            padding: 0.5rem 1rem;
            color: #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.9rem;
            text-decoration: none;
        }

        .message-reaction-btn:hover {
            background: rgba(0, 255, 136, 0.1);
            border-color: rgba(0, 255, 136, 0.4);
            transform: translateY(-1px);
        }

        .message-reaction-btn.active {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border-color: transparent;
        }

        .reply-btn {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .reply-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
        }

        /* Reply Form */
        .reply-form {
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            display: none;
        }

        .reply-form.active {
            display: block;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .reply-textarea {
            width: 100%;
            background: #1e1e1e;
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 8px;
            padding: 1rem;
            color: #ffffff;
            resize: vertical;
            min-height: 120px;
            font-family: inherit;
            margin-bottom: 1rem;
        }

        .reply-textarea:focus {
            outline: none;
            border-color: #00ff88;
            box-shadow: 0 0 0 2px rgba(0, 255, 136, 0.2);
        }

        .reply-form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
        }

        .btn-cancel {
            background: rgba(255, 107, 107, 0.2);
            color: #ff6b6b;
            border: 1px solid rgba(255, 107, 107, 0.3);
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            background: rgba(255, 107, 107, 0.3);
            transform: translateY(-1px);
        }

        .btn-submit {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
        }

        /* Nested Replies */
        .nested-replies {
            margin-left: 3rem;
            margin-top: 1rem;
            border-left: 2px solid rgba(0, 255, 136, 0.2);
            padding-left: 1rem;
        }

        .nested-reply {
            background: rgba(0, 255, 136, 0.03);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid rgba(0, 255, 136, 0.08);
        }

        /* Add Message Form */
        .add-message-form {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
        }

        .add-message-title {
            color: #00ff88;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .message-textarea {
            width: 100%;
            background: #1e1e1e;
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 8px;
            padding: 1.5rem;
            color: #ffffff;
            resize: vertical;
            min-height: 150px;
            font-family: inherit;
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }

        .message-textarea:focus {
            outline: none;
            border-color: #00ff88;
            box-shadow: 0 0 0 2px rgba(0, 255, 136, 0.2);
        }

        .message-form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .forum-header-content {
                padding: 0 1rem;
                flex-wrap: wrap;
                gap: 1rem;
            }

            .forum-search-bar {
                width: 100%;
                order: 3;
                flex-basis: 100%;
            }

            .topic-container {
                padding: 1rem;
            }

            .topic-title {
                font-size: 1.8rem;
            }

            .topic-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .topic-stats {
                justify-content: center;
                gap: 1rem;
            }

            .topic-reactions {
                flex-wrap: wrap;
                justify-content: center;
            }

            .messages-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .nested-replies {
                margin-left: 1rem;
            }

            .message-actions {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .message-reactions {
                justify-content: center;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="forum-main-container">
        <!-- Header -->
        <?php 
            // include(__DIR__.'/forum_nav/forum_nav.php')
        
            if(empty($_SESSION['user']['nom_complet'])){
                include(__DIR__.'/../../navbar/NavBarIndex.php');
            }else{
                include(__DIR__.'/../../navbar/NavBarAcceuil.php');
            }
        ?>

        <!-- <header class="forum-header">
            <div class="forum-header-content">
                <a href="#" class="forum-logo">TechForum</a>
                <nav class="forum-nav">
                    <a href="#" class="forum-nav-link">Accueil</a>
                    <a href="#" class="forum-nav-link forum-active">Forums</a>
                    <a href="#" class="forum-nav-link">Membres</a>
                    <a href="#" class="forum-nav-link">Aide</a>
                </nav>
                <div class="forum-user-menu">
                    <input type="text" class="forum-search-bar" placeholder="Rechercher dans le forum...">
                    <div class="forum-user-avatar">JD</div>
                </div>
            </div>
        </header> -->

        <!-- Main Content -->
        <main class="topic-container">
            <!-- Breadcrumb -->
            <nav class="forum-breadcrumb">
                <a href="#">Accueil</a>
                <span>›</span>
                <a href="#">Forums</a>
                <span>›</span>
                <a href="#">Développement Web</a>
                <span>›</span>
                <span><?php
                // $sujet['id_forum'] 
                
                // echo "<pre>";
                // print_r($sujet['id_forum'] );
                // echo "</pre>";
?>
                
            </span>
            </nav>

            <!-- Topic Header -->
            <section class="topic-header">
                <h1 class="topic-title"><?= htmlspecialchars($sujet['titre_forum']) ?></h1>
                
                <div class="topic-meta">
                    <div class="topic-author">
                        <div class="author-avatar">DR</div>
                        <span><?= htmlspecialchars($sujet['Nom_complet']) ?></span>
                    </div>
                    <div class="topic-date"><?= htmlspecialchars($sujet['dernier_post_a']) ?></div>
                    <div class="topic-category">React</div>
                </div>

                <div class="topic-stats">
                    <div class="topic-stat">
                        <span class="topic-stat-number"><?= htmlspecialchars($sujet['nbr_vue_forum']) ?></span>
                        <span class="topic-stat-label">Vues</span>
                    </div>
                    <div class="topic-stat">
                        <span class="topic-stat-number"><?= htmlspecialchars($sujet['nbr_reponse_forum']) ?></span>
                        <span class="topic-stat-label">Réponses</span>
                    </div>
                    <div class="topic-stat">
                        <span class="topic-stat-number">342</span>
                        <span class="topic-stat-label">Réactions</span>
                    </div>
                </div>

                <div class="topic-reactions">
                    <form action="" method="POST">
                        <input type="hidden"  name="id_forum" value="<?= $sujet['id_forum']?>">
                        <button class="reaction-btn" onclick="toggleReaction(this, 'like')" name="likes">
                        👍 <span><?php
                         if($sujet['nbr_likes_forum'] < 0){
                            echo 0;
                            $val = $sujet['nbr_likes_forum'] * (-1);
                        }else{
                            echo $sujet['nbr_likes_forum'];
                        }
                        ?></span>
                        </button>
                        <button class="reaction-btn" onclick="toggleReaction(this, 'dislike')" name="dislikes">
                        👎 <?php
                                if($sujet['nbr_likes_forum'] > 0){
                                    echo 0;
                                }else{
                                    echo $sujet['nbr_likes_forum'] * (-1);
                                }
                            ?>
                        </button>
                    </form>
                </div>
            </section>

            <!-- Topic Content -->
            <section class="topic-content">
                <p><?= htmlspecialchars($sujet['description_forum']) ?></p>
            </section>

            <!-- Add Message Form -->
            <section class="add-message-form">
                <h3 class="add-message-title">💬 Ajouter une réponse</h3>
                <form action="#" method="POST">
                    <textarea class="message-textarea" name="reponse_content" placeholder="Écrivez votre réponse ici..." required></textarea>
                    <div class="message-form-actions">
                        <button type="submit" class="btn-submit" name="envoyer">📤 Publier la réponse</button>
                    </div>
                </form>
            </section>

            <!-- Messages Section -->
            <section class="messages-section">
                <div class="messages-header">
                    <div>
                        <h2 class="messages-title">💬 Réponses</h2>
                        <div class="messages-count"><?= htmlspecialchars($sujet['nbr_reponse_forum']) ?> réponses au total</div>
                    </div>
                    <div class="sort-messages">
                        <label style="color: #888; font-size: 0.9rem;">Trier par:</label>
                        <select class="sort-select">
                            <option>Plus récentes</option>
                            <option>Plus anciennes</option>
                            <option>Plus appréciées</option>
                        </select>
                    </div>
                </div>

                <!-- Message 1 -->
                 <?php foreach ($user_messages as $message): ?>
                    <article class="message-item">
                        <div class="message-header">
                            <div class="message-author">
                                <div class="message-author-avatar"><?=$message['Nom_complet']['0'].$message['Nom_complet']['1']?></div>
                                <div class="message-author-info">
                                    <div class="message-author-name"><?= htmlspecialchars($message['Nom_complet']) ?></div>
                                    <div class="message-author-badge"><?= htmlspecialchars($sujet['titre_forum']) ?></div>
                                </div>
                            </div>
                            <div class="message-date"><?= $message['date_envoie'] ?></div>
                        </div>
                        <div class="message-content">
                            <p><?= htmlspecialchars($message['texte_message'])?></p>

                        </div>
                        <div class="message-actions">
                            <div class="message-reactions">
                                <button class="message-reaction-btn active" onclick="toggleMessageReaction(this, 'like')">
                                    👍 <span>8</span>
                                </button>
                                <button class="message-reaction-btn" onclick="toggleMessageReaction(this, 'dislike')">
                                    👎 <span>0</span>
                                </button>
                            </div>
                            <button class="reply-btn" onclick="toggleReplyForm(this)">
                                💬 Répondre
                            </button>
                        </div>
                        <div class="reply-form">
                            <form action="/monblug/admin/message/reponse" method="POST">
                                <textarea class="reply-textarea" name="reponse_content" placeholder="Votre réponse..."></textarea>
                                <div class="reply-form-actions">
                                    <button type="button" class="btn-cancel" onclick="toggleReplyForm(this)">Annuler</button>
                                    <button type="submit" class="btn-submit" name="envoyer">Répondre</button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Nested Reply -->
                        <!-- <div class="nested-replies">
                            <div class="nested-reply">
                                <div class="message-header">
                                    <div class="message-author">
                                        <div class="message-author-avatar">DR</div>
                                        <div class="message-author-info">
                                            <div class="message-author-name">DevReact92</div>
                                        </div>
                                    </div>
                                    <div class="message-date">Il y a 2 heures</div>
                                </div>
                                <div class="message-content">
                                    <p>Merci @ExpertJS ! Je vais tester React DevTools Profiler tout de suite. Pour react-window, tu l'as déjà utilisé avec des données qui changent dynamiquement ?</p>
                                </div>
                                <div class="message-actions">
                                    <div class="message-reactions">
                                        <button class="message-reaction-btn" onclick="toggleMessageReaction(this, 'like')">
                                            👍 <span>2</span>
                                        </button>
                                        <button class="message-reaction-btn" onclick="toggleMessageReaction(this, 'dislike')">
                                            👎 <span>0</span>
                                        </button>
                                    </div>
                                    <button class="reply-btn" onclick="toggleReplyForm(this)">
                                        💬 Répondre
                                    </button>
                                </div>
                            </div>
                        </div> -->
                    </article>
                <?php endforeach; ?>
                <!-- Message 2 -->
                <!-- <article class="message-item">
                    <div class="message-header">
                        <div class="message-author">
                            <div class="message-author-avatar">PM</div>
                            <div class="message-author-info">
                                <div class="message-author-name">PerformanceMaster</div>
                                <div class="message-author-badge">Senior Dev</div>
                            </div>
                        </div>
                        <div class="message-date">Il y a 2 heures</div>
                    </div>
                    <div class="message-content">
                        <p>Ajoute aussi à ta liste :</p>
                        <p><strong>useDeferredValue</strong> et <strong>useTransition</strong> - Les nouveaux hooks de React 18 sont parfaits pour améliorer la fluidité de l'interface utilisateur.</p>
                        <p>Pour tes listes, regarde aussi <strong>TanStack Virtual</strong> (ex react-virtual), c'est plus moderne que react-window.</p>
                        <p>Et n'oublie pas de vérifier tes dépendances dans useEffect et useMemo - souvent c'est là qu'on trouve les problèmes de performance ! 🔍</p>
                    </div>
                    <div class="message-actions">
                        <div class="message-reactions">
                            <button class="message-reaction-btn" onclick="toggleMessageReaction(this, 'like')">
                                👍 <span>5</span>
                            </button>
                            <button class="message-reaction-btn" onclick="toggleMessageReaction(this, 'dislike')">
                                👎 <span>0</span>
                            </button>
                        </div>
                        <button class="reply-btn" onclick="toggleReplyForm(this)">
                            💬 Répondre
                        </button>
                    </div>
                    <div class="reply-form">
                        <form action="#" method="POST">
                            <textarea class="reply-textarea" name="reply_content" placeholder="Votre réponse..."></textarea>
                            <div class="reply-form-actions">
                                <button type="button" class="btn-cancel" onclick="toggleReplyForm(this)">Annuler</button>
                                <button type="submit" class="btn-submit">Répondre</button>
                            </div>
                        </form>
                    </div>
                </article>
 -->
                <!-- Message 3 -->
                <!-- <article class="message-item">
                    <div class="message-header">
                        <div class="message-author">
                            <div class="message-author-avatar">OG</div>
                            <div class="message-author-info">
                                <div class="message-author-name">OptimizationGuru</div>
                                <div class="message-author-badge">Performance Expert</div>
                            </div>
                        </div>
                        <div class="message-date">Il y a 1 heure</div>
                    </div>
                    <div class="message-content">
                        <p>Quelques conseils supplémentaires basés sur mon expérience :</p>
                        <p>🚀 <strong>Préchargement intelligent</strong> : Utilise Intersection Observer pour précharger les composants avant qu'ils soient visibles</p>
                        <p>⚡ <strong>Debouncing</strong> : Pour les recherches et filtres, toujours debouncer les inputs</p>
                        <p>🗃️ <strong>Gestion d'état</strong> : Si tu utilises Redux, regarde RTK Query pour le cache automatique</p>
                        <p>📦 <strong>Bundle analysis</strong> : webpack-bundle-analyzer te montrera quels modules prennent le plus de place</p>
                    </div>
                    <div class="message-actions">
                        <div class="message-reactions">
                            <button class="message-reaction-btn" onclick="toggleMessageReaction(this, 'like')">
                                👍 <span>7</span>
                            </button>
                            <button class="message-reaction-btn" onclick="toggleMessageReaction(this, 'dislike')">
                                👎 <span>0</span>
                            </button>
                        </div>
                        <button class="reply-btn" onclick="toggleReplyForm(this)">
                            💬 Répondre
                        </button>
                    </div>
                    <div class="reply-form">
                        <form action="#" method="POST">
                            <textarea class="reply-textarea" name="reply_content" placeholder="Votre réponse..."></textarea>
                            <div class="reply-form-actions">
                                <button type="button" class="btn-cancel" onclick="toggleReplyForm(this)">Annuler</button>
                                <button type="submit" class="btn-submit">Répondre</button>
                            </div>
                        </form>
                    </div>
                </article> -->
            </section>
        </main>
    </div>
        <?php 
            // include(__DIR__.'/forum_nav/forum_nav.php')
            if(!empty($_SESSION['user']['nom_complet'])){
                include(__DIR__.'/../../navbar/footer.php');
            }
        ?>
    <script>
        // Script purement visuel - ne gère pas la logique métier
        document.addEventListener('DOMContentLoaded', function() {
            // Animation du logo (comme dans le forum principal)
            const logo = document.querySelector('.forum-logo');
            setInterval(() => {
                logo.style.transform = 'scale(1.02)';
                setTimeout(() => {
                    logo.style.transform = 'scale(1)';
                }, 200);
            }, 5000);

            // Effet de particules sur le background
            function createParticle() {
                const particle = document.createElement('div');
                particle.style.position = 'fixed';
                particle.style.width = '2px';
                particle.style.height = '2px';
                particle.style.background = 'rgba(0, 255, 136, 0.3)';
                particle.style.borderRadius = '50%';
                particle.style.pointerEvents = 'none';
                particle.style.left = Math.random() * window.innerWidth + 'px';
                particle.style.top = window.innerHeight + 'px';
                particle.style.zIndex = '1';
                
                document.body.appendChild(particle);
                
                const animation = particle.animate([
                    { transform: 'translateY(0) translateX(0)', opacity: 0 },
                    { transform: 'translateY(-100px) translateX(' + (Math.random() * 100 - 50) + 'px)', opacity: 1 },
                    { transform: 'translateY(-' + window.innerHeight + 'px) translateX(' + (Math.random() * 200 - 100) + 'px)', opacity: 0 }
                ], {
                    duration: 8000 + Math.random() * 4000,
                    easing: 'ease-out'
                });
                
                animation.onfinish = () => particle.remove();
            }
            
            setInterval(createParticle, 2000);
        });

        // Fonctions pour les interactions visuelles (à connecter avec ton PHP)
        function toggleReaction(button, type) {
            // Animation visuelle seulement
            const isActive = button.classList.contains('liked') || button.classList.contains('disliked');
            
            // Reset all reaction buttons in the same container
            const container = button.closest('.topic-reactions');
            const allBtns = container.querySelectorAll('.reaction-btn');
            allBtns.forEach(btn => {
                btn.classList.remove('liked', 'disliked');
            });
            
            // Apply new state if not already active
            if (!isActive) {
                button.classList.add(type === 'like' ? 'liked' : 'disliked');
            }
            
            // Ici tu ajouteras l'appel AJAX vers ton PHP
            console.log(`Reaction ${type} ${isActive ? 'removed' : 'added'}`);
        }

        function toggleMessageReaction(button, type) {
            // Animation visuelle seulement
            const isActive = button.classList.contains('active');
            
            if (isActive) {
                button.classList.remove('active');
            } else {
                // Reset other reactions in the same message
                const container = button.closest('.message-reactions');
                const allBtns = container.querySelectorAll('.message-reaction-btn');
                allBtns.forEach(btn => btn.classList.remove('active'));
                
                button.classList.add('active');
            }
            
            // Ici tu ajouteras l'appel AJAX vers ton PHP
            console.log(`Message reaction ${type} ${isActive ? 'removed' : 'added'}`);
        }

        function toggleReplyForm(element) {
            // Animation visuelle seulement
            const messageItem = element.closest('.message-item') || element.closest('.nested-reply');
            const replyForm = messageItem.querySelector('.reply-form');
            
            if (replyForm.classList.contains('active')) {
                replyForm.classList.remove('active');
                replyForm.style.display = 'none';
            } else {
                // Fermer les autres formulaires ouverts
                document.querySelectorAll('.reply-form.active').forEach(form => {
                    form.classList.remove('active');
                    form.style.display = 'none';
                });
                
                replyForm.style.display = 'block';
                setTimeout(() => {
                    replyForm.classList.add('active');
                }, 10);
            }
        }
    </script>
</body>
</html>
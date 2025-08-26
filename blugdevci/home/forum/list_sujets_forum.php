<?php
session_start();
    include(__DIR__.'/../../login/connexion.php');

    // Recuperation de tous les sujets par catégorie
    $id_categorie = isset($_GET['num']) ? (int)$_GET['num'] : 0;
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
    Nom_complet
    FROM forum INNER JOIN users ON forum.id_auteur = users.Id_User WHERE forum.id_categorie = :id_categorie ORDER BY cree_le DESC');
    $forum_sujets_recupe->bindValue(':id_categorie', $id_categorie, PDO::PARAM_INT);
    $forum_sujets_recupe->execute();
    $sujets = $forum_sujets_recupe->fetchAll();

    // Recuperation de la categorie du forum selectionnée
    $categorie_recupe = $pdo->prepare('SELECT * FROM categorie WHERE id_categorie = :id_categorie');
    $categorie_recupe->bindValue(':id_categorie', $id_categorie, PDO::PARAM_INT);
    $categorie_recupe->execute();
    $categorie = $categorie_recupe->fetch();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sujets du Forum - LearnicaForum</title>
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
        .topics-container {
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

        /* Forum Header */
        .forum-info {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 3rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
        }

        .forum-info::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .forum-info:hover::before {
            left: 100%;
        }

        .forum-header-section {
            display: flex;
            align-items: center;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .forum-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #000;
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.4);
        }

        .forum-details {
            flex: 1;
        }

        .forum-title {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .forum-description {
            color: #b0b0b0;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .forum-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1.5rem;
        }

        .forum-stat {
            text-align: center;
            padding: 1rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 10px;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .forum-stat-number {
            font-size: 1.8rem;
            font-weight: 800;
            color: #00d4ff;
            margin-bottom: 0.3rem;
            display: block;
        }

        .forum-stat-label {
            color: #888;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Actions */
        .topics-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .action-btn {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border: none;
            padding: 1rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .action-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .action-btn:hover::before {
            left: 100%;
        }

        .action-btn:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.4);
        }

        /* Sort Options */
        .sort-options {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .sort-select {
            background: #2a2a2a;
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 8px;
            padding: 0.7rem 1rem;
            color: #ffffff;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .sort-select:focus {
            outline: none;
            border-color: #00ff88;
            box-shadow: 0 0 0 2px rgba(0, 255, 136, 0.2);
        }

        /* Topics List */
        .topics-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .topic-item {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .topic-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.05), transparent);
            transition: left 0.5s ease;
        }

        .topic-item:hover::before {
            left: 100%;
        }

        .topic-item:hover {
            border-color: rgba(0, 255, 136, 0.3);
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(0, 255, 136, 0.1);
            text-decoration: none;
            color: inherit;
        }

        .topic-item.pinned {
            border-left: 4px solid #ffd700;
            background: linear-gradient(145deg, #2e2a1e, #3a2f2a);
        }

        .topic-item.locked {
            opacity: 0.7;
            border-left: 4px solid #ff6b6b;
        }

        .topic-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .topic-main-info {
            flex: 1;
        }

        .topic-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
            line-height: 1.3;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .topic-item:hover .topic-title {
            color: #00ff88;
        }

        .topic-status-icon {
            font-size: 1rem;
            opacity: 0.7;
        }

        .topic-meta {
            display: flex;
            gap: 1rem;
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .topic-author {
            color: #00d4ff;
            font-weight: 600;
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

        .topic-preview {
            color: #b0b0b0;
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .topic-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid rgba(0, 255, 136, 0.1);
        }

        .topic-stats-left {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .topic-stat {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 60px;
        }

        .topic-stat-number {
            color: #00d4ff;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
        }

        .topic-stat-label {
            color: #888;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .topic-last-activity {
            text-align: right;
            color: #888;
            font-size: 0.9rem;
        }

        .last-post-date {
            color: #00ff88;
            font-weight: 600;
            margin-bottom: 0.2rem;
        }

        .last-post-author {
            font-size: 0.8rem;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin-top: 3rem;
        }

        .pagination-btn {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border: 1px solid rgba(0, 255, 136, 0.1);
            color: #ffffff;
            padding: 0.8rem 1.2rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            text-decoration: none;
        }

        .pagination-btn:hover {
            border-color: rgba(0, 255, 136, 0.3);
            transform: translateY(-2px);
            color: #ffffff;
            text-decoration: none;
        }

        .pagination-btn.active {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border-color: transparent;
        }

        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .pagination-info {
            color: #888;
            margin: 0 1rem;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .empty-title {
            color: #888;
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }

        .empty-description {
            color: #666;
            margin-bottom: 2rem;
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

            .topics-container {
                padding: 1rem;
            }

            .forum-title {
                font-size: 2rem;
            }

            .forum-header-section {
                flex-direction: column;
                text-align: center;
            }

            .forum-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .topics-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .sort-options {
                justify-content: center;
            }

            .topic-header {
                flex-direction: column;
                gap: 1rem;
            }

            .topic-stats {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .topic-stats-left {
                justify-content: center;
            }

            .action-btn {
                width: 100%;
                justify-content: center;
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
                <a href="#" class="forum-logo">LearnicaForum</a>
                <nav class="forum-nav">
                    <a href="#" class="forum-nav-link forum-active">Accueil</a>
                    <a href="#" class="forum-nav-link">Forums</a>
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
        <main class="topics-container">
            <!-- Breadcrumb -->
            <nav class="forum-breadcrumb">
                <a href="#">Accueil</a>
                <span>›</span>
                <a href="#">Forums</a>
                <span>›</span>
                <span><?= htmlspecialchars($categorie['titre_categorie']) ?></span>
            </nav>

            <!-- Forum Info -->
            <section class="forum-info">
                <div class="forum-header-section">
                    <div class="forum-icon">🌐</div>
                    <div class="forum-details">
                        <h1 class="forum-title"><?= htmlspecialchars($categorie['titre_categorie']) ?></h1>
                        <p class="forum-description">
                            <?= htmlspecialchars($categorie['description_cat']) ?>
                        </p>
                    </div>
                </div>
                <div class="forum-stats">
                    <div class="forum-stat">
                        <span class="forum-stat-number">247</span>
                        <span class="forum-stat-label">Sujets</span>
                    </div>
                    <div class="forum-stat">
                        <span class="forum-stat-number">1,834</span>
                        <span class="forum-stat-label">Messages</span>
                    </div>
                    <div class="forum-stat">
                        <span class="forum-stat-number">156</span>
                        <span class="forum-stat-label">Membres</span>
                    </div>
                    <div class="forum-stat">
                        <span class="forum-stat-number">23</span>
                        <span class="forum-stat-label">En ligne</span>
                    </div>
                </div>
            </section>

            <!-- Actions & Sort -->
            <div class="topics-actions">
                <a href="/monblug/admin/forums/create" class="action-btn">
                    ➕ Nouveau Sujet
                </a>
                <div class="sort-options">
                    <label style="color: #888; font-size: 0.9rem;">Trier par:</label>
                    <select class="sort-select">
                        <option>Plus récents</option>
                        <option>Plus populaires</option>
                        <option>Plus de réponses</option>
                        <option>Alphabétique</option>
                    </select>
                </div>
            </div>

            <!-- Topics List -->
            <div class="topics-list">
                <!-- Pinned Topic -->
                <?php foreach ($sujets as $sujet): ?>
                    <a href="/monblug/home/forums/forum_view_users?id=<?= htmlspecialchars($sujet['id_forum']) ?>" class="topic-item pinned">
                        <div class="topic-header">
                            <div class="topic-main-info">
                                <h3 class="topic-title">
                                    <span class="topic-status-icon">📌</span>
                                    <?= htmlspecialchars($sujet['titre_forum']) ?>
                                </h3>
                                <div class="topic-meta">
                                    <span class="topic-author">Admin</span>
                                    <span>•</span>
                                    <span class="topic-category">Annonces</span>
                                    <span>•</span>
                                    <span>Épinglé</span>
                                </div>
                                <p class="topic-preview">
                                    <?= htmlspecialchars($sujet['slug_form']) ?>
                                </p>
                            </div>
                        </div>
                        <div class="topic-stats">
                            <div class="topic-stats-left">
                                <div class="topic-stat">
                                    <span class="topic-stat-number">
                                        <?php
                                            // Compter le nombre de message par sujet
                                            $requ_count_rep = $pdo->prepare('SELECT COUNT(id_message) FROM message_users INNER JOIN forum ON forum.id_forum=message_users.id_forum WHERE forum.id_forum=:id_forum');
                                            $requ_count_rep->bindValue(':id_forum', $sujet['id_forum'], PDO::PARAM_INT);
                                            $nbr = $requ_count_rep->execute();
                                            $nbr = $requ_count_rep->fetchColumn();
                                            echo "<p> $nbr </p>";
                                        ?>
                                    </span>
                                    <span class="topic-stat-label">Messages</span>
                                </div>
                                <div class="topic-stat">
                                    <span class="topic-stat-number">
                                        <?php
                                            // Compter le nombre de message par sujet
                                            $requ_count_rep = $pdo->prepare('SELECT COUNT(nbr_likes) FROM message_users INNER JOIN forum ON forum.id_forum=message_users.id_forum WHERE forum.id_forum=:id_forum');
                                            $requ_count_rep->bindValue(':id_forum', $sujet['id_forum'], PDO::PARAM_INT);
                                            $nbr = $requ_count_rep->execute();
                                            $nbr = $requ_count_rep->fetchColumn();
                                            echo "<p> $nbr </p>";
                                        ?>
                                    </span>
                                    <span class="topic-stat-label">Vues</span>
                                </div>
                            </div>
                            <div class="topic-last-activity">
                                <div class="last-post-date">Crée le <?= htmlspecialchars($sujet['cree_le']) ?></div>
                                <div class="last-post-author">Par <?= htmlspecialchars($sujet['Nom_complet']) ?></div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
                <!-- Regular Topics -->
                <!-- <a href="#" class="topic-item">
                    <div class="topic-header">
                        <div class="topic-main-info">
                            <h3 class="topic-title">
                                Meilleures pratiques pour la sécurité web en 2024
                            </h3>
                            <div class="topic-meta">
                                <span class="topic-author">SecuritéWeb</span>
                                <span>•</span>
                                <span class="topic-category">Sécurité</span>
                                <span>•</span>
                                <span>Il y a 1 semaine</span>
                            </div>
                            <p class="topic-preview">
                                Avec l'évolution constante des menaces, quelles sont les pratiques de sécurité web que vous recommandez pour 2024 ?
                            </p>
                        </div>
                    </div>
                    <div class="topic-stats">
                        <div class="topic-stats-left">
                            <div class="topic-stat">
                                <span class="topic-stat-number">22</span>
                                <span class="topic-stat-label">Messages</span>
                            </div>
                            <div class="topic-stat">
                                <span class="topic-stat-number">678</span>
                                <span class="topic-stat-label">Vues</span>
                            </div>
                        </div>
                        <div class="topic-last-activity">
                            <div class="last-post-date">Il y a 2 jours</div>
                            <div class="last-post-author">par CyberExpert</div>
                        </div>
                    </div>
                </a>

                <a href="#" class="topic-item">
                    <div class="topic-header">
                        <div class="topic-main-info">
                            <h3 class="topic-title">
                                Node.js vs Python pour les APIs
                            </h3>
                            <div class="topic-meta">
                                <span class="topic-author">BackendDev</span>
                                <span>•</span>
                                <span class="topic-category">Backend</span>
                                <span>•</span>
                                <span>Il y a 2 semaines</span>
                            </div>
                            <p class="topic-preview">
                                Je dois choisir entre Node.js et Python pour développer une API. Quels sont les avantages et inconvénients de chaque solution ?
                            </p>
                        </div>
                    </div>
                    <div class="topic-stats">
                        <div class="topic-stats-left">
                            <div class="topic-stat">
                                <span class="topic-stat-number">31</span>
                                <span class="topic-stat-label">Messages</span>
                            </div>
                            <div class="topic-stat">
                                <span class="topic-stat-number">892</span>
                                <span class="topic-stat-label">Vues</span>
                            </div>
                        </div>
                        <div class="topic-last-activity">
                            <div class="last-post-date">Il y a 1 jour</div>
                            <div class="last-post-author">par NodeMaster</div>
                        </div>
                    </div>
                </a>
 -->
                <!-- <a href="#" class="topic-item">
                    <div class="topic-header">
                        <div class="topic-main-info">
                            <h3 class="topic-title">
                                Guide complet pour débuter avec Vue.js 3
                            </h3>
                            <div class="topic-meta">
                                <span class="topic-author">VueDeveloper</span>
                                <span>•</span>
                                <span class="topic-category">Vue.js</span>
                                <span>•</span>
                                <span>Il y a 3 semaines</span>
                            </div>
                            <p class="topic-preview">
                                Un guide détaillé pour tous ceux qui souhaitent commencer avec Vue.js 3. Je partage mon expérience et les ressources utiles...
                            </p>
                        </div>
                    </div>
                    <div class="topic-stats">
                        <div class="topic-stats-left">
                            <div class="topic-stat">
                                <span class="topic-stat-number">18</span>
                                <span class="topic-stat-label">Messages</span>
                            </div>
                            <div class="topic-stat">
                                <span class="topic-stat-number">543</span>
                                <span class="topic-stat-label">Vues</span>
                            </div>
                        </div>
                        <div class="topic-last-activity">
                            <div class="last-post-date">Il y a 4 jours</div>
                            <div class="last-post-author">par VueExpert</div>
                        </div>
                    </div>
                </a>

                <a href="#" class="topic-item">
                    <div class="topic-header">
                        <div class="topic-main-info">
                            <h3 class="topic-title">
                                Conseils pour optimiser le SEO d'un site web
                            </h3>
                            <div class="topic-meta">
                                <span class="topic-author">SEOSpecialist</span>
                                <span>•</span>
                                <span class="topic-category">SEO</span>
                                <span>•</span>
                                <span>Il y a 1 mois</span>
                            </div>
                            <p class="topic-preview">
                                Partageons nos meilleures techniques pour améliorer le référencement naturel. Quelles sont vos stratégies qui fonctionnent le mieux ?
                            </p>
                        </div>
                    </div>
                    <div class="topic-stats">
                        <div class="topic-stats-left">
                            <div class="topic-stat">
                                <span class="topic-stat-number">27</span>
                                <span class="topic-stat-label">Messages</span>
                            </div>
                            <div class="topic-stat">
                                <span class="topic-stat-number">734</span>
                                <span class="topic-stat-label">Vues</span>
                            </div>
                        </div>
                        <div class="topic-last-activity">
                            <div class="last-post-date">Il y a 1 semaine</div>
                            <div class="last-post-author">par MarketingPro</div>
                        </div>
                    </div>
                </a>

                <a href="#" class="topic-item">
                    <div class="topic-header">
                        <div class="topic-main-info">
                            <h3 class="topic-title">
                                Erreur 404 personnalisée avec .htaccess
                            </h3>
                            <div class="topic-meta">
                                <span class="topic-author">WebAdmin</span>
                                <span>•</span>
                                <span class="topic-category">Apache</span>
                                <span>•</span>
                                <span>Il y a 2 mois</span>
                            </div>
                            <p class="topic-preview">
                                Comment créer une page d'erreur 404 personnalisée et la configurer correctement avec .htaccess ? J'ai besoin de vos conseils...
                            </p>
                        </div>
                    </div>
                    <div class="topic-stats">
                        <div class="topic-stats-left">
                            <div class="topic-stat">
                                <span class="topic-stat-number">9</span>
                                <span class="topic-stat-label">Messages</span>
                            </div>
                            <div class="topic-stat">
                                <span class="topic-stat-number">312</span>
                                <span class="topic-stat-label">Vues</span>
                            </div>
                        </div>
                        <div class="topic-last-activity">
                            <div class="last-post-date">Il y a 1 mois</div>
                            <div class="last-post-author">par ServerPro</div>
                        </div>
                    </div>
                </a>

                <a href="#" class="topic-item">
                    <div class="topic-header">
                        <div class="topic-main-info">
                            <h3 class="topic-title">
                                Comment optimiser les performances de React ?
                            </h3>
                            <div class="topic-meta">
                                <span class="topic-author">DevReact92</span>
                                <span>•</span>
                                <span class="topic-category">React</span>
                                <span>•</span>
                                <span>Aujourd'hui à 14:32</span>
                            </div>
                            <p class="topic-preview">
                                Je travaille sur une application React et je rencontre des problèmes de performance. Quelles sont les meilleures pratiques pour optimiser...
                            </p>
                        </div>
                    </div>
                    <div class="topic-stats">
                        <div class="topic-stats-left">
                            <div class="topic-stat">
                                <span class="topic-stat-number">12</span>
                                <span class="topic-stat-label">Messages</span>
                            </div>
                            <div class="topic-stat">
                                <span class="topic-stat-number">234</span>
                                <span class="topic-stat-label">Vues</span>
                            </div>
                        </div>
                        <div class="topic-last-activity">
                            <div class="last-post-date">Il y a 3 heures</div>
                            <div class="last-post-author">par ExpertJS</div>
                        </div>
                    </div>
                </a>

                <a href="#" class="topic-item">
                    <div class="topic-header">
                        <div class="topic-main-info">
                            <h3 class="topic-title">
                                CSS Grid vs Flexbox : Quand utiliser quoi ?
                            </h3>
                            <div class="topic-meta">
                                <span class="topic-author">CSSMaster</span>
                                <span>•</span>
                                <span class="topic-category">CSS</span>
                                <span>•</span>
                                <span>Hier à 09:15</span>
                            </div>
                            <p class="topic-preview">
                                Bonjour tout le monde ! Je me pose souvent la question de savoir quand utiliser CSS Grid et quand utiliser Flexbox...
                            </p>
                        </div>
                    </div>
                    <div class="topic-stats">
                        <div class="topic-stats-left">
                            <div class="topic-stat">
                                <span class="topic-stat-number">8</span>
                                <span class="topic-stat-label">Messages</span>
                            </div>
                            <div class="topic-stat">
                                <span class="topic-stat-number">189</span>
                                <span class="topic-stat-label">Vues</span>
                            </div>
                        </div>
                        <div class="topic-last-activity">
                            <div class="last-post-date">Il y a 5 heures</div>
                            <div class="last-post-author">par LayoutPro</div>
                        </div>
                    </div>
                </a> -->

                <!-- <a href="#" class="topic-item locked">
                    <div class="topic-header">
                        <div class="topic-main-info">
                            <h3 class="topic-title">
                                <span class="topic-status-icon">🔒</span>
                                [RÉSOLU] Problème avec l'API REST
                            </h3>
                            <div class="topic-meta">
                                <span class="topic-author">APINewbie</span>
                                <span>•</span>
                                <span class="topic-category">Backend</span>
                                <span>•</span>
                                <span>Il y a 3 jours</span>
                                <span>•</span>
                                <span style="color: #ff6b6b;">Verrouillé</span>
                            </div>
                            <p class="topic-preview">
                                J'avais un problème avec mon API REST qui ne renvoyait pas les bonnes données. Problème résolu grâce à vos conseils...
                            </p>
                        </div>
                    </div>
                    <div class="topic-stats">
                        <div class="topic-stats-left">
                            <div class="topic-stat">
                                <span class="topic-stat-number">15</span>
                                <span class="topic-stat-label">Messages</span>
                            </div>
                            <div class="topic-stat">
                                <span class="topic-stat-number">456</span>
                                <span class="topic-stat-label">Vues</span>
                            </div>
                        </div>
                        <div class="topic-last-activity">
                            <div class="last-post-date">Il y a 3 jours</div>
                            <div class="last-post-author">par APINewbie</div>
                        </div>
                    </div>
                </a>

                <a href="#" class="topic-item">
                    <div class="topic-header">
                        <div class="topic-main-info">
                            <h3 class="topic-title">
                                Migration vers TypeScript : retour d'expérience
                            </h3>
                            <div class="topic-meta">
                                <span class="topic-author">TypeScriptFan</span>
                                <span>•</span>
                                <span class="topic-category">TypeScript</span>
                                <span>•</span>
                                <span>Il y a 1 semaine</span>
                            </div>
                            <p class="topic-preview">
                                Après avoir migré notre projet JavaScript vers TypeScript, voici mon retour d'expérience et les leçons apprises...
                            </p>
                        </div>
                    </div>
                    <div class="topic-stats">
                        <div class="topic-stats-left">
                            <div class="topic-stat">
                                <span class="topic-stat-number">19</span>
                                <span class="topic-stat-label">Messages</span>
                            </div>
                            <div class="topic-stat">
                                <span class="topic-stat-number">567</span>
                                <span class="topic-stat-label">Vues</span>
                            </div>
                        </div>
                        <div class="topic-last-activity">
                            <div class="last-post-date">Hier à 16:45</div>
                            <div class="last-post-author">par CodeGuru</div>
                        </div>
                    </div>
                </a>-->
            </div>

            <!-- Pagination -->
            <nav class="pagination">
                <a href="#" class="pagination-btn" disabled>‹ Précédent</a>
                <a href="#" class="pagination-btn active">1</a>
                <a href="#" class="pagination-btn">2</a>
                <a href="#" class="pagination-btn">3</a>
                <a href="#" class="pagination-btn">4</a>
                <span class="pagination-info">...</span>
                <a href="#" class="pagination-btn">12</a>
                <a href="#" class="pagination-btn">Suivant ›</a>
                <div class="pagination-info">
                    Page 1 sur 12 (247 sujets)
                </div>
            </nav>
        </main>
    </div>
        <?php 
            // include(__DIR__.'/forum_nav/forum_nav.php')
            if(!empty($_SESSION['user']['nom_complet'])){
                include(__DIR__.'/../../navbar/footer.php');
            }
        ?>
    <script>
        // Script pour la gestion des interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion du tri
            const sortSelect = document.querySelector('.sort-select');
            sortSelect.addEventListener('change', function() {
                console.log('Tri changé:', this.value);
                // Ici tu pourras ajouter la logique pour trier les sujets
            });

            // Animation des éléments au hover
            const topicItems = document.querySelectorAll('.topic-item');
            topicItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(8px)';
                });
                
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });

            // Gestion de la recherche (simulation)
            const searchBar = document.querySelector('.forum-search-bar');
            searchBar.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                if (searchTerm.length > 2) {
                    console.log('Recherche:', searchTerm);
                    // Ici tu pourras ajouter la logique de recherche
                }
            });

            // Animation du logo
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
            
            // Créer des particules occasionnellement
            setInterval(createParticle, 2000);
        });
    </script>
</body>
</html>
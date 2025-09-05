<?php
    session_start();
    include(__DIR__.'/../../login/connexion.php');
    if(isset($_GET['num'])) {
        $recupe = $pdo->prepare('SELECT * FROM documentpdf WHERE IdPDF = :idpdf');
        $idpdf = intval($_GET['num']);
        $recupe->bindValue(':idpdf', $idpdf, PDO::PARAM_INT);
        $recupe->execute();
        $data = $recupe->fetch(PDO::FETCH_OBJ);

        // Ajouter les vues des documents
        if ($data) {
            $updateViews = $pdo->prepare('UPDATE documentpdf SET document_vew = document_vew + 1, nbr_telechargement = nbr_telechargement + 1 WHERE IdPDF = :idpdf');
            $updateViews->bindValue(':idpdf', $idpdf, PDO::PARAM_INT);
            $updateViews->execute();
        }
    }else{
        echo "<script> alert('Aucun document trouvé !');</script>";
        exit();
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document - Guide de Développement Web</title>
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
            /* margin: 0 auto; */
            padding: 2rem;
            position: relative;
            z-index: 2;
            display: flex;
        }

        /* Document Image */
        .document-image-container {
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            border: 1px solid rgba(0, 255, 136, 0.2);
            width: 40%;
            align-items: center;
            margin: 0 auto;
        }

        .document-image {
             width: 100%;
            /*height: 50vh;
            object-fit: contain; */
            border-radius: 15px;
            transition: transform 0.3s ease;
            margin: 0 auto;
        }

        .document-image-container:hover .document-image {
            transform: scale(1.02);
        }

        .document-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(0, 255, 136, 0.1), rgba(0, 212, 255, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .document-image-container:hover .document-image-overlay {
            opacity: 1;
        }

        /* Document Header */
        .document-header {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
            width: 50%;
        }

        .document-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .document-header:hover::before {
            left: 100%;
        }

        .document-title {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 2rem;
            /* line-height: 1.2; */
            text-align: center;
            padding: 10px;
        }

        /* Document Stats */
        .document-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .document-stat {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 100px;
            padding: 1rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 12px;
            border: 1px solid rgba(0, 255, 136, 0.2);
            transition: all 0.3s ease;
        }

        .document-stat:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.2);
            border-color: rgba(0, 255, 136, 0.4);
        }

        .document-stat-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .document-stat-number {
            color: #00d4ff;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
        }

        .document-stat-label {
            color: #888;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        /* Document Actions */
        .document-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .action-btn {
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            border: 1px solid rgba(0, 255, 136, 0.2);
            border-radius: 10px;
            padding: 1rem 2rem;
            color: #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            font-size: 1rem;
        }

        .action-btn:hover {
            border-color: rgba(0, 255, 136, 0.4);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.2);
        }

        .action-btn.primary {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border-color: transparent;
        }

        .action-btn.primary:hover {
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.4);
        }

        .action-btn.liked {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border-color: transparent;
        }

        /* Document Description */
        .document-description {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2.5rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
            /* width: 50%; */
        }

        .document-description::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
        }

        .description-title {
            color: #00ff88;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .description-content {
            color: #e0e0e0;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .description-content p {
            margin-bottom: 1.5rem;
        }

        .description-content strong {
            color: #00d4ff;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .forum-header-content {
                padding: 0 1rem;
                flex-wrap: wrap;
                gap: 1rem;
            }

            .topic-container {
                padding: 1rem;
                display: block;
            }

            .document-header, .document-description {
                width: 100%;
            }

            .document-title {
                font-size: 2rem;
            }

            .document-stats {
                gap: 1.5rem;
            }

            .document-actions {
                flex-direction: column;
                align-items: center;
            }

            .action-btn {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }

            .document-image {
                height: 250px;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="forum-main-container">
        <!-- Header -->
        <!-- <header class="forum-header">
            <div class="forum-header-content">
                <a href="#" class="forum-logo">DocShare</a>
                <nav class="forum-nav">
                    <a href="#" class="forum-nav-link">Accueil</a>
                    <a href="#" class="forum-nav-link forum-active">Documents</a>
                    <a href="#" class="forum-nav-link">Communauté</a>
                </nav>
                <div class="forum-user-avatar">JD</div>
            </div>
        </header> -->

        <!-- Main Content -->
        <div class="topic-container">
            <!-- Document Image -->
            <div class="document-image-container">
                <img src="<?= '../../images/' . rawurlencode(basename($data->cheminimage))?>" alt="Guide de Développement Web 2024" class="document-image">
                <div class="document-image-overlay"></div>
            </div>

            <!-- Document Header -->
            <div class="document-header">
                <h1 class="document-title"><?= htmlspecialchars_decode($data->NomPDF) ?></h1>

                <!-- Document Stats -->
                <div class="document-stats">
                    <div class="document-stat">
                        <div class="document-stat-icon">❤️</div>
                        <div class="document-stat-number"><?= $data->document_likes ?></div>
                        <div class="document-stat-label">Likes</div>
                    </div>
                    <div class="document-stat">
                        <div class="document-stat-icon">👀</div>
                        <div class="document-stat-number"><?= $data->document_vew ?></div>
                        <div class="document-stat-label">Vues</div>
                    </div>
                    <div class="document-stat">
                        <div class="document-stat-icon">📚</div>
                        <div class="document-stat-number"><?= $data->document_vew ?></div>
                        <div class="document-stat-label">Lectures</div>
                    </div>
                    <div class="document-stat">
                        <div class="document-stat-icon">⬇️</div>
                        <div class="document-stat-number"><?= $data->nbr_telechargement ?></div>
                        <div class="document-stat-label">
                            Téléchargements
                        </div>
                    </div>
                </div>

                <!-- Document Actions -->
                <div class="document-actions">
                    <button class="action-btn liked" style="display:none" onclick="toggleLike()">
                        <span>❤️</span>
                        <span>Aimé</span>
                    </button>
                    <a class="action-btn primary" href="<?= '../../files/' . rawurlencode(basename($data->Contenue))?>" download>
                        <span>⬇️</span>
                        <span>Télécharger</span>
                    </a>
                    <button class="action-btn" onclick="blogSystemShareArticle()">
                        <span>📤</span>
                        <span>Partager</span>
                    </button>
                    <button class="action-btn" style="display:none" onclick="addToFavorites()">
                        <span>⭐</span>
                        <span>Favoris</span>
                    </button>
                </div>
                <!-- Document Description -->
                <div class="document-description">
                    <h2 class="description-title">
                        <span>📖</span>
                        À propos de ce document
                    </h2>
                    <div class="description-content">
                        <p>
                            Plongez dans l'univers du <strong>développement web moderne</strong> avec ce guide exhaustif qui couvre tous les aspects essentiels pour créer des applications web performantes et innovantes.
                        </p>
                        <p>
                            Ce document de <strong>250+ pages</strong> vous accompagne dans votre apprentissage depuis les fondamentaux HTML5 et CSS3 jusqu'aux frameworks JavaScript les plus avancés comme React, Vue.js et Angular. Découvrez également les dernières tendances en matière de design responsive, d'accessibilité web et d'optimisation des performances.
                        </p>
                        <p>
                            <strong>Contenu inclus :</strong> Exercices pratiques, projets concrets, bonnes pratiques de sécurité, intégration d'APIs modernes, déploiement cloud, et bien plus encore. Parfait pour les développeurs débutants comme confirmés souhaitant rester à la pointe de la technologie.
                        </p>
                        <p>
                            <strong>Mis à jour régulièrement</strong> pour refléter les évolutions constantes de l'écosystème web et les nouvelles spécifications du W3C.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // let isLiked = true;
        // let likeCount = 1247;

        // function toggleLike() {
        //     const btn = event.target.closest('.action-btn');
        //     const span = btn.querySelector('span:last-child');
            
        //     if (isLiked) {
        //         btn.classList.remove('liked');
        //         btn.classList.add('action-btn');
        //         span.textContent = 'J\'aime';
        //         likeCount--;
        //     } else {
        //         btn.classList.add('liked');
        //         span.textContent = 'Aimé';
        //         likeCount++;
        //     }
            
        //     isLiked = !isLiked;
        //     updateLikeCount();
        // }

        // function updateLikeCount() {
        //     const likeStatNumber = document.querySelector('.document-stat-number');
        //     likeStatNumber.textContent = likeCount.toLocaleString();
        // }

        function downloadDocument() {
            // Simulation du téléchargement
            alert('📥 Téléchargement du Guide de Développement Web 2024 en cours...');
        }

        function blogSystemShareArticle() {
                    if (navigator.share) {
                        navigator.share({
                            title: 'Document intéressant',
                            text: 'Découvrez ce document intéressant !',
                            url: window.location.href
                        });
                    } else {
                        navigator.clipboard.writeText(window.location.href);
                        alert('Lien copié dans le presse-papier !');
                    }
                }
        function addToFavorites() {
            // Simulation de l'ajout aux favoris
            alert('⭐ Document ajouté à vos favoris !');
        }
    </script>
</body>
</html>
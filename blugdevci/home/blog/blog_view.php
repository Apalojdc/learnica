<?php 
    include(__DIR__.'/../../login/connexion.php');
    session_start();
    if(isset($_GET['num'])){
        $article_recupe = $pdo->prepare('SELECT * FROM articles WHERE id_article = :num LIMIT 1');
        $article_recupe->bindValue(':num',htmlspecialchars($_GET['num']));
        $article_recupe->execute();
        $article = $article_recupe->fetch(PDO::FETCH_OBJ);

        //recuperation des commentaire de chaque article
        $comment_articles = $pdo->prepare('SELECT id_commentaire, content_commente, date_commente, Nom_complet FROM commentaire INNER JOIN users ON users.Id_User = commentaire.id_user_commente WHERE id_article_commente = :num ORDER BY id_article_commente DESC');
        $comment_articles->bindValue(':num',htmlspecialchars($_GET['num']));
        $comment_articles->execute();
        $commentaires = $comment_articles->fetchAll(PDO::FETCH_ASSOC);
    }

    // echo "<pre>";
    //     print_r($_SESSION['user']['id_user']);
    // echo "</pre>";
    if(isset($_POST['send'])){
        $comment_content = htmlspecialchars($_POST['comment_content']);
        $ajout_commentaire = $pdo->prepare('INSERT INTO commentaire(id_user_commente, id_article_commente,content_commente) VALUES(:id_user, :id_article, :contenu)');
        $ajout_commentaire->bindParam(':id_user', $_SESSION['user']['id_user']);
        $ajout_commentaire->bindParam(':id_article', $article->id_article);
        $ajout_commentaire->bindParam(':contenu', $comment_content);
        $succes_send = $ajout_commentaire->execute();

        if($succes_send){
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide complet : Maîtriser React 18 et ses nouvelles fonctionnalités - DevBlog</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-green: #00ff88;
            --primary-blue: #00d4ff;
            --dark-bg: #0a0a0a;
            --darker-bg: #1a1a1a;
            --card-bg: #1e1e1e;
            --card-hover: #2a2a2a;
            --text-primary: #ffffff;
            --text-secondary: #b0b0b0;
            --text-muted: #888888;
            --border-color: rgba(0, 255, 136, 0.2);
        }

        body {
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
            background: linear-gradient(135deg, var(--dark-bg) 0%, var(--darker-bg) 50%, var(--dark-bg) 100%);
            color: var(--text-primary);
            line-height: 1.7;
            min-height: 100vh;
        }

        /* Background particles effect */
        .article-container::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(0, 255, 136, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(0, 255, 136, 0.04) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }

        .article-container {
            position: relative;
            z-index: 1;
            min-height: 100vh;
        }

        /* Header */
        .blog-header {
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .blog-logo {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            animation: logoGlow 3s ease-in-out infinite alternate;
        }

        @keyframes logoGlow {
            from { filter: drop-shadow(0 0 5px rgba(0, 255, 136, 0.3)); }
            to { filter: drop-shadow(0 0 15px rgba(0, 255, 136, 0.6)); }
        }

        .blog-nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            color: var(--text-secondary);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary-green);
            background: rgba(0, 255, 136, 0.1);
            transform: translateY(-2px);
        }

        .search-container {
            position: relative;
        }

        .search-input {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 25px;
            padding: 0.7rem 1.5rem 0.7rem 3rem;
            color: var(--text-primary);
            width: 300px;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 3px rgba(0, 255, 136, 0.1);
            transform: scale(1.02);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1.1rem;
        }

        /* Main Content */
        .main-content {
            max-width: 900px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
            padding: 0.5rem 1rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 8px;
            border-left: 3px solid var(--primary-green);
        }

        .breadcrumb a {
            color: var(--primary-blue);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb a:hover {
            color: var(--primary-green);
        }

        /* Article Header */
        .article-header {
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 3rem;
            border: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }

        .article-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .article-header:hover::before {
            left: 100%;
        }

        .article-title {
            font-size: 2.8rem;
            font-weight: 900;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .article-slug {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 2rem;
            font-family: 'Courier New', monospace;
            background: rgba(0, 255, 136, 0.05);
            padding: 0.5rem 1rem;
            border-radius: 6px;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .article-meta {
            display: flex;
            gap: 2rem;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .article-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #000;
            font-weight: 700;
        }

        .author-info {
            display: flex;
            flex-direction: column;
        }

        .author-name {
            color: var(--primary-blue);
            font-weight: 600;
            font-size: 1.1rem;
        }

        .author-badge {
            background: rgba(0, 255, 136, 0.2);
            color: var(--primary-green);
            font-size: 0.75rem;
            padding: 0.2rem 0.6rem;
            border-radius: 8px;
            margin-top: 0.2rem;
            width: fit-content;
        }

        .article-date {
            color: var(--text-muted);
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .article-stats {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            margin-bottom: 2rem;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0.8rem 1.2rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 10px;
            border: 1px solid rgba(0, 255, 136, 0.1);
            min-width: 80px;
        }

        .stat-number {
            color: var(--primary-blue);
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .article-tags {
            display: flex;
            gap: 0.8rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .tag {
            background: rgba(0, 255, 136, 0.1);
            color: var(--primary-green);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            border: 1px solid rgba(0, 255, 136, 0.2);
            transition: all 0.3s ease;
        }

        .tag:hover {
            background: rgba(0, 255, 136, 0.2);
            transform: translateY(-2px);
        }

        /* Like Button */
        .article-like {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .like-btn {
            background: linear-gradient(145deg, var(--card-hover), var(--card-bg));
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1rem 2rem;
            color: var(--text-primary);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-weight: 600;
            font-size: 1rem;
        }

        .like-btn:hover {
            border-color: rgba(0, 255, 136, 0.4);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.2);
        }

        .like-btn.liked {
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            color: #000;
            border-color: transparent;
        }

        .like-count {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        /* Article Content */
        .article-content {
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 4rem;
            border: 1px solid var(--border-color);
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .article-content h1,
        .article-content h2,
        .article-content h3,
        .article-content h4 {
            color: var(--primary-green);
            margin: 2.5rem 0 1.5rem 0;
            font-weight: 700;
        }

        .article-content h1 { font-size: 2rem; }
        .article-content h2 { font-size: 1.7rem; }
        .article-content h3 { font-size: 1.4rem; }
        .article-content h4 { font-size: 1.2rem; }

        .article-content p {
            margin-bottom: 1.8rem;
            color: var(--text-secondary);
        }

        .article-content ul,
        .article-content ol {
            margin: 1.5rem 0 1.8rem 2rem;
            color: var(--text-secondary);
        }

        .article-content li {
            margin-bottom: 0.8rem;
        }

        .article-content blockquote {
            background: rgba(0, 255, 136, 0.05);
            border-left: 4px solid var(--primary-green);
            padding: 1.5rem 2rem;
            margin: 2rem 0;
            border-radius: 0 8px 8px 0;
            font-style: italic;
            color: var(--text-primary);
        }

        .article-content code {
            background: #0a0a0a;
            border: 1px solid rgba(0, 255, 136, 0.2);
            border-radius: 4px;
            padding: 0.3rem 0.6rem;
            font-family: 'Courier New', monospace;
            color: var(--primary-blue);
            font-size: 0.95rem;
        }

        .article-content pre {
            background: #0a0a0a;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 2rem;
            overflow-x: auto;
            margin: 2rem 0;
            position: relative;
        }

        .article-content pre code {
            background: none;
            border: none;
            padding: 0;
            color: var(--text-primary);
        }

        .article-content img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 2rem 0;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
        }

        /* Comments Section */
        .comments-section {
            margin-top: 4rem;
        }

        .comments-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--border-color);
        }

        .comments-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-green);
        }

        .comments-count {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        /* Add Comment Form */
        .add-comment-form {
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 3rem;
            border: 1px solid var(--border-color);
        }

        .form-title {
            color: var(--primary-green);
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .comment-textarea {
            width: 100%;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1.5rem;
            color: var(--text-primary);
            resize: vertical;
            min-height: 120px;
            font-family: inherit;
            margin-bottom: 1.5rem;
            font-size: 1rem;
            line-height: 1.6;
        }

        .comment-textarea:focus {
            outline: none;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 3px rgba(0, 255, 136, 0.1);
        }

        .comment-textarea::placeholder {
            color: var(--text-muted);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        .btn-submit {
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            color: #000;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.3);
        }

        /* Comments List */
        .comments-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .comment-item {
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            border-radius: 15px;
            padding: 2rem;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            position: relative;
        }

        .comment-item:hover {
            border-color: rgba(0, 255, 136, 0.3);
            transform: translateX(5px);
            box-shadow: 0 8px 30px rgba(0, 255, 136, 0.1);
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .comment-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .comment-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #000;
            font-size: 1rem;
        }

        .comment-author-info {
            display: flex;
            flex-direction: column;
        }

        .comment-author-name {
            color: var(--primary-blue);
            font-weight: 600;
            font-size: 1rem;
        }

        .comment-author-badge {
            background: rgba(0, 255, 136, 0.2);
            color: var(--primary-green);
            font-size: 0.7rem;
            padding: 0.2rem 0.5rem;
            border-radius: 6px;
            margin-top: 0.2rem;
            width: fit-content;
        }

        .comment-date {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .comment-content {
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }

        .comment-content p {
            margin-bottom: 1rem;
        }

        .comment-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid rgba(0, 255, 136, 0.1);
        }

        .comment-like {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .comment-like-btn {
            background: rgba(0, 255, 136, 0.05);
            border: 1px solid rgba(0, 255, 136, 0.2);
            border-radius: 8px;
            padding: 0.6rem 1.2rem;
            color: var(--text-primary);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .comment-like-btn:hover {
            background: rgba(0, 255, 136, 0.1);
            border-color: rgba(0, 255, 136, 0.4);
            transform: translateY(-2px);
        }

        .comment-like-btn.liked {
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            color: #000;
            border-color: transparent;
        }

        .comment-like-count {
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
                padding: 0 1rem;
            }

            .search-input {
                width: 100%;
            }

            .main-content {
                padding: 1rem;
            }

            .article-title {
                font-size: 2.2rem;
            }

            .article-header {
                padding: 2rem;
            }

            .article-content {
                padding: 2rem;
            }

            .article-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .article-stats {
                justify-content: center;
                flex-wrap: wrap;
            }

            .comment-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .comment-actions {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .comment-item {
            animation: fadeInUp 0.6s ease forwards;
        }

        .comment-item:nth-child(2) { animation-delay: 0.1s; }
        .comment-item:nth-child(3) { animation-delay: 0.2s; }
        .comment-item:nth-child(4) { animation-delay: 0.3s; }
        .comment-item:nth-child(5) { animation-delay: 0.4s; }
    </style>
</head>
<body>
    <div class="article-container">
        <!-- Header -->
        <header class="blog-header">
            <div class="header-content">
                <a href="#" class="blog-logo">DevBlog</a>
                <nav class="blog-nav">
                    <a href="#" class="nav-link">Accueil</a>
                    <a href="#" class="nav-link active">Articles</a>
                    <a href="#" class="nav-link">Catégories</a>
                    <a href="#" class="nav-link">À propos</a>
                    <a href="#" class="nav-link">Contact</a>
                </nav>
                <div class="search-container">
                    <span class="search-icon">🔍</span>
                    <input type="text" class="search-input" placeholder="Rechercher...">
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Breadcrumb -->
            <nav class="breadcrumb">
                <a href="#">Accueil</a>
                <span>›</span>
                <a href="#">Articles</a>
                <span>›</span>
                <a href="#">React</a>
                <span>›</span>
                <span>Guide complet : Maîtriser React 18</span>
            </nav>

            <!-- Article Header -->
            <header class="article-header">
                <h1 class="article-title"><?= htmlspecialchars($article->titre_article) ?></h1>
                
                <div class="article-slug">
                    URL: /articles/guide-complet-maitriser-react-18-nouvelles-fonctionnalites
                </div>

                <div class="article-meta">
                    <div class="article-author">
                        <div class="author-avatar">AL</div>
                        <div class="author-info">
                            <div class="author-name">Alexandre Dubois</div>
                            <div class="author-badge">Expert React</div>
                        </div>
                    </div>
                    <div class="article-date">
                        <span>📅</span>
                        <span>Publié le <?= htmlspecialchars($article->date_ajoute) ?></span>
                    </div>
                </div>

                <div class="article-stats">
                    <div class="stat-item">
                        <span class="stat-number"><?= htmlspecialchars($article->article_view) ?>k</span>
                        <span class="stat-label">Vues</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">12</span>
                        <span class="stat-label">Min de lecture</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">18</span>
                        <span class="stat-label">Commentaires</span>
                    </div>
                </div>

                <div class="article-tags">
                    <span class="tag">React</span>
                    <span class="tag">JavaScript</span>
                    <span class="tag">Frontend</span>
                    <span class="tag">Tutorial</span>
                    <span class="tag">React 18</span>
                </div>

                <div class="article-like">
                    <button class="like-btn" onclick="toggleArticleLike(this)">
                        <span>❤️</span>
                        <span>J'aime</span>
                        <span class="like-count-text">127</span>
                    </button>
                    <div class="like-count">127 personnes ont aimé cet article</div>
                </div>
            </header>

            <!-- Article Content -->
            <article class="article-content">
                <div class="contenue">
                    <pre>
                        <?= htmlspecialchars($article->contenue_doc) ?>
                    </pre>
                </div>
            </article>

            <!-- Comments Section -->
            <section class="comments-section">
                <div class="comments-header">
                    <div>
                        <h2 class="comments-title">💬 Commentaires</h2>
                        <div class="comments-count">18 commentaires</div>
                    </div>
                </div>

                <!-- Add Comment Form -->
                <div class="add-comment-form">
                    <h3 class="form-title">
                        ✍️ Ajouter un commentaire
                    </h3>
                   
                    <form action="#" method="POST">
                        <textarea class="comment-textarea" name="comment_content" placeholder="Partagez votre opinion, votre expérience ou posez une question sur cet article..." required></textarea>
                        <div class="form-actions">
                            <button type="submit" class="btn-submit" name="send">
                                📤 Commenter
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Comments List -->
                <?php foreach($commentaires as $commentaire): ?>
                    <div class="comments-list">
                        <!-- Comment 1 -->
                        <div class="comment-item">
                            <div class="comment-header">
                                <div class="comment-author">
                                    <div class="comment-avatar">JS</div>
                                    <div class="comment-author-info">
                                        <div class="comment-author-name"><?= htmlspecialchars($commentaire['Nom_complet']) ?></div>
                                        <div class="comment-author-badge">Développeur Senior</div>
                                    </div>
                                </div>
                                <div class="comment-date">commenté le <?= htmlspecialchars($commentaire['date_commente']) ?></div>
                            </div>
                            <div class="comment-content">
                                <p><?= htmlspecialchars($commentaire['content_commente']) ?></p>
                            </div>
                            <div class="comment-actions">
                                <div class="comment-like">
                                    <button class="comment-like-btn liked" onclick="toggleCommentLike(this)">
                                        <span>❤️</span>
                                        <span>12</span>
                                    </button>
                                    <div class="comment-like-count">12 personnes ont aimé</div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endforeach ?>
            </section>
        </main>
    </div>

    <script>
        // Script purement visuel - animations et interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Animation du logo
            const logo = document.querySelector('.blog-logo');
            setInterval(() => {
                logo.style.transform = 'scale(1.02)';
                setTimeout(() => {
                    logo.style.transform = 'scale(1)';
                }, 200);
            }, 5000);

            // Effet de particules
            function createParticle() {
                const particle = document.createElement('div');
                particle.style.cssText = `
                    position: fixed;
                    width: 3px;
                    height: 3px;
                    background: rgba(0, 255, 136, 0.4);
                    border-radius: 50%;
                    pointer-events: none;
                    left: ${Math.random() * window.innerWidth}px;
                    top: ${window.innerHeight + 10}px;
                    z-index: 0;
                `;
                
                document.body.appendChild(particle);
                
                const animation = particle.animate([
                    { transform: 'translateY(0) translateX(0)', opacity: 0 },
                    { transform: 'translateY(-150px) translateX(' + (Math.random() * 100 - 50) + 'px)', opacity: 1 },
                    { transform: 'translateY(-' + (window.innerHeight + 200) + 'px) translateX(' + (Math.random() * 200 - 100) + 'px)', opacity: 0 }
                ], {
                    duration: 8000 + Math.random() * 4000,
                    easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)'
                });
                
                animation.onfinish = () => particle.remove();
            }
            
            setInterval(createParticle, 3000);

            // Animation au scroll pour les commentaires
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.comment-item').forEach(comment => {
                comment.style.opacity = '0';
                comment.style.transform = 'translateY(30px)';
                comment.style.transition = 'all 0.6s ease';
                observer.observe(comment);
            });
        });

        // Fonctions pour les interactions (à connecter avec PHP)
        function toggleArticleLike(button) {
            // Animation visuelle
            const isLiked = button.classList.contains('liked');
            
            if (isLiked) {
                button.classList.remove('liked');
                // Décrémenter le compte
                const countElement = button.querySelector('.like-count-text');
                const currentCount = parseInt(countElement.textContent);
                countElement.textContent = currentCount - 1;
            } else {
                button.classList.add('liked');
                // Incrémenter le compte
                const countElement = button.querySelector('.like-count-text');
                const currentCount = parseInt(countElement.textContent);
                countElement.textContent = currentCount + 1;
            }
            
            // Ici tu ajouteras l'appel AJAX vers ton PHP
            console.log(`Article ${isLiked ? 'unliked' : 'liked'}`);
        }

        function toggleCommentLike(button) {
            // Animation visuelle
            const isLiked = button.classList.contains('liked');
            
            if (isLiked) {
                button.classList.remove('liked');
                // Décrémenter le nombre
                const countElement = button.querySelector('span:last-child');
                const currentCount = parseInt(countElement.textContent);
                countElement.textContent = currentCount - 1;
            } else {
                button.classList.add('liked');
                // Incrémenter le nombre
                const countElement = button.querySelector('span:last-child');
                const currentCount = parseInt(countElement.textContent);
                countElement.textContent = currentCount + 1;
            }
            
            // Ici tu ajouteras l'appel AJAX vers ton PHP
            console.log(`Comment ${isLiked ? 'unliked' : 'liked'}`);
        }
    </script>
</body>
</html>
<?php
session_start();
    include(__DIR__.'/../../login/connexion.php');
    $articles_recupe = $pdo->prepare('SELECT * FROM articles ORDER BY id_article DESC');
    $articles_recupe->execute();
    $articles = $articles_recupe->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevBlog - Partage d'expériences en développement</title>
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
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Background particles effect */
        .blog-container::before {
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

        .blog-container {
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
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            position: relative;
        }

        .blog-logo::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            transition: width 0.3s ease;
        }

        .blog-logo:hover::after {
            width: 100%;
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
            position: relative;
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

        /* Hero Section */
        .hero-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 2rem;
            text-align: center;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto 2rem auto;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 2rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-blue);
            display: block;
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 3rem;
            margin-bottom: 4rem;
        }

        /* Articles Grid */
        .articles-section {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            border-radius: 2px;
        }

        .featured-article {
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            transition: all 0.4s ease;
            position: relative;
            margin-bottom: 3rem;
        }

        .featured-article::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .featured-article:hover::before {
            left: 100%;
        }

        .featured-article:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 255, 136, 0.15);
            border-color: rgba(0, 255, 136, 0.4);
        }

        .featured-image {
            width: 100%;
            height: 300px;
            background: linear-gradient(135deg, var(--primary-green), var(--primary-blue));
            position: relative;
            overflow: hidden;
        }

        .featured-image::after {
            content: '🚀';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 4rem;
            opacity: 0.8;
        }

        .featured-content {
            padding: 2rem;
        }

        .featured-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .featured-excerpt {
            color: var(--text-secondary);
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .article-meta {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .article-tags {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .tag {
            background: rgba(0, 255, 136, 0.1);
            color: var(--primary-green);
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
            border: 1px solid rgba(0, 255, 136, 0.2);
        }

        .read-more-btn {
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            color: #000;
            padding: 1rem 2rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .read-more-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 255, 136, 0.3);
        }

        /* Regular Articles Grid */
        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .article-card {
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            position: relative;
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 255, 136, 0.1);
            border-color: rgba(0, 255, 136, 0.3);
        }

        .article-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #2a2a2a, #3a3a3a);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            overflow: hidden;
        }

        .article-content {
            padding: 1.5rem;
        }

        .article-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.8rem;
            line-height: 1.4;
        }

        .article-excerpt {
            color: var(--text-secondary);
            font-size: 0.95rem;
            margin-bottom: 1rem;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid rgba(0, 255, 136, 0.1);
        }

        .read-article-btn {
            background: rgba(0, 255, 136, 0.1);
            color: var(--primary-green);
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 255, 136, 0.2);
        }

        .read-article-btn:hover {
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            color: #000;
            transform: translateY(-2px);
        }

        /* Sidebar */
        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .sidebar-widget {
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            border-radius: 15px;
            padding: 1.5rem;
            border: 1px solid var(--border-color);
        }

        .widget-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid rgba(0, 255, 136, 0.2);
        }

        .category-list {
            list-style: none;
        }

        .category-item {
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(0, 255, 136, 0.1);
        }

        .category-item:last-child {
            border-bottom: none;
        }

        .category-link {
            color: var(--text-secondary);
            text-decoration: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: color 0.3s ease;
        }

        .category-link:hover {
            color: var(--primary-green);
        }

        .category-count {
            background: rgba(0, 255, 136, 0.1);
            color: var(--primary-green);
            padding: 0.2rem 0.6rem;
            border-radius: 10px;
            font-size: 0.8rem;
        }

        .recent-posts {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .recent-post {
            display: flex;
            gap: 1rem;
            padding: 0.8rem;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .recent-post:hover {
            background: rgba(0, 255, 136, 0.05);
        }

        .recent-post-image {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-green), var(--primary-blue));
            border-radius: 8px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .recent-post-content {
            flex: 1;
        }

        .recent-post-title {
            color: var(--text-primary);
            font-size: 0.9rem;
            font-weight: 500;
            line-height: 1.3;
            margin-bottom: 0.3rem;
        }

        .recent-post-date {
            color: var(--text-muted);
            font-size: 0.8rem;
        }

        /* Newsletter */
        .newsletter-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .newsletter-input {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0.8rem;
            color: var(--text-primary);
            transition: all 0.3s ease;
        }

        .newsletter-input:focus {
            outline: none;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 2px rgba(0, 255, 136, 0.1);
        }

        .newsletter-btn {
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            color: #000;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .newsletter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 255, 136, 0.3);
        }

        /* Footer */
        .blog-footer {
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            border-top: 1px solid var(--border-color);
            padding: 3rem 0 2rem 0;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            text-align: center;
        }

        .footer-text {
            color: var(--text-muted);
            margin-bottom: 1rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .social-link {
            background: rgba(0, 255, 136, 0.1);
            color: var(--primary-green);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }

        .social-link:hover {
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            color: #000;
            transform: translateY(-3px);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .main-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .sidebar {
                grid-row: 1;
            }
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
                padding: 0 1rem;
            }

            .search-input {
                width: 100%;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-stats {
                flex-direction: column;
                gap: 1.5rem;
            }

            .main-content {
                padding: 0 1rem;
            }

            .articles-grid {
                grid-template-columns: 1fr;
            }

            .sidebar {
                order: -1;
            }
        }

        /* Loading animation */
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

        .article-card, .featured-article {
            animation: fadeInUp 0.6s ease forwards;
        }

        .article-card:nth-child(2) { animation-delay: 0.1s; }
        .article-card:nth-child(3) { animation-delay: 0.2s; }
        .article-card:nth-child(4) { animation-delay: 0.3s; }
        .article-card:nth-child(5) { animation-delay: 0.4s; }
        .article-card:nth-child(6) { animation-delay: 0.5s; }
    </style>
</head>
<body>
    <div class="blog-container">
        <!-- Header -->
        <?php 
            // include(__DIR__.'/forum_nav/forum_nav.php')
        
            if(empty($_SESSION['user']['nom_complet'])){
                include(__DIR__.'/../../navbar/NavBarIndex.php');
            }else{
                include(__DIR__.'/../../navbar/NavBarAcceuil.php');
            }
        ?>

        <!-- Hero Section -->
        <section class="hero-section">
            <h1 class="hero-title">Code, Learn, Share</h1>
            <p class="hero-subtitle">
                Explorez le monde du développement web à travers mes expériences, tutoriels et découvertes. 
                Du frontend au backend, partageons notre passion pour le code ! 🚀
            </p>
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">127</span>
                    <span class="stat-label">Articles</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">15K</span>
                    <span class="stat-label">Lecteurs</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">3.2K</span>
                    <span class="stat-label">Followers</span>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <main class="main-content">
            <div class="articles-section">
                <!-- Featured Article -->
                <?php 
                    $article_recupe = $pdo->prepare('SELECT * FROM articles LIMIT 1');
                    $article_recupe->execute();
                    $article = $article_recupe->fetch(PDO::FETCH_OBJ);
                ?>
                <article class="featured-article">
                    <div class="featured-image"></div>
                    <div class="featured-content">
                        <h2 class="featured-title"><?= htmlspecialchars($article->titre_article) ?></h2>
                        <div class="article-meta">
                            <div class="meta-item">
                                <span>📅</span>
                                <span><?=$article->date_ajoute ?></span>
                            </div>
                            <div class="meta-item">
                                <span>⏱️</span>
                                <span>12 min de lecture</span>
                            </div>
                            <div class="meta-item">
                                <span>👁️</span>
                                <span><?= $article->article_view ?>k vues</span>
                            </div>
                        </div>
                        <div class="article-tags">
                            <span class="tag">React</span>
                            <span class="tag">JavaScript</span>
                            <span class="tag">Frontend</span>
                            <span class="tag">Tutorial</span>
                        </div>
                        <p class="featured-excerpt">
                            <?= htmlspecialchars($article->courte_description) ?>
                        </p>
                        <a href="/monblug/home/blogs/blog_view_page?num=<?= htmlspecialchars($article->id_article) ?>" class="read-more-btn">
                            📖 Lire l'article complet
                            <span>→</span>
                        </a>
                    </div>
                </article>

                <!-- Articles Section -->
                <h2 class="section-title">📚 Derniers Articles</h2>
                <div class="articles-grid">
                    <?php foreach($articles as $mon_article): ?>
                    <article class="article-card">
                        <div class="article-image">💻</div>
                        <div class="article-content">
                            <h3 class="article-title"><?= htmlspecialchars($mon_article['titre_article']) ?></h3>
                            <div class="article-meta">
                                <div class="meta-item">
                                    <span>📅</span>
                                    <span><?= htmlspecialchars($mon_article['date_ajoute']) ?></span>
                                </div>
                                <div class="meta-item">
                                    <span>⏱️</span>
                                    <span>8 min</span>
                                </div>
                            </div>
                            <div class="article-tags">
                                <span class="tag">Next.js</span>
                                <span class="tag">Performance</span>
                            </div>
                            <p class="article-excerpt">
                                <?= htmlspecialchars($mon_article['courte_description']) ?>
                            </p>
                            <div class="article-footer">
                                <span style="color: var(--text-muted); font-size: 0.8rem;"><?= htmlspecialchars($mon_article['article_view']) ?> vues</span>
                                <a href="/monblug/home/blogs/blog_view_page?num=<?= htmlspecialchars($mon_article['id_article']) ?>" class="read-article-btn">Lire l'article</a>
                            </div>
                        </div>
                    </article>
                    <?php endforeach ?>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="sidebar">
                <!-- Categories -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">📂 Catégories</h3>
                    <ul class="category-list">
                        <li class="category-item">
                            <a href="#" class="category-link">
                                <span>React & Frontend</span>
                                <span class="category-count">28</span>
                            </a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-link">
                                <span>Node.js & Backend</span>
                                <span class="category-count">22</span>
                            </a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-link">
                                <span>Base de données</span>
                                <span class="category-count">15</span>
                            </a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-link">
                                <span>TypeScript</span>
                                <span class="category-count">18</span>
                            </a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-link">
                                <span>DevOps</span>
                                <span class="category-count">12</span>
                            </a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-link">
                                <span>CSS & Design</span>
                                <span class="category-count">20</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Recent Posts -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">🔥 Articles populaires</h3>
                    <div class="recent-posts">
                        <div class="recent-post">
                            <div class="recent-post-image">⚡</div>
                            <div class="recent-post-content">
                                <div class="recent-post-title">Les hooks React que vous devez connaître</div>
                                <div class="recent-post-date">28 décembre 2024</div>
                            </div>
                        </div>
                        <div class="recent-post">
                            <div class="recent-post-image">🎨</div>
                            <div class="recent-post-content">
                                <div class="recent-post-title">Créer des animations CSS fluides</div>
                                <div class="recent-post-date">25 décembre 2024</div>
                            </div>
                        </div>
                        <div class="recent-post">
                            <div class="recent-post-image">🔧</div>
                            <div class="recent-post-content">
                                <div class="recent-post-title">Webpack vs Vite : Le match</div>
                                <div class="recent-post-date">22 décembre 2024</div>
                            </div>
                        </div>
                        <div class="recent-post">
                            <div class="recent-post-image">📱</div>
                            <div class="recent-post-content">
                                <div class="recent-post-title">Progressive Web Apps en 2025</div>
                                <div class="recent-post-date">20 décembre 2024</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">📧 Newsletter</h3>
                    <p style="color: var(--text-secondary); margin-bottom: 1rem; font-size: 0.9rem;">
                        Recevez les derniers articles et tips directement dans votre boîte mail !
                    </p>
                    <form class="newsletter-form">
                        <input type="email" class="newsletter-input" placeholder="Votre email...">
                        <button type="submit" class="newsletter-btn">S'abonner</button>
                    </form>
                </div>
            </aside>
        </main>

         <?php
            if(!empty($_SESSION['user'])){
                include(__DIR__.'/../../navbar/footer.php');
            }
        ?>
    </div>

    <script>
        // Script pour les animations et interactions visuelles
        document.addEventListener('DOMContentLoaded', function() {
            // Animation au scroll
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

            // Observer tous les articles
            document.querySelectorAll('.article-card, .featured-article').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'all 0.6s ease';
                observer.observe(card);
            });

            // Effet de recherche
            const searchInput = document.querySelector('.search-input');
            searchInput.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });

            searchInput.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });

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
                    { 
                        transform: 'translateY(0) translateX(0) scale(1)', 
                        opacity: 0 
                    },
                    { 
                        transform: 'translateY(-150px) translateX(' + (Math.random() * 100 - 50) + 'px) scale(1.2)', 
                        opacity: 1 
                    },
                    { 
                        transform: 'translateY(-' + (window.innerHeight + 200) + 'px) translateX(' + (Math.random() * 200 - 100) + 'px) scale(0.8)', 
                        opacity: 0 
                    }
                ], {
                    duration: 8000 + Math.random() * 4000,
                    easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)'
                });
                
                animation.onfinish = () => particle.remove();
            }
            
            // Créer des particules occasionnellement
            setInterval(createParticle, 3000);

            // Animation des stats au scroll
            const statsSection = document.querySelector('.hero-stats');
            if (statsSection) {
                const statsObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const numbers = entry.target.querySelectorAll('.stat-number');
                            numbers.forEach(number => {
                                const finalValue = parseInt(number.textContent.replace(/[^0-9]/g, ''));
                                let currentValue = 0;
                                const increment = finalValue / 50;
                                
                                const timer = setInterval(() => {
                                    currentValue += increment;
                                    if (currentValue >= finalValue) {
                                        currentValue = finalValue;
                                        clearInterval(timer);
                                    }
                                    
                                    if (finalValue >= 1000) {
                                        number.textContent = (currentValue / 1000).toFixed(1) + 'K';
                                    } else {
                                        number.textContent = Math.floor(currentValue);
                                    }
                                }, 20);
                            });
                            statsObserver.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.5 });
                
                statsObserver.observe(statsSection);
            }

            // Smooth hover effects pour les cartes d'articles
            document.querySelectorAll('.article-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>
</body>
</html>
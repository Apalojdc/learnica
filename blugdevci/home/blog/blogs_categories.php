<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégorie React - Articles et Tutoriels - DevBlog</title>
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
        .category-container::before {
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

        .category-container {
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 3rem;
        }

        /* Breadcrumb */
        .breadcrumb {
            grid-column: 1 / -1;
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

        /* Category Header */
        .category-header {
            grid-column: 1 / -1;
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 3rem;
            border: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .category-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .category-header:hover::before {
            left: 100%;
        }

        .category-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin: 0 auto 2rem auto;
            box-shadow: 0 10px 30px rgba(0, 255, 136, 0.3);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .category-title {
            font-size: 3rem;
            font-weight: 900;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .category-description {
            color: var(--text-secondary);
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto 2rem auto;
            line-height: 1.6;
        }

        .category-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 2rem;
        }

        .stat-item {
            text-align: center;
            padding: 1rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 10px;
            border: 1px solid var(--border-color);
            min-width: 120px;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-blue);
            display: block;
            margin-bottom: 0.3rem;
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Content Area */
        .content-area {
            display: flex;
            flex-direction: column;
        }

        /* Filter & Sort */
        .filter-section {
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .filter-title {
            color: var(--primary-green);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-controls {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-select {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0.7rem 1rem;
            color: var(--text-primary);
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 2px rgba(0, 255, 136, 0.1);
        }

        .view-toggle {
            display: flex;
            gap: 0.5rem;
        }

        .view-btn {
            background: rgba(0, 255, 136, 0.1);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 0.5rem;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .view-btn.active {
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            color: #000;
            border-color: transparent;
        }

        .view-btn:hover {
            color: var(--primary-green);
        }

        /* Articles Grid */
        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .articles-grid.list-view {
            grid-template-columns: 1fr;
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
            box-shadow: 0 15px 30px rgba(0, 255, 136, 0.15);
            border-color: rgba(0, 255, 136, 0.3);
        }

        .articles-grid.list-view .article-card {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 0;
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

        .articles-grid.list-view .article-image {
            height: 100%;
            width: 250px;
        }

        .article-content {
            padding: 1.5rem;
        }

        .article-meta {
            display: flex;
            gap: 1rem;
            align-items: center;
            margin-bottom: 0.8rem;
            font-size: 0.85rem;
            color: var(--text-muted);
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .article-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.8rem;
            line-height: 1.4;
            transition: color 0.3s ease;
        }

        .article-card:hover .article-title {
            color: var(--primary-green);
        }

        .article-excerpt {
            color: var(--text-secondary);
            font-size: 0.95rem;
            margin-bottom: 1.2rem;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-tags {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1.2rem;
            flex-wrap: wrap;
        }

        .tag {
            background: rgba(0, 255, 136, 0.1);
            color: var(--primary-green);
            padding: 0.3rem 0.7rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid rgba(0, 255, 136, 0.2);
        }

        .article-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid rgba(0, 255, 136, 0.1);
        }

        .article-stats {
            display: flex;
            gap: 1rem;
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .stat {
            display: flex;
            align-items: center;
            gap: 0.3rem;
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
            display: flex;
            align-items: center;
            gap: 0.5rem;
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
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .category-list {
            list-style: none;
        }

        .category-item {
            padding: 0.7rem 0;
            border-bottom: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
        }

        .category-item:last-child {
            border-bottom: none;
        }

        .category-item:hover {
            background: rgba(0, 255, 136, 0.05);
            border-radius: 6px;
            padding-left: 0.5rem;
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

        .category-link.current {
            color: var(--primary-green);
            font-weight: 600;
        }

        .category-count {
            background: rgba(0, 255, 136, 0.1);
            color: var(--primary-green);
            padding: 0.2rem 0.6rem;
            border-radius: 10px;
            font-size: 0.8rem;
        }

        .tag-cloud {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .tag-cloud .tag {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .tag-cloud .tag:hover {
            background: rgba(0, 255, 136, 0.2);
            transform: translateY(-2px);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin-top: 3rem;
            grid-column: 1 / -1;
        }

        .pagination-btn {
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            border: 1px solid var(--border-color);
            color: var(--text-primary);
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
            color: var(--text-primary);
            text-decoration: none;
        }

        .pagination-btn.active {
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            color: #000;
            border-color: transparent;
        }

        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .pagination-info {
            color: var(--text-muted);
            margin: 0 1rem;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .main-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .sidebar {
                order: -1;
            }

            .category-stats {
                flex-direction: column;
                gap: 1rem;
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

            .main-content {
                padding: 1rem;
            }

            .category-title {
                font-size: 2.2rem;
            }

            .category-header {
                padding: 2rem;
            }

            .articles-grid {
                grid-template-columns: 1fr;
            }

            .articles-grid.list-view .article-card {
                grid-template-columns: 1fr;
            }

            .articles-grid.list-view .article-image {
                width: 100%;
                height: 200px;
            }

            .filter-section {
                flex-direction: column;
                align-items: flex-start;
            }

            .filter-controls {
                width: 100%;
                justify-content: space-between;
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

        .article-card {
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
    <div class="category-container">
        <!-- Header -->
        <header class="blog-header">
            <div class="header-content">
                <a href="#" class="blog-logo">DevBlog</a>
                <nav class="blog-nav">
                    <a href="#" class="nav-link">Accueil</a>
                    <a href="#" class="nav-link">Articles</a>
                    <a href="#" class="nav-link active">Catégories</a>
                    <a href="#" class="nav-link">À propos</a>
                    <a href="#" class="nav-link">Contact</a>
                </nav>
                <div class="search-container">
                    <span class="search-icon">🔍</span>
                    <input type="text" class="search-input" placeholder="Rechercher dans React...">
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Breadcrumb -->
            <nav class="breadcrumb">
                <a href="#">Accueil</a>
                <span>›</span>
                <a href="#">Catégories</a>
                <span>›</span>
                <span>React</span>
            </nav>

            <!-- Category Header -->
            <section class="category-header">
                <div class="category-icon">⚛️</div>
                <h1 class="category-title">React</h1>
                <p class="category-description">
                    Découvrez tous les articles sur React : tutoriels, astuces, bonnes pratiques et nouveautés. 
                    De React 16 à React 18, explorez l'écosystème complet de cette librairie incontournable du développement frontend.
                </p>
                <div class="category-stats">
                    <div class="stat-item">
                        <span class="stat-number">42</span>
                        <span class="stat-label">Articles</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">15K</span>
                        <span class="stat-label">Vues totales</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">850</span>
                        <span class="stat-label">Likes</span>
                    </div>
                </div>
            </section>

            <!-- Content Area -->
            <div class="content-area">
                <!-- Filter Section -->
                <div class="filter-section">
                    <div class="filter-title">
                        🔧 Filtres et tri
                    </div>
                    <div class="filter-controls">
                        <select class="filter-select">
                            <option>Plus récents</option>
                            <option>Plus populaires</option>
                            <option>Plus commentés</option>
                            <option>Alphabétique</option>
                        </select>
                        <select class="filter-select">
                            <option>Tous les niveaux</option>
                            <option>Débutant</option>
                            <option>Intermédiaire</option>
                            <option>Avancé</option>
                        </select>
                        <div class="view-toggle">
                            <button class="view-btn active" onclick="toggleView('grid')" title="Vue grille">📊</button>
                            <button class="view-btn" onclick="toggleView('list')" title="Vue liste">📋</button>
                        </div>
                    </div>
                </div>

                <!-- Articles Grid -->
                <div class="articles-grid" id="articlesGrid">
                    <!-- Article 1 -->
                    <article class="article-card">
                        <div class="article-image">⚛️</div>
                        <div class="article-content">
                            <div class="article-meta">
                                <div class="meta-item">
                                    <span>📅</span>
                                    <span>15 jan 2025</span>
                                </div>
                                <div class="meta-item">
                                    <span>⏱️</span>
                                    <span>12 min</span>
                                </div>
                                <div class="meta-item">
                                    <span>💬</span>
                                    <span>18 commentaires</span>
                                </div>
                            </div>
                            <h3 class="article-title">Guide complet : Maîtriser React 18 et ses nouvelles fonctionnalités</h3>
                            <p class="article-excerpt">
                                Découvrez en profondeur React 18 et ses révolutions : Concurrent Features, Automatic Batching, Suspense for Data Fetching, et bien plus encore...
                            </p>
                            <div class="article-tags">
                                <span class="tag">React 18</span>
                                <span class="tag">Concurrent</span>
                                <span class="tag">Tutorial</span>
                            </div>
                            <div class="article-footer">
                                <div class="article-stats">
                                    <div class="stat">
                                        <span>👁️</span>
                                        <span>2.4k</span>
                                    </div>
                                    <div class="stat">
                                        <span>❤️</span>
                                        <span>127</span>
                                    </div>
                                </div>
                                <a href="#" class="read-article-btn">
                                    📖 Lire l'article
                                    <span>→</span>
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- Article 2 -->
                    <article class="article-card">
                        <div class="article-image">🎣</div>
                        <div class="article-content">
                            <div class="article-meta">
                                <div class="meta-item">
                                    <span>📅</span>
                                    <span>12 jan 2025</span>
                                </div>
                                <div class="meta-item">
                                    <span>⏱️</span>
                                    <span>8 min</span>
                                </div>
                                <div class="meta-item">
                                    <span>💬</span>
                                    <span>24 commentaires</span>
                                </div>
                            </div>
                            <h3 class="article-title">Les hooks React que vous devez absolument connaître en 2025</h3>
                            <p class="article-excerpt">
                                useState, useEffect, useContext, mais aussi les nouveaux hooks comme useTransition et useDeferredValue. Guide complet avec exemples pratiques...
                            </p>
                            <div class="article-tags">
                                <span class="tag">Hooks</span>
                                <span class="tag">useState</span>
                                <span class="tag">useEffect</span>
                            </div>
                            <div class="article-footer">
                                <div class="article-stats">
                                    <div class="stat">
                                        <span>👁️</span>
                                        <span>1.8k</span>
                                    </div>
                                    <div class="stat">
                                        <span>❤️</span>
                                        <span>95</span>
                                    </div>
                                </div>
                                <a href="#" class="read-article-btn">
                                    📖 Lire l'article
                                    <span>→</span>
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- Article 3 -->
                    <article class="article-card">
                        <div class="article-image">🚀</div>
                        <div class="article-content">
                            <div class="article-meta">
                                <div class="meta-item">
                                    <span>📅</span>
                                    <span>10 jan 2025</span>
                                </div>
                                <div class="meta-item">
                                    <span>⏱️</span>
                                    <span>10 min</span>
                                </div>
                                <div class="meta-item">
                                    <span>💬</span>
                                    <span>15 commentaires</span>
                                </div>
                            </div>
                            <h3 class="article-title">Optimiser les performances de vos applications React</h3>
                            <p class="article-excerpt">
                                React.memo, useMemo, useCallback et les techniques avancées pour créer des applications React ultra-rapides. Cas pratiques et méthodes de mesure...
                            </p>
                            <div class="article-tags">
                                <span class="tag">Performance</span>
                                <span class="tag">Optimisation</span>
                                <span class="tag">memo</span>
                            </div>
                            <div class="article-footer">
                                <div class="article-stats">
                                    <div class="stat">
                                        <span>👁️</span>
                                        <span>1.5k</span>
                                    </div>
                                    <div class="stat">
                                        <span>❤️</span>
                                        <span>78</span>
                                    </div>
                                </div>
                                <a href="#" class="read-article-btn">
                                    📖 Lire l'article
                                    <span>→</span>
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- Article 4 -->
                    <article class="article-card">
                        <div class="article-image">🎨</div>
                        <div class="article-content">
                            <div class="article-meta">
                                <div class="meta-item">
                                    <span>📅</span>
                                    <span>8 jan 2025</span>
                                </div>
                                <div class="meta-item">
                                    <span>⏱️</span>
                                    <span>6 min</span>
                                </div>
                                <div class="meta-item">
                                    <span>💬</span>
                                    <span>12 commentaires</span>
                                </div>
                            </div>
                            <h3 class="article-title">Styled Components vs CSS Modules avec React</h3>
                            <p class="article-excerpt">
                                Comparaison détaillée des solutions de styling pour React. Avantages, inconvénients et cas d'usage pour chaque approche...
                            </p>
                            <div class="article-tags">
                                <span class="tag">CSS</span>
                                <span class="tag">Styled Components</span>
                                <span class="tag">Styling</span>
                            </div>
                            <div class="article-footer">
                                <div class="article-stats">
                                    <div class="stat">
                                        <span>👁️</span>
                                        <span>1.2k</span>
                                    </div>
                                    <div class="stat">
                                        <span>❤️</span>
                                        <span>56</span>
                                    </div>
                                </div>
                                <a href="#" class="read-article-btn">
                                    📖 Lire l'article
                                    <span>→</span>
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- Article 5 -->
                    <article class="article-card">
                        <div class="article-image">🧪</div>
                        <div class="article-content">
                            <div class="article-meta">
                                <div class="meta-item">
                                    <span>📅</span>
                                    <span>5 jan 2025</span>
                                </div>
                                <div class="meta-item">
                                    <span>⏱️</span>
                                    <span>15 min</span>
                                </div>
                                <div class="meta-item">
                                    <span>💬</span>
                                    <span>28 commentaires</span>
                                </div>
                            </div>
                            <h3 class="article-title">Testing React : Jest, React Testing Library et Cypress</h3>
                            <p class="article-excerpt">
                                Guide complet pour tester vos applications React. Tests unitaires, d'intégration et end-to-end avec les meilleurs outils...
                            </p>
                            <div class="article-tags">
                                <span class="tag">Testing</span>
                                <span class="tag">Jest</span>
                                <span class="tag">Cypress</span>
                            </div>
                            <div class="article-footer">
                                <div class="article-stats">
                                    <div class="stat">
                                        <span>👁️</span>
                                        <span>2.1k</span>
                                    </div>
                                    <div class="stat">
                                        <span>❤️</span>
                                        <span>142</span>
                                    </div>
                                </div>
                                <a href="#" class="read-article-btn">
                                    📖 Lire l'article
                                    <span>→</span>
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- Article 6 -->
                    <article class="article-card">
                        <div class="article-image">🔄</div>
                        <div class="article-content">
                            <div class="article-meta">
                                <div class="meta-item">
                                    <span>📅</span>
                                    <span>3 jan 2025</span>
                                </div>
                                <div class="meta-item">
                                    <span>⏱️</span>
                                    <span>9 min</span>
                                </div>
                                <div class="meta-item">
                                    <span>💬</span>
                                    <span>19 commentaires</span>
                                </div>
                            </div>
                            <h3 class="article-title">Redux vs Zustand vs Context API : Que choisir ?</h3>
                            <p class="article-excerpt">
                                Comparaison des solutions de gestion d'état pour React. Analyse des performances, facilité d'utilisation et cas d'usage...
                            </p>
                            <div class="article-tags">
                                <span class="tag">Redux</span>
                                <span class="tag">Zustand</span>
                                <span class="tag">State Management</span>
                            </div>
                            <div class="article-footer">
                                <div class="article-stats">
                                    <div class="stat">
                                        <span>👁️</span>
                                        <span>1.7k</span>
                                    </div>
                                    <div class="stat">
                                        <span>❤️</span>
                                        <span>89</span>
                                    </div>
                                </div>
                                <a href="#" class="read-article-btn">
                                    📖 Lire l'article
                                    <span>→</span>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="sidebar">
                <!-- Related Categories -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">📂 Toutes les catégories</h3>
                    <ul class="category-list">
                        <li class="category-item">
                            <a href="#" class="category-link current">
                                <span>React</span>
                                <span class="category-count">42</span>
                            </a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-link">
                                <span>Vue.js</span>
                                <span class="category-count">28</span>
                            </a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-link">
                                <span>Node.js</span>
                                <span class="category-count">35</span>
                            </a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-link">
                                <span>TypeScript</span>
                                <span class="category-count">22</span>
                            </a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-link">
                                <span>CSS</span>
                                <span class="category-count">18</span>
                            </a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-link">
                                <span>JavaScript</span>
                                <span class="category-count">45</span>
                            </a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-link">
                                <span>DevOps</span>
                                <span class="category-count">15</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Popular Tags -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">🏷️ Tags populaires</h3>
                    <div class="tag-cloud">
                        <span class="tag">React 18</span>
                        <span class="tag">Hooks</span>
                        <span class="tag">Performance</span>
                        <span class="tag">JSX</span>
                        <span class="tag">Components</span>
                        <span class="tag">State</span>
                        <span class="tag">Props</span>
                        <span class="tag">Redux</span>
                        <span class="tag">Testing</span>
                        <span class="tag">Next.js</span>
                        <span class="tag">Router</span>
                        <span class="tag">Forms</span>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">📧 Newsletter React</h3>
                    <p style="color: var(--text-secondary); margin-bottom: 1rem; font-size: 0.9rem;">
                        Recevez les derniers articles React et les news de l'écosystème !
                    </p>
                    <form class="newsletter-form" style="display: flex; flex-direction: column; gap: 1rem;">
                        <input type="email" placeholder="Votre email..." style="background: var(--card-bg); border: 1px solid var(--border-color); border-radius: 8px; padding: 0.8rem; color: var(--text-primary);">
                        <button type="submit" style="background: linear-gradient(45deg, var(--primary-green), var(--primary-blue)); color: #000; border: none; padding: 0.8rem 1.5rem; border-radius: 8px; font-weight: 600; cursor: pointer;">
                            S'abonner
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Pagination -->
            <nav class="pagination">
                <a href="#" class="pagination-btn" disabled>‹ Précédent</a>
                <a href="#" class="pagination-btn active">1</a>
                <a href="#" class="pagination-btn">2</a>
                <a href="#" class="pagination-btn">3</a>
                <a href="#" class="pagination-btn">4</a>
                <span class="pagination-info">...</span>
                <a href="#" class="pagination-btn">8</a>
                <a href="#" class="pagination-btn">Suivant ›</a>
                <div class="pagination-info">
                    Page 1 sur 8 (42 articles)
                </div>
            </nav>
        </main>
    </div>

    <script>
        // Script pour les animations et interactions visuelles
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

            // Animation au scroll pour les articles
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

            document.querySelectorAll('.article-card').forEach(article => {
                article.style.opacity = '0';
                article.style.transform = 'translateY(30px)';
                article.style.transition = 'all 0.6s ease';
                observer.observe(article);
            });

            // Animation des stats
            const statsNumbers = document.querySelectorAll('.stat-number');
            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const finalValue = parseInt(entry.target.textContent.replace(/[^0-9]/g, ''));
                        let currentValue = 0;
                        const increment = finalValue / 30;
                        
                        const timer = setInterval(() => {
                            currentValue += increment;
                            if (currentValue >= finalValue) {
                                currentValue = finalValue;
                                clearInterval(timer);
                            }
                            
                            if (finalValue >= 1000) {
                                entry.target.textContent = (currentValue / 1000).toFixed(1) + 'K';
                            } else {
                                entry.target.textContent = Math.floor(currentValue);
                            }
                        }, 50);
                        
                        statsObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            statsNumbers.forEach(stat => statsObserver.observe(stat));
        });

        // Fonction pour changer la vue (grille/liste)
        function toggleView(viewType) {
            const grid = document.getElementById('articlesGrid');
            const buttons = document.querySelectorAll('.view-btn');
            
            // Reset buttons
            buttons.forEach(btn => btn.classList.remove('active'));
            
            if (viewType === 'list') {
                grid.classList.add('list-view');
                buttons[1].classList.add('active');
            } else {
                grid.classList.remove('list-view');
                buttons[0].classList.add('active');
            }
            
            console.log(`Vue changée vers: ${viewType}`);
        }

        // Gestion des filtres (à connecter avec PHP)
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('filter-select')) {
                console.log(`Filtre changé: ${e.target.value}`);
                // Ici tu ajouteras la logique pour filtrer/trier via PHP
            }
        });

        // Gestion de la recherche
        document.querySelector('.search-input').addEventListener('input', function(e) {
            if (e.target.value.length > 2) {
                console.log(`Recherche dans React: ${e.target.value}`);
                // Ici tu ajouteras la logique de recherche PHP
            }
        });
    </script>
</body>
</html>
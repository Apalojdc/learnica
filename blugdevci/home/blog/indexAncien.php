<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevForum Blog - Articles & Tutoriels</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #1a1f2e 0%, #16213e 50%, #0f172a 100%);
            color: #e2e8f0;
            line-height: 1.6;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(59, 130, 246, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #60a5fa;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a:hover, .nav-links a.active {
            color: #60a5fa;
            transform: translateY(-2px);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #60a5fa, #3b82f6);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after, .nav-links a.active::after {
            width: 100%;
        }

        .search-bar {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .search-input {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 25px;
            padding: 0.5rem 1rem;
            color: #e2e8f0;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            min-width: 250px;
        }

        .search-input:focus {
            outline: none;
            border-color: #60a5fa;
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.1);
        }

        .search-input::placeholder {
            color: #64748b;
        }

        /* Hero Section */
        .hero {
            padding: 4rem 0;
            text-align: center;
            position: relative;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(29, 78, 216, 0.05));
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="%23374151" stroke-width="0.5" opacity="0.2"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #60a5fa, #3b82f6, #1e40af);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 1.125rem;
            color: #94a3b8;
            margin-bottom: 2rem;
        }

        /* Filters */
        .filters {
            padding: 2rem 0;
            border-bottom: 1px solid rgba(59, 130, 246, 0.1);
        }

        .filter-tabs {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .filter-tab {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.2);
            color: #94a3b8;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .filter-tab:hover, .filter-tab.active {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        /* Featured Article */
        .featured {
            padding: 4rem 0;
        }

        .featured-article {
            background: rgba(15, 23, 42, 0.6);
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(59, 130, 246, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .featured-article:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .featured-image {
            height: 300px;
            background: linear-gradient(135deg, #3b82f6, #1e40af, #0f172a);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            position: relative;
            overflow: hidden;
        }

        .featured-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="%2360a5fa" opacity="0.3"/><circle cx="20" cy="20" r="1" fill="%233b82f6" opacity="0.5"/><circle cx="80" cy="30" r="1.5" fill="%2393c5fd" opacity="0.4"/></svg>');
            animation: twinkle 3s infinite;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.8; }
        }

        .featured-content {
            padding: 2.5rem;
        }

        .featured-meta {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            align-items: center;
        }

        .featured-tag {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .featured-date {
            color: #64748b;
            font-size: 0.875rem;
        }

        .featured-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #f1f5f9;
            line-height: 1.3;
        }

        .featured-excerpt {
            color: #94a3b8;
            font-size: 1.125rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .featured-author {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #60a5fa, #3b82f6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .author-info {
            display: flex;
            flex-direction: column;
        }

        .author-name {
            font-weight: 600;
            color: #f1f5f9;
        }

        .author-role {
            font-size: 0.875rem;
            color: #64748b;
        }

        /* Article Grid */
        .articles {
            padding: 4rem 0;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
            color: #f1f5f9;
        }

        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .article-card {
            background: rgba(15, 23, 42, 0.6);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(59, 130, 246, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .article-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa, #93c5fd);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .article-card:hover::before {
            transform: translateX(0);
        }

        .article-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .article-image {
            height: 200px;
            background: linear-gradient(45deg, #1e40af, #3b82f6, #60a5fa);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            position: relative;
            overflow: hidden;
        }

        .article-content {
            padding: 1.5rem;
        }

        .article-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .article-tag {
            background: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .article-date {
            color: #64748b;
            font-size: 0.875rem;
        }

        .article-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #f1f5f9;
            line-height: 1.4;
        }

        .article-excerpt {
            color: #94a3b8;
            line-height: 1.6;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .article-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .article-author {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .article-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #60a5fa, #3b82f6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .article-stats {
            display: flex;
            gap: 1rem;
            color: #64748b;
            font-size: 0.875rem;
        }

        .stat {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        /* Newsletter */
        .newsletter {
            padding: 4rem 0;
            margin: 4rem 0;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(29, 78, 216, 0.1));
            border-radius: 24px;
            text-align: center;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .newsletter h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #f1f5f9;
        }

        .newsletter p {
            font-size: 1.125rem;
            color: #94a3b8;
            margin-bottom: 2rem;
        }

        .newsletter-form {
            display: flex;
            gap: 1rem;
            justify-content: center;
            max-width: 400px;
            margin: 0 auto;
        }

        .newsletter-input {
            flex: 1;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            color: #e2e8f0;
            font-size: 1rem;
        }

        .newsletter-input:focus {
            outline: none;
            border-color: #60a5fa;
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.1);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 3rem;
        }

        .page-btn {
            padding: 0.5rem 1rem;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.2);
            color: #94a3b8;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .page-btn:hover, .page-btn.active {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            transform: translateY(-2px);
        }

        /* Footer */
        footer {
            background: rgba(15, 23, 42, 0.8);
            padding: 3rem 0;
            margin-top: 6rem;
            border-top: 1px solid rgba(59, 130, 246, 0.1);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            color: #f1f5f9;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .footer-section a {
            color: #94a3b8;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #60a5fa;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(59, 130, 246, 0.1);
            color: #64748b;
        }

        /* Animations */
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

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .float {
            animation: float 3s ease-in-out infinite;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .search-input {
                min-width: 200px;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .articles-grid {
                grid-template-columns: 1fr;
            }

            .newsletter-form {
                flex-direction: column;
            }

            .filter-tabs {
                justify-content: flex-start;
                overflow-x: auto;
                padding-bottom: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="container">
            <div class="logo">
                <span>📚</span>
                DevForum Blog
            </div>
            <ul class="nav-links">
                <li><a href="#home">Accueil</a></li>
                <li><a href="#blog" class="active">Blog</a></li>
                <li><a href="#tutoriels">Tutoriels</a></li>
                <li><a href="#guides">Guides</a></li>
                <li><a href="#news">News Tech</a></li>
            </ul>
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Rechercher des articles...">
            </div>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-content fade-in-up">
                    <h1>Articles & Tutoriels</h1>
                    <p>Découvrez les dernières tendances, tutoriels et bonnes pratiques du développement web et mobile.</p>
                </div>
            </div>
        </section>

        <section class="filters">
            <div class="container">
                <div class="filter-tabs">
                    <div class="filter-tab active">Tous</div>
                    <div class="filter-tab">JavaScript</div>
                    <div class="filter-tab">React</div>
                    <div class="filter-tab">Node.js</div>
                    <div class="filter-tab">Python</div>
                    <div class="filter-tab">DevOps</div>
                    <div class="filter-tab">Mobile</div>
                    <div class="filter-tab">IA/ML</div>
                </div>
            </div>
        </section>

        <section class="featured">
            <div class="container">
                <div class="featured-article float">
                    <div class="featured-image">
                        <span>🚀</span>
                    </div>
                    <div class="featured-content">
                        <div class="featured-meta">
                            <span class="featured-tag">Featured</span>
                            <span class="featured-date">Il y a 2 heures</span>
                        </div>
                        <h2 class="featured-title">Les Nouveautés de React 19 : Ce qui Change Tout</h2>
                        <p class="featured-excerpt">
                            Découvrez les fonctionnalités révolutionnaires de React 19 qui vont transformer votre façon de développer. 
                            Entre les nouvelles APIs, les améliorations de performance et les outils de développement, 
                            cette version marque un tournant majeur pour l'écosystème React.
                        </p>
                        <div class="featured-author">
                            <div class="author-avatar">AS</div>
                            <div class="author-info">
                                <div class="author-name">Alex Stardev</div>
                                <div class="author-role">Senior React Developer</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="articles">
            <div class="container">
                <h2 class="section-title">Derniers Articles</h2>
                <div class="articles-grid">
                    <article class="article-card">
                        <div class="article-image">
                            <span>⚡</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-tag">Performance</span>
                                <span class="article-date">Il y a 1 jour</span>
                            </div>
                            <h3 class="article-title">Optimiser les Performances de votre App React</h3>
                            <p class="article-excerpt">
                                Techniques avancées pour améliorer les performances de vos applications React : memo, useMemo, useCallback et plus encore.
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="article-avatar">SM</div>
                                    <span>Sarah Martin</span>
                                </div>
                                <div class="article-stats">
                                    <span class="stat">👁️ 1.2k</span>
                                    <span class="stat">💬 23</span>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="article-card">
                        <div class="article-image">
                            <span>🐍</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-tag">Python</span>
                                <span class="article-date">Il y a 2 jours</span>
                            </div>
                            <h3 class="article-title">FastAPI vs Django : Le Guide Complet 2025</h3>
                            <p class="article-excerpt">
                                Comparaison détaillée entre FastAPI et Django pour choisir le bon framework pour vos projets Python.
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="article-avatar">JD</div>
                                    <span>Jean Dupont</span>
                                </div>
                                <div class="article-stats">
                                    <span class="stat">👁️ 856</span>
                                    <span class="stat">💬 15</span>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="article-card">
                        <div class="article-image">
                            <span>🛠️</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-tag">DevOps</span>
                                <span class="article-date">Il y a 3 jours</span>
                            </div>
                            <h3 class="article-title">Docker en Production : Bonnes Pratiques</h3>
                            <p class="article-excerpt">
                                Les meilleures pratiques pour déployer et gérer vos conteneurs Docker en environnement de production.
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="article-avatar">ML</div>
                                    <span>Marie Lopez</span>
                                </div>
                                <div class="article-stats">
                                    <span class="stat">👁️ 943</span>
                                    <span class="stat">💬 31</span>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="article-card">
                        <div class="article-image">
                            <span>🤖</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-tag">IA/ML</span>
                                <span class="article-date">Il y a 4 jours</span>
                            </div>
                            <h3 class="article-title">Créer un Chatbot IA avec Python et OpenAI</h3>
                            <p class="article-excerpt">
                                Tutoriel complet pour développer votre propre chatbot intelligent en utilisant l'API OpenAI et Python.
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="article-avatar">TR</div>
                                    <span>Thomas Roy</span>
                                </div>
                                <div class="article-stats">
                                    <span class="stat">👁️ 2.1k</span>
                                    <span class="stat">💬 67</span>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="article-card">
                        <div class="article-image">
                            <span>📱</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-tag">Mobile</span>
                                <span class="article-date">Il y a 5 jours</span>
                            </div>
                            <h3 class="article-title">React Native vs Flutter : Comparatif 2025</h3>
                            <p class="article-excerpt">
                                Analyse approfondie des deux frameworks de développement mobile les plus populaires du moment.
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="article-avatar">LC</div>
                                    <span>Lucas Chen</span>
                                </div>
                                <div class="article-stats">
                                    <span class="stat">👁️ 1.5k</span>
                                    <span class="stat">💬 42</span>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="article-card">
                        <div class="article-image">
                            <span>🔒</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-tag">Sécurité</span>
                                <span class="article-date">Il y a 6 jours</span>
                            </div>
                            <h3 class="article-title">Sécuriser une API REST : Guide Complet</h3>
                            <p class="article-excerpt">
                                Toutes les techniques essentielles pour sécuriser vos APIs : authentification, autorisation, validation et plus.
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="article-avatar">EW</div>
                                    <span>Emma Wilson</span>
                                </div>
                                <div class="article-stats">
                                    <span class="stat">👁️ 1.8k</span>
                                    <span class="stat">💬 55</span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="pagination">
                    <a href="#" class="page-btn">Précédent</a>
                    <a href="#" class="page-btn active">1</a>
                    <a href="#" class="page-btn">2</a>
                    <a href="#" class="page-btn">3</a>
                    <a href="#" class="page-btn">4</a>
                    <a href="#" class="page-btn">5</a>
                    <a href="#" class="page-btn">Suivant</a>
                </div>
            </div>
        </section>

        <section class="newsletter">
            <div class="container">
                <h2>Newsletter DevForum</h2>
                <p>Recevez les derniers articles et tutoriels directement dans votre boîte mail</p>
                <form class="newsletter-form">
                    <input type="email" class="newsletter-input" placeholder="Votre adresse email">
                    <button type="submit" class="btn btn-primary">S'abonner</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Blog</h3>
                    <a href="#">Derniers articles</a>
                    <a href="#">Tutoriels</a>
                    <a href="#">Guides pratiques</a>
                    <a href="#">News tech</a>
                </div>
                <div class="footer-section">
                    <h3>Catégories</h3>
                    <a href="#">JavaScript</a>
                    <a href="#">Python</a>
                    <a href="#">React</a>
                    <a href="#">DevOps</a>
                </div>
                <div class="footer-section">
                    <h3>Communauté</h3>
                    <a href="#">Forums</a>
                    <a href="#">Discord</a>
                    <a href="#">Événements</a>
                    <a href="#">Contributeurs</a>
                </div>
                <div class="footer-section">
                    <h3>Support</h3>
                    <a href="#">Centre d'aide</a>
                    <a href="#">Contact</a>
                    <a href="#">RSS</a>
                    <a href="#">Newsletter</a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 DevForum Blog. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        // Animation au scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                }
            });
        }, observerOptions);

        // Observer les éléments à animer
        document.querySelectorAll('.article-card, .featured-article').forEach(el => {
            observer.observe(el);
        });

        // Filtres interactifs
        document.querySelectorAll('.filter-tab').forEach(tab => {
            tab.addEventListener('click', () => {
                // Retirer la classe active de tous les onglets
                document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
                // Ajouter la classe active à l'onglet cliqué
                tab.classList.add('active');
                
                // Effet de filtrage visuel
                const articles = document.querySelectorAll('.article-card');
                articles.forEach(article => {
                    article.style.opacity = '0.3';
                    article.style.transform = 'scale(0.95)';
                });
                
                setTimeout(() => {
                    articles.forEach(article => {
                        article.style.opacity = '1';
                        article.style.transform = 'scale(1)';
                    });
                }, 300);
            });
        });

        // Animation des cartes d'articles
        document.querySelectorAll('.article-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-8px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Recherche interactive
        const searchInput = document.querySelector('.search-input');
        let searchTimeout;

        searchInput.addEventListener('input', (e) => {
            clearTimeout(searchTimeout);
            const query = e.target.value.toLowerCase();
            
            // Effet visuel de recherche
            if (query.length > 0) {
                searchInput.style.borderColor = '#60a5fa';
                searchInput.style.boxShadow = '0 0 0 3px rgba(96, 165, 250, 0.2)';
            } else {
                searchInput.style.borderColor = 'rgba(59, 130, 246, 0.2)';
                searchInput.style.boxShadow = 'none';
            }

            searchTimeout = setTimeout(() => {
                // Simulation de recherche
                const articles = document.querySelectorAll('.article-card');
                articles.forEach(article => {
                    const title = article.querySelector('.article-title').textContent.toLowerCase();
                    const excerpt = article.querySelector('.article-excerpt').textContent.toLowerCase();
                    
                    if (query === '' || title.includes(query) || excerpt.includes(query)) {
                        article.style.display = 'block';
                        article.style.opacity = '1';
                        article.style.transform = 'scale(1)';
                    } else {
                        article.style.opacity = '0.3';
                        article.style.transform = 'scale(0.95)';
                    }
                });
            }, 300);
        });

        // Animation de la newsletter
        const newsletterForm = document.querySelector('.newsletter-form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const button = newsletterForm.querySelector('.btn');
                const originalText = button.textContent;
                
                button.textContent = 'Inscription...';
                button.style.background = 'linear-gradient(135deg, #10b981, #059669)';
                
                setTimeout(() => {
                    button.textContent = 'Inscrit ! ✓';
                    setTimeout(() => {
                        button.textContent = originalText;
                        button.style.background = 'linear-gradient(135deg, #3b82f6, #1d4ed8)';
                    }, 2000);
                }, 1000);
            });
        }

        // Smooth scroll pour la navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Pagination interactive
        document.querySelectorAll('.page-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Retirer la classe active de tous les boutons
                document.querySelectorAll('.page-btn').forEach(b => b.classList.remove('active'));
                
                // Ajouter la classe active au bouton cliqué (sauf pour Précédent/Suivant)
                if (!btn.textContent.includes('Précédent') && !btn.textContent.includes('Suivant')) {
                    btn.classList.add('active');
                }
                
                // Effet de chargement
                const articles = document.querySelectorAll('.article-card');
                articles.forEach((article, index) => {
                    article.style.opacity = '0';
                    article.style.transform = 'translateY(20px)';
                    
                    setTimeout(() => {
                        article.style.opacity = '1';
                        article.style.transform = 'translateY(0)';
                    }, index * 100);
                });
                
                // Scroll vers le haut
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });

        // Effet parallax léger sur le hero
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.hero');
            if (hero) {
                hero.style.transform = `translateY(${scrolled * 0.2}px)`;
            }
        });

        // Animation d'apparition au chargement
        window.addEventListener('load', () => {
            document.querySelectorAll('.article-card').forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('fade-in-up');
                }, index * 100);
            });
        });

        // Effet de like sur les stats des articles
        document.querySelectorAll('.article-stats .stat').forEach(stat => {
            stat.addEventListener('click', () => {
                if (stat.textContent.includes('👁️')) return; // Pas de like sur les vues
                
                const currentCount = parseInt(stat.textContent.match(/\d+/)[0]);
                stat.textContent = stat.textContent.replace(/\d+/, currentCount + 1);
                
                // Effet visuel
                stat.style.color = '#60a5fa';
                stat.style.transform = 'scale(1.2)';
                setTimeout(() => {
                    stat.style.color = '#64748b';
                    stat.style.transform = 'scale(1)';
                }, 300);
            });
        });
    </script>
</body>
</html>
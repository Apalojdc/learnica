<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevBlog - Explorez le monde du développement web</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #0a0a0a;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .inside {
            width: 320px;
            background: linear-gradient(180deg, #0a0a0a 0%, #1a1a2e 50%, #16213e 100%);
            box-shadow: 2px 0 20px rgba(0, 0, 0, 0.3);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .dashboard-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(78, 205, 196, 0.1));
        }

        .logo {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 300% 300%;
            animation: gradientShift 3s ease infinite;
            margin-bottom: 0.5rem;
        }

        .logo-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .nav-menu {
            padding: 1rem 0;
        }

        .nav-category {
            margin-bottom: 1.5rem;
        }

        .nav-category-title {
            color: #ff6b6b;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.5rem 1.5rem;
            margin-bottom: 0.5rem;
            position: relative;
        }

        .nav-category-title::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 1.5rem;
            width: 30px;
            height: 2px;
            background: linear-gradient(90deg, #ff6b6b, #4ecdc4);
        }

        .nav-item {
            display: block;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            border-left: 3px solid transparent;
        }

        .nav-item:hover, .nav-item.active {
            background: linear-gradient(90deg, rgba(255, 107, 107, 0.1), rgba(78, 205, 196, 0.1));
            color: #4ecdc4;
            border-left-color: #4ecdc4;
            transform: translateX(5px);
        }

        .nav-item i {
            margin-right: 0.8rem;
            width: 16px;
            font-size: 1.1rem;
        }

        .user-profile {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(78, 205, 196, 0.1));
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            float: left;
            margin-right: 1rem;
        }

        .user-info h4 {
            color: white;
            font-size: 1rem;
            margin-bottom: 0.2rem;
        }

        .user-info p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.8rem;
        }

        /* Main Content */
        .main {
            flex: 1;
            margin-left: 320px;
            background: #0a0a0a;
            min-height: 100vh;
            position: relative;
        }

        .main-header {
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(20px);
            padding: 1.5rem 2rem;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .breadcrumb {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .breadcrumb a {
            color: #4ecdc4;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb a:hover {
            color: #ff6b6b;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .search-container {
            position: relative;
        }

        .search-input {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            padding: 0.8rem 1rem 0.8rem 2.5rem;
            color: white;
            width: 250px;
            transition: all 0.3s ease;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .search-input:focus {
            outline: none;
            border-color: #4ecdc4;
            box-shadow: 0 0 0 3px rgba(78, 205, 196, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
        }

        .action-btn {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
        }

        /* Hero Section */
        .hero-section {
            min-height: 80vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 50%, #16213e 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 20%, rgba(255, 107, 107, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(78, 205, 196, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 60%, rgba(69, 183, 209, 0.1) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .hero-content {
            max-width: 800px;
            position: relative;
            z-index: 2;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #f7b801);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 300% 300%;
            animation: gradientShift 3s ease infinite;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: #b0b0b0;
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .cta-button {
            display: inline-block;
            padding: 1rem 2rem;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 107, 107, 0.4);
        }

        /* Content Sections */
        .content-section {
            padding: 4rem 2rem;
            position: relative;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Features Section */
        .features-section {
            background: #111;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: linear-gradient(145deg, #1a1a1a, #0d0d0d);
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .feature-card:hover::before {
            left: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #fff;
        }

        .feature-card p {
            color: #b0b0b0;
            line-height: 1.6;
        }

        /* Articles Section */
        .articles-section {
            background: #0a0a0a;
        }

        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .article-card {
            background: linear-gradient(145deg, #1a1a1a, #0d0d0d);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
            cursor: pointer;
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .article-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
            position: relative;
        }

        .article-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.9);
            color: #ff6b6b;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .article-content {
            padding: 2rem;
        }

        .article-card h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: #fff;
        }

        .article-card p {
            color: #b0b0b0;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .read-more {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .read-more:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
        }

        /* Documentation Section */
        .documentation-section {
            background: #000000;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(255, 0, 150, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(0, 255, 255, 0.1) 0%, transparent 50%);
        }

        .docs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .doc-card {
            background: linear-gradient(145deg, #1a1a1a, #0d0d0d);
            border-radius: 20px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .doc-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #ff0096, #00ffff, #ffd700);
            background-size: 200% 100%;
            animation: shimmer 3s linear infinite;
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .doc-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .doc-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #ff0096, #00ffff, #ffd700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .doc-card h3 {
            font-size: 1.4rem;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 1rem;
        }

        .doc-card p {
            color: #b0b0b0;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .doc-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            padding: 1rem 0;
            border-top: 1px solid #333;
            border-bottom: 1px solid #333;
        }

        .doc-stats span {
            font-size: 0.85rem;
            color: #888;
        }

        .download-btn {
            display: block;
            width: 100%;
            padding: 1rem;
            background: linear-gradient(45deg, #ff0096, #00ffff);
            color: #000;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 0, 150, 0.4);
        }

        /* About Section */
        .about-section {
            background: #0f0f0f;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 3rem;
            margin-top: 3rem;
        }

        .about-sidebar {
            background: linear-gradient(145deg, #1a1a1a, #0d0d0d);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            height: fit-content;
        }

        .about-sidebar h3 {
            color: #fff;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .about-nav-list {
            list-style: none;
        }

        .about-nav-item {
            margin-bottom: 1rem;
        }

        .about-nav-link {
            display: block;
            padding: 0.8rem 1rem;
            color: #b0b0b0;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .about-nav-link:hover {
            background: rgba(78, 205, 196, 0.1);
            color: #4ecdc4;
            border-left-color: #4ecdc4;
        }

        .about-content {
            background: linear-gradient(145deg, #1a1a1a, #0d0d0d);
            border-radius: 20px;
            padding: 3rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .about-content h3 {
            color: #fff;
            font-size: 2rem;
            margin-bottom: 2rem;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .about-content p {
            color: #b0b0b0;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .tech-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin: 1rem 0;
        }

        .tech-badge {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .inside {
                width: 100%;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .inside.active {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
            }

            .mobile-menu-btn {
                display: block;
                background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
                color: white;
                border: none;
                padding: 0.8rem;
                border-radius: 10px;
                cursor: pointer;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .search-input {
                width: 200px;
            }

            .about-grid {
                grid-template-columns: 1fr;
            }

            .features-grid,
            .articles-grid,
            .docs-grid {
                grid-template-columns: 1fr;
            }

            .header-actions {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="inside" id="sidebar">
            <div class="dashboard-header">
                <div class="logo">DevBlog</div>
                <p class="logo-subtitle">Explorez le monde du développement</p>
            </div>

            <nav class="nav-menu">
                <div class="nav-category">
                    <div class="nav-category-title">Navigation</div>
                    <a href="#hero" class="nav-item active">
                        <i class="fas fa-home"></i> Accueil
                    </a>
                    <a href="#features" class="nav-item">
                        <i class="fas fa-star"></i> Fonctionnalités
                    </a>
                    <a href="#articles" class="nav-item">
                        <i class="fas fa-newspaper"></i> Articles
                    </a>
                    <a href="#documentation" class="nav-item">
                        <i class="fas fa-book"></i> Documentation
                    </a>
                    <a href="#about" class="nav-item">
                        <i class="fas fa-info-circle"></i> À propos
                    </a>
                </div>

                <div class="nav-category">
                    <div class="nav-category-title">Développement</div>
                    <a href="#tutorials" class="nav-item">
                        <i class="fas fa-graduation-cap"></i> Tutoriels
                    </a>
                    <a href="#code" class="nav-item">
                        <i class="fas fa-code"></i> Exemples Code
                    </a>
                    <a href="#tools" class="nav-item">
                        <i class="fas fa-tools"></i> Outils
                    </a>
                    <a href="#videos" class="nav-item">
                        <i class="fas fa-video"></i> Vidéos
                    </a>
                </div>

                <div class="nav-category">
                    <div class="nav-category-title">Communauté</div>
                    <a href="#forum" class="nav-item">
                        <i class="fas fa-comments"></i> Forum
                    </a>
                    <a href="#projects" class="nav-item">
                        <i class="fas fa-rocket"></i> Projets
                    </a>
                    <a href="#certifications" class="nav-item">
                        <i class="fas fa-certificate"></i> Certifications
                    </a>
                </div>
            </nav>

            <div class="user-profile">
                <div class="user-avatar">CA</div>
                <div class="user-info">
                    <h4>Coulibaly Apaloh</h4>
                    <p>Développeur Fullstack</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main">
            <div class="main-header">
                <button class="mobile-menu-btn" id="menuBtn" style="display: none;">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="breadcrumb">
                    <a href="#" onclick="showSection('hero')">Accueil</a> > <span id="currentSection">Accueil</span>
                </div>
                <div class="header-actions">
                    <div class="search-container">
                        <input type="text" class="search-input" placeholder="Rechercher...">
                        <i class="fas fa-search search-icon"></i>
                    </div>
                    <button class="action-btn">
                        <i class="fas fa-plus"></i> Nouveau
                    </button>
                </div>
            </div>

            <!-- Hero Section -->
            <section class="hero-section" id="hero">
                <div class="hero-content">
                    <h1 class="hero-title">Explorez le Monde du Développement</h1>
                    <p class="hero-subtitle">Découvrez les dernières tendances, apprenez de nouvelles technologies et développez vos compétences avec nos articles et ressources exclusives.</p>
                    <a href="#articles" class="cta-button">
                        <i class="fas fa-rocket"></i> Commencer l'Aventure
                    </a>
                </div>
            </section>

            <!-- Features Section -->
            <section class="content-section features-section" id="features">
                <h2 class="section-title fade-in">Pourquoi DevBlog ?</h2>
                <div class="features-grid">
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3>Apprentissage Continu</h3>
                        <p>Des tutoriels détaillés et des guides pratiques pour vous accompagner dans votre progression.</p>
                    </div>
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-code-branch"></i>
                        </div>
                        <h3>Technologies Modernes</h3>
                        <p>Restez à jour avec les dernières technologies et frameworks du développement web.</p>
                    </div>
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Communauté Active</h3>
                        <p>Rejoignez une communauté passionnée de développeurs et partagez vos expériences.</p>
                    </div>
                </div>
            </section>

            <!-- Articles Section -->
            <section class="content-section articles-section" id="articles">
                <h2 class="section-title fade-in">Articles Populaires</h2>
                <div class="articles-grid">
                    <article class="article-card fade-in">
                        <div class="article-image">
                            <i class="fab fa-laravel"></i>
                            <div class="article-badge">Laravel</div>
                        </div>
                        <div class="article-content">
                            <h3>Apprendre Laravel pas à pas</h3>
                            <p>Un guide complet pour maîtriser Laravel, le framework PHP le plus populaire pour le développement web moderne.</p>
                            <a href="#" class="read-more">Lire l'article</a>
                        </div>
                    </article>
                    
                    <article class="article-card fade-in">
                        <div class="article-image">
                            <i class="fab fa-python"></i>
                            <div class="article-badge">Python</div>
                        </div>
                        <div class="article-content">
                            <h3>Python pour Machine Learning</h3>
                            <p>Découvrez comment utiliser Python pour créer des modèles de machine learning efficaces.</p>
                            <a href="#" class="read-more">Lire l'article</a>
                        </div>
                    </article>
                    
                    <article class="article-card fade-in">
                        <div class="article-image">
                            <i class="fab fa-react"></i>
                            <div class="article-badge">React</div>
                        </div>
                        <div class="article-content">
                            <h3>Interface Responsive avec React</h3>
                            <p>Apprenez à créer des interfaces utilisateur modernes et adaptatives avec React.</p>
                            <a href="#" class="read-more">Lire l'article</a>
                        </div>
                    </article>
                    
                    <article class="article-card fade-in">
                        <div class="article-image">
                            <i class="fab fa-php"></i>
                            <div class="article-badge">PHP</div>
                        </div>
                        <div class="article-content">
                            <h3>Programmation PHP Avancée</h3>
                            <p>Maîtrisez les concepts avancés de PHP pour développer des applications web robustes.</p>
                            <a href="#" class="read-more">Lire l'article</a>
                        </div>
                    </article>
                    
                    <article class="article-card fade-in">
                        <div class="article-image">
                            <i class="fab fa-windows"></i>
                            <div class="article-badge">Windows</div>
                        </div>
                        <div class="article-content">
                            <h3>Installation Windows 10 & 11</h3>
                            <p>Guide complet pour installer et configurer Windows 10 et 11 sur votre système.</p>
                            <a href="#" class="read-more">Lire l'article</a>
                        </div>
                    </article>
                    
                    <article class="article-card fade-in">
                        <div class="article-image">
                            <i class="fas fa-mobile-alt"></i>
                            <div class="article-badge">Flutter</div>
                        </div>
                        <div class="article-content">
                            <h3>Application Mobile avec Flutter</h3>
                            <p>Créez votre première application mobile cross-platform avec Flutter et Dart.</p>
                            <a href="#" class="read-more">Lire l'article</a>
                        </div>
                    </article>
                </div>
            </section>

            <!-- Documentation Section -->
            <section class="content-section documentation-section" id="documentation">
                <h2 class="section-title fade-in">Documents Populaires</h2>
                <div class="docs-grid">
                    <div class="doc-card fade-in">
                        <div class="doc-icon">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <h3>Guide Laravel Complet</h3>
                        <p>Documentation complète pour maîtriser Laravel de A à Z avec des exemples pratiques.</p>
                        <div class="doc-stats">
                            <span><i class="fas fa-download"></i> 1.2k</span>
                            <span><i class="fas fa-star"></i> 4.9</span>
                            <span><i class="fas fa-file"></i> 150 pages</span>
                        </div>
                        <a href="#" class="download-btn">
                            <i class="fas fa-download"></i> Télécharger
                        </a>
                    </div>

                    <div class="doc-card fade-in">
                        <div class="doc-icon">
                            <i class="fas fa-file-code"></i>
                        </div>
                        <h3>Cheat Sheet JavaScript</h3>
                        <p>Aide-mémoire essentiel avec toutes les fonctions et méthodes JavaScript importantes.</p>
                        <div class="doc-stats">
                            <span><i class="fas fa-download"></i> 2.5k</span>
                            <span><i class="fas fa-star"></i> 4.8</span>
                            <span><i class="fas fa-file"></i> 25 pages</span>
                        </div>
                        <a href="#" class="download-btn">
                            <i class="fas fa-download"></i> Télécharger
                        </a>
                    </div>

                    <div class="doc-card fade-in">
                        <div class="doc-icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <h3>Manuel MySQL</h3>
                        <p>Guide complet pour la gestion des bases de données MySQL avec des exemples concrets.</p>
                        <div class="doc-stats">
                            <span><i class="fas fa-download"></i> 890</span>
                            <span><i class="fas fa-star"></i> 4.7</span>
                            <span><i class="fas fa-file"></i> 200 pages</span>
                        </div>
                        <a href="#" class="download-btn">
                            <i class="fas fa-download"></i> Télécharger
                        </a>
                    </div>

                    <div class="doc-card fade-in">
                        <div class="doc-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Flutter Development</h3>
                        <p>Guide pratique pour créer des applications mobiles avec Flutter et Dart.</p>
                        <div class="doc-stats">
                            <span><i class="fas fa-download"></i> 1.8k</span>
                            <span><i class="fas fa-star"></i> 4.9</span>
                            <span><i class="fas fa-file"></i> 180 pages</span>
                        </div>
                        <a href="#" class="download-btn">
                            <i class="fas fa-download"></i> Télécharger
                        </a>
                    </div>

                    <div class="doc-card fade-in">
                        <div class="doc-icon">
                            <i class="fab fa-css3-alt"></i>
                        </div>
                        <h3>CSS Grid & Flexbox</h3>
                        <p>Maîtrisez les layouts modernes avec CSS Grid et Flexbox pour des designs responsives.</p>
                        <div class="doc-stats">
                            <span><i class="fas fa-download"></i> 1.5k</span>
                            <span><i class="fas fa-star"></i> 4.6</span>
                            <span><i class="fas fa-file"></i> 80 pages</span>
                        </div>
                        <a href="#" class="download-btn">
                            <i class="fas fa-download"></i> Télécharger
                        </a>
                    </div>

                    <div class="doc-card fade-in">
                        <div class="doc-icon">
                            <i class="fab fa-python"></i>
                        </div>
                        <h3>Python pour Débutants</h3>
                        <p>Introduction complète à Python avec des exercices pratiques et des projets.</p>
                        <div class="doc-stats">
                            <span><i class="fas fa-download"></i> 3.2k</span>
                            <span><i class="fas fa-star"></i> 4.8</span>
                            <span><i class="fas fa-file"></i> 220 pages</span>
                        </div>
                        <a href="#" class="download-btn">
                            <i class="fas fa-download"></i> Télécharger
                        </a>
                    </div>
                </div>
            </section>

            <!-- About Section -->
            <section class="content-section about-section" id="about">
                <h2 class="section-title fade-in">À Propos de DevBlog</h2>
                <div class="about-grid">
                    <div class="about-sidebar fade-in">
                        <h3>Compléments</h3>
                        <ul class="about-nav-list">
                            <li class="about-nav-item">
                                <a href="#" class="about-nav-link">
                                    <i class="fas fa-book"></i> Tutoriels
                                </a>
                            </li>
                            <li class="about-nav-item">
                                <a href="#" class="about-nav-link">
                                    <i class="fas fa-code"></i> Exemples Code
                                </a>
                            </li>
                            <li class="about-nav-item">
                                <a href="#" class="about-nav-link">
                                    <i class="fas fa-tools"></i> Outils Dev
                                </a>
                            </li>
                            <li class="about-nav-item">
                                <a href="#" class="about-nav-link">
                                    <i class="fas fa-video"></i> Vidéos
                                </a>
                            </li>
                            <li class="about-nav-item">
                                <a href="#" class="about-nav-link">
                                    <i class="fas fa-question-circle"></i> FAQ
                                </a>
                            </li>
                            <li class="about-nav-item">
                                <a href="#" class="about-nav-link">
                                    <i class="fas fa-users"></i> Communauté
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="about-content fade-in">
                        <h3>À Propos de DevBlog</h3>
                        <p>DevBlog est bien plus qu'une simple plateforme de formation - c'est votre compagnon de route vers l'excellence en développement web. Née de la passion pour l'innovation technologique et l'apprentissage collaboratif, DevBlog révolutionne la façon dont les développeurs acquièrent et perfectionnent leurs compétences.</p>

                        <p>Dans un monde où la technologie évolue à une vitesse fulgurante, nous avons créé un écosystème d'apprentissage unique qui combine formation gratuite de qualité professionnelle, documentation exhaustive et communauté dynamique.</p>

                        <p><strong>DevBlog</strong> a été développé par <strong>Coulibaly Apaloh</strong>, un passionné de code basé en Côte d'Ivoire, avec un objectif clair : offrir à la communauté des développeurs un espace d'apprentissage simple, accessible et inspirant.</p>

                        <p>Développeur fullstack d'applications web, mobiles et desktop, il s'est donné pour mission de partager ses connaissances à travers une plateforme où l'on apprend avec plaisir et clarté. Contact: (+225) 0545796982</p>

                        <div class="tech-badges">
                            <span class="tech-badge">PHP</span>
                            <span class="tech-badge">Laravel</span>
                            <span class="tech-badge">JavaScript</span>
                            <span class="tech-badge">React</span>
                            <span class="tech-badge">Flutter</span>
                            <span class="tech-badge">Python</span>
                            <span class="tech-badge">MySQL</span>
                            <span class="tech-badge">WinDev</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const menuBtn = document.getElementById('menuBtn');
        const sidebar = document.getElementById('sidebar');

        if (window.innerWidth <= 768) {
            menuBtn.style.display = 'block';
        }

        menuBtn.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });

        // Navigation
        const navItems = document.querySelectorAll('.nav-item');
        const currentSection = document.getElementById('currentSection');

        function showSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                section.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }

            // Update active state
            navItems.forEach(item => item.classList.remove('active'));
            const activeItem = document.querySelector(`.nav-item[href="#${sectionId}"]`);
            if (activeItem) {
                activeItem.classList.add('active');
            }

            // Update breadcrumb
            const sectionNames = {
                'hero': 'Accueil',
                'features': 'Fonctionnalités',
                'articles': 'Articles',
                'documentation': 'Documentation',
                'about': 'À propos'
            };
            currentSection.textContent = sectionNames[sectionId] || 'Accueil';

            // Close mobile menu
            if (window.innerWidth <= 768) {
                sidebar.classList.remove('active');
            }
        }

        navItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const sectionId = this.getAttribute('href').substring(1);
                showSection(sectionId);
            });
        });

        // Search functionality
        const searchInput = document.querySelector('.search-input');
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase();
            const cards = document.querySelectorAll('.article-card, .doc-card, .feature-card');
            
            cards.forEach(card => {
                const text = card.textContent.toLowerCase();
                if (text.includes(query)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = query ? 'none' : 'block';
                }
            });
        });

        // Smooth scrolling for CTA buttons
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(element => {
            observer.observe(element);
        });

        // Responsive handling
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                menuBtn.style.display = 'none';
                sidebar.classList.remove('active');
            } else {
                menuBtn.style.display = 'block';
            }
        });

        // Header background on scroll
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.main-header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(10, 10, 10, 0.98)';
            } else {
                header.style.background = 'rgba(10, 10, 10, 0.95)';
            }
        });
    </script>
</body>
</html>
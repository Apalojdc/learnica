<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevStudio - Agence de Développement Web & Applications Sur Mesure</title>
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
            --accent-orange: #ff6b35;
            --accent-purple: #8b5cf6;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, var(--dark-bg) 0%, var(--darker-bg) 50%, var(--dark-bg) 100%);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
        }

        .main-container {
            position: relative;
            min-height: 100vh;
        }

        /* Background Effects */
        .main-container::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 15% 85%, rgba(0, 255, 136, 0.06) 0%, transparent 50%),
                radial-gradient(circle at 85% 15%, rgba(0, 212, 255, 0.06) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(139, 92, 246, 0.03) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }

        /* Header */
        .header {
            background: linear-gradient(145deg, rgba(30, 30, 30, 0.95), rgba(42, 42, 42, 0.95));
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
            padding: 1.2rem 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .header.scrolled {
            background: linear-gradient(145deg, rgba(30, 30, 30, 0.98), rgba(42, 42, 42, 0.98));
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .header-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .logo {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
            position: relative;
            transition: all 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
            filter: drop-shadow(0 0 20px rgba(0, 255, 136, 0.4));
        }

        .nav {
            display: flex;
            gap: 2.5rem;
            align-items: center;
        }

        .nav-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            padding: 0.8rem 0;
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            transition: width 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-green);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .cta-header {
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            color: #000;
            padding: 1rem 2rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
        }

        .cta-header:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.4);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: var(--text-primary);
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            z-index: 2;
            padding-top: 100px;
        }

        .hero-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .hero-text {
            position: relative;
        }

        .hero-badge {
            background: linear-gradient(45deg, var(--accent-orange), var(--accent-purple));
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-block;
            margin-bottom: 2rem;
            animation: pulse 2s infinite;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .hero-title {
            font-size: 4.5rem;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, var(--text-primary), var(--text-secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-title .gradient-text {
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: block;
            animation: glow 3s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { filter: drop-shadow(0 0 5px rgba(0, 255, 136, 0.3)); }
            to { filter: drop-shadow(0 0 20px rgba(0, 255, 136, 0.6)); }
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: var(--text-secondary);
            margin-bottom: 2rem;
            line-height: 1.6;
            max-width: 90%;
        }

        .hero-features {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1.1rem;
            font-weight: 500;
        }

        .feature-icon {
            width: 24px;
            height: 24px;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #000;
            font-weight: 700;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        .hero-cta {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            color: #000;
            padding: 1.2rem 3rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 40px rgba(0, 255, 136, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: var(--text-primary);
            padding: 1.2rem 3rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--primary-green);
            transform: translateY(-2px);
        }

        /* Hero Visual */
        .hero-visual {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .team-image {
            width: 100%;
            max-width: 600px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .team-image:hover {
            transform: scale(1.02);
            box-shadow: 0 25px 80px rgba(0, 255, 136, 0.2);
        }

        .team-image img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 20px;
        }

        .floating-card {
            position: absolute;
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            border-radius: 15px;
            padding: 1.5rem;
            border: 1px solid var(--border-color);
            backdrop-filter: blur(10px);
            animation: float 6s ease-in-out infinite;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .floating-card-1 {
            top: 10%;
            right: -10%;
            animation-delay: 0s;
        }

        .floating-card-2 {
            bottom: 15%;
            left: -15%;
            animation-delay: 2s;
        }

        .floating-card-3 {
            top: 50%;
            right: -20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-15px) rotate(1deg); }
            66% { transform: translateY(-10px) rotate(-1deg); }
        }

        .card-title {
            font-weight: 600;
            color: var(--primary-green);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .card-value {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-primary);
        }

        /* Services Section */
        .services {
            padding: 8rem 0;
            position: relative;
            z-index: 2;
        }

        .services-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 5rem;
        }

        .section-badge {
            background: rgba(0, 255, 136, 0.1);
            color: var(--primary-green);
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
        }

        .section-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .section-title .highlight {
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            border-radius: 20px;
            padding: 3rem;
            border: 1px solid var(--border-color);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .service-card:hover::before {
            left: 100%;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 255, 136, 0.15);
            border-color: rgba(0, 255, 136, 0.4);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.3);
            transition: all 0.3s ease;
        }

        .service-card:hover .service-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .service-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-primary);
        }

        .service-description {
            color: var(--text-secondary);
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .service-features {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .service-feature {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        .service-feature::before {
            content: '✓';
            color: var(--primary-green);
            font-weight: 700;
            width: 16px;
            height: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* Process Section */
        .process {
            padding: 8rem 0;
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            position: relative;
            z-index: 2;
        }

        .process-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .process-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-top: 4rem;
        }

        .process-step {
            text-align: center;
            position: relative;
        }

        .process-step::after {
            content: '';
            position: absolute;
            top: 40px;
            right: -50%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, var(--primary-green), transparent);
            z-index: 1;
        }

        .process-step:last-child::after {
            display: none;
        }

        .process-number {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 800;
            color: #000;
            margin: 0 auto 2rem auto;
            position: relative;
            z-index: 2;
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.3);
        }

        .process-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-primary);
        }

        .process-description {
            color: var(--text-secondary);
            line-height: 1.6;
        }

        /* Stats Section */
        .stats {
            padding: 6rem 0;
            position: relative;
            z-index: 2;
        }

        .stats-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
        }

        .stat-item {
            text-align: center;
            padding: 2rem;
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            border-radius: 15px;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 255, 136, 0.1);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
            display: block;
        }

        .stat-label {
            color: var(--text-secondary);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
        }

        /* CTA Section */
        .cta {
            padding: 8rem 0;
            background: linear-gradient(135deg, var(--accent-purple), var(--primary-blue));
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .cta-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .cta h2 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: white;
        }

        .cta p {
            font-size: 1.2rem;
            margin-bottom: 3rem;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
        }

        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-white {
            background: white;
            color: var(--dark-bg);
            padding: 1.2rem 3rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
        }

        .btn-white:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-outline {
            background: transparent;
            color: white;
            padding: 1.2rem 3rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            border: 2px solid rgba(255, 255, 255, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: white;
        }

        /* Footer */
        .footer {
            background: var(--card-bg);
            padding: 4rem 0 2rem 0;
            border-top: 1px solid var(--border-color);
            position: relative;
            z-index: 2;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
        }

        .footer-brand {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .footer-logo {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
        }

        .footer-description {
            color: var(--text-secondary);
            line-height: 1.6;
            max-width: 300px;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 45px;
            height: 45px;
            background: rgba(0, 255, 136, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: var(--primary-green);
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }

        .social-link:hover {
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            color: #000;
            transform: translateY(-3px);
        }

        .footer-section h3 {
            color: var(--text-primary);
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .footer-links a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary-green);
        }

        .footer-bottom {
            text-align: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
            color: var(--text-muted);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 3rem;
                text-align: center;
            }

            .hero-visual {
                order: -1;
            }

            .floating-card {
                display: none;
            }

            .footer-content {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .nav {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .hero-title {
                font-size: 3rem;
            }

            .section-title {
                font-size: 2.5rem;
            }

            .hero-content {
                padding: 2rem 1rem;
            }

            .services-container,
            .process-container,
            .stats-container,
            .cta-container {
                padding: 0 1rem;
            }

            .hero-cta {
                flex-direction: column;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .process-step::after {
                display: none;
            }
        }

        /* Scroll animations */
        .fade-in {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Header -->
        <header class="header" id="header">
            <div class="header-content">
                <a href="#" class="logo">DevStudio</a>
                <nav class="nav">
                    <a href="/monblug/accueilAncien" class="nav-link">Accueil</a>
                    <a href="#services" class="nav-link">Services</a>
                    <a href="#process" class="nav-link">Processus</a>
                    <a href="#portfolio" class="nav-link">Portfolio</a>
                    <a href="#contact" class="nav-link">Contact</a>
                </nav>
                <a href="#contact" class="cta-header">Démarrer un projet</a>
                <button class="mobile-menu-btn">☰</button>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="hero" id="accueil">
            <div class="hero-content">
                <div class="hero-text">
                    <div class="hero-badge">🚀 +200 projets réalisés avec succès</div>
                    <h1 class="hero-title">
                        Votre agence conseil et
                        <span class="gradient-text">développement web</span>
                    </h1>
                    <p class="hero-subtitle">
                        Chez DevStudio, nous créons des solutions numériques sur mesure, adaptées à vos besoins métiers uniques. 
                        De la conception à la mise en ligne, nous transformons vos idées en expériences digitales exceptionnelles.
                    </p>
                    
                    <div class="hero-features">
                        <div class="feature-item">
                            <div class="feature-icon">✓</div>
                            <span>Solutions entièrement personnalisées selon vos processus métiers</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">✓</div>
                            <span>Compréhension approfondie de vos exigences et défis</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">✓</div>
                            <span>Collaboration étroite pour garantir un résultat optimal</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">✓</div>
                            <span>Accompagnement transparent et humain à chaque étape</span>
                        </div>
                    </div>

                    <div class="hero-cta">
                        <a href="#contact" class="btn-primary">
                            🚀 Démarrer votre projet
                            <span>→</span>
                        </a>
                        <a href="#services" class="btn-secondary">
                            📋 Découvrir nos services
                            <span>↓</span>
                        </a>
                    </div>
                </div>

                <div class="hero-visual">
                    <div class="team-image">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='600' height='400' viewBox='0 0 600 400'%3E%3Crect width='600' height='400' fill='%23%232a2a2a'/%3E%3Ccircle cx='150' cy='150' r='30' fill='%23%2300ff88'/%3E%3Ccircle cx='300' cy='120' r='25' fill='%23%2300d4ff'/%3E%3Ccircle cx='450' cy='180' r='35' fill='%23%23ff6b35'/%3E%3Ccircle cx='200' cy='250' r='28' fill='%23%238b5cf6'/%3E%3Ccircle cx='380' cy='280' r='32' fill='%23%2300ff88'/%3E%3Ccircle cx='120' cy='320' r='22' fill='%23%2300d4ff'/%3E%3Ctext x='300' y='200' text-anchor='middle' fill='%23%23ffffff' font-size='24' font-family='Arial, sans-serif' font-weight='bold'%3EÉquipe DevStudio%3C/text%3E%3Ctext x='300' y='230' text-anchor='middle' fill='%23%23b0b0b0' font-size='16' font-family='Arial, sans-serif'%3EDéveloppeurs passionnés%3C/text%3E%3C/svg%3E" alt="Équipe DevStudio">
                    </div>
                    
                    <div class="floating-card floating-card-1">
                        <div class="card-title">Projets livrés</div>
                        <div class="card-value">200+</div>
                    </div>
                    
                    <div class="floating-card floating-card-2">
                        <div class="card-title">Clients satisfaits</div>
                        <div class="card-value">98%</div>
                    </div>
                    
                    <div class="floating-card floating-card-3">
                        <div class="card-title">Années d'expérience</div>
                        <div class="card-value">8+</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="services fade-in" id="services">
            <div class="services-container">
                <div class="section-header">
                    <div class="section-badge">💼 NOS EXPERTISES</div>
                    <h2 class="section-title">
                        Services de <span class="highlight">développement web</span> sur mesure
                    </h2>
                    <p class="section-subtitle">
                        De la conception à la maintenance, nous maîtrisons toute la chaîne de développement pour créer des solutions digitales performantes et évolutives.
                    </p>
                </div>

                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-icon">🌐</div>
                        <h3 class="service-title">Applications Web</h3>
                        <p class="service-description">
                            Développement d'applications web modernes et performantes avec les dernières technologies.
                        </p>
                        <ul class="service-features">
                            <li class="service-feature">React, Vue.js, Angular</li>
                            <li class="service-feature">Progressive Web Apps (PWA)</li>
                            <li class="service-feature">Architecture microservices</li>
                            <li class="service-feature">Optimisation SEO intégrée</li>
                        </ul>
                    </div>

                    <div class="service-card">
                        <div class="service-icon">📱</div>
                        <h3 class="service-title">Applications Mobile</h3>
                        <p class="service-description">
                            Création d'applications mobiles natives et cross-platform pour iOS et Android.
                        </p>
                        <ul class="service-features">
                            <li class="service-feature">React Native, Flutter</li>
                            <li class="service-feature">Interface utilisateur intuitive</li>
                            <li class="service-feature">Intégration API avancée</li>
                            <li class="service-feature">Publication App Store</li>
                        </ul>
                    </div>

                    <div class="service-card">
                        <div class="service-icon">⚙️</div>
                        <h3 class="service-title">Solutions Backend</h3>
                        <p class="service-description">
                            Architecture robuste et évolutive pour supporter vos applications les plus exigeantes.
                        </p>
                        <ul class="service-features">
                            <li class="service-feature">Node.js, Python, PHP</li>
                            <li class="service-feature">APIs REST et GraphQL</li>
                            <li class="service-feature">Base de données optimisées</li>
                            <li class="service-feature">Cloud & DevOps</li>
                        </ul>
                    </div>

                    <div class="service-card">
                        <div class="service-icon">🛒</div>
                        <h3 class="service-title">E-commerce</h3>
                        <p class="service-description">
                            Boutiques en ligne performantes et sécurisées pour maximiser vos ventes.
                        </p>
                        <ul class="service-features">
                            <li class="service-feature">Shopify, WooCommerce</li>
                            <li class="service-feature">Paiement sécurisé</li>
                            <li class="service-feature">Gestion des stocks</li>
                            <li class="service-feature">Analytics avancées</li>
                        </ul>
                    </div>

                    <div class="service-card">
                        <div class="service-icon">🎨</div>
                        <h3 class="service-title">UI/UX Design</h3>
                        <p class="service-description">
                            Conception d'interfaces utilisateur modernes et expériences optimales.
                        </p>
                        <ul class="service-features">
                            <li class="service-feature">Prototypage interactif</li>
                            <li class="service-feature">Design system cohérent</li>
                            <li class="service-feature">Tests utilisateurs</li>
                            <li class="service-feature">Accessibilité WCAG</li>
                        </ul>
                    </div>

                    <div class="service-card">
                        <div class="service-icon">🚀</div>
                        <h3 class="service-title">Maintenance & Support</h3>
                        <p class="service-description">
                            Accompagnement continu pour garantir performance et sécurité de vos solutions.
                        </p>
                        <ul class="service-features">
                            <li class="service-feature">Monitoring 24/7</li>
                            <li class="service-feature">Mises à jour sécurité</li>
                            <li class="service-feature">Support technique</li>
                            <li class="service-feature">Évolutions fonctionnelles</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section class="process fade-in" id="process">
            <div class="process-container">
                <div class="section-header">
                    <div class="section-badge">🔄 NOTRE MÉTHODE</div>
                    <h2 class="section-title">
                        Un processus <span class="highlight">éprouvé</span> pour votre succès
                    </h2>
                    <p class="section-subtitle">
                        Notre approche structurée garantit la livraison de solutions qui répondent parfaitement à vos attentes et objectifs business.
                    </p>
                </div>

                <div class="process-grid">
                    <div class="process-step">
                        <div class="process-number">1</div>
                        <h3 class="process-title">Analyse & Stratégie</h3>
                        <p class="process-description">
                            Compréhension approfondie de vos besoins, analyse de la concurrence et définition de la stratégie digitale optimale.
                        </p>
                    </div>

                    <div class="process-step">
                        <div class="process-number">2</div>
                        <h3 class="process-title">Conception & Design</h3>
                        <p class="process-description">
                            Création des maquettes, prototypes interactifs et validation de l'expérience utilisateur avant développement.
                        </p>
                    </div>

                    <div class="process-step">
                        <div class="process-number">3</div>
                        <h3 class="process-title">Développement</h3>
                        <p class="process-description">
                            Codage avec les meilleures pratiques, tests rigoureux et livraison itérative pour un feedback continu.
                        </p>
                    </div>

                    <div class="process-step">
                        <div class="process-number">4</div>
                        <h3 class="process-title">Lancement & Suivi</h3>
                        <p class="process-description">
                            Mise en production, formation utilisateur et accompagnement post-lancement pour garantir votre succès.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats fade-in">
            <div class="stats-container">
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-number">200+</span>
                        <span class="stat-label">Projets réalisés</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">150+</span>
                        <span class="stat-label">Clients satisfaits</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">8+</span>
                        <span class="stat-label">Années d'expérience</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">24h</span>
                        <span class="stat-label">Support technique</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta fade-in" id="contact">
            <div class="cta-container">
                <h2>Prêt à transformer votre vision en réalité ?</h2>
                <p>
                    Nous assurons également un suivi post-lancement pour garantir votre satisfaction et le succès de votre entreprise. 
                    Contactez-nous dès aujourd'hui pour discuter de votre projet !
                </p>
                <div class="cta-buttons">
                    <a href="#" class="btn-white">
                        📞 Prendre rendez-vous
                        <span>→</span>
                    </a>
                    <a href="#" class="btn-outline">
                        📧 Nous contacter
                        <span>→</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-content">
                <div class="footer-brand">
                    <a href="#" class="footer-logo">DevStudio</a>
                    <p class="footer-description">
                        Votre partenaire de confiance pour tous vos projets de développement web et mobile. 
                        Innovation, qualité et accompagnement personnalisé.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link">🐙</a>
                        <a href="#" class="social-link">💼</a>
                        <a href="#" class="social-link">🐦</a>
                        <a href="#" class="social-link">📧</a>
                    </div>
                </div>

                <div class="footer-section">
                    <h3>Services</h3>
                    <ul class="footer-links">
                        <li><a href="#services">Développement Web</a></li>
                        <li><a href="#services">Applications Mobile</a></li>
                        <li><a href="#services">E-commerce</a></li>
                        <li><a href="#services">UI/UX Design</a></li>
                        <li><a href="#services">Maintenance</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Entreprise</h3>
                    <ul class="footer-links">
                        <li><a href="#process">Notre Processus</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#">À propos</a></li>
                        <li><a href="#">Carrières</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Contact</h3>
                    <ul class="footer-links">
                        <li><a href="tel:+33123456789">+33 1 23 45 67 89</a></li>
                        <li><a href="mailto:contact@devstudio.fr">contact@devstudio.fr</a></li>
                        <li><a href="#">Paris, France</a></li>
                        <li><a href="#">Devis gratuit</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© 2025 DevStudio. Made with ❤️ for entrepreneurs. Tous droits réservés.</p>
            </div>
        </footer>
    </div>

    <script>
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
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

        // Stats animation
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const numbers = entry.target.querySelectorAll('.stat-number');
                    numbers.forEach(number => {
                        const text = number.textContent;
                        const finalValue = parseInt(text.replace(/[^0-9]/g, ''));
                        if (finalValue && !number.hasAttribute('data-animated')) {
                            number.setAttribute('data-animated', 'true');
                            let currentValue = 0;
                            const increment = finalValue / 40;
                            
                            const timer = setInterval(() => {
                                currentValue += increment;
                                if (currentValue >= finalValue) {
                                    currentValue = finalValue;
                                    clearInterval(timer);
                                }
                                
                                if (text.includes('+')) {
                                    number.textContent = Math.floor(currentValue) + '+';
                                } else if (text.includes('h')) {
                                    number.textContent = Math.floor(currentValue) + 'h';
                                } else {
                                    number.textContent = Math.floor(currentValue);
                                }
                            }, 50);
                        }
                    });
                }
            });
        }, { threshold: 0.5 });

        document.querySelectorAll('.stats').forEach(section => {
            statsObserver.observe(section);
        });

        // Enhanced particle system
        function createParticle() {
            const particle = document.createElement('div');
            const isSpecial = Math.random() < 0.2;
            
            particle.style.cssText = `
                position: fixed;
                width: ${isSpecial ? '4px' : '2px'};
                height: ${isSpecial ? '4px' : '2px'};
                background: ${isSpecial ? 'rgba(255, 107, 53, 0.6)' : 'rgba(0, 255, 136, 0.4)'};
                border-radius: 50%;
                pointer-events: none;
                left: ${Math.random() * window.innerWidth}px;
                top: ${window.innerHeight + 10}px;
                z-index: 1;
                box-shadow: 0 0 ${isSpecial ? '10px' : '6px'} ${isSpecial ? 'rgba(255, 107, 53, 0.3)' : 'rgba(0, 255, 136, 0.2)'};
            `;
            
            document.body.appendChild(particle);
            
            const animation = particle.animate([
                { transform: 'translateY(0) translateX(0) scale(0)', opacity: 0 },
                { transform: 'translateY(-250px) translateX(' + (Math.random() * 100 - 50) + 'px) scale(1)', opacity: 1 },
                { transform: 'translateY(-' + (window.innerHeight + 400) + 'px) translateX(' + (Math.random() * 200 - 100) + 'px) scale(0.8)', opacity: 0 }
            ], {
                duration: isSpecial ? 15000 : 10000,
                easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)'
            });
            
            animation.onfinish = () => particle.remove();
        }
        
        setInterval(createParticle, 3000);

        // Mobile menu toggle
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            const nav = document.querySelector('.nav');
            nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
        });
    </script>
</body>
</html>
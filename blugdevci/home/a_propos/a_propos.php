<?php  session_start();?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À Propos - Learnica</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #ffffff;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            overflow-x: hidden;
            min-height: 100vh;
            position: relative;
        }

        /* Particles Background Effect */
        body::before {
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

        /* Navigation Bar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            backdrop-filter: blur(20px);
            z-index: 1000;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(0, 255, 136, 0.2);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }

        .logo {
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

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            color: #b0b0b0;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .nav-links a:hover {
            color: #00ff88;
            background: rgba(0, 255, 136, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.2);
        }

        .nav-links a.active {
            color: #00ff88;
            background: rgba(0, 255, 136, 0.2);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            padding-top: 80px;
        }

        .hero-content {
            max-width: 900px;
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

        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 300% 300%;
            animation: gradientShift 3s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .hero-subtitle {
            font-size: 1.4rem;
            color: #b0b0b0;
            margin-bottom: 2rem;
            line-height: 1.8;
            font-weight: 300;
        }

        .hero-badges {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
            margin-bottom: 3rem;
        }

        .hero-badge {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 25px;
            padding: 0.8rem 1.5rem;
            font-size: 0.9rem;
            color: #00ff88;
            font-weight: 600;
            position: relative;
            overflow: hidden;
        }

        .hero-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .hero-badge:hover::before {
            left: 100%;
        }

        /* Sections */
        .about-section, .mission-section, .team-section {
            padding: 5rem 0;
            position: relative;
            z-index: 2;
        }

        .container {
            /* max-width: 1200px; */
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* About Section */
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            margin-bottom: 4rem;
        }

        .about-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #b0b0b0;
        }

        .about-text h3 {
            color: #00ff88;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .about-text p {
            margin-bottom: 1.5rem;
        }

        .about-visual {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 20px;
            padding: 3rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
        }

        .about-visual::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #00ff88, #00d4ff);
            background-size: 200% 100%;
            animation: shimmer 3s linear infinite;
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: block;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #b0b0b0;
            font-size: 0.9rem;
        }

        /* Mission Section */
        .mission-section {
            background: rgba(0, 0, 0, 0.3);
        }

        .mission-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .mission-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 20px;
            padding: 3rem;
            text-align: center;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .mission-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .mission-card:hover::before {
            left: 100%;
        }

        .mission-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 255, 136, 0.3);
            border-color: rgba(0, 255, 136, 0.4);
        }

        .mission-icon {
            font-size: 3rem;
            color: #00ff88;
            margin-bottom: 1.5rem;
        }

        .mission-card h3 {
            color: #fff;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .mission-card p {
            color: #b0b0b0;
            line-height: 1.6;
        }

        /* Team Section */
        .team-intro {
            text-align: center;
            margin-bottom: 4rem;
        }

        .team-intro p {
            font-size: 1.2rem;
            color: #b0b0b0;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
            margin-top: 4rem;
        }

        .team-member {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 25px;
            padding: 2.5rem;
            text-align: center;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
        }

        .team-member::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #00ff88, #00d4ff);
            background-size: 200% 100%;
            animation: shimmer 3s linear infinite;
            border-radius: 25px 25px 0 0;
        }

        .team-member:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 255, 136, 0.4);
            border-color: rgba(0, 255, 136, 0.6);
        }

        .member-photo {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: fill;
            border: 3px solid rgba(0, 255, 136, 0.3);
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            background: linear-gradient(45deg, #1e1e1e, #2a2a2a);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #00ff88;
            margin: 0 auto 1.5rem auto;
        }

        .team-member:hover .member-photo {
            transform: scale(1.1);
            box-shadow: 0 0 30px rgba(0, 255, 136, 0.5);
            border-color: rgba(0, 255, 136, 0.8);
        }

        .member-name {
            font-size: 1.4rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 0.5rem;
        }

        .member-role {
            font-size: 1rem;
            color: #00ff88;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        /* .image_user{
            width: 50%;
            height: 50%;
            object-fit: contain;
        } */
        .member-specialty {
            font-size: 0.9rem;
            color: #00d4ff;
            margin-bottom: 1.5rem;
            font-style: italic;
        }

        .member-description {
            font-size: 0.95rem;
            color: #b0b0b0;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .member-social {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            border: 1px solid rgba(0, 255, 136, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #b0b0b0;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-link:hover {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.3);
        }

        /* Toast Notifications */
        .toast-container {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 10000;
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 400px;
        }

        .toast {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 15px;
            padding: 1rem 1.5rem;
            min-height: 80px;
            display: flex;
            align-items: center;
            gap: 1rem;
            position: relative;
            overflow: hidden;
            transform: translateX(450px);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        .toast.show {
            transform: translateX(0);
            opacity: 1;
        }

        .toast::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #00ff88, #00d4ff);
            background-size: 200% 100%;
            animation: shimmer 2s linear infinite;
        }

        .toast-icon {
            font-size: 1.5rem;
            color: #00ff88;
            flex-shrink: 0;
        }

        .toast-content {
            flex: 1;
            color: #fff;
        }

        .toast-title {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.3rem;
            color: #00ff88;
        }

        .toast-message {
            font-size: 0.8rem;
            color: #b0b0b0;
            line-height: 1.4;
        }

        .toast-close {
            background: none;
            border: none;
            color: #888;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .toast-close:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            transform: scale(1.1);
        }

        /* Scroll animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .nav-links {
                display: none;
            }

            .about-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .mission-grid,
            .team-grid {
                grid-template-columns: 1fr;
            }

            .section-title {
                font-size: 2rem;
            }

            .toast-container {
                right: 10px;
                left: 10px;
                max-width: none;
            }

            .toast {
                transform: translateY(-100px);
            }

            .toast.show {
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <?php
       
        if(empty($_SESSION['user']['nom_complet'])){
            include(__DIR__.'/../../navbar/NavBarIndex.php');
        }else{
             include(__DIR__.'/../../navbar/NavBarAcceuil.php');
        }
    ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>À Propos de Learnica</h1>
            <p class="hero-subtitle">
                Nous sommes une équipe passionnée de développeurs et éducateurs, unis par une mission commune : 
                démocratiser l'accès à l'éducation informatique de qualité.
            </p>
            <div class="hero-badges">
                <div class="hero-badge">🚀 Innovation</div>
                <div class="hero-badge">🎯 Excellence</div>
                <div class="hero-badge">🤝 Collaboration</div>
                <div class="hero-badge">💡 Créativité</div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <h2 class="section-title">Notre Histoire</h2>
            <div class="about-content fade-in">
                <div class="about-text">
                    <h3>🎯 Ce qu'est Learnica</h3>
                    <p>
                        Learnica est une plateforme éducative moderne conçue pour révolutionner l'apprentissage de l'informatique. 
                        Nous offrons plus de 500 documents gratuits, des formations interactives et une communauté active de développeurs passionnés.
                    </p>
                    
                    <h3>💡 Pourquoi nous l'avons créé</h3>
                    <p>
                        Nous avons constaté un manque cruel de ressources éducatives accessibles et de qualité en informatique, 
                        particulièrement en français. Trop d'étudiants et de professionnels se heurtent à des barrières d'accès 
                        à l'information technique de qualité.
                    </p>
                    
                    <h3>🎪 Notre objectif</h3>
                    <p>
                        Notre mission est de créer un écosystème éducatif complet où chacun peut apprendre, progresser et partager 
                        ses connaissances. Nous voulons former la prochaine génération de développeurs talentueux en Afrique et dans le monde.
                    </p>
                </div>
                <div class="about-visual fade-in">
                    <div class="stats-grid">
                        <div class="stat-item">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Documents Gratuits</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">5000+</span>
                            <span class="stat-label">Étudiants Formés</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">50+</span>
                            <span class="stat-label">Formations</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">98%</span>
                            <span class="stat-label">Satisfaction</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission-section" id="mission">
        <div class="container">
            <h2 class="section-title">Nos Valeurs</h2>
            <div class="mission-grid">
                <div class="mission-card fade-in">
                    <div class="mission-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Éducation Accessible</h3>
                    <p>
                        Nous croyons que l'éducation de qualité doit être accessible à tous, 
                        indépendamment de la situation géographique ou financière.
                    </p>
                </div>
                <div class="mission-card fade-in">
                    <div class="mission-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Communauté Forte</h3>
                    <p>
                        Nous construisons une communauté bienveillante où l'entraide et 
                        le partage de connaissances sont au cœur de notre philosophie.
                    </p>
                </div>
                <div class="mission-card fade-in">
                    <div class="mission-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3>Innovation Continue</h3>
                    <p>
                        Nous restons à la pointe de la technologie pour offrir les meilleures 
                        méthodes d'apprentissage et les contenus les plus actuels.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section" id="team">
        <div class="container">
            <h2 class="section-title">Notre Équipe</h2>
            <div class="team-intro">
                <p>
                    L’équipe derrière Learnica réunit des développeurs passionnés
                    et créatifs, spécialisés dans le web et le mobile. Ensemble,
                    nous combinons expertise technique et innovation pour offrir 
                    une application moderne, intuitive et adaptée aux besoins des 
                    apprenants. Notre mission : faire de Learnica une référence dans
                    l’univers de la formation digitale.
                </p>
            </div>
            <div class="team-grid">
                <!-- Membre 1 -->
                <div class="team-member fade-in" onclick="showMemberDetails('Apalo Coulibaly')">
                    <div class="member-phot">
                        <img class="member-photo" src="../../../imagesite/aplo.jpg" alt="">
                    </div>
                    <h3 class="member-name">_Apaloh Coulibaly</h3>
                    <p class="member-role">Fondateur & CEO</p>
                    <p class="member-specialty">🚀 Full-Stack Developer & formateur</p>
                    <p class="member-description">
                        Développeur d’applications web Full Stack et mobiles (Flutter & WinDev Mobile), 
                        il est passionné par le code et l’innovation technologique. Avec 2 ans d’expérience,
                         il se distingue par sa capacité à concevoir des solutions digitales modernes et
                          performantes. Originaire de Côte d’Ivoire, il ambitionne de contribuer activement à 
                          l’évolution numérique en Afrique et au-delà.
                    </p>
                    <div class="member-social">
                        <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <!-- Membre 2 -->
                <div class="team-member fade-in" onclick="showMemberDetails('Marie Koffi')">
                    <div class="member-photo">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3 class="member-name">Marie Koffi</h3>
                    <p class="member-role">CTO & Lead Developer</p>
                    <p class="member-specialty">💻 Frontend Specialist & UX/UI</p>
                    <p class="member-description">
                        Experte en technologies frontend modernes, Marie excelle dans la création 
                        d'interfaces utilisateur intuitives. Elle maîtrise React, Vue.js et les 
                        dernières tendances en UX/UI design.
                    </p>
                    <div class="member-social">
                        <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-dribbble"></i></a>
                    </div>
                </div>

                <!-- Membre 3 -->
                <div class="team-member fade-in" onclick="showMemberDetails('Ibrahim Traoré')">
                    <div class="member-photo">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3 class="member-name">Ibrahim Traoré</h3>
                    <p class="member-role">Backend Architect</p>
                    <p class="member-specialty">⚡ API Development & Database Expert</p>
                    <p class="member-description">
                        Architecte backend chevronné, Ibrahim conçoit des systèmes robustes et scalables. 
                        Spécialiste en Node.js, Python et architectures microservices, il assure 
                        la performance technique de la plateforme.
                    </p>
                    <div class="member-social">
                        <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-stack-overflow"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>
                <?php
                    if(!empty($_SESSION['user'])){
                        include(__DIR__.'/../../navbar/footer.php');
                    }
                ?>     

    <script>
        // Toast Notification System
        class ToastManager {
            constructor() {
                this.container = document.getElementById('toastContainer');
                this.toasts = [];
                this.maxToasts = 3;
            }

            createToast(type, title, message) {
                const toast = document.createElement('div');
                toast.className = `toast ${type}`;
                
                const iconMap = {
                    'team': '👥',
                    'info': 'ℹ️',
                    'success': '✅',
                    'welcome': '🎉'
                };

                toast.innerHTML = `
                    <div class="toast-icon">${iconMap[type] || '💡'}</div>
                    <div class="toast-content">
                        <div class="toast-title">${title}</div>
                        <div class="toast-message">${message}</div>
                    </div>
                    <button class="toast-close" onclick="toastManager.removeToast(this.parentElement)">×</button>
                `;

                return toast;
            }

            showToast(type, title, message, duration = 5000) {
                if (this.toasts.length >= this.maxToasts) {
                    this.removeToast(this.toasts[0]);
                }

                const toast = this.createToast(type, title, message);
                this.container.appendChild(toast);
                this.toasts.push(toast);

                setTimeout(() => {
                    toast.classList.add('show');
                }, 100);

                setTimeout(() => {
                    this.removeToast(toast);
                }, duration);

                return toast;
            }

            removeToast(toast) {
                if (!toast || !this.container.contains(toast)) return;
                
                toast.classList.remove('show');
                setTimeout(() => {
                    if (this.container.contains(toast)) {
                        this.container.removeChild(toast);
                        this.toasts = this.toasts.filter(t => t !== toast);
                    }
                }, 400);
            }
        }

        const toastManager = new ToastManager();

        // Afficher les détails d'un membre d'équipe
        function showMemberDetails(memberName) {
            const memberMessages = {
                'Apalo Coulibaly': 'Découvrez le parcours inspirant de notre fondateur et CEO',
                'Marie Koffi': 'Explorez l\'expertise frontend et UX/UI de notre CTO',
                'Ibrahim Traoré': 'Plongez dans l\'architecture backend avec notre expert technique',
                'Fatou Keita': 'Découvrez comment nous créons du contenu pédagogique de qualité',
                'Youssouf Diallo': 'Explorez le développement mobile cross-platform avec Youssouf',
                'Aminata Ouattara': 'Découvrez comment l\'IA transforme l\'apprentissage sur Learnica'
            };

            toastManager.showToast(
                'team',
                `${memberName} 👋`,
                memberMessages[memberName] || `En savoir plus sur ${memberName}`
            );
        }

        // Animations au scroll
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

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Animation des compteurs
        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target.toString() + (target === 98 ? '%' : '+');
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current).toString() + (target === 98 ? '%' : '+');
                }
            }, 20);
        }

        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const numberEl = entry.target.querySelector('.stat-number');
                    const target = parseInt(numberEl.textContent);
                    if (!numberEl.classList.contains('animated')) {
                        numberEl.classList.add('animated');
                        animateCounter(numberEl, target);
                    }
                }
            });
        }, observerOptions);

        document.querySelectorAll('.stat-item').forEach(item => {
            counterObserver.observe(item);
        });

        // Navigation fluide
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

        // Message de bienvenue
        setTimeout(() => {
            toastManager.showToast(
                'welcome',
                'Bienvenue sur notre page À Propos ! 🎉',
                'Découvrez l\'histoire et l\'équipe derrière Learnica'
            );
        }, 2000);

        // Effet parallax sur le hero
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.hero');
            const speed = scrolled * 0.3;
            parallax.style.transform = `translateY(${speed}px)`;
        });

        // Interactions avec les liens sociaux
        document.querySelectorAll('.social-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                
                const platform = link.querySelector('i').classList[1].replace('fa-', '');
                toastManager.showToast(
                    'info',
                    'Lien Social 🔗',
                    `Redirection vers ${platform.charAt(0).toUpperCase() + platform.slice(1)}`
                );
            });
        });

        // Easter egg sur le logo
        document.querySelector('.logo').addEventListener('click', (e) => {
            e.preventDefault();
            toastManager.showToast(
                'success',
                'Easter Egg! 🥚',
                'Vous avez découvert un secret de l\'équipe Learnica! 🎉'
            );
        });
    </script>
</body>
</html>
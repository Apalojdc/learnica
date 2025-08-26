<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevBlog - Navbar Modern</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #0a0a0a;
            color: #fff;
            line-height: 1.6;
        }

        /* Navbar Styles */
        .navbar {
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 50%, #16213e 100%);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
        }

        .navbar.scrolled {
            background: linear-gradient(135deg, rgba(10, 10, 10, 0.95) 0%, rgba(26, 26, 46, 0.95) 50%, rgba(22, 33, 62, 0.95) 100%);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.4);
            transform: translateY(-2px);
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Logo */
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 300% 300%;
            animation: gradientShift 3s ease infinite;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .logo::before {
            content: '💻';
            font-size: 2rem;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo:hover::before {
            transform: rotate(10deg);
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Navigation Links */
        .navbar-links {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .navbar-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            padding: 0.6rem 1.2rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid transparent;
        }

        .navbar-links a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(78, 205, 196, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .navbar-links a:hover::before {
            left: 100%;
        }

        .navbar-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #ff6b6b, #4ecdc4);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar-links a:hover::after {
            width: 80%;
        }

        .navbar-links a:hover {
            color: #4ecdc4;
            background: rgba(78, 205, 196, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(78, 205, 196, 0.2);
            border-color: rgba(78, 205, 196, 0.3);
        }

        .navbar-links a.active {
            color: #ff6b6b;
            background: rgba(255, 107, 107, 0.1);
            border-color: rgba(255, 107, 107, 0.3);
        }

        /* Auth Button */
        .auth-button {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            color: white;
            border: none;
            padding: 0.7rem 1.8rem;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }

        .auth-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .auth-button:hover::before {
            left: 100%;
        }

        .auth-button:hover {
            background: linear-gradient(45deg, #e74c3c, #27ae60);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 107, 0.4);
        }

        .auth-button i {
            font-size: 1.1rem;
        }

        /* Action Buttons */
        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .action-btn {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.8);
            padding: 0.6rem;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            text-decoration: none;
        }

        .action-btn:hover {
            background: rgba(78, 205, 196, 0.2);
            border-color: #4ecdc4;
            color: #4ecdc4;
            transform: translateY(-2px);
        }

        .search-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-input {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            padding: 0.6rem 1rem 0.6rem 2.5rem;
            color: white;
            width: 250px;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .search-input:focus {
            outline: none;
            border-color: #4ecdc4;
            box-shadow: 0 0 0 3px rgba(78, 205, 196, 0.1);
            background: rgba(255, 255, 255, 0.15);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
        }

        /* Menu Hamburger */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 0.5rem;
            z-index: 1001;
            transition: transform 0.3s ease;
        }

        .hamburger:hover {
            transform: scale(1.1);
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: linear-gradient(90deg, #ff6b6b, #4ecdc4);
            margin: 3px 0;
            transition: 0.3s;
            border-radius: 2px;
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(45deg) translate(-5px, -6px);
        }

        /* Notification Badge */
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: linear-gradient(45deg, #ff6b6b, #e74c3c);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 50%, #16213e 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
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

        /* Social Buttons */
        .social-buttons {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            z-index: 1000;
        }

        .social-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
            animation: bounce 2s infinite;
        }

        .whatsapp-btn {
            background: linear-gradient(45deg, #25d366, #128c7e);
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
        }

        .telegram-btn {
            background: linear-gradient(45deg, #0088cc, #0077b5);
            box-shadow: 0 4px 15px rgba(0, 136, 204, 0.4);
        }

        .social-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }
            
            .navbar-container {
                position: relative;
                padding: 0 1rem;
            }
            
            .navbar-links {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 50%, #16213e 100%);
                backdrop-filter: blur(20px);
                flex-direction: column;
                padding: 2rem;
                gap: 1rem;
                transform: translateY(-100%);
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            }
            
            .navbar-links.active {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }
            
            .navbar-links a {
                padding: 1rem 1.5rem;
                font-size: 1.1rem;
                text-align: center;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: 10px;
                width: 100%;
            }
            
            .navbar-links a:hover {
                transform: translateX(10px);
                border-left: 3px solid #4ecdc4;
            }

            .header-actions {
                display: none;
            }

            .search-container {
                margin-bottom: 1rem;
            }

            .search-input {
                width: 100%;
            }
            
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .logo {
                font-size: 1.5rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .social-buttons {
                bottom: 10px;
                right: 10px;
            }

            .social-btn {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar" id="navbar">
        <div class="navbar-container">
            <a href="#" class="logo">DevBlog</a>
            
            <div class="hamburger" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <ul class="navbar-links" id="navLinks">
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Rechercher..." id="searchInput">
                    <i class="fas fa-search search-icon"></i>
                </div>
                <li><a href="#" class="active">Accueil</a></li>
                <li><a href="#">Articles</a></li>
                <li><a href="#">Documentation</a></li>
                <li><a href="#">À propos</a></li>
                <li><a href="#">Blog CI</a></li>
            </ul>
            
            <div class="header-actions">
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Rechercher...">
                    <i class="fas fa-search search-icon"></i>
                </div>
                
                <a href="#" class="action-btn" title="Notifications">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </a>
                
                <a href="#" class="action-btn" title="Paramètres">
                    <i class="fas fa-cog"></i>
                </a>
                
                <a href="#" class="auth-button">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Connexion</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1 class="hero-title">Explorez le Monde du Développement</h1>
            <p class="hero-subtitle">Découvrez les dernières tendances, apprenez de nouvelles technologies et développez vos compétences avec nos articles et ressources exclusives.</p>
            <a href="#" class="cta-button">
                <i class="fas fa-rocket"></i> Commencer l'Aventure
            </a>
        </div>
    </section>

    <!-- Social Buttons -->
    <div class="social-buttons">
        <a href="https://t.me/docspdfgratuit" class="social-btn telegram-btn" title="Rejoindre notre chaine Telegram">
            <i class="fab fa-telegram"></i>
        </a>
        <a href="https://chat.whatsapp.com/KyBCjg36sJS1DhyWyR0K72" class="social-btn whatsapp-btn" title="Rejoindre notre groupe WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <script>
        // Fonction pour basculer le menu mobile
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            const hamburger = document.querySelector('.hamburger');
            
            navLinks.classList.toggle('active');
            hamburger.classList.toggle('active');
        }

        // Fermer le menu mobile en cliquant sur un lien
        document.querySelectorAll('.navbar-links a').forEach(link => {
            link.addEventListener('click', (e) => {
                if (!e.target.closest('.search-container')) {
                    const navLinks = document.getElementById('navLinks');
                    const hamburger = document.querySelector('.hamburger');
                    
                    navLinks.classList.remove('active');
                    hamburger.classList.remove('active');
                }
            });
        });

        // Effet de scroll sur la navbar
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Gestion des liens actifs
        document.querySelectorAll('.navbar-links a').forEach(link => {
            link.addEventListener('click', function(e) {
                if (!e.target.closest('.search-container')) {
                    // Retirer la classe active de tous les liens
                    document.querySelectorAll('.navbar-links a').forEach(l => l.classList.remove('active'));
                    // Ajouter la classe active au lien cliqué
                    this.classList.add('active');
                }
            });
        });

        // Fonction de recherche
        const searchInputs = document.querySelectorAll('.search-input');
        searchInputs.forEach(input => {
            input.addEventListener('input', function() {
                const query = this.value.toLowerCase();
                console.log('Recherche:', query);
                // Ici vous pouvez ajouter votre logique de recherche
            });
        });

        // Animation du bouton d'authentification
        document.querySelector('.auth-button').addEventListener('click', function(e) {
            e.preventDefault();
            const button = this;
            
            // Animation de clic
            button.style.transform = 'scale(0.95)';
            setTimeout(() => {
                button.style.transform = 'translateY(-2px)';
            }, 150);
            
            // Simuler changement d'état
            const span = button.querySelector('span');
            const icon = button.querySelector('i');
            
            if (span.textContent === 'Connexion') {
                span.textContent = 'Déconnexion';
                icon.className = 'fas fa-sign-out-alt';
            } else {
                span.textContent = 'Connexion';
                icon.className = 'fas fa-sign-in-alt';
            }
        });

        // Fermer le menu mobile en cliquant à l'extérieur
        document.addEventListener('click', function(e) {
            const navLinks = document.getElementById('navLinks');
            const hamburger = document.querySelector('.hamburger');
            const navbar = document.querySelector('.navbar');
            
            if (!navbar.contains(e.target) && navLinks.classList.contains('active')) {
                navLinks.classList.remove('active');
                hamburger.classList.remove('active');
            }
        });

        // Animation des notifications
        const notificationBadge = document.querySelector('.notification-badge');
        if (notificationBadge) {
            setInterval(() => {
                notificationBadge.style.animation = 'none';
                setTimeout(() => {
                    notificationBadge.style.animation = 'pulse 2s infinite';
                }, 10);
            }, 5000);
        }

        // Smooth scrolling
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
    </script>
</body>
</html>
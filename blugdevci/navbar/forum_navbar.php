<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Réutilisable - DevStudio</title>
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
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, var(--dark-bg) 0%, var(--darker-bg) 50%, var(--dark-bg) 100%);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
        }

        /* ==================== NAVBAR STYLES ==================== */
        .navbar {
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
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar.scrolled {
            background: linear-gradient(145deg, rgba(30, 30, 30, 0.98), rgba(42, 42, 42, 0.98));
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            padding: 0.8rem 0;
        }

        .navbar-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        /* Logo */
        .navbar-logo {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            position: relative;
            transition: all 0.3s ease;
            z-index: 1001;
        }

        .navbar-logo:hover {
            transform: scale(1.05);
            filter: drop-shadow(0 0 20px rgba(0, 255, 136, 0.4));
        }

        /* Navigation Links */
        .navbar-nav {
            display: flex;
            gap: 2.5rem;
            align-items: center;
            list-style: none;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            padding: 0.8rem 0;
            position: relative;
            transition: all 0.3s ease;
            display: block;
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

        /* Active state */
        .nav-link.active {
            color: var(--primary-green);
            font-weight: 600;
        }

        .nav-link.active::after {
            width: 100%;
        }

        /* CTA Button */
        .navbar-cta {
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            color: #000;
            padding: 1rem 2rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
            white-space: nowrap;
        }

        .navbar-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.4);
        }

        /* Mobile Menu Button */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--text-primary);
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            z-index: 1001;
            position: relative;
        }

        .mobile-menu-toggle:hover {
            background: rgba(0, 255, 136, 0.1);
            color: var(--primary-green);
        }

        /* Hamburger Animation */
        .hamburger {
            width: 24px;
            height: 18px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .hamburger span {
            width: 100%;
            height: 2px;
            background: currentColor;
            border-radius: 2px;
            transition: all 0.3s ease;
            transform-origin: center;
        }

        .mobile-menu-toggle.active .hamburger span:nth-child(1) {
            transform: rotate(45deg) translate(6px, 6px);
        }

        .mobile-menu-toggle.active .hamburger span:nth-child(2) {
            opacity: 0;
        }

        .mobile-menu-toggle.active .hamburger span:nth-child(3) {
            transform: rotate(-45deg) translate(6px, -6px);
        }

        /* Mobile Menu */
        .mobile-menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            backdrop-filter: blur(20px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .mobile-menu.active {
            transform: translateX(0);
        }

        .mobile-nav-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 600;
            padding: 1rem 2rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            text-align: center;
            min-width: 200px;
        }

        .mobile-nav-link:hover {
            color: var(--primary-green);
            background: rgba(0, 255, 136, 0.1);
            transform: translateX(10px);
        }

        .mobile-nav-link.active {
            color: var(--primary-green);
            background: rgba(0, 255, 136, 0.15);
        }

        .mobile-cta {
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            color: #000;
            padding: 1.2rem 3rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.2rem;
            margin-top: 2rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.3);
        }

        .mobile-cta:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 35px rgba(0, 255, 136, 0.4);
        }

        /* Responsive Breakpoints */
        @media (max-width: 1024px) {
            .navbar-nav {
                gap: 2rem;
            }

            .navbar-container {
                padding: 0 1.5rem;
            }

            .navbar-cta {
                padding: 0.8rem 1.5rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 768px) {
            .navbar-nav {
                display: none;
            }

            .navbar-cta {
                display: none;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .navbar-container {
                padding: 0 1rem;
            }

            .navbar-logo {
                font-size: 1.7rem;
            }
        }

        @media (max-width: 480px) {
            .navbar-container {
                padding: 0 1rem;
            }

            .navbar-logo {
                font-size: 1.5rem;
            }

            .mobile-nav-link {
                font-size: 1.3rem;
                min-width: 180px;
            }
        }

        /* Demo Content */
        .demo-content {
            padding: 120px 2rem 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .demo-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 2rem;
            background: linear-gradient(45deg, var(--primary-green), var(--primary-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .demo-text {
            color: var(--text-secondary);
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 3rem;
        }

        .demo-section {
            background: linear-gradient(145deg, var(--card-bg), var(--card-hover));
            border-radius: 15px;
            padding: 3rem;
            margin: 3rem 0;
            border: 1px solid var(--border-color);
        }

        .code-block {
            background: var(--dark-bg);
            border-radius: 8px;
            padding: 1.5rem;
            margin: 2rem 0;
            border: 1px solid var(--border-color);
            text-align: left;
            overflow-x: auto;
        }

        .code-block code {
            color: var(--primary-green);
            font-family: 'Courier New', monospace;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        /* Overlay for mobile menu */
        .mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .mobile-overlay.active {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body>
    <!-- ==================== NAVBAR COMPONENT ==================== -->
    <nav class="navbar" id="navbar">
        <div class="navbar-container">
            <!-- Logo -->
            <a href="#accueil" class="navbar-logo" data-page="accueil">DevStudio</a>
            
            <!-- Desktop Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#accueil" class="nav-link active" data-page="accueil">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="#blog" class="nav-link" data-page="blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="#forum" class="nav-link" data-page="forum">Forum</a>
                </li>
                <li class="nav-item">
                    <a href="#services" class="nav-link" data-page="services">Services</a>
                </li>
                <li class="nav-item">
                    <a href="#portfolio" class="nav-link" data-page="portfolio">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link" data-page="contact">Contact</a>
                </li>
            </ul>
            
            <!-- CTA Button -->
            <a href="#contact" class="navbar-cta">Démarrer un projet</a>
            
            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" id="mobileMenuToggle">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-overlay" id="mobileOverlay"></div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <a href="#accueil" class="mobile-nav-link active" data-page="accueil">Accueil</a>
        <a href="#blog" class="mobile-nav-link" data-page="blog">Blog</a>
        <a href="#forum" class="mobile-nav-link" data-page="forum">Forum</a>
        <a href="#services" class="mobile-nav-link" data-page="services">Services</a>
        <a href="#portfolio" class="mobile-nav-link" data-page="portfolio">Portfolio</a>
        <a href="#contact" class="mobile-nav-link" data-page="contact">Contact</a>
        <a href="#contact" class="mobile-cta">Démarrer un projet</a>
    </div>

    <!-- ==================== DEMO CONTENT ==================== -->
    <!-- <main class="demo-content">
        <h1 class="demo-title">Navbar Réutilisable</h1>
        <p class="demo-text">
            Voici ta navbar component prête à être intégrée sur toutes tes pages ! 
            Elle inclut les états actifs, le responsive design et toutes les animations.
        </p>

        <div class="demo-section">
            <h2 style="color: var(--primary-green); margin-bottom: 1.5rem;">🚀 Fonctionnalités</h2>
            <ul style="text-align: left; color: var(--text-secondary); line-height: 2;">
                <li>✅ Navigation active automatique</li>
                <li>✅ Menu mobile responsive avec animation</li>
                <li>✅ Effet scroll avec backdrop blur</li>
                <li>✅ Hover effects et transitions fluides</li>
                <li>✅ Design cohérent avec ton style</li>
                <li>✅ Facilement intégrable partout</li>
            </ul>
        </div>

        <div class="demo-section">
            <h2 style="color: var(--primary-green); margin-bottom: 1.5rem;">📝 Comment l'utiliser</h2>
            <p style="color: var(--text-secondary); margin-bottom: 1.5rem;">
                Pour activer le bon lien selon la page courante, ajoute ce script sur chaque page :
            </p>
            
            <div class="code-block">
                <code>
                    // Sur ta page blog.php par exemple :<br>
                    &lt;script&gt;<br>
                    &nbsp;&nbsp;// Active le lien "Blog" au chargement de la page<br>
                    &nbsp;&nbsp;document.addEventListener('DOMContentLoaded', function() {<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;setActivePage('blog');<br>
                    &nbsp;&nbsp;});<br>
                    &lt;/script&gt;<br><br>

                    // Ou directement dans le HTML :<br>
                    &lt;body data-page="blog"&gt;<br><br>

                    // Les pages disponibles :<br>
                    // 'accueil', 'blog', 'forum', 'services', 'portfolio', 'contact'
                </code>
            </div>
        </div>

        <div class="demo-section">
            <h2 style="color: var(--primary-green); margin-bottom: 1.5rem;">🎨 Personnalisation</h2>
            <p style="color: var(--text-secondary); margin-bottom: 1.5rem;">
                Modifie facilement les liens dans la navbar en changeant les href et data-page. 
                Le CSS s'adapte automatiquement !
            </p>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-top: 2rem;">
                <div style="padding: 1rem; background: rgba(0, 255, 136, 0.1); border-radius: 8px; border: 1px solid var(--border-color);">
                    <strong style="color: var(--primary-green);">Mobile</strong><br>
                    <span style="color: var(--text-secondary);">Menu hamburger animé</span>
                </div>
                <div style="padding: 1rem; background: rgba(0, 212, 255, 0.1); border-radius: 8px; border: 1px solid var(--border-color);">
                    <strong style="color: var(--primary-blue);">Desktop</strong><br>
                    <span style="color: var(--text-secondary);">Navigation horizontale</span>
                </div>
                <div style="padding: 1rem; background: rgba(255, 107, 53, 0.1); border-radius: 8px; border: 1px solid var(--border-color);">
                    <strong style="color: #ff6b35;">Scroll</strong><br>
                    <span style="color: var(--text-secondary);">Effet backdrop blur</span>
                </div>
            </div>
        </div>
    </main> -->

    <!-- ==================== NAVBAR JAVASCRIPT ==================== -->
    <script>
        // Gestion du scroll pour l'effet navbar
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Gestion du menu mobile
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileOverlay = document.getElementById('mobileOverlay');

        function toggleMobileMenu() {
            const isActive = mobileMenu.classList.contains('active');
            
            if (isActive) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        }

        function openMobileMenu() {
            mobileMenu.classList.add('active');
            mobileOverlay.classList.add('active');
            mobileMenuToggle.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            mobileMenu.classList.remove('active');
            mobileOverlay.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
            document.body.style.overflow = '';
        }

        // Event listeners pour le menu mobile
        mobileMenuToggle.addEventListener('click', toggleMobileMenu);
        mobileOverlay.addEventListener('click', closeMobileMenu);

        // Fermer le menu mobile lors du clic sur un lien
        document.querySelectorAll('.mobile-nav-link, .mobile-cta').forEach(link => {
            link.addEventListener('click', closeMobileMenu);
        });

        // Fermer le menu mobile avec Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
                closeMobileMenu();
            }
        });

        // Fonction pour définir la page active
        function setActivePage(pageName) {
            // Enlever la classe active de tous les liens
            document.querySelectorAll('.nav-link, .mobile-nav-link').forEach(link => {
                link.classList.remove('active');
            });
            
            // Ajouter la classe active aux liens correspondants
            document.querySelectorAll(`[data-page="${pageName}"]`).forEach(link => {
                link.classList.add('active');
            });
        }

        // Gestion automatique de la page active basée sur l'URL ou data-page du body
        document.addEventListener('DOMContentLoaded', function() {
            // Vérifier si le body a un attribut data-page
            const bodyPage = document.body.getAttribute('data-page');
            if (bodyPage) {
                setActivePage(bodyPage);
                return;
            }

            // Sinon, essayer de déterminer la page depuis l'URL
            const currentPage = window.location.pathname;
            
            if (currentPage.includes('blog')) {
                setActivePage('blog');
            } else if (currentPage.includes('forum')) {
                setActivePage('forum');
            } else if (currentPage.includes('services')) {
                setActivePage('services');
            } else if (currentPage.includes('portfolio')) {
                setActivePage('portfolio');
            } else if (currentPage.includes('contact')) {
                setActivePage('contact');
            } else {
                setActivePage('accueil'); // Page par défaut
            }
        });

        // Gestion des clics sur les liens pour changement de page active
        document.querySelectorAll('.nav-link, .mobile-nav-link, .navbar-logo').forEach(link => {
            link.addEventListener('click', function(e) {
                const pageName = this.getAttribute('data-page');
                if (pageName) {
                    setActivePage(pageName);
                }
            });
        });

        // Smooth scrolling pour les ancres (optionnel)
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Resize handler pour fermer le menu mobile si on resize vers desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768 && mobileMenu.classList.contains('active')) {
                closeMobileMenu();
            }
        });

        // Fonction utilitaire pour mettre à jour les liens (si tu veux changer dynamiquement)
        function updateNavLinks(newLinks) {
            const desktopNav = document.querySelector('.navbar-nav');
            const mobileNav = document.querySelector('.mobile-menu');
            
            // Clear existing links
            desktopNav.innerHTML = '';
            mobileNav.innerHTML = '';
            
            // Add new links
            newLinks.forEach(link => {
                // Desktop link
                const desktopLi = document.createElement('li');
                desktopLi.className = 'nav-item';
                desktopLi.innerHTML = `<a href="${link.href}" class="nav-link" data-page="${link.page}">${link.text}</a>`;
                desktopNav.appendChild(desktopLi);
                
                // Mobile link
                const mobileLink = document.createElement('a');
                mobileLink.href = link.href;
                mobileLink.className = 'mobile-nav-link';
                mobileLink.setAttribute('data-page', link.page);
                mobileLink.textContent = link.text;
                mobileNav.appendChild(mobileLink);
            });
            
            // Re-add mobile CTA
            const mobileCTA = document.createElement('a');
            mobileCTA.href = '#contact';
            mobileCTA.className = 'mobile-cta';
            mobileCTA.textContent = 'Démarrer un projet';
            mobileNav.appendChild(mobileCTA);
        }

        // Export des fonctions principales pour utilisation externe
        window.NavbarUtils = {
            setActivePage: setActivePage,
            updateNavLinks: updateNavLinks,
            openMobileMenu: openMobileMenu,
            closeMobileMenu: closeMobileMenu
        };
    </script>
</body>
</html>
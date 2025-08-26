<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Simplifiée</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-gradient: linear-gradient(45deg, #00ff88, #00d4ff);
            --secondary-gradient: linear-gradient(135deg, #00ff88 0%, #00d4ff 100%);
            --dark-bg: #0a0a0a;
            --card-bg: rgba(0, 255, 136, 0.1);
            --glass-bg: rgba(0, 255, 136, 0.15);
            --border-color: rgba(0, 255, 136, 0.2);
            --text-primary: #ffffff;
            --text-secondary: #b0b0b0;
            --text-muted: #888888;
            --shadow-lg: 0 20px 40px rgba(0, 255, 136, 0.2);
            --border-radius: 8px;
            --border-radius-sm: 6px;
            --transition: all 0.3s ease;
            --primary-color: #00ff88;
        }

        body {
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 50%, #16213e 100%);
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
        }

        /* Header principale */
        .lernica-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(145deg, rgba(10, 10, 10, 0.95), rgba(30, 30, 30, 0.9));
            height: 90px;
            box-shadow: 0 2px 20px rgba(0, 255, 136, 0.1);
        }

        .lernica-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(0, 255, 136, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.05) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        .lernica-header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }

        .lernica-header-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 60%;
            padding-top: 0.5rem;
        }

        .lernica-header-bottom {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 40%;
            padding-bottom: 0.5rem;
        }

        /* Logo */
        .lernica-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: bold;
        }

        .lernica-logo-icon {
            width: 45px;
            height: 45px;
            background: var(--primary-gradient);
            border-radius: var(--border-radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            transition: var(--transition);
            color: #000;
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
            animation: logoGlow 3s ease-in-out infinite alternate;
        }

        @keyframes logoGlow {
            from { 
                filter: drop-shadow(0 0 5px rgba(0, 255, 136, 0.3));
                transform: scale(1);
            }
            to { 
                filter: drop-shadow(0 0 15px rgba(0, 255, 136, 0.6));
                transform: scale(1.05);
            }
        }

        .lernica-logo-text {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            font-size: 1.4rem;
            letter-spacing: -0.02em;
        }

        /* Navigation - Section droite */
        .lernica-nav-right {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Navigation - Liens principaux */
        .lernica-nav-main {
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .lernica-nav-links {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            list-style: none;
        }

        .lernica-nav-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.2rem;
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
            border: 1px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .lernica-nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .lernica-nav-link:hover::before {
            left: 100%;
        }

        .lernica-nav-link:hover {
            color: var(--text-primary);
            background: var(--card-bg);
            border-color: var(--border-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.2);
        }

        .lernica-nav-link.active {
            color: #000;
            background: var(--primary-gradient);
            border-color: rgba(0, 255, 136, 0.3);
            font-weight: 700;
            box-shadow: 0 4px 20px rgba(0, 255, 136, 0.4);
        }

        /* Barre de recherche */
        .lernica-search-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .lernica-search-input {
            width: 280px;
            padding: 0.6rem 0.75rem 0.6rem 2.5rem;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            color: var(--text-primary);
            font-size: 0.85rem;
            transition: var(--transition);
            backdrop-filter: blur(10px);
            outline: none;
        }

        .lernica-search-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(0, 255, 136, 0.2);
            background: var(--glass-bg);
            transform: scale(1.02);
        }

        .lernica-search-input::placeholder {
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .lernica-search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .lernica-search-input:focus + .lernica-search-icon {
            color: var(--primary-color);
        }

        /* Bouton mobile */
        .lernica-mobile-btn {
            display: none;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: var(--border-radius-sm);
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            transition: var(--transition);
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
        }

        .lernica-mobile-btn:hover {
            background: var(--glass-bg);
            color: var(--text-primary);
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.2);
        }

        .lernica-mobile-btn.active {
            color: #000;
            background: var(--primary-gradient);
            border-color: rgba(0, 255, 136, 0.3);
            box-shadow: 0 4px 20px rgba(0, 255, 136, 0.4);
        }

        /* Contenu de démonstration */
        .demo-content {
            margin-top: 120px;
            padding: 2rem;
            text-align: center;
            color: var(--text-primary);
        }

        .demo-content h1 {
            font-size: 2.5rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .demo-content p {
            color: var(--text-secondary);
            font-size: 1.1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .lernica-mobile-btn {
                display: flex;
            }
            
            .lernica-header {
                height: 130px;
            }
            
            .lernica-nav-main {
                position: fixed;
                top: 90px;
                left: 0;
                right: 0;
                background: linear-gradient(145deg, rgba(10, 10, 10, 0.98), rgba(30, 30, 30, 0.95));
                backdrop-filter: blur(25px);
                border-bottom: 1px solid var(--border-color);
                padding: 1.5rem;
                flex-direction: column;
                gap: 1rem;
                transform: translateY(-100%);
                opacity: 0;
                visibility: hidden;
                transition: var(--transition);
            }
            
            .lernica-nav-main.active {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }
            
            .lernica-nav-links {
                flex-direction: column;
                gap: 0.75rem;
                width: 100%;
            }
            
            .lernica-nav-link {
                padding: 0.75rem 1rem;
                width: 100%;
                justify-content: center;
            }
            
            .lernica-nav-right {
                position: fixed;
                top: 90px;
                right: 0;
                left: 0;
                background: linear-gradient(145deg, rgba(10, 10, 10, 0.98), rgba(30, 30, 30, 0.95));
                backdrop-filter: blur(25px);
                border-bottom: 1px solid var(--border-color);
                padding: 1rem 1.5rem;
                justify-content: center;
                gap: 1rem;
                transform: translateY(-100%);
                opacity: 0;
                visibility: hidden;
                transition: var(--transition);
                margin-top: 120px;
            }
            
            .lernica-nav-right.active {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }
            
            .lernica-search-container {
                width: 100%;
                justify-content: center;
                margin-top: 1rem;
            }
            
            .lernica-search-input {
                width: 100%;
                max-width: 300px;
            }
            
            .lernica-header-container {
                padding: 0 1rem;
            }
            
            .lernica-header-top {
                height: 50%;
            }
            
            .lernica-header-bottom {
                height: 50%;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="lernica-header">
        <div class="lernica-header-container">
            <!-- Partie haute -->
            <div class="lernica-header-top">
                <!-- Logo -->
                <div class="lernica-logo">
                    <div class="lernica-logo-icon">Lea</div>
                    <div class="lernica-logo-text">Learnica</div>
                </div>

                <!-- Navigation centrée -->
                <nav class="lernica-nav-main" id="mobileNavMain">
                    <ul class="lernica-nav-links">
                        <li><a href="/monblug/accueil/a_propos/learnica/teams" class="lernica-nav-link">À propos</a></li>
                        <li><a href="/monblug/home/contact/contact" class="lernica-nav-link">Contact</a></li>
                    </ul>
                </nav>

                <!-- Section droite avec boutons inscription/connexion -->
                <div class="lernica-nav-right" id="mobileNavRight">
                    <a href="/monblug/login?#loginTab" class="lernica-nav-link active">Se connecter ou s'inscrire</a>
                    <!-- <a href="/monblug/login?#loginTab" class="lernica-nav-link">Connexion</a> -->
                </div>

                <!-- Bouton mobile -->
                <button class="lernica-mobile-btn" id="mobileMenuBtn">
                    ☰
                </button>
            </div>

            <!-- Partie basse avec barre de recherche -->
            <div class="lernica-header-bottom">
                <div class="lernica-search-container">
                    <input type="text" class="lernica-search-input" placeholder="Rechercher...">
                    <span class="lernica-search-icon">🔍</span>
                </div>
            </div>
        </div>
    </header>

    <script>
        // Menu mobile
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileNavMain = document.getElementById('mobileNavMain');
        const mobileNavRight = document.getElementById('mobileNavRight');

        mobileMenuBtn.addEventListener('click', () => {
            mobileNavMain.classList.toggle('active');
            mobileNavRight.classList.toggle('active');
            mobileMenuBtn.classList.toggle('active');
            
            // Changer l'icône du bouton
            if (mobileNavMain.classList.contains('active')) {
                mobileMenuBtn.textContent = '✕';
            } else {
                mobileMenuBtn.textContent = '☰';
            }
        });

        // Fermer le menu mobile lors du clic sur un lien
        document.querySelectorAll('.lernica-nav-link').forEach(link => {
            link.addEventListener('click', () => {
                mobileNavMain.classList.remove('active');
                mobileNavRight.classList.remove('active');
                mobileMenuBtn.classList.remove('active');
                mobileMenuBtn.textContent = '☰';
            });
        });

        // Fermer le menu mobile lors du redimensionnement de l'écran
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                mobileNavMain.classList.remove('active');
                mobileNavRight.classList.remove('active');
                mobileMenuBtn.classList.remove('active');
                mobileMenuBtn.textContent = '☰';
            }
        });
    </script>
</body>
</html>
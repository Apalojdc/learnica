<?php

   include(__DIR__."/../../phpqrcode/qrlib.php");

    // Le contenue du QR code
    $contenu = 'Salut, je suis Coulibaly Apalo, developpeur informatique. n/ Pour me joindre, contactez le +2250506938224';
    // $contenu_json = json_encode($contenu);

    //Enregistrer le qr code dans un dossier
    $fichier= __DIR__."/../../code/codeqr.png";

    // Generation du qr code

    QRcode::png($contenu, $fichier, QR_ECLEVEL_L, 2, 2);

    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learnica - Navbar Pro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-gradient: linear-gradient(45deg, #00ff88, #00d4ff);
            --secondary-gradient: linear-gradient(135deg, #00ff88 0%, #00d4ff 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-bg: #0a0a0a;
            --card-bg: rgba(0, 255, 136, 0.1);
            --glass-bg: rgba(0, 255, 136, 0.15);
            --border-color: rgba(0, 255, 136, 0.2);
            --text-primary: #ffffff;
            --text-secondary: #b0b0b0;
            --text-muted: #888888;
            --shadow-lg: 0 20px 40px rgba(0, 255, 136, 0.2);
            --shadow-md: 0 8px 32px rgba(0, 255, 136, 0.15);
            --shadow-sm: 0 4px 12px rgba(0, 255, 136, 0.1);
            --border-radius: 8px;
            --border-radius-sm: 6px;
            --transition: all 0.3s ease;
            --primary-color: #00ff88;
            --secondary-color: #00d4ff;
        }

        /* Lernica Style Nav Content Navbar Container */
        .lernica_style_nav_content-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(145deg, rgba(10, 10, 10, 0.95), rgba(30, 30, 30, 0.9));
            height: 100px;
            width: 100%;
            margin-left: 0px;
            box-shadow: 0 2px 20px rgba(0, 255, 136, 0.1);
        }

        .lernica_style_nav_content-navbar::before {
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

        .lernica_style_nav_content-navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 100%;
        }

        /* Lernica Style Nav Content Logo Section */
        .lernica_style_nav_content-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: Bolder;
        }

        .lernica_style_nav_content-logo-icon {
            width: 50px;
            height: 50px;
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

        .lernica_style_nav_content-logo-text {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: -0.02em;
            text-shadow: 0 0 30px rgba(0, 255, 136, 0.3);
        }

        /* Lernica Style Nav Content Navigation Links - Right Side */
        .lernica_style_nav_content-nav-right-content {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            align-items: flex-end;
            margin-top:35px;
        }

        .lernica_style_nav_content-nav-links {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            list-style: none;
            margin-top: 20px;
        }

        .lernica_style_nav_content-nav-item {
            position: relative;
        }

        .lernica_style_nav_content-nav-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
            border: 1px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .lernica_style_nav_content-nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .lernica_style_nav_content-nav-link:hover::before {
            left: 100%;
        }

        .lernica_style_nav_content-nav-link:hover {
            color: var(--text-primary);
            background: var(--card-bg);
            border-color: var(--border-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.2);
        }

        .lernica_style_nav_content-nav-link.active {
            color: var(--text-primary);
            background: var(--primary-gradient);
            border-color: rgba(0, 255, 136, 0.3);
            color: #000;
            font-weight: 700;
            box-shadow: 0 4px 20px rgba(0, 255, 136, 0.4);
        }

        .lernica_style_nav_content-nav-icon {
            font-size: 0.9rem;
            width: 16px;
            text-align: center;
        }

        /* Lernica Style Nav Content Dropdown */
        .lernica_style_nav_content-dropdown-indicator {
            font-size: 0.7rem;
            transition: var(--transition);
            margin-left: 0.25rem;
        }

        .lernica_style_nav_content-dropdown:hover .lernica_style_nav_content-dropdown-indicator {
            transform: rotate(180deg);
        }

        .lernica_style_nav_content-dropdown-menu {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            background: linear-gradient(145deg, rgba(15, 15, 15, 0.98), rgba(30, 30, 30, 0.95));
            backdrop-filter: blur(25px);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: 0.75rem;
            min-width: 220px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: var(--transition);
            box-shadow: var(--shadow-lg);
            z-index: 1000;
        }

        .lernica_style_nav_content-dropdown:hover .lernica_style_nav_content-dropdown-menu,
        .lernica_style_nav_content-dropdown-menu:hover {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .lernica_style_nav_content-dropdown-item {
            list-style: none;
            margin: 0.25rem 0;
        }

        .lernica_style_nav_content-dropdown-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0.75rem;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
            font-size: 0.8rem;
            position: relative;
            overflow: hidden;
        }

        .lernica_style_nav_content-dropdown-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .lernica_style_nav_content-dropdown-link:hover::before {
            left: 100%;
        }

        .lernica_style_nav_content-dropdown-link:hover {
            background: var(--card-bg);
            color: var(--text-primary);
            transform: translateX(5px);
        }

        .lernica_style_nav_content-dropdown-icon {
            font-size: 0.9rem;
            width: 16px;
            text-align: center;
            background: var(--glass-bg);
            border-radius: 4px;
            padding: 0.2rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        /* Lernica Style Nav Content Search Bar - Below Navigation */
        .lernica_style_nav_content-search-container {
            margin-top: -0.5rem;
            display: flex;
            justify-content: flex-end;
        }

        .lernica_style_nav_content-search-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .lernica_style_nav_content-search-input {
            width: 280px;
            padding: 0.5rem 0.75rem 0.5rem 2rem;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            color: var(--text-primary);
            font-size: 0.8rem;
            transition: var(--transition);
            backdrop-filter: blur(10px);
            outline: none;
        }

        .lernica_style_nav_content-search-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(0, 255, 136, 0.2);
            background: var(--glass-bg);
            transform: scale(1.02);
        }

        .lernica_style_nav_content-search-input::placeholder {
            color: var(--text-muted);
            font-size: 0.8rem;
        }

        .lernica_style_nav_content-search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.85rem;
            transition: var(--transition);
        }

        .lernica_style_nav_content-search-input:focus + .lernica_style_nav_content-search-icon {
            color: var(--primary-color);
        }

        /* Lernica Style Nav Content Right Section */
        .lernica_style_nav_content-nav-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .lernica_style_nav_content-notifications {
            position: relative;
            top: -50px;
            right: -60px;
            cursor: pointer;
        }

        .lernica_style_nav_content-notification-btn {
            width: 35px;
            height: 35px;
            background: var(--card-bg);
            border-radius: var(--border-radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            transition: var(--transition);
            border: 1px solid var(--border-color);
        }

        .lernica_style_nav_content-notification-btn:hover {
            background: var(--glass-bg);
            color: var(--text-primary);
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.2);
        }

        .lernica_style_nav_content-notification-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            width: 16px;
            height: 16px;
            background: var(--secondary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.6rem;
            color: #000;
            font-weight: 700;
            border: 2px solid var(--dark-bg);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        /* Lernica Style Nav Content Mobile Menu Button */
        .lernica_style_nav_content-mobile-menu-btn {
            display: none;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: var(--border-radius-sm);
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            transition: var(--transition);
            width: 35px;
            height: 35px;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
        }

        .lernica_style_nav_content-mobile-menu-btn:hover {
            background: var(--glass-bg);
            color: var(--text-primary);
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.2);
        }

        .lernica_style_nav_content-mobile-menu-btn.active {
            color: #000;
            background: var(--primary-gradient);
            border-color: rgba(0, 255, 136, 0.3);
            box-shadow: 0 4px 20px rgba(0, 255, 136, 0.4);
        }

        /* Lernica Style Nav Content Hero Section for Demo */
        .lernica_style_nav_content-hero {
            height: 100vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 50%, #16213e 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
            margin-top: 70px;
        }

        .lernica_style_nav_content-hero::before {
            content: '';
            position: absolute;
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

        .lernica_style_nav_content-hero-content {
            max-width: 800px;
            padding: 0 2rem;
            z-index: 2;
        }

        .lernica_style_nav_content-hero h1 {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.1;
            text-shadow: 0 0 30px rgba(0, 255, 136, 0.3);
        }

        .lernica_style_nav_content-hero p {
            font-size: 1.1rem;
            color: var(--text-secondary);
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .lernica_style_nav_content-cta-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            background: var(--primary-gradient);
            color: #000;
            text-decoration: none;
            border-radius: var(--border-radius);
            font-weight: 700;
            transition: var(--transition);
            box-shadow: 0 4px 20px rgba(0, 255, 136, 0.3);
        }

        .lernica_style_nav_content-cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(0, 255, 136, 0.4);
        }

        /* Lernica Style Nav Content Contact Buttons */
        .lernica_style_nav_content-contact-buttons {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            z-index: 1000;
        }

        .lernica_style_nav_content-contact-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #000;
            text-decoration: none;
            font-size: 1.2rem;
            transition: var(--transition);
            box-shadow: var(--shadow-md);
        }

        .lernica_style_nav_content-whatsapp-btn {
            background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
        }

        .lernica_style_nav_content-telegram-btn {
            background: linear-gradient(135deg, #0088cc 0%, #006699 100%);
        }

        .lernica_style_nav_content-contact-btn:hover {
            transform: scale(1.1) translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        /* Lernica Style Nav Content Responsive Design */
        @media (max-width: 768px) {
            .lernica_style_nav_content-mobile-menu-btn {
                display: flex;
            }
            
            .lernica_style_nav_content-nav-right-content {
                position: fixed;
                top: 70px;
                left: 0;
                right: 0;
                background: linear-gradient(145deg, rgba(10, 10, 10, 0.98), rgba(30, 30, 30, 0.95));
                backdrop-filter: blur(25px);
                border-bottom: 1px solid var(--border-color);
                padding: 1rem;
                transform: translateY(-100%);
                opacity: 0;
                visibility: hidden;
                transition: var(--transition);
                align-items: center;
            }
            
            .lernica_style_nav_content-nav-right-content.active {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }
            
            .lernica_style_nav_content-nav-links {
                flex-direction: column;
                gap: 0.5rem;
                margin-bottom: 1rem;
                width: 100%;
            }
            
            .lernica_style_nav_content-nav-link {
                padding: 0.75rem 1rem;
                width: 100%;
                justify-content: flex-start;
            }
            
            .lernica_style_nav_content-search-container {
                margin-top: 1rem;
                justify-content: center;
                width: 100%;
            }
            
            .lernica_style_nav_content-search-input {
                width: 100%;
                max-width: 300px;
            }
            
            .lernica_style_nav_content-dropdown-menu {
                position: absolute;
                top: 10px;
                opacity: 1;
                visibility: hidden;
                transform: none;
                background: var(--glass-bg);
                margin-top: 0.5rem;
                box-shadow: none;
            }

            .lernica_style_nav_content-hero h1 {
                font-size: 2rem;
            }
            
            .lernica_style_nav_content-navbar-container {
                padding: 0 1rem;
            }
        }

        @media (max-width: 480px) {
            .lernica_style_nav_content-contact-buttons {
                bottom: 1rem;
                right: 1rem;
            }
            
            .lernica_style_nav_content-contact-btn {
                width: 45px;
                height: 45px;
                font-size: 1rem;
            }
        }

        /* Animation pour les éléments actifs */
        .lernica_style_nav_content-nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--primary-gradient);
            animation: activeSlide 0.3s ease;
        }

        @keyframes activeSlide {
            from { width: 0; }
            to { width: 100%; }
        }

        /* Effet de brillance sur hover */
        .lernica_style_nav_content-nav-link:hover .lernica_style_nav_content-nav-icon,
        .lernica_style_nav_content-dropdown-link:hover .lernica_style_nav_content-dropdown-icon {
            color: var(--primary-color);
            animation: iconGlow 0.5s ease;
        }

        @keyframes iconGlow {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }
    </style>
</head>

    <!-- Lernica Style Nav Content Navigation -->
    <nav class="lernica_style_nav_content-navbar">
        <div class="lernica_style_nav_content-navbar-container">
            <!-- Logo -->
            <div class="lernica_style_nav_content-logo">
                <div class="lernica_style_nav_content-logo-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <span class="lernica_style_nav_content-logo-text">Learnica</span>
            </div>

            <!-- Right Navigation & Content -->
            <div class="lernica_style_nav_content-nav-right">
                <!-- Navigation Links & Search -->
                <div class="lernica_style_nav_content-nav-right-content" id="lernicaStyleNavContentRightContent">
                    <!-- Navigation Links -->
                    <ul class="lernica_style_nav_content-nav-links">
                        <li class="lernica_style_nav_content-nav-item">
                            <a href="/monblug/accueil" class="lernica_style_nav_content-nav-link active">
                                <i class="lernica_style_nav_content-nav-icon fas fa-home"></i>
                                Accueil
                            </a>
                        </li>
                        
                        <li class="lernica_style_nav_content-nav-item lernica_style_nav_content-dropdown">
                            <a href="/monblug/admin/dashboard" class="lernica_style_nav_content-nav-link">
                                <i class="lernica_style_nav_content-nav-icon fas fa-graduation-cap"></i>
                                Formation
                                <i class="lernica_style_nav_content-dropdown-indicator fas fa-chevron-down"></i>
                            </a>
                            <ul class="lernica_style_nav_content-dropdown-menu">
                                <li class="lernica_style_nav_content-dropdown-item">
                                    <a href="/formation/cv" class="lernica_style_nav_content-dropdown-link">
                                        <div class="lernica_style_nav_content-dropdown-icon">
                                            <i class="fas fa-file-alt"></i>
                                        </div>
                                        CV Professionnel
                                    </a>
                                </li>
                                <li class="lernica_style_nav_content-dropdown-item">
                                    <a href="/formation/php" class="lernica_style_nav_content-dropdown-link">
                                        <div class="lernica_style_nav_content-dropdown-icon">
                                            <i class="fab fa-php"></i>
                                        </div>
                                        Formation PHP
                                    </a>
                                </li>
                                <li class="lernica_style_nav_content-dropdown-item">
                                    <a href="/formation/web" class="lernica_style_nav_content-dropdown-link">
                                        <div class="lernica_style_nav_content-dropdown-icon">
                                            <i class="fab fa-html5"></i>
                                        </div>
                                        HTML5/CSS3
                                    </a>
                                </li>
                                <li class="lernica_style_nav_content-dropdown-item">
                                    <a href="/formation/design" class="lernica_style_nav_content-dropdown-link">
                                        <div class="lernica_style_nav_content-dropdown-icon">
                                            <i class="fas fa-paint-brush"></i>
                                        </div>
                                        Design Graphique
                                    </a>
                                </li>
                                <li class="lernica_style_nav_content-dropdown-item">
                                    <a href="/formation/flutter" class="lernica_style_nav_content-dropdown-link">
                                        <div class="lernica_style_nav_content-dropdown-icon">
                                            <i class="fab fa-flutter"></i>
                                        </div>
                                        Flutter
                                    </a>
                                </li>
                                <li class="lernica_style_nav_content-dropdown-item">
                                    <a href="/formation/memoires" class="lernica_style_nav_content-dropdown-link">
                                        <div class="lernica_style_nav_content-dropdown-icon">
                                            <i class="fas fa-book"></i>
                                        </div>
                                        Mémoires & Thèses
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="lernica_style_nav_content-nav-item">
                            <a href="/monblug/tutoriel/fprmation/php/videos" class="lernica_style_nav_content-nav-link">
                                <i class="lernica_style_nav_content-nav-icon fas fa-graduation-cap"></i>
                                Tutoriels
                            </a>
                        </li>
                        <li class="lernica_style_nav_content-nav-item">
                            <a href="/monblug/home/forum/read_forum" class="lernica_style_nav_content-nav-link">
                                <i class="lernica_style_nav_content-nav-icon fas fa-comments"></i>
                                Forum
                            </a>
                        </li>
                        <li class="lernica_style_nav_content-nav-item">
                            <a href="/monblug/home/blogs/blog_page" class="lernica_style_nav_content-nav-link">
                                <i class="lernica_style_nav_content-nav-icon fas fa-blog"></i>
                            Blog
                            </a>
                        </li>
                        <li class="lernica_style_nav_content-nav-item">
                            <a href="/monblug/accueil/a_propos/learnica/teams" class="lernica_style_nav_content-nav-link">
                                <i class="lernica_style_nav_content-nav-icon fas fa-info-circle"></i>
                            A propos
                            </a>
                        </li>
                        
                        <li class="lernica_style_nav_content-nav-item">
                            <a href="/monblug/home/contact/contact" class="lernica_style_nav_content-nav-link">
                                <i class="lernica_style_nav_content-nav-icon fas fa-envelope"></i>
                                Contact
                            </a>
                        </li>
                    </ul>

                    <!-- Search Bar -->
                    <div class="lernica_style_nav_content-search-container">
                        <div class="lernica_style_nav_content-search-wrapper">
                            <input type="text" class="lernica_style_nav_content-search-input" placeholder="Rechercher...">
                            <i class="lernica_style_nav_content-search-icon fas fa-search"></i>
                        </div>
                    </div>
                    <!-- Notifications -->
                    <div class="lernica_style_nav_content-notifications">
                        <div class="lernica_style_nav_content-notification-btn">
                            <i class="fas fa-bell"></i>
                            <span class="lernica_style_nav_content-notification-badge">3</span>
                        </div>
                    </div>
                </div>

                
                <!-- Mobile Menu Button -->
                <div class="lernica_style_nav_content-mobile-menu-btn" id="lernicaStyleNavContentMobileMenuBtn">
                    <i class="fas fa-ellipsis-h"></i>
                </div>
            </div>
        </div>
    </nav>

    <!-- Lernica Style Nav Content Hero Section for Demo -->
    <!-- Lernica Style Nav Content Contact Buttons -->
    <div class="lernica_style_nav_content-contact-buttons">
        <a href="https://t.me/docspdfgratuit" class="lernica_style_nav_content-contact-btn lernica_style_nav_content-telegram-btn" title="Telegram">
            <img src="../../code/codeqr.png" alt="QR Code">
        </a>
        <a href="https://t.me/docspdfgratuit" class="lernica_style_nav_content-contact-btn lernica_style_nav_content-telegram-btn" title="Telegram">
            <i class="fab fa-telegram-plane"></i>
        </a>
        <a href="https://chat.whatsapp.com/KyBCjg36sJS1DhyWyR0K72" class="lernica_style_nav_content-contact-btn lernica_style_nav_content-whatsapp-btn" title="WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <script>
        // Lernica Style Nav Content mobile menu toggle
        const lernicaStyleNavContentMobileMenuBtn = document.getElementById('lernicaStyleNavContentMobileMenuBtn');
        const lernicaStyleNavContentNavRightContent = document.getElementById('lernicaStyleNavContentRightContent');

        // Check if elements exist before adding event listeners
        if (lernicaStyleNavContentMobileMenuBtn && lernicaStyleNavContentNavRightContent) {
            lernicaStyleNavContentMobileMenuBtn.addEventListener('click', () => {
                lernicaStyleNavContentNavRightContent.classList.toggle('active');
                lernicaStyleNavContentMobileMenuBtn.classList.toggle('active');
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!lernicaStyleNavContentNavRightContent.contains(e.target) && !lernicaStyleNavContentMobileMenuBtn.contains(e.target)) {
                    lernicaStyleNavContentNavRightContent.classList.remove('active');
                    lernicaStyleNavContentMobileMenuBtn.classList.remove('active');
                }
            });
        }

        // Smooth scroll for anchor links (only valid anchors)
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                // Only process if href is not just "#" and target exists
                if (href && href !== '#') {
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        // Add scroll effect to lernica_style_nav_content navbar
        window.addEventListener('scroll', () => {
            const lernicaStyleNavContentNavbar = document.querySelector('.lernica_style_nav_content-navbar');
            if (lernicaStyleNavContentNavbar) {
                if (window.scrollY > 10) {
                    lernicaStyleNavContentNavbar.style.background = 'linear-gradient(145deg, rgba(10, 10, 10, 0.98), rgba(30, 30, 30, 0.95))';
                } else {
                    lernicaStyleNavContentNavbar.style.background = 'linear-gradient(145deg, rgba(10, 10, 10, 0.95), rgba(30, 30, 30, 0.9))';
                }
            }
        });

        // Enhanced dropdown functionality
        document.querySelectorAll('.lernica_style_nav_content-dropdown').forEach(dropdown => {
            const menu = dropdown.querySelector('.lernica_style_nav_content-dropdown-menu');
            const link = dropdown.querySelector('.lernica_style_nav_content-nav-link');
            
            if (menu && link) {
                let hideTimeout;
                
                // Show on hover
                dropdown.addEventListener('mouseenter', () => {
                    clearTimeout(hideTimeout);
                    menu.style.opacity = '1';
                    menu.style.visibility = 'visible';
                    menu.style.transform = 'translateY(0)';
                });
                
                // Hide with delay on mouse leave
                dropdown.addEventListener('mouseleave', () => {
                    hideTimeout = setTimeout(() => {
                        menu.style.opacity = '0';
                        menu.style.visibility = 'hidden';
                        menu.style.transform = 'translateY(-10px)';
                    }, 100);
                });
                
                // Keep open when hovering menu
                menu.addEventListener('mouseenter', () => {
                    clearTimeout(hideTimeout);
                });
                
                // Prevent link click if it's just "#"
                link.addEventListener('click', (e) => {
                    if (link.getAttribute('href') === '#') {
                        e.preventDefault();
                    }
                });
            }
        });

        // Active link management
        function setActiveLink() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.lernica_style_nav_content-nav-link');
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === currentPath || 
                    (currentPath === '/' && link.getAttribute('href') === '/')) {
                    link.classList.add('active');
                }
            });
        }

        // Set active link on page load
        document.addEventListener('DOMContentLoaded', setActiveLink);

        // Update active link when clicking navigation links
        document.querySelectorAll('.lernica_style_nav_content-nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                // Remove active class from all links
                document.querySelectorAll('.lernica_style_nav_content-nav-link').forEach(l => l.classList.remove('active'));
                // Add active class to clicked link (only if it's not a dropdown parent)
                if (!this.closest('.lernica_style_nav_content-dropdown')) {
                    this.classList.add('active');
                }
            });
        });
    </script>
</html>
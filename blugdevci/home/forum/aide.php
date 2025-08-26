<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aide - DevCommunity</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .forum-main-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #ffffff;
            position: relative;
        }

        /* Particles Background Effect */
        .forum-main-container::before {
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

        /* Header */
        .forum-header {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-bottom: 1px solid rgba(0, 255, 136, 0.2);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
        }

        .forum-header-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .forum-logo {
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

        .forum-nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .forum-nav-link {
            color: #b0b0b0;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .forum-nav-link:hover, .forum-nav-link.forum-active {
            color: #00ff88;
            background: rgba(0, 255, 136, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.2);
        }

        .forum-user-menu {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .forum-search-bar {
            background: #2a2a2a;
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 20px;
            padding: 0.7rem 1.5rem;
            color: #ffffff;
            width: 300px;
            transition: all 0.3s ease;
        }

        .forum-search-bar:focus {
            outline: none;
            border-color: #00ff88;
            box-shadow: 0 0 0 2px rgba(0, 255, 136, 0.2);
            transform: scale(1.02);
        }

        .forum-user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #000;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 255, 136, 0.3);
        }

        .forum-user-avatar:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 5px 20px rgba(0, 255, 136, 0.5);
        }

        /* Main Content */
        .help-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        /* Breadcrumb */
        .forum-breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #888;
            margin-bottom: 2rem;
            padding: 0.5rem 1rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 8px;
            border-left: 3px solid #00ff88;
        }

        .forum-breadcrumb a {
            color: #00d4ff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forum-breadcrumb a:hover {
            color: #00ff88;
        }

        /* Page Header */
        .help-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .help-title {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            text-shadow: 0 0 30px rgba(0, 255, 136, 0.3);
        }

        .help-subtitle {
            color: #b0b0b0;
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Search Section */
        .help-search {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 3rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            text-align: center;
        }

        .help-search h2 {
            color: #00ff88;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .search-input-container {
            position: relative;
            max-width: 500px;
            margin: 0 auto;
        }

        .search-input {
            width: 100%;
            background: #2a2a2a;
            border: 2px solid rgba(0, 255, 136, 0.3);
            border-radius: 25px;
            padding: 1rem 3rem 1rem 1.5rem;
            color: #ffffff;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: #00ff88;
            box-shadow: 0 0 0 3px rgba(0, 255, 136, 0.2);
            transform: scale(1.02);
        }

        .search-btn {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #000;
        }

        .search-btn:hover {
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.3);
        }

        .search-suggestions {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 10px;
            border: 1px solid rgba(0, 255, 136, 0.2);
            margin-top: 0.5rem;
            z-index: 10;
            max-height: 300px;
            overflow-y: auto;
        }

        .search-suggestion {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-suggestion:hover {
            background: rgba(0, 255, 136, 0.1);
        }

        .search-suggestion:last-child {
            border-bottom: none;
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .action-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .action-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .action-card:hover::before {
            left: 100%;
        }

        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 255, 136, 0.2);
            border-color: rgba(0, 255, 136, 0.3);
        }

        .action-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .action-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
        }

        .action-description {
            color: #b0b0b0;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* Main Content Area */
        .help-content {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 2rem;
        }

        /* Sidebar Navigation */
        .help-sidebar {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 1.5rem;
            height: fit-content;
            border: 1px solid rgba(0, 255, 136, 0.1);
            position: sticky;
            top: 120px;
        }

        .sidebar-title {
            color: #00ff88;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-align: center;
        }

        .sidebar-item {
            display: block;
            color: #b0b0b0;
            text-decoration: none;
            padding: 0.7rem 1rem;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .sidebar-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .sidebar-item:hover::before {
            left: 100%;
        }

        .sidebar-item:hover, .sidebar-item.active {
            color: #ffffff;
            background: rgba(0, 255, 136, 0.1);
            border-left-color: #00ff88;
            transform: translateX(5px);
        }

        .sidebar-item.active {
            background: linear-gradient(90deg, rgba(0, 255, 136, 0.2), rgba(0, 212, 255, 0.1));
            color: #00ff88;
            font-weight: 600;
        }

        /* Main Help Content */
        .help-main {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-title {
            font-size: 2rem;
            color: #00ff88;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .section-description {
            color: #b0b0b0;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        /* FAQ Section */
        .faq-item {
            background: rgba(0, 255, 136, 0.05);
            border-radius: 10px;
            margin-bottom: 1rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            border-color: rgba(0, 255, 136, 0.3);
        }

        .faq-question {
            padding: 1.5rem;
            background: transparent;
            border: none;
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            color: #00ff88;
        }

        .faq-icon {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .faq-item.open .faq-icon {
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .faq-item.open .faq-answer {
            max-height: 500px;
        }

        .faq-answer-content {
            padding: 0 1.5rem 1.5rem;
            color: #b0b0b0;
            line-height: 1.6;
        }

        /* Step Guide */
        .step-guide {
            margin-bottom: 2rem;
        }

        .step {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 10px;
            border-left: 4px solid #00ff88;
            transition: all 0.3s ease;
        }

        .step:hover {
            transform: translateX(5px);
            background: rgba(0, 255, 136, 0.1);
        }

        .step-number {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            color: #000;
            flex-shrink: 0;
        }

        .step-content h3 {
            color: #ffffff;
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .step-content p {
            color: #b0b0b0;
            line-height: 1.6;
        }

        /* Feature Cards */
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .feature-card {
            background: rgba(0, 255, 136, 0.05);
            border-radius: 10px;
            padding: 1.5rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-3px);
            border-color: rgba(0, 255, 136, 0.3);
            box-shadow: 0 5px 20px rgba(0, 255, 136, 0.1);
        }

        .feature-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .feature-title {
            color: #00ff88;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .feature-description {
            color: #b0b0b0;
            line-height: 1.6;
        }

        /* Contact Form */
        .contact-form {
            background: rgba(0, 255, 136, 0.05);
            border-radius: 10px;
            padding: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            color: #00ff88;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .form-input, .form-textarea, .form-select {
            width: 100%;
            background: #2a2a2a;
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 8px;
            padding: 0.8rem 1rem;
            color: #ffffff;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-input:focus, .form-textarea:focus, .form-select:focus {
            outline: none;
            border-color: #00ff88;
            box-shadow: 0 0 0 2px rgba(0, 255, 136, 0.2);
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-btn {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border: none;
            padding: 1rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .form-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.3);
        }

        /* Status Messages */
        .status-message {
            padding: 1rem 1.5rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            display: none;
        }

        .status-message.success {
            background: rgba(76, 175, 80, 0.1);
            border: 1px solid rgba(76, 175, 80, 0.3);
            color: #4CAF50;
        }

        .status-message.error {
            background: rgba(244, 67, 54, 0.1);
            border: 1px solid rgba(244, 67, 54, 0.3);
            color: #F44336;
        }

        .status-message.info {
            background: rgba(33, 150, 243, 0.1);
            border: 1px solid rgba(33, 150, 243, 0.3);
            color: #2196F3;
        }

        /* Toast Notification */
        .toast {
            position: fixed;
            top: 100px;
            right: 20px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
        }

        .toast.show {
            transform: translateX(0);
        }

        /* Loading Overlay */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .loading-overlay.show {
            display: flex;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(0, 255, 136, 0.3);
            border-top: 3px solid #00ff88;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .help-content {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .help-sidebar {
                position: static;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
            }
        }

        @media (max-width: 768px) {
            .forum-header-content {
                padding: 0 1rem;
                flex-wrap: wrap;
                gap: 1rem;
            }

            .forum-search-bar {
                width: 100%;
                order: 3;
                flex-basis: 100%;
            }

            .help-container {
                padding: 1rem;
            }

            .help-title {
                font-size: 2rem;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .step {
                flex-direction: column;
                text-align: center;
            }

            .step-number {
                align-self: center;
            }
        }
    </style>
</head>
<body>
    <div class="forum-main-container">
        <!-- Loading Overlay -->
        <div class="loading-overlay" id="loadingOverlay">
            <div class="loading-spinner"></div>
        </div>

        <!-- Toast Notification -->
        <div class="toast" id="toast"></div>

        <!-- Header -->
        <header class="forum-header">
            <div class="forum-header-content">
                <a href="#" class="forum-logo">DevCommunity</a>
                
                <nav class="forum-nav">
                    <a href="#" class="forum-nav-link">Forum</a>
                    <a href="#" class="forum-nav-link">Membres</a>
                    <a href="#" class="forum-nav-link">Ressources</a>
                    <a href="#" class="forum-nav-link forum-active">Aide</a>
                </nav>

                <div class="forum-user-menu">
                    <input type="text" class="forum-search-bar" placeholder="Rechercher dans l'aide..." id="globalSearch">
                    <div class="forum-user-avatar">JS</div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="help-container">
            <!-- Breadcrumb -->
            <div class="forum-breadcrumb">
                <a href="#">🏠 DevCommunity</a> > <span>❓ Aide & Support</span>
            </div>

            <!-- Page Header -->
            <div class="help-header">
                <h1 class="help-title">Centre d'Aide</h1>
                <p class="help-subtitle">
                    Trouvez rapidement les réponses à vos questions ou contactez notre équipe de support. 
                    Nous sommes là pour vous aider à tirer le meilleur parti de DevCommunity !
                </p>
            </div>

            <!-- Search Section -->
            <div class="help-search">
                <h2>🔍 Que pouvons-nous vous aider à trouver ?</h2>
                <div class="search-input-container">
                    <input type="text" class="search-input" placeholder="Tapez votre question ici..." id="helpSearch">
                    <button class="search-btn" id="searchBtn">🔍</button>
                    <div class="search-suggestions" id="searchSuggestions">
                        <!-- Search suggestions will be inserted here -->
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <div class="action-card" data-section="getting-started">
                    <div class="action-icon">🚀</div>
                    <h3 class="action-title">Commencer</h3>
                    <p class="action-description">Guide rapide pour vos premiers pas sur DevCommunity</p>
                </div>
                <div class="action-card" data-section="faq">
                    <div class="action-icon">❓</div>
                    <h3 class="action-title">FAQ</h3>
                    <p class="action-description">Réponses aux questions les plus fréquemment posées</p>
                </div>
                <div class="action-card" data-section="features">
                    <div class="action-icon">⚡</div>
                    <h3 class="action-title">Fonctionnalités</h3>
                    <p class="action-description">Découvrez toutes les fonctionnalités disponibles</p>
                </div>
                <div class="action-card" data-section="contact">
                    <div class="action-icon">📞</div>
                    <h3 class="action-title">Contact</h3>
                    <p class="action-description">Contacter notre équipe de support directement</p>
                </div>
            </div>

            <!-- Main Help Content -->
            <div class="help-content">
                <!-- Sidebar Navigation -->
                <div class="help-sidebar">
                    <h3 class="sidebar-title">Navigation</h3>
                    <a href="#" class="sidebar-item active" data-section="getting-started">🚀 Commencer</a>
                    <a href="#" class="sidebar-item" data-section="account">👤 Mon Compte</a>
                    <a href="#" class="sidebar-item" data-section="forum-guide">💬 Guide du Forum</a>
                    <a href="#" class="sidebar-item" data-section="features">⚡ Fonctionnalités</a>
                    <a href="#" class="sidebar-item" data-section="faq">❓ FAQ</a>
                    <a href="#" class="sidebar-item" data-section="rules">📋 Règlement</a>
                    <a href="#" class="sidebar-item" data-section="troubleshooting">🔧 Dépannage</a>
                    <a href="#" class="sidebar-item" data-section="contact">📞 Contact</a>
                </div>

                <!-- Main Content Area -->
                <div class="help-main">
                    <!-- Getting Started Section -->
                    <div class="section active" id="getting-started">
                        <h1 class="section-title">🚀 Bienvenue sur DevCommunity</h1>
                        <p class="section-description">
                            Félicitations ! Vous venez de rejoindre la communauté des développeurs la plus dynamique. 
                            Voici comment bien commencer votre aventure.
                        </p>

                        <div class="step-guide">
                            <div class="step">
                                <div class="step-number">1</div>
                                <div class="step-content">
                                    <h3>Complétez votre profil</h3>
                                    <p>Ajoutez une photo, une bio et vos compétences techniques pour que la communauté apprenne à vous connaître.</p>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <h3>Explorez les catégories</h3>
                                    <p>Découvrez les différentes sections du forum : JavaScript, Python, DevOps, Design et bien plus encore.</p>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <h3>Participez aux discussions</h3>
                                    <p>Posez vos questions, partagez vos connaissances et aidez les autres membres de la communauté.</p>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">4</div>
                                <div class="step-content">
                                    <h3>Explorez les ressources</h3>
                                    <p>Accédez à notre bibliothèque de tutoriels, outils et ressources soigneusement sélectionnés.</p>
                                </div>
                            </div>
                        </div>

                        <div class="status-message info" style="display: block;">
                            <strong>💡 Astuce :</strong> Utilisez le système de recherche pour trouver rapidement les discussions qui vous intéressent !
                        </div>
                    </div>

                    <!-- Account Section -->
                    <div class="section" id="account">
                        <h1 class="section-title">👤 Gestion de votre compte</h1>
                        <p class="section-description">
                            Tout ce que vous devez savoir pour gérer votre compte DevCommunity efficacement.
                        </p>

                        <div class="feature-grid">
                            <div class="feature-card">
                                <div class="feature-icon">✏️</div>
                                <h3 class="feature-title">Modifier le profil</h3>
                                <p class="feature-description">Changez votre avatar, bio, compétences et informations personnelles.</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">🔒</div>
                                <h3 class="feature-title">Sécurité</h3>
                                <p class="feature-description">Gérez votre mot de passe et les paramètres de sécurité de votre compte.</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">🔔</div>
                                <h3 class="feature-title">Notifications</h3>
                                <p class="feature-description">Personnalisez vos préférences de notifications par email et sur le site.</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">🎨</div>
                                <h3 class="feature-title">Thème</h3>
                                <p class="feature-description">Choisissez entre le thème sombre et clair selon vos préférences.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Forum Guide Section -->
                    <div class="section" id="forum-guide">
                        <h1 class="section-title">💬 Guide d'utilisation du forum</h1>
                        <p class="section-description">
                            Apprenez à naviguer et utiliser efficacement toutes les fonctionnalités du forum.
                        </p>

                        <div class="step-guide">
                            <div class="step">
                                <div class="step-number">📝</div>
                                <div class="step-content">
                                    <h3>Créer un nouveau sujet</h3>
                                    <p>Cliquez sur "Nouveau Sujet", choisissez la bonne catégorie, rédigez un titre clair et décrivez votre question ou sujet de discussion.</p>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">💭</div>
                                <div class="step-content">
                                    <h3>Répondre aux messages</h3>
                                    <p>Utilisez l'éditeur pour répondre aux sujets. Vous pouvez citer d'autres messages, ajouter du code et utiliser le formatage Markdown.</p>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">⭐</div>
                                <div class="step-content">
                                    <h3>Système de réputation</h3>
                                    <p>Votez pour les messages utiles avec les boutons like/dislike. Gagnez de la réputation en aidant la communauté.</p>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">🔖</div>
                                <div class="step-content">
                                    <h3>Sauvegarder vos favoris</h3>
                                    <p>Marquez les sujets intéressants comme favoris pour les retrouver facilement dans votre profil.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Features Section -->
                    <div class="section" id="features">
                        <h1 class="section-title">⚡ Fonctionnalités de DevCommunity</h1>
                        <p class="section-description">
                            Découvrez toutes les fonctionnalités qui font de DevCommunity une plateforme unique.
                        </p>

                        <div class="feature-grid">
                            <div class="feature-card">
                                <div class="feature-icon">🔍</div>
                                <h3 class="feature-title">Recherche Avancée</h3>
                                <p class="feature-description">Trouvez rapidement des discussions, membres ou ressources avec notre moteur de recherche intelligent.</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">📚</div>
                                <h3 class="feature-title">Bibliothèque de Ressources</h3>
                                <p class="feature-description">Accédez à des milliers de tutoriels, outils et ressources sélectionnés par la communauté.</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">💬</div>
                                <h3 class="feature-title">Messagerie Privée</h3>
                                <p class="feature-description">Communiquez directement avec d'autres membres via notre système de messages privés.</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">🏆</div>
                                <h3 class="feature-title">Système de Badges</h3>
                                <p class="feature-description">Gagnez des badges en participant activement et en aidant la communauté.</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">📊</div>
                                <h3 class="feature-title">Statistiques Personnelles</h3>
                                <p class="feature-description">Suivez vos contributions, votre réputation et votre impact sur la communauté.</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">🌙</div>
                                <h3 class="feature-title">Mode Sombre</h3>
                                <p class="feature-description">Interface optimisée pour le travail de nuit avec un thème sombre élégant.</p>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Section -->
                    <div class="section" id="faq">
                        <h1 class="section-title">❓ Questions Fréquentes</h1>
                        <p class="section-description">
                            Trouvez rapidement les réponses aux questions les plus courantes de notre communauté.
                        </p>

                        <div class="faq-item">
                            <button class="faq-question">
                                Comment créer mon premier sujet ?
                                <span class="faq-icon">▼</span>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Pour créer votre premier sujet, cliquez sur le bouton "Nouveau Sujet" dans la catégorie appropriée. Choisissez un titre descriptif et claire, sélectionnez les bons tags, et rédigez votre question ou sujet de discussion. N'oubliez pas de vérifier l'orthographe avant de publier !
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                Comment gagner de la réputation ?
                                <span class="faq-icon">▼</span>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Vous gagnez de la réputation en recevant des votes positifs sur vos messages et réponses. Aidez les autres membres, partagez vos connaissances, et participez activement aux discussions. Plus vos contributions sont utiles, plus vous gagnez de réputation !
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                Puis-je modifier mes messages après publication ?
                                <span class="faq-icon">▼</span>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Oui, vous pouvez modifier vos messages dans les 24 heures suivant leur publication. Après ce délai, seuls les modérateurs peuvent effectuer des modifications. Cliquez sur l'icône "Modifier" sous votre message pour apporter des corrections.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                Comment signaler un contenu inapproprié ?
                                <span class="faq-icon">▼</span>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Utilisez le bouton "Signaler" présent sous chaque message. Décrivez brièvement le problème et notre équipe de modération examinera le contenu dans les plus brefs délais. Vous pouvez aussi contacter directement un modérateur via message privé.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                Comment ajouter du code dans mes messages ?
                                <span class="faq-icon">▼</span>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Utilisez les balises de code pour une meilleure lisibilité. Pour du code inline, entourez-le de backticks (`code`). Pour des blocs de code, utilisez trois backticks avec le langage : ```javascript votre code ici ```. L'éditeur supporte la coloration syntaxique pour de nombreux langages.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                Comment changer mon avatar ?
                                <span class="faq-icon">▼</span>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Allez dans votre profil, cliquez sur "Modifier le profil", puis sur votre avatar actuel. Vous pouvez uploader une nouvelle image (formats JPG, PNG acceptés, taille maximale 2MB) ou choisir un avatar par défaut.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rules Section -->
                    <div class="section" id="rules">
                        <h1 class="section-title">📋 Règlement de la communauté</h1>
                        <p class="section-description">
                            Pour maintenir un environnement sain et productif, nous demandons à tous les membres de respecter ces règles simples.
                        </p>

                        <div class="feature-grid">
                            <div class="feature-card">
                                <div class="feature-icon">🤝</div>
                                <h3 class="feature-title">Respect mutuel</h3>
                                <p class="feature-description">Traitez tous les membres avec respect, peu importe leur niveau ou leurs opinions.</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">🎯</div>
                                <h3 class="feature-title">Contenu pertinent</h3>
                                <p class="feature-description">Publiez dans la bonne catégorie et assurez-vous que votre contenu est lié au développement.</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">🚫</div>
                                <h3 class="feature-title">Pas de spam</h3>
                                <p class="feature-description">Évitez les messages répétitifs, la publicité non sollicitée et le contenu hors-sujet.</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">🔍</div>
                                <h3 class="feature-title">Recherchez d'abord</h3>
                                <p class="feature-description">Vérifiez si votre question n'a pas déjà été posée avant de créer un nouveau sujet.</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">📝</div>
                                <h3 class="feature-title">Messages clairs</h3>
                                <p class="feature-description">Rédigez des titres descriptifs et des messages bien structurés avec des détails suffisants.</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">⚖️</div>
                                <h3 class="feature-title">Respect du droit d'auteur</h3>
                                <p class="feature-description">Ne partagez pas de contenu protégé par des droits d'auteur sans autorisation.</p>
                            </div>
                        </div>

                        <div class="status-message info" style="display: block;">
                            <strong>⚠️ Important :</strong> Le non-respect de ces règles peut entraîner des avertissements, des suspensions temporaires ou l'exclusion définitive de la communauté.
                        </div>
                    </div>

                    <!-- Troubleshooting Section -->
                    <div class="section" id="troubleshooting">
                        <h1 class="section-title">🔧 Résolution des problèmes</h1>
                        <p class="section-description">
                            Solutions aux problèmes techniques les plus courants rencontrés sur DevCommunity.
                        </p>

                        <div class="faq-item">
                            <button class="faq-question">
                                Le site est lent ou ne se charge pas
                                <span class="faq-icon">▼</span>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    <strong>Solutions à essayer :</strong><br>
                                    • Videz le cache de votre navigateur (Ctrl+F5)<br>
                                    • Désactivez temporairement les extensions de navigateur<br>
                                    • Vérifiez votre connexion Internet<br>
                                    • Essayez un autre navigateur<br>
                                    • Contactez-nous si le problème persiste
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                Impossible de me connecter à mon compte
                                <span class="faq-icon">▼</span>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    <strong>Étapes de résolution :</strong><br>
                                    • Vérifiez votre nom d'utilisateur et mot de passe<br>
                                    • Utilisez la fonction "Mot de passe oublié"<br>
                                    • Vérifiez que votre compte n'est pas suspendu<br>
                                    • Désactivez temporairement les bloqueurs de publicité<br>
                                    • Contactez le support si rien ne fonctionne
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                L'éditeur de messages ne fonctionne pas
                                <span class="faq-icon">▼</span>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    <strong>Solutions possibles :</strong><br>
                                    • Actualisez la page et réessayez<br>
                                    • Autorisez JavaScript dans votre navigateur<br>
                                    • Désactivez le mode de compatibilité IE<br>
                                    • Utilisez un navigateur moderne (Chrome, Firefox, Safari)<br>
                                    • Contactez-nous pour un support technique
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                Mes notifications ne fonctionnent pas
                                <span class="faq-icon">▼</span>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    <strong>Vérifications à effectuer :</strong><br>
                                    • Contrôlez vos paramètres de notification dans votre profil<br>
                                    • Vérifiez votre dossier spam/courrier indésirable<br>
                                    • Assurez-vous que votre adresse email est validée<br>
                                    • Autorisez les notifications du navigateur<br>
                                    • Contactez le support si le problème persiste
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Section -->
                    <div class="section" id="contact">
                        <h1 class="section-title">📞 Contacter le support</h1>
                        <p class="section-description">
                            Notre équipe de support est là pour vous aider. Choisissez le moyen de contact qui vous convient le mieux.
                        </p>

                        <div class="feature-grid">
                            <div class="feature-card">
                                <div class="feature-icon">📧</div>
                                <h3 class="feature-title">Email Support</h3>
                                <p class="feature-description">support@devcommunity.fr<br>Réponse sous 24h</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">💬</div>
                                <h3 class="feature-title">Chat en Direct</h3>
                                <p class="feature-description">Disponible 9h-18h<br>Réponse immédiate</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">🎫</div>
                                <h3 class="feature-title">Ticket Support</h3>
                                <p class="feature-description">Système de tickets<br>Suivi personnalisé</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">📱</div>
                                <h3 class="feature-title">Réseaux Sociaux</h3>
                                <p class="feature-description">@DevCommunity<br>Mises à jour en temps réel</p>
                            </div>
                        </div>

                        <div class="contact-form">
                            <h3 style="color: #00ff88; margin-bottom: 1.5rem; text-align: center;">📝 Formulaire de contact</h3>
                            
                            <div id="statusMessage" class="status-message"></div>
                            
                            <form id="contactForm">
                                <div class="form-group">
                                    <label class="form-label" for="contactName">Nom complet *</label>
                                    <input type="text" id="contactName" class="form-input" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="contactEmail">Adresse email *</label>
                                    <input type="email" id="contactEmail" class="form-input" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="contactSubject">Sujet *</label>
                                    <select id="contactSubject" class="form-select" required>
                                        <option value="">Choisissez un sujet</option>
                                        <option value="technical">Problème technique</option>
                                        <option value="account">Problème de compte</option>
                                        <option value="content">Signalement de contenu</option>
                                        <option value="suggestion">Suggestion d'amélioration</option>
                                        <option value="other">Autre</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="contactMessage">Message *</label>
                                    <textarea id="contactMessage" class="form-textarea" rows="5" placeholder="Décrivez votre problème ou votre question en détail..." required></textarea>
                                </div>
                                
                                <button type="submit" class="form-btn">📤 Envoyer le message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let currentSection = 'getting-started';
        let searchSuggestions = [
            "Comment créer un nouveau sujet ?",
            "Modifier mon profil",
            "Récupérer mon mot de passe",
            "Signaler un problème",
            "Système de badges",
            "Notifications email",
            "Mode sombre",
            "Règlement de la communauté",
            "Supprimer mon compte",
            "Contacter un modérateur"
        ];

        // Initialize the page
        function init() {
            showLoading();
            
            setTimeout(() => {
                setupEventListeners();
                setupFAQ();
                hideLoading();
                showToast("❓ Page d'aide chargée avec succès !", 3000);
            }, 800);
        }

        // Utility functions
        function showLoading() {
            document.getElementById('loadingOverlay').classList.add('show');
        }

        function hideLoading() {
            document.getElementById('loadingOverlay').classList.remove('show');
        }

        function showToast(message, duration = 3000) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, duration);
        }

        // Setup event listeners
        function setupEventListeners() {
            // Navigation
            document.querySelectorAll('.sidebar-item, .action-card').forEach(item => {
                item.addEventListener('click', (e) => {
                    e.preventDefault();
                    const section = item.dataset.section;
                    if (section) {
                        switchSection(section);
                    }
                });
            });

            // Search functionality
            const helpSearch = document.getElementById('helpSearch');
            const globalSearch = document.getElementById('globalSearch');
            const searchBtn = document.getElementById('searchBtn');
            const searchSuggestions = document.getElementById('searchSuggestions');

            [helpSearch, globalSearch].forEach(searchInput => {
                searchInput.addEventListener('input', handleSearch);
                searchInput.addEventListener('focus', showSearchSuggestions);
                searchInput.addEventListener('blur', hideSearchSuggestions);
            });

            searchBtn.addEventListener('click', performSearch);

            // Contact form
            document.getElementById('contactForm').addEventListener('submit', handleContactForm);

            // Close suggestions when clicking outside
            document.addEventListener('click', (e) => {
                if (!e.target.closest('.search-input-container')) {
                    hideSearchSuggestions();
                }
            });
        }

        // Section switching
        function switchSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });

            // Show target section
            const targetSection = document.getElementById(sectionId);
            if (targetSection) {
                targetSection.classList.add('active');
                currentSection = sectionId;
            }

            // Update sidebar active state
            document.querySelectorAll('.sidebar-item').forEach(item => {
                item.classList.remove('active');
                if (item.dataset.section === sectionId) {
                    item.classList.add('active');
                }
            });

            // Scroll to top smoothly
            window.scrollTo({ top: 0, behavior: 'smooth' });

            // Show toast notification
            const sectionTitles = {
                'getting-started': 'Guide de démarrage',
                'account': 'Gestion du compte',
                'forum-guide': 'Guide du forum',
                'features': 'Fonctionnalités',
                'faq': 'Questions fréquentes',
                'rules': 'Règlement',
                'troubleshooting': 'Dépannage',
                'contact': 'Contact support'
            };

            showToast(`📖 ${sectionTitles[sectionId] || 'Section'} affichée`);
        }

        // Search functionality
        function handleSearch(e) {
            const query = e.target.value.toLowerCase();
            const suggestions = searchSuggestions.filter(suggestion => 
                suggestion.toLowerCase().includes(query)
            );

            updateSearchSuggestions(suggestions.slice(0, 5));
        }

        function showSearchSuggestions() {
            const suggestionsDiv = document.getElementById('searchSuggestions');
            if (suggestionsDiv.children.length > 0) {
                suggestionsDiv.style.display = 'block';
            }
        }

        function hideSearchSuggestions() {
            setTimeout(() => {
                document.getElementById('searchSuggestions').style.display = 'none';
            }, 200);
        }

        function updateSearchSuggestions(suggestions) {
            const suggestionsDiv = document.getElementById('searchSuggestions');
            suggestionsDiv.innerHTML = '';

            suggestions.forEach(suggestion => {
                const suggestionElement = document.createElement('div');
                suggestionElement.className = 'search-suggestion';
                suggestionElement.textContent = suggestion;
                suggestionElement.addEventListener('click', () => {
                    document.getElementById('helpSearch').value = suggestion;
                    document.getElementById('globalSearch').value = suggestion;
                    performSearch();
                    hideSearchSuggestions();
                });
                suggestionsDiv.appendChild(suggestionElement);
            });

            if (suggestions.length > 0) {
                suggestionsDiv.style.display = 'block';
            } else {
                suggestionsDiv.style.display = 'none';
            }
        }

        function performSearch() {
            const query = document.getElementById('helpSearch').value || document.getElementById('globalSearch').value;
            
            if (query.trim()) {
                showLoading();
                
                setTimeout(() => {
                    hideLoading();
                    showToast(`🔍 Recherche effectuée : "${query}"`);
                    
                    // In a real application, this would search through the help content
                    // and display relevant results
                    console.log('Searching for:', query);
                    
                    // Simulate opening FAQ section for common queries
                    if (query.toLowerCase().includes('sujet') || query.toLowerCase().includes('post')) {
                        switchSection('forum-guide');
                    } else if (query.toLowerCase().includes('profil') || query.toLowerCase().includes('compte')) {
                        switchSection('account');
                    } else if (query.toLowerCase().includes('problème') || query.toLowerCase().includes('bug')) {
                        switchSection('troubleshooting');
                    } else {
                        switchSection('faq');
                    }
                }, 500);
            }
        }

        // FAQ functionality
        function setupFAQ() {
            document.querySelectorAll('.faq-question').forEach(question => {
                question.addEventListener('click', () => {
                    const faqItem = question.parentElement;
                    const isOpen = faqItem.classList.contains('open');
                    
                    // Close all other FAQ items
                    document.querySelectorAll('.faq-item').forEach(item => {
                        item.classList.remove('open');
                    });
                    
                    // Toggle current item
                    if (!isOpen) {
                        faqItem.classList.add('open');
                    }
                });
            });
        }

        // Contact form handling
        function handleContactForm(e) {
            e.preventDefault();
            
            const formData = {
                name: document.getElementById('contactName').value,
                email: document.getElementById('contactEmail').value,
                subject: document.getElementById('contactSubject').value,
                message: document.getElementById('contactMessage').value
            };

            // Validate form
            if (!formData.name || !formData.email || !formData.subject || !formData.message) {
                showStatusMessage('Veuillez remplir tous les champs obligatoires.', 'error');
                return;
            }

            // Simulate form submission
            showLoading();
            
            setTimeout(() => {
                hideLoading();
                showStatusMessage('✅ Votre message a été envoyé avec succès ! Notre équipe vous répondra sous 24h.', 'success');
                document.getElementById('contactForm').reset();
                showToast('📧 Message envoyé au support !');
            }, 1500);
        }

        function showStatusMessage(message, type) {
            const statusDiv = document.getElementById('statusMessage');
            statusDiv.textContent = message;
            statusDiv.className = `status-message ${type}`;
            statusDiv.style.display = 'block';
            
            // Auto-hide after 5 seconds
            setTimeout(() => {
                statusDiv.style.display = 'none';
            }, 5000);
        }

        // Initialize the application
        document.addEventListener('DOMContentLoaded', () => {
            init();
        });

        // Handle keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            // Ctrl/Cmd + K for search
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                document.getElementById('helpSearch').focus();
                showToast('🔍 Recherche activée');
            }
            
            // Escape to close suggestions
            if (e.key === 'Escape') {
                hideSearchSuggestions();
            }
        });

        // Smooth scrolling for anchor links
        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                section.scrollIntoView({ behavior: 'smooth' });
            }
        }

        // Auto-scroll to specific help topics based on URL parameters
        function checkURLParameters() {
            const urlParams = new URLSearchParams(window.location.search);
            const topic = urlParams.get('topic');
            
            if (topic && document.getElementById(topic)) {
                switchSection(topic);
            }
        }

        // Call on page load
        window.addEventListener('load', checkURLParameters);
    </script>
</body>
</html>
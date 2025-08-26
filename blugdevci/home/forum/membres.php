<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membres - DevCommunity</title>
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
        .members-container {
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
        .members-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .members-title {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            text-shadow: 0 0 30px rgba(0, 255, 136, 0.3);
        }

        .members-subtitle {
            color: #b0b0b0;
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Stats Section */
        .members-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .stat-card:hover::before {
            left: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 255, 136, 0.2);
        }

        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #00d4ff;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 10px rgba(0, 212, 255, 0.3);
        }

        .stat-label {
            color: #888;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Filters Section */
        .members-filters {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .filters-row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr auto;
            gap: 1rem;
            align-items: end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-label {
            color: #00ff88;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-input, .filter-select {
            background: #2a2a2a;
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 8px;
            padding: 0.7rem 1rem;
            color: #ffffff;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .filter-input:focus, .filter-select:focus {
            outline: none;
            border-color: #00ff88;
            box-shadow: 0 0 0 2px rgba(0, 255, 136, 0.2);
        }

        .filter-btn {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .filter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.3);
        }

        /* View Toggle */
        .view-toggle {
            display: flex;
            gap: 0.5rem;
            background: #2a2a2a;
            border-radius: 8px;
            padding: 0.3rem;
        }

        .view-btn {
            background: transparent;
            border: none;
            color: #888;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .view-btn.active {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
        }

        /* Members Grid */
        .members-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .member-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .member-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.05), transparent);
            transition: left 0.5s ease;
        }

        .member-card:hover::before {
            left: 100%;
        }

        .member-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 255, 136, 0.2);
            border-color: rgba(0, 255, 136, 0.3);
        }

        .member-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .member-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 800;
            color: #000;
            position: relative;
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
        }

        .member-avatar.online::after {
            content: '';
            position: absolute;
            bottom: 2px;
            right: 2px;
            width: 16px;
            height: 16px;
            background: #00ff88;
            border: 2px solid #1e1e1e;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.1); }
        }

        .member-info {
            flex: 1;
        }

        .member-name {
            font-size: 1.3rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.3rem;
        }

        .member-role {
            color: #00d4ff;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .member-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .member-stat {
            text-align: center;
            padding: 0.8rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 8px;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .member-stat-number {
            font-size: 1.2rem;
            font-weight: 700;
            color: #00d4ff;
            display: block;
        }

        .member-stat-label {
            font-size: 0.8rem;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .member-bio {
            color: #b0b0b0;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 1rem;
        }

        .member-badges {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }

        .member-badge {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.3rem 0.8rem;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .member-actions {
            display: flex;
            gap: 0.5rem;
        }

        .member-btn {
            flex: 1;
            background: rgba(0, 255, 136, 0.1);
            border: 1px solid rgba(0, 255, 136, 0.3);
            color: #00ff88;
            padding: 0.6rem 1rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
        }

        .member-btn:hover {
            background: rgba(0, 255, 136, 0.2);
            transform: translateY(-1px);
        }

        .member-btn.primary {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border-color: transparent;
        }

        /* Members List View */
        .members-list {
            display: none;
            gap: 1rem;
        }

        .members-list.active {
            display: flex;
            flex-direction: column;
        }

        .member-list-item {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .member-list-item:hover {
            border-color: rgba(0, 255, 136, 0.3);
            transform: translateX(5px);
        }

        .member-list-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: 800;
            color: #000;
            position: relative;
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
        }

        .member-list-info {
            flex: 1;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1fr auto;
            gap: 2rem;
            align-items: center;
        }

        .member-list-main h3 {
            font-size: 1.1rem;
            color: #ffffff;
            margin-bottom: 0.3rem;
        }

        .member-list-main p {
            color: #888;
            font-size: 0.9rem;
        }

        .member-list-stat {
            text-align: center;
        }

        .member-list-stat strong {
            display: block;
            color: #00d4ff;
            font-size: 1.1rem;
            font-weight: 700;
        }

        .member-list-stat span {
            color: #888;
            font-size: 0.8rem;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin-top: 3rem;
        }

        .pagination-btn {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border: 1px solid rgba(0, 255, 136, 0.1);
            color: #ffffff;
            padding: 0.8rem 1.2rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .pagination-btn:hover {
            border-color: rgba(0, 255, 136, 0.3);
            transform: translateY(-2px);
        }

        .pagination-btn.active {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border-color: transparent;
        }

        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .pagination-info {
            color: #888;
            margin: 0 1rem;
        }

        /* Loading States */
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

        /* Modal */
        .modal-overlay {
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
            z-index: 10000;
            padding: 2rem;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal-content {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            max-width: 600px;
            width: 100%;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .modal-title {
            font-size: 1.5rem;
            color: #00ff88;
            font-weight: 700;
        }

        .modal-close {
            background: none;
            border: none;
            color: #888;
            font-size: 1.5rem;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .modal-close:hover {
            color: #ffffff;
        }

        .profile-details {
            display: grid;
            gap: 2rem;
        }

        .profile-section {
            background: rgba(0, 255, 136, 0.05);
            padding: 1.5rem;
            border-radius: 10px;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .profile-section h3 {
            color: #00d4ff;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
        }

        .profile-item {
            text-align: center;
            padding: 1rem;
            background: rgba(0, 212, 255, 0.1);
            border-radius: 8px;
        }

        .profile-item strong {
            display: block;
            color: #00d4ff;
            font-size: 1.3rem;
            margin-bottom: 0.3rem;
        }

        .profile-item span {
            color: #888;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .filters-row {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .members-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
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

            .members-container {
                padding: 1rem;
            }

            .members-title {
                font-size: 2rem;
            }

            .members-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .members-grid {
                grid-template-columns: 1fr;
            }

            .member-list-info {
                grid-template-columns: 1fr;
                gap: 1rem;
                text-align: center;
            }

            .modal-content {
                margin: 1rem;
                padding: 1.5rem;
            }

            .profile-grid {
                grid-template-columns: 1fr;
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

        <!-- Member Profile Modal -->
        <div class="modal-overlay" id="profileModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="modalTitle">Profil Membre</h2>
                    <button class="modal-close" id="modalClose">&times;</button>
                </div>
                <div id="modalBody">
                    <!-- Profile content will be inserted here -->
                </div>
            </div>
        </div>

        <!-- Header -->
        <header class="forum-header">
            <div class="forum-header-content">
                <a href="#" class="forum-logo">DevCommunity</a>
                
                <nav class="forum-nav">
                    <a href="#" class="forum-nav-link">Forum</a>
                    <a href="/monblug/home/forums/forum_membres_page" class="forum-nav-link forum-active">Membres</a>
                    <a href="/monblug/home/forums/forum_ressources_page" class="forum-nav-link">Ressources</a>
                    <a href="/monblug/home/forums/forum_aide_page" class="forum-nav-link">Aide</a>
                </nav>

                <div class="forum-user-menu">
                    <input type="text" class="forum-search-bar" placeholder="Rechercher un membre..." id="memberSearch">
                    <div class="forum-user-avatar">JS</div>
                </div>
            </div>
        </header>
        <!-- Main Content -->
        <div class="members-container">
            <!-- Breadcrumb -->
            <div class="forum-breadcrumb">
                <a href="#">🏠 DevCommunity</a> > <span>👥 Membres</span>
            </div>

            <!-- Page Header -->
            <div class="members-header">
                <h1 class="members-title">Communauté des Développeurs</h1>
                <p class="members-subtitle">
                    Découvrez les talents de notre communauté, connectez-vous avec d'autres développeurs 
                    et partagez vos expériences dans un environnement collaboratif et bienveillant.
                </p>
            </div>

            <!-- Stats Section -->
            <div class="members-stats">
                <div class="stat-card">
                    <div class="stat-icon">👥</div>
                    <div class="stat-number" id="totalMembers">2,847</div>
                    <div class="stat-label">Membres Total</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">🟢</div>
                    <div class="stat-number" id="onlineMembers">142</div>
                    <div class="stat-label">En Ligne</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">🆕</div>
                    <div class="stat-number" id="newMembers">23</div>
                    <div class="stat-label">Nouveaux (7j)</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">🏆</div>
                    <div class="stat-number" id="activeMembers">678</div>
                    <div class="stat-label">Actifs (30j)</div>
                </div>
            </div>

            <!-- Filters Section -->
            <div class="members-filters">
                <div class="filters-row">
                    <div class="filter-group">
                        <label class="filter-label">Recherche</label>
                        <input type="text" class="filter-input" placeholder="Nom, compétences, localisation..." id="searchFilter">
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Rôle</label>
                        <select class="filter-select" id="roleFilter">
                            <option value="">Tous les rôles</option>
                            <option value="admin">Administrateur</option>
                            <option value="moderator">Modérateur</option>
                            <option value="expert">Expert</option>
                            <option value="member">Membre</option>
                            <option value="newbie">Débutant</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Statut</label>
                        <select class="filter-select" id="statusFilter">
                            <option value="">Tous</option>
                            <option value="online">En ligne</option>
                            <option value="offline">Hors ligne</option>
                            <option value="away">Absent</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Tri</label>
                        <select class="filter-select" id="sortFilter">
                            <option value="name">Nom</option>
                            <option value="joined">Date d'inscription</option>
                            <option value="posts">Messages</option>
                            <option value="reputation">Réputation</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Vue</label>
                        <div class="view-toggle">
                            <button class="view-btn active" id="gridView">🔲</button>
                            <button class="view-btn" id="listView">📋</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Members Grid View -->
            <div class="members-grid" id="membersGrid">
                <!-- Members will be dynamically inserted here -->
            </div>

            <!-- Members List View -->
            <div class="members-list" id="membersList">
                <!-- List view members will be dynamically inserted here -->
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button class="pagination-btn" id="prevPage" disabled>← Précédent</button>
                <div class="pagination-info">
                    Page <span id="currentPage">1</span> sur <span id="totalPages">28</span>
                </div>
                <button class="pagination-btn" id="nextPage">Suivant →</button>
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let currentPage = 1;
        let currentView = 'grid';
        let totalMembers = 2847;
        let membersPerPage = 12;
        let filteredMembers = [];
        let allMembers = [];

        // Sample member data
        const memberData = [
            {
                id: 1,
                name: "Marie Dubois",
                role: "expert",
                avatar: "MD",
                online: true,
                posts: 1247,
                reputation: 2890,
                joined: "2022-03-15",
                bio: "Développeuse Full Stack passionnée par React et Node.js. Toujours prête à aider la communauté !",
                skills: ["JavaScript", "React", "Node.js", "TypeScript"],
                badges: ["Expert", "Mentor", "Contributeur"]
            },
            {
                id: 2,
                name: "Alexandre Chen",
                role: "moderator",
                avatar: "AC",
                online: true,
                posts: 892,
                reputation: 2156,
                joined: "2021-11-08",
                bio: "Passionné de Python et d'IA. Modérateur dévoué qui maintient la qualité des discussions.",
                skills: ["Python", "Machine Learning", "Django", "PostgreSQL"],
                badges: ["Modérateur", "Python Master"]
            },
            {
                id: 3,
                name: "Sophie Laurent",
                role: "expert",
                avatar: "SL",
                online: false,
                posts: 756,
                reputation: 1890,
                joined: "2022-01-20",
                bio: "UX/UI Designer avec une forte expertise en développement front-end moderne.",
                skills: ["UI/UX", "Figma", "CSS", "Vue.js"],
                badges: ["Design Expert", "CSS Wizard"]
            },
            {
                id: 4,
                name: "Thomas Rodriguez",
                role: "member",
                avatar: "TR",
                online: true,
                posts: 234,
                reputation: 567,
                joined: "2023-05-12",
                bio: "DevOps Engineer passionné par l'automatisation et le cloud computing.",
                skills: ["Docker", "Kubernetes", "AWS", "CI/CD"],
                badges: ["Cloud Expert"]
            },
            {
                id: 5,
                name: "Emma Wilson",
                role: "admin",
                avatar: "EW",
                online: true,
                posts: 1834,
                reputation: 4205,
                joined: "2020-09-03",
                bio: "Fondatrice de DevCommunity. Architecte logiciel senior avec 10+ ans d'expérience.",
                skills: ["Architecture", "Microservices", "Java", "Spring"],
                badges: ["Fondatrice", "Architecte", "Mentor Senior"]
            },
            {
                id: 6,
                name: "Lucas Martin",
                role: "expert",
                avatar: "LM",
                online: false,
                posts: 623,
                reputation: 1456,
                joined: "2022-07-18",
                bio: "Spécialiste en sécurité informatique et développement blockchain.",
                skills: ["Security", "Blockchain", "Solidity", "Cryptography"],
                badges: ["Security Expert", "Blockchain Dev"]
            },
            {
                id: 7,
                name: "Clara Petit",
                role: "member",
                avatar: "CP",
                online: true,
                posts: 89,
                reputation: 234,
                joined: "2024-01-10",
                bio: "Nouvelle développeuse mobile passionnée par Flutter et React Native.",
                skills: ["Flutter", "React Native", "Dart", "Firebase"],
                badges: ["Mobile Dev"]
            },
            {
                id: 8,
                name: "Antoine Moreau",
                role: "member",
                avatar: "AM",
                online: false,
                posts: 445,
                reputation: 789,
                joined: "2023-02-28",
                bio: "Développeur backend spécialisé en API REST et microservices.",
                skills: ["C#", ".NET", "SQL Server", "Azure"],
                badges: [".NET Expert"]
            },
            {
                id: 9,
                name: "Léa Rousseau",
                role: "expert",
                avatar: "LR",
                online: true,
                posts: 987,
                reputation: 2340,
                joined: "2021-12-05",
                bio: "Data Scientist et experte en analyse de données avec Python et R.",
                skills: ["Python", "R", "Data Science", "TensorFlow"],
                badges: ["Data Expert", "AI Specialist"]
            },
            {
                id: 10,
                name: "David Kim",
                role: "moderator",
                avatar: "DK",
                online: true,
                posts: 567,
                reputation: 1123,
                joined: "2022-06-14",
                bio: "Game Developer passionné par Unity et le développement de jeux indés.",
                skills: ["Unity", "C#", "Game Design", "3D Modeling"],
                badges: ["Modérateur", "Game Dev"]
            },
            {
                id: 11,
                name: "Camille Blanc",
                role: "newbie",
                avatar: "CB",
                online: false,
                posts: 12,
                reputation: 45,
                joined: "2024-07-20",
                bio: "Étudiante en informatique, découvre le monde du développement web.",
                skills: ["HTML", "CSS", "JavaScript"],
                badges: ["Débutante"]
            },
            {
                id: 12,
                name: "Pierre Garnier",
                role: "member",
                avatar: "PG",
                online: true,
                posts: 334,
                reputation: 612,
                joined: "2023-09-07",
                bio: "Développeur freelance spécialisé en sites e-commerce avec PHP.",
                skills: ["PHP", "Laravel", "MySQL", "E-commerce"],
                badges: ["PHP Developer", "Freelancer"]
            }
        ];

        // Initialize the page
        function init() {
            allMembers = [...memberData];
            filteredMembers = [...allMembers];
            
            // Show loading
            showLoading();
            
            setTimeout(() => {
                setupEventListeners();
                animateStats();
                renderMembers();
                hideLoading();
                showToast("👥 Page membres chargée avec succès !", 3000);
            }, 1000);
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
            // Search functionality
            document.getElementById('memberSearch').addEventListener('input', handleSearch);
            document.getElementById('searchFilter').addEventListener('input', handleSearch);
            
            // Filter functionality
            document.getElementById('roleFilter').addEventListener('change', applyFilters);
            document.getElementById('statusFilter').addEventListener('change', applyFilters);
            document.getElementById('sortFilter').addEventListener('change', applyFilters);
            
            // View toggle
            document.getElementById('gridView').addEventListener('click', () => switchView('grid'));
            document.getElementById('listView').addEventListener('click', () => switchView('list'));
            
            // Pagination
            document.getElementById('prevPage').addEventListener('click', () => changePage(currentPage - 1));
            document.getElementById('nextPage').addEventListener('click', () => changePage(currentPage + 1));
            
            // Modal functionality
            document.getElementById('modalClose').addEventListener('click', closeModal);
            document.getElementById('profileModal').addEventListener('click', (e) => {
                if (e.target.id === 'profileModal') closeModal();
            });
        }

        // Search functionality
        function handleSearch() {
            const memberSearchTerm = document.getElementById('memberSearch').value.toLowerCase();
            const filterSearchTerm = document.getElementById('searchFilter').value.toLowerCase();
            const searchTerm = memberSearchTerm || filterSearchTerm;
            
            if (searchTerm.length > 0) {
                filteredMembers = allMembers.filter(member => 
                    member.name.toLowerCase().includes(searchTerm) ||
                    member.bio.toLowerCase().includes(searchTerm) ||
                    member.skills.some(skill => skill.toLowerCase().includes(searchTerm))
                );
            } else {
                filteredMembers = [...allMembers];
            }
            
            // Sync search inputs
            document.getElementById('memberSearch').value = searchTerm;
            document.getElementById('searchFilter').value = searchTerm;
            
            applyFilters();
        }

        // Apply filters
        function applyFilters() {
            let filtered = [...filteredMembers];
            
            // Role filter
            const roleFilter = document.getElementById('roleFilter').value;
            if (roleFilter) {
                filtered = filtered.filter(member => member.role === roleFilter);
            }
            
            // Status filter
            const statusFilter = document.getElementById('statusFilter').value;
            if (statusFilter === 'online') {
                filtered = filtered.filter(member => member.online);
            } else if (statusFilter === 'offline') {
                filtered = filtered.filter(member => !member.online);
            }
            
            // Sort
            const sortBy = document.getElementById('sortFilter').value;
            filtered.sort((a, b) => {
                switch (sortBy) {
                    case 'name':
                        return a.name.localeCompare(b.name);
                    case 'joined':
                        return new Date(b.joined) - new Date(a.joined);
                    case 'posts':
                        return b.posts - a.posts;
                    case 'reputation':
                        return b.reputation - a.reputation;
                    default:
                        return 0;
                }
            });
            
            filteredMembers = filtered;
            currentPage = 1;
            renderMembers();
        }

        // Switch view
        function switchView(view) {
            currentView = view;
            
            // Update view buttons
            document.getElementById('gridView').classList.toggle('active', view === 'grid');
            document.getElementById('listView').classList.toggle('active', view === 'list');
            
            // Update view containers
            document.getElementById('membersGrid').style.display = view === 'grid' ? 'grid' : 'none';
            document.getElementById('membersList').classList.toggle('active', view === 'list');
            
            renderMembers();
            showToast(`Vue ${view === 'grid' ? 'grille' : 'liste'} activée`);
        }

        // Render members
        function renderMembers() {
            const startIndex = (currentPage - 1) * membersPerPage;
            const endIndex = startIndex + membersPerPage;
            const membersToShow = filteredMembers.slice(startIndex, endIndex);
            
            if (currentView === 'grid') {
                renderGridView(membersToShow);
            } else {
                renderListView(membersToShow);
            }
            
            updatePagination();
        }

        // Render grid view
        function renderGridView(members) {
            const grid = document.getElementById('membersGrid');
            grid.innerHTML = '';
            
            members.forEach(member => {
                const memberCard = createMemberCard(member);
                grid.appendChild(memberCard);
            });
        }

        // Render list view
        function renderListView(members) {
            const list = document.getElementById('membersList');
            list.innerHTML = '';
            
            members.forEach(member => {
                const memberItem = createMemberListItem(member);
                list.appendChild(memberItem);
            });
        }

        // Create member card
        function createMemberCard(member) {
            const card = document.createElement('div');
            card.className = 'member-card';
            card.addEventListener('click', () => openMemberProfile(member));
            
            const roleColors = {
                admin: '#ff6b6b',
                moderator: '#4ecdc4',
                expert: '#45b7d1',
                member: '#6c5ce7',
                newbie: '#fdcb6e'
            };
            
            card.innerHTML = `
                <div class="member-header">
                    <div class="member-avatar ${member.online ? 'online' : ''}" style="background: linear-gradient(45deg, ${roleColors[member.role] || '#00ff88'}, #00d4ff)">
                        ${member.avatar}
                    </div>
                    <div class="member-info">
                        <h3 class="member-name">${member.name}</h3>
                        <div class="member-role">${getRoleLabel(member.role)}</div>
                    </div>
                </div>
                <div class="member-stats">
                    <div class="member-stat">
                        <span class="member-stat-number">${member.posts}</span>
                        <span class="member-stat-label">Messages</span>
                    </div>
                    <div class="member-stat">
                        <span class="member-stat-number">${member.reputation}</span>
                        <span class="member-stat-label">Réputation</span>
                    </div>
                </div>
                <div class="member-bio">${member.bio}</div>
                <div class="member-badges">
                    ${member.badges.map(badge => `<span class="member-badge">${badge}</span>`).join('')}
                </div>
                <div class="member-actions">
                    <button class="member-btn primary" onclick="sendMessage(${member.id}, event)">Message</button>
                    <button class="member-btn" onclick="viewProfile(${member.id}, event)">Profil</button>
                </div>
            `;
            
            return card;
        }

        // Create member list item
        function createMemberListItem(member) {
            const item = document.createElement('div');
            item.className = 'member-list-item';
            item.addEventListener('click', () => openMemberProfile(member));
            
            const roleColors = {
                admin: '#ff6b6b',
                moderator: '#4ecdc4',
                expert: '#45b7d1',
                member: '#6c5ce7',
                newbie: '#fdcb6e'
            };
            
            item.innerHTML = `
                <div class="member-list-avatar ${member.online ? 'online' : ''}" style="background: linear-gradient(45deg, ${roleColors[member.role] || '#00ff88'}, #00d4ff)">
                    ${member.avatar}
                </div>
                <div class="member-list-info">
                    <div class="member-list-main">
                        <h3>${member.name}</h3>
                        <p>${getRoleLabel(member.role)} • Inscrit le ${formatDate(member.joined)}</p>
                    </div>
                    <div class="member-list-stat">
                        <strong>${member.posts}</strong>
                        <span>Messages</span>
                    </div>
                    <div class="member-list-stat">
                        <strong>${member.reputation}</strong>
                        <span>Réputation</span>
                    </div>
                    <div class="member-list-stat">
                        <strong>${member.skills.length}</strong>
                        <span>Compétences</span>
                    </div>
                    <div class="member-list-stat">
                        <strong>${member.online ? 'En ligne' : 'Hors ligne'}</strong>
                        <span>Statut</span>
                    </div>
                    <div class="member-actions">
                        <button class="member-btn primary" onclick="sendMessage(${member.id}, event)">Message</button>
                    </div>
                </div>
            `;
            
            return item;
        }

        // Utility functions
        function getRoleLabel(role) {
            const labels = {
                admin: 'Administrateur',
                moderator: 'Modérateur',
                expert: 'Expert',
                member: 'Membre',
                newbie: 'Débutant'
            };
            return labels[role] || 'Membre';
        }

        function formatDate(dateString) {
            return new Date(dateString).toLocaleDateString('fr-FR');
        }

        // Member actions
        function sendMessage(memberId, event) {
            event.stopPropagation();
            const member = allMembers.find(m => m.id === memberId);
            showToast(`💬 Envoi d'un message à ${member.name}...`);
            console.log('Sending message to:', member.name);
        }

        function viewProfile(memberId, event) {
            event.stopPropagation();
            const member = allMembers.find(m => m.id === memberId);
            openMemberProfile(member);
        }

        // Open member profile modal
        function openMemberProfile(member) {
            const modal = document.getElementById('profileModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalBody = document.getElementById('modalBody');
            
            modalTitle.textContent = `Profil de ${member.name}`;
            
            modalBody.innerHTML = `
                <div class="profile-details">
                    <div class="member-header">
                        <div class="member-avatar ${member.online ? 'online' : ''}" style="width: 80px; height: 80px; font-size: 2rem;">
                            ${member.avatar}
                        </div>
                        <div class="member-info">
                            <h3 class="member-name" style="font-size: 1.5rem;">${member.name}</h3>
                            <div class="member-role">${getRoleLabel(member.role)}</div>
                            <div style="color: #888; margin-top: 0.5rem;">Membre depuis le ${formatDate(member.joined)}</div>
                        </div>
                    </div>
                    
                    <div class="profile-section">
                        <h3>📊 Statistiques</h3>
                        <div class="profile-grid">
                            <div class="profile-item">
                                <strong>${member.posts}</strong>
                                <span>Messages</span>
                            </div>
                            <div class="profile-item">
                                <strong>${member.reputation}</strong>
                                <span>Réputation</span>
                            </div>
                            <div class="profile-item">
                                <strong>${member.badges.length}</strong>
                                <span>Badges</span>
                            </div>
                            <div class="profile-item">
                                <strong>${member.skills.length}</strong>
                                <span>Compétences</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="profile-section">
                        <h3>💬 À propos</h3>
                        <p style="color: #b0b0b0; line-height: 1.6;">${member.bio}</p>
                    </div>
                    
                    <div class="profile-section">
                        <h3>🛠️ Compétences</h3>
                        <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                            ${member.skills.map(skill => `<span class="member-badge">${skill}</span>`).join('')}
                        </div>
                    </div>
                    
                    <div class="profile-section">
                        <h3>🏆 Badges</h3>
                        <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                            ${member.badges.map(badge => `<span class="member-badge" style="background: linear-gradient(45deg, #ffd700, #ffed4e);">${badge}</span>`).join('')}
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                        <button class="member-btn primary" style="flex: 1;" onclick="sendMessage(${member.id}, event)">💬 Envoyer un message</button>
                        <button class="member-btn" style="flex: 1;" onclick="followMember(${member.id})">👤 Suivre</button>
                    </div>
                </div>
            `;
            
            modal.classList.add('show');
            showToast(`👀 Ouverture du profil de ${member.name}`);
        }

        // Close modal
        function closeModal() {
            document.getElementById('profileModal').classList.remove('show');
        }

        // Follow member
        function followMember(memberId) {
            const member = allMembers.find(m => m.id === memberId);
            showToast(`👤 Vous suivez maintenant ${member.name} !`);
            closeModal();
        }

        // Pagination
        function updatePagination() {
            const totalPages = Math.ceil(filteredMembers.length / membersPerPage);
            
            document.getElementById('currentPage').textContent = currentPage;
            document.getElementById('totalPages').textContent = totalPages;
            
            document.getElementById('prevPage').disabled = currentPage === 1;
            document.getElementById('nextPage').disabled = currentPage === totalPages;
        }

        function changePage(page) {
            const totalPages = Math.ceil(filteredMembers.length / membersPerPage);
            
            if (page >= 1 && page <= totalPages) {
                currentPage = page;
                renderMembers();
                showToast(`📄 Page ${page} chargée`);
                
                // Scroll to top
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        // Animate stats
        function animateStats() {
            function animateCounter(elementId, target, duration = 2000) {
                const element = document.getElementById(elementId);
                const start = 0;
                const increment = target / (duration / 16);
                let current = start;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    element.textContent = Math.floor(current).toLocaleString();
                }, 16);
            }

            setTimeout(() => {
                animateCounter('totalMembers', 2847);
                animateCounter('onlineMembers', 142);
                animateCounter('newMembers', 23);
                animateCounter('activeMembers', 678);
            }, 500);
        }

        // Real-time updates
        function startRealTimeUpdates() {
            setInterval(() => {
                // Simulate online count changes
                const onlineElement = document.getElementById('onlineMembers');
                const currentOnline = parseInt(onlineElement.textContent);
                const change = Math.floor(Math.random() * 10) - 5; // -5 to +5
                const newOnline = Math.max(100, Math.min(200, currentOnline + change));
                onlineElement.textContent = newOnline;
                
                // Update online status of some members
                allMembers.forEach(member => {
                    if (Math.random() < 0.1) { // 10% chance to change status
                        member.online = !member.online;
                    }
                });
                
                renderMembers();
            }, 30000); // Update every 30 seconds
        }

        // Initialize the application
        document.addEventListener('DOMContentLoaded', () => {
            init();
            startRealTimeUpdates();
        });

        // Handle escape key to close modal
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</body>
</html>
<?php
session_start();
    include(__DIR__.'/../../login/connexion.php');
    $categorie_recupe = $pdo->prepare('SELECT * FROM categorie');
    $categorie_recupe->execute();
    $categories = $categorie_recupe->fetchAll();

    // Recuperation de tous les sujets par catégorie
    $forum_sujets_recupe = $pdo->prepare('SELECT * FROM forum INNER JOIN categorie ON forum.id_categorie = categorie.id_categorie');
    $forum_sujets_recupe->execute();
    $sujets = $forum_sujets_recupe->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevCommunity - Forum Moderne</title>
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
        /* .forum-header {
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

        .forum-nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .forum-nav-link:hover::before {
            left: 100%;
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
        } */

        /* Main Content */
        .forum-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
            display: grid;
            grid-template-columns: 250px 1fr 300px;
            gap: 2rem;
            position: relative;
            z-index: 2;
        }

        /* Sidebar */
        .forum-sidebar {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 1.5rem;
            height: fit-content;
            border: 1px solid rgba(0, 255, 136, 0.1);
            position: sticky;
            top: 120px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        .forum-sidebar-title {
            color: #00ff88;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-align: center;
            text-shadow: 0 2px 10px rgba(0, 255, 136, 0.3);
        }

        .forum-sidebar-item {
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

        .forum-sidebar-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .forum-sidebar-item:hover::before {
            left: 100%;
        }

        .forum-sidebar-item:hover, .forum-sidebar-item.forum-active {
            color: #ffffff;
            background: rgba(0, 255, 136, 0.1);
            border-left-color: #00ff88;
            transform: translateX(5px);
            box-shadow: 0 2px 10px rgba(0, 255, 136, 0.2);
        }

        .forum-sidebar-item.forum-active {
            background: linear-gradient(90deg, rgba(0, 255, 136, 0.2), rgba(0, 212, 255, 0.1));
            color: #00ff88;
            font-weight: 600;
        }

        .forum-stats {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .forum-stat-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.8rem;
            padding: 0.5rem;
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        .forum-stat-item:hover {
            background: rgba(0, 255, 136, 0.05);
        }

        .forum-stat-label {
            color: #888;
        }

        .forum-stat-value {
            color: #00d4ff;
            font-weight: 600;
            text-shadow: 0 1px 5px rgba(0, 212, 255, 0.3);
        }

        /* Main Forum Area */
        .forum-main-area {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .forum-breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #888;
            margin-bottom: 1rem;
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

        /* Categories Section */
        .forum-category {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(0, 255, 136, 0.1);
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .forum-category:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        }

        .forum-category-header {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000000;
            padding: 1rem 1.5rem;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .forum-category-header:hover {
            background: linear-gradient(45deg, #00d4ff, #00ff88);
        }

        .forum-category-icon {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .forum-category.collapsed .forum-category-icon {
            transform: rotate(-90deg);
        }

        .forum-subforum {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .forum-subforum::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.03), transparent);
            transition: left 0.5s ease;
        }

        .forum-subforum:hover::before {
            left: 100%;
        }

        .forum-subforum:hover {
            background: rgba(0, 255, 136, 0.05);
            transform: translateX(5px);
        }

        .forum-subforum:last-child {
            border-bottom: none;
        }

        .forum-subforum-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 0.8rem;
        }

        .forum-subforum-info {
            flex: 1;
        }

        .forum-subforum-title {
            color: #ffffff;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .forum-subforum:hover .forum-subforum-title {
            color: #00ff88;
            text-shadow: 0 2px 10px rgba(0, 255, 136, 0.3);
        }

        .forum-subforum-desc {
            color: #b0b0b0;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .forum-subforum-stats {
            display: flex;
            gap: 1.5rem;
            text-align: center;
            margin-left: 2rem;
        }

        .forum-stat-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 80px;
            padding: 0.5rem;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .forum-stat-box:hover {
            background: rgba(0, 212, 255, 0.1);
        }

        .forum-stat-number {
            color: #00d4ff;
            font-size: 1.1rem;
            font-weight: 600;
            text-shadow: 0 1px 5px rgba(0, 212, 255, 0.3);
        }

        .forum-stat-text {
            color: #888;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .forum-last-post {
            margin-left: 2rem;
            min-width: 200px;
            padding: 0.5rem;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .forum-last-post:hover {
            background: rgba(0, 255, 136, 0.05);
        }

        .forum-last-post-title {
            color: #ffffff;
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }

        .forum-last-post-meta {
            color: #888;
            font-size: 0.8rem;
        }

        /* Recent Activity Widget */
        .forum-activity-widget {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 1.5rem;
            height: fit-content;
            border: 1px solid rgba(0, 255, 136, 0.1);
            position: sticky;
            top: 120px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        .forum-widget-title {
            color: #00ff88;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-align: center;
            text-shadow: 0 2px 10px rgba(0, 255, 136, 0.3);
        }

        .forum-activity-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            border-radius: 8px;
            margin-bottom: 0.5rem;
        }

        .forum-activity-item:hover {
            background: rgba(0, 255, 136, 0.05);
            transform: translateX(5px);
        }

        .forum-activity-item:last-child {
            border-bottom: none;
        }

        .forum-activity-avatar {
            width: 35px;
            height: 35px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #000;
            font-size: 0.8rem;
            transition: transform 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 255, 136, 0.3);
        }

        .forum-activity-item:hover .forum-activity-avatar {
            transform: scale(1.1);
        }

        .forum-activity-content {
            flex: 1;
        }

        .forum-activity-action {
            color: #ffffff;
            font-size: 0.9rem;
            margin-bottom: 0.2rem;
        }

        .forum-activity-time {
            color: #888;
            font-size: 0.8rem;
        }

        /* Online Users */
        .forum-online-users {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .forum-online-title {
            color: #00d4ff;
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-shadow: 0 1px 5px rgba(0, 212, 255, 0.3);
        }

        .forum-online-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .forum-online-user {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(0, 255, 136, 0.1);
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }

        .forum-online-user:hover {
            background: rgba(0, 255, 136, 0.2);
            transform: scale(1.05);
        }

        .forum-online-dot {
            width: 8px;
            height: 8px;
            background: #00ff88;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.2); }
        }

        /* New Thread Button */
        .forum-new-thread-btn {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000000;
            border: none;
            padding: 1rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
        }

        .forum-new-thread-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .forum-new-thread-btn:hover::before {
            left: 100%;
        }

        .forum-new-thread-btn:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.4);
        }

        /* Footer */
        .forum-footer {
            background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
            border-top: 1px solid rgba(0, 255, 136, 0.2);
            margin-top: 4rem;
            position: relative;
            z-index: 2;
        }

        .forum-footer-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 3rem 2rem 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .forum-footer-section {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .forum-footer-section h4 {
            color: #00ff88;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 10px rgba(0, 255, 136, 0.3);
        }

        .forum-footer-section p {
            color: #b0b0b0;
            line-height: 1.6;
        }

        .forum-footer-link {
            color: #888;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 0.3rem 0;
            border-radius: 4px;
        }

        .forum-footer-link:hover {
            color: #00d4ff;
            padding-left: 0.5rem;
            background: rgba(0, 212, 255, 0.1);
        }

        .forum-social-links {
            display: flex;
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .forum-social-link {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 255, 136, 0.3);
        }

        .forum-social-link:hover {
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 5px 20px rgba(0, 255, 136, 0.5);
        }

        .forum-footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1.5rem 0;
        }

        .forum-footer-bottom-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .forum-footer-bottom p {
            color: #888;
            margin: 0;
        }

        .forum-footer-legal {
            display: flex;
            gap: 1.5rem;
        }

        .forum-footer-legal-link {
            color: #888;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forum-footer-legal-link:hover {
            color: #00d4ff;
        }

        /* Mobile Menu Button */
        .forum-mobile-menu-btn {
            display: none;
            background: rgba(0, 255, 136, 0.1);
            border: 1px solid rgba(0, 255, 136, 0.3);
            color: #00ff88;
            padding: 0.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .forum-mobile-menu-btn:hover {
            background: rgba(0, 255, 136, 0.2);
            transform: scale(1.05);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .forum-content {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .forum-sidebar, .forum-activity-widget {
                position: static;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }

            .forum-subforum-stats, .forum-last-post {
                margin-left: 0;
                margin-top: 1rem;
            }

            .forum-subforum-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 768px) {
            .forum-header-content {
                padding: 0 1rem;
                flex-wrap: wrap;
                gap: 1rem;
            }

            .forum-nav {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: #1e1e1e;
                border-radius: 0 0 12px 12px;
                padding: 1rem;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            }

            .forum-nav.show {
                display: flex;
            }

            .forum-mobile-menu-btn {
                display: block;
            }

            .forum-search-bar {
                width: 100%;
                order: 3;
                flex-basis: 100%;
            }

            .forum-content {
                padding: 1rem;
            }

            .forum-sidebar, .forum-activity-widget {
                grid-template-columns: 1fr;
            }

            .forum-subforum-stats {
                flex-direction: column;
                gap: 0.5rem;
            }

            .forum-footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .forum-footer-bottom-content {
                flex-direction: column;
                text-align: center;
            }
        }

        /* Loading Animation */
        .forum-loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .forum-loading.show {
            display: flex;
        }

        .forum-spinner {
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

        /* Notification Toast */
        .forum-toast {
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

        .forum-toast.show {
            transform: translateX(0);
        }
        a{
            text-decoration:none;
        }
    </style>
</head>
<body>
    <div class="forum-main-container">
        <!-- Loading Screen -->
        <div class="forum-loading" id="loadingScreen">
            <div class="forum-spinner"></div>
        </div>

        <!-- Toast Notification -->
        <div class="forum-toast" id="toastNotification"></div>

        <!-- Header -->
       
        <?php 
            // include(__DIR__.'/forum_nav/forum_nav.php')
        
            if(empty($_SESSION['user']['nom_complet'])){
                include(__DIR__.'/../../navbar/NavBarIndex.php');
            }else{
                include(__DIR__.'/../../navbar/NavBarAcceuil.php');
            }
        ?>

        <!-- Main Content -->
        <div class="forum-content">
            <!-- Sidebar -->
            <aside class="forum-sidebar">
                <h3 class="forum-sidebar-title">Navigation</h3>
                <a href="#" class="forum-sidebar-item forum-active" data-nav="accueil">🏠 Accueil</a>
                <a href="#" class="forum-sidebar-item" data-nav="recents">📬 Messages récents</a>
                <a href="#" class="forum-sidebar-item" data-nav="mes-sujets">💬 Mes sujets</a>
                <a href="#" class="forum-sidebar-item" data-nav="mes-reponses">💭 Mes réponses</a>
                <a href="#" class="forum-sidebar-item" data-nav="suivis">🔔 Sujets suivis</a>
                <a href="#" class="forum-sidebar-item" data-nav="favoris">⭐ Favoris</a>

                <div class="forum-stats">
                    <div class="forum-stat-item">
                        <span class="forum-stat-label">Membres:</span>
                        <span class="forum-stat-value" id="membersCount">2,847</span>
                    </div>
                    <div class="forum-stat-item">
                        <span class="forum-stat-label">Sujets:</span>
                        <span class="forum-stat-value" id="topicsCount">15,432</span>
                    </div>
                    <div class="forum-stat-item">
                        <span class="forum-stat-label">Messages:</span>
                        <span class="forum-stat-value" id="messagesCount">89,756</span>
                    </div>
                    <div class="forum-stat-item">
                        <span class="forum-stat-label">En ligne:</span>
                        <span class="forum-stat-value" id="onlineCount">142</span>
                    </div>
                </div>
            </aside>

            <!-- Main Forum Area -->
            <main class="forum-main-area" id="mainContent">
                <div class="forum-breadcrumb">
                    <a href="#">🏠 LearnicaCommunity</a> > <span id="breadcrumbCurrent">Forum Principal</span>
                </div>

                <a href="/monblug/admin/forums/create" class="forum-new-thread-btn">+ Nouveau Sujet</a>

                <!-- Development Category -->
                <?php foreach ($categories as $categorie): ?>
                    <div class="forum-category">
                        <div class="forum-category-header">
                            <span>💻 <?= htmlspecialchars($categorie['titre_categorie']); ?></span>
                            <span class="forum-category-icon">▼</span>
                        </div>
                        <?php foreach ($sujets as $sujet): ?>
                            <?php if ($sujet['id_categorie'] === $categorie['id_categorie']): ?>
                                <div class="forum-subforum">
                                    <a href="/monblug/home/forums/forum_list_sujets_page?num=<?= htmlspecialchars( $categorie['id_categorie']) ?>">
                                        <div class="forum-subforum-header">
                                            <div class="forum-subforum-info">
                                                <h3 class="forum-subforum-title"><?= htmlspecialchars($sujet['titre_forum']) ?></h3>
                                                <p class="forum-subforum-desc">
                                                    Discussions sur <?= htmlspecialchars($sujet['slug_form']) ?>.
                                                </p>
                                            </div>
                                            <div class="forum-subforum-stats">
                                                <div class="forum-stat-box">
                                                    <span class="forum-stat-number">1,234</span>
                                                    <span class="forum-stat-text">Sujets</span>
                                                </div>
                                                <div class="forum-stat-box">
                                                    <span class="forum-stat-number">8,567</span>
                                                    <span class="forum-stat-text">Messages</span>
                                                </div>
                                            </div>
                                            <div class="forum-last-post">
                                                <div class="forum-last-post-title">React 18 : Nouvelles fonctionnalités</div>
                                                <div class="forum-last-post-meta">Par Marie D. - Il y a 2h</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </main>

            <!-- Activity Widget -->
            <aside class="forum-activity-widget">
                <h3 class="forum-widget-title">Activité Récente</h3>

                <div class="forum-activity-item">
                    <div class="forum-activity-avatar">MD</div>
                    <div class="forum-activity-content">
                        <div class="forum-activity-action">Marie a créé un nouveau sujet</div>
                        <div class="forum-activity-time">Il y a 5 minutes</div>
                    </div>
                </div>

                <div class="forum-activity-item">
                    <div class="forum-activity-avatar">PK</div>
                    <div class="forum-activity-content">
                        <div class="forum-activity-action">Pierre a répondu à un sujet</div>
                        <div class="forum-activity-time">Il y a 12 minutes</div>
                    </div>
                </div>

                <div class="forum-activity-item">
                    <div class="forum-activity-avatar">AL</div>
                    <div class="forum-activity-content">
                        <div class="forum-activity-action">Alex s'est inscrit</div>
                        <div class="forum-activity-time">Il y a 18 minutes</div>
                    </div>
                </div>

                <div class="forum-activity-item">
                    <div class="forum-activity-avatar">SL</div>
                    <div class="forum-activity-content">
                        <div class="forum-activity-action">Sophie a liké un message</div>
                        <div class="forum-activity-time">Il y a 25 minutes</div>
                    </div>
                </div>

                <div class="forum-activity-item">
                    <div class="forum-activity-avatar">TR</div>
                    <div class="forum-activity-content">
                        <div class="forum-activity-action">Thomas a créé un sujet</div>
                        <div class="forum-activity-time">Il y a 32 minutes</div>
                    </div>
                </div>

                <div class="forum-online-users">
                    <h4 class="forum-online-title">Membres en ligne (<span id="onlineUsersCount">142</span>)</h4>
                    <div class="forum-online-list">
                        <div class="forum-online-user">
                            <div class="forum-online-dot"></div>
                            Clara V.
                        </div>
                        <div class="forum-online-user">
                            <div class="forum-online-dot"></div>
                            Antoine L.
                        </div>
                        <div class="forum-online-user">
                            <div class="forum-online-dot"></div>
                            Léa M.
                        </div>
                    </div>
                </div>
            </aside>
        </div>

        <!-- Footer -->
        <!-- <footer class="forum-footer">
            <div class="forum-footer-content">
                <div class="forum-footer-section">
                    <h4>DevCommunity</h4>
                    <p>La communauté des développeurs passionnés. Partagez vos connaissances, posez vos questions et grandissez ensemble dans le monde du développement.</p>
                    <div class="forum-social-links">
                        <a href="#" class="forum-social-link" title="Twitter">
                            <span>🐦</span>
                        </a>
                        <a href="#" class="forum-social-link" title="LinkedIn">
                            <span>💼</span>
                        </a>
                        <a href="#" class="forum-social-link" title="YouTube">
                            <span>📺</span>
                        </a>
                        <a href="#" class="forum-social-link" title="Facebook">
                            <span>📘</span>
                        </a>
                    </div>
                </div>
                
                <div class="forum-footer-section">
                    <h4>Navigation</h4>
                    <a href="#" class="forum-footer-link">Accueil</a>
                    <a href="#" class="forum-footer-link">Forum</a>
                    <a href="#" class="forum-footer-link">Membres</a>
                    <a href="#" class="forum-footer-link">Ressources</a>
                    <a href="#" class="forum-footer-link">Tutoriels</a>
                    <a href="#" class="forum-footer-link">Blog</a>
                </div>
                
                <div class="forum-footer-section">
                    <h4>Support</h4>
                    <a href="#" class="forum-footer-link">Centre d'aide</a>
                    <a href="#" class="forum-footer-link">Règlement</a>
                    <a href="#" class="forum-footer-link">Contact</a>
                    <a href="#" class="forum-footer-link">Signaler un bug</a>
                    <a href="#" class="forum-footer-link">Suggestions</a>
                    <a href="#" class="forum-footer-link">FAQ</a>
                </div>
                
                <div class="forum-footer-section">
                    <h4>Développement</h4>
                    <a href="#" class="forum-footer-link">API</a>
                    <a href="#" class="forum-footer-link">Documentation</a>
                    <a href="#" class="forum-footer-link">GitHub</a>
                    <a href="#" class="forum-footer-link">Changelog</a>
                    <a href="#" class="forum-footer-link">Roadmap</a>
                    <a href="#" class="forum-footer-link">Contribuer</a>
                </div>
            </div>
            
            <div class="forum-footer-bottom">
                <div class="forum-footer-bottom-content">
                    <p>&copy; 2024 DevCommunity. Tous droits réservés.</p>
                    <div class="forum-footer-legal">
                        <a href="#" class="forum-footer-legal-link">Mentions légales</a>
                        <a href="#" class="forum-footer-legal-link">Politique de confidentialité</a>
                        <a href="#" class="forum-footer-legal-link">CGU</a>
                    </div>
                </div>
            </div>
        </footer> -->
        <?php include(__DIR__.'/../../navbar/footer.php') ?>            
    </div>

    <script>
        // Global variables
        let isLoading = false;
        const loadingScreen = document.getElementById('loadingScreen');
        const toastNotification = document.getElementById('toastNotification');

        // Utility functions
        function showLoading() {
            isLoading = true;
            loadingScreen.classList.add('show');
        }

        function hideLoading() {
            isLoading = false;
            loadingScreen.classList.remove('show');
        }

        function showToast(message, duration = 3000) {
            toastNotification.textContent = message;
            toastNotification.classList.add('show');
            setTimeout(() => {
                toastNotification.classList.remove('show');
            }, duration);
        }

        function updateBreadcrumb(text) {
            document.getElementById('breadcrumbCurrent').textContent = text;
        }

        // Enhanced sidebar navigation
        function initSidebarNavigation() {
            const sidebarItems = document.querySelectorAll('.forum-sidebar-item');
            
            sidebarItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all items
                    sidebarItems.forEach(sItem => sItem.classList.remove('forum-active'));
                    
                    // Add active class to clicked item
                    this.classList.add('forum-active');
                    
                    // Get the navigation target
                    const navTarget = this.getAttribute('data-nav');
                    
                    // Show loading
                    showLoading();
                    
                    // Simulate loading delay
                    setTimeout(() => {
                        loadContent(navTarget);
                        hideLoading();
                        showToast(`Navigation vers ${this.textContent.trim()}`);
                    }, 500);
                });
            });
        }

        // Content loading simulation
        function loadContent(section) {
            const mainContent = document.getElementById('mainContent');
            const sectionTitles = {
                'accueil': 'Forum Principal',
                'recents': 'Messages récents',
                'mes-sujets': 'Mes sujets',
                'mes-reponses': 'Mes réponses',
                'suivis': 'Sujets suivis',
                'favoris': 'Favoris'
            };

            updateBreadcrumb(sectionTitles[section] || 'Forum Principal');

            // In a real application, this would load different content based on the section
            switch(section) {
                case 'recents':
                    loadRecentMessages();
                    break;
                case 'mes-sujets':
                    loadMyTopics();
                    break;
                case 'mes-reponses':
                    loadMyReplies();
                    break;
                case 'suivis':
                    loadFollowedTopics();
                    break;
                case 'favoris':
                    loadFavorites();
                    break;
                default:
                    // Keep current content for home
                    break;
            }
        }

        // Content loading functions (simulated)
        function loadRecentMessages() {
            console.log('Chargement des messages récents...');
            // This would load recent messages from the server
        }

        function loadMyTopics() {
            console.log('Chargement de mes sujets...');
            // This would load user's topics from the server
        }

        function loadMyReplies() {
            console.log('Chargement de mes réponses...');
            // This would load user's replies from the server
        }

        function loadFollowedTopics() {
            console.log('Chargement des sujets suivis...');
            // This would load followed topics from the server
        }

        function loadFavorites() {
            console.log('Chargement des favoris...');
            // This would load favorite topics from the server
        }

        // Enhanced search functionality
        // function initSearch() {
        //     const searchBar = document.getElementById('searchBar');
        //     let searchTimeout;

        //     searchBar.addEventListener('input', function() {
        //         clearTimeout(searchTimeout);
        //         const searchTerm = this.value.trim();
                
        //         if (searchTerm.length > 2) {
        //             searchTimeout = setTimeout(() => {
        //                 performSearch(searchTerm);
        //             }, 300);
        //         }
        //     });

        //     searchBar.addEventListener('keypress', function(e) {
        //         if (e.key === 'Enter') {
        //             const searchTerm = this.value.trim();
        //             if (searchTerm) {
        //                 showLoading();
        //                 setTimeout(() => {
        //                     performSearch(searchTerm);
        //                     hideLoading();
        //                 }, 800);
        //             }
        //         }
        //     });
        // }

        function performSearch(searchTerm) {
            console.log('Recherche pour:', searchTerm);
            showToast(`Recherche: "${searchTerm}"`);
            updateBreadcrumb(`Résultats pour "${searchTerm}"`);
            // In a real app, this would make an API call and display results
        }

        // Enhanced category functionality
        function initCategoryCollapse() {
            document.querySelectorAll('.forum-category-header').forEach(header => {
                header.addEventListener('click', function() {
                    const category = this.parentElement;
                    const icon = this.querySelector('.forum-category-icon');
                    const subforums = category.querySelectorAll('.forum-subforum');
                    
                    category.classList.toggle('collapsed');
                    
                    subforums.forEach((subforum, index) => {
                        setTimeout(() => {
                            if (category.classList.contains('collapsed')) {
                                subforum.style.display = 'none';
                                icon.textContent = '▶';
                            } else {
                                subforum.style.display = 'block';
                                icon.textContent = '▼';
                            }
                        }, index * 50);
                    });
                });
            });
        }

        // Enhanced subforum navigation
        function initSubforumNavigation() {
            document.querySelectorAll('.forum-subforum').forEach(subforum => {
                subforum.addEventListener('click', function(e) {
                    // Prevent click when clicking on stats or last post
                    if (e.target.closest('.forum-subforum-stats') || e.target.closest('.forum-last-post')) {
                        return;
                    }
                    
                    const title = this.querySelector('.forum-subforum-title').textContent;
                    showLoading();
                    
                    setTimeout(() => {
                        console.log('Navigation vers:', title);
                        updateBreadcrumb(title);
                        hideLoading();
                        showToast(`Ouverture de ${title}`);
                    }, 600);
                });
            });
        }

        // Enhanced mobile menu
        function initMobileMenu() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mainNav = document.getElementById('mainNav');

            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener('click', function() {
                    mainNav.classList.toggle('show');
                    this.style.transform = mainNav.classList.contains('show') ? 'rotate(90deg)' : 'rotate(0deg)';
                });
            }

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.forum-header-content')) {
                    mainNav.classList.remove('show');
                    if (mobileMenuBtn) {
                        mobileMenuBtn.style.transform = 'rotate(0deg)';
                    }
                }
            });
        }

        // Enhanced stats animation
        function initStatsAnimation() {
            function animateCounter(element, target, duration = 2000) {
                const start = parseInt(element.textContent.replace(/,/g, '')) || 0;
                const increment = (target - start) / (duration / 16);
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

            // Animate stats on page load
            setTimeout(() => {
                const membersCount = document.getElementById('membersCount');
                const topicsCount = document.getElementById('topicsCount');
                const messagesCount = document.getElementById('messagesCount');
                const onlineCount = document.getElementById('onlineCount');

                if (membersCount) animateCounter(membersCount, 2847);
                if (topicsCount) animateCounter(topicsCount, 15432);
                if (messagesCount) animateCounter(messagesCount, 89756);
                if (onlineCount) animateCounter(onlineCount, 142);
            }, 1000);
        }

        // Real-time updates simulation
        function initRealTimeUpdates() {
            function updateOnlineCount() {
                const onlineCountElements = [
                    document.getElementById('onlineCount'),
                    document.getElementById('onlineUsersCount')
                ];
                
                onlineCountElements.forEach(element => {
                    if (element) {
                        const currentCount = parseInt(element.textContent);
                        const change = Math.floor(Math.random() * 7) - 3; // -3 to +3
                        const newCount = Math.max(120, Math.min(180, currentCount + change));
                        element.textContent = newCount;
                    }
                });
            }

            function updateLastPosts() {
                const lastPosts = document.querySelectorAll('.forum-last-post-meta');
                const timeOptions = ['Il y a 1min', 'Il y a 3min', 'Il y a 5min', 'Il y a 8min'];
                
                lastPosts.forEach(post => {
                    if (Math.random() < 0.3) { // 30% chance to update
                        const randomTime = timeOptions[Math.floor(Math.random() * timeOptions.length)];
                        const content = post.textContent;
                        post.textContent = content.replace(/Il y a \d+\w+/, randomTime);
                    }
                });
            }

            // Update every 30 seconds
            setInterval(() => {
                updateOnlineCount();
                updateLastPosts();
            }, 30000);

            // Update online count every 10 seconds
            setInterval(updateOnlineCount, 10000);
        }

        // Enhanced new thread functionality
        function initNewThreadButton() {
            document.querySelector('.forum-new-thread-btn').addEventListener('click', function() {
                showLoading();
                
                setTimeout(() => {
                    hideLoading();
                    showToast('Ouverture de l\'éditeur de nouveau sujet...');
                    console.log('Ouverture de la modal de création de nouveau sujet');
                    // In a real application, this would open a new thread creation modal or page
                }, 1000);
            });
        }

        // Enhanced user avatar menu
        // function initUserMenu() {
        //     const userAvatar = document.querySelector('.forum-user-avatar');
            
        //     userAvatar.addEventListener('click', function() {
        //         showToast('Menu utilisateur');
        //         console.log('Ouverture du menu utilisateur');
                // In a real application, this would show a dropdown menu with user options
        //     });
        // }

        // Keyboard shortcuts
        function initKeyboardShortcuts() {
            document.addEventListener('keydown', function(e) {
                // Ctrl/Cmd + K for search
                if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                    e.preventDefault();
                    document.getElementById('searchBar').focus();
                    showToast('Raccourci recherche activé');
                }
                
                // Escape to close mobile menu
                if (e.key === 'Escape') {
                    const mainNav = document.getElementById('mainNav');
                    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
                    if (mainNav && mainNav.classList.contains('show')) {
                        mainNav.classList.remove('show');
                        if (mobileMenuBtn) {
                            mobileMenuBtn.style.transform = 'rotate(0deg)';
                        }
                    }
                }
            });
        }

        // Smooth scrolling enhancement
        function initSmoothScrolling() {
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
        }

        // Page visibility API for real-time updates
        function initVisibilityAPI() {
            document.addEventListener('visibilitychange', function() {
                if (!document.hidden) {
                    // Page became visible, refresh data
                    console.log('Page visible - actualisation des données');
                    showToast('Données actualisées', 1500);
                }
            });
        }

        // Initialize all functionality
        function init() {
            // Show initial loading
            showLoading();
            
            setTimeout(() => {
                // Initialize all modules
                initSidebarNavigation();
                // initSearch();
                initCategoryCollapse();
                initSubforumNavigation();
                initMobileMenu();
                initStatsAnimation();
                initRealTimeUpdates();
                initNewThreadButton();
                // initUserMenu();
                initKeyboardShortcuts();
                initSmoothScrolling();
                initVisibilityAPI();
                
                // Hide loading and show welcome message
                hideLoading();
                setTimeout(() => {
                    showToast('Bienvenue sur DevCommunity ! 🚀', 4000);
                }, 500);
                
                console.log('🚀 DevCommunity Forum initialisé avec succès !');
            }, 1500);
        }

        // Start the application
        document.addEventListener('DOMContentLoaded', init);

        // Handle window resize for responsive adjustments
        window.addEventListener('resize', function() {
            const mainNav = document.getElementById('mainNav');
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            
            if (window.innerWidth > 768) {
                mainNav.classList.remove('show');
                if (mobileMenuBtn) {
                    mobileMenuBtn.style.transform = 'rotate(0deg)';
                }
            }
        });

        // Error handling for development
        window.addEventListener('error', function(e) {
            console.error('Erreur JavaScript:', e.error);
            showToast('Une erreur est survenue', 2000);
        });

        // Service Worker registration (for future PWA features)
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                // Commented out for now, but ready for PWA implementation
                // navigator.serviceWorker.register('/sw.js')
                //     .then(reg => console.log('Service Worker enregistré'))
                //     .catch(err => console.log('Erreur Service Worker:', err));
            });
        }
    </script>
</body>
</html>
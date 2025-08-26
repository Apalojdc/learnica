<?php session_start();

    // if(!($_SESSION['user']['mail'])){
    //     session_unset();
    //     session_destroy();
    //     header('Location: /monblug/achat/package/formation/API/test/connexion');
    // }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="imagesite/simplecodeurlogo.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutoriels</title>
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

        .header-nav {
            display: flex;
            align-items: center;
            gap: 2rem;
            position: fixed;
            right: 0;
            top: 100px;
            z-index: 9999;

        }

        .back-btn {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            color: #000;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: none;
        }

        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.4);
        }

        .current-category {
            color: #00ff88;
            font-weight: 600;
        }

        /* Main Container */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        /* Categories Section */
        .categories-section {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            animation: slideInFromTop 0.8s ease-out;
        }

        .categories-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .categories-title {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .categories-subtitle {
            color: #b0b0b0;
            font-size: 1.2rem;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .category-card {
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            border-radius: 15px;
            overflow: hidden;
            border: 2px solid rgba(0, 255, 136, 0.1);
            transition: all 0.4s ease;
            cursor: pointer;
            position: relative;
            animation: fadeInUp 0.6s ease-out;
            height: 280px;
        }

        .category-card:hover {
            transform: translateY(-10px) scale(1.02);
            border-color: rgba(0, 255, 136, 0.4);
            box-shadow: 0 15px 40px rgba(0, 255, 136, 0.2);
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.6s ease;
            z-index: 1;
        }

        .category-card:hover::before {
            left: 100%;
        }

        .category-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            position: relative;
            z-index: 2;
        }

        .category-content {
            padding: 1.5rem;
            text-align: center;
            position: relative;
            z-index: 2;
            height: 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .category-title {
            font-size: 1.3rem;
            font-weight: 700;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .category-count {
            color: #888;
            font-size: 0.9rem;
        }

        /* Progress Section */
        .progress-section {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            animation: slideInFromTop 0.8s ease-out;
            display: none;
        }

        .progress-section.show {
            display: block;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .progress-title {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .progress-stats {
            display: flex;
            gap: 2rem;
            color: #b0b0b0;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 1.2rem;
            font-weight: 700;
            color: #00ff88;
            display: block;
        }

        .progress-bar-container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            height: 20px;
            overflow: hidden;
            position: relative;
            margin-bottom: 1rem;
        }

        .progress-bar {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            height: 100%;
            border-radius: 10px;
            transition: width 0.5s ease;
            position: relative;
            overflow: hidden;
        }

        .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: progressShine 2s ease-in-out infinite;
        }

        @keyframes progressShine {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .progress-text {
            text-align: center;
            color: #00d4ff;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        /* Video Player Section */
        .video-player-section {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
            display: none;
            animation: slideInFromTop 0.8s ease-out;
        }

        .video-player-section.active {
            display: block;
        }

        @keyframes slideInFromTop {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .video-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .video-title {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            flex: 1;
            margin-right: 1rem;
        }

        .video-controls {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .control-btn {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border: none;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.2rem;
            color: #000;
            font-weight: bold;
        }

        .control-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.4);
        }

        .control-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        .close-btn {
            background: linear-gradient(45deg, #ff6b6b, #ff8e8e);
        }

        .close-btn:hover {
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.4);
        }

        .mark-complete-btn {
            background: linear-gradient(45deg, #4ade80, #22c55e);
            border: none;
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            color: #000;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .mark-complete-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(74, 222, 128, 0.4);
        }

        .mark-complete-btn.completed {
            background: linear-gradient(45deg, #10b981, #059669);
            color: #fff;
        }

        .video-player {
            width: 100%;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
            margin-bottom: 1.5rem;
        }

        .video-player iframe {
            width: 100%;
            height: 500px;
            border: none;
        }

        .video-info {
            background: rgba(0, 255, 136, 0.05);
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .video-counter {
            color: #00d4ff;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .video-description {
            color: #b0b0b0;
            line-height: 1.6;
            max-height: 100px;
            overflow-y: auto;
        }

        /* Video Gallery */
        .video-gallery {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            animation: slideInFromLeft 0.8s ease-out;
            display: none;
        }

        .video-gallery.show {
            display: block;
        }

        .gallery-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .gallery-title {
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .gallery-subtitle {
            color: #b0b0b0;
            font-size: 1.1rem;
        }

        /* Pagination Controls */
        .pagination-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin: 2rem 0;
        }

        .pagination-btn {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            color: #000;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .pagination-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.4);
        }

        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        .pagination-info {
            background: rgba(0, 255, 136, 0.1);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            color: #00ff88;
            font-weight: 600;
        }

        .videos-per-page-control {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #b0b0b0;
        }

        .videos-per-page-control select {
            background: #2a2a2a;
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 5px;
            color: #ffffff;
            padding: 0.3rem;
        }

        .videos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .video-card {
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            animation: fadeInUp 0.6s ease-out;
        }

        .video-card:hover {
            transform: translateY(-8px);
            border-color: rgba(0, 255, 136, 0.3);
            box-shadow: 0 12px 30px rgba(0, 255, 136, 0.2);
        }

        .video-card.completed {
            border-color: rgba(74, 222, 128, 0.4);
        }

        .video-card.completed::after {
            content: '✓';
            position: absolute;
            top: 10px;
            right: 10px;
            background: linear-gradient(45deg, #4ade80, #22c55e);
            color: #000;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.8rem;
        }

        .video-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
            z-index: 1;
        }

        .video-card:hover::before {
            left: 100%;
        }

        .video-thumbnail {
            width: 100%;
            height: 180px;
            object-fit: cover;
            position: relative;
            z-index: 2;
        }

        .video-card-content {
            padding: 1.5rem;
            position: relative;
            z-index: 2;
        }

        .video-card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 0.8rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .video-card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #888;
            font-size: 0.9rem;
        }

        .video-duration {
            background: rgba(0, 255, 136, 0.2);
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            color: #00ff88;
            font-weight: 600;
        }

        /* Loading States */
        .loading-spinner {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(0, 255, 136, 0.1);
            border-left: 4px solid #00ff88;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes slideInFromLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ==========================================
   SECTIONS DE PRÉSENTATION LEARNICA - VERSION ÉPURÉE
   ========================================== */

.section_legend1, .section_legend2 {
    padding: 4rem 2rem;
    background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
    position: relative;
    overflow: hidden;
    color: #ffffff;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Effet de particules subtil en arrière-plan */
.section_legend1::before, .section_legend2::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 20% 80%, rgba(0, 255, 136, 0.03) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.03) 0%, transparent 50%);
    pointer-events: none;
    z-index: 1;
}

/* Différenciation subtile des sections */
.section_legend1 {
    background: linear-gradient(145deg, #0a0a0a 0%, #151520 50%, #0f0f15 100%);
    border-bottom: 1px solid rgba(0, 255, 136, 0.1);
}

.section_legend2 {
    background: linear-gradient(145deg, #151515 0%, #0a0a0a 50%, #150f15 100%);
    border-top: 1px solid rgba(0, 212, 255, 0.1);
}

/* Animation d'apparition simple */
.section_legend1, .section_legend2 {
    opacity: 0;
    transform: translateY(30px);
    animation: sectionSlideIn 0.8s ease-out forwards;
}

.section_legend2 {
    animation-delay: 0.2s;
}

@keyframes sectionSlideIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Conteneur principal pour centrer le contenu */
.section_legend1, .section_legend2 {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

/* Styles des titres - taille réduite */
.section_legend1 h1, .section_legend2 h1 {
    font-size: 2.5rem;
    font-weight: 700;
    line-height: 1.3;
    margin-bottom: 1.5rem;
    color: #ffffff;
    position: relative;
    z-index: 3;
}

/* Texte vert - effets réduits */
.text_vert {
    background: linear-gradient(45deg, #00ff88, #00d4ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    position: relative;
    display: inline-block;
}

/* Suppression de l'effet de lueur excessive */
.text_vert::after {
    display: none;
}

/* Styles des paragraphes */
.section_legend1 p, .section_legend2 p {
    font-size: 1.2rem;
    line-height: 1.7;
    color: #b0b0b0;
    max-width: 700px;
    margin: 0 auto;
    position: relative;
    z-index: 3;
    animation: textFadeIn 1s ease-out 0.3s backwards;
}

@keyframes textFadeIn {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Effet de survol subtil */
.section_legend1:hover, .section_legend2:hover {
    transform: translateY(-2px);
    transition: transform 0.3s ease;
}

/* Ligne décorative simple */
.section_legend1::after, .section_legend2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 2px;
    background: linear-gradient(90deg, transparent, #00ff88, transparent);
    opacity: 0.6;
}

.section_legend2::after {
    top: 0;
    bottom: auto;
    background: linear-gradient(90deg, transparent, #00d4ff, transparent);
}

/* ==========================================
   RESPONSIVE DESIGN
   ========================================== */

@media (max-width: 1024px) {
    .section_legend1 h1, .section_legend2 h1 {
        font-size: 2.2rem;
    }
    
    .section_legend1 p, .section_legend2 p {
        font-size: 1.1rem;
    }
    
    .section_legend1, .section_legend2 {
        padding: 3.5rem 2rem;
    }
}

@media (max-width: 768px) {
    .section_legend1 h1, .section_legend2 h1 {
        font-size: 1.9rem;
        margin-bottom: 1.2rem;
    }
    
    .section_legend1 p, .section_legend2 p {
        font-size: 1rem;
        line-height: 1.6;
        max-width: 600px;
    }
    
    .section_legend1, .section_legend2 {
        padding: 3rem 1.5rem;
    }
    
    .section_legend1::after, .section_legend2::after {
        width: 80px;
    }
}

@media (max-width: 480px) {
    .section_legend1 h1, .section_legend2 h1 {
        font-size: 1.6rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    
    .section_legend1 p, .section_legend2 p {
        font-size: 0.95rem;
        max-width: 100%;
    }
    
    .section_legend1, .section_legend2 {
        padding: 2.5rem 1rem;
    }
}

/* ==========================================
   AMÉLIORATIONS ACCESSIBILITÉ
   ========================================== */

/* Préférence pour les animations réduites */
@media (prefers-reduced-motion: reduce) {
    .section_legend1, .section_legend2,
    .section_legend1::before, .section_legend2::before {
        animation: none !important;
    }
    
    .section_legend1, .section_legend2 {
        opacity: 1;
        transform: none;
    }
    
    .section_legend1:hover, .section_legend2:hover {
        transform: none;
    }
}

/* Contraste élevé */
@media (prefers-contrast: high) {
    .section_legend1 h1, .section_legend2 h1 {
        color: #ffffff;
    }
    
    .section_legend1 p, .section_legend2 p {
        color: #e0e0e0;
    }
    
    .text_vert {
        background: #00ff88;
        -webkit-background-clip: initial;
        -webkit-text-fill-color: initial;
        background-clip: initial;
        color: #00ff88;
    }
}

/* ==========================================
   VARIANTES DE STYLE (OPTIONNELLES)
   ========================================== */

/* Version encore plus minimaliste */
.section_legend1.minimal, .section_legend2.minimal {
    background: #0f0f0f;
    padding: 3rem 2rem;
}

.section_legend1.minimal::before, .section_legend2.minimal::before,
.section_legend1.minimal::after, .section_legend2.minimal::after {
    display: none;
}

/* Version avec spacing réduit */
.section_legend1.compact, .section_legend2.compact {
    padding: 2.5rem 2rem;
}

.section_legend1.compact h1, .section_legend2.compact h1 {
    font-size: 2rem;
    margin-bottom: 1rem;
}

.section_legend1.compact p, .section_legend2.compact p {
    font-size: 1.1rem;
}

/* Version avec texte plus grand pour l'accessibilité */
.section_legend1.large-text, .section_legend2.large-text {
    padding: 4.5rem 2rem;
}

.section_legend1.large-text h1, .section_legend2.large-text h1 {
    font-size: 2.8rem;
}

.section_legend1.large-text p, .section_legend2.large-text p {
    font-size: 1.4rem;
    line-height: 1.8;
}
        /* Responsive */
        @media (max-width: 768px) {
            .main-container {
                padding: 1rem;
            }

            .video-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .video-title {
                font-size: 1.4rem;
                margin-right: 0;
            }

            .video-player iframe {
                height: 250px;
            }

            .videos-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .categories-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
            }

            .category-card {
                height: 250px;
            }

            .category-image {
                height: 170px;
            }

            .gallery-title, .categories-title {
                font-size: 1.8rem;
            }

            .forum-header-content {
                padding: 0 1rem;
            }

            .progress-stats {
                gap: 1rem;
                font-size: 0.9rem;
            }

            .pagination-controls {
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .header-nav {
                gap: 1rem;
            }
        }

        /* Error Message */
        .error-message {
            background: linear-gradient(45deg, rgba(255, 107, 107, 0.2), rgba(255, 142, 142, 0.2));
            border: 2px solid rgba(255, 107, 107, 0.4);
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            color: #ff6b6b;
            margin: 2rem 0;
        }
        .Prfil{
            padding: 10px;
            margin:0.3reù;
        }
        .Prfil summary{
            color: orange;
        }
        .Prfil p{
            font-size: 0.7rem;
            margin-bottom: 0.5rem;
        }
        .Prfil a{
            color: #fff;
            text-decoration: none;
            margin-top:2rem;
            padding:0.4rem;
            background-color: red;
            border-radius: 10px;
            font-weight:bold;
            transition: 0.5s ease-in-out;
        }
        .Prfil a:hover{
            color: #fff;
            background-color: green;
            border-radius: 10px;
            font-weight:bold;
        }
    </style>
</head>
<body>
    <div class="forum-main-container">
        <?php
            if(empty($_SESSION['user']['nom_complet'])){
                include(__DIR__.'/../../navbar/NavBarIndex.php');
            }else{
                include(__DIR__.'/../../navbar/NavBarAcceuil.php');
            }
        ?>
        <!-- Header -->
        <!-- <header class="forum-header">
            <div class="forum-header-content">
                <a href="#" class="forum-logo">Learnica</a> -->
                <div class="header-nav">
                    <button class="back-btn" id="backBtn">← Retour aux catégories</button>
                    <div class="current-category" id="currentCategory">Toutes les formations</div>
                </div>
            <!-- </div>
            <details class="Prfil">
               <summary>Profil</summary> -->
                 <!-- <p>Mail: <?= $_SESSION['user']['mail'] ?></p> -->
                 <!-- <a href="/monblug/achat/package/formation/API/test/deconnexion">Deconnexion</a>
            </details>
        </header> -->
        <section class="section_legend1">
            <h1>Apprenez de nouvelles choses <br> <span class="text_vert">dès aujourd'hui.</span></h1>
            <p>Améliorez-vous et apprenez de nouvelles choses grâce à tutoriels vidéos gratuits.</p>
        </section>
        <section class="section_legend2">
            <h1>Devenez developpeur ou améliorez votre compétence informatique<br> <span class="text_vert"> grâce à Lernica</span></h1>
            <p>Vous cherchez une formation complète pour apprendre de A à Z ou une vidéo pour découvrir un nouvel outil ? Vous devriez trouver votre bonheur</p>
        </section>
        <!-- Main Content -->
        <main class="main-container">
            <!-- Categories Section -->
            <section class="categories-section" id="categoriesSection">
                <div class="categories-header">
                    <h1 class="categories-title">Choisissez votre Formation</h1>
                    <p class="categories-subtitle">Explorez nos formations par technologie et commencez votre apprentissage</p>
                </div>

                <div class="categories-grid" id="categoriesContainer">
                    <!-- Les catégories seront injectées ici -->
                </div>
            </section>

            <!-- Progress Section -->
            <section class="progress-section" id="progressSection">
                <div class="progress-header">
                    <h2 class="progress-title">Votre Progression</h2>
                    <div class="progress-stats">
                        <div class="stat-item">
                            <span class="stat-value" id="completedCount">0</span>
                            <span>Complétées</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value" id="totalCount">0</span>
                            <span>Total</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value" id="progressPercent">0%</span>
                            <span>Progrès</span>
                        </div>
                    </div>
                </div>
                <div class="progress-bar-container">
                    <div class="progress-bar" id="progressBar" style="width: 0%"></div>
                </div>
                <div class="progress-text" id="progressText">Commencez votre apprentissage !</div>
            </section>

            <!-- Video Player Section -->
            <section class="video-player-section" id="videoPlayerSection">
                <div class="video-header">
                    <h2 class="video-title" id="currentVideoTitle">Titre de la vidéo</h2>
                    <div class="video-controls">
                        <button class="control-btn" id="prevBtn" title="Vidéo précédente">‹</button>
                        <button class="control-btn" id="nextBtn" title="Vidéo suivante">›</button>
                        <button class="mark-complete-btn" id="markCompleteBtn">Marquer comme terminée</button>
                        <button class="control-btn close-btn" id="closeBtn" title="Fermer">×</button>
                    </div>
                </div>
                
                <div class="video-player" id="videoPlayer">
                    <!-- L'iframe sera injectée ici -->
                </div>
                
                <div class="video-info">
                    <div class="video-counter" id="videoCounter">Vidéo 1 sur 10</div>
                    <div class="video-description" id="videoDescription">Description de la vidéo</div>
                </div>
            </section>

            <!-- Video Gallery -->
            <section class="video-gallery" id="videoGallery">
                <div class="gallery-header">
                    <h1 class="gallery-title" id="galleryTitle">Bibliothèque de Formation</h1>
                    <p class="gallery-subtitle" id="gallerySubtitle">Découvrez notre collection complète de vidéos éducatives</p>
                </div>

                <!-- Pagination Controls -->
                <div class="pagination-controls">
                    <button class="pagination-btn" id="prevPageBtn">‹ Précédent</button>
                    <div class="pagination-info" id="paginationInfo">Page 1 sur 1</div>
                    <button class="pagination-btn" id="nextPageBtn">Suivant ›</button>
                    <div class="videos-per-page-control">
                        <label for="videosPerPage">Vidéos par page:</label>
                        <select id="videosPerPage">
                            <option value="6">6</option>
                            <option value="9" selected>9</option>
                            <option value="12">12</option>
                            <option value="18">18</option>
                        </select>
                    </div>
                </div>

                <div class="loading-spinner" id="loadingSpinner">
                    <div class="spinner"></div>
                </div>

                <div class="videos-grid" id="videosContainer">
                    <!-- Les vidéos seront injectées ici -->
                </div>

                <div class="error-message" id="errorMessage" style="display: none;">
                    <h3>Erreur de chargement</h3>
                    <p>Impossible de charger les vidéos. Veuillez réessayer plus tard.</p>
                </div>

                <!-- Bottom Pagination -->
                <div class="pagination-controls">
                    <button class="pagination-btn" id="prevPageBtn2">‹ Précédent</button>
                    <div class="pagination-info" id="paginationInfo2">Page 1 sur 1</div>
                    <button class="pagination-btn" id="nextPageBtn2">Suivant ›</button>
                </div>
            </section>
        </main>
    </div>
<?php include(__DIR__.'/../../navbar/footer.php'); ?>
    <script>
        class VideoPlayer {
            constructor() {
                this.allVideos = [];
                this.filteredVideos = [];
                this.currentVideoIndex = 0;
                this.isPlayerActive = false;
                this.completedVideos = new Set(JSON.parse(localStorage.getItem('completedVideos') || '[]'));
                this.currentCategory = null;
                
                // Pagination
                this.currentPage = 1;
                this.videosPerPage = 9;
                this.totalPages = 1;
                
                // Categories data
                this.categories = [
                    {
                        id: 'php',
                        title: 'PHP',
                        image: 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/640px-PHP-logo.svg.png',
                        description: 'Développement web côté serveur'
                    },
                    {
                        id: 'javascript',
                        title: 'JavaScript',
                        image: 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/JavaScript-logo.png/640px-JavaScript-logo.png',
                        description: 'Programmation web dynamique'
                    },
                    {
                        id: 'python',
                        title: 'Python',
                        image: 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Python-logo-notext.svg/640px-Python-logo-notext.svg.png',
                        description: 'Développement polyvalent'
                    },
                    {
                        id: 'react',
                        title: 'React',
                        image: 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/640px-React-icon.svg.png',
                        description: 'Interfaces utilisateur modernes'
                    },
                    {
                        id: 'nodejs',
                        title: 'Node.js',
                        image: 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Node.js_logo.svg/640px-Node.js_logo.svg.png',
                        description: 'JavaScript côté serveur'
                    },
                    {
                        id: 'vue',
                        title: 'Vue.js',
                        image: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/640px-Vue.js_Logo_2.svg.png',
                        description: 'Framework progressif'
                    },
                    {
                        id: 'angular',
                        title: 'Angular',
                        image: 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Angular_full_color_logo.svg/640px-Angular_full_color_logo.svg.png',
                        description: 'Applications web robustes'
                    },
                    {
                        id: 'laravel',
                        title: 'Laravel',
                        image: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/640px-Laravel.svg.png',
                        description: 'Framework PHP élégant'
                    }
                ];
                
                this.init();
            }

            async init() {
                this.renderCategories();
                this.setupEventListeners();
                this.showView('categories');
            }

            renderCategories() {
                const container = document.getElementById('categoriesContainer');
                container.innerHTML = '';

                this.categories.forEach((category, index) => {
                    const categoryCard = document.createElement('div');
                    categoryCard.className = 'category-card';
                    categoryCard.style.animationDelay = `${index * 0.1}s`;
                    
                    // Pour la démo, on génère un nombre aléatoire de vidéos
                    const videoCount = Math.floor(Math.random() * 25) + 5;
                    
                    categoryCard.innerHTML = `
                        <img src="${category.image}" alt="${category.title}" class="category-image" 
                             onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjMzMzIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxOCIgZmlsbD0iIzAwZmY4OCIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPiR7Y2F0ZWdvcnkudGl0bGV9PC90ZXh0Pjwvc3ZnPg=='">
                        <div class="category-content">
                            <h3 class="category-title">${category.title}</h3>
                            <p class="category-count">${videoCount} vidéos disponibles</p>
                        </div>
                    `;

                    categoryCard.addEventListener('click', () => this.selectCategory(category));
                    container.appendChild(categoryCard);
                });
            }

            async selectCategory(category) {
                this.currentCategory = category;
                
                try {
                    await this.loadVideos(category.id);
                    this.showView('videos');
                    document.getElementById('currentCategory').textContent = `Formation ${category.title}`;
                    document.getElementById('galleryTitle').textContent = `Formation ${category.title}`;
                    document.getElementById('gallerySubtitle').textContent = category.description;
                } catch (error) {
                    console.error('Erreur lors du chargement de la catégorie:', error);
                    document.getElementById('errorMessage').style.display = 'block';
                }
            }

            async loadVideos(categoryId = null) {
                const loadingSpinner = document.getElementById('loadingSpinner');
                const videosContainer = document.getElementById('videosContainer');
                const errorMessage = document.getElementById('errorMessage');

                try {
                    loadingSpinner.style.display = 'flex';
                    errorMessage.style.display = 'none';
                    
                    // Construire l'URL avec le paramètre de catégorie si fourni
                    let apiUrl = '/monblug/achat/package/formation/API/test';
                    if (categoryId) {
                        apiUrl += `?category=${categoryId}`;
                    }
                    
                    const response = await fetch(apiUrl);
                    if (!response.ok) {
                        throw new Error('Erreur réseau');
                    }
                    
                    this.allVideos = await response.json();
                    this.filteredVideos = [...this.allVideos];
                    
                    if (this.filteredVideos.length === 0) {
                        throw new Error('Aucune vidéo trouvée pour cette catégorie');
                    }
                    
                    this.currentPage = 1;
                    this.calculatePagination();
                    this.renderCurrentPage();
                    this.updatePaginationControls();
                    this.updateProgress();
                    loadingSpinner.style.display = 'none';
                    
                } catch (error) {
                    console.error('Erreur lors du chargement des vidéos:', error);
                    loadingSpinner.style.display = 'none';
                    errorMessage.style.display = 'block';
                    errorMessage.innerHTML = `
                        <h3>Erreur de chargement</h3>
                        <p>${error.message}</p>
                    `;
                }
            }

            showView(view) {
                const categoriesSection = document.getElementById('categoriesSection');
                const progressSection = document.getElementById('progressSection');
                const videoGallery = document.getElementById('videoGallery');
                const backBtn = document.getElementById('backBtn');

                // Masquer toutes les sections
                categoriesSection.style.display = 'none';
                progressSection.classList.remove('show');
                videoGallery.classList.remove('show');
                backBtn.style.display = 'none';

                // Afficher la vue demandée
                if (view === 'categories') {
                    categoriesSection.style.display = 'block';
                    document.getElementById('currentCategory').textContent = 'Toutes les formations';
                } else if (view === 'videos') {
                    progressSection.classList.add('show');
                    videoGallery.classList.add('show');
                    backBtn.style.display = 'inline-block';
                }
            }

            backToCategories() {
                this.currentCategory = null;
                this.allVideos = [];
                this.filteredVideos = [];
                this.showView('categories');
                this.closePlayer();
            }

            calculatePagination() {
                this.totalPages = Math.ceil(this.filteredVideos.length / this.videosPerPage);
                if (this.currentPage > this.totalPages) {
                    this.currentPage = 1;
                }
            }

            getCurrentPageVideos() {
                const startIndex = (this.currentPage - 1) * this.videosPerPage;
                const endIndex = startIndex + this.videosPerPage;
                return this.filteredVideos.slice(startIndex, endIndex);
            }

            renderCurrentPage() {
                const container = document.getElementById('videosContainer');
                container.innerHTML = '';

                const currentVideos = this.getCurrentPageVideos();
                const startIndex = (this.currentPage - 1) * this.videosPerPage;

                currentVideos.forEach((video, index) => {
                    const globalIndex = startIndex + index;
                    const videoCard = document.createElement('div');
                    videoCard.className = `video-card ${this.completedVideos.has(video.videoId) ? 'completed' : ''}`;
                    videoCard.style.animationDelay = `${index * 0.1}s`;
                    
                    // Formatage de la date
                    const publishDate = new Date(video.publishedAt).toLocaleDateString('fr-FR');
                    
                    // Titre tronqué pour l'affichage
                    const truncatedTitle = video.title.length > 60 
                        ? video.title.substring(0, 60) + '...' 
                        : video.title;

                    videoCard.innerHTML = `
                        <img src="${video.thumbnail}" alt="${video.title}" class="video-thumbnail">
                        <div class="video-card-content">
                            <h3 class="video-card-title">${truncatedTitle}</h3>
                            <div class="video-card-meta">
                                <span>Publié le ${publishDate}</span>
                                <span class="video-duration">Vidéo ${globalIndex + 1}</span>
                            </div>
                        </div>
                    `;

                    videoCard.addEventListener('click', () => this.playVideo(globalIndex));
                    container.appendChild(videoCard);
                });
            }

            updatePaginationControls() {
                const paginationInfo = document.getElementById('paginationInfo');
                const paginationInfo2 = document.getElementById('paginationInfo2');
                const prevPageBtn = document.getElementById('prevPageBtn');
                const nextPageBtn = document.getElementById('nextPageBtn');
                const prevPageBtn2 = document.getElementById('prevPageBtn2');
                const nextPageBtn2 = document.getElementById('nextPageBtn2');

                const info = `Page ${this.currentPage} sur ${this.totalPages}`;
                paginationInfo.textContent = info;
                paginationInfo2.textContent = info;

                prevPageBtn.disabled = this.currentPage === 1;
                nextPageBtn.disabled = this.currentPage === this.totalPages;
                prevPageBtn2.disabled = this.currentPage === 1;
                nextPageBtn2.disabled = this.currentPage === this.totalPages;
            }

            setupEventListeners() {
                // Boutons de navigation
                document.getElementById('backBtn').addEventListener('click', () => this.backToCategories());

                // Boutons de contrôle vidéo
                document.getElementById('prevBtn').addEventListener('click', () => this.previousVideo());
                document.getElementById('nextBtn').addEventListener('click', () => this.nextVideo());
                document.getElementById('closeBtn').addEventListener('click', () => this.closePlayer());
                document.getElementById('markCompleteBtn').addEventListener('click', () => this.toggleVideoCompletion());

                // Contrôles de pagination
                document.getElementById('prevPageBtn').addEventListener('click', () => this.goToPage(this.currentPage - 1));
                document.getElementById('nextPageBtn').addEventListener('click', () => this.goToPage(this.currentPage + 1));
                document.getElementById('prevPageBtn2').addEventListener('click', () => this.goToPage(this.currentPage - 1));
                document.getElementById('nextPageBtn2').addEventListener('click', () => this.goToPage(this.currentPage + 1));

                // Contrôle vidéos par page
                document.getElementById('videosPerPage').addEventListener('change', (e) => {
                    this.videosPerPage = parseInt(e.target.value);
                    this.currentPage = 1;
                    this.calculatePagination();
                    this.renderCurrentPage();
                    this.updatePaginationControls();
                });

                // Raccourcis clavier
                document.addEventListener('keydown', (e) => {
                    if (!this.isPlayerActive) return;

                    switch(e.key) {
                        case 'ArrowLeft':
                            e.preventDefault();
                            this.previousVideo();
                            break;
                        case 'ArrowRight':
                            e.preventDefault();
                            this.nextVideo();
                            break;
                        case 'Escape':
                            e.preventDefault();
                            this.closePlayer();
                            break;
                        case ' ':
                            e.preventDefault();
                            this.toggleVideoCompletion();
                            break;
                    }
                });
            }

            goToPage(page) {
                if (page < 1 || page > this.totalPages) return;
                
                this.currentPage = page;
                this.renderCurrentPage();
                this.updatePaginationControls();
                
                // Scroll vers le haut de la galerie
                document.querySelector('.video-gallery').scrollIntoView({ behavior: 'smooth' });
            }

            playVideo(index) {
                if (index < 0 || index >= this.filteredVideos.length) return;

                this.currentVideoIndex = index;
                this.isPlayerActive = true;
                
                const video = this.filteredVideos[index];
                const playerSection = document.getElementById('videoPlayerSection');
                const videoPlayer = document.getElementById('videoPlayer');
                const videoTitle = document.getElementById('currentVideoTitle');
                const videoCounter = document.getElementById('videoCounter');
                const videoDescription = document.getElementById('videoDescription');
                const markCompleteBtn = document.getElementById('markCompleteBtn');

                // Mise à jour du contenu
                videoTitle.textContent = video.title;
                videoCounter.textContent = `Vidéo ${index + 1} sur ${this.filteredVideos.length}`;
                videoDescription.textContent = video.description || 'Aucune description disponible';

                // Mise à jour du bouton de completion
                const isCompleted = this.completedVideos.has(video.videoId);
                markCompleteBtn.textContent = isCompleted ? 'Terminée ✓' : 'Marquer comme terminée';
                markCompleteBtn.className = `mark-complete-btn ${isCompleted ? 'completed' : ''}`;

                // Création de l'iframe
                videoPlayer.innerHTML = `
                    <iframe 
                        src="https://www.youtube.com/embed/${video.videoId}?autoplay=1&rel=0&modestbranding=1" 
                        frameborder="0" 
                        allow="autoplay; encrypted-media; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                `;

                // Affichage du lecteur
                playerSection.classList.add('active');
                playerSection.scrollIntoView({ behavior: 'smooth' });

                // Mise à jour des boutons
                this.updateControlButtons();
            }

            toggleVideoCompletion() {
                if (!this.isPlayerActive) return;

                const video = this.filteredVideos[this.currentVideoIndex];
                const markCompleteBtn = document.getElementById('markCompleteBtn');

                if (this.completedVideos.has(video.videoId)) {
                    this.completedVideos.delete(video.videoId);
                    markCompleteBtn.textContent = 'Marquer comme terminée';
                    markCompleteBtn.className = 'mark-complete-btn';
                } else {
                    this.completedVideos.add(video.videoId);
                    markCompleteBtn.textContent = 'Terminée ✓';
                    markCompleteBtn.className = 'mark-complete-btn completed';
                }

                // Sauvegarde dans localStorage
                localStorage.setItem('completedVideos', JSON.stringify([...this.completedVideos]));
                
                // Mise à jour de l'affichage
                this.updateProgress();
                this.renderCurrentPage();
            }

            updateProgress() {
                if (this.filteredVideos.length === 0) return;

                const completed = this.filteredVideos.filter(video => 
                    this.completedVideos.has(video.videoId)
                ).length;
                const total = this.filteredVideos.length;
                const percentage = total > 0 ? Math.round((completed / total) * 100) : 0;

                document.getElementById('completedCount').textContent = completed;
                document.getElementById('totalCount').textContent = total;
                document.getElementById('progressPercent').textContent = `${percentage}%`;
                document.getElementById('progressBar').style.width = `${percentage}%`;
                
                let progressText = '';
                if (percentage === 0) {
                    progressText = 'Commencez votre apprentissage !';
                } else if (percentage === 100) {
                    progressText = 'Félicitations ! Formation terminée ! 🎉';
                } else {
                    progressText = `${completed} vidéo${completed > 1 ? 's' : ''} terminée${completed > 1 ? 's' : ''} sur ${total}`;
                }
                
                document.getElementById('progressText').textContent = progressText;
            }

            previousVideo() {
                if (this.currentVideoIndex > 0) {
                    this.playVideo(this.currentVideoIndex - 1);
                }
            }

            nextVideo() {
                if (this.currentVideoIndex < this.filteredVideos.length - 1) {
                    this.playVideo(this.currentVideoIndex + 1);
                }
            }

            closePlayer() {
                const playerSection = document.getElementById('videoPlayerSection');
                const videoPlayer = document.getElementById('videoPlayer');
                
                playerSection.classList.remove('active');
                videoPlayer.innerHTML = '';
                this.isPlayerActive = false;

                // Retour à la galerie
                document.querySelector('.video-gallery').scrollIntoView({ behavior: 'smooth' });
            }

            updateControlButtons() {
                const prevBtn = document.getElementById('prevBtn');
                const nextBtn = document.getElementById('nextBtn');

                prevBtn.disabled = this.currentVideoIndex === 0;
                nextBtn.disabled = this.currentVideoIndex === this.filteredVideos.length - 1;
            }
        }

        // Initialisation au chargement de la page
        document.addEventListener('DOMContentLoaded', () => {
            new VideoPlayer();
        });

        // Gestion du redimensionnement pour la responsivité
        window.addEventListener('resize', () => {
            // Ajustements responsifs si nécessaire
        });
    </script>
</body>
</html>
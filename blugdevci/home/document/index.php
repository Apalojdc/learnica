<?php
    include(__DIR__.'/../login/connexion.php');
    include(__DIR__.'/../login/paginate.php')
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocHub - Centre de Téléchargement Premium</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        /* nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        } */

        /* .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo::before {
            content: "📄";
            font-size: 1.5rem;
        } */

        /* .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: #ffd700;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: #ffd700;
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        } */

        /* Mobile Menu */
        /* .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
            transition: all 0.3s ease;
        }

        .mobile-menu-toggle:hover {
            color: #ffd700;
            transform: scale(1.1);
        }

        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(20px);
            z-index: 2000;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: right 0.3s ease;
        }

        .mobile-menu.active {
            right: 0;
        }

        .mobile-menu-close {
            position: absolute;
            top: 2rem;
            right: 2rem;
            background: none;
            border: none;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .mobile-menu-close:hover {
            color: #ffd700;
            transform: rotate(90deg);
        }

        .mobile-nav-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            text-align: center;
        }

        .mobile-nav-links a {
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 1rem 2rem;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
        }

        .mobile-nav-links a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 215, 0, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .mobile-nav-links a:hover::before {
            left: 100%;
        }

        .mobile-nav-links a:hover {
            color: #ffd700;
            transform: scale(1.1);
        } */

        /* Hero Section */
        /* .hero {
            padding: 140px 0 80px;
            text-align: center;
            color: white;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><path d="M0 0v100h1000V0c-200 20-400 40-600 20S200-20 0 0z"/></svg>') repeat-x;
            animation: wave 6s ease-in-out infinite;
        }

        @keyframes wave {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(-50px); }
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #fff, #ffd700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 20px rgba(255, 215, 0, 0.3); }
            to { text-shadow: 0 0 30px rgba(255, 215, 0, 0.6); }
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(45deg, #ff6b6b, #ffd700);
            color: white;
            padding: 1rem 2.5rem;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        } */

        /* Style de la pagination */

.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    margin: 30px auto;
    padding: 10px 20px;
    flex-wrap: wrap;
}

.pagination a {
    display: inline-block;
    padding: 10px 16px;
    font-size: 16px;
    font-weight: 500;
    color: #2c3e50;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.pagination a:hover {
    background-color: #3498db;
    color: #fff;
    border-color: #3498db;
    box-shadow: 0 4px 10px rgba(52, 152, 219, 0.3);
}

.pagination a.active {
    background-color: #2c3e50;
    color: #fff;
    border-color: #2c3e50;
    font-weight: bold;
    pointer-events: none;
}

        /* Download Section */
.download-section {
    background: #000000;
    background-image: 
        radial-gradient(circle at 20% 30%, rgba(255, 0, 150, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(0, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 50% 50%, rgba(255, 215, 0, 0.05) 0%, transparent 50%);
    padding: 80px 0;
    position: relative;
    overflow: hidden;
}

.download-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, transparent 0%, rgba(255, 0, 150, 0.05) 25%, transparent 50%, rgba(0, 255, 255, 0.05) 75%, transparent 100%);
    pointer-events: none;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    position: relative;
    z-index: 1;
}

/* Titre de la section */
.section-title {
    text-align: center;
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 50px;
    background: linear-gradient(45deg, #ff0096, #00ffff, #ffd700);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-shadow: 0 0 30px rgba(255, 0, 150, 0.3);
}

/* Grille des documents */
.download-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

/* Cartes de documents */
.download-card {
    background: linear-gradient(145deg, #1a1a1a, #0d0d0d);
    border-radius: 20px;
    padding: 30px;
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 
        0 10px 30px rgba(0, 0, 0, 0.3),
        0 1px 8px rgba(0, 0, 0, 0.2);
}

/* Border top dégradé brillant */
.download-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #ff0096, #00ffff, #ffd700, #ff0096);
    background-size: 200% 100%;
    animation: shimmer 3s linear infinite;
    border-radius: 20px 20px 0 0;
}

/* Animation du border top */
@keyframes shimmer {
    0% {
        background-position: -200% 0;
    }
    100% {
        background-position: 200% 0;
    }
}

/* Effet hover sur les cartes */
.download-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 
        0 20px 40px rgba(0, 0, 0, 0.4),
        0 0 20px rgba(255, 0, 150, 0.2);
}

.download-card:hover::before {
    height: 6px;
    box-shadow: 0 0 20px rgba(255, 0, 150, 0.5);
}

/* Icône/Image du document */
.card-icon {
    display: inline-block;
    margin-bottom: 20px;
    position: relative;
}

.imagedocument {
    width: 290px !important;
    height: 50vh !important;
    border-radius: 12px !important;
    object-fit: cover;
    border: 2px solid transparent;
    background: linear-gradient(45deg, #ff0096, #00ffff, #ffd700);
    background-clip: padding-box;
    transition: all 0.3s ease;
}

.download-card:hover .imagedocument {
    transform: scale(1.1);
    box-shadow: 0 8px 25px rgba(255, 0, 150, 0.3);
}

/* Titre de la carte */
.card-title {
    font-size: 1.4rem;
    font-weight: 600;
    color: #ffffff;
    margin-bottom: 15px;
    line-height: 1.3;
}

/* Description */
.card-description {
    color: #b0b0b0;
    font-size: 0.95rem;
    line-height: 1.5;
    margin-bottom: 20px;
}

/* Statistiques */
.card-stats {
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
    padding: 15px 0;
    border-top: 1px solid #333;
    border-bottom: 1px solid #333;
}

.card-stats span {
    font-size: 0.85rem;
    color: #888;
    display: flex;
    align-items: center;
    gap: 5px;
}

/* Bouton de téléchargement */
.download-btn {
    display: inline-block;
    width: 100%;
    padding: 15px 25px;
    background: linear-gradient(45deg, #ff0096, #00ffff);
    color: #000;
    text-decoration: none;
    border-radius: 12px;
    font-weight: 600;
    text-align: center;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    font-size: 1rem;
}

.download-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: all 0.5s ease;
}

.download-btn:hover::before {
    left: 100%;
}

.download-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 0, 150, 0.4);
    background: linear-gradient(45deg, #ff0096, #ffd700);
}

/* Animation d'entrée */
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.slide-up {
    animation: slideUp 0.6s ease forwards;
}

/* Responsive */
@media (max-width: 768px) {
    .download-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .download-card {
        padding: 25px;
    }
    
    .card-stats {
        flex-direction: column;
        gap: 10px;
    }
}

@media (max-width: 480px) {
    .download-section {
        padding: 60px 0;
    }
    
    .container {
        padding: 0 15px;
    }
    
    .section-title {
        font-size: 1.8rem;
        margin-bottom: 30px;
    }
    
    .download-card {
        padding: 20px;
    }
}


        /* Stats Section */
        /* .stats-section {
            padding: 60px 0;
            text-align: center;
            color: white;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .stat-item {
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: scale(1.05);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ffd700;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
        } */

        /* Footer
        footer {
            background: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: 4rem;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .footer-links {
            display: flex;
            gap: 2rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #ffd700;
        }
 */
        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .download-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
/* 
            .footer-content {
                flex-direction: column;
                text-align: center;
            } */
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1s ease-in forwards;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        .slide-up {
            transform: translateY(30px);
            opacity: 0;
            animation: slideUp 0.8s ease-out forwards;
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .col{
            color:#fff;
        }
    </style>
</head>
<body>
 <?php include(__DIR__."/../navbar/NavBarAcceuil.php"); ?>
    <section class="download-section" id="documents">
        <div class="container">
            <h2 class="section-title slide-up">Documents Populaires</h2>
            
            <div class="download-grid">
                <?php foreach ($MesPdf as $data): ?>
                    <div class="download-card slide-up">
                        <span class="card-icon">
                            <img src="<?= str_replace('../', '', $data['cheminimage']) ?>" alt="Image document" class="imagedocument" style="width: 40px; height: 40px; border-radius: 5px;">
                        </span>
                        <h3 class="card-title"><?= htmlspecialchars($data['NomPDF']) ?></h3>
                        <p class="card-description">Document PDF disponible au téléchargement immédiat.</p>
                        <div class="card-stats">
                            <span>📁 1 fichier</span>
                            <span>⭐ 5.0</span>
                            <span>💾 Taille variable</span>
                        </div>
                        <a download class="download-btn"
                            href="<?= 'files/' . rawurlencode(basename($data['Contenue'])) ?>">
                            📥 Télécharger
                        </a>

                        
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
         <div>
        <?php
            include(__DIR__.'/../login/paginateFooter.php');
        ?>
    </div>
    </section>
 <?php include(__DIR__."/../navbar/footer.php"); ?>
</body>
</html>
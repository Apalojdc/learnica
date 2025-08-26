<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogiTéléch - Téléchargement de logiciels gratuits</title>
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #3b82f6;
            --light-bg: #f1f5f9;
            --dark-text: #334155;
            --light-text: #f8fafc;
            --card-bg: #ffffff;
            --hover-color: #dbeafe;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--light-bg);
            color: var(--dark-text);
            line-height: 1.6;
        }
        
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--light-text);
            text-align: center;
            padding: 2rem 1rem;
            box-shadow: var(--shadow);
        }
        
        .logo {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .tagline {
            font-weight: 300;
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }
        
        .search-container {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
        }
        
        .search-box {
            width: 100%;
            padding: 0.8rem 1rem;
            border-radius: 50px;
            border: none;
            font-size: 1rem;
            box-shadow: var(--shadow);
            padding-left: 3rem;
        }
        
        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
        }
        
        nav {
            background-color: var(--card-bg);
            padding: 1rem;
            box-shadow: var(--shadow);
        }
        
        .categories {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .category {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            background-color: var(--light-bg);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .category:hover, .category.active {
            background-color: var(--primary-color);
            color: var(--light-text);
        }
        
        main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        
        .section-title {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 60px;
            background-color: var(--primary-color);
        }
        
        .software-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }
        
        .software-card {
            background-color: var(--card-bg);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
        }
        
        .software-card:hover {
            transform: translateY(-5px);
        }
        
        .software-img {
            height: 150px;
            width: 100%;
            object-fit: cover;
            background-color: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .software-img img {
            max-height: 80%;
            max-width: 80%;
        }
        
        .software-info {
            padding: 1.5rem;
        }
        
        .software-name {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }
        
        .software-desc {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            height: 60px;
            overflow: hidden;
        }
        
        .software-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            color: #64748b;
            font-size: 0.8rem;
        }
        
        .download-btn {
            display: block;
            width: 100%;
            padding: 0.8rem;
            background-color: var(--primary-color);
            color: var(--light-text);
            text-align: center;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .download-btn:hover {
            background-color: var(--secondary-color);
        }
        
        .featured-badge {
            background-color: #fcd34d;
            color: #92400e;
            font-size: 0.7rem;
            padding: 0.3rem 0.6rem;
            border-radius: 4px;
            font-weight: 600;
            margin-right: 0.5rem;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
            gap: 0.5rem;
        }
        
        .page-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--card-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }
        
        .page-btn:hover, .page-btn.active {
            background-color: var(--primary-color);
            color: var(--light-text);
        }
        
        footer {
            background-color: var(--dark-text);
            color: var(--light-text);
            padding: 3rem 1rem;
            text-align: center;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            text-align: left;
        }
        
        .footer-section h3 {
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }
        
        .footer-section ul {
            list-style: none;
        }
        
        .footer-section ul li {
            margin-bottom: 0.8rem;
        }
        
        .footer-section ul li a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-section ul li a:hover {
            color: var(--accent-color);
        }
        
        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #475569;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
        }
        
        .social-icon:hover {
            background-color: var(--accent-color);
        }
        
        .copyright {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid #475569;
            font-size: 0.9rem;
            color: #94a3b8;
        }
        
        @media (max-width: 768px) {
            .software-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
            
            .footer-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">LogiTéléch</div>
        <div class="tagline">Téléchargez des logiciels gratuits en toute simplicité</div>
        <div class="search-container">
            <div class="search-icon">🔍</div>
            <input type="text" class="search-box" placeholder="Rechercher un logiciel...">
        </div>
    </header>
    
    <nav>
        <div class="categories">
            <div class="category active">Tous</div>
            <div class="category">Sécurité</div>
            <div class="category">Bureautique</div>
            <div class="category">Multimédia</div>
            <div class="category">Utilitaires</div>
            <div class="category">Développement</div>
            <div class="category">Jeux</div>
            <div class="category">Communication</div>
        </div>
    </nav>
    
    <main>
        <section>
            <h2 class="section-title">Logiciels populaires</h2>
            <div class="software-grid">
                <!-- Software Card 1 -->
                <div class="software-card">
                    <div class="software-img">
                        <img src="/api/placeholder/80/80" alt="VLC Media Player">
                    </div>
                    <div class="software-info">
                        <h3 class="software-name"><span class="featured-badge">Top</span>VLC Media Player</h3>
                        <p class="software-desc">Lecteur multimédia gratuit et open source capable de lire la plupart des fichiers multimédias.</p>
                        <div class="software-meta">
                            <span>Version: 3.0.18</span>
                            <span>5.6 MB</span>
                        </div>
                        <a href="#" class="download-btn">Télécharger</a>
                    </div>
                </div>
                
                <!-- Software Card 2 -->
                <div class="software-card">
                    <div class="software-img">
                        <img src="/api/placeholder/80/80" alt="Mozilla Firefox">
                    </div>
                    <div class="software-info">
                        <h3 class="software-name">Mozilla Firefox</h3>
                        <p class="software-desc">Navigateur web rapide, sécurisé et respectueux de votre vie privée.</p>
                        <div class="software-meta">
                            <span>Version: 98.0.2</span>
                            <span>48.7 MB</span>
                        </div>
                        <a href="#" class="download-btn">Télécharger</a>
                    </div>
                </div>
                
                <!-- Software Card 3 -->
                <div class="software-card">
                    <div class="software-img">
                        <img src="/api/placeholder/80/80" alt="7-Zip">
                    </div>
                    <div class="software-info">
                        <h3 class="software-name">7-Zip</h3>
                        <p class="software-desc">Utilitaire de compression de fichiers avec un taux de compression élevé.</p>
                        <div class="software-meta">
                            <span>Version: 21.07</span>
                            <span>1.4 MB</span>
                        </div>
                        <a href="#" class="download-btn">Télécharger</a>
                    </div>
                </div>
                
                <!-- Software Card 4 -->
                <div class="software-card">
                    <div class="software-img">
                        <img src="/api/placeholder/80/80" alt="Audacity">
                    </div>
                    <div class="software-info">
                        <h3 class="software-name">Audacity</h3>
                        <p class="software-desc">Éditeur audio gratuit, facile à utiliser et multi-plateformes.</p>
                        <div class="software-meta">
                            <span>Version: 3.2.1</span>
                            <span>30.2 MB</span>
                        </div>
                        <a href="#" class="download-btn">Télécharger</a>
                    </div>
                </div>
            </div>
            
            <h2 class="section-title">Nouveautés</h2>
            <div class="software-grid">
                <!-- Software Card 5 -->
                <div class="software-card">
                    <div class="software-img">
                        <img src="/api/placeholder/80/80" alt="GIMP">
                    </div>
                    <div class="software-info">
                        <h3 class="software-name">GIMP</h3>
                        <p class="software-desc">Logiciel d'édition d'images gratuit et open source.</p>
                        <div class="software-meta">
                            <span>Version: 2.10.32</span>
                            <span>92.8 MB</span>
                        </div>
                        <a href="#" class="download-btn">Télécharger</a>
                    </div>
                </div>
                
                <!-- Software Card 6 -->
                <div class="software-card">
                    <div class="software-img">
                        <img src="/api/placeholder/80/80" alt="LibreOffice">
                    </div>
                    <div class="software-info">
                        <h3 class="software-name"><span class="featured-badge">New</span>LibreOffice</h3>
                        <p class="software-desc">Suite bureautique complète et gratuite compatible avec MS Office.</p>
                        <div class="software-meta">
                            <span>Version: 7.4.2</span>
                            <span>235.7 MB</span>
                        </div>
                        <a href="#" class="download-btn">Télécharger</a>
                    </div>
                </div>
                
                <!-- Software Card 7 -->
                <div class="software-card">
                    <div class="software-img">
                        <img src="/api/placeholder/80/80" alt="Avast Free Antivirus">
                    </div>
                    <div class="software-info">
                        <h3 class="software-name">Avast Free Antivirus</h3>
                        <p class="software-desc">Protection antivirus gratuite pour Windows avec protection en temps réel.</p>
                        <div class="software-meta">
                            <span>Version: 22.8.2</span>
                            <span>283.5 MB</span>
                        </div>
                        <a href="#" class="download-btn">Télécharger</a>
                    </div>
                </div>
                
                <!-- Software Card 8 -->
                <div class="software-card">
                    <div class="software-img">
                        <img src="/api/placeholder/80/80" alt="OBS Studio">
                    </div>
                    <div class="software-info">
                        <h3 class="software-name"><span class="featured-badge">New</span>OBS Studio</h3>
                        <p class="software-desc">Logiciel gratuit pour l'enregistrement vidéo et la diffusion en direct.</p>
                        <div class="software-meta">
                            <span>Version: 28.0.1</span>
                            <span>78.3 MB</span>
                        </div>
                        <a href="#" class="download-btn">Télécharger</a>
                    </div>
                </div>
            </div>
            
            <div class="pagination">
                <div class="page-btn active">1</div>
                <div class="page-btn">2</div>
                <div class="page-btn">3</div>
                <div class="page-btn">4</div>
                <div class="page-btn">5</div>
                <div class="page-btn">→</div>
            </div>
        </section>
    </main>
    
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>LogiTéléch</h3>
                <p>Votre source fiable pour télécharger des logiciels gratuits et sécurisés. Tous nos logiciels sont vérifiés et garantis sans logiciels malveillants.</p>
                
                <div class="social-icons">
                    <a href="#" class="social-icon">📘</a>
                    <a href="#" class="social-icon">📱</a>
                    <a href="#" class="social-icon">📧</a>
                    <a href="#" class="social-icon">🐦</a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Liens rapides</h3>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Catégories</a></li>
                    <li><a href="#">Top 100</a></li>
                    <li><a href="#">Nouveautés</a></li>
                    <li><a href="#">Mises à jour</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Assistance</h3>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Signaler un problème</a></li>
                    <li><a href="#">Soumettre un logiciel</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Légal</h3>
                <ul>
                    <li><a href="#">Conditions d'utilisation</a></li>
                    <li><a href="#">Politique de confidentialité</a></li>
                    <li><a href="#">Politique de cookies</a></li>
                    <li><a href="#">Mentions légales</a></li>
                </ul>
            </div>
        </div>
        
        <div class="copyright">
            © 2025 LogiTéléch. Tous droits réservés.
        </div>
    </footer>
</body>
</html>
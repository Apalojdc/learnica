<?php 
    include(__DIR__.'/../login/connexion.php');

    // Preparation de requette pour le comptage du contenu
    $article = $pdo->prepare('SELECT COUNT(Id_User) AS nbr FROM Users');
    $article->execute();
    $article->bind_result($nbr);
    $article->fetch();
    $article->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imagesite/simplecodeurlogo.ico" type="image/x-icon">
    <title>Dashboard Admin - DevBlog</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8fafc;
            color: #333;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 280px;
            background: linear-gradient(135deg, #000000ff 40%, #da3e00ff 100%);
            color: white;
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar.collapsed .sidebar-header {
            padding: 20px 10px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .sidebar.collapsed .logo {
            font-size: 18px;
        }

        .logo-subtitle {
            font-size: 12px;
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .sidebar.collapsed .logo-subtitle {
            opacity: 0;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar.collapsed .menu-item {
            padding: 15px 22px;
            justify-content: center;
        }

        .menu-item:hover {
            background: rgba(255,255,255,0.1);
            border-left-color: #ffd700;
        }

        .menu-item.active {
            background: rgba(255,255,255,0.15);
            border-left-color: #ffd700;
        }

        .menu-item i {
            margin-right: 15px;
            font-size: 18px;
            width: 20px;
            text-align: center;
        }

        .sidebar.collapsed .menu-item i {
            margin-right: 0;
        }

        .menu-item span {
            font-size: 14px;
            transition: opacity 0.3s ease;
        }

        .sidebar.collapsed .menu-item span {
            opacity: 0;
            width: 0;
        }

        .sidebar-toggle {
            position: fixed;
            top: 20px;
            left: 300px;
            background: #667eea;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 1001;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .sidebar.collapsed + .sidebar-toggle {
            left: 90px;
        }

        .sidebar-toggle:hover {
            background: #764ba2;
            transform: scale(1.1);
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            transition: margin-left 0.3s ease;
            min-height: 100vh;
        }

        .sidebar.collapsed ~ .main-content {
            margin-left: 70px;
        }

        .header {
            background: white;
            padding: 20px 30px;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .header h1 {
            font-size: 28px;
            color: #2d3748;
            margin-bottom: 5px;
        }

        .header p {
            color: #718096;
            font-size: 14px;
        }

        .content {
            padding: 30px;
        }

        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .dashboard-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }

        .card-icon.articles {
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .card-icon.documents {
            background: linear-gradient(135deg, #f093fb, #f5576c);
        }

        .card-icon.users {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
        }

        .card-icon.views {
            background: linear-gradient(135deg, #43e97b, #38f9d7);
        }

        .card-title {
            font-size: 14px;
            color: #718096;
            margin-bottom: 10px;
        }

        .card-value {
            font-size: 32px;
            font-weight: bold;
            color: #2d3748;
        }

        /* Section Styles */
        .section {
            background: white;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .section-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #2d3748;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: #667eea;
        }

        /* Info Section */
        .info-section {
            margin-bottom: 30px;
        }

        .info-titre {
            font-size: 20px;
            margin-bottom: 15px;
            color: #2d3748;
        }

        .info-texte {
            font-size: 16px;
            line-height: 1.6;
            color: #4a5568;
            margin-bottom: 15px;
        }

        .citation-boite {
            background: linear-gradient(135deg, #000000ff 0%, #130520ff 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: center;
            position: relative;
        }

        .citation-boite::before {
            content: '"';
            font-size: 60px;
            position: absolute;
            top: -10px;
            left: 15px;
            opacity: 0.3;
        }

        .citation-auteur {
            font-style: italic;
            margin-top: 10px;
            opacity: 0.9;
        }

        /* Cards Grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background: #f8fafc;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .card h3 {
            color: #667eea;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .card p {
            color: #718096;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .card a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
        }

        .card a:hover {
            color: #764ba2;
        }

        /* Download Section */
        .download-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .download-card {
            background: #f8fafc;
            border-radius: 10px;
            padding: 20px;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .download-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .imagedocument {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 16px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 10px;
        }

        .card-description {
            color: #718096;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .download-btn {
            display: block;
            width: 100%;
            padding: 12px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }

            .sidebar-toggle {
                left: 90px;
            }

            .main-content {
                margin-left: 70px;
            }

            .content {
                padding: 20px;
            }

            .dashboard-cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo">DevBlog</div>
            <div class="logo-subtitle">Coulibaly Apaloh</div>
            <div class="logo-subtitle">Super admin</div>
            <?=$nbr?>
        </div>
        <nav class="sidebar-menu">
            <a href="#dashboard" class="menu-item active">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="#articles" class="menu-item">
                <i class="fas fa-newspaper"></i>
                <span>Articles</span>
            </a>
            <a href="/monblug/admindocument" class="menu-item">
                <i class="fas fa-file-pdf"></i>
                <span>Documents</span>
            </a>
            <a href="#users" class="menu-item">
                <i class="fas fa-users"></i>
                <span>Utilisateurs</span>
            </a>
            <a href="#analytics" class="menu-item">
                <i class="fas fa-chart-line"></i>
                <span>Analytics</span>
            </a>
            <a href="#settings" class="menu-item">
                <i class="fas fa-cog"></i>
                <span>Paramètres</span>
            </a>
            <a href="#help" class="menu-item">
                <i class="fas fa-question-circle"></i>
                <span>Aide</span>
            </a>
            <a href="#help" class="menu-item">
                <i class="fas fa-question-circle"></i>
                <span>Deconnexion</span>
            </a>
        </nav>
    </div>

    <!-- Sidebar Toggle Button -->
    <button class="sidebar-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="header">
            <h1>Tableau de Bord</h1>
            <p>Bienvenue dans votre espace d'administration</p>
        </header>

        <!-- Content -->
        <div class="content">
            <!-- Dashboard Cards -->
            <div class="dashboard-cards">
                <div class="dashboard-card">
                    <div class="card-header">
                        <div>
                            <div class="card-title">Total Articles</div>
                            <div class="card-value">24</div>
                        </div>
                        <div class="card-icon articles">
                            <i class="fas fa-newspaper"></i>
                        </div>
                    </div>
                </div>
                <div class="dashboard-card">
                    <div class="card-header">
                        <div>
                            <div class="card-title">Documents</div>
                            <div class="card-value">12</div>
                        </div>
                        <div class="card-icon documents">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                    </div>
                </div>
                <div class="dashboard-card">
                    <div class="card-header">
                        <div>
                            <div class="card-title">Utilisateurs</div>
                            <div class="card-value">156</div>
                        </div>
                        <div class="card-icon users">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="dashboard-card">
                    <div class="card-header">
                        <div>
                            <div class="card-title">Vues Totales</div>
                            <div class="card-value">2.8k</div>
                        </div>
                        <div class="card-icon views">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Section -->
            <div class="section">
                <h2 class="section-title">
                    <i class="fas fa-info-circle"></i>
                    Qu'est-ce que l'Informatique?
                </h2>
                <div class="info-section">
                    <p class="info-texte">L'informatique est la science du traitement automatisé de l'information. Son nom provient de la fusion des mots « information » et « automatique ». Elle englobe l'étude et le développement des systèmes informatiques, des algorithmes, des langages de programmation, de l'architecture des ordinateurs, et de l'interaction homme-machine.</p>
                    
                    <p class="info-texte">Plus qu'une simple technologie, l'informatique est devenue un pilier fondamental de notre société moderne, transformant profondément la façon dont nous communiquons, travaillons, apprenons et nous divertissons.</p>
                    
                    <div class="citation-boite">
                        <p>L'informatique n'est pas plus la science des ordinateurs que l'astronomie n'est celle des télescopes.</p>
                        <span class="citation-auteur">— Edsger Dijkstra, informaticien pionnier</span>
                    </div>
                </div>
            </div>

            <!-- Articles Section -->
            <div class="section">
                <h2 class="section-title">
                    <i class="fas fa-newspaper"></i>
                    Derniers Articles
                </h2>
                <div class="cards-grid">
                    <div class="card">
                        <h3>Apprendre Laravel pas à pas</h3>
                        <p>Un guide simple pour débuter avec Laravel.</p>
                        <a href="https://laravel.com/docs">Lire l'article</a>
                    </div>
                    <div class="card">
                        <h3>Apprendre Python pour Machine Learning (ML)</h3>
                        <p>Un guide simple pour débuter avec Python pour Machine Learning.</p>
                        <a href="#">Lire l'article</a>
                    </div>
                    <div class="card">
                        <h3>Créer une interface responsive</h3>
                        <p>Design moderne et adapté à tous les écrans.</p>
                        <a href="#">Lire l'article</a>
                    </div>
                    <div class="card">
                        <h3>Apprendre à programmer avec PHP</h3>
                        <p>Un guide simple pour apprendre à programmer des sites dynamiques avec PHP.</p>
                        <a href="#">Lire l'article</a>
                    </div>
                    <div class="card">
                        <h3>Installation Windows 10 et 11</h3>
                        <p>Un guide simple pour apprendre à installer un système d'exploitation.</p>
                        <a href="#">Lire l'article</a>
                    </div>
                    <div class="card">
                        <h3>Tout savoir sur la virtualisation</h3>
                        <p>Créer des machines virtuelles sur Oracle VM VirtualBox.</p>
                        <a href="#">Lire l'article</a>
                    </div>
                </div>
            </div>

            <!-- Documents Section -->
            <div class="section">
                <h2 class="section-title">
                    <i class="fas fa-file-pdf"></i>
                    Documents Populaires
                </h2>
                <div class="download-grid">
                    <!-- Exemple de documents - à remplacer par la boucle PHP -->
                    <div class="download-card">
                        <img src="https://via.placeholder.com/300x150/667eea/ffffff?text=Document+1" alt="Document 1" class="imagedocument">
                        <h3 class="card-title">Guide Laravel Complet</h3>
                        <p class="card-description">Document PDF complet sur Laravel avec exemples pratiques.</p>
                        <a href="#" class="download-btn">
                            <i class="fas fa-download"></i> Télécharger
                        </a>
                    </div>
                    <div class="download-card">
                        <img src="https://via.placeholder.com/300x150/f093fb/ffffff?text=Document+2" alt="Document 2" class="imagedocument">
                        <h3 class="card-title">Python pour Débutants</h3>
                        <p class="card-description">Cours complet Python avec exercices et solutions.</p>
                        <a href="#" class="download-btn">
                            <i class="fas fa-download"></i> Télécharger
                        </a>
                    </div>
                    <div class="download-card">
                        <img src="https://via.placeholder.com/300x150/4facfe/ffffff?text=Document+3" alt="Document 3" class="imagedocument">
                        <h3 class="card-title">Virtualisation Avancée</h3>
                        <p class="card-description">Manuel complet sur la virtualisation et VirtualBox.</p>
                        <a href="#" class="download-btn">
                            <i class="fas fa-download"></i> Télécharger
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php include(__DIR__.'/../navbar/footer.php'); ?>
    </div>

    
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
        }

        // Menu item active state
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Smooth scrolling for menu items
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href.startsWith('#')) {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astuces Tech - DevCommunity</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #ffffff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .header h1 {
            color: #00ff88;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .header p {
            color: #b0b0b0;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .astuces-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .astuce-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid rgba(0, 255, 136, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .astuce-card:hover {
            border-color: rgba(0, 255, 136, 0.3);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        }

        .astuce-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            position: relative;
            overflow: hidden;
        }

        .astuce-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .astuce-image::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50px;
            background: linear-gradient(transparent, rgba(30, 30, 30, 0.8));
        }

        .astuce-content {
            padding: 1.5rem;
        }

        .astuce-title {
            color: #ffffff;
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .astuce-description {
            color: #b0b0b0;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .astuce-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding: 0.8rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 8px;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .stats-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #888;
            font-size: 0.9rem;
        }

        .stats-number {
            color: #00d4ff;
            font-weight: 600;
        }

        .astuce-actions {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .action-btn {
            flex: 1;
            padding: 0.8rem;
            border: 1px solid rgba(0, 255, 136, 0.3);
            background: rgba(0, 255, 136, 0.1);
            color: #00ff88;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .action-btn:hover {
            background: rgba(0, 255, 136, 0.2);
            border-color: rgba(0, 255, 136, 0.5);
        }

        .action-btn.liked {
            background: rgba(0, 255, 136, 0.2);
            color: #00ff88;
        }

        .read-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000000;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: block;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
        }

        .read-btn:hover {
            box-shadow: 0 6px 20px rgba(0, 255, 136, 0.4);
        }

        .category-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(0, 255, 136, 0.9);
            color: #000;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .filters {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.7rem 1.5rem;
            background: rgba(0, 255, 136, 0.1);
            border: 1px solid rgba(0, 255, 136, 0.3);
            color: #00ff88;
            border-radius: 20px;
            cursor: pointer;
            font-size: 0.9rem;
            text-decoration: none;
        }

        .filter-btn:hover, .filter-btn.active {
            background: rgba(0, 255, 136, 0.2);
            border-color: rgba(0, 255, 136, 0.5);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .astuces-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .header h1 {
                font-size: 2rem;
            }

            .filters {
                gap: 0.5rem;
            }

            .filter-btn {
                padding: 0.5rem 1rem;
                font-size: 0.8rem;
            }
        }

        /* Placeholder image styles */
        .placeholder-image {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Astuces Tech</h1>
            <p>Découvrez nos meilleures astuces pour optimiser votre productivité et maîtriser les outils numériques</p>
        </div>

        <div class="filters">
            <a href="#" class="filter-btn active">Toutes</a>
            <a href="#" class="filter-btn">Canva</a>
            <a href="#" class="filter-btn">Productivité</a>
            <a href="#" class="filter-btn">Gratuit</a>
            <a href="#" class="filter-btn">Design</a>
            <a href="#" class="filter-btn">Marketing</a>
        </div>

        <div class="astuces-grid">
            <!-- Astuce 1 -->
            <article class="astuce-card">
                <div class="category-badge">Gratuit</div>
                <div class="astuce-image">
                    <div class="placeholder-image">🎨</div>
                </div>
                <div class="astuce-content">
                    <h2 class="astuce-title">Comment obtenir Canva Pro gratuitement</h2>
                    <p class="astuce-description">
                        Canva est une plateforme de création de design graphique très populaire. Découvrez comment 
                        accéder à la version Pro sans débourser un centime grâce à plusieurs méthodes légales et éthiques.
                    </p>
                    <div class="astuce-stats">
                        <div class="stats-item">
                            <span>👍</span>
                            <span class="stats-number">1,247</span>
                            <span>likes</span>
                        </div>
                        <div class="stats-item">
                            <span>📤</span>
                            <span class="stats-number">523</span>
                            <span>partages</span>
                        </div>
                    </div>
                    <div class="astuce-actions">
                        <button class="action-btn like-btn" onclick="toggleLike(this)">
                            <span>👍</span>
                            <span>J'aime</span>
                        </button>
                        <button class="action-btn share-btn" onclick="shareAstuce(this)">
                            <span>📤</span>
                            <span>Partager</span>
                        </button>
                    </div>
                    <a href="#" class="read-btn">Lire l'astuce</a>
                </div>
            </article>

            <!-- Astuce 2 -->
            <article class="astuce-card">
                <div class="category-badge">Productivité</div>
                <div class="astuce-image">
                    <div class="placeholder-image">⚡</div>
                </div>
                <div class="astuce-content">
                    <h2 class="astuce-title">10 raccourcis clavier pour booster votre productivité</h2>
                    <p class="astuce-description">
                        Gagnez du temps au quotidien avec ces raccourcis clavier essentiels. Une fois maîtrisés, 
                        ils vous feront économiser des heures de travail chaque semaine.
                    </p>
                    <div class="astuce-stats">
                        <div class="stats-item">
                            <span>👍</span>
                            <span class="stats-number">892</span>
                            <span>likes</span>
                        </div>
                        <div class="stats-item">
                            <span>📤</span>
                            <span class="stats-number">341</span>
                            <span>partages</span>
                        </div>
                    </div>
                    <div class="astuce-actions">
                        <button class="action-btn like-btn" onclick="toggleLike(this)">
                            <span>👍</span>
                            <span>J'aime</span>
                        </button>
                        <button class="action-btn share-btn" onclick="shareAstuce(this)">
                            <span>📤</span>
                            <span>Partager</span>
                        </button>
                    </div>
                    <a href="#" class="read-btn">Lire l'astuce</a>
                </div>
            </article>

            <!-- Astuce 3 -->
            <article class="astuce-card">
                <div class="category-badge">Design</div>
                <div class="astuce-image">
                    <div class="placeholder-image">🎯</div>
                </div>
                <div class="astuce-content">
                    <h2 class="astuce-title">Créer des visuels percutants en 5 minutes</h2>
                    <p class="astuce-description">
                        Apprenez les bases du design graphique pour créer rapidement des visuels attractifs 
                        pour vos réseaux sociaux et présentations professionnelles.
                    </p>
                    <div class="astuce-stats">
                        <div class="stats-item">
                            <span>👍</span>
                            <span class="stats-number">1,567</span>
                            <span>likes</span>
                        </div>
                        <div class="stats-item">
                            <span>📤</span>
                            <span class="stats-number">789</span>
                            <span>partages</span>
                        </div>
                    </div>
                    <div class="astuce-actions">
                        <button class="action-btn like-btn" onclick="toggleLike(this)">
                            <span>👍</span>
                            <span>J'aime</span>
                        </button>
                        <button class="action-btn share-btn" onclick="shareAstuce(this)">
                            <span>📤</span>
                            <span>Partager</span>
                        </button>
                    </div>
                    <a href="#" class="read-btn">Lire l'astuce</a>
                </div>
            </article>

            <!-- Astuce 4 -->
            <article class="astuce-card">
                <div class="category-badge">Marketing</div>
                <div class="astuce-image">
                    <div class="placeholder-image">📊</div>
                </div>
                <div class="astuce-content">
                    <h2 class="astuce-title">Analyser ses performances Instagram gratuitement</h2>
                    <p class="astuce-description">
                        Utilisez des outils gratuits pour analyser vos performances sur Instagram et optimiser 
                        votre stratégie de contenu sans dépenser d'argent.
                    </p>
                    <div class="astuce-stats">
                        <div class="stats-item">
                            <span>👍</span>
                            <span class="stats-number">734</span>
                            <span>likes</span>
                        </div>
                        <div class="stats-item">
                            <span>📤</span>
                            <span class="stats-number">298</span>
                            <span>partages</span>
                        </div>
                    </div>
                    <div class="astuce-actions">
                        <button class="action-btn like-btn" onclick="toggleLike(this)">
                            <span>👍</span>
                            <span>J'aime</span>
                        </button>
                        <button class="action-btn share-btn" onclick="shareAstuce(this)">
                            <span>📤</span>
                            <span>Partager</span>
                        </button>
                    </div>
                    <a href="#" class="read-btn">Lire l'astuce</a>
                </div>
            </article>

            <!-- Astuce 5 -->
            <article class="astuce-card">
                <div class="category-badge">Gratuit</div>
                <div class="astuce-image">
                    <div class="placeholder-image">💻</div>
                </div>
                <div class="astuce-content">
                    <h2 class="astuce-title">Les meilleurs logiciels gratuits pour entrepreneurs</h2>
                    <p class="astuce-description">
                        Une sélection des outils indispensables pour gérer votre entreprise sans exploser votre budget. 
                        De la comptabilité au marketing, tout y est !
                    </p>
                    <div class="astuce-stats">
                        <div class="stats-item">
                            <span>👍</span>
                            <span class="stats-number">2,156</span>
                            <span>likes</span>
                        </div>
                        <div class="stats-item">
                            <span>📤</span>
                            <span class="stats-number">1,023</span>
                            <span>partages</span>
                        </div>
                    </div>
                    <div class="astuce-actions">
                        <button class="action-btn like-btn" onclick="toggleLike(this)">
                            <span>👍</span>
                            <span>J'aime</span>
                        </button>
                        <button class="action-btn share-btn" onclick="shareAstuce(this)">
                            <span>📤</span>
                            <span>Partager</span>
                        </button>
                    </div>
                    <a href="#" class="read-btn">Lire l'astuce</a>
                </div>
            </article>

            <!-- Astuce 6 -->
            <article class="astuce-card">
                <div class="category-badge">Productivité</div>
                <div class="astuce-image">
                    <div class="placeholder-image">🕐</div>
                </div>
                <div class="astuce-content">
                    <h2 class="astuce-title">Technique Pomodoro : Maîtriser la gestion du temps</h2>
                    <p class="astuce-description">
                        Découvrez comment la technique Pomodoro peut révolutionner votre productivité et vous aider 
                        à accomplir plus en moins de temps.
                    </p>
                    <div class="astuce-stats">
                        <div class="stats-item">
                            <span>👍</span>
                            <span class="stats-number">1,089</span>
                            <span>likes</span>
                        </div>
                        <div class="stats-item">
                            <span>📤</span>
                            <span class="stats-number">456</span>
                            <span>partages</span>
                        </div>
                    </div>
                    <div class="astuce-actions">
                        <button class="action-btn like-btn" onclick="toggleLike(this)">
                            <span>👍</span>
                            <span>J'aime</span>
                        </button>
                        <button class="action-btn share-btn" onclick="shareAstuce(this)">
                            <span>📤</span>
                            <span>Partager</span>
                        </button>
                    </div>
                    <a href="#" class="read-btn">Lire l'astuce</a>
                </div>
            </article>
        </div>
    </div>

    <script>
        function toggleLike(button) {
            const card = button.closest('.astuce-card');
            const statsItem = card.querySelector('.stats-item .stats-number');
            let currentLikes = parseInt(statsItem.textContent.replace(',', ''));
            
            if (button.classList.contains('liked')) {
                button.classList.remove('liked');
                button.innerHTML = '<span>👍</span><span>J\'aime</span>';
                statsItem.textContent = (currentLikes - 1).toLocaleString();
            } else {
                button.classList.add('liked');
                button.innerHTML = '<span>❤️</span><span>Aimé</span>';
                statsItem.textContent = (currentLikes + 1).toLocaleString();
            }
        }

        function shareAstuce(button) {
            const card = button.closest('.astuce-card');
            const title = card.querySelector('.astuce-title').textContent;
            
            if (navigator.share) {
                navigator.share({
                    title: title,
                    text: 'Découvrez cette astuce intéressante !',
                    url: window.location.href
                });
            } else {
                // Fallback pour les navigateurs qui ne supportent pas l'API Share
                const url = window.location.href;
                navigator.clipboard.writeText(url).then(() => {
                    alert('Lien copié dans le presse-papiers !');
                });
            }
            
            // Incrémenter le compteur de partages
            const shareStats = card.querySelectorAll('.stats-item')[1].querySelector('.stats-number');
            let currentShares = parseInt(shareStats.textContent.replace(',', ''));
            shareStats.textContent = (currentShares + 1).toLocaleString();
        }

        // Filtres
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Retirer la classe active de tous les boutons
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                
                // Ajouter la classe active au bouton cliqué
                this.classList.add('active');
                
                // Ici vous pourriez ajouter la logique de filtrage
                console.log('Filtre sélectionné:', this.textContent);
            });
        });
    </script>
</body>
</html>
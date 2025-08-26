<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégories de Formation - Plateforme d'Apprentissage</title>
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

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #888;
            font-size: 0.9rem;
        }

        .breadcrumb a {
            color: #00ff88;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb a:hover {
            color: #00d4ff;
        }

        /* Main Container */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        /* Page Header */
        .page-header {
            text-align: center;
            margin-bottom: 3rem;
            animation: slideInFromTop 0.8s ease-out;
        }

        @keyframes slideInFromTop {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .page-title {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .page-subtitle {
            color: #b0b0b0;
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Categories Section */
        .categories-section {
            margin-bottom: 3rem;
            animation: fadeInUp 0.8s ease-out 0.3s both;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: #00ff88;
        }

        .categories-count {
            background: rgba(0, 255, 136, 0.1);
            color: #00d4ff;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 600;
            border: 1px solid rgba(0, 255, 136, 0.2);
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
        }

        .category-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            cursor: pointer;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            animation: slideInFromLeft 0.6s ease-out;
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .category-card:hover::before {
            left: 100%;
        }

        .category-card:hover {
            transform: translateY(-10px);
            border-color: rgba(0, 255, 136, 0.4);
            box-shadow: 0 15px 40px rgba(0, 255, 136, 0.2);
        }

        .category-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }

        .category-card:hover .category-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .category-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.8rem;
        }

        .category-description {
            color: #b0b0b0;
            line-height: 1.5;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .category-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .video-count {
            background: rgba(0, 255, 136, 0.1);
            color: #00ff88;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .category-arrow {
            color: #00d4ff;
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }

        .category-card:hover .category-arrow {
            transform: translateX(5px);
        }

        /* Videos Section */
        .videos-section {
            display: none;
            animation: slideInFromRight 0.8s ease-out;
        }

        .videos-section.active {
            display: block;
        }

        @keyframes slideInFromRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .videos-header {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .videos-title {
            font-size: 2.2rem;
            font-weight: 700;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .back-btn {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.4);
        }

        /* Video Player Section (même que précédemment) */
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

        .videos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
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

        /* Responsive */
        @media (max-width: 768px) {
            .main-container {
                padding: 1rem;
            }

            .page-title {
                font-size: 2rem;
            }

            .categories-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .videos-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .videos-title {
                font-size: 1.8rem;
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
            }

            .forum-header-content {
                padding: 0 1rem;
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="forum-main-container">
        <!-- Header -->
        <header class="forum-header">
            <div class="forum-header-content">
                <a href="#" class="forum-logo">Formation Pro</a>
                <nav class="breadcrumb" id="breadcrumb">
                    <span>Accueil</span>
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-container">
            <!-- Page Header -->
            <section class="page-header">
                <h1 class="page-title">Catégories de Formation</h1>
                <p class="page-subtitle">Explorez nos tutoriels organisés par domaines d'expertise pour un apprentissage structuré et progressif</p>
            </section>

            <!-- Categories Section -->
            <section class="categories-section" id="categoriesSection">
                <div class="section-header">
                    <h2 class="section-title">Domaines d'Expertise</h2>
                    <div class="categories-count" id="categoriesCount">6 catégories</div>
                </div>

                <div class="categories-grid" id="categoriesGrid">
                    <!-- Les catégories seront injectées ici -->
                </div>
            </section>

            <!-- Video Player Section -->
            <section class="video-player-section" id="videoPlayerSection">
                <div class="video-header">
                    <h2 class="video-title" id="currentVideoTitle">Titre de la vidéo</h2>
                    <div class="video-controls">
                        <button class="control-btn" id="prevBtn" title="Vidéo précédente">‹</button>
                        <button class="control-btn" id="nextBtn" title="Vidéo suivante">›</button>
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

            <!-- Videos Section -->
            <section class="videos-section" id="videosSection">
                <div class="videos-header">
                    <h2 class="videos-title" id="videosTitle">Vidéos de la catégorie</h2>
                    <button class="back-btn" id="backBtn">
                        ← Retour aux catégories
                    </button>
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
            </section>
        </main>
    </div>

    <script>
        class CategoryVideoManager {
            constructor() {
                this.categories = [
                    {
                        id: 'web-dev',
                        title: 'Développement Web',
                        description: 'HTML, CSS, JavaScript, frameworks modernes et bonnes pratiques de développement web.',
                        icon: '🌐',
                        apiEndpoint: '/monblug/achat/package/formation/API/web-dev'
                    },
                    {
                        id: 'mobile-dev',
                        title: 'Développement Mobile',
                        description: 'Applications iOS et Android avec React Native, Flutter et technologies natives.',
                        icon: '📱',
                        apiEndpoint: '/monblug/achat/package/formation/API/mobile-dev'
                    },
                    {
                        id: 'data-science',
                        title: 'Data Science',
                        description: 'Python, R, machine learning, analyse de données et intelligence artificielle.',
                        icon: '📊',
                        apiEndpoint: '/monblug/achat/package/formation/API/data-science'
                    },
                    {
                        id: 'cybersecurity',
                        title: 'Cybersécurité',
                        description: 'Sécurité informatique, ethical hacking et protection des systèmes.',
                        icon: '🔒',
                        apiEndpoint: '/monblug/achat/package/formation/API/cybersecurity'
                    },
                    {
                        id: 'cloud-devops',
                        title: 'Cloud & DevOps',
                        description: 'AWS, Azure, Docker, Kubernetes et automatisation des déploiements.',
                        icon: '☁️',
                        apiEndpoint: '/monblug/achat/package/formation/API/cloud-devops'
                    },
                    {
                        id: 'design-ux',
                        title: 'Design & UX/UI',
                        description: 'Design thinking, prototypage, Figma et création d\'expériences utilisateur.',
                        icon: '🎨',
                        apiEndpoint: '/monblug/achat/package/formation/API/design-ux'
                    }
                ];

                this.currentCategory = null;
                this.currentVideos = [];
                this.currentVideoIndex = 0;
                this.isPlayerActive = false;

                this.init();
            }

            init() {
                this.renderVideos();
            }

            renderVideos() {
                const container = document.getElementById('videosContainer');
                container.innerHTML = '';

                this.currentVideos.forEach((video, index) => {
                    const videoCard = document.createElement('div');
                    videoCard.className = 'video-card';
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
                                <span class="video-duration">Vidéo ${index + 1}</span>
                            </div>
                        </div>
                    `;

                    videoCard.addEventListener('click', () => this.playVideo(index));
                    container.appendChild(videoCard);
                });
            }

            showError() {
                const loadingSpinner = document.getElementById('loadingSpinner');
                const errorMessage = document.getElementById('errorMessage');
                
                loadingSpinner.style.display = 'none';
                errorMessage.style.display = 'block';
            }

            backToCategories() {
                const categoriesSection = document.getElementById('categoriesSection');
                const videosSection = document.getElementById('videosSection');
                const videoPlayerSection = document.getElementById('videoPlayerSection');
                
                // Fermer le lecteur s'il est ouvert
                this.closePlayer();
                
                // Afficher les catégories et masquer les vidéos
                categoriesSection.style.display = 'block';
                videosSection.classList.remove('active');
                
                // Réinitialiser les données
                this.currentCategory = null;
                this.currentVideos = [];
                
                // Mettre à jour le breadcrumb
                this.updateBreadcrumb();
            }

            updateBreadcrumb(categoryTitle = null) {
                const breadcrumb = document.getElementById('breadcrumb');
                
                if (categoryTitle) {
                    breadcrumb.innerHTML = `
                        <a href="#" onclick="videoManager.backToCategories()">Catégories</a>
                        <span> > </span>
                        <span>${categoryTitle}</span>
                    `;
                } else {
                    breadcrumb.innerHTML = '<span>Catégories</span>';
                }
            }

            setupEventListeners() {
                // Bouton retour aux catégories
                document.getElementById('backBtn').addEventListener('click', () => this.backToCategories());

                // Boutons de contrôle du lecteur vidéo
                document.getElementById('prevBtn').addEventListener('click', () => this.previousVideo());
                document.getElementById('nextBtn').addEventListener('click', () => this.nextVideo());
                document.getElementById('closeBtn').addEventListener('click', () => this.closePlayer());

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
                    }
                });
            }

            playVideo(index) {
                if (index < 0 || index >= this.currentVideos.length) return;

                this.currentVideoIndex = index;
                this.isPlayerActive = true;
                
                const video = this.currentVideos[index];
                const playerSection = document.getElementById('videoPlayerSection');
                const videoPlayer = document.getElementById('videoPlayer');
                const videoTitle = document.getElementById('currentVideoTitle');
                const videoCounter = document.getElementById('videoCounter');
                const videoDescription = document.getElementById('videoDescription');

                // Mise à jour du contenu
                videoTitle.textContent = video.title;
                videoCounter.textContent = `Vidéo ${index + 1} sur ${this.currentVideos.length}`;
                videoDescription.textContent = video.description || 'Aucune description disponible';

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

            previousVideo() {
                if (this.currentVideoIndex > 0) {
                    this.playVideo(this.currentVideoIndex - 1);
                }
            }

            nextVideo() {
                if (this.currentVideoIndex < this.currentVideos.length - 1) {
                    this.playVideo(this.currentVideoIndex + 1);
                }
            }

            closePlayer() {
                const playerSection = document.getElementById('videoPlayerSection');
                const videoPlayer = document.getElementById('videoPlayer');
                
                playerSection.classList.remove('active');
                videoPlayer.innerHTML = '';
                this.isPlayerActive = false;

                // Retour à la liste des vidéos
                document.querySelector('.videos-section').scrollIntoView({ behavior: 'smooth' });
            }

            updateControlButtons() {
                const prevBtn = document.getElementById('prevBtn');
                const nextBtn = document.getElementById('nextBtn');

                prevBtn.disabled = this.currentVideoIndex === 0;
                nextBtn.disabled = this.currentVideoIndex === this.currentVideos.length - 1;
            }
        }

        // Instance globale pour permettre l'accès depuis le HTML
        let videoManager;

        // Initialisation au chargement de la page
        document.addEventListener('DOMContentLoaded', () => {
            videoManager = new CategoryVideoManager();
        });Categories();
                this.setupEventListeners();
                this.updateBreadcrumb();
            }

            renderCategories() {
                const container = document.getElementById('categoriesGrid');
                container.innerHTML = '';

                this.categories.forEach((category, index) => {
                    const categoryCard = document.createElement('div');
                    categoryCard.className = 'category-card';
                    categoryCard.style.animationDelay = `${index * 0.1}s`;
                    
                    categoryCard.innerHTML = `
                        <div class="category-icon">${category.icon}</div>
                        <h3 class="category-title">${category.title}</h3>
                        <p class="category-description">${category.description}</p>
                        <div class="category-stats">
                            <span class="video-count" id="count-${category.id}">Chargement...</span>
                            <span class="category-arrow">→</span>
                        </div>
                    `;

                    categoryCard.addEventListener('click', () => this.selectCategory(category));
                    container.appendChild(categoryCard);

                    // Charger le nombre de vidéos pour cette catégorie
                    this.loadVideoCount(category);
                });
            }

            async loadVideoCount(category) {
                try {
                    // Pour la démonstration, on utilise l'API principale
                    // En production, tu peux créer des endpoints séparés par catégorie
                    const response = await fetch('/monblug/achat/package/formation/API/test');
                    const videos = await response.json();
                    
                    // Simulation d'un filtrage par catégorie (à adapter selon ta logique)
                    const categoryVideos = this.filterVideosByCategory(videos, category.id);
                    const countElement = document.getElementById(`count-${category.id}`);
                    if (countElement) {
                        countElement.textContent = `${categoryVideos.length} vidéos`;
                    }
                } catch (error) {
                    console.error(`Erreur lors du chargement pour ${category.title}:`, error);
                    const countElement = document.getElementById(`count-${category.id}`);
                    if (countElement) {
                        countElement.textContent = 'Non disponible';
                    }
                }
            }

            // Fonction de filtrage des vidéos par catégorie
            // À adapter selon ta logique (tags, playlists séparées, etc.)
            filterVideosByCategory(videos, categoryId) {
                // Exemple de filtrage basé sur des mots-clés dans le titre
                const keywords = {
                    'web-dev': ['html', 'css', 'javascript', 'web', 'frontend', 'backend'],
                    'mobile-dev': ['mobile', 'app', 'android', 'ios', 'react native', 'flutter'],
                    'data-science': ['python', 'data', 'machine learning', 'ai', 'analysis'],
                    'cybersecurity': ['security', 'hack', 'cyber', 'protection', 'firewall'],
                    'cloud-devops': ['aws', 'azure', 'docker', 'kubernetes', 'cloud', 'devops'],
                    'design-ux': ['design', 'ui', 'ux', 'figma', 'prototype', 'user']
                };

                const categoryKeywords = keywords[categoryId] || [];
                
                return videos.filter(video => {
                    const title = video.title.toLowerCase();
                    const description = (video.description || '').toLowerCase();
                    
                    return categoryKeywords.some(keyword => 
                        title.includes(keyword) || description.includes(keyword)
                    );
                });
            }

            async selectCategory(category) {
                this.currentCategory = category;
                this.showLoadingState();
                
                try {
                    // Utilisation de l'API principale avec filtrage côté client
                    // En production, tu peux avoir des endpoints séparés
                    const response = await fetch('/monblug/achat/package/formation/API/test');
                    
                    if (!response.ok) {
                        throw new Error('Erreur réseau');
                    }
                    
                    const allVideos = await response.json();
                    this.currentVideos = this.filterVideosByCategory(allVideos, category.id);
                    
                    if (this.currentVideos.length === 0) {
                        throw new Error('Aucune vidéo trouvée pour cette catégorie');
                    }
                    
                    this.showVideos();
                    this.updateBreadcrumb(category.title);
                    
                } catch (error) {
                    console.error('Erreur lors du chargement des vidéos:', error);
                    this.showError();
                }
            }

            showLoadingState() {
                const categoriesSection = document.getElementById('categoriesSection');
                const videosSection = document.getElementById('videosSection');
                const loadingSpinner = document.getElementById('loadingSpinner');
                
                categoriesSection.style.display = 'none';
                videosSection.classList.add('active');
                loadingSpinner.style.display = 'flex';
            }

            showVideos() {
                const loadingSpinner = document.getElementById('loadingSpinner');
                const videosContainer = document.getElementById('videosContainer');
                const videosTitle = document.getElementById('videosTitle');
                const errorMessage = document.getElementById('errorMessage');
                
                loadingSpinner.style.display = 'none';
                errorMessage.style.display = 'none';
                videosTitle.textContent = `${this.currentCategory.title} (${this.currentVideos.length} vidéos)`;
                
                this.render
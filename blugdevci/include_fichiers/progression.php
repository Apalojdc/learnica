

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chargement du Forum</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            color: #ffffff;
            position: relative;
        }

        /* Particles Background Effect */
        .loading-overlay::before {
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
            animation: particleMove 20s ease-in-out infinite;
        }

        @keyframes particleMove {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(2deg); }
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 1s ease, visibility 1s ease;
            pointer-events: auto;
        }

        .loading-overlay.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .loading-container {
            text-align: center;
            padding: 3rem;
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 20px;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .loading-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            animation: shimmerBackground 3s ease-in-out infinite;
        }

        @keyframes shimmerBackground {
            0% { left: -100%; }
            50% { left: 100%; }
            100% { left: -100%; }
        }

        .loading-logo {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            animation: logoGlow 3s ease-in-out infinite alternate;
            position: relative;
            z-index: 2;
        }

        @keyframes logoGlow {
            from { 
                filter: drop-shadow(0 0 5px rgba(0, 255, 136, 0.3)); 
                transform: scale(1);
            }
            to { 
                filter: drop-shadow(0 0 15px rgba(0, 255, 136, 0.6)); 
                transform: scale(1.02);
            }
        }

        .loading-title {
            font-size: 1.2rem;
            color: #b0b0b0;
            margin-bottom: 3rem;
            position: relative;
            z-index: 2;
        }

        /* Animation du Livre */
        .book-container {
            perspective: 1000px;
            margin: 2rem auto;
            width: 200px;
            height: 150px;
            position: relative;
            z-index: 2;
        }

        .book {
            position: relative;
            width: 200px;
            height: 150px;
            transform-style: preserve-3d;
            margin: 0 auto;
        }

        .book-spine {
            position: absolute;
            width: 20px;
            height: 150px;
            left: 0;
            background: linear-gradient(135deg, #00ff88, #00d4ff);
            border-radius: 2px 0 0 2px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
        }

        .book-cover {
            position: absolute;
            width: 180px;
            height: 150px;
            left: 20px;
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 0 8px 8px 0;
            box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #00ff88;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .pages {
            position: absolute;
            left: 25px;
            top: 5px;
            width: 170px;
            height: 140px;
        }

        .page {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, #f8f8f8 0%, #e8e8e8 100%);
            border: 1px solid #ddd;
            border-radius: 0 6px 6px 0;
            transform-origin: left center;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: rotateY(-180deg);
        }

        .page::before {
            content: '';
            position: absolute;
            width: 90%;
            height: 2px;
            background: #ccc;
            top: 20px;
            left: 5%;
            border-radius: 1px;
        }

        .page::after {
            content: '';
            position: absolute;
            width: 80%;
            height: 1px;
            background: #ddd;
            top: 30px;
            left: 5%;
            box-shadow: 
                0 6px 0 #ddd,
                0 12px 0 #ddd,
                0 18px 0 #ddd,
                0 24px 0 #ddd,
                0 30px 0 #ddd,
                0 36px 0 #ddd,
                0 42px 0 #ddd;
        }

        /* Animations des pages qui tournent */
        @keyframes turnPage {
            0% {
                transform: rotateY(-180deg);
                opacity: 0;
            }
            20% {
                opacity: 1;
            }
            50% {
                transform: rotateY(-90deg);
                opacity: 1;
            }
            80% {
                transform: rotateY(0deg);
                opacity: 1;
            }
            100% {
                transform: rotateY(0deg);
                opacity: 0.8;
            }
        }

        .progress-container {
            width: 100%;
            height: 8px;
            background: rgba(0, 255, 136, 0.1);
            border-radius: 25px;
            overflow: hidden;
            margin: 2rem 0;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            z-index: 2;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #00ff88, #00d4ff, #00ff88);
            background-size: 200% 100%;
            border-radius: 25px;
            width: 0%;
            transition: width 0.5s ease;
            animation: progressGradient 2s ease infinite;
            position: relative;
            box-shadow: 0 0 10px rgba(0, 255, 136, 0.5);
        }

        @keyframes progressGradient {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        .progress-text {
            font-size: 1.1rem;
            margin: 1.5rem 0;
            font-weight: 600;
            color: #00d4ff;
            position: relative;
            z-index: 2;
        }

        .status-message {
            margin-top: 1.5rem;
            font-size: 1rem;
            color: #888;
            min-height: 25px;
            position: relative;
            z-index: 2;
        }

        .loading-dots::after {
            content: '';
            animation: dots 2s infinite;
        }

        @keyframes dots {
            0%, 20% { content: ''; }
            40% { content: '.'; }
            60% { content: '..'; }
            80%, 100% { content: '...'; }
        }

        .completed {
            color: #00ff88 !important;
            font-weight: bold;
            animation: completePulse 1s ease-in-out;
        }

        @keyframes completePulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .loading-container {
            animation: slideIn 0.8s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Page count indicator */
        .page-counter {
            margin-top: 1rem;
            color: #00d4ff;
            font-size: 0.9rem;
            font-weight: 500;
            position: relative;
            z-index: 2;
        }

        @media (max-width: 768px) {
            .loading-container {
                margin: 1rem;
                padding: 2rem;
            }

            .loading-logo {
                font-size: 2rem;
            }

            .book-container {
                transform: scale(0.8);
            }
        }
    </style>
</head>
<body>
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-container">
           <div>
                <div class="loading-logo">Bienvenue</div>
                <div>
                     <?php
                        if(empty($_SESSION['user']['nom_complet'])){
                            echo "à vous! Merci d'avoir choisir Learnica";
                        }else{
                            echo $_SESSION['user']['nom_complet'];
                        }
                    ?>
                </div>
           </div>
            <div class="loading-title">Chargement en cours</div>
            
            <div class="book-container">
                <div class="book">
                    <div class="book-spine"></div>
                    <div class="book-cover">FORUM</div>
                    <div class="pages" id="bookPages">
                        <!-- Les pages seront générées dynamiquement -->
                    </div>
                </div>
            </div>

            <div class="page-counter">
                <span id="pageCounter">Page 0 / 10</span>
            </div>
            
            <div class="progress-container">
                <div class="progress-bar" id="progressBar"></div>
            </div>
            
            <div class="progress-text">
                <span id="progressPercent">0%</span>
            </div>
            
            <div class="status-message" id="statusMessage">
                <span class="loading-dots">Ouverture du forum</span>
            </div>
        </div>
    </div>

    <script>
        let progress = 0;
        let currentPage = 0;
        let totalPages = 10;
        let loadingInterval;
        let pageInterval;

        const progressBar = document.getElementById('progressBar');
        const progressPercent = document.getElementById('progressPercent');
        const statusMessage = document.getElementById('statusMessage');
        const pageCounter = document.getElementById('pageCounter');
        const bookPages = document.getElementById('bookPages');
        const loadingOverlay = document.getElementById('loadingOverlay');

        const loadingMessages = [
            'Ouverture du forum',
            'Chargement des discussions',
            'Récupération des messages',
            'Authentification',
            'Configuration de l\'interface',
            'Optimisation des données',
            'Préparation du contenu',
            'Vérification de sécurité',
            'Finalisation',
            'Forum prêt !'
        ];

        // Créer les pages du livre
        function createBookPages() {
            for (let i = 0; i < totalPages; i++) {
                const page = document.createElement('div');
                page.className = 'page';
                page.style.zIndex = totalPages - i;
                bookPages.appendChild(page);
            }
        }

        // Animer le tournage d'une page
        function turnPage(pageIndex) {
            const pages = document.querySelectorAll('.page');
            if (pages[pageIndex]) {
                pages[pageIndex].style.animation = `turnPage 0.5s ease-in-out forwards`;
                pages[pageIndex].style.animationDelay = '0s';
            }
        }

        function updateProgress(newProgress) {
            progress = Math.min(newProgress, 100);
            progressBar.style.width = progress + '%';
            progressPercent.textContent = Math.round(progress) + '%';
            
            // Calculer la page actuelle basée sur le progrès
            const newCurrentPage = Math.floor((progress / 100) * totalPages);
            
            // Tourner les pages si nécessaire
            while (currentPage < newCurrentPage && currentPage < totalPages) {
                setTimeout(() => turnPage(currentPage), currentPage * 200);
                currentPage++;
            }
            
            pageCounter.textContent = `Page ${currentPage} / ${totalPages}`;
            
            // Messages de statut basés sur le pourcentage
            let messageIndex = Math.min(Math.floor((progress / 100) * loadingMessages.length), loadingMessages.length - 1);
            let message = loadingMessages[messageIndex];
            
            if (progress >= 100) {
                statusMessage.innerHTML = '<span class="completed">' + message + '</span>';
                pageCounter.textContent = `Livre terminé !`;
            } else {
                statusMessage.innerHTML = '<span class="loading-dots">' + message + '</span>';
            }
        }

        function startLoading() {
            progress = 0;
            currentPage = 0;
            updateProgress(0);
            
            loadingInterval = setInterval(() => {
                // Simulation d'un chargement réaliste
                let increment;
                
                if (progress < 20) {
                    increment = Math.random() * 3 + 2;
                } else if (progress < 60) {
                    increment = Math.random() * 2 + 1;
                } else if (progress < 85) {
                    increment = Math.random() * 1.5 + 0.5;
                } else if (progress < 95) {
                    increment = Math.random() * 1 + 0.2;
                } else {
                    increment = Math.random() * 0.8 + 0.1;
                }
                
                progress += increment;
                updateProgress(progress);
                
                if (progress >= 100) {
                    clearInterval(loadingInterval);
                    
                    // Attendre un peu puis cacher l'écran de chargement
                    setTimeout(() => {
                        loadingOverlay.classList.add('hidden');
                    }, 900);
                }
            }, 100);
        }

        // Initialiser et démarrer
        window.addEventListener('load', () => {
            createBookPages();
            setTimeout(() => {
                startLoading();
            }, 500);
        });

        document.addEventListener('DOMContentLoaded', () => {
            createBookPages();
            setTimeout(() => {
                if (progress === 0) {
                    startLoading();
                }
            }, 1000);
        });

        // Empêcher le scroll pendant le chargement
        function preventScroll(e) {
            e.preventDefault();
            e.stopPropagation();
            return false;
        }

        // Désactiver le scroll au début
        document.addEventListener('wheel', preventScroll, {passive: false});
        document.addEventListener('touchmove', preventScroll, {passive: false});
        document.addEventListener('keydown', function(e) {
            if([32, 33, 34, 35, 36, 37, 38, 39, 40].indexOf(e.keyCode) > -1) {
                preventScroll(e);
            }
        }, false);

        // Réactiver le scroll quand le chargement est terminé
        function enableScroll() {
            document.removeEventListener('wheel', preventScroll, {passive: false});
            document.removeEventListener('touchmove', preventScroll, {passive: false});
            document.removeEventListener('keydown', preventScroll, false);
        }

        // Modifier la fonction de fin de chargement
        const originalStartLoading = startLoading;
        startLoading = function() {
            progress = 0;
            currentPage = 0;
            updateProgress(0);
            
            loadingInterval = setInterval(() => {
                let increment;
                
                if (progress < 20) {
                    increment = Math.random() * 6 + 2;
                } else if (progress < 60) {
                    increment = Math.random() * 4 + 1.5;
                } else if (progress < 85) {
                    increment = Math.random() * 3 + 1;
                } else if (progress < 95) {
                    increment = Math.random() * 1.5 + 0.5;
                } else {
                    increment = Math.random() * 0.8 + 0.2;
                }
                
                progress += increment;
                updateProgress(progress);
                
                if (progress >= 100) {
                    clearInterval(loadingInterval);
                    
                    setTimeout(() => {
                        loadingOverlay.classList.add('hidden');
                        enableScroll(); // Réactiver le scroll
                    }, 1500);
                }
            }, 100);
        };
    </script>
</body>
</html>
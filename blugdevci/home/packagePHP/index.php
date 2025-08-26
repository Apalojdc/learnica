<?php
ob_start(); // Sécurité pour éviter les erreurs d'en-tête

$verrou = __DIR__ . '/verrou.txt';
$drive_id = '1XmVF-PfCMuW2PRteEpgZIXDcybxnHBqY';
$drive_link = "https://drive.google.com/uc?export=download&id=" . $drive_id;

$message = "";
$disabled = false;

// Si le fichier verrou existe, le lien est bloqué
if (file_exists($verrou)) {
    $message = "❌ Ce lien a déjà été utilisé. Vous ne pouvez plus télécharger ce fichier.";
    $disabled = true;
}

// Si l’utilisateur clique sur le bouton de téléchargement
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$disabled) {
    // Crée le fichier verrou
    file_put_contents($verrou, "Utilisé le : " . date("Y-m-d H:i:s"));
    // Redirige vers Google Drive
    header("Location: $drive_link");
    exit;
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue dans votre Formation PHP - InnovaCode</title>
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
        .topic-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        /* Welcome Header */
        .topic-header {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
            animation: slideInFromTop 0.8s ease-out;
        }

        @keyframes slideInFromTop {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .topic-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .topic-header:hover::before {
            left: 100%;
        }

        .topic-title {
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            line-height: 1.3;
            text-align: center;
        }

        .greeting {
            font-size: 1.5rem;
            color: #00ff88;
            text-align: center;
            margin-bottom: 1.5rem;
            font-weight: 600;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }

        /* Success Box */
        .success-box {
            background: linear-gradient(45deg, rgba(0, 255, 136, 0.2), rgba(0, 212, 255, 0.2));
            border: 2px solid rgba(0, 255, 136, 0.4);
            border-radius: 12px;
            padding: 1.5rem;
            margin: 2rem 0;
            text-align: center;
            font-size: 1.2rem;
            font-weight: 600;
            animation: bounceIn 0.8s ease-out 0.5s both;
        }

        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }

        /* Package Details */
        .package-details {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin: 2rem 0;
            border: 1px solid rgba(0, 255, 136, 0.2);
            animation: slideInFromLeft 0.8s ease-out 0.3s both;
        }

        @keyframes slideInFromLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .package-details h3 {
            color: #00ff88;
            font-size: 1.4rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .package-details ul {
            list-style: none;
            padding: 0;
        }

        .package-details li {
            background: rgba(0, 255, 136, 0.05);
            margin: 0.8rem 0;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            border-left: 3px solid #00ff88;
            transition: all 0.3s ease;
            animation: fadeInUp 0.5s ease-out calc(0.7s + var(--delay, 0s)) both;
        }

        .package-details li:hover {
            background: rgba(0, 255, 136, 0.1);
            transform: translateX(10px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.2);
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Highlight Section */
        .highlight {
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            border-radius: 15px;
            padding: 2rem;
            margin: 2rem 0;
            border: 2px solid rgba(0, 255, 136, 0.3);
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: slideInFromRight 0.8s ease-out 0.6s both;
        }

        @keyframes slideInFromRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .highlight::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            animation: rotate 4s linear infinite;
            z-index: 0;
        }

        @keyframes rotate {
            to { transform: rotate(360deg); }
        }

        .highlight > * {
            position: relative;
            z-index: 1;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            padding: 1rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            margin: 0.5rem;
            position: relative;
            overflow: hidden;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 255, 136, 0.4);
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        /* Contact Section */
        .contact-section {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin: 2rem 0;
            border: 1px solid rgba(0, 255, 136, 0.2);
            animation: fadeIn 0.8s ease-out 0.9s both;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .contact-section h3 {
            color: #00ff88;
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin: 1.5rem 0;
        }

        .contact-item {
            background: rgba(0, 255, 136, 0.05);
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid rgba(0, 255, 136, 0.1);
            text-align: center;
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            transform: translateY(-5px);
            border-color: rgba(0, 255, 136, 0.3);
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.2);
        }

        .contact-item strong {
            color: #00d4ff;
            display: block;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .contact-item a {
            color: #00ff88;
            text-decoration: none;
            font-weight: 500;
        }

        .contact-item a:hover {
            color: #00d4ff;
        }

        /* Footer */
        .footer {
            background: linear-gradient(145deg, #1e1e1e, #0a0a0a);
            padding: 2rem;
            margin-top: 3rem;
            border-top: 2px solid rgba(0, 255, 136, 0.2);
            text-align: center;
            position: relative;
        }

        .services {
            color: #00ff88;
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .footer p {
            color: #888;
            margin: 0.5rem 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .forum-header-content {
                padding: 0 1rem;
                flex-direction: column;
                gap: 1rem;
            }

            .topic-container {
                padding: 1rem;
            }

            .topic-title {
                font-size: 1.8rem;
            }

            .greeting {
                font-size: 1.2rem;
            }

            .contact-info {
                grid-template-columns: 1fr;
            }

            .btn {
                display: block;
                margin: 1rem 0;
                text-align: center;
            }
        }

        /* Loading Screen */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        .loading-screen.hide {
            opacity: 0;
            visibility: hidden;
        }

        .loading-spinner {
            width: 80px;
            height: 80px;
            border: 4px solid rgba(0, 255, 136, 0.1);
            border-left: 4px solid #00ff88;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 2rem;
        }

        .loading-text {
            color: #00ff88;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            animation: pulse 2s ease-in-out infinite;
        }

        .loading-progress {
            width: 300px;
            height: 8px;
            background: rgba(0, 255, 136, 0.1);
            border-radius: 4px;
            overflow: hidden;
            margin-top: 1rem;
        }

        .loading-bar {
            height: 100%;
            background: linear-gradient(90deg, #00ff88, #00d4ff);
            width: 0%;
            border-radius: 4px;
            animation: loadProgress 3s ease-out forwards;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes loadProgress {
            0% { width: 0%; }
            20% { width: 25%; }
            40% { width: 50%; }
            60% { width: 75%; }
            80% { width: 90%; }
            100% { width: 100%; }
        }

        /* Download Loading Modal */
        .download-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 8888;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .download-modal.active {
            opacity: 1;
            visibility: visible;
        }

        .download-modal-content {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 20px;
            padding: 3rem;
            text-align: center;
            border: 2px solid rgba(0, 255, 136, 0.3);
            position: relative;
            overflow: hidden;
            max-width: 500px;
            width: 90%;
            animation: modalSlideIn 0.5s ease-out;
        }

        @keyframes modalSlideIn {
            from { transform: scale(0.7) translateY(-50px); opacity: 0; }
            to { transform: scale(1) translateY(0); opacity: 1; }
        }

        .download-spinner {
            width: 60px;
            height: 60px;
            border: 3px solid rgba(0, 255, 136, 0.1);
            border-left: 3px solid #00ff88;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 2rem;
        }

        .download-text {
            color: #00ff88;
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .download-progress {
            width: 100%;
            height: 10px;
            background: rgba(0, 255, 136, 0.1);
            border-radius: 5px;
            overflow: hidden;
            margin: 2rem 0;
        }

        .download-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #00ff88, #00d4ff);
            width: 0%;
            border-radius: 5px;
            transition: width 0.3s ease;
        }

        .download-percentage {
            color: #00d4ff;
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 1rem;
        }

        .download-success {
            display: none;
            color: #00ff88;
            font-size: 1.5rem;
            font-weight: 700;
            margin-top: 1rem;
            animation: successBounce 0.6s ease-out;
        }

        @keyframes successBounce {
            0% { transform: scale(0); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .close-modal {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            color: #888;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .close-modal:hover {
            color: #ff6b6b;
            background: rgba(255, 107, 107, 0.1);
        }

        /* Loading Animation */
        .loading-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #00ff88, #00d4ff, #00ff88);
            background-size: 200% 100%;
            animation: loading 2s ease-in-out infinite;
            z-index: 1000;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-spinner"></div>
        <div class="loading-text">Chargement de votre formation PHP...</div>
        <div class="loading-progress">
            <div class="loading-bar"></div>
        </div>
        <div style="color: #888; margin-top: 1rem; font-size: 0.9rem;">InnovaCode - Préparation en cours</div>
    </div>

    <!-- Download Modal -->
    <div class="download-modal" id="downloadModal">
        <div class="download-modal-content">
            <button class="close-modal" id="closeModal">×</button>
            <div class="download-spinner"></div>
            <div class="download-text" id="downloadText">Préparation du téléchargement...</div>
            <div class="download-progress">
                <div class="download-progress-bar" id="downloadProgressBar"></div>
            </div>
            <div class="download-percentage" id="downloadPercentage">0%</div>
            <div class="download-success" id="downloadSuccess">✅ Téléchargement réussi !</div>
        </div>
    </div>

    <div class="loading-animation"></div>
    <div class="forum-main-container">
        <!-- Header -->
        <div class="forum-header">
            <div class="forum-header-content">
                <a href="#" class="forum-logo">💻 InnovaCode</a>
                <nav class="forum-nav">
                    <a href="https://simplecodeurdevblug-ci.wuaze.com/" class="forum-nav-link forum-active">🏠 Accueil</a>
                </nav>
                <div class="forum-user-avatar">IC</div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="topic-container">
            <!-- Welcome Header -->
            <div class="topic-header">
                <h1 class="topic-title">Bienvenue dans votre Formation PHP !</h1>
                <div class="greeting">Bonjour et félicitations ! 🎉</div>
                <p style="text-align: center; font-size: 1.1rem; line-height: 1.6;">
                    Je suis ravi de vous accueillir dans votre parcours de formation PHP avec <strong style="color: #00ff88;">InnovaCode</strong>.
                </p>
            </div>

            <!-- Success Box -->
            <div class="success-box">
                ✅ Votre commande a été confirmée avec succès !
            </div>

            <!-- Description -->
            <div style="background: linear-gradient(145deg, #1e1e1e, #2a2a2a); border-radius: 15px; padding: 2rem; margin: 2rem 0; border: 1px solid rgba(0, 255, 136, 0.2); line-height: 1.6;">
                <p style="font-size: 1.1rem; margin-bottom: 1rem;">
                    Vous avez fait le bon choix en investissant dans vos compétences de développement. Cette formation va véritablement transformer votre approche du développement web.
                </p>
            </div>

            <!-- Package Details -->
            <div class="package-details">
                <h3>🎯 Ce que contient votre package de formation :</h3>
                <ul>
                    <li style="--delay: 0s;"><strong>Cours d'introduction complet</strong> avec exercices pratiques pour bien débuter</li>
                    <li style="--delay: 0.1s;"><strong>Projet e-commerce complet</strong> - Création d'un site de vente en ligne de A à Z</li>
                </ul>
            </div>

            <!-- Highlight Section -->
            <div class="highlight">
                <p style="font-size: 1.3rem; margin-bottom: 1rem;"><strong>🚀 Prêt à commencer ?</strong></p>
                <p style="margin-bottom: 2rem; font-size: 1.1rem;">
                    Votre formation est maintenant disponible ! Commencez par le module d'introduction et suivez les étapes dans l'ordre recommandé pour une progression optimale.
                </p>
                <div class="">
                         <?php if ($disabled): ?>
                            <p class="message"><?= $message ?></p>
                            <button class="btn" disabled>Télécharger</button>
                            <?php else: ?>
                            <p class="message">Cliquez sur le bouton ci-dessous pour lancer votre téléchargement. Ce lien ne fonctionnera qu'une seule fois.</p>
                            <form method="POST">
                                <button type="submit" class="btn" id="downloadBtn">📥Télécharger</button>
                            </form>
                            <?php endif; 
                        ?>
                   </div>
                <!-- <button href="#" class="btn" id="downloadBtn">📥 Télécharger la Formation</a> -->
            </div>

            <!-- Support Message -->
            <div style="background: linear-gradient(145deg, #1e1e1e, #2a2a2a); border-radius: 15px; padding: 2rem; margin: 2rem 0; border: 1px solid rgba(0, 255, 136, 0.2); text-align: center; line-height: 1.6;">
                <p style="font-size: 1.1rem;">
                    N'hésitez pas à me contacter si vous avez des questions pendant votre apprentissage. Je suis là pour vous accompagner dans votre réussite !
                </p>
            </div>

            <!-- Contact Section -->
            <div class="contact-section">
                <h3>📞 Besoin d'aide ? Contactez-moi :</h3>
                <div class="contact-info">
                    <div class="contact-item">
                        <strong>WhatsApp</strong>
                        <a href="https://wa.me/2250506938224">+225 05 06 93 82 24</a>
                    </div>
                    <div class="contact-item">
                        <strong>Email</strong>
                        <a href="mailto:simplecoeur5@gmail.com">simplecoeur5@gmail.com</a>
                    </div>
                </div>
                <p style="margin-top: 1.5rem;">
                    <a href="https://simplecodeurdevblug-ci.wuaze.com/" class="btn">Obtenir des PDF gratuitements</a>
                </p>
            </div>

            <!-- Thank You Message -->
            <div style="background: linear-gradient(145deg, #2a2a2a, #1e1e1e); border-radius: 15px; padding: 2rem; margin: 2rem 0; border: 2px solid rgba(0, 255, 136, 0.3); text-align: center;">
                <p style="font-size: 1.2rem; font-style: italic; color: #00ff88; font-weight: 600;">
                    Merci de votre confiance et bon apprentissage ! 💪
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="services">Développement Web • Mobile • Design Graphique</div>
            <p>© 2025 InnovaCode - Votre partenaire technologique</p>
            <p>Cet email a été envoyé suite à votre achat de formation PHP</p>
        </div>
    </div>

    <script>
        // Page Loading System
        let loadingProgress = 0;
        const loadingScreen = document.getElementById('loadingScreen');
        const mainContainer = document.querySelector('.forum-main-container');
        
        // Simulate loading progress
        function updateLoadingProgress() {
            const progressBar = document.querySelector('.loading-bar');
            const loadingText = document.querySelector('.loading-text');
            
            const messages = [
                'Veuillez patientier...',
                'Chargement de la page...',
                'Finalisation du chargement...',
                'Prête !'
            ];
            
            const interval = setInterval(() => {
                loadingProgress += Math.random() * 20;
                if (loadingProgress >= 100) {
                    loadingProgress = 100;
                    clearInterval(interval);
                    
                    setTimeout(() => {
                        loadingScreen.classList.add('hide');
                        // Remove loading animation bar
                        const loadingBar = document.querySelector('.loading-animation');
                        if (loadingBar) {
                            loadingBar.style.opacity = '0';
                            setTimeout(() => loadingBar.remove(), 300);
                        }
                    }, 500);
                }
                
                const messageIndex = Math.min(Math.floor(loadingProgress / 20), messages.length - 1);
                loadingText.textContent = messages[messageIndex];
            }, 300);
        }

        // Start loading when page loads
        document.addEventListener('DOMContentLoaded', function() {
            updateLoadingProgress();
        });

        // Download System
        const downloadBtn = document.getElementById('downloadBtn');
        const downloadModal = document.getElementById('downloadModal');
        const closeModal = document.getElementById('closeModal');
        const downloadText = document.getElementById('downloadText');
        const downloadProgressBar = document.getElementById('downloadProgressBar');
        const downloadPercentage = document.getElementById('downloadPercentage');
        const downloadSuccess = document.getElementById('downloadSuccess');

        downloadBtn.addEventListener('click', function(e) {
            // e.preventDefault();
            startDownload();
        });

        closeModal.addEventListener('click', function() {
            downloadModal.classList.remove('active');
            resetDownloadModal();
        });

        // Close modal when clicking outside
        downloadModal.addEventListener('click', function(e) {
            if (e.target === downloadModal) {
                downloadModal.classList.remove('active');
                resetDownloadModal();
            }
        });

        // function startDownload() {
        //     downloadModal.classList.add('active');
            
        //     let progress = 0;
        //     const downloadMessages = [
        //         'Préparation du téléchargement...',
        //         'Connexion au serveur...',
        //         'Téléchargement des cours...',
        //         'Téléchargement des exercices...',
        //         'Téléchargement des ressources...',
        //         'Finalisation...',
        //         'Téléchargement terminé !'
        //     ];

        //     const downloadInterval = setInterval(() => {
        //         progress += Math.random() * 15;
                
        //         if (progress >= 100) {
        //             progress = 100;
        //             clearInterval(downloadInterval);
                    
        //             // Show success message
        //             downloadText.style.display = 'none';
        //             document.querySelector('.download-spinner').style.display = 'none';
        //             downloadSuccess.style.display = 'block';
                    
        //             // Auto close after 2 seconds
        //             setTimeout(() => {
        //                 downloadModal.classList.remove('active');
        //                 resetDownloadModal();
                        
        //                 // Here you would trigger the actual download
        //                 // window.open('your-download-link', '_blank');
                        
        //             }, 2000);
        //         }
                
        //         const messageIndex = Math.min(Math.floor(progress / 16), downloadMessages.length - 1);
        //         downloadText.textContent = downloadMessages[messageIndex];
        //         downloadProgressBar.style.width = progress + '%';
        //         downloadPercentage.textContent = Math.round(progress) + '%';
                
        //     }, 200);
        // }

        function resetDownloadModal() {
            downloadText.style.display = 'block';
            document.querySelector('.download-spinner').style.display = 'block';
            downloadSuccess.style.display = 'none';
            downloadProgressBar.style.width = '0%';
            downloadPercentage.textContent = '0%';
            downloadText.textContent = 'Préparation du téléchargement...';
        }

        // Add hover effects to buttons
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px) scale(1.05)';
            });
            
            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Add click animation to contact items
        document.querySelectorAll('.contact-item').forEach(item => {
            item.addEventListener('click', function() {
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 150);
            });
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Close modal with Escape key
            if (e.key === 'Escape' && downloadModal.classList.contains('active')) {
                downloadModal.classList.remove('active');
                resetDownloadModal();
            }
        });
    </script>
</body>
</html>
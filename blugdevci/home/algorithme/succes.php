<?php 
            session_start();
            if(isset($_SESSION['user'])) {
                $name = $_SESSION['user']['nom_complet'];
                $genre = $_SESSION['user']['genre'];
                
                if($genre == "Maxculin"){
                    $message = "Merci <b>Mr. " . $name . "</b>, vous êtes parmi les personnes ayant fait le test. Dans deux jours, nous vous enverrons un lien pour la correction.";
                } else {
                    $message = "Merci <b>Mlle. " . $name . "</b>, vous êtes parmi les personnes ayant fait le test. Dans deux jours, nous vous enverrons un lien pour la correction.";
                }
                
                echo "<script>document.getElementById('confirmationMessage').innerHTML = '" . $message . "';</script>";
            } else {
                echo "<script>document.getElementById('confirmationMessage').innerHTML = 'Veuillez vous connecter';</script>";
            }
            ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validé - Lernica</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-gradient: linear-gradient(45deg, #00ff88, #00d4ff);
            --secondary-gradient: linear-gradient(135deg, #00ff88 0%, #00d4ff 100%);
            --success-gradient: linear-gradient(135deg, #00ff88 0%, #00d4aa 100%);
            --dark-bg: #0a0a0a;
            --card-bg: rgba(0, 255, 136, 0.1);
            --glass-bg: rgba(0, 255, 136, 0.15);
            --border-color: rgba(0, 255, 136, 0.2);
            --text-primary: #ffffff;
            --text-secondary: #b0b0b0;
            --text-muted: #888888;
            --shadow-lg: 0 20px 40px rgba(0, 255, 136, 0.2);
            --shadow-md: 0 8px 32px rgba(0, 255, 136, 0.15);
            --shadow-sm: 0 4px 12px rgba(0, 255, 136, 0.1);
            --border-radius: 8px;
            --border-radius-lg: 16px;
            --transition: all 0.3s ease;
            --primary-color: #00ff88;
        }

        body {
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 50%, #16213e 100%);
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Effets de fond subtils */
        body::before {
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

        /* Container principal */
        .errors-contents {
            background: linear-gradient(145deg, rgba(15, 15, 15, 0.95), rgba(25, 25, 25, 0.9));
            backdrop-filter: blur(15px);
            border: 1px solid rgba(0, 255, 136, 0.15);
            border-radius: var(--border-radius-lg);
            padding: 3rem;
            text-align: center;
            max-width: 600px;
            width: 90%;
            position: relative;
            z-index: 10;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 255, 136, 0.1);
            animation: containerSlideIn 1s ease-out;
        }

        .errors-contents::before {
            display: none;
        }

        /* Image de succès */
        .succes-container {
            margin-bottom: 2rem;
            position: relative;
            display: inline-block;
        }

        .succes {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--success-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: #000;
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.2);
            animation: successPulse 3s ease-in-out infinite;
        }

        @keyframes successPulse {
            0%, 100% { 
                transform: scale(1);
            }
            50% { 
                transform: scale(1.02);
            }
        }

        /* Titre principal */
        .valide-part-testalgo {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            background: var(--success-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        /* Message de confirmation */
        .message-container {
            background: rgba(15, 15, 15, 0.8);
            border: 1px solid rgba(0, 255, 136, 0.1);
            border-radius: var(--border-radius);
            padding: 2rem;
            margin-top: 2rem;
            position: relative;
        }

        .message-container::before {
            display: none;
        }

        .message-text {
            color: #ffffff;
            font-size: 1.1rem;
            line-height: 1.6;
            position: relative;
            z-index: 2;
        }

        .message-text b {
            color: #00ff88;
            font-weight: 700;
        }

        /* Boutons d'action */
        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2.5rem;
            flex-wrap: wrap;
        }

        .lernica-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 2rem;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .lernica-btn-primary {
            background: var(--primary-gradient);
            color: #000;
            box-shadow: 0 4px 20px rgba(0, 255, 136, 0.3);
        }

        .lernica-btn-secondary {
            background: rgba(15, 15, 15, 0.8);
            color: var(--text-primary);
            border-color: rgba(0, 255, 136, 0.1);
        }

        .lernica-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .lernica-btn:hover::before {
            left: 100%;
        }

        .lernica-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 255, 136, 0.2);
        }

        .lernica-btn-secondary:hover {
            background: var(--glass-bg);
            color: var(--text-primary);
            border-color: var(--primary-color);
        }

        /* Icônes */
        .icon {
            font-size: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .errors-contents {
                padding: 2rem;
                margin: 1rem;
            }

            .valide-part-testalgo {
                font-size: 2rem;
            }

            .succes {
                width: 100px;
                height: 100px;
                font-size: 3rem;
            }

            .message-text {
                font-size: 1rem;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .lernica-btn {
                width: 100%;
                max-width: 250px;
                justify-content: center;
            }
        }

        /* Animation d'entrée échelonnée */
        .succes-container {
            animation: slideInUp 0.8s ease-out 0.2s both;
        }

        .valide-part-testalgo {
            animation: slideInUp 0.8s ease-out 0.4s both;
        }

        .message-container {
            animation: slideInUp 0.8s ease-out 0.6s both;
        }

        .action-buttons {
            animation: slideInUp 0.8s ease-out 0.8s both;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="errors-contents">
        <!-- Icône de succès -->
        <div class="succes-container">
            <div class="succes">✅</div>
        </div>

        <!-- Titre -->
        <h2 class="valide-part-testalgo">Validé!</h2>
        
        <!-- Message de confirmation -->
        <div class="message-container">
            <p class="message-text">
                <span id="confirmationMessage">
                    <!-- Le contenu PHP sera remplacé ici -->
                    <?=  $message ?>.
                </span>
            </p>
        </div>

        <!-- Boutons d'action -->
        <div class="action-buttons">
            <a href="#" class="lernica-btn lernica-btn-primary">
                <span class="icon">🏠</span>
                Retour à l'accueil
            </a>
            <a href="#" class="lernica-btn lernica-btn-secondary">
                <span class="icon">📧</span>
                Vérifier mes emails
            </a>
        </div>
    </div>

    <script>
        // Animation au chargement de la page
        window.addEventListener('load', () => {
            // Ajouter des effets sonores ou animations supplémentaires si nécessaire
            console.log('Page de succès chargée avec succès!');
        });

        // Simulation du contenu PHP (à remplacer par votre logique PHP)
        document.addEventListener('DOMContentLoaded', function() {
            // Ici vous pouvez intégrer votre logique PHP
            /*
            
            */
        });
    </script>
</body>
</html>
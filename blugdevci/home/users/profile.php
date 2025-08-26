<?php
include(__DIR__.'/../../login/connexion.php');

    if(isset($_GET['utilisateur'])){
        $user_id = htmlspecialchars($_GET['utilisateur']);
        $recup_user_infos = $pdo->prepare('SELECT * FROM users WHERE Id_User = :user_id LIMIT 1');
        $recup_user_infos->bindValue(':user_id', intval($user_id));
        $recup_user_infos->execute();
        $user = $recup_user_infos->fetch(PDO::FETCH_OBJ);
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations personnelles</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #fafafa;
            color: #3c4043;
            line-height: 1.5;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #1a73e8;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 32px;
            padding: 8px 12px;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .back-button:hover {
            background-color: #f8f9fa;
            text-decoration: none;
        }

        .back-arrow {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header {
            text-align: center;
            margin-bottom: 60px;
        }

        .header h1 {
            font-size: 32px;
            font-weight: 400;
            color: #202124;
            margin-bottom: 8px;
        }

        .header p {
            font-size: 16px;
            color: #5f6368;
            font-weight: 400;
        }

        .profile-section {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            margin-bottom: 24px;
            overflow: hidden;
        }

        .intro-section {
            padding: 40px;
            border-bottom: 1px solid #dadce0;
        }

        .intro-content {
            display: flex;
            align-items: center;
            gap: 40px;
        }

        .intro-text {
            flex: 1;
        }

        .intro-text h2 {
            font-size: 24px;
            font-weight: 400;
            color: #202124;
            margin-bottom: 16px;
        }

        .intro-text p {
            font-size: 14px;
            color: #5f6368;
            line-height: 1.6;
            max-width: 500px;
        }

        .intro-illustration {
            flex-shrink: 0;
            width: 200px;
            height: 120px;
            background: linear-gradient(135deg, #4285f4 0%, #34a853 25%, #fbbc04 50%, #ea4335 75%, #9c27b0 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .illustration-icons {
            display: flex;
            gap: 15px;
            align-items: center;
            z-index: 2;
        }

        .icon {
            width: 32px;
            height: 32px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #4285f4;
        }

        .main-section {
            padding: 0;
        }

        .section-header {
            padding: 24px 40px;
            border-bottom: 1px solid #dadce0;
        }

        .section-header h3 {
            font-size: 18px;
            font-weight: 500;
            color: #202124;
            margin-bottom: 8px;
        }

        .section-header p {
            font-size: 14px;
            color: #5f6368;
        }

        .section-header a {
            color: #1a73e8;
            text-decoration: none;
        }

        .section-header a:hover {
            text-decoration: underline;
        }

        .profile-item {
            display: flex;
            align-items: center;
            padding: 24px 40px;
            border-bottom: 1px solid #f1f3f4;
            transition: background-color 0.2s ease;
        }

        .profile-item:hover {
            background-color: #f8f9fa;
        }

        .profile-item:last-child {
            border-bottom: none;
        }

        .item-label {
            font-size: 14px;
            color: #5f6368;
            min-width: 140px;
            font-weight: 400;
        }

        .item-content {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .item-value {
            font-size: 14px;
            color: #202124;
            font-weight: 400;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #4285f4;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            font-size: 16px;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .actions {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-top: 40px;
            padding: 0 40px;
        }

        .btn {
            padding: 10px 24px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 120px;
        }

        .btn-primary {
            background-color: #1a73e8;
            color: white;
            border: 1px solid #1a73e8;
        }

        .btn-primary:hover {
            background-color: #1557b0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12);
        }

        .btn-secondary {
            background-color: transparent;
            color: #1a73e8;
            border: 1px solid #dadce0;
        }

        .btn-secondary:hover {
            background-color: #f8f9fa;
        }

        .btn-danger {
            background-color: transparent;
            color: #d93025;
            border: 1px solid #dadce0;
        }

        .btn-danger:hover {
            background-color: #fce8e6;
            border-color: #d93025;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            background-color: #e8f5e8;
            color: #137333;
            border-radius: 16px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            background-color: #137333;
            border-radius: 50%;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px 16px;
            }

            .back-button {
                margin-bottom: 20px;
            }

            .intro-content {
                flex-direction: column;
                text-align: center;
                gap: 24px;
            }

            .intro-illustration {
                width: 100%;
                max-width: 300px;
            }

            .profile-item {
                padding: 20px 24px;
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .item-label {
                min-width: auto;
                font-weight: 500;
            }

            .actions {
                flex-direction: column;
                padding: 0 24px;
            }

            .section-header {
                padding: 20px 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="#" class="back-button" onclick="goBack()">
            <span class="back-arrow">←</span>
            Retour
        </a>
        
        <div class="header">
            <h1>Informations personnelles</h1>
            <p>Infos sur vous et vos préférences dans les services</p>
        </div>

        <div class="profile-section">
            <div class="intro-section">
                <div class="intro-content">
                    <div class="intro-text">
                        <h2>Les informations de votre profil</h2>
                        <p>Voici vos informations personnelles et des options pour les gérer. Vous pouvez permettre aux autres utilisateurs d'en voir certaines (par ex. vos coordonnées pour être facilement joignable). Vous pouvez aussi voir un résumé de votre profil.</p>
                    </div>
                    <div class="intro-illustration">
                        <div class="illustration-icons">
                            <div class="icon">👤</div>
                            <div class="icon">📧</div>
                            <div class="icon">📱</div>
                            <div class="icon">📍</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-section">
                <div class="section-header">
                    <h3>Informations générales</h3>
                    <p>Certaines de ces informations peuvent être vues par les autres utilisateurs. <a href="#" onclick="showMore()">En savoir plus</a></p>
                </div>

                <div class="profile-item">
                    <div class="item-label">Photo de profil</div>
                    <div class="item-content">
                        <div class="profile-avatar">
                            JD
                        </div>
                        <div class="item-value">Une photo de profil permet de personnaliser votre compte</div>
                    </div>
                </div>

                <div class="profile-item">
                    <div class="item-label">Nom complet</div>
                    <div class="item-content">
                        <div class="item-value"><?= $user->Nom_complet ?></div>
                    </div>
                </div>
                <div class="profile-item">
                    <div class="item-label">Genre</div>
                    <div class="item-content">
                        <div class="item-value"><?= $user->genre ?></div>
                    </div>
                </div>

                <div class="profile-item">
                    <div class="item-label">Email</div>
                    <div class="item-content">
                        <div class="item-value"><?= $user->mel ?></div>
                    </div>
                </div>

                <div class="profile-item">
                    <div class="item-label">Téléphone</div>
                    <div class="item-content">
                        <div class="item-value"><?= $user->numero ?></div>
                    </div>
                </div>

                <div class="profile-item">
                    <div class="item-label">Specialité</div>
                    <div class="item-content">
                        <div class="item-value"><?= $user->specialite ?></div>
                    </div>
                </div>

                <div class="profile-item">
                    <div class="item-label">Niveau d'étude</div>
                    <div class="item-content">
                        <div class="item-value"><?= $user->niveau ?></div>
                    </div>
                </div>

                <div class="profile-item">
                    <div class="item-label">Votre objectif</div>
                    <div class="item-content">
                        <div class="item-value"><?= $user->objectif ?></div>
                    </div>
                </div>

                <div class="profile-item">
                    <div class="item-label">Le domaine informatique qui vous passionne</div>
                    <div class="item-content">
                        <div class="item-value"><?= $user->domaine ?></div>
                    </div>
                </div>

                <div class="profile-item">
                    <div class="item-label">Date d'inscription</div>
                    <div class="item-content">
                        <div class="item-value"><?= $user->temps ?></div>
                    </div>
                </div>

                <div class="profile-item">
                    <div class="item-label">Statut</div>
                    <div class="item-content">
                        <span class="status-badge">
                            <span class="status-dot"></span>
                            Actif
                        </span>
                    </div>
                </div>

                <div class="profile-item">
                    <div class="item-label">Type de compte</div>
                    <div class="item-content">
                        <div class="item-value">Premium</div>
                    </div>
                </div>

                <div class="profile-item">
                    <div class="item-label">Dernière connexion</div>
                    <div class="item-content">
                        <div class="item-value">Aujourd'hui à 14:30</div>
                    </div>
                </div>
            </div>

            <div class="actions">
                <button class="btn btn-primary" onclick="editProfile()">
                    Modifier le profil
                </button>
                <button class="btn btn-danger" onclick="deleteAccount()">
                    Supprimer le compte
                </button>
            </div>
        </div>
    </div>

    <script>
        function editProfile() {
            alert('Redirection vers la page de modification du profil...');
            // window.location.href = '/edit-profile';
        }

        function deleteAccount() {
            if (confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.')) {
                alert('Suppression du compte en cours...');
                // Ici tu peux ajouter la logique de suppression
                // window.location.href = '/delete-account';
            }
        }

        function showMore() {
            alert('Plus d\'informations sur la confidentialité...');
        }

        function goBack() {
            // Tu peux utiliser history.back() pour revenir à la page précédente
            // ou rediriger vers une page spécifique
            window.history.back();
            // Ou : window.location.href = '/dashboard';
        }

        // Animation subtile au scroll
        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('.profile-section');
            sections.forEach(section => {
                const rect = section.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    section.style.transform = 'translateY(0)';
                    section.style.opacity = '1';
                }
            });
        });
    </script>
</body>
</html>
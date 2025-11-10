<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


include('connexion.php'); // Assurez-vous que $pdo est une connexion PDO
$messageSucces = "";
// include('config.php');
if (isset($_POST['envoyer'])) {
    // Vérification des champs non vides
    if (!empty($_POST['nom']) && !empty($_POST['mel']) && !empty($_POST['mdp'])) {
        
        // Vérification des mots de passe
        if ($_POST['mdp'] != $_POST['mdpconfirm']) {
            $pass = "Les mots de passe ne correspondent pas.";
            echo $pass;
            exit();
        } else {
            // Récupération et sécurisation des données du formulaire
            $nom = htmlspecialchars($_POST['nom']);
            $mel = htmlspecialchars($_POST['mel']);
            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            $role = "user";
            $status = 1;

            // Vérification de l'existence de l'email ou du numéro
            $query = $pdo->prepare("SELECT * FROM users WHERE mel = :mel");
            $query->bindValue(':mel', $mel);
            $query->execute();

            if ($query->rowCount() > 0) {
                $messageSucces = "L'email existe déjà.";
            } else {
                // Préparation de la requête d'insertion
                $sql = $pdo->prepare("
                    INSERT INTO users (nom_complet, mel, role, mdp, statut) 
                    VALUES (:nomcomplet, :mel, :role, :mdp, :statut)");

                // Liaison des paramètres
                $sql->bindValue(':nomcomplet', $nom);
                $sql->bindValue(':mel', $mel);
                $sql->bindValue(':mdp', $mdp);
                $sql->bindValue(':role', $role);
                $sql->bindValue(':statut', $statut);
                // Exécution de la requête
                $succes = $sql->execute();

                if ($succes) {
                    // Récupérer les données de l'utilisateur nouvellement inscrit
                    $userId = $pdo->lastInsertId();
                    $userQuery = $pdo->prepare("SELECT * FROM users WHERE id_User = :id");
                    $userQuery->bindValue(':id', $userId);
                    $userQuery->execute();
                    $userData = $userQuery->fetch(PDO::FETCH_ASSOC);

                    // Stocker les données dans la session
                    $_SESSION['user'] = [
                        'id_user' => $userData['id_user'],
                        'nom_complet' => $userData['nom_complet'],
                        'mel' => $userData['mel'],
                        'role' => $userData['role'],
                        'status' => $userData['status'],
                    ];

                    // Redirection vers l'accueil
                    if(htmlspecialchars($userData['mel']) === "coulapalo@gmail.com"){
                        header("Location: /monblug/admin");
                        exit();
                    }else{
                        header("LOCATION: /monblug/accueil");
                        exit();
                    }
                } else {
                    $messageSucces = "Erreur lors de l'inscription. Veuillez réessayer.";
                }
            }
        }
    } else {
        $messageSucces = "Veuillez remplir tous les champs.";
    }
}
?>

<!-- index.html -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlugDev - Inscription & Connexion</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #ffffff;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            overflow: hidden;
            min-height: 100vh;
            position: relative;
            background-image: url('https://www.75secondes.fr/medias/uploads/2024/04/analyste-programmeur.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.9;
        }

        /* Particles Background Effect */
        body::before {
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

        /* Navigation Bar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            backdrop-filter: blur(20px);
            z-index: 1000;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(0, 255, 136, 0.2);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
            margin-bottom: 100px;
        }

        .logo {
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

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            color: #b0b0b0;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .nav-links a:hover {
            color: #00ff88;
            background: rgba(0, 255, 136, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.2);
        }

        .nav-links a.active {
            color: #00ff88;
            background: rgba(0, 255, 136, 0.2);
        }

        /* Main Container */
        .main-container {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
            display: grid;
            grid-template-columns: 1fr;
            min-height: 500px;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            top: 0;
            z-index: 2;
            margin: 80px auto 20px auto;
        }

        .main-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #00ff88, #00d4ff);
            background-size: 200% 100%;
            animation: shimmer 3s linear infinite;
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .left-panel {
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            color: white;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(0, 255, 136, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .logo {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 30px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(0, 255, 136, 0.3);
            animation: logoGlow 3s ease-in-out infinite alternate;
            z-index: 1;
            position: relative;
        }

        .welcome-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #b0b0b0;
            z-index: 1;
            position: relative;
        }

        .welcome-text strong {
            color: #00ff88;
        }

        .right-panel {
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
        }

        .auth-tabs {
            display: flex;
            margin-bottom: 30px;
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            border-radius: 15px;
            padding: 6px;
            border: 1px solid rgba(0, 255, 136, 0.2);
        }

        .auth-tab {
            flex: 1;
            padding: 12px 20px;
            text-align: center;
            cursor: pointer;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-weight: 600;
            color: #b0b0b0;
            position: relative;
            overflow: hidden;
        }

        .auth-tab::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .auth-tab:hover::before {
            left: 100%;
        }

        .auth-tab.active {
            background: linear-gradient(135deg, #00ff88, #00d4ff);
            color: #000;
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
        }

        .form-container {
            position: relative;
        }

        .form-title {
            font-size: 1.6rem;
            margin-bottom: 20px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #00ff88;
        }

        .form-input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid rgba(0, 255, 136, 0.3);
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            color: #fff;
        }

        .form-input:focus {
            outline: none;
            border-color: #00ff88;
            box-shadow: 0 0 0 3px rgba(0, 255, 136, 0.2);
            transform: translateY(-2px);
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
        }

        .form-input::placeholder {
            color: #888;
        }

        .radio-group {
            display: flex;
            gap: 20px;
            margin-top: 8px;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            padding: 10px 15px;
            border: 2px solid rgba(0, 255, 136, 0.3);
            border-radius: 8px;
            transition: all 0.3s ease;
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            color: #b0b0b0;
        }

        .radio-option:hover {
            border-color: #00ff88;
            background: rgba(0, 255, 136, 0.1);
        }

        .radio-option input[type="radio"] {
            margin: 0;
        }

        .radio-option input[type="radio"]:checked + span {
            color: #00ff88;
            font-weight: 600;
        }

        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, #00ff88, #00d4ff);
            color: #000;
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            color: #b0b0b0;
            border: 2px solid rgba(0, 255, 136, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(0, 255, 136, 0.1);
            border-color: #00ff88;
            color: #00ff88;
        }

        .form-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            gap: 15px;
        }


        .error-message {
            color: #ff6b6b;
            font-size: 0.9rem;
            margin-top: 5px;
            display: none;
        }

        .success-message {
            color: #00ff88;
            font-size: 0.9rem;
            margin-top: 5px;
            display: none;
        }

        .password-strength {
            margin-top: 10px;
        }

        .strength-bar {
            height: 4px;
            background: rgba(0, 255, 136, 0.2);
            border-radius: 2px;
            overflow: hidden;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak { background: #ff6b6b; }
        .strength-medium { background: #ffa726; }
        .strength-strong { background: #00ff88; }

        .mdpoublier {
            text-align: center;
            margin-top: 20px;
        }

        .mdpoublier a {
            color: #00ff88;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .mdpoublier a:hover {
            color: #00d4ff;
            text-shadow: 0 0 10px rgba(0, 255, 136, 0.5);
        }

        @media (max-width: 768px) {
            .main-container {
                grid-template-columns: 1fr;
                max-width: 400px;
                margin: 80px auto 20px auto;
            }

            .left-panel {
                padding: 40px 30px;
                text-align: center;
            }

            .right-panel {
                padding: 30px 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions .btn {
                width: 100%;
            }

            .nav-links {
                display: none;
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .connection-form {
            display: none;
        }

        .connection-form.active {
            display: block;
        }

        /* Toast Notifications */
        .toast-container {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 10000;
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 400px;
        }

        .toast {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 15px;
            padding: 1rem 1.5rem;
            min-height: 80px;
            display: flex;
            align-items: center;
            gap: 1rem;
            position: relative;
            overflow: hidden;
            transform: translateX(450px);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        .toast.show {
            transform: translateX(0);
            opacity: 1;
        }

        .toast::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #00ff88, #00d4ff);
            background-size: 200% 100%;
            animation: shimmer 2s linear infinite;
        }

        .toast-icon {
            font-size: 1.5rem;
            color: #00ff88;
            flex-shrink: 0;
        }

        .toast-content {
            flex: 1;
            color: #fff;
        }

        .toast-title {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.3rem;
            color: #00ff88;
        }

        .toast-message {
            font-size: 0.8rem;
            color: #b0b0b0;
            line-height: 1.4;
        }

        .toast-close {
            background: none;
            border: none;
            color: #888;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .toast-close:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <?php
        // if(empty($_SESSION['user']['id_user'])){
        //     include(__DIR__.'/../navbar/NavBarIndex.php');
        // }else{
        //      include(__DIR__.'/../navbar/NavBarAcceuil.php');
        // }
    ?>

    <div class="main-container">
        <!-- Panel gauche avec présentation -->
        <!-- <div class="left-panel">
            <div class="logo">BlugDev</div>
            <div class="welcome-text">
                <p>Bienvenue sur <strong>BlugDev</strong>, le carrefour des passionnés de développement et d'innovation technologique !</p>
                <br>
                <p>Ici, chaque ligne de code raconte une histoire, et chaque projet incarne un rêve devenu réalité.</p>
                <br>
                <p>Rejoignez-nous pour transformer vos idées en solutions innovantes, et devenez acteur d'un avenir numérique captivant.</p>
                <br>
                <p><strong>Prêt à embarquer ?</strong> Faites partie de notre aventure dès aujourd'hui !</p>
            </div>
        </div> -->

        <!-- Panel droit avec formulaires -->
        <div class="right-panel">
            <div style = "color:red">
                <?= $messageSucces ; ?>
            </div>
            <!-- Onglets de navigation -->
            <div class="auth-tabs">
                <div class="auth-tab" id="loginTab">
                    <i class="fas fa-sign-in-alt"></i> Se connecter
                </div>
                <div class="auth-tab active" id="registerTab">
                    <i class="fas fa-user-plus"></i> S'inscrire
                </div>
            </div>

            <!-- Formulaire de connexion -->
            <div class="connection-form" id="connectionForm">
                <div style = "color:red">
                    <?= $error ?? '' ; ?>
                </div>
                <h2 class="form-title">Connexion</h2>
                <form action="/monblug/auth" method="POST">
                    <div class="form-group">
                        <label for="loginEmail">
                            <i class="fas fa-envelope"></i> Email
                        </label>
                        <input type="email" id="loginEmail" name="mel" class="form-input" placeholder="votre@email.com" required>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">
                            <i class="fas fa-lock"></i> Mot de passe
                        </label>
                        <input type="password" id="loginPassword" name="mdp" class="form-input" placeholder="••••••••" minlength="8" required>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="connecter" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt"></i> Se connecter
                        </button>
                    </div>
                    <div class="mdpoublier">
                        <span>
                            <a href="#">Mot de passe oublié?</a>
                        </span>
                    </div>
                </form>
            </div>

            <!-- Formulaire d'inscription -->
            <div class="form-container" id="registerForm">
                <form action="" method="POST">
                    <h2 class="form-title">Inscription</h2>
                    
                    <!-- Grille pour les champs côte à côte -->
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="nom">
                                <i class="fas fa-user"></i> Nom complet
                            </label>
                            <input type="text" id="nom" name="nom" class="form-input" placeholder="Ex: Jean Delapoisse" required>
                        </div>

                        <div class="form-group">
                            <label for="email">
                                <i class="fas fa-envelope"></i> Email
                            </label>
                            <input type="email" id="email" name="mel" class="form-input" placeholder="simplecodeur@gmail.com" required>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="mdp">
                                <i class="fas fa-lock"></i> Mot de passe
                            </label>
                            <input type="password" id="mdp" name="mdp" class="form-input" placeholder="••••••••" minlength="8" required>
                            <div class="password-strength">
                                <div class="strength-bar">
                                    <div class="strength-fill" id="strengthFill"></div>
                                </div>
                                <small id="strengthText" style="color: #6c757d;">Tapez votre mot de passe</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mdpconfirm">
                                <i class="fas fa-lock"></i> Confirmez le mot de passe
                            </label>
                            <input type="password" id="mdpconfirm" name="mdpconfirm" class="form-input" placeholder="••••••••" minlength="8" required>
                            <div class="error-message" id="passwordError">Les mots de passe ne correspondent pas</div>
                            <div class="success-message" id="passwordSuccess">Les mots de passe correspondent</div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="envoyer" class="btn btn-primary">
                            <i class="fas fa-user-plus"></i> S'inscrire
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Gestion des onglets
        const loginTab = document.getElementById('loginTab');
        const registerTab = document.getElementById('registerTab');
        const connectionForm = document.getElementById('connectionForm');
        const registerForm = document.getElementById('registerForm');

        loginTab.addEventListener('click', () => {
            loginTab.classList.add('active');
            registerTab.classList.remove('active');
            connectionForm.classList.add('active');
            registerForm.style.display = 'none';
        });

        registerTab.addEventListener('click', () => {
            registerTab.classList.add('active');
            loginTab.classList.remove('active');
            connectionForm.classList.remove('active');
            registerForm.style.display = 'block';
        });


        // Validation du mot de passe
        const passwordInput = document.getElementById('mdp');
        const confirmPasswordInput = document.getElementById('mdpconfirm');
        const strengthFill = document.getElementById('strengthFill');
        const strengthText = document.getElementById('strengthText');
        const passwordError = document.getElementById('passwordError');
        const passwordSuccess = document.getElementById('passwordSuccess');

        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const strength = calculatePasswordStrength(password);
            
            // Mettre à jour la barre de force
            strengthFill.style.width = strength.percentage + '%';
            strengthFill.className = 'strength-fill strength-' + strength.level;
            strengthText.textContent = strength.text;
            strengthText.style.color = strength.color;
        });

        confirmPasswordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            const confirmPassword = this.value;
            
            if (confirmPassword.length > 0) {
                if (password === confirmPassword) {
                    passwordError.style.display = 'none';
                    passwordSuccess.style.display = 'block';
                    this.style.borderColor = '#38a169';
                } else {
                    passwordError.style.display = 'block';
                    passwordSuccess.style.display = 'none';
                    this.style.borderColor = '#e53e3e';
                }
            } else {
                passwordError.style.display = 'none';
                passwordSuccess.style.display = 'none';
                this.style.borderColor = '#e2e8f0';
            }
        });

        function calculatePasswordStrength(password) {
            let score = 0;
            
            if (password.length >= 8) score += 25;
            if (password.length >= 12) score += 15;
            if (/[a-z]/.test(password)) score += 15;
            if (/[A-Z]/.test(password)) score += 15;
            if (/[0-9]/.test(password)) score += 15;
            if (/[^A-Za-z0-9]/.test(password)) score += 15;
            
            if (score < 40) {
                return { level: 'weak', percentage: score, text: 'Faible', color: '#e53e3e' };
            } else if (score < 80) {
                return { level: 'medium', percentage: score, text: 'Moyen', color: '#ed8936' };
            } else {
                return { level: 'strong', percentage: score, text: 'Fort', color: '#38a169' };
            }
        }

        // Animation des inputs au focus
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('fade-in');
            });
        });

        // Validation finale du formulaire
        document.querySelector('form').addEventListener('submit', function(e) {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Les mots de passe ne correspondent pas.');
                return false;
            }
        });

        // Toast Notification System
        class ToastManager {
            constructor() {
                this.container = document.getElementById('toastContainer');
                this.toasts = [];
                this.maxToasts = 3;
            }

            createToast(type, title, message) {
                const toast = document.createElement('div');
                toast.className = `toast ${type}`;
                
                const iconMap = {
                    'success': '✅',
                    'error': '❌',
                    'info': 'ℹ️',
                    'warning': '⚠️'
                };

                toast.innerHTML = `
                    <div class="toast-icon">${iconMap[type] || '💡'}</div>
                    <div class="toast-content">
                        <div class="toast-title">${title}</div>
                        <div class="toast-message">${message}</div>
                    </div>
                    <button class="toast-close" onclick="toastManager.removeToast(this.parentElement)">×</button>
                `;

                return toast;
            }

            showToast(type, title, message, duration = 5000) {
                if (this.toasts.length >= this.maxToasts) {
                    this.removeToast(this.toasts[0]);
                }

                const toast = this.createToast(type, title, message);
                this.container.appendChild(toast);
                this.toasts.push(toast);

                setTimeout(() => {
                    toast.classList.add('show');
                }, 100);

                setTimeout(() => {
                    this.removeToast(toast);
                }, duration);

                return toast;
            }

            removeToast(toast) {
                if (!toast || !this.container.contains(toast)) return;
                
                toast.classList.remove('show');
                setTimeout(() => {
                    if (this.container.contains(toast)) {
                        this.container.removeChild(toast);
                        this.toasts = this.toasts.filter(t => t !== toast);
                    }
                }, 400);
            }
        }

        const toastManager = new ToastManager();

        // Message de bienvenue
        setTimeout(() => {
            toastManager.showToast(
                'info',
                'Bienvenue sur BlugDev ! 🎉',
                'Rejoignez notre communauté de développeurs passionnés'
            );
        }, 2000);

        // Animation des inputs au focus
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('fade-in');
            });
        });

        // Effet parallax sur le main container
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.main-container');
            const speed = scrolled * 0.1;
            parallax.style.transform = `translateY(${speed}px)`;
        });

        // Interactions avec les onglets
        document.querySelectorAll('.auth-tab').forEach(tab => {
            tab.addEventListener('click', (e) => {
                e.preventDefault();
                toastManager.showToast(
                    'info',
                    'Navigation 🔄',
                    'Changement d\'onglet effectué'
                );
            });
        });

        // Easter egg sur le logo
        document.querySelector('.logo').addEventListener('click', (e) => {
            e.preventDefault();
            toastManager.showToast(
                'success',
                'Easter Egg! 🥚',
                'Vous avez découvert un secret de BlugDev! 🎉'
            );
        });
    </script>

    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>
</body>
</html>
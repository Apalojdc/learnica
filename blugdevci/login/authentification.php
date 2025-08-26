<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


include('connexion.php'); // Assurez-vous que $pdo est une connexion PDO
$messageSucces = "";
// include('config.php');
if (isset($_POST['envoyer'])) {
    // Vérification des champs non vides
    if (!empty($_POST['nom']) && !empty($_POST['mel']) && !empty($_POST['specialite']) && 
        !empty($_POST['genre']) && !empty($_POST['niveau']) && 
        !empty($_POST['objectif']) && !empty($_POST['domaine']) && 
        !empty($_POST['numero']) && !empty($_POST['mdp'])) {
        
        // Vérification des mots de passe
        if ($_POST['mdp'] != $_POST['mdpconfirm']) {
            $pass = "Les mots de passe ne correspondent pas.";
            echo $pass;
            exit();
        } else {
            // Récupération et sécurisation des données du formulaire
            $nom = htmlspecialchars($_POST['nom']);
            $mel = htmlspecialchars($_POST['mel']);
            $specialite = htmlspecialchars($_POST['specialite']);
            $genre = htmlspecialchars($_POST['genre']);
            $niveau = htmlspecialchars($_POST['niveau']);
            $objectif = htmlspecialchars($_POST['objectif']);
            $domaine = htmlspecialchars($_POST['domaine']);
            $numero = htmlspecialchars($_POST['numero']);
            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            $temps = date('Y-m-d H:i:s');

            // Vérification de l'existence de l'email ou du numéro
            $query = $pdo->prepare("SELECT * FROM users WHERE mel = :mel OR numero = :numero");
            $query->bindValue(':mel', $mel);
            $query->bindValue(':numero', $numero);
            $query->execute();

            if ($query->rowCount() > 0) {
                $messageSucces = "L'email ou le numéro de téléphone existe déjà.";
            } else {
                // Préparation de la requête d'insertion
                $sql = $pdo->prepare("
                    INSERT INTO users (nom_complet, mel, specialite, genre, niveau, objectif, domaine, numero, mdp, temps) 
                    VALUES (:nomcomplet, :mel, :specialite, :genre, :niveau, :objectif, :domaine, :numero, :mdp, :temps)
                ");

                // Liaison des paramètres
                $sql->bindValue(':nomcomplet', $nom);
                $sql->bindValue(':mel', $mel);
                $sql->bindValue(':specialite', $specialite);
                $sql->bindValue(':genre', $genre);
                $sql->bindValue(':niveau', $niveau);
                $sql->bindValue(':objectif', $objectif);
                $sql->bindValue(':domaine', $domaine);
                $sql->bindValue(':numero', $numero);
                $sql->bindValue(':mdp', $mdp);
                $sql->bindValue(':temps', $temps);

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
                        'id_User' => $userData['Id_User'],
                        'nom_complet' => $userData['Nom_complet'],
                        'mel' => $userData['mel'],
                        'specialite' => $userData['specialite'],
                        'genre' => $userData['genre'],
                        'niveau' => $userData['niveau'],
                        'objectif' => $userData['objectif'],
                        'domaine' => $userData['domaine'],
                        'numero' => $userData['numero']
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        

        .main-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 1200px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 700px;
        }

        .left-panel {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
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
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
            animation: float 20s infinite linear;
        }

        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); }
            100% { transform: translateY(-100px) rotate(360deg); }
        }

        .logo {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 30px;
            color: #fff;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            z-index: 1;
            position: relative;
        }

        .logo::before {
            content: '<';
            color: #64ffda;
        }

        .logo::after {
            content: ' />';
            color: #64ffda;
        }

        .welcome-text {
            font-size: 1.1rem;
            line-height: 1.6;
            opacity: 0.9;
            z-index: 1;
            position: relative;
        }

        .welcome-text strong {
            color: #64ffda;
        }

        .right-panel {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-tabs {
            display: flex;
            margin-bottom: 40px;
            background: #f8f9fa;
            border-radius: 12px;
            padding: 4px;
        }

        .auth-tab {
            flex: 1;
            padding: 12px 20px;
            text-align: center;
            cursor: pointer;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 600;
            color: #6c757d;
        }

        .auth-tab.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .form-container {
            position: relative;
            overflow: hidden;
        }

        .form-section {
            opacity: 0;
            transform: translateX(100%);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: absolute;
            width: 100%;
            top: 0;
        }

        .form-section.active {
            opacity: 1;
            transform: translateX(0);
            position: relative;
        }

        .form-section.prev {
            transform: translateX(-100%);
        }

        .form-title {
            font-size: 1.8rem;
            margin-bottom: 30px;
            color: #2d3748;
            text-align: center;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #4a5568;
        }

        .form-input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
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
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .radio-option:hover {
            border-color: #667eea;
        }

        .radio-option input[type="radio"] {
            margin: 0;
        }

        .radio-option input[type="radio"]:checked + span {
            color: #667eea;
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
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: #f8f9fa;
            color: #6c757d;
            border: 2px solid #e2e8f0;
        }

        .btn-secondary:hover {
            background: #e9ecef;
            border-color: #ced4da;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            gap: 15px;
        }

        .step-indicator {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            gap: 10px;
        }

        .step {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #e2e8f0;
            transition: all 0.3s ease;
        }

        .step.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transform: scale(1.2);
        }

        .error-message {
            color: #e53e3e;
            font-size: 0.9rem;
            margin-top: 5px;
            display: none;
        }

        .success-message {
            color: #38a169;
            font-size: 0.9rem;
            margin-top: 5px;
            display: none;
        }

        .password-strength {
            margin-top: 10px;
        }

        .strength-bar {
            height: 4px;
            background: #e2e8f0;
            border-radius: 2px;
            overflow: hidden;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak { background: #e53e3e; }
        .strength-medium { background: #ed8936; }
        .strength-strong { background: #38a169; }

        @media (max-width: 768px) {
            .main-container {
                grid-template-columns: 1fr;
                max-width: 400px;
            }

            .left-panel {
                padding: 40px 30px;
                text-align: center;
            }

            .right-panel {
                padding: 30px 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions .btn {
                width: 100%;
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
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Panel gauche avec présentation -->
        <div class="left-panel">
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
        </div>

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
                <!-- Indicateur d'étapes -->
                <div class="step-indicator">
                    <div class="step active" data-step="1"></div>
                    <div class="step" data-step="2"></div>
                    <div class="step" data-step="3"></div>
                </div>

                <form action="" method="POST">
                    <!-- Étape 1: Informations personnelles -->
                    <div class="form-section active" id="step1">
                        <h2 class="form-title">Informations personnelles</h2>
                        
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

                        <div class="form-group">
                            <label for="specialite">
                                <i class="fas fa-code"></i> Spécialité
                            </label>
                            <input type="text" id="specialite" name="specialite" class="form-input" placeholder="Front End" required>
                        </div>

                        <div class="form-group">
                            <label>
                                <i class="fas fa-venus-mars"></i> Genre
                            </label>
                            <div class="radio-group">
                                <label class="radio-option">
                                    <input type="radio" name="genre" value="Masculin" required>
                                    <span>Homme</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="genre" value="Feminin" required>
                                    <span>Femme</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="genre" value="Demoiselle" required>
                                    <span>Demoiselle</span>
                                </label>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="niveau">
                                <i class="fas fa-graduation-cap"></i> Niveau d'étude
                            </label>
                            <input type="text" id="niveau" name="niveau" class="form-input" placeholder="1A/BTS" required>
                        </div>

                        <div class="form-actions">
                            <div></div>
                            <button type="button" class="btn btn-primary" id="nextStep1">
                                Suivant <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Étape 2: Informations supplémentaires -->
                    <div class="form-section" id="step2">
                        <h2 class="form-title">Informations supplémentaires</h2>
                        
                        <div class="form-group">
                            <label for="objectif">
                                <i class="fas fa-bullseye"></i> Vos objectifs à atteindre
                            </label>
                            <input type="text" id="objectif" name="objectif" class="form-input" placeholder="Devenir développeur Full Stack" required>
                        </div>

                        <div class="form-group">
                            <label for="domaine">
                                <i class="fas fa-heart"></i> Domaine informatique qui vous passionne
                            </label>
                            <input type="text" id="domaine" name="domaine" class="form-input" placeholder="Développement web" required>
                        </div>

                        <div class="form-group">
                            <label for="numero">
                                <i class="fab fa-whatsapp"></i> Numéro WhatsApp
                            </label>
                            <input type="text" id="numero" name="numero" class="form-input" placeholder="##########" required>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary" id="prevStep2">
                                <i class="fas fa-arrow-left"></i> Retour
                            </button>
                            <button type="button" class="btn btn-primary" id="nextStep2">
                                Suivant <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Étape 3: Mot de passe -->
                    <div class="form-section" id="step3">
                        <h2 class="form-title">Choisissez un mot de passe</h2>
                        
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

                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary" id="prevStep3">
                                <i class="fas fa-arrow-left"></i> Retour
                            </button>
                            <button type="submit" name="envoyer" class="btn btn-primary">
                                <i class="fas fa-user-plus"></i> S'inscrire
                            </button>
                        </div>
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

        // Gestion des étapes du formulaire d'inscription
        let currentStep = 1;
        const totalSteps = 3;

        function showStep(step) {
            // Masquer toutes les sections
            document.querySelectorAll('.form-section').forEach(section => {
                section.classList.remove('active', 'prev');
            });

            // Afficher la section courante
            document.getElementById(`step${step}`).classList.add('active');

            // Mettre à jour l'indicateur d'étapes
            document.querySelectorAll('.step').forEach((stepEl, index) => {
                stepEl.classList.toggle('active', index < step);
            });
        }

        // Navigation entre les étapes
        document.getElementById('nextStep1').addEventListener('click', () => {
            if (validateStep1()) {
                currentStep = 2;
                showStep(currentStep);
            }
        });

        document.getElementById('nextStep2').addEventListener('click', () => {
            if (validateStep2()) {
                currentStep = 3;
                showStep(currentStep);
            }
        });

        document.getElementById('prevStep2').addEventListener('click', () => {
            currentStep = 1;
            showStep(currentStep);
        });

        document.getElementById('prevStep3').addEventListener('click', () => {
            currentStep = 2;
            showStep(currentStep);
        });

        // Validation des étapes
        function validateStep1() {
            const requiredFields = ['nom', 'email', 'specialite', 'niveau'];
            const genreChecked = document.querySelector('input[name="genre"]:checked');
            
            let isValid = true;
            requiredFields.forEach(field => {
                const input = document.getElementById(field);
                if (!input.value.trim()) {
                    input.style.borderColor = '#e53e3e';
                    isValid = false;
                } else {
                    input.style.borderColor = '#e2e8f0';
                }
            });

            if (!genreChecked) {
                isValid = false;
            }

            return isValid;
        }

        function validateStep2() {
            const requiredFields = ['objectif', 'domaine', 'numero'];
            let isValid = true;
            
            requiredFields.forEach(field => {
                const input = document.getElementById(field);
                if (!input.value.trim()) {
                    input.style.borderColor = '#e53e3e';
                    isValid = false;
                } else {
                    input.style.borderColor = '#e2e8f0';
                }
            });

            return isValid;
        }

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
    </script>
</body>
</html>
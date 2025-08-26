<?php
session_start();
    $erreur= "Veuillez saisir le mot de passe et le mail reçu par mail";
    if(isset($_POST['connexion'])){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $mail = htmlspecialchars($_POST['email']);
            $mdp = $_POST['password'];
            if($mail != "coulapalo@gmail.com"){
                $erreur = 'Adresse mail ou mot de passe invalide, veuillez contacter le service Learnica!<br> mail:simplecodeur5@gmail.com <br> Téléphone: +2250506938224';
            }elseif($mdp != "12345678"){
                $erreur = 'Adresse mail ou mot de passe invalide, veuillez contacter le service Learnica!<br> mail:simplecodeur5@gmail.com <br> Téléphone: +2250506938224';
            }else{
                $_SESSION['user'] = [
                    "mail" => $mail,
                    "mdp" => $mdp,
                ];
                header("Location: /monblug/tutoriel/fprmation/php/videos");
            }
        }else{
            $message = 'Adresse mail ou mot de passe invalide, veuillez contacter le service Learnica!<br> mail:simplecodeur5@gmail.com <br> Téléphone: +2250506938224';
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learnica - Plateforme d'Apprentissage</title>
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
            animation: particleFloat 20s ease-in-out infinite;
        }

        @keyframes particleFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        /* ==========================================
           SECTION CONNEXION
           ========================================== */
        .login-section {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            position: relative;
            z-index: 2;
            padding: 2rem;
        }

        .login-container {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 20px;
            padding: 3rem;
            border: 2px solid rgba(0, 255, 136, 0.2);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            max-width: 450px;
            width: 100%;
            position: relative;
            overflow: hidden;
            animation: loginSlideIn 1s ease-out;
        }

        @keyframes loginSlideIn {
            from { opacity: 0; transform: translateY(50px) scale(0.9); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.8s ease;
        }

        .login-container:hover::before {
            left: 100%;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
            z-index: 2;
        }

        .login-logo {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            animation: logoGlow 3s ease-in-out infinite alternate;
        }

        @keyframes logoGlow {
            from { filter: drop-shadow(0 0 10px rgba(0, 255, 136, 0.3)); }
            to { filter: drop-shadow(0 0 25px rgba(0, 255, 136, 0.6)); }
        }

        .login-subtitle {
            color: #b0b0b0;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .login-description {
            color: #888;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .login-form {
            position: relative;
            z-index: 2;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            color: #00ff88;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-input {
            width: 100%;
            padding: 1rem;
            border: 2px solid rgba(0, 255, 136, 0.2);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.05);
            color: #ffffff;
            font-size: 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .form-input:focus {
            outline: none;
            border-color: rgba(0, 255, 136, 0.5);
            box-shadow: 0 0 20px rgba(0, 255, 136, 0.2);
            transform: translateY(-2px);
        }

        .form-input::placeholder {
            color: #666;
        }

        .login-button {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border: none;
            border-radius: 12px;
            color: #000;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
            position: relative;
            overflow: hidden;
        }

        .login-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 255, 136, 0.4);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .login-button.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .login-button.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid transparent;
            border-top: 2px solid #000;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .forgot-password {
            text-align: center;
            color: #00d4ff;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #00ff88;
        }

        .demo-credentials {
            background: rgba(0, 255, 136, 0.1);
            border: 1px solid rgba(0, 255, 136, 0.2);
            border-radius: 12px;
            padding: 1rem;
            margin-top: 1.5rem;
            text-align: center;
        }

        .demo-title {
            color: #00ff88;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .demo-info {
            color: #b0b0b0;
            font-size: 0.8rem;
            line-height: 1.4;
        }

        .error-message {
            background: linear-gradient(45deg, rgba(255, 107, 107, 0.2), rgba(255, 142, 142, 0.2));
            border: 1px solid rgba(255, 107, 107, 0.4);
            border-radius: 8px;
            padding: 0.8rem;
            color: #ff6b6b;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            animation: errorShake 0.5s ease-in-out;
        }

        @keyframes errorShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        /* ==========================================
           PLATEFORME PRINCIPALE (cachée initialement)
           ========================================== */
        .platform-container {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .platform-container.show {
            display: block;
            opacity: 1;
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

        .header-nav {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .back-btn, .logout-btn {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            color: #000;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .logout-btn {
            background: linear-gradient(45deg, #ff6b6b, #ff8e8e);
        }

        .back-btn:hover, .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.4);
        }

        .logout-btn:hover {
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.4);
        }

        .back-btn {
            display: none;
        }

        .current-category {
            color: #00ff88;
            font-weight: 600;
        }

        .user-info {
            color: #b0b0b0;
            font-size: 0.9rem;
        }

        /* Main Container */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        /* Categories Section */
        .categories-section {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            animation: slideInFromTop 0.8s ease-out;
        }

        .categories-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .categories-title {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .categories-subtitle {
            color: #b0b0b0;
            font-size: 1.2rem;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .category-card {
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            border-radius: 15px;
            overflow: hidden;
            border: 2px solid rgba(0, 255, 136, 0.1);
            transition: all 0.4s ease;
            cursor: pointer;
            position: relative;
            animation: fadeInUp 0.6s ease-out;
            height: 280px;
        }

        .category-card:hover {
            transform: translateY(-10px) scale(1.02);
            border-color: rgba(0, 255, 136, 0.4);
            box-shadow: 0 15px 40px rgba(0, 255, 136, 0.2);
        }

        .category-card.category-unavailable {
            cursor: not-allowed;
            border-color: rgba(255, 255, 255, 0.1);
        }

        .category-card.category-unavailable:hover {
            transform: translateY(-5px) scale(1.01);
            border-color: rgba(255, 193, 7, 0.3);
            box-shadow: 0 10px 30px rgba(255, 193, 7, 0.1);
        }

        .coming-soon-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: linear-gradient(45deg, #ffc107, #ff9800);
            color: #000;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 3;
            animation: pulse 2s ease-in-out infinite alternate;
        }

        @keyframes pulse {
            from { opacity: 0.8; transform: scale(1); }
            to { opacity: 1; transform: scale(1.05); }
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.6s ease;
            z-index: 1;
        }

        .category-card:hover::before {
            left: 100%;
        }

        .category-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            position: relative;
            z-index: 2;
        }

        .category-content {
            padding: 1.5rem;
            text-align: center;
            position: relative;
            z-index: 2;
            height: 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .category-title {
            font-size: 1.3rem;
            font-weight: 700;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .category-count {
            color: #888;
            font-size: 0.9rem;
        }

        /* Progress Section */
        .progress-section {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            animation: slideInFromTop 0.8s ease-out;
            display: none;
        }

        .progress-section.show {
            display: block;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .progress-title {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .progress-stats {
            display: flex;
            gap: 2rem;
            color: #b0b0b0;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 1.2rem;
            font-weight: 700;
            color: #00ff88;
            display: block;
        }

        .progress-bar-container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            height: 20px;
            overflow: hidden;
            position: relative;
            margin-bottom: 1rem;
        }

        .progress-bar {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            height: 100%;
            border-radius: 10px;
            transition: width 0.5s ease;
            position: relative;
            overflow: hidden;
        }

        .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: progressShine 2s ease-in-out infinite;
        }

        @keyframes progressShine {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .progress-text {
            text-align: center;
            color: #00d4ff;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        /* Video Player & Gallery - styles abrégés pour l'exemple */
        .video-player-section, .video-gallery {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            display: none;
        }

        .video-gallery.show {
            display: block;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                padding: 2rem;
                margin: 1rem;
            }

            .login-logo {
                font-size: 2rem;
            }

            .categories-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
            }

            .category-card {
                height: 250px;
            }

            .category-image {
                height: 170px;
            }

            .categories-title {
                font-size: 1.8rem;
            }

            .main-container {
                padding: 1rem;
            }

            .progress-stats {
                gap: 1rem;
                font-size: 0.9rem;
            }

            .header-nav {
                gap: 1rem;
            }
        }

        @keyframes slideInFromTop {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="forum-main-container">
        <!-- ==========================================
             SECTION CONNEXION
             ========================================== -->
        <section class="login-section" id="loginSection">
            <div class="login-container">
                <div class="login-header">
                    <h1 class="login-logo">Learnica</h1>
                    <p class="login-subtitle">Plateforme d'Apprentissage</p>
                    <p class="login-description">Accédez à votre formation personnalisée et suivez votre progression en temps réel</p>
                </div>

                <form method="POST">
                    <div class="error-message" id="errorMessage"><?php echo $erreur ?></div>
                    <div class="form-group">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" id="email" name="email" class="form-input" 
                               placeholder="votre@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" id="password" name="password" class="form-input" 
                               placeholder="••••••••" required>
                    </div>

                    <input type="submit" name="connexion" value="Se connecter" class="login-button" id="loginButton">
                        
                    <a href="#" class="forgot-password" onclick="fonction()">Mot de passe oublié ?</a>
                </form>

                <!-- Credentials de démo -->
                <div class="demo-credentials">
                    <div class="demo-title">🔑 Utilisez le mot de passe reçu par mail - Accès rapide</div>
                    <div class="demo-info">
                        _Learnica, votre partenaire de formation <br>
                        _Votre formation, notre priorité.
                    </div>
                </div>
            </div>
        </section>
            </main>
        </div>
    </div>
    <script>
        function fonction(){
            alert("Adresse mail ou mot de passe oublé? Veuillez contacter le service Learnica!<br> mail:simplecodeur5@gmail.com Téléphone: +2250506938224")
        }
    </script>
</body>
</html>
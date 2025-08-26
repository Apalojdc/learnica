<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Blog</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 50%, #16213e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        .particle {
            position: absolute;
            background: rgba(240, 147, 251, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .particle:nth-child(odd) {
            animation-direction: reverse;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) translateX(0px) scale(1); opacity: 0.3; }
            25% { transform: translateY(-20px) translateX(10px) scale(1.1); opacity: 0.7; }
            50% { transform: translateY(-40px) translateX(-5px) scale(0.9); opacity: 0.5; }
            75% { transform: translateY(-20px) translateX(-10px) scale(1.05); opacity: 0.8; }
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(25px);
            border-radius: 24px;
            box-shadow: 0 32px 64px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 420px;
            padding: 48px 40px;
            position: relative;
            z-index: 1;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #f093fb, #f5576c, #4facfe, #00f2fe);
            border-radius: 24px 24px 0 0;
        }

        .logo {
            text-align: center;
            margin-bottom: 32px;
        }

        .logo-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #f093fb, #f5576c);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 36px;
            color: white;
            transform: rotate(-5deg);
            transition: all 0.3s ease;
        }

        .logo-icon:hover {
            transform: rotate(0deg) scale(1.05);
        }

        .header h1 {
            color: #1a1a2e;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
            text-align: center;
        }

        .header p {
            color: #6b7280;
            font-size: 16px;
            text-align: center;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-weight: 600;
            font-size: 14px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 18px;
            z-index: 2;
        }

        .form-group input {
            width: 100%;
            padding: 16px 16px 16px 50px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-group input:focus {
            outline: none;
            border-color: #f093fb;
            box-shadow: 0 0 0 4px rgba(240, 147, 251, 0.1);
        }

        .form-group input:focus + .input-icon {
            color: #f093fb;
        }

        .password-wrapper {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6b7280;
            cursor: pointer;
            font-size: 18px;
            padding: 4px;
            z-index: 2;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #f093fb;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #f093fb;
        }

        .remember-me label {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
        }

        .forgot-password {
            color: #f093fb;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .forgot-password:hover {
            color: #f5576c;
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(135deg, #f093fb, #f5576c);
            color: white;
            margin-bottom: 24px;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(240, 147, 251, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .divider {
            position: relative;
            text-align: center;
            margin: 24px 0;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e5e7eb;
        }

        .divider span {
            background: white;
            padding: 0 16px;
            color: #9ca3af;
            font-size: 14px;
            font-weight: 500;
        }

        .social-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 32px;
        }

        .btn-social {
            padding: 12px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            background: white;
            color: #6b7280;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-social:hover {
            border-color: #f093fb;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .google {
            background: #fff;
        }

        .github {
            background: #24292e;
            color: white;
            border-color: #24292e;
        }

        .github:hover {
            background: #1a1e22;
            border-color: #1a1e22;
        }

        .signup-link {
            text-align: center;
            color: #6b7280;
            font-size: 14px;
        }

        .signup-link a {
            color: #f093fb;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .signup-link a:hover {
            color: #f5576c;
        }

        .error-message {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 24px;
            display: none;
            animation: slideDown 0.3s ease;
        }

        .success-message {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 24px;
            display: none;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .loading {
            position: relative;
            pointer-events: none;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin-left: -10px;
            margin-top: -10px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @media (max-width: 640px) {
            .login-container {
                padding: 32px 24px;
                margin: 10px;
            }

            .social-buttons {
                grid-template-columns: 1fr;
            }

            .form-options {
                flex-direction: column;
                gap: 16px;
                align-items: stretch;
            }
        }

        /* Animation d'entrée */
        .login-container {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
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
    <!-- Particules animées -->
    <div class="particles" id="particles"></div>

    <div class="login-container">
        <div class="logo">
            <div class="logo-icon">📝</div>
        </div>

        <div class="header">
            <h1>Bon retour !</h1>
            <p>Connectez-vous à votre compte</p>
        </div>

        <div class="error-message" id="error-message">
            ❌ Email ou mot de passe incorrect
        </div>

        <div class="success-message" id="success-message">
            ✅ Connexion réussie ! Redirection en cours...
        </div>

        <form id="login-form">
            <div class="form-group">
                <label for="email">Email ou nom d'utilisateur</label>
                <div class="input-wrapper">
                    <input type="text" id="email" name="email" required>
                    <div class="input-icon">👤</div>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <div class="input-wrapper">
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword()">👁</button>
                    </div>
                    <div class="input-icon">🔒</div>
                </div>
            </div>

            <div class="form-options">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Se souvenir de moi</label>
                </div>
                <a href="/monblug/update/password/username/mail" class="forgot-password">Mot de passe oublié ?</a>
            </div>

            <button type="submit" class="btn btn-primary" id="login-btn">
                Se connecter
            </button>
        </form>

        <div class="divider">
            <span>Ou continuez avec</span>
        </div>

        <div class="social-buttons">
            <button class="btn-social google" onclick="loginWithGoogle()">
                <span>🔍</span>
                Google
            </button>
            <button class="btn-social github" onclick="loginWithGithub()">
                <span>⚡</span>
                GitHub
            </button>
        </div>

        <div class="signup-link">
            Pas encore de compte ? <a href="#">Créer un compte</a>
        </div>
    </div>

    <script>
        // Génération des particules
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 15;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                // Taille aléatoire
                const size = Math.random() * 6 + 4;
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                
                // Position aléatoire
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                
                // Durée d'animation aléatoire
                particle.style.animationDuration = (Math.random() * 4 + 3) + 's';
                particle.style.animationDelay = Math.random() * 2 + 's';
                
                particlesContainer.appendChild(particle);
            }
        }

        // Toggle mot de passe
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleBtn = document.querySelector('.password-toggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = '👁';
            }
        }

        // Connexion avec Google
        function loginWithGoogle() {
            showMessage('info', '🔍 Redirection vers Google...');
            // Ici vous intégreriez l'authentification Google
            setTimeout(() => {
                console.log('Connexion Google simulée');
            }, 1000);
        }

        // Connexion avec GitHub
        function loginWithGithub() {
            showMessage('info', '⚡ Redirection vers GitHub...');
            // Ici vous intégreriez l'authentification GitHub
            setTimeout(() => {
                console.log('Connexion GitHub simulée');
            }, 1000);
        }

        // Affichage des messages
        function showMessage(type, message) {
            const errorMsg = document.getElementById('error-message');
            const successMsg = document.getElementById('success-message');
            
            // Masquer tous les messages
            errorMsg.style.display = 'none';
            successMsg.style.display = 'none';
            
            if (type === 'error') {
                errorMsg.textContent = message;
                errorMsg.style.display = 'block';
            } else if (type === 'success') {
                successMsg.textContent = message;
                successMsg.style.display = 'block';
            }
        }

        // Validation du formulaire
        function validateForm() {
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            
            if (!email) {
                showMessage('error', '❌ Veuillez entrer votre email ou nom d\'utilisateur');
                return false;
            }
            
            if (!password) {
                showMessage('error', '❌ Veuillez entrer votre mot de passe');
                return false;
            }
            
            if (password.length < 6) {
                showMessage('error', '❌ Le mot de passe doit contenir au moins 6 caractères');
                return false;
            }
            
            return true;
        }

        // Gestion de la soumission
        document.getElementById('login-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!validateForm()) {
                return;
            }
            
            const loginBtn = document.getElementById('login-btn');
            
            // État de chargement
            loginBtn.classList.add('loading');
            loginBtn.textContent = '';
            
            // Simulation de la connexion
            setTimeout(() => {
                // Simuler une connexion réussie (70% de chance) ou échouée (30%)
                if (Math.random() > 0.3) {
                    showMessage('success', '✅ Connexion réussie ! Redirection en cours...');
                    
                    setTimeout(() => {
                        // Redirection vers le dashboard
                        console.log('Redirection vers le dashboard');
                        window.location.href = '/dashboard'; // À adapter selon votre structure
                    }, 2000);
                } else {
                    showMessage('error', '❌ Email ou mot de passe incorrect');
                    loginBtn.classList.remove('loading');
                    loginBtn.textContent = 'Se connecter';
                }
            }, 1500);
        });

        // Animation de focus sur les inputs
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            
            // Masquer les messages au début
            document.getElementById('error-message').style.display = 'none';
            document.getElementById('success-message').style.display = 'none';
        });

        // Animation au clic sur le logo
        document.querySelector('.logo-icon').addEventListener('click', function() {
            this.style.animation = 'none';
            setTimeout(() => {
                this.style.animation = '';
            }, 10);
        });
    </script>
</body>
</html>
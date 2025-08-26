<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récupération de mot de passe - Blog</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 40%, #16213e 70%, #0f3460 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .animated-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 25% 75%, rgba(240, 147, 251, 0.08) 0%, transparent 60%),
                radial-gradient(circle at 75% 25%, rgba(245, 87, 108, 0.08) 0%, transparent 60%),
                radial-gradient(circle at 50% 50%, rgba(79, 172, 254, 0.05) 0%, transparent 70%);
            animation: pulse 8s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.05); }
        }

        .recovery-container {
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(25px);
            border-radius: 24px;
            box-shadow: 
                0 40px 80px rgba(0, 0, 0, 0.3),
                0 20px 40px rgba(240, 147, 251, 0.1);
            width: 100%;
            max-width: 440px;
            padding: 48px;
            position: relative;
            z-index: 1;
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: slideInScale 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes slideInScale {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .recovery-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #f093fb, #f5576c, #4facfe, #00f2fe, #f093fb);
            background-size: 300% 100%;
            border-radius: 24px 24px 0 0;
            animation: flowing-gradient 4s ease-in-out infinite;
        }

        @keyframes flowing-gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .step-indicator {
            display: flex;
            justify-content: center;
            margin-bottom: 32px;
        }

        .step {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #e5e7eb;
            margin: 0 6px;
            transition: all 0.4s ease;
        }

        .step.active {
            background: linear-gradient(135deg, #f093fb, #f5576c);
            transform: scale(1.3);
            box-shadow: 0 4px 12px rgba(240, 147, 251, 0.4);
        }

        .step.completed {
            background: #10b981;
            transform: scale(1.1);
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .icon-container {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #f093fb, #f5576c);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 48px;
            color: white;
            transform: rotate(-10deg);
            transition: all 0.5s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .icon-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: rotate(45deg);
            transition: all 0.6s ease;
            opacity: 0;
        }

        .icon-container:hover {
            transform: rotate(0deg) scale(1.1);
            box-shadow: 0 20px 40px rgba(240, 147, 251, 0.4);
        }

        .icon-container:hover::before {
            animation: shine 0.6s ease-in-out;
            opacity: 1;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        .header h1 {
            color: #1a1a2e;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .header p {
            color: #6b7280;
            font-size: 15px;
            line-height: 1.6;
            max-width: 320px;
            margin: 0 auto;
        }

        .form-step {
            display: none;
            animation: fadeInSlide 0.5s ease-out;
        }

        .form-step.active {
            display: block;
        }

        @keyframes fadeInSlide {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .form-group {
            margin-bottom: 28px;
        }

        .form-group label {
            display: block;
            margin-bottom: 12px;
            color: #374151;
            font-weight: 600;
            font-size: 14px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 20px;
            z-index: 2;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .form-group input {
            width: 100%;
            padding: 20px 20px 20px 60px;
            border: 2px solid #e5e7eb;
            border-radius: 16px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }

        .form-group input:focus {
            outline: none;
            border-color: #f093fb;
            box-shadow: 0 0 0 4px rgba(240, 147, 251, 0.15);
            background: white;
            transform: translateY(-2px);
        }

        .input-wrapper:focus-within .input-icon {
            color: #f093fb;
            transform: translateY(-50%) scale(1.2);
        }

        .btn {
            width: 100%;
            padding: 20px;
            border: none;
            border-radius: 16px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            margin-bottom: 24px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #f093fb, #f5576c);
            color: white;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.7s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(240, 147, 251, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: #6b7280;
            border: 2px solid #e5e7eb;
        }

        .btn-secondary:hover {
            background: #f9fafb;
            border-color: #f093fb;
            color: #f093fb;
            transform: translateY(-2px);
        }

        .loading {
            position: relative;
            pointer-events: none;
            color: transparent;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 24px;
            height: 24px;
            margin-left: -12px;
            margin-top: -12px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .message {
            padding: 16px 20px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 24px;
            display: none;
            animation: slideDown 0.4s ease;
        }

        .message.error {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        .message.success {
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            color: #16a34a;
            border: 1px solid #bbf7d0;
        }

        .message.info {
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            color: #2563eb;
            border: 1px solid #bfdbfe;
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

        .success-animation {
            text-align: center;
            padding: 20px 0;
        }

        .checkmark {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #10b981, #059669);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 40px;
            color: white;
            animation: bounceIn 0.6s ease-out;
        }

        @keyframes bounceIn {
            0% { opacity: 0; transform: scale(0.3); }
            50% { opacity: 1; transform: scale(1.1); }
            100% { opacity: 1; transform: scale(1); }
        }

        .back-links {
            text-align: center;
            margin-top: 32px;
        }

        .back-links a {
            color: #f093fb;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin: 0 12px;
        }

        .back-links a:hover {
            color: #f5576c;
            transform: translateX(-3px);
        }

        .email-info {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
            text-align: center;
        }

        .email-info .email-icon {
            font-size: 32px;
            margin-bottom: 12px;
        }

        .email-info h3 {
            color: #374151;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .email-info p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.5;
        }

        .resend-link {
            color: #f093fb;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .resend-link:hover {
            color: #f5576c;
        }

        @media (max-width: 640px) {
            .recovery-container {
                padding: 32px 28px;
                margin: 10px;
            }

            .header h1 {
                font-size: 24px;
            }

            .icon-container {
                width: 80px;
                height: 80px;
                font-size: 36px;
            }

            .back-links a {
                display: block;
                margin: 8px 0;
            }
        }
    </style>
</head>
<body>
    <div class="animated-background"></div>

    <div class="recovery-container">
        <div class="step-indicator">
            <div class="step active" id="step-1"></div>
            <div class="step" id="step-2"></div>
            <div class="step" id="step-3"></div>
        </div>

        <div class="header">
            <div class="icon-container" onclick="animateIcon()">
                <span id="header-icon">🔑</span>
            </div>
            <h1 id="header-title">Mot de passe oublié ?</h1>
            <p id="header-description">Entrez votre nom d'utilisateur ou votre adresse email pour recevoir un lien de récupération</p>
        </div>

        <div class="message error" id="error-message"></div>
        <div class="message success" id="success-message"></div>
        <div class="message info" id="info-message"></div>

        <!-- Étape 1: Demander username/email -->
        <div class="form-step active" id="form-step-1">
            <form id="recovery-form-1">
                <div class="form-group">
                    <label for="identifier">Nom d'utilisateur ou Email</label>
                    <div class="input-wrapper">
                        <input type="text" id="identifier" name="identifier" placeholder="votrenom ou votre@email.com" required>
                        <div class="input-icon">👤</div>
                    </div>
                </div>

                <a href="/monblug/update/password/page" class="btn btn-primary" id="submit-btn-1">
                    Valider le mail
                </a>
            </form>
        </div>

        <!-- Étape 2: Confirmation d'envoi -->
        <div class="form-step" id="form-step-2">
            <div class="email-info">
                <div class="email-icon">📧</div>
                <h3>Email envoyé !</h3>
                <p>Nous avons envoyé un lien de récupération à votre adresse email. Vérifiez votre boîte de réception et vos spams.</p>
            </div>

            <p style="text-align: center; color: #6b7280; font-size: 14px; margin: 20px 0;">
                Vous n'avez pas reçu l'email ? 
                <a href="#" class="resend-link" onclick="resendEmail()">Renvoyer</a>
            </p>

            <button type="button" class="btn btn-secondary" onclick="goToStep(1)">
                ← Essayer une autre adresse
            </button>
        </div>

        <!-- Étape 3: Succès final -->
        <div class="form-step" id="form-step-3">
            <div class="success-animation">
                <div class="checkmark">✓</div>
                <h3 style="color: #374151; margin-bottom: 12px;">Récupération réussie !</h3>
                <p style="color: #6b7280; font-size: 14px; line-height: 1.5;">
                    Votre mot de passe a été réinitialisé avec succès. Vous pouvez maintenant vous connecter avec votre nouveau mot de passe.
                </p>
            </div>

            <button type="button" class="btn btn-primary" onclick="redirectToLogin()">
                Se connecter maintenant
            </button>
        </div>

        <div class="back-links">
            <a href="#" onclick="redirectToLogin()">← Retour à la connexion</a>
            <a href="#" onclick="redirectToSignup()">Créer un compte →</a>
        </div>
    </div>

    <script>
        let currentStep = 1;
        let userEmail = '';

        // Navigation entre les étapes
        function goToStep(step) {
            // Masquer l'étape actuelle
            document.getElementById(`form-step-${currentStep}`).classList.remove('active');
            document.getElementById(`step-${currentStep}`).classList.remove('active');
            
            if (currentStep < step) {
                document.getElementById(`step-${currentStep}`).classList.add('completed');
            }

            // Afficher la nouvelle étape
            currentStep = step;
            document.getElementById(`form-step-${currentStep}`).classList.add('active');
            document.getElementById(`step-${currentStep}`).classList.add('active');

            // Mettre à jour le header selon l'étape
            updateHeader();
        }

        // Mettre à jour le header
        function updateHeader() {
            const icon = document.getElementById('header-icon');
            const title = document.getElementById('header-title');
            const description = document.getElementById('header-description');

            switch(currentStep) {
                case 1:
                    icon.textContent = '🔑';
                    title.textContent = 'Mot de passe oublié ?';
                    description.textContent = 'Entrez votre nom d\'utilisateur ou votre adresse email pour recevoir un lien de récupération';
                    break;
                case 2:
                    icon.textContent = '📧';
                    title.textContent = 'Vérifiez votre email';
                    description.textContent = 'Un lien de récupération a été envoyé à votre adresse email';
                    break;
                case 3:
                    icon.textContent = '✅';
                    title.textContent = 'Récupération réussie';
                    description.textContent = 'Votre mot de passe a été réinitialisé avec succès';
                    break;
            }
        }

        // Animation de l'icône
        function animateIcon() {
            const iconContainer = document.querySelector('.icon-container');
            iconContainer.style.animation = 'none';
            setTimeout(() => {
                iconContainer.style.animation = '';
            }, 10);
        }

        // Validation de l'identifiant
        function validateIdentifier(identifier) {
            if (!identifier.trim()) {
                return { valid: false, message: '❌ Veuillez entrer votre nom d\'utilisateur ou email' };
            }

            // Vérifier si c'est un format email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const isEmail = emailRegex.test(identifier);
            
            // Vérifier si c'est un format username valide (au moins 3 caractères)
            const isUsername = identifier.length >= 3 && !identifier.includes('@');

            if (!isEmail && !isUsername) {
                return { 
                    valid: false, 
                    message: '❌ Veuillez entrer un email valide ou un nom d\'utilisateur (min. 3 caractères)' 
                };
            }

            return { valid: true, isEmail, identifier };
        }

        // Affichage des messages
        function showMessage(type, message) {
            const errorMsg = document.getElementById('error-message');
            const successMsg = document.getElementById('success-message');
            const infoMsg = document.getElementById('info-message');
            
            // Masquer tous les messages
            errorMsg.style.display = 'none';
            successMsg.style.display = 'none';
            infoMsg.style.display = 'none';
            
            if (type === 'error') {
                errorMsg.textContent = message;
                errorMsg.style.display = 'block';
            } else if (type === 'success') {
                successMsg.textContent = message;
                successMsg.style.display = 'block';
            } else if (type === 'info') {
                infoMsg.textContent = message;
                infoMsg.style.display = 'block';
            }
        }

        // Masquer les messages
        function hideMessages() {
            document.getElementById('error-message').style.display = 'none';
            document.getElementById('success-message').style.display = 'none';
            document.getElementById('info-message').style.display = 'none';
        }

        // Renvoyer l'email
        function resendEmail() {
            showMessage('info', '📧 Email de récupération renvoyé !');
            setTimeout(hideMessages, 3000);
        }

        // Redirections
        function redirectToLogin() {
            console.log('Redirection vers la page de connexion');
            // window.location.href = '/login';
        }

        function redirectToSignup() {
            console.log('Redirection vers la page d\'inscription');
            // window.location.href = '/signup';
        }

        // Soumission du formulaire étape 1
        document.getElementById('recovery-form-1').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const identifier = document.getElementById('identifier').value;
            const validation = validateIdentifier(identifier);
            
            if (!validation.valid) {
                showMessage('error', validation.message);
                return;
            }

            const submitBtn = document.getElementById('submit-btn-1');
            
            // État de chargement
            submitBtn.classList.add('loading');
            submitBtn.textContent = '';
            
            // Stocker l'identifiant pour affichage
            userEmail = validation.isEmail ? identifier : `${identifier}@exemple.com`;
            
            // Simulation de l'envoi
            setTimeout(() => {
                hideMessages();
                showMessage('success', '✅ Lien de récupération envoyé !');
                
                setTimeout(() => {
                    goToStep(2);
                    submitBtn.classList.remove('loading');
                    submitBtn.textContent = 'Envoyer le lien de récupération';
                }, 1000);
            }, 2000);
        });

        // Simulation d'un clic sur le lien dans l'email (pour démo)
        setTimeout(() => {
            if (currentStep === 2) {
                // Simuler la validation du token après 10 secondes
                console.log('Simulation: lien cliqué dans l\'email');
            }
        }, 10000);

        // Animation de focus
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Masquer les messages au début
        hideMessages();
    </script>
</body>
</html>
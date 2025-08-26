<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le mot de passe - Blog</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 30%, #16213e 70%, #0f3460 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(240, 147, 251, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(245, 87, 108, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(79, 172, 254, 0.1) 0%, transparent 50%);
            animation: morphing 8s ease-in-out infinite;
        }

        @keyframes morphing {
            0%, 100% { transform: scale(1) rotate(0deg); }
            25% { transform: scale(1.1) rotate(90deg); }
            50% { transform: scale(0.9) rotate(180deg); }
            75% { transform: scale(1.05) rotate(270deg); }
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        .floating-element {
            position: absolute;
            background: linear-gradient(45deg, rgba(240, 147, 251, 0.1), rgba(245, 87, 108, 0.1));
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            width: 60px;
            height: 60px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            width: 40px;
            height: 40px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            width: 80px;
            height: 80px;
            bottom: 30%;
            left: 70%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) translateX(0px) rotate(0deg); opacity: 0.3; }
            25% { transform: translateY(-30px) translateX(15px) rotate(90deg); opacity: 0.7; }
            50% { transform: translateY(-60px) translateX(-10px) rotate(180deg); opacity: 0.5; }
            75% { transform: translateY(-30px) translateX(-20px) rotate(270deg); opacity: 0.8; }
        }

        .password-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(30px);
            border-radius: 24px;
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 460px;
            padding: 48px 40px;
            position: relative;
            z-index: 1;
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: slideInUp 0.8s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .password-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #f093fb, #f5576c, #4facfe, #00f2fe, #f093fb);
            background-size: 200% 100%;
            border-radius: 24px 24px 0 0;
            animation: gradient-flow 3s ease-in-out infinite;
        }

        @keyframes gradient-flow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .lock-icon {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #f093fb, #f5576c);
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 42px;
            color: white;
            transform: rotate(-8deg);
            transition: all 0.4s ease;
            cursor: pointer;
        }

        .lock-icon:hover {
            transform: rotate(0deg) scale(1.1);
            box-shadow: 0 15px 30px rgba(240, 147, 251, 0.4);
        }

        .header h1 {
            color: #1a1a2e;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .header p {
            color: #6b7280;
            font-size: 15px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 28px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: #374151;
            font-weight: 600;
            font-size: 14px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 20px;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .form-group input {
            width: 100%;
            padding: 18px 18px 18px 55px;
            border: 2px solid #e5e7eb;
            border-radius: 14px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            position: relative;
        }

        .form-group input:focus {
            outline: none;
            border-color: #f093fb;
            box-shadow: 0 0 0 4px rgba(240, 147, 251, 0.15);
            background: white;
        }

        .form-group input:focus + .input-icon {
            color: #f093fb;
            transform: translateY(-50%) scale(1.1);
        }

        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6b7280;
            cursor: pointer;
            font-size: 20px;
            padding: 6px;
            z-index: 3;
            transition: all 0.3s ease;
            border-radius: 50%;
        }

        .password-toggle:hover {
            color: #f093fb;
            background: rgba(240, 147, 251, 0.1);
        }

        .strength-meter {
            margin-top: 12px;
        }

        .strength-bar {
            height: 6px;
            background: #e5e7eb;
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 8px;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            transition: all 0.4s ease;
            border-radius: 3px;
        }

        .strength-weak { background: linear-gradient(90deg, #ef4444, #f87171); }
        .strength-medium { background: linear-gradient(90deg, #f59e0b, #fbbf24); }
        .strength-strong { background: linear-gradient(90deg, #10b981, #34d399); }

        .strength-text {
            font-size: 12px;
            font-weight: 500;
            color: #6b7280;
        }

        .requirements {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 16px;
            margin-top: 12px;
        }

        .requirements h4 {
            color: #374151;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .requirement {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 6px;
        }

        .requirement:last-child {
            margin-bottom: 0;
        }

        .requirement-icon {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            background: #e5e7eb;
            color: #9ca3af;
            transition: all 0.3s ease;
        }

        .requirement.valid .requirement-icon {
            background: #10b981;
            color: white;
        }

        .btn {
            width: 100%;
            padding: 18px;
            border: none;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            margin-bottom: 20px;
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
            transition: left 0.6s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(240, 147, 251, 0.4);
        }

        .btn-primary:active {
            transform: translateY(-1px);
        }

        .btn-primary:disabled {
            background: #9ca3af;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
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
            width: 22px;
            height: 22px;
            margin-left: -11px;
            margin-top: -11px;
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
            padding: 14px 18px;
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

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #f093fb;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .back-link a:hover {
            color: #f5576c;
            transform: translateX(-3px);
        }

        @media (max-width: 640px) {
            .password-container {
                padding: 32px 24px;
                margin: 10px;
            }

            .header h1 {
                font-size: 24px;
            }

            .lock-icon {
                width: 70px;
                height: 70px;
                font-size: 32px;
            }
        }
    </style>
</head>
<body>
    <div class="animated-bg"></div>
    
    <div class="floating-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>

    <div class="password-container">
        <div class="header">
            <div class="lock-icon" onclick="wiggleLock()">🔐</div>
            <h1>Modifier le mot de passe</h1>
            <p>Choisissez un nouveau mot de passe sécurisé pour votre compte</p>
        </div>

        <div class="message error" id="error-message">
            ❌ Les mots de passe ne correspondent pas
        </div>

        <div class="message success" id="success-message">
            ✅ Mot de passe modifié avec succès !
        </div>

        <form id="password-form">
            <div class="form-group">
                <label for="currentPassword">Mot de passe actuel</label>
                <div class="input-wrapper">
                    <input type="password" id="currentPassword" name="currentPassword" required>
                    <div class="input-icon">🔒</div>
                    <button type="button" class="password-toggle" onclick="togglePassword('currentPassword')">👁</button>
                </div>
            </div>

            <div class="form-group">
                <label for="newPassword">Nouveau mot de passe</label>
                <div class="input-wrapper">
                    <input type="password" id="newPassword" name="newPassword" required>
                    <div class="input-icon">🔑</div>
                    <button type="button" class="password-toggle" onclick="togglePassword('newPassword')">👁</button>
                </div>
                
                <div class="strength-meter">
                    <div class="strength-bar">
                        <div class="strength-fill" id="strength-fill"></div>
                    </div>
                    <div class="strength-text" id="strength-text">Entrez votre nouveau mot de passe</div>
                </div>

                <div class="requirements">
                    <h4>Critères de sécurité :</h4>
                    <div class="requirement" id="req-length">
                        <div class="requirement-icon">✗</div>
                        <span>Au moins 8 caractères</span>
                    </div>
                    <div class="requirement" id="req-uppercase">
                        <div class="requirement-icon">✗</div>
                        <span>Une majuscule</span>
                    </div>
                    <div class="requirement" id="req-lowercase">
                        <div class="requirement-icon">✗</div>
                        <span>Une minuscule</span>
                    </div>
                    <div class="requirement" id="req-number">
                        <div class="requirement-icon">✗</div>
                        <span>Un chiffre</span>
                    </div>
                    <div class="requirement" id="req-special">
                        <div class="requirement-icon">✗</div>
                        <span>Un caractère spécial (!@#$%^&*)</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirmer le nouveau mot de passe</label>
                <div class="input-wrapper">
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                    <div class="input-icon">🔐</div>
                    <button type="button" class="password-toggle" onclick="togglePassword('confirmPassword')">👁</button>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" id="submit-btn" disabled>
                Modifier le mot de passe
            </button>
        </form>

        <div class="back-link">
            <a href="#">← Retour au profil</a>
        </div>
    </div>

    <script>
        // Toggle mot de passe
        function togglePassword(fieldId) {
            const input = document.getElementById(fieldId);
            const toggleBtn = input.nextElementSibling;
            
            if (input.type === 'password') {
                input.type = 'text';
                toggleBtn.textContent = '🙈';
            } else {
                input.type = 'password';
                toggleBtn.textContent = '👁';
            }
        }

        // Animation du cadenas
        function wiggleLock() {
            const lock = document.querySelector('.lock-icon');
            lock.style.animation = 'none';
            setTimeout(() => {
                lock.style.animation = 'wiggle 0.5s ease-in-out';
            }, 10);
        }

        // Ajout de l'animation wiggle
        const style = document.createElement('style');
        style.textContent = `
            @keyframes wiggle {
                0%, 100% { transform: rotate(-8deg); }
                25% { transform: rotate(8deg) scale(1.1); }
                50% { transform: rotate(-12deg) scale(1.05); }
                75% { transform: rotate(4deg) scale(1.08); }
            }
        `;
        document.head.appendChild(style);

        // Vérification de la force du mot de passe
        function checkPasswordStrength(password) {
            let score = 0;
            const requirements = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /\d/.test(password),
                special: /[!@#$%^&*(),.?":{}|<>]/.test(password)
            };

            // Mettre à jour les critères visuels
            Object.keys(requirements).forEach(req => {
                const element = document.getElementById(`req-${req}`);
                const icon = element.querySelector('.requirement-icon');
                
                if (requirements[req]) {
                    element.classList.add('valid');
                    icon.textContent = '✓';
                    score++;
                } else {
                    element.classList.remove('valid');
                    icon.textContent = '✗';
                }
            });

            // Mettre à jour la barre de force
            const strengthFill = document.getElementById('strength-fill');
            const strengthText = document.getElementById('strength-text');
            
            let percentage = (score / 5) * 100;
            strengthFill.style.width = percentage + '%';
            
            if (score === 0) {
                strengthFill.className = 'strength-fill';
                strengthText.textContent = 'Entrez votre nouveau mot de passe';
            } else if (score <= 2) {
                strengthFill.className = 'strength-fill strength-weak';
                strengthText.textContent = 'Mot de passe faible';
            } else if (score <= 4) {
                strengthFill.className = 'strength-fill strength-medium';
                strengthText.textContent = 'Mot de passe moyen';
            } else {
                strengthFill.className = 'strength-fill strength-strong';
                strengthText.textContent = 'Mot de passe fort';
            }

            return score;
        }

        // Validation du formulaire
        function validateForm() {
            const currentPassword = document.getElementById('currentPassword').value;
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (!currentPassword) {
                showMessage('error', '❌ Veuillez entrer votre mot de passe actuel');
                return false;
            }

            if (!newPassword) {
                showMessage('error', '❌ Veuillez entrer un nouveau mot de passe');
                return false;
            }

            if (checkPasswordStrength(newPassword) < 4) {
                showMessage('error', '❌ Le nouveau mot de passe ne respecte pas tous les critères de sécurité');
                return false;
            }

            if (newPassword !== confirmPassword) {
                showMessage('error', '❌ Les nouveaux mots de passe ne correspondent pas');
                return false;
            }

            if (currentPassword === newPassword) {
                showMessage('error', '❌ Le nouveau mot de passe doit être différent de l\'ancien');
                return false;
            }

            return true;
        }

        // Affichage des messages
        function showMessage(type, message) {
            const errorMsg = document.getElementById('error-message');
            const successMsg = document.getElementById('success-message');
            
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

        // Masquer les messages au début
        document.getElementById('error-message').style.display = 'none';
        document.getElementById('success-message').style.display = 'none';

        // Événements
        document.getElementById('newPassword').addEventListener('input', function() {
            const strength = checkPasswordStrength(this.value);
            const submitBtn = document.getElementById('submit-btn');
            
            // Activer le bouton seulement si le mot de passe est assez fort
            if (strength >= 4 && this.value.length > 0) {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        });

        document.getElementById('confirmPassword').addEventListener('input', function() {
            const newPassword = document.getElementById('newPassword').value;
            if (this.value && this.value !== newPassword) {
                this.style.borderColor = '#ef4444';
            } else {
                this.style.borderColor = '#e5e7eb';
            }
        });

        // Soumission du formulaire
        document.getElementById('password-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!validateForm()) {
                return;
            }
            
            const submitBtn = document.getElementById('submit-btn');
            
            // État de chargement
            submitBtn.classList.add('loading');
            submitBtn.textContent = '';
            
            // Simulation de la modification
            setTimeout(() => {
                // Simuler une modification réussie
                showMessage('success', '✅ Mot de passe modifié avec succès !');
                
                // Réinitialiser le formulaire
                setTimeout(() => {
                    this.reset();
                    checkPasswordStrength('');
                    submitBtn.classList.remove('loading');
                    submitBtn.textContent = 'Modifier le mot de passe';
                    submitBtn.disabled = true;
                    
                    // Redirection après 2 secondes
                    setTimeout(() => {
                        console.log('Redirection vers le profil');
                        // window.location.href = '/profile';
                    }, 2000);
                }, 1000);
            }, 1500);
        });

        // Animation de focus
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>
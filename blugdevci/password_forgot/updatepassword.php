<?php
    // Inclure le script de modification du mot de passe
    include(__DIR__."/update_code.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau mot de passe</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
        }

        .icon {
            text-align: center;
            margin-bottom: 20px;
        }

        .icon svg {
            width: 60px;
            height: 60px;
            fill: #667eea;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 10px;
            font-size: 24px;
        }

        .description {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 14px;
        }

        .input-wrapper {
            position: relative;
        }

        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 12px 45px 12px 15px;
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            outline: none;
        }

        input[type="password"]:focus,
        input[type="text"]:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        input.error {
            border-color: #e74c3c;
        }

        input.success {
            border-color: #27ae60;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #666;
            padding: 5px;
            display: flex;
            align-items: center;
        }

        .toggle-password:hover {
            color: #667eea;
        }

        .password-requirements {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
            font-size: 13px;
        }

        .password-requirements h3 {
            color: #333;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .requirement {
            display: flex;
            align-items: center;
            margin-bottom: 6px;
            color: #666;
        }

        .requirement.valid {
            color: #27ae60;
        }

        .requirement .check {
            width: 16px;
            height: 16px;
            margin-right: 8px;
            display: inline-block;
        }

        .error-message {
            color: #e74c3c;
            font-size: 13px;
            margin-top: 5px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            margin-top: 25px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .message {
            display: none;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 14px;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/>
            </svg>
        </div>
        
        <h1>Créer un nouveau mot de passe</h1>
        <p class="description">
            Votre nouveau mot de passe doit être différent de l'ancien et respecter les critères de sécurité ci-dessous.
        </p>

        <div id="message" class="message"></div>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="password">Nouveau mot de passe</label>
                <div class="input-wrapper">
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        placeholder="Entrez votre nouveau mot de passe"
                    >
                    <button type="button" class="toggle-password" onclick="togglePassword('password')">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="password-requirements">
                <h3>Le mot de passe doit contenir :</h3>
                <div class="requirement" id="req-length">
                    <span class="check">○</span>
                    Au moins 8 caractères
                </div>
                <div class="requirement" id="req-uppercase">
                    <span class="check">○</span>
                    Une lettre majuscule
                </div>
                <div class="requirement" id="req-lowercase">
                    <span class="check">○</span>
                    Une lettre minuscule
                </div>
                <div class="requirement" id="req-number">
                    <span class="check">○</span>
                    Un chiffre
                </div>
                <div class="requirement" id="req-special">
                    <span class="check">○</span>
                    Un caractère spécial (@$!%*?&)
                </div>
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirmer le mot de passe</label>
                <div class="input-wrapper">
                    <input 
                        type="password" 
                        id="confirm-password" 
                        name="password_confirm"
                        placeholder="Confirmez votre mot de passe"
                    >
                    <button type="button" class="toggle-password" onclick="togglePassword('confirm-password')">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
                <div class="error-message" id="confirm-error">Les mots de passe ne correspondent pas</div>
            </div>

            <button class="btn" type="submit" name="password_update">
                Réinitialiser le mot de passe
            </button>
        </form>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('confirm-password');

        // Vérification en temps réel du mot de passe
        passwordInput.addEventListener('input', function() {
            validatePassword(this.value);
        });

        confirmInput.addEventListener('input', function() {
            checkPasswordMatch();
        });

        function validatePassword(password) {
            const requirements = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /[0-9]/.test(password),
                special: /[@$!%*?&]/.test(password)
            };

            updateRequirement('req-length', requirements.length);
            updateRequirement('req-uppercase', requirements.uppercase);
            updateRequirement('req-lowercase', requirements.lowercase);
            updateRequirement('req-number', requirements.number);
            updateRequirement('req-special', requirements.special);

            return Object.values(requirements).every(val => val);
        }

        function updateRequirement(id, isValid) {
            const element = document.getElementById(id);
            if (isValid) {
                element.classList.add('valid');
                element.querySelector('.check').textContent = '✓';
            } else {
                element.classList.remove('valid');
                element.querySelector('.check').textContent = '○';
            }
        }

        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirm = confirmInput.value;
            const errorMsg = document.getElementById('confirm-error');

            if (confirm === '') {
                confirmInput.classList.remove('error', 'success');
                errorMsg.classList.remove('show');
                return false;
            }

            if (password === confirm) {
                confirmInput.classList.remove('error');
                confirmInput.classList.add('success');
                errorMsg.classList.remove('show');
                return true;
            } else {
                confirmInput.classList.add('error');
                confirmInput.classList.remove('success');
                errorMsg.classList.add('show');
                return false;
            }
        }

        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
            } else {
                input.type = 'password';
            }
        }

        function handleSubmit() {
            const password = passwordInput.value;
            const confirm = confirmInput.value;
            const messageDiv = document.getElementById('message');

            // Vérifications
            if (!password || !confirm) {
                showMessage('Veuillez remplir tous les champs.', 'error');
                return;
            }

            if (!validatePassword(password)) {
                showMessage('Le mot de passe ne respecte pas tous les critères de sécurité.', 'error');
                return;
            }

            if (password !== confirm) {
                showMessage('Les mots de passe ne correspondent pas.', 'error');
                return;
            }

            // Simulation de succès (remplacer par ton appel API)
            showMessage('Votre mot de passe a été réinitialisé avec succès !', 'success');
            
            // Redirection après 2 secondes (optionnel)
            setTimeout(() => {
                // window.location.href = '/login';
                console.log('Redirection vers la page de connexion...');
            }, 2000);
        }

        function showMessage(text, type) {
            const messageDiv = document.getElementById('message');
            messageDiv.textContent = text;
            messageDiv.className = 'message ' + type;
            messageDiv.style.display = 'block';

            if (type === 'success') {
                setTimeout(() => {
                    messageDiv.style.display = 'none';
                }, 5000);
            }
        }

        // Permettre la soumission avec Entrée
        confirmInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                handleSubmit();
            }
        });
    </script>
</body>
</html>
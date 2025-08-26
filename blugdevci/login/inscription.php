<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejoignez notre communauté</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .registration-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 32px 64px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 480px;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        .registration-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #f093fb, #f5576c, #4facfe);
        }

        .header {
            text-align: center;
            margin-bottom: 32px;
        }

        .header h1 {
            color: #1a1a2e;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .header p {
            color: #6b7280;
            font-size: 16px;
            line-height: 1.5;
        }

        .progress-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 32px;
            position: relative;
        }

        .progress-step {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #9ca3af;
            transition: all 0.3s ease;
            margin-bottom: 8px;
        }

        .step-circle.active {
            background: linear-gradient(135deg, #a50a0aff, #a11528ff);
            color: white;
            transform: scale(1.1);
        }

        .step-circle.completed {
            background: #10b981;
            color: white;
        }

        .step-label {
            font-size: 12px;
            color: #6b7280;
            font-weight: 500;
        }

        .progress-line {
            position: absolute;
            top: 20px;
            left: 25%;
            right: 25%;
            height: 2px;
            background: #e5e7eb;
            z-index: -1;
        }

        .progress-line.active {
            background: linear-gradient(90deg, #137a06ff, #0023ebff);
        }

        .form-step {
            display: none;
            animation: slideIn 0.4s ease-out;
        }

        .form-step.active {
            display: block;
        }

        @keyframes slideIn {
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
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-weight: 500;
            font-size: 14px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 16px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #f093fb;
            box-shadow: 0 0 0 4px rgba(240, 147, 251, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .password-input {
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
        }

        .btn-primary {
            background: linear-gradient(135deg, #446100ff, #0817ebff);
            color: white;
            margin-bottom: 16px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(240, 147, 251, 0.3);
        }

        .btn-secondary {
            background: transparent;
            color: #6b7280;
            border: 2px solid #e5e7eb;
        }

        .btn-secondary:hover {
            background: #f9fafb;
            border-color: #d1d5db;
        }

        .form-actions {
            display: flex;
            gap: 12px;
        }

        .form-actions .btn {
            flex: 1;
        }

        .error-message {
            color: #ef4444;
            font-size: 12px;
            margin-top: 4px;
            display: none;
        }

        .success-message {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 16px;
            border-radius: 12px;
            text-align: center;
            font-weight: 500;
            display: none;
            margin-bottom: 24px;
        }

        .profile-upload {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 24px;
        }

        .profile-preview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f9fafb;
            margin-bottom: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .profile-preview:hover {
            border-color: #f093fb;
            transform: scale(1.05);
        }

        .profile-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-icon {
            font-size: 48px;
            color: #9ca3af;
        }

        .upload-btn {
            background: linear-gradient(135deg, #000000ff, #160104ff);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .upload-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(240, 147, 251, 0.3);
        }

        .file-input {
            display: none;
        }

        .optional-label {
            color: #9ca3af;
            font-size: 12px;
            font-weight: normal;
        }
        @media (max-width: 640px) {
                padding: 24px;
                margin: 10px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
            }
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 70%;
            right: 10%;
            animation: float 4s ease-in-out infinite reverse;
        }

        .shape:nth-child(3) {
            width: 40px;
            height: 40px;
            bottom: 20%;
            left: 70%;
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="registration-container">
        <div class="header">
            <h1>Rejoignez notre communauté</h1>
            <p>Créez votre compte et commencez à partager vos idées</p>
        </div>

        <div class="progress-bar">
            <div class="progress-step">
                <div class="step-circle active" id="step-1-circle">1</div>
                <div class="step-label">Informations de base</div>
            </div>
            <div class="progress-step">
                <div class="step-circle" id="step-2-circle">2</div>
                <div class="step-label">Profil personnel</div>
            </div>
            <div class="progress-line" id="progress-line"></div>
        </div>

        <div class="success-message" id="success-message">
            🎉 Inscription réussie ! Bienvenue dans notre communauté !
        </div>

        <form id="registration-form">
            <!-- Étape 1: Informations de base -->
            <div class="form-step active" id="step-1">
                <div class="profile-upload">
                    <div class="profile-preview" id="profile-preview">
                        <div class="profile-icon">👤</div>
                    </div>
                    <button type="button" class="upload-btn" onclick="document.getElementById('profilePicture').click()">
                        Choisir une photo
                    </button>
                    <input type="file" id="profilePicture" name="profilePicture" accept="image/*" class="file-input">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName">Prénom</label>
                        <input type="text" id="firstName" name="firstName" required>
                        <div class="error-message" id="firstName-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Nom</label>
                        <input type="text" id="lastName" name="lastName" required>
                        <div class="error-message" id="lastName-error"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" required>
                    <div class="error-message" id="username-error"></div>
                </div>

                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email" required>
                    <div class="error-message" id="email-error"></div>
                </div>

                <button type="button" class="btn btn-primary" onclick="nextStep()">
                    Continuer →
                </button>
            </div>

            <!-- Étape 2: Profil personnel et mot de passe -->
            <div class="form-step" id="step-2">
                <div class="form-group">
                    <label for="bio">Biographie <span class="optional-label">(optionnel)</span></label>
                    <textarea id="bio" name="bio" placeholder="Parlez-nous un peu de vous..."></textarea>
                </div>

                <div class="form-group">
                    <label for="website">Site web personnel <span class="optional-label">(optionnel)</span></label>
                    <input type="url" id="website" name="website" placeholder="https://votresite.com">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="twitter">Twitter <span class="optional-label">(optionnel)</span></label>
                        <input type="text" id="twitter" name="twitter" placeholder="@votrenom">
                    </div>
                    <div class="form-group">
                        <label for="linkedin">LinkedIn <span class="optional-label">(optionnel)</span></label>
                        <input type="url" id="linkedin" name="linkedin" placeholder="linkedin.com/in/votrenom">
                    </div>
                </div>

                <div class="form-group">
                    <label for="location">Localisation <span class="optional-label">(optionnel)</span></label>
                    <input type="text" id="location" name="location" placeholder="Paris, France">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <div class="password-input">
                            <input type="password" id="password" name="password" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('password')">👁</button>
                        </div>
                        <div class="error-message" id="password-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirmer le mot de passe</label>
                        <div class="password-input">
                            <input type="password" id="confirmPassword" name="confirmPassword" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('confirmPassword')">👁</button>
                        </div>
                        <div class="error-message" id="confirmPassword-error"></div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="prevStep()">
                        ← Retour
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Créer mon compte
                    </button>
                </div>
                
            </div>
            <div class="form-actions">
                   <a href="/monblug/login/page">Vous avez déjà un compte?</a>
                </div>
        </form>
    </div>

    <script>
        let currentStep = 1;
        const totalSteps = 2;

        function nextStep() {
            if (validateStep(currentStep)) {
                if (currentStep < totalSteps) {
                    document.getElementById(`step-${currentStep}`).classList.remove('active');
                    document.getElementById(`step-${currentStep}-circle`).classList.remove('active');
                    document.getElementById(`step-${currentStep}-circle`).classList.add('completed');
                    document.getElementById(`step-${currentStep}-circle`).innerHTML = '✓';
                    
                    currentStep++;
                    
                    document.getElementById(`step-${currentStep}`).classList.add('active');
                    document.getElementById(`step-${currentStep}-circle`).classList.add('active');
                    
                    if (currentStep === 2) {
                        document.getElementById('progress-line').classList.add('active');
                    }
                }
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                document.getElementById(`step-${currentStep}`).classList.remove('active');
                document.getElementById(`step-${currentStep}-circle`).classList.remove('active');
                
                currentStep--;
                
                document.getElementById(`step-${currentStep}`).classList.add('active');
                document.getElementById(`step-${currentStep}-circle`).classList.add('active');
                document.getElementById(`step-${currentStep}-circle`).classList.remove('completed');
                document.getElementById(`step-${currentStep}-circle`).innerHTML = currentStep;
                
                if (currentStep === 1) {
                    document.getElementById('progress-line').classList.remove('active');
                }
            }
        }

        function validateStep(step) {
            let isValid = true;
            
            if (step === 1) {
                // Validation étape 1
                const requiredFields = ['firstName', 'lastName', 'username', 'email'];
                
                requiredFields.forEach(field => {
                    const input = document.getElementById(field);
                    const errorElement = document.getElementById(`${field}-error`);
                    
                    if (!input.value.trim()) {
                        showError(field, 'Ce champ est requis');
                        isValid = false;
                    } else {
                        hideError(field);
                    }
                });

                // Validation email
                const email = document.getElementById('email').value;
                if (email && !isValidEmail(email)) {
                    showError('email', 'Veuillez entrer une adresse email valide');
                    isValid = false;
                }

                // Validation nom d'utilisateur
                const username = document.getElementById('username').value;
                if (username && username.length < 3) {
                    showError('username', 'Le nom d\'utilisateur doit contenir au moins 3 caractères');
                    isValid = false;
                }
            } else if (step === 2) {
                // Validation étape 2 - Mots de passe
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirmPassword').value;
                
                if (!password.trim()) {
                    showError('password', 'Le mot de passe est requis');
                    isValid = false;
                } else if (password.length < 8) {
                    showError('password', 'Le mot de passe doit contenir au moins 8 caractères');
                    isValid = false;
                } else {
                    hideError('password');
                }

                if (!confirmPassword.trim()) {
                    showError('confirmPassword', 'Veuillez confirmer votre mot de passe');
                    isValid = false;
                } else if (password !== confirmPassword) {
                    showError('confirmPassword', 'Les mots de passe ne correspondent pas');
                    isValid = false;
                } else {
                    hideError('confirmPassword');
                }
            }

            return isValid;
        }

        function showError(fieldId, message) {
            const input = document.getElementById(fieldId);
            const errorElement = document.getElementById(`${fieldId}-error`);
            
            input.style.borderColor = '#ef4444';
            errorElement.textContent = message;
            errorElement.style.display = 'block';
        }

        function hideError(fieldId) {
            const input = document.getElementById(fieldId);
            const errorElement = document.getElementById(`${fieldId}-error`);
            
            input.style.borderColor = '#e5e7eb';
            errorElement.style.display = 'none';
        }

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function togglePassword(fieldId) {
            const input = document.getElementById(fieldId);
            const button = input.nextElementSibling;
            
            if (input.type === 'password') {
                input.type = 'text';
                button.textContent = '🙈';
            } else {
                input.type = 'password';
                button.textContent = '👁';
            }
        }

        // Gestionnaire de soumission du formulaire
        document.getElementById('registration-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (validateStep(2)) {
                // Simuler l'inscription
                setTimeout(() => {
                    document.getElementById('success-message').style.display = 'block';
                    document.getElementById('step-2').style.display = 'none';
                    
                    // Ici vous pouvez ajouter l'appel à votre API
                    console.log('Données du formulaire:', new FormData(this));
                }, 500);
            }
        });

        // Gestion de l'upload de photo
        document.getElementById('profilePicture').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('profile-preview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    preview.innerHTML = `<img src="${event.target.result}" alt="Photo de profil">`;
                };
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = '<div class="profile-icon">👤</div>';
            }
        });

        // Validation en temps réel
        document.addEventListener('input', function(e) {
            if (e.target.tagName === 'INPUT') {
                const fieldId = e.target.id;
                const errorElement = document.getElementById(`${fieldId}-error`);
                
                if (errorElement && errorElement.style.display === 'block') {
                    if (e.target.value.trim()) {
                        hideError(fieldId);
                    }
                }
            }
        });
    </script>
</body>
</html>
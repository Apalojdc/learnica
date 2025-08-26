<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le profil</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .edit-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            box-shadow: 0 32px 64px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 480px;
            padding: 40px;
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
            background: white;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #f093fb;
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

        .btn {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            background: linear-gradient(135deg, #446100ff, #0817ebff);
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
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
            padding: 12px 24px;
            border-radius: 25px;
            cursor: pointer;
        }

        .file-input {
            display: none;
        }

        .optional-label {
            color: #9ca3af;
            font-size: 12px;
        }

        @media (max-width: 640px) {
            .edit-container {
                padding: 24px;
                margin: 10px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <div class="header">
            <h1>Modifier votre profil</h1>
            <p>Mettez à jour vos informations personnelles</p>
        </div>

        <form id="edit-profile-form">
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
                </div>
                <div class="form-group">
                    <label for="lastName">Nom</label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>

            <div class="form-group">
                <label for="bio">Biographie <span class="optional-label">(optionnel)</span></label>
                <textarea id="bio" name="bio" placeholder="Parlez-nous un peu de vous..."></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="website">Site web personnel <span class="optional-label">(optionnel)</span></label>
                    <input type="url" id="website" name="website" placeholder="https://votresite.com">
                </div>
                <div class="form-group">
                    <label for="twitter">Twitter <span class="optional-label">(optionnel)</span></label>
                    <input type="text" id="twitter" name="twitter" placeholder="@votrenom">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="linkedin">LinkedIn <span class="optional-label">(optionnel)</span></label>
                    <input type="url" id="linkedin" name="linkedin" placeholder="linkedin.com/in/votrenom">
                </div>
                <div class="form-group">
                    <label for="location">Localisation <span class="optional-label">(optionnel)</span></label>
                    <input type="text" id="location" name="location" placeholder="Paris, France">
                </div>
            </div>

            <button type="submit" class="btn">Enregistrer les modifications</button>
        </form>
    </div>

    <script>
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

        // Gestionnaire de soumission du formulaire
        document.getElementById('edit-profile-form').addEventListener('submit', function(e) {
            e.preventDefault();
            // Ici vous pouvez ajouter l'appel à votre API
            console.log('Données du formulaire:', new FormData(this));
            alert('Profil mis à jour avec succès !');
        });
    </script>
</body>
</html>
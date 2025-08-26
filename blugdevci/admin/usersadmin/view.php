<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e1e2e 0%, #2d2d44 100%);
            min-height: 100vh;
            color: #e0e0e0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: rgba(40, 40, 60, 0.8);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px;
            text-align: center;
            position: relative;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="white" opacity="0.1"/><circle cx="80" cy="40" r="1" fill="white" opacity="0.1"/><circle cx="40" cy="80" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 20px;
            border: 4px solid rgba(255, 255, 255, 0.2);
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            font-weight: bold;
            color: white;
            position: relative;
            z-index: 1;
            transition: transform 0.3s ease;
        }

        .profile-image:hover {
            transform: scale(1.05);
        }

        .user-name {
            font-size: 2.5em;
            font-weight: 700;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .user-title {
            font-size: 1.2em;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .content {
            padding: 40px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .info-card {
            background: rgba(60, 60, 80, 0.6);
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            border-color: rgba(102, 126, 234, 0.4);
        }

        .info-card h3 {
            color: #8b9dff;
            margin-bottom: 15px;
            font-size: 1.3em;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-item {
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .info-label {
            font-weight: 600;
            color: #a0a0b0;
            flex: 1;
        }

        .info-value {
            color: #e0e0e0;
            font-weight: 500;
            flex: 2;
            text-align: right;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.2), rgba(118, 75, 162, 0.2));
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: scale(1.05);
        }

        .stat-number {
            font-size: 2.2em;
            font-weight: 700;
            color: #8b9dff;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #a0a0b0;
            font-size: 0.9em;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .edit-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 30px;
            width: 100%;
            max-width: 200px;
            display: block;
            margin: 30px auto 0;
        }

        .edit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .icon {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        @media (max-width: 768px) {
            .container {
                margin: 10px;
            }
            
            .header {
                padding: 30px 20px;
            }
            
            .content {
                padding: 30px 20px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .user-name {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="profile-image">
                JD
            </div>
            <h1 class="user-name">Jean Dupont</h1>
            <p class="user-title">Développeur Full Stack</p>
        </div>

        <div class="content">
            <div class="info-grid">
                <div class="info-card">
                    <h3>
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                        Informations Personnelles
                    </h3>
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value">jean.dupont@email.com</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Téléphone</span>
                        <span class="info-value">+33 6 12 34 56 78</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Localisation</span>
                        <span class="info-value">Paris, France</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Date de naissance</span>
                        <span class="info-value">15 mars 1990</span>
                    </div>
                </div>

                <div class="info-card">
                    <h3>
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M20 6L9 17l-5-5 1.41-1.41L9 14.17 18.59 4.59z"/>
                        </svg>
                        Informations Professionnelles
                    </h3>
                    <div class="info-item">
                        <span class="info-label">Poste</span>
                        <span class="info-value">Développeur Full Stack</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Entreprise</span>
                        <span class="info-value">TechCorp Solutions</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Expérience</span>
                        <span class="info-value">5 ans</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Département</span>
                        <span class="info-value">Développement Web</span>
                    </div>
                </div>

                <div class="info-card">
                    <h3>
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        Compétences
                    </h3>
                    <div class="info-item">
                        <span class="info-label">Langages</span>
                        <span class="info-value">JavaScript, Python, PHP</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Frameworks</span>
                        <span class="info-value">React, Vue.js, Laravel</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Bases de données</span>
                        <span class="info-value">MySQL, MongoDB</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Outils</span>
                        <span class="info-value">Git, Docker, AWS</span>
                    </div>
                </div>

                <div class="info-card">
                    <h3>
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                        Préférences
                    </h3>
                    <div class="info-item">
                        <span class="info-label">Langue</span>
                        <span class="info-value">Français</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Fuseau horaire</span>
                        <span class="info-value">Europe/Paris</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Notifications</span>
                        <span class="info-value">Email + SMS</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Thème</span>
                        <span class="info-value">Sombre</span>
                    </div>
                </div>
            </div>

            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-number">42</div>
                    <div class="stat-label">Projets Complétés</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">1,250</div>
                    <div class="stat-label">Heures de Code</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">8.5</div>
                    <div class="stat-label">Note Moyenne</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">15</div>
                    <div class="stat-label">Certifications</div>
                </div>
            </div>

            <button class="edit-btn" onclick="editProfile()">
                Modifier le Profil
            </button>
        </div>
    </div>

    <script>
        function editProfile() {
            alert('Fonction de modification du profil à implémenter !');
        }

        // Animation d'apparition au scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observer les cartes
        document.querySelectorAll('.info-card, .stat-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>
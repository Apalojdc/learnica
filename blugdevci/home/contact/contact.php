<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Formation Développement</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #0a0a0a;
            background-image: 
                radial-gradient(circle at 25% 25%, #1a1a2e 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, #16213e 0%, transparent 50%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 16px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #1e1e1e, #2d2d2d);
            border-bottom: 1px solid #333;
            color: #f5f5f5;
            padding: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.03) 0%, transparent 70%);
            animation: pulse 6s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .main-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
        }

        .contact-form {
            padding: 40px;
            background: #1a1a1a;
        }

        .contact-info {
            padding: 40px;
            background: #1f1f1f;
            border-left: 2px solid #ff6b35;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #e0e0e0;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 15px;
            border: 1px solid #333;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #2a2a2a;
            color: #f0f0f0;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #ff6b35;
            background: #333;
            box-shadow: 0 0 0 2px rgba(255, 107, 53, 0.1);
            transform: translateY(-1px);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .subject-icons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .subject-tag {
            padding: 8px 15px;
            background: #e3f2fd;
            color: #1976d2;
            border-radius: 20px;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .subject-tag:hover {
            background: #3498db;
            color: white;
            transform: translateY(-2px);
        }

        .submit-btn {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(52, 152, 219, 0.4);
        }

        .info-section {
            margin-bottom: 30px;
        }

        .info-section h3 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            padding: 15px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }

        .info-item:hover {
            transform: translateX(5px);
        }

        .icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #3498db, #2980b9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-link {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        @media (max-width: 768px) {
            .main-content {
                grid-template-columns: 1fr;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .contact-form,
            .contact-info {
                padding: 30px 20px;
            }
            
            .subject-icons {
                flex-wrap: wrap;
            }
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
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
    <div class="container fade-in">
        <div class="header">
            <h1>💻 Contactez-nous</h1>
            <p>Formation • Forum • Blog • Développement</p>
        </div>

        <div class="main-content">
            <div class="contact-form">
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Nom complet *</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="subject">Sujet de votre message</label>
                        <select id="subject" name="subject">
                            <option value="">Sélectionnez un sujet</option>
                            <option value="formation">🎓 Questions sur les formations</option>
                            <option value="forum">💬 Support forum</option>
                            <option value="blog">📝 Collaboration blog</option>
                            <option value="technique">🔧 Support technique</option>
                            <option value="partenariat">🤝 Partenariat</option>
                            <option value="autre">❓ Autre</option>
                        </select>
                        <div class="subject-icons">
                            <span class="subject-tag" onclick="selectSubject('formation')">🎓 Formation</span>
                            <span class="subject-tag" onclick="selectSubject('forum')">💬 Forum</span>
                            <span class="subject-tag" onclick="selectSubject('blog')">📝 Blog</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message">Votre message *</label>
                        <textarea id="message" name="message" placeholder="Décrivez votre demande, question ou suggestion..." required></textarea>
                    </div>

                    <button type="submit" class="submit-btn">
                        Envoyer le message 🚀
                    </button>
                </form>
            </div>

            <div class="contact-info">
                <div class="info-section">
                    <h3><span class="icon">📧</span> Contact Direct</h3>
                    <div class="info-item">
                        <div class="icon">✉️</div>
                        <div>
                            <strong>Email</strong><br>
                            contact@formation-dev.com
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="icon">💬</div>
                        <div>
                            <strong>Discord</strong><br>
                            Rejoignez notre communauté
                        </div>
                    </div>
                </div>

                <div class="info-section">
                    <h3><span class="icon">🎯</span> Nos Services</h3>
                    <div class="info-item">
                        <div class="icon">🎓</div>
                        <div>
                            <strong>Formations</strong><br>
                            Développement web & mobile
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="icon">👥</div>
                        <div>
                            <strong>Forum</strong><br>
                            Entraide communautaire
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="icon">📝</div>
                        <div>
                            <strong>Blog</strong><br>
                            Actualités & tutoriels
                        </div>
                    </div>
                </div>

                <div class="info-section">
                    <h3><span class="icon">🌐</span> Suivez-nous</h3>
                    <div class="social-links">
                        <a href="#" class="social-link" title="GitHub">🐙</a>
                        <a href="#" class="social-link" title="Twitter">🐦</a>
                        <a href="#" class="social-link" title="LinkedIn">💼</a>
                        <a href="#" class="social-link" title="YouTube">📺</a>
                    </div>
                </div>

                <div class="info-section">
                    <div class="info-item">
                        <div class="icon">⚡</div>
                        <div>
                            <strong>Réponse rapide</strong><br>
                            Sous 24h en moyenne
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animation d'envoi du formulaire
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = document.querySelector('.submit-btn');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '⏳ Envoi en cours...';
            submitBtn.style.background = '#95a5a6';
            
            // Simulation d'envoi
            setTimeout(() => {
                submitBtn.innerHTML = '✅ Message envoyé !';
                submitBtn.style.background = '#27ae60';
                
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.style.background = 'linear-gradient(135deg, #3498db, #2980b9)';
                    this.reset();
                }, 2000);
            }, 1500);
        });

        // Fonction pour sélectionner un sujet via les tags
        function selectSubject(value) {
            document.getElementById('subject').value = value;
            
            // Animation du tag sélectionné
            document.querySelectorAll('.subject-tag').forEach(tag => {
                tag.style.background = '#e3f2fd';
                tag.style.color = '#1976d2';
            });
            
            event.target.style.background = '#3498db';
            event.target.style.color = 'white';
        }

        // Animation des éléments au scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeIn 0.8s ease-out';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.info-item, .form-group').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>
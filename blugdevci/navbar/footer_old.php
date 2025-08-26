<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Professionnel</title>
    <style>

        footer {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 25%, #1a1a1a 50%, #0d0d0d 75%, #000000 100%);
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255,255,255,0.05) 0%, transparent 50%, rgba(255,255,255,0.02) 100%);
            pointer-events: none;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
            padding: 60px 20px 40px;
            position: relative;
            z-index: 1;
        }

        .footer-section h3 {
            color: #ffffff;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 25px;
            position: relative;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, #4CAF50, #45a049);
            border-radius: 2px;
        }

        .footer-section p {
            color: #cccccc;
            line-height: 1.8;
            margin-bottom: 25px;
            font-size: 15px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #cccccc;
            text-decoration: none;
            font-size: 15px;
            transition: all 0.3s ease;
            position: relative;
            padding-left: 15px;
        }

        .footer-links a::before {
            content: '→';
            position: absolute;
            left: 0;
            color: #4CAF50;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateX(-10px);
        }

        .footer-links a:hover {
            color: #4CAF50;
            padding-left: 20px;
            transform: translateX(5px);
        }

        .footer-links a:hover::before {
            opacity: 1;
            transform: translateX(0);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #333333, #1a1a1a);
            color: #ffffff;
            text-decoration: none;
            border-radius: 50%;
            font-weight: bold;
            font-size: 18px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .social-links a::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #4CAF50, #45a049);
            opacity: 0;
            transition: all 0.3s ease;
            border-radius: 50%;
        }

        .social-links a:hover {
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 8px 25px rgba(76, 175, 80, 0.4);
        }

        .social-links a:hover::before {
            opacity: 1;
        }

        .social-links a span {
            position: relative;
            z-index: 1;
        }

        .footer-bottom {
            background: rgba(0, 0, 0, 0.3);
            padding: 25px 20px;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 1;
        }

        .footer-bottom p {
            color: #cccccc;
            font-size: 14px;
            margin: 0;
        }

        @media (max-width: 768px) {
            .footer-container {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 40px 15px 30px;
            }

            .footer-section h3 {
                font-size: 20px;
            }

            .social-links {
                justify-content: center;
            }
        }
                /* Stats Section */
        .stats-section-footer {
            padding: 80px 20px;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: white;
            text-align: center;
        }

        .section-title {
            font-size: 36px;
            margin-bottom: 50px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 30px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .stat-item {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 30px 20px;
            border-radius: 15px;
            transition: transform 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-10px);
        }

        .stat-number {
            font-size: 40px;
            font-weight: bold;
            color: #00e6e6;
        }

        .stat-label {
            font-size: 18px;
            margin-top: 10px;
            color: #ddd;
        }

        @media (max-width: 600px) {
            .section-title {
                font-size: 28px;
            }

            .stat-number {
                font-size: 32px;
            }

            .stat-label {
                font-size: 16px;
            }
        }


        /* Animation d'entrée */
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

        .footer-section {
            animation: fadeInUp 0.6s ease-out;
        }

        .footer-section:nth-child(1) { animation-delay: 0.1s; }
        .footer-section:nth-child(2) { animation-delay: 0.2s; }
        .footer-section:nth-child(3) { animation-delay: 0.3s; }
        .footer-section:nth-child(4) { animation-delay: 0.4s; }
    </style>
</head>
<body>
 <section class="stats-section-footer">
        <div class="container-footer">
            <h2 class="section-title">Nos Statistiques</h2>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-icon">📱</div>
                    <div class="stat-number" data-target="50000">0</div>
                    <div class="stat-label">Téléchargements</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">📄</div>
                    <div class="stat-number" data-target="500">0</div>
                    <div class="stat-label">Documents</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">👥</div>
                    <div class="stat-number" data-target="15000">0</div>
                    <div class="stat-label">Utilisateurs</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">⭐</div>
                    <div class="stat-number" data-target="4.8">0</div>
                    <div class="stat-label">Note Moyenne</div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>À propos</h3>
                <p>DevBlog est un blog dédié aux développeurs web passionnés. Nous partageons des tutoriels, des astuces et des bonnes pratiques pour vous aider à progresser.</p>
                <div class="social-links">
                    <a href="#" title="Facebook"><span>F</span></a>
                    <a href="#" title="Twitter"><span>T</span></a>
                    <a href="#" title="GitHub"><span>G</span></a>
                    <a href="#" title="LinkedIn"><span>L</span></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Liens rapides</h3>
                <ul class="footer-links">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Articles</a></li>
                    <li><a href="/monblug/Tutoriel">Tutoriels</a></li>
                    <li><a href="#">Ressources</a></li>
                    <li><a href="#">À propos</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Catégories populaires</h3>
                <ul class="footer-links">
                    <li><a href="https://developer.mozilla.org/fr/docs/Learn_web_development/Core/Scripting/What_is_JavaScript">JavaScript</a></li>
                    <li><a href="https://www.w3schools.com/css/default.asp">CSS</a></li>
                    <li><a href="https://react.dev/learn">React</a></li>
                    <li><a href="https://nodejs.org/docs/latest/api/">Node.js</a></li>
                    <li><a href="https://www.typescriptlang.org/docs/">TypeScript</a></li>
                    <li><a href="https://www.typescriptlang.org/docs/">Python</a></li>
                    <li><a href="https://www.typescriptlang.org/docs/">Flutter</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact</h3>
                <ul class="footer-links">
                    <li>Email: <a href="mailto:simplecodeur5@gmail.com">simplecodeur5@gmail.com</a></li>
                    <li>Téléphone: (+225) <a href="tel:0506938224">0506938224</a> / (+225) <a href="tel:0545796982">0545796982</a></li>
                    <li>Adresse: Marcory, Abidjan Côte d'Ivoire</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 DevBlog. Tous droits réservés.</p>
        </div>
    </footer>
    <script>
        // Fonction pour animer les nombres
        function animateNumbers() {
            const statNumbers = document.querySelectorAll('.stat-number');
            
            statNumbers.forEach((number, index) => {
                const target = parseFloat(number.getAttribute('data-target'));
                const isDecimal = target % 1 !== 0;
                let current = 0;
                
                // Délai différent pour chaque statistique
                setTimeout(() => {
                    const increment = target / 50; // Divise l'animation en 50 étapes
                    
                    const updateNumber = () => {
                        current += increment;
                        
                        if (current >= target) {
                            current = target;
                            
                            // Formatage final
                            if (target >= 1000 && target < 1000000) {
                                number.textContent = Math.round(target / 1000) + 'k+';
                            } else if (target >= 1000000) {
                                number.textContent = Math.round(target / 1000000) + 'M+';
                            } else if (isDecimal) {
                                number.textContent = target.toFixed(1) + '★';
                            } else {
                                number.textContent = Math.round(target) + '+';
                            }
                        } else {
                            // Formatage pendant l'animation
                            if (target >= 1000 && target < 1000000) {
                                number.textContent = Math.round(current / 1000) + 'k+';
                            } else if (target >= 1000000) {
                                number.textContent = Math.round(current / 1000000) + 'M+';
                            } else if (isDecimal) {
                                number.textContent = current.toFixed(1) + '★';
                            } else {
                                number.textContent = Math.round(current) + '+';
                            }
                            
                            // Ajouter une classe pour l'animation de pulsation
                            number.classList.add('counting');
                            setTimeout(() => number.classList.remove('counting'), 100);
                            
                            requestAnimationFrame(updateNumber);
                        }
                    };
                    
                    updateNumber();
                }, index * 200); // Délai croissant pour chaque statistique
            });
        }

        // Observer pour détecter quand la section devient visible
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateNumbers();
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        // Démarrer l'observation
        document.addEventListener('DOMContentLoaded', () => {
            const statsSection = document.querySelector('.stats-section-footer');
            observer.observe(statsSection);
        });
    </script>
</body>
</html>
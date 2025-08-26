<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevForum - Communauté de Développeurs</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #1a1f2e 0%, #16213e 50%, #0f172a 100%);
            color: #e2e8f0;
            line-height: 1.6;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        /* Hero Section */
        .hero {
            padding: 6rem 0;
            text-align: center;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="%23374151" stroke-width="0.5" opacity="0.3"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.5;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #60a5fa, #3b82f6, #1e40af);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 1.25rem;
            color: #94a3b8;
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 4rem;
        }

        /* Stats */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
        }

        .stat-card {
            background: rgba(15, 23, 42, 0.6);
            padding: 2rem;
            border-radius: 16px;
            text-align: center;
            border: 1px solid rgba(59, 130, 246, 0.1);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(59, 130, 246, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: #60a5fa;
            display: block;
        }

        /* Features */
        .features {
            padding: 6rem 0;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            color: #f1f5f9;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: rgba(15, 23, 42, 0.6);
            padding: 2.5rem;
            border-radius: 20px;
            border: 1px solid rgba(59, 130, 246, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa, #93c5fd);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .feature-card:hover::before {
            transform: translateX(0);
        }

        .feature-card:hover {
            transform: translateY(-8px);
            border-color: rgba(59, 130, 246, 0.3);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            display: block;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #f1f5f9;
        }

        .feature-card p {
            color: #94a3b8;
            line-height: 1.7;
        }

        /* Recent Activity */
        .activity {
            padding: 6rem 0;
            background: rgba(15, 23, 42, 0.3);
        }

        .activity-feed {
            display: grid;
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .activity-item {
            background: rgba(15, 23, 42, 0.6);
            padding: 1.5rem;
            border-radius: 12px;
            border-left: 4px solid #3b82f6;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .activity-item:hover {
            transform: translateX(8px);
            background: rgba(15, 23, 42, 0.8);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .activity-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .activity-user {
            font-weight: 600;
            color: #60a5fa;
        }

        .activity-time {
            color: #64748b;
            font-size: 0.875rem;
        }

        .activity-action {
            color: #94a3b8;
        }

        /* CTA Section */
        .cta {
            padding: 6rem 0;
            text-align: center;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(29, 78, 216, 0.1));
            border-radius: 24px;
            margin: 4rem 0;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .cta h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #f1f5f9;
        }

        .cta p {
            font-size: 1.125rem;
            color: #94a3b8;
            margin-bottom: 2rem;
        }

        /* Footer */
        footer {
            background: rgba(15, 23, 42, 0.8);
            padding: 3rem 0;
            margin-top: 6rem;
            border-top: 1px solid rgba(59, 130, 246, 0.1);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            color: #f1f5f9;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .footer-section a {
            color: #94a3b8;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #60a5fa;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(59, 130, 246, 0.1);
            color: #64748b;
        }

        /* Animations */
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

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="container">
            <div class="logo">
                <span>⚡</span>
                DevForum
            </div>
            <ul class="nav-links">
                <li><a href="#home">Accueil</a></li>
                <li><a href="#forums">Forums</a></li>
                <li><a href="#articles">Articles</a></li>
                <li><a href="#projects">Projets</a></li>
                <li><a href="#events">Événements</a></li>
            </ul>
            <div class="user-menu">
                <a href="#" class="btn btn-secondary">Connexion</a>
                <a href="#" class="btn btn-primary">Rejoindre</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-content fade-in-up">
                    <h1>Communauté de Développeurs</h1>
                    <p>Rejoignez la plus grande communauté francophone de développeurs. Partagez vos connaissances, découvrez les dernières technologies et collaborez sur des projets innovants.</p>
                    <div class="hero-buttons">
                        <a href="#" class="btn btn-primary">Commencer maintenant</a>
                        <a href="#" class="btn btn-secondary">Explorer les forums</a>
                    </div>
                </div>

                <div class="stats">
                    <div class="stat-card">
                        <span class="stat-number pulse">15K+</span>
                        <span>Développeurs actifs</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number pulse">2.3K+</span>
                        <span>Discussions</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number pulse">850+</span>
                        <span>Projets partagés</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number pulse">99%</span>
                        <span>Satisfaction</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <h2 class="section-title">Pourquoi choisir DevForum ?</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <span class="feature-icon">🚀</span>
                        <h3>Discussions Techniques</h3>
                        <p>Échangez sur les dernières technologies, frameworks et bonnes pratiques avec des experts de l'industrie.</p>
                    </div>
                    <div class="feature-card">
                        <span class="feature-icon">💡</span>
                        <h3>Partage de Code</h3>
                        <p>Partagez vos snippets, recevez des reviews et collaborez sur des projets open source avec la communauté.</p>
                    </div>
                    <div class="feature-card">
                        <span class="feature-icon">📚</span>
                        <h3>Ressources & Tutoriels</h3>
                        <p>Accédez à une bibliothèque complète de tutoriels, articles techniques et ressources d'apprentissage.</p>
                    </div>
                    <div class="feature-card">
                        <span class="feature-icon">🤝</span>
                        <h3>Networking</h3>
                        <p>Connectez-vous avec d'autres développeurs, trouvez des mentors et élargissez votre réseau professionnel.</p>
                    </div>
                    <div class="feature-card">
                        <span class="feature-icon">🎯</span>
                        <h3>Défis & Concours</h3>
                        <p>Participez à des défis de programmation, hackathons et concours pour tester vos compétences.</p>
                    </div>
                    <div class="feature-card">
                        <span class="feature-icon">📈</span>
                        <h3>Carrière & Jobs</h3>
                        <p>Découvrez des opportunités d'emploi, conseils carrière et retours d'expérience de professionnels.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="activity">
            <div class="container">
                <h2 class="section-title">Activité Récente</h2>
                <div class="activity-feed">
                    <div class="activity-item">
                        <div class="activity-header">
                            <span class="activity-user">@AlexDev92</span>
                            <span class="activity-time">Il y a 2h</span>
                        </div>
                        <p class="activity-action">A partagé un nouveau tutoriel sur React 18 et les Concurrent Features</p>
                    </div>
                    <div class="activity-item">
                        <div class="activity-header">
                            <span class="activity-user">@SarahJS</span>
                            <span class="activity-time">Il y a 4h</span>
                        </div>
                        <p class="activity-action">A créé une discussion sur les meilleures pratiques en TypeScript</p>
                    </div>
                    <div class="activity-item">
                        <div class="activity-header">
                            <span class="activity-user">@CodeMaster</span>
                            <span class="activity-time">Il y a 6h</span>
                        </div>
                        <p class="activity-action">A publié un projet open source pour la gestion d'état en Vue.js</p>
                    </div>
                    <div class="activity-item">
                        <div class="activity-header">
                            <span class="activity-user">@DevNewbie</span>
                            <span class="activity-time">Il y a 8h</span>
                        </div>
                        <p class="activity-action">A posé une question sur l'optimisation des performances en Node.js</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta">
            <div class="container">
                <h2>Prêt à rejoindre la communauté ?</h2>
                <p>Commencez dès aujourd'hui et faites partie de la plus grande communauté de développeurs francophones.</p>
                <a href="#" class="btn btn-primary">Créer mon compte gratuitement</a>
            </div>
        </section>
    </main>
            <?php include(__DIR__.'/../../navbar/footer.php') ?>            
    <!-- <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Communauté</h3>
                    <a href="#">Forums</a>
                    <a href="#">Discord</a>
                    <a href="#">Événements</a>
                    <a href="#">Meetups</a>
                </div>
                <div class="footer-section">
                    <h3>Ressources</h3>
                    <a href="#">Documentation</a>
                    <a href="#">Tutoriels</a>
                    <a href="#">Articles</a>
                    <a href="#">API</a>
                </div>
                <div class="footer-section">
                    <h3>Support</h3>
                    <a href="#">Centre d'aide</a>
                    <a href="#">Contact</a>
                    <a href="#">FAQ</a>
                    <a href="#">Status</a>
                </div>
                <div class="footer-section">
                    <h3>Entreprise</h3>
                    <a href="#">À propos</a>
                    <a href="#">Carrières</a>
                    <a href="#">Blog</a>
                    <a href="#">Presse</a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 DevForum. Tous droits réservés.</p>
            </div>
        </div>
    </footer> -->

    <script>
        // Animation au scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                }
            });
        }, observerOptions);

        // Observer les éléments à animer
        document.querySelectorAll('.feature-card, .stat-card, .activity-item').forEach(el => {
            observer.observe(el);
        });

        // Effet de survol interactif sur les cartes
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-8px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Animation des statistiques
        function animateStats() {
            document.querySelectorAll('.stat-number').forEach(stat => {
                const finalValue = stat.textContent;
                const numericValue = parseInt(finalValue.replace(/[^\d]/g, ''));
                let currentValue = 0;
                const increment = numericValue / 50;
                
                const timer = setInterval(() => {
                    currentValue += increment;
                    if (currentValue >= numericValue) {
                        stat.textContent = finalValue;
                        clearInterval(timer);
                    } else {
                        const suffix = finalValue.includes('K') ? 'K+' : finalValue.includes('%') ? '%' : '+';
                        stat.textContent = Math.floor(currentValue) + suffix;
                    }
                }, 30);
            });
        }

        // Démarrer l'animation des stats quand elles sont visibles
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateStats();
                    statsObserver.unobserve(entry.target);
                }
            });
        });

        document.querySelector('.stats')?.addEventListener('load', () => {
            statsObserver.observe(document.querySelector('.stats'));
        });

        // Démarrer l'animation après le chargement
        window.addEventListener('load', () => {
            setTimeout(() => {
                if (document.querySelector('.stats')) {
                    statsObserver.observe(document.querySelector('.stats'));
                }
            }, 500);
        });

        // Smooth scroll pour la navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Effet parallax léger sur le hero
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.hero');
            if (hero) {
                hero.style.transform = `translateY(${scrolled * 0.3}px)`;
            }
        });
    </script>
</body>
</html>
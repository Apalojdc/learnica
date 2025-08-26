<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevTutos - Apprenez l'informatique facilement</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        
        /* Hero Section */
        .hero {
            padding: 120px 0 80px;
            text-align: center;
            color: white;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx="50%" cy="50%" r="50%"><stop offset="0%" style="stop-color:%23000000;stop-opacity:1"/><stop offset="100%" style="stop-color:%23000000;stop-opacity:1"/></radialGradient></defs><rect width="100%" height="100%" fill="url(%23a)"/></svg>') center/cover;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn-primary {
            background: white;
            color: #667eea;
            padding: 1rem 2rem;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(255, 255, 255, 0.3);
        }
        
        .btn-secondary:hover {
            background: white;
            color: #667eea;
            transform: translateY(-2px);
        }
        
        /* Main Content */
        .main-content {
            background: white;
            padding: 80px 0;
            margin-top: -40px;
            border-radius: 40px 40px 0 0;
            position: relative;
            z-index: 1;
        }
        
        .section {
            margin-bottom: 80px;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: #333;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 2px;
        }
        
        /* Featured Courses */
        .featured-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .course-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .course-image {
            height: 200px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            font-weight: bold;
        }
        
        .course-content {
            padding: 2rem;
        }
        
        .course-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #333;
        }
        
        .course-description {
            color: #666;
            margin-bottom: 1.5rem;
        }
        
        .course-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .course-level {
            background: #f0f9ff;
            color: #0369a1;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .course-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #fbbf24;
        }
        
        /* Categories */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .category-card {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .category-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            transition: transform 0.5s ease;
            transform: scale(0);
        }
        
        .category-card:hover::before {
            transform: scale(1);
        }
        
        .category-card:hover {
            transform: translateY(-5px);
        }
        
        .category-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        .category-title {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }
        
        .category-count {
            opacity: 0.8;
        }
        
        /* Stats Section */
        .stats {
            background: #f8fafc;
            padding: 60px 0;
            margin: 60px 0;
            border-radius: 20px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }
        
        .stat-item {
            padding: 1rem;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #666;
            font-weight: 500;
        }
        
       
        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .featured-grid,
            .categories-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
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
        
        .course-card,
        .category-card {
            animation: fadeInUp 0.6s ease forwards;
        }
        
        .course-card:nth-child(2) {
            animation-delay: 0.2s;
        }
        
        .course-card:nth-child(3) {
            animation-delay: 0.4s;
        }
    </style>
</head>
<body>
   <?php include(__DIR__.'/../navbar/NavBarIndex.php'); ?>
    <section class="hero">
        <div class="container">
            <h1>Maîtrisez l'informatique avec les meilleures tutoriels</h1>
            <p>Apprenez la programmation, le développement web, et bien plus encore avec nos cours pratiques et projets concrets.</p>
            <div class="hero-buttons">
                <a href="#cours" class="btn-primary">Explorer les cours</a>
                <a href="#about" class="btn-secondary">En savoir plus</a>
            </div>
        </div>
    </section>

    <main class="main-content">
        <div class="container">
            <!-- À la une -->
            <section class="section">
                <h2 class="section-title">À la Une</h2>
                <div class="featured-grid">
                    <div class="course-card">
                        <div class="course-image">JS</div>
                        <div class="course-content">
                            <div class="course-meta">
                                <span class="course-level">Débutant</span>
                                <div class="course-rating">
                                    <span>★★★★★</span>
                                    <span>4.9</span>
                                </div>
                            </div>
                            <h3 class="course-title">JavaScript Moderne - De zéro à héros</h3>
                            <p class="course-description">Apprenez JavaScript ES6+, les frameworks modernes et créez des applications web interactives.</p>
                        </div>
                    </div>
                    
                    <div class="course-card">
                        <div class="course-image">PY</div>
                        <div class="course-content">
                            <div class="course-meta">
                                <span class="course-level">Intermédiaire</span>
                                <div class="course-rating">
                                    <span>★★★★★</span>
                                    <span>4.8</span>
                                </div>
                            </div>
                            <h3 class="course-title">Python pour l'Intelligence Artificielle</h3>
                            <p class="course-description">Maîtrisez Python et ses bibliothèques pour l'IA, machine learning et data science.</p>
                        </div>
                    </div>
                    
                    <div class="course-card">
                        <div class="course-image">RE</div>
                        <div class="course-content">
                            <div class="course-meta">
                                <span class="course-level">Avancé</span>
                                <div class="course-rating">
                                    <span>★★★★★</span>
                                    <span>4.7</span>
                                </div>
                            </div>
                            <h3 class="course-title">React & Node.js - Applications Full Stack</h3>
                            <p class="course-description">Créez des applications web complètes avec React, Node.js et MongoDB.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Catégories -->
            <section class="section">
                <h2 class="section-title">Parcourir par Catégories</h2>
                <div class="categories-grid">
                    <div class="category-card">
                        <div class="category-icon">🌐</div>
                        <h3 class="category-title">Développement Web</h3>
                        <p class="category-count">45 cours disponibles</p>
                    </div>
                    
                    <div class="category-card">
                        <div class="category-icon">📱</div>
                        <h3 class="category-title">Développement Mobile</h3>
                        <p class="category-count">28 cours disponibles</p>
                    </div>
                    
                    <div class="category-card">
                        <div class="category-icon">🤖</div>
                        <h3 class="category-title">Intelligence Artificielle</h3>
                        <p class="category-count">32 cours disponibles</p>
                    </div>
                    
                    <div class="category-card">
                        <div class="category-icon">🔐</div>
                        <h3 class="category-title">Cybersécurité</h3>
                        <p class="category-count">19 cours disponibles</p>
                    </div>
                    
                    <div class="category-card">
                        <div class="category-icon">☁️</div>
                        <h3 class="category-title">Cloud Computing</h3>
                        <p class="category-count">23 cours disponibles</p>
                    </div>
                    
                    <div class="category-card">
                        <div class="category-icon">📊</div>
                        <h3 class="category-title">Data Science</h3>
                        <p class="category-count">36 cours disponibles</p>
                    </div>
                </div>
            </section>

            <!-- Statistiques -->
            <section class="stats">
                <div class="container">
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-number">10K+</div>
                            <div class="stat-label">Étudiants actifs</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">200+</div>
                            <div class="stat-label">Cours disponibles</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">50+</div>
                            <div class="stat-label">Instructeurs experts</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">98%</div>
                            <div class="stat-label">Taux de satisfaction</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Les Plus Populaires -->
            <section class="section">
                <h2 class="section-title">Les Plus Populaires</h2>
                <div class="featured-grid">
                    <div class="course-card">
                        <div class="course-image">HT</div>
                        <div class="course-content">
                            <div class="course-meta">
                                <span class="course-level">Débutant</span>
                                <div class="course-rating">
                                    <span>★★★★★</span>
                                    <span>4.9</span>
                                </div>
                            </div>
                            <h3 class="course-title">HTML5 & CSS3 - Créez votre premier site</h3>
                            <p class="course-description">Les fondamentaux du développement web avec HTML5 et CSS3 modernes.</p>
                        </div>
                    </div>
                    
                    <div class="course-card">
                        <div class="course-image">GI</div>
                        <div class="course-content">
                            <div class="course-meta">
                                <span class="course-level">Intermédiaire</span>
                                <div class="course-rating">
                                    <span>★★★★★</span>
                                    <span>4.8</span>
                                </div>
                            </div>
                            <h3 class="course-title">Git & GitHub - Gestion de versions</h3>
                            <p class="course-description">Maîtrisez Git et GitHub pour vos projets de développement.</p>
                        </div>
                    </div>
                    
                    <div class="course-card">
                        <div class="course-image">DB</div>
                        <div class="course-content">
                            <div class="course-meta">
                                <span class="course-level">Intermédiaire</span>
                                <div class="course-rating">
                                    <span>★★★★★</span>
                                    <span>4.7</span>
                                </div>
                            </div>
                            <h3 class="course-title">Bases de données avec SQL</h3>
                            <p class="course-description">Apprenez à concevoir et interroger des bases de données relationnelles.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
<?php include(__DIR__."/../navbar/footer.php"); ?>
    <script>
        // Smooth scrolling for navigation links
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

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.style.background = 'rgba(255, 255, 255, 0.98)';
                nav.style.boxShadow = '0 2px 30px rgba(0, 0, 0, 0.15)';
            } else {
                nav.style.background = 'rgba(255, 255, 255, 0.95)';
                nav.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
            }
        });

        // Course card interactions
        document.querySelectorAll('.course-card').forEach(card => {
            card.addEventListener('click', () => {
                const title = card.querySelector('.course-title').textContent;
                alert(`Vous avez cliqué sur: ${title}`);
            });
        });

        // Category card interactions
        document.querySelectorAll('.category-card').forEach(card => {
            card.addEventListener('click', () => {
                const title = card.querySelector('.category-title').textContent;
                alert(`Catégorie sélectionnée: ${title}`);
            });
        });

        // CTA button interactions
        document.querySelectorAll('.cta-button, .btn-primary').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                alert('Bienvenue sur DevTutos ! Inscription en cours...');
            });
        });

        // Animate stats on scroll
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statNumbers = entry.target.querySelectorAll('.stat-number');
                    statNumbers.forEach(stat => {
                        const finalValue = stat.textContent;
                        const numericValue = parseInt(finalValue.replace(/[^\d]/g, ''));
                        let current = 0;
                        const increment = numericValue / 50;
                        
                        const counter = setInterval(() => {
                            current += increment;
                            if (current >= numericValue) {
                                current = numericValue;
                                clearInterval(counter);
                            }
                            stat.textContent = Math.floor(current) + finalValue.replace(/[\d]/g, '');
                        }, 30);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        const statsSection = document.querySelector('.stats');
        if (statsSection) {
            observer.observe(statsSection);
        }
    </script>
</body>
</html>
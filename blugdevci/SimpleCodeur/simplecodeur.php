<!-- 
<!DOCTYPE html>
<html lang="fr">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Portfolio</title>
    <link rel="icon" href="simplecodeurlogo.ico" type="image/x-icon">
    <link rel="stylesheet" href="../style/simplecodeur.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head> --> 
<?php include('config.php');
    include (__DIR__. '/../header/homeheader.php');
?>

<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="#" class="logo"><img src="imagesite/simplecodeurlogo.jpg" width="80" alt=""><span class="blink">Portfolio</span></a>
                <ul class="nav-links">
                    <li><a href="#about">À propos</a></li>
                    <li><a href="#skills">Compétences</a></li>
                    <li><a href="#projects">Projets</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <button class="theme-toggle" id="theme-toggle">
                    <i class="fas fa-moon"></i>
                </button>
                <button class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </nav>
        </div>
    </header>

    <section class="hero" id="about">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Je suis <span class="typing-effect" id="typing-text"></span></h1>
                    <p class="subtitle">Je transforme vos idées en solutions digitales performantes et esthétiques.</p>
                    <p>Passionné par le développement web et mobile, je crée des applications modernes et intuitives qui répondent aux besoins spécifiques de mes clients. Mon expertise s'étend du front-end au back-end, avec une touche de design graphique.</p>
                    <div class="cta-buttons">
                        <a href="#projects" class="btn btn-primary">Voir mes projets <i class="fas fa-arrow-right"></i></a>
                        <a href="#contact" class="btn btn-secondary">Me contacter</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="imagesite/fullstack.jpg" width="500" height="500" alt="Développeur Full Stack">
                </div>
            </div>
        </div>
    </section>

    <section class="skills" id="skills">
        <div class="container">
            <h2 class="section-title">Mes <span class="blink">Compétences</span></h2>
            <div class="skills-container">
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 class="skill-title">Développement Front-End</h3>
                    <p class="skill-desc">HTML5, CSS3, JavaScript, Bootstrap pour des interfaces réactives et modernes</p>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="fas fa-server"></i>
                    </div>
                    <h3 class="skill-title">Développement Back-End</h3>
                    <p class="skill-desc">PHP, Laravel, SQL, gestion de bases de données et API REST</p>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="skill-title">Développement Mobile</h3>
                    <p class="skill-desc">WinDev Mobile, applications cross-platform et responsive design</p>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3 class="skill-title">Design Graphique</h3>
                    <p class="skill-desc">Adobe Photoshop, Illustrator, Canva pour des designs professionnels</p>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3 class="skill-title">AGL</h3>
                    <p class="skill-desc">WinDev, WebDev et WinDev Mobile pour un développement rapide et efficace</p>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <h3 class="skill-title">Bases de données</h3>
                    <p class="skill-desc">SQL, conception et optimisation de bases de données relationnelles</p>
                </div>
            </div>
        </div>
    </section>

    <section class="projects" id="projects">
        <div class="container">
            <h2 class="section-title">Mes <span class="blink">Projets</span></h2>
            <div class="project-grid">
                <div class="project-card">
                    <img src="/api/placeholder/400/200" alt="Projet 1" class="project-img">
                    <div class="project-content">
                        <h3 class="project-title">Application de gestion</h3>
                        <p>Un système de gestion complet développé avec WinDev pour une entreprise de logistique.</p>
                        <div class="project-tech">
                            <span class="tech-tag">WinDev</span>
                            <span class="tech-tag">SQL</span>
                            <span class="tech-tag">WLangage</span>
                        </div>
                        <a href="#" class="btn btn-primary">Voir le projet</a>
                    </div>
                </div>
                <div class="project-card">
                    <img src="/api/placeholder/400/200" alt="Projet 2" class="project-img">
                    <div class="project-content">
                        <h3 class="project-title">E-commerce responsive</h3>
                        <p>Une boutique en ligne moderne avec un design épuré et des performances optimisées.</p>
                        <div class="project-tech">
                            <span class="tech-tag">Laravel</span>
                            <span class="tech-tag">PHP</span>
                            <span class="tech-tag">JavaScript</span>
                        </div>
                        <a href="#" class="btn btn-primary">Voir le projet</a>
                    </div>
                </div>
                <div class="project-card">
                    <img src="/api/placeholder/400/200" alt="Projet 3" class="project-img">
                    <div class="project-content">
                        <h3 class="project-title">Application mobile</h3>
                        <p>Une application de suivi d'activité physique avec synchronisation cloud.</p>
                        <div class="project-tech">
                            <span class="tech-tag">WinDev Mobile</span>
                            <span class="tech-tag">SQL</span>
                        </div>
                        <a href="#" class="btn btn-primary">Voir le projet</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="projects" id="projects">
        <div class="container">
            <h2 class="section-title">Mes <span class="blink">Projets en cours</span></h2>
            <div class="project-grid">
                <div class="project-card">
                    <img src="/api/placeholder/400/200" alt="Projet 1" class="project-img">
                    <div class="project-content">
                        <h3 class="project-title">Application de cours en ligne avec flutter</h3>
                        <p>Un système de gestion complet développé avec WinDev pour une entreprise de logistique.</p>
                        <div class="project-tech">
                            <span class="tech-tag">WinDev</span>
                            <span class="tech-tag">SQL</span>
                            <span class="tech-tag">WLangage</span>
                        </div>
                        <a href="#" class="btn btn-primary">Voir le projet</a>
                    </div>
                </div>
                <div class="project-card">
                    <img src="/api/placeholder/400/200" alt="Projet 2" class="project-img">
                    <div class="project-content">
                        <h3 class="project-title">E-commerce responsive</h3>
                        <p>Une boutique en ligne moderne avec un design épuré et des performances optimisées.</p>
                        <div class="project-tech">
                            <span class="tech-tag">Laravel</span>
                            <span class="tech-tag">PHP</span>
                            <span class="tech-tag">JavaScript</span>
                        </div>
                        <a href="#" class="btn btn-primary">Voir le projet</a>
                    </div>
                </div>
                <div class="project-card">
                    <img src="/api/placeholder/400/200" alt="Projet 3" class="project-img">
                    <div class="project-content">
                        <h3 class="project-title">Application mobile</h3>
                        <p>Une application de suivi d'activité physique avec synchronisation cloud.</p>
                        <div class="project-tech">
                            <span class="tech-tag">WinDev Mobile</span>
                            <span class="tech-tag">SQL</span>
                        </div>
                        <a href="#" class="btn btn-primary">Voir le projet</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <div class="container">
            <h2 class="section-title">Me <span class="blink">Contacter</span></h2>
            <div class="contact-container">
                <div class="contact-info">
                    <h3>Parlons de votre projet</h3>
                    <p>Vous avez un projet en tête ou une idée à développer ? N'hésitez pas à me contacter pour discuter de la façon dont je peux vous aider à concrétiser votre vision.</p>
                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:simplecodeur5@gmail.com">simplecodeur5@gmail.com</a></p>
                    <p><i class="fas fa-phone"></i>Téléphones: <a href="tel:0506938224">(+225) 0506938224</a>/<a href="tel:0545796982"> (+225) 0545796982</a></p>
                    <p><i class="fas fa-map-marker-alt"></i> Adresse: Marcory, Abidjan Cote d'Ivoire</p>
                    <p><a href="../etty/index.html" class="btn btn-primary">Partenaire d'affaire</a></p>
                </div>
                <form class="contact-form" action="coulapalo@gmail.com">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Sujet</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer <i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>© 2025 - Portfolio Développeur Full Stack. Tous droits réservés.</p>
            <div class="social-links">
                <a href="#" class="social-icon"><i class="fab fa-github"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-behance"></i></a>
            </div>
        </div>
    </footer>

    <script>
        // Typing effect
        class TypeWriter {
            constructor(txtElement, words, wait = 3000) {
                this.txtElement = txtElement;
                this.words = words;
                this.txt = '';
                this.wordIndex = 0;
                this.wait = parseInt(wait, 10);
                this.type();
                this.isDeleting = false;
            }
            
            type() {
                // Current index of word
                const current = this.wordIndex % this.words.length;
                // Get full text of current word
                const fullTxt = this.words[current];
                
                // Check if deleting
                if(this.isDeleting) {
                    // Remove char
                    this.txt = fullTxt.substring(0, this.txt.length - 1);
                } else {
                    // Add char
                    this.txt = fullTxt.substring(0, this.txt.length + 1);
                }
                
                // Insert txt into element
                this.txtElement.innerHTML = this.txt;
                
                // Initial Type Speed
                let typeSpeed = 100;
                
                if(this.isDeleting) {
                    typeSpeed /= 2;
                }
                
                // If word is complete
                if(!this.isDeleting && this.txt === fullTxt) {
                    // Make pause at end
                    typeSpeed = this.wait;
                    // Set delete to true
                    this.isDeleting = true;
                } else if(this.isDeleting && this.txt === '') {
                    this.isDeleting = false;
                    // Move to next word
                    this.wordIndex++;
                    // Pause before start typing
                    typeSpeed = 500;
                }
                
                setTimeout(() => this.type(), typeSpeed);
            }
        }
        
        // Init on DOM Load
        document.addEventListener('DOMContentLoaded', init);
        
        // Init App
        function init() {
            const txtElement = document.getElementById('typing-text');
            const words = ['COULIBALY Apaloh','Développeur Full Stack', 'Graphique Designer', 'Créateur d\'Applications'];
            const wait = 2000;
            // Init TypeWriter
            new TypeWriter(txtElement, words, wait);
        }

        // Theme toggle functionality
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;
        const icon = themeToggle.querySelector('i');

        // Check for saved theme preference or use system preference
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark' || (!savedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            body.classList.add('dark-theme');
            icon.classList.replace('fa-moon', 'fa-sun');
        }

        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-theme');
            
            if (body.classList.contains('dark-theme')) {
                icon.classList.replace('fa-moon', 'fa-sun');
                localStorage.setItem('theme', 'dark');
            } else {
                icon.classList.replace('fa-sun', 'fa-moon');
                localStorage.setItem('theme', 'light');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80, // Adjust for header height
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add scroll class to header for background change
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            header.classList.toggle('scrolled', window.scrollY > 50);
        });

        // Mobile menu functionality
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navLinks = document.querySelector('.nav-links');
        
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                navLinks.classList.toggle('active');
            });
        }

        // Form submission animation
        const contactForm = document.querySelector('.contact-form');
        if (contactForm) {
            contactForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const submitBtn = contactForm.querySelector('button[type="submit"]');
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi...';
                
                // Simulate form submission
                setTimeout(() => {
                    submitBtn.innerHTML = '<i class="fas fa-check"></i> Envoyé!';
                    contactForm.reset();
                    
                    setTimeout(() => {
                        submitBtn.innerHTML = 'Envoyer <i class="fas fa-paper-plane"></i>';
                    }, 2000);
                }, 1500);
            });
        }
    </script>
</body>
</html>
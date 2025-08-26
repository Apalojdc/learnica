<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mouvement CVAV - Paroisse Sainte Marie Mère de Dieu d'Aliodan</title>
    <style>
        :root {
            /* Thème clair (par défaut) */
            --primary-color: #3b5998;
            --secondary-color: #f8f9fa;
            --accent-color: #e74c3c;
            --text-color: #333;
            --light-text: #fff;
            --bg-color: #f5f5f5;
            --card-bg: #fff;
            --border-color: #ddd;
            --prayer-bg: #f8f9fa;
            --border-radius: 5px;
            --box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        /* Thème sombre */
        [data-theme="dark"] {
            --primary-color: #4267B2;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
            --text-color: #f0f0f0;
            --light-text: #f0f0f0;
            --bg-color: #1a1a1a;
            --card-bg: #2d2d2d;
            --border-color: #444;
            --prayer-bg: #2c3e50;
            --box-shadow: 0 2px 5px rgba(0,0,0,0.3);
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--bg-color);
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        /* Header styles */
        header {
            background-color: var(--primary-color);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--box-shadow);
        }
        
        .logo {
            display: flex;
            align-items: center;
            color: var(--light-text);
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
        }
        
        .logo img {
            height: 40px;
            margin-right: 10px;
        }
        
        .navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .navigation-contenue {
            display: flex;
            list-style: none;
            align-items: center;
        }
        
        .navigation-contenue li {
            margin-left: 20px;
        }
        
        .navigation-contenue a {
            color: var(--light-text);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            padding: 8px 12px;
            border-radius: var(--border-radius);
        }
        
        .navigation-contenue a:hover {
            background-color: rgba(255,255,255,0.1);
        }
        
        .btn-login {
            background-color: var(--light-text);
            color: var(--primary-color) !important;
            padding: 8px 15px;
            border-radius: var(--border-radius);
            transition: all 0.3s;
        }
        
        .btn-login:hover {
            background-color: rgba(255,255,255,0.9);
            transform: translateY(-2px);
        }
        
        /* Theme toggle */
        .theme-toggle {
            display: inline-flex;
            align-items: center;
            cursor: pointer;
            margin-left: 20px;
            padding: 5px 10px;
            border-radius: var(--border-radius);
            background-color: rgba(255,255,255,0.1);
            color: var(--light-text);
        }
        
        .theme-toggle i {
            margin-right: 5px;
            font-size: 1.2rem;
        }
        
        /* Hero section */
        .hero {
            background: linear-gradient(rgba(59, 89, 152, 0.8), rgba(59, 89, 152, 0.8)), url('/api/placeholder/1200/800') no-repeat center center/cover;
            color: var(--light-text);
            text-align: center;
            padding: 4rem 0;
        }
        
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .hero p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
        }
        
        /* Form styles */
        .form-section {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 2rem;
            margin: 2rem 0;
        }
        
        .form-section h2 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            text-align: center;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
        }
        
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: var(--text-color);
        }
        
        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            font-size: 1rem;
            background-color: var(--card-bg);
            color: var(--text-color);
        }
        
        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 5px rgba(59, 89, 152, 0.5);
        }
        
        button[type="submit"] {
            background-color: var(--primary-color);
            color: var(--light-text);
            border: none;
            padding: 12px 20px;
            font-size: 1rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: background-color 0.3s;
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 1rem auto 0;
        }
        
        button[type="submit"]:hover {
            background-color: #2d4373;
        }
        
        /* Object selection */
        .selectionObjets {
            border: 1px solid var(--border-color);
            padding: 15px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            background-color: var(--card-bg);
        }
        
        .selectionObjets h3 {
            margin-bottom: 10px;
            color: var(--primary-color);
        }
        
        .object-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .object-item input[type="checkbox"] {
            margin-right: 10px;
            accent-color: var(--primary-color);
        }
        
        .object-item input[type="number"] {
            width: 80px;
            margin-left: 10px;
            margin-bottom: 0;
        }
        
        /* Content sections */
        .content-section {
            background-color: var(--card-bg);
            padding: 2rem;
            margin: 2rem 0;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }
        
        .content-section h2 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
        }
        
        .content-section h3, .content-section h4 {
            color: var(--primary-color);
            margin: 1.5rem 0 1rem;
        }
        
        .content-section p {
            margin-bottom: 1rem;
            color: var(--text-color);
        }
        
        .content-section ul, 
        .content-section ol {
            margin-left: 2rem;
            margin-bottom: 1rem;
            color: var(--text-color);
        }
        
        .content-section li {
            margin-bottom: 0.5rem;
        }
        
        /* Grade menu */
        .menugrade {
            margin: 2rem 0;
        }
        
        .gradecontaint {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            gap: 10px;
        }
        
        .gradecvcv {
            background-color: var(--primary-color);
            color: var(--light-text);
            padding: 10px 15px;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .gradecvcv:hover {
            background-color: #2d4373;
            transform: translateY(-2px);
        }
        
        .gradecvcv.active {
            background-color: var(--accent-color);
        }
        
        /* Prayer box */
        .prayer-box {
            background-color: var(--prayer-bg);
            border-left: 4px solid var(--accent-color);
            padding: 20px;
            font-style: italic;
            margin: 1.5rem 0;
            color: var(--text-color);
        }
        
        /* Principles numbered list */
        .principles-list {
            counter-reset: principles;
        }
        
        .principles-list li {
            margin-bottom: 10px;
            position: relative;
            padding-left: 40px;
        }
        
        .principles-list li::before {
            counter-increment: principles;
            content: counter(principles);
            position: absolute;
            left: 0;
            top: 0;
            background-color: var(--primary-color);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        /* Footer */
        footer {
            background-color: var(--primary-color);
            color: var(--light-text);
            padding: 2rem 0;
            text-align: center;
            margin-top: 3rem;
        }
        
        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        
        .footer-section {
            flex: 1;
            min-width: 250px;
            margin-bottom: 1.5rem;
            padding: 0 15px;
        }
        
        .footer-section h3 {
            margin-bottom: 1rem;
            border-bottom: 2px solid rgba(255,255,255,0.2);
            padding-bottom: 10px;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 8px;
        }
        
        .footer-links a {
            color: var(--light-text);
            text-decoration: none;
        }
        
        .footer-links a:hover {
            text-decoration: underline;
        }
        
        .copyright {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(255,255,255,0.2);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .navigation-contenue {
                flex-direction: column;
                position: absolute;
                top: 70px;
                left: 0;
                background-color: var(--primary-color);
                width: 100%;
                padding: 1rem;
                display: none;
            }
            
            .navigation-contenue.show {
                display: flex;
            }
            
            .navigation-contenue li {
                margin: 10px 0;
            }
            
            .menu-toggle {
                display: block;
                font-size: 1.5rem;
                color: var(--light-text);
                cursor: pointer;
            }
            
            .gradecontaint {
                flex-direction: column;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
        }
    </style>
    <!-- Ajout d'une petite bibliothèque d'icônes pour le bouton de thème -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="container">
            <nav class="navigation">
                <a href="#" class="logo">
                    <span>CVAV Aliodan</span>
                </a>
                <ul class="navigation-contenue" id="navigationMenu">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Notre mouvement</a></li>
                    <li><a href="#">Activités</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#" class="btn-login">S'inscrire / Se connecter</a></li>
                    <li class="theme-toggle" id="themeToggle">
                        <i class="fas fa-sun" id="themeIcon"></i>
                        <span id="themeText">Thème</span>
                    </li>
                </ul>
                <div class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h1>Mouvement CVAV - Paroisse Sainte Marie Mère de Dieu d'Aliodan</h1>
            <p>"À Cœurs Vaillants rien d'impossible ! Joie – Vaillance – Charité."</p>
        </div>
    </section>

    <div class="container">
        <section class="form-section inscription">
            <h2>Formulaire d'inscription</h2>
            <form action="#" method="post">
                <label for="nomPrenom">Nom et Prénom :</label>
                <input type="text" id="nomPrenom" name="nomPrenom" placeholder="Entrez votre nom et prénom">

                <label for="grade">Grade :</label>
                <input type="text" id="grade" name="grade" placeholder="Entrez votre grade">

                <label for="paroisse">Paroisse :</label>
                <input type="text" id="paroisse" name="paroisse" placeholder="Entrez votre paroisse">

                <label for="anneePastorale">Année pastorale :</label>
                <input type="text" id="anneePastorale" name="anneePastorale" placeholder="Entrez l'année pastorale">

                <label for="vicariat">Vicariat/Doyenné/Secteur :</label>
                <input type="text" id="vicariat" name="vicariat" placeholder="Entrez le vicariat, le doyen ou le secteur">

                <label for="ville">Ville :</label>
                <input type="text" id="ville" name="ville" placeholder="Entrez la ville">

                <label for="quartier">Quartier :</label>
                <input type="text" id="quartier" name="quartier" placeholder="Entrez le quartier">

                <button type="submit">Envoyer</button>
            </form>
        </section>

        <section class="form-section ParticipationActivite">
            <h2>Inscription aux activités</h2>
            <form action="#" method="post">
                <label for="nomPrenomActivite">Nom et Prénom :</label>
                <input type="text" id="nomPrenomActivite" name="nomPrenom" placeholder="Entrez votre nom et prénom">

                <label for="gradeActivite">Grade :</label>
                <input type="text" id="gradeActivite" name="grade" placeholder="Entrez votre grade">

                <label for="anneeNaissance">Date de naissance :</label>
                <input type="date" id="anneeNaissance" name="anneeNaissance">

                <label for="objet">Nombre d'objets :</label>
                <input type="number" id="objet" name="objet" placeholder="Nombre d'objets">

                <div class="selectionObjets">
                    <h3>Sélectionnez vos objets</h3>
                    <div class="object-item">
                        <input type="checkbox" id="seau" name="seau">
                        <label for="seau">Seau</label>
                        <input type="number" name="nbSeau" placeholder="Nombre">
                    </div>
                    
                    <div class="object-item">
                        <input type="checkbox" id="assiette" name="assiette">
                        <label for="assiette">Assiette</label>
                        <input type="number" name="nbAssiette" placeholder="Nombre">
                    </div>
                    
                    <div class="object-item">
                        <input type="checkbox" id="cuilleres" name="cuilleres">
                        <label for="cuilleres">Cuillères</label>
                        <input type="number" name="nbCuilleres" placeholder="Nombre">
                    </div>
                    
                    <div class="object-item">
                        <input type="checkbox" id="natte" name="natte">
                        <label for="natte">Natte</label>
                        <input type="number" name="nbNatte" placeholder="Nombre">
                    </div>
                    
                    <div class="object-item">
                        <input type="checkbox" id="drap" name="drap">
                        <label for="drap">Drap</label>
                        <input type="number" name="nbDrap" placeholder="Nombre">
                    </div>
                    
                    <div class="object-item">
                        <input type="checkbox" id="eponge" name="eponge">
                        <label for="eponge">Éponge</label>
                        <input type="number" name="nbEponge" placeholder="Nombre">
                    </div>
                </div>

                <button type="submit">Envoyer</button>
            </form>
        </section>

        <section class="content-section">
            <h2>Présentation de la paroisse Sainte Marie Mère de Dieu d'Aliodan</h2>
            <h3>Bureau Paroissial</h3>
            
            <div class="menugrade">
                <ul class="gradecontaint">
                    <li class="gradecvcv active" data-tab="benjamins">Liste des Benjamins</li>
                    <li class="gradecvcv" data-tab="cadets">Liste des Cadets</li>
                    <li class="gradecvcv" data-tab="aines">Listes des Aînés</li>
                    <li class="gradecvcv" data-tab="meneurs">Liste des Meneurs</li>
                    <li class="gradecvcv" data-tab="encadreurs">Liste des Encadreurs</li>
                </ul>
            </div>
            
            <div id="benjamins">
                <h4>Les Benjamins</h4>
                <!-- Contenu à ajouter -->
            </div>
            
            <div id="cadets">
                <h4>Les Cadets</h4>
                <!-- Contenu à ajouter -->
            </div>
            
            <div id="aines">
                <h4>Les Aînés</h4>
                <!-- Contenu à ajouter -->
            </div>
            
            <div id="meneurs">
                <h4>Les Meneurs</h4>
                <!-- Contenu à ajouter -->
            </div>
            
            <div id="encadreurs">
                <h4>Les Encadreurs</h4>
                <!-- Contenu à ajouter -->
            </div>
        </section>

        <section class="content-section activite">
            <h2>Nos activités</h2>
            <!-- Contenu à ajouter -->
        </section>

        <section class="content-section">
            <h2>Bref Historique du Mouvement CVAV</h2>
            <p>
                Cœurs Vaillants et Âmes vaillantes en abrégé CVAV est un mouvement d'action Catholique de l'enfance. Il a été fondé en France plus précisément à Paris en 1939 par M. l'Abbé Gaston COURTOIS connu sous le nom de JACQUE CŒUR aidé du Révérend Père JEAN PIHAN. Ce mouvement est apparu en Côte d'Ivoire en 1950 grâce au Révérend Père Robert KIMOU à la paroisse Sainte Jeanne d'Arc de Treichville. Le mouvement de Côte d'Ivoire fut reconnu officiellement par « Le centre international du mouvement CVAV à Paris » en mai 1952.
            </p>
            <p>
                Le but principal est de suivre une formation éducative et spirituelle pour amener les enfants à agir plus chrétiennement dans leur milieu de vie.
            </p>
        </section>

        <section class="content-section">
            <h2>Le But du Mouvement CVAV</h2>
            <p>
                Aider les enfants à agir plus chrétiennement dans leurs milieux de vie (école, quartier, famille, église).
            </p>
        </section>

        <section class="content-section">
            <h2>Les Coutumes du Mouvement CVAV</h2>
            <ul>
                <li><strong>Notre loi :</strong> C'est de nous aimer les uns les autres, comme Jésus nous a aimés.</li>
                <li><strong>Notre signe :</strong> C'est le signe de la croix : au nom du Père, du Fils et du Saint Esprit.</li>
                <li><strong>Notre salut :</strong> Tous Unis - Tous Frères.</li>
                <li><strong>Notre devise :</strong> À Cœurs Vaillants rien d'impossible ! Joie – Vaillance – Charité.</li>
            </ul>
            <p>
                <strong>Qui sommes-nous ?</strong> … Des enfants de Dieu !<br>
                <strong>Que faisons-nous ensemble ?</strong> … Nous bâtissons un monde où l'on s'aime !<br>
                <strong>Les choses dures ?</strong> … Ça nous plaît !<br>
                <strong>Le sourire ?</strong> … Toujours !<br>
                <strong>Qui est notre chef ?</strong> … Le CHRIST !<br>
                <strong>Vive le CHRIST ?</strong> … Roi !
            </p>
        </section>

        <section class="content-section">
            <h2>Prière des CVAV</h2>
            <div class="prayer-box">
                <p>
                    Seigneur Jésus, qui aime tant les CVAV<br>
                    Bénis tous nos frères et sœurs d'Afrique et du monde entier.<br>
                    Donne-nous la grâce d'avoir toujours le sourire<br>
                    Et de n'avoir jamais peur de faire un sacrifice.<br>
                    Apprends-nous à faire de notre vie quelque chose de beau avec les autres.<br>
                    Donne-nous le courage de ne jamais rien te refuser<br>
                    Et de faire ta volonté.<br>
                    Aide-nous à faire le bonheur de tous ceux qui nous entourent<br>
                    Et à passer notre vie à aimer les autres.<br>
                    Sainte Vierge Marie, douce Maman des CVAV<br>
                    Garde nos cœurs bien purs et fidèles à Jésus.<br>
                    Amen.
                </p>
            </div>
        </section>

        <section class="content-section">
            <h2>Les Principes du Mouvement CVAV</h2>
            <ol class="principles-list">
                <li>Le CVAV a toujours le sourire.</li>
                <li>Le CVAV est propre et soigneux.</li>
                <li>Le CVAV obéit vite et bien.</li>
                <li>Le CVAV est aimable et poli.</li>
                <li>Le CVAV est ardent au travail comme au jeu.</li>
                <li>Le CVAV met sa joie à rendre service.</li>
                <li>Le CVAV n'a pas peur du sacrifice.</li>
                <li>Le CVAV a le regard franc et le cœur pur.</li>
                <li>Le CVAV fait bien tout ce qu'il fait.</li>
                <li>Le CVAV agit en chrétien partout et toujours.</li>
            </ol>
        </section>
    </div>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Contact</h3>
                    <p>Paroisse Sainte Marie Mère de Dieu d'Aliodan</p>
                    <p>Email: contact@cvav-aliodan.org</p>
                    <p>Téléphone: +XX XX XX XX XX</p>
                </div>
                
                <div class="footer-section">
                    <h3>Liens Rapides</h3>
                    <ul class="footer-links">
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Notre mouvement</a></li>
                        <li><a href="#">Activités</a></li>
                        <li><a href="#">S'inscrire</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Notre devise</h3>
                    <p>"À Cœurs Vaillants rien d'impossible !"</p>
                    <p>Joie – Vaillance – Charité</p>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2025 - Mouvement CVAV Paroisse Sainte Marie Mère de Dieu d'Aliodan</p>
            </div>
        </div>
    </footer>

    <script>
    // Gestion du thème sombre/clair
    document.addEventListener('DOMContentLoaded', function() {
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        const themeText = document.getElementById('themeText');
        const body = document.body;

        // Vérifier si l'utilisateur a déjà sélectionné un thème
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            body.setAttribute('data-theme', savedTheme);
            updateThemeUI(savedTheme);
        }

        themeToggle.addEventListener('click', function() {
            // Alterner le thème actuel
            const currentTheme = body.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeUI(newTheme);
        });

        function updateThemeUI(theme) {
            if (theme === 'dark') {
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
                themeText.textContent = 'Clair';
            } else {
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
                themeText.textContent = 'Sombre';
            }
        }

        // Gestion du menu mobile
        const menuToggle = document.getElementById('menuToggle');
        const navigationMenu = document.getElementById('navigationMenu');

        if (menuToggle) {
            menuToggle.addEventListener('click', function() {
                navigationMenu.classList.toggle('show');
            });
        }

        // Gestion des onglets pour les grades
        const gradeTabs = document.querySelectorAll('.gradecvcv');
        const gradeContents = document.querySelectorAll('#benjamins, #cadets, #aines, #meneurs, #encadreurs');

        // Cacher tous les contenus sauf le premier
        gradeContents.forEach((content, index) => {
            content.style.display = index === 0 ? 'block' : 'none';
        });

        // Ajouter les événements de clic sur les onglets
        gradeTabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                // Cacher tous les contenus
                gradeContents.forEach(content => {
                    content.style.display = 'none';
                });

                // Afficher le contenu correspondant à l'onglet cliqué
                gradeContents[index].style.display = 'block';

                // Gérer l’état actif (facultatif si tu veux styliser l’onglet actif)
                gradeTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
            });
        });
    });
</script>

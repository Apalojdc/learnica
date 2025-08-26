<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechBit - Cours de Développement Front-End</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
            color: white;
            line-height: 1.6;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo::before {
            content: "💻";
            font-size: 1.5rem;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: #00aaff;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: #00aaff;
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        /* Mobile Menu */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
            transition: all 0.3s ease;
        }

        .mobile-menu-toggle:hover {
            color: #00aaff;
            transform: scale(1.1);
        }

        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(20px);
            z-index: 2000;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: right 0.3s ease;
        }

        .mobile-menu.active {
            right: 0;
        }

        .mobile-menu-close {
            position: absolute;
            top: 2rem;
            right: 2rem;
            background: none;
            border: none;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .mobile-menu-close:hover {
            color: #00aaff;
            transform: rotate(90deg);
        }

        .mobile-nav-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            text-align: center;
        }

        .mobile-nav-links a {
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 1rem 2rem;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
        }

        .mobile-nav-links a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 170, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .mobile-nav-links a:hover::before {
            left: 100%;
        }

        .mobile-nav-links a:hover {
            color: #00aaff;
            transform: scale(1.1);
        }

        /* Hero Section */
        .hero {
            padding: 140px 0 80px;
            text-align: center;
            position: relative;
            background: linear-gradient(45deg, rgba(0, 170, 255, 0.1), rgba(255, 215, 0, 0.1));
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.05"><path d="M0 0v100h1000V0c-200 20-400 40-600 20S200-20 0 0z"/></svg>') repeat-x;
            animation: wave 8s ease-in-out infinite;
        }

        @keyframes wave {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(-30px); }
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #fff, #00aaff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: glow 3s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 20px rgba(0, 170, 255, 0.3); }
            to { text-shadow: 0 0 40px rgba(0, 170, 255, 0.6); }
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Table of Contents */
        .toc {
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 1.5rem;
            margin: 2rem 0;
        }

        .toc h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #00aaff;
            margin-bottom: 1rem;
        }

        .toc ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .toc a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .toc a:hover {
            color: #00aaff;
            transform: translateX(5px);
        }

        /* Course Sections */
        .course-section {
            padding: 80px 0;
            background: rgba(0, 0, 0, 0.2);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: white;
            text-align: center;
        }

        .subsection {
            margin-bottom: 3rem;
        }

        .subsection h3 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #00aaff;
            margin-bottom: 1rem;
        }

        .subsection p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1rem;
        }

        pre {
            background: #1e1e1e;
            color: #f8f8f2;
            padding: 1rem;
            border-radius: 10px;
            overflow-x: auto;
            font-family: 'Consolas', monospace;
            margin: 1rem 0;
        }

        code {
            font-size: 0.9rem;
        }

        .share-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .share-button {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            text-decoration: none;
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }

        .share-button:hover {
            background: #00aaff;
            transform: scale(1.1);
        }

        .resources {
            margin-top: 2rem;
        }

        .resources h4 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #00aaff;
            margin-bottom: 0.5rem;
        }

        .resources ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .resources a {
            color: #00aaff;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .resources a:hover {
            text-decoration: underline;
        }

        /* Footer
        footer {
            background: rgba(0, 0, 0, 0.5);
            padding: 3rem 0 2rem;
            margin-top: 4rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            color: #00aaff;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .footer-section p,
        .footer-section a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            line-height: 1.6;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #00aaff;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.6);
        } */

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .subsection h3 {
                font-size: 1.5rem;
            }

            pre {
                font-size: 0.8rem;
            }
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1s ease-in forwards;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        .slide-up {
            transform: translateY(30px);
            opacity: 0;
            animation: slideUp 0.8s ease-out forwards;
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="container">
            <a href="index.html" class="logo">TechBit</a>
            <ul class="nav-links">
                <li><a href="index.html#accueil">Accueil</a></li>
                <li><a href="index.html#articles">Articles</a></li>
                <li><a href="tutorials.html">Tutoriels</a></li>
                <li><a href="index.html#categories">Catégories</a></li>
                <li><a href="index.html#contact">Contact</a></li>
            </ul>
            <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">☰</button>
        </nav>
        
        <div class="mobile-menu" id="mobileMenu">
            <button class="mobile-menu-close" onclick="closeMobileMenu()">×</button>
            <ul class="mobile-nav-links">
                <li><a href="index.html#accueil" onclick="closeMobileMenu()">Accueil</a></li>
                <li><a href="index.html#articles" onclick="closeMobileMenu()">Articles</a></li>
                <li><a href="tutorials.html" onclick="closeMobileMenu()">Tutoriels</a></li>
                <li><a href="index.html#categories" onclick="closeMobileMenu()">Catégories</a></li>
                <li><a href="index.html#contact" onclick="closeMobileMenu()">Contact</a></li>
            </ul>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h1 class="fade-in">Cours Complet de Développement Front-End</h1>
            <p class="fade-in">Découvrez ce qu'est le développement front-end et maîtrisez les bases pour créer des interfaces web modernes et interactives.</p>
        </div>
    </section>

    <section class="toc">
        <div class="container">
            <h2 class="fade-in">Table des Matières</h2>
            <ul class="fade-in">
                <li><a href="#introduction">1. Introduction : Qu'est-ce que le Développement Front-End ?</a></li>
                <li><a href="#html">2. HTML : Structure de Base</a></li>
                <li><a href="#css">3. CSS : Stylisation et Mise en Page</a></li>
                <li><a href="#javascript">4. JavaScript : Interactivité</a></li>
                <li><a href="#react">5. React : Construire des Interfaces Modernes</a></li>
                <li><a href="#tools">6. Outils et Bonnes Pratiques</a></li>
                <li><a href="#conclusion">7. Conclusion et Ressources</a></li>
            </ul>
        </div>
    </section>

    <section class="course-section">
        <div class="container">
            <div class="subsection" id="introduction">
                <h2 class="section-title slide-up">Qu'est-ce que le Développement Front-End ?</h2>
                <h3 class="slide-up">Définition et rôle</h3>
                <p class="slide-up">
                    Le développement front-end est l'art et la science de créer la partie visible et interactive d'un site web ou d'une application web, c'est-à-dire tout ce que l'utilisateur voit et utilise directement dans son navigateur. Contrairement au développement back-end, qui gère les serveurs, bases de données et logique métier, le front-end se concentre sur l'<strong>interface utilisateur (UI)</strong> et l'<strong>expérience utilisateur (UX)</strong>.
                </p>
                <p class="slide-up">
                    Les développeurs front-end sont responsables de transformer des maquettes de design (souvent créées dans des outils comme Figma ou Adobe XD) en pages web fonctionnelles. Cela inclut la création de layouts esthétiques, la gestion des interactions utilisateur (comme les clics ou les formulaires), et l'optimisation pour différents appareils (responsive design).
                </p>
                <h3 class="slide-up">Technologies principales</h3>
                <p class="slide-up">
                    Le développement front-end repose sur trois piliers technologiques :
                </p>
                <ul class="slide-up">
                    <li><strong>HTML</strong> : Structure le contenu (titres, paragraphes, images, etc.).</li>
                    <li><strong>CSS</strong> : Définit le style visuel (couleurs, polices, mises en page).</li>
                    <li><strong>JavaScript</strong> : Ajoute de l'interactivité (animations, formulaires dynamiques, appels API).</li>
                </ul>
                <p class="slide-up">
                    En plus de ces bases, les développeurs front-end utilisent souvent des frameworks comme <strong>React</strong>, <strong>Vue.js</strong>, ou <strong>Angular</strong> pour créer des interfaces complexes plus rapidement, ainsi que des outils comme <strong>Git</strong> pour le contrôle de version et <strong>Webpack</strong> pour bundler le code.
                </p>
                <h3 class="slide-up">Pourquoi le front-end est-il important ?</h3>
                <p class="slide-up">
                    Le front-end est la première impression qu'un utilisateur a d'un site web. Une interface bien conçue peut :
                    - Améliorer l'<strong>engagement</strong> des utilisateurs grâce à une navigation intuitive.
                    - Assurer l'<strong>accessibilité</strong> pour les personnes handicapées (ex. : balises sémantiques, attributs ARIA).
                    - Optimiser les <strong>performances</strong> pour un chargement rapide, même sur mobile.
                    - Contribuer au <strong>SEO</strong> (référencement) en utilisant une structure HTML claire.
                </p>
                <p class="slide-up">
                    Exemple : Un site e-commerce avec un front-end mal conçu (lents chargements, navigation confuse) perdra des clients, même si le back-end est robuste.
                </p>
                <h3 class="slide-up">Rôle du développeur front-end</h3>
                <p class="slide-up">
                    Un développeur front-end doit :
                    - Collaborer avec des designers pour traduire des maquettes en code.
                    - Travailler avec des développeurs back-end pour intégrer des API.
                    - Tester la compatibilité sur différents navigateurs et appareils.
                    - Maintenir un code propre, performant, et accessible.
                </p>
                <p class="slide-up">
                    Ce cours vous guidera à travers les étapes pour maîtriser ces compétences, avec des exemples pratiques et des exercices pour consolider vos connaissances.
                </p>
                <div class="share-buttons slide-up">
                    <a href="#" class="share-button">Twitter</a>
                    <a href="#" class="share-button">LinkedIn</a>
                    <a href="#" class="share-button">Copier</a>
                </div>
            </div>

            <div class="subsection" id="html">
                <h3 class="slide-up">HTML : Structure de Base</h3>
                <p class="slide-up">
                    HTML (HyperText Markup Language) est le langage qui structure le contenu du web. Il utilise des balises pour définir des éléments comme les titres, paragraphes, images, et liens, formant le squelette d'une page web.
                </p>
                <p class="slide-up">
                    Exemple de page HTML simple :
                </p>
                <pre class="slide-up"><code><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Page</title>
</head>
<body>
    <header>
        <h1>Bienvenue sur mon site</h1>
    </header>
    <main>
        <section>
            <p>Ceci est un paragraphe.</p>
            <a href="https://example.com">Visiter un site</a>
        </section>
    </main>
</body>
</html>
</code></pre>
            
                
                <div class="share-buttons slide-up">
                    <a href="#" class="share-button">Twitter</a>
                    <a href="#" class="share-button">LinkedIn</a>
                    <a href="#" class="share-button">Copier</a>
                </div>
            </div>

            <div class="subsection" id="css">
                <h3 class="slide-up">CSS : Stylisation et Mise en Page</h3>
                <p class="slide-up">
                    CSS (Cascading Style Sheets) permet de styliser les éléments HTML avec des couleurs, polices, et mises en page. Il est essentiel pour rendre un site visuellement attrayant et responsive.
                </p>
                <p class="slide-up">
                    Exemple de CSS pour une page :
                </p>
                <pre class="slide-up"><code>body {
    font-family: 'Inter', sans-serif;
    background-color: #1a1a1a;
    color: white;
}

header {
    background: rgba(0, 0, 0, 0.3);
    padding: 1rem;
    text-align: center;
}

h1 {
    color: #00aaff;
}
</code></pre>
                <p class="slide-up">
                    Concepts clés :
                    - **Sélecteurs** : Ciblent des éléments (ex. : `h1`, `.class`, `#id`).
                    - **Box Model** : Chaque élément est une boîte (marge, bordure, padding, contenu).
                    - **Flexbox et Grid** : Pour des mises en page modernes.
                    - **Media Queries** : Pour des designs responsives.
                </p>
                <p class="slide-up">
                    Exemple avec Flexbox :
                </p>
                <pre class="slide-up"><code>.container {
    display: flex;
    gap: 20px;
    justify-content: space-between;
    flex-wrap: wrap;
}

.item {
    flex: 1 1 300px;
    padding: 1rem;
    background: #00aaff;
    border-radius: 10px;
}
</code></pre>
                <p class="slide-up">
                    Exercice : Créez une mise en page responsive avec une barre de navigation et trois colonnes qui s'empilent sur mobile.
                </p>
                <div class="share-buttons slide-up">
                    <a href="#" class="share-button">Twitter</a>
                    <a href="#" class="share-button">LinkedIn</a>
                    <a href="#" class="share-button">Copier</a>
                </div>
            </div>

            <div class="subsection" id="javascript">
                <h3 class="slide-up">JavaScript : Interactivité</h3>
                <p class="slide-up">
                    JavaScript (JS) ajoute de l'interactivité aux sites web, comme des formulaires dynamiques, des animations, ou des appels API. C'est le moteur du front-end moderne.
                </p>
                <p class="slide-up">
                    Exemple : Ajouter un événement de clic :
                </p>
                <pre class="slide-up"><code>document.getElementById('myButton').addEventListener('click', () => {
    alert('Bouton cliqué !');
});
</code></pre>
                <p class="slide-up">
                    Concepts clés :
                    - **DOM** : Manipuler les éléments HTML (ex. : `document.querySelector`).
                    - **Événements** : Réagir aux actions utilisateur (clic, saisie).
                    - **Async/Await** : Gérer les appels API ou tâches asynchrones.
                </p>
                <p class="slide-up">
                    Exemple d'appel API avec Fetch :
                </p>
                <pre class="slide-up"><code>async function fetchData() {
    try {
        const response = await fetch('https://api.example.com/data');
        const data = await response.json();
        console.log(data);
    } catch (error) {
        console.error('Erreur:', error);
    }
}
fetchData();
</code></pre>
                <p class="slide-up">
                    Exercice : Créez un formulaire qui valide les entrées et affiche les données dans une alerte.
                </p>
                <div class="share-buttons slide-up">
                    <a href="#" class="share-button">Twitter</a>
                    <a href="#" class="share-button">LinkedIn</a>
                    <a href="#" class="share-button">Copier</a>
                </div>
            </div>

            <div class="subsection" id="react">
                <h3 class="slide-up">React : Construire des Interfaces Modernes</h3>
                <p class="slide-up">
                    React est une bibliothèque JavaScript pour créer des interfaces utilisateur dynamiques et réutilisables, basée sur des composants et la gestion d'état.
                </p>
                <p class="slide-up">
                    Exemple de composant React :
                </p>
                <pre class="slide-up"><code>import React, { useState } from 'react';

function Counter() {
    const [count, setCount] = useState(0);

    return (
        <div>
            <p>Compteur : {count}</p>
            <button onClick={() => setCount(count + 1)}>Incrémenter</button>
        </div>
    );
}

export default Counter;
</code></pre>
                <p class="slide-up">
                    Concepts clés :
                    - **Composants** : Blocs réutilisables pour construire l'interface.
                    - **JSX** : Syntaxe HTML-like pour définir l'UI.
                    - **Hooks** : `useState` pour l'état, `useEffect` pour les effets secondaires.
                </p>
                <p class="slide-up">
                    Exercice : Créez une Todo List avec React pour ajouter et supprimer des tâches.
                </p>
                <div class="share-buttons slide-up">
                    <a href="#" class="share-button">Twitter</a>
                    <a href="#" class="share-button">LinkedIn</a>
                    <a href="#" class="share-button">Copier</a>
                </div>
            </div>

            <div class="subsection" id="tools">
                <h3 class="slide-up">Outils et Bonnes Pratiques</h3>
                <p class="slide-up">
                    Les développeurs front-end utilisent des outils pour optimiser leur travail et maintenir un code de qualité :
                </p>
                <ul class="slide-up">
                    <li><strong>Git</strong> : Contrôle de version pour collaborer et gérer le code.</li>
                    <li><strong>VS Code</strong> : Éditeur avec extensions comme ESLint et Prettier.</li>
                    <li><strong>Chrome DevTools</strong> : Pour déboguer et optimiser.</li>
                    <li><strong>Figma</strong> : Pour travailler avec des maquettes de design.</li>
                </ul>
                <p class="slide-up">
                    Exemple de workflow Git :
                </p>
                <pre class="slide-up"><code>git init
git add .
git commit -m "Initial commit"
git push origin main
</code></pre>
                <p class="slide-up">
                    Bonnes pratiques :
                    - Utilisez un code sémantique et accessible.
                    - Optimisez les performances (minification, images compressées).
                    - Testez sur plusieurs navigateurs et appareils.
                </p>
                <p class="slide-up">
                    Exercice : Configurez un projet Git et poussez un site simple sur GitHub.
                </p>
                <div class="share-buttons slide-up">
                    <a href="#" class="share-button">Twitter</a>
                    <a href="#" class="share-button">LinkedIn</a>
                    <a href="#" class="share-button">Copier</a>
                </div>
            </div>

            <div class="subsection" id="conclusion">
                <h3 class="slide-up">Conclusion et Ressources</h3>
                <p class="slide-up">
                    Le développement front-end est un domaine passionnant qui allie créativité et technique pour créer des expériences utilisateur exceptionnelles. En maîtrisant HTML, CSS, JavaScript, et des outils comme React, vous pouvez construire des interfaces modernes et performantes.
                </p>
                <p class="slide-up">
                    Pour progresser :
                    - Créez un portfolio avec vos projets.
                    - Participez à des projets open-source sur GitHub.
                    - Suivez des blogs comme Smashing Magazine ou freeCodeCamp.
                </p>
                <div class="resources slide-up">
                    <h4>Ressources utiles :</h4>
                    <ul>
                        <li><a href="https://developer.mozilla.org/fr/" target="_blank">MDN Web Docs</a> : Documentation pour HTML, CSS, JS.</li>
                        <li><a href="https://reactjs.org/" target="_blank">React Official Documentation</a> : Guide pour React.</li>
                        <li><a href="https://www.freecodecamp.org/" target="_blank">freeCodeCamp</a> : Tutoriels et projets gratuits.</li>
                        <li><a href="https://css-tricks.com/" target="_blank">CSS-Tricks</a> : Articles sur CSS et front-end.</li>
                    </ul>
                </div>
                <p class="slide-up">
                    Exercice final : Construisez une application web (ex. : calculatrice ou Todo List) en combinant HTML, CSS, JavaScript, et React.
                </p>
                <div class="share-buttons slide-up">
                    <a href="#" class="share-button">Twitter</a>
                    <a href="#" class="share-button">LinkedIn</a>
                    <a href="#" class="share-button">Copier</a>
                </div>
            </div>
        </div>
    </section>
 <?php include(__DIR__."navbar/footer.php"); ?>
    <script>
        function toggleMobileMenu() {
            document.getElementById('mobileMenu').classList.toggle('active');
        }

        function closeMobileMenu() {
            document.getElementById('mobileMenu').classList.remove('active');
        }
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction aux Algorithmes</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --accent-color: #e74c3c;
            --background-color: #f4f6f9;
            --text-color: #2c3e50;
            --card-color: #ffffff;
            --code-bg: #f8f9fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--background-color);
        }

        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        nav {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .hero {
            text-align: center;
            padding: 3rem 0;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: white;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            color: rgba(255, 255, 255, 0.9);
        }

        .content {
            padding: 3rem 0;
        }

        .section {
            margin-bottom: 4rem;
        }

        h2 {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary-color);
        }

        h3 {
            font-size: 1.5rem;
            color: var(--secondary-color);
            margin: 1.5rem 0 1rem;
        }

        p {
            margin-bottom: 1rem;
        }

        .card {
            background-color: var(--card-color);
            border-radius: 8px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .card-icon {
            width: 40px;
            height: 40px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: white;
            font-weight: bold;
        }

        .example {
            background-color: var(--code-bg);
            padding: 1.5rem;
            border-radius: 6px;
            border-left: 4px solid var(--primary-color);
            margin: 1.5rem 0;
            font-family: monospace;
            overflow-x: auto;
        }

        .important {
            background-color: rgba(231, 76, 60, 0.1);
            border-left: 4px solid var(--accent-color);
            padding: 1rem;
            margin: 1.5rem 0;
            border-radius: 6px;
        }

        .grid {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            margin: 2rem 0;
        }

        .grid-item {
            flex: 1;
            min-width: 300px;
        }

        .advantages-list li, .application-list li {
            margin-bottom: 1rem;
            position: relative;
            padding-left: 1.5rem;
        }

        .advantages-list li:before, .application-list li:before {
            content: "→";
            color: var(--primary-color);
            position: absolute;
            left: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 2rem 0;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: var(--primary-color);
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .btn {
            display: inline-block;
            background-color: var(--primary-color);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s;
            margin-top: 1rem;
        }

        .btn:hover {
            background-color: var(--secondary-color);
        }

        footer {
            background-color: var(--text-color);
            color: white;
            padding: 2rem 0;
            text-align: center;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .footer-links {
            display: flex;
            list-style: none;
        }

        .footer-links li {
            margin-left: 1.5rem;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                text-align: center;
            }

            .nav-links {
                margin-top: 1rem;
                justify-content: center;
            }

            .nav-links li {
                margin: 0 1rem;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .footer-content {
                flex-direction: column;
            }

            .footer-links {
                margin-top: 1rem;
                justify-content: center;
            }

            .footer-links li {
                margin: 0 0.5rem;
            }
        }
    </style>
</head>
<body>
    <nav>
        <div class="container nav-container">
            <div class="logo">AlgoLearn</div>
            <ul class="nav-links">
                <li><a href="#definition">Définition</a></li>
                <li><a href="#principes">Principes</a></li>
                <li><a href="#types">Types</a></li>
                <li><a href="#complexite">Complexité</a></li>
                <li><a href="#applications">Applications</a></li>
            </ul>
        </div>
    </nav>
    <header>
        <div class="container">
            <div class="hero">
                <h1>Introduction aux Algorithmes</h1>
                <p>Découvrez les fondements de l'algorithmique et leur importance dans l'informatique moderne</p>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="container">
            <section id="definition" class="section">
                <h2>Qu'est-ce qu'un algorithme ?</h2>
                <div class="card">
                    <div class="card-title">
                        <div class="card-icon">1</div>
                        <h3>Définition et origines</h3>
                    </div>
                    <p>Un <strong>algorithme</strong> est une suite finie et non ambiguë d'opérations ou d'instructions permettant de résoudre un problème ou d'obtenir un résultat. Le terme "algorithme" vient du nom du mathématicien perse Al-Khwârizmî (780-850 ap. J.-C.), qui a contribué significativement aux fondements des mathématiques.</p>
                    
                    <div class="important">
                        <p>Un algorithme doit posséder les caractéristiques suivantes :</p>
                        <ul>
                            <li><strong>Finitude</strong> : doit se terminer après un nombre fini d'étapes</li>
                            <li><strong>Précision</strong> : chaque étape doit être définie précisément</li>
                            <li><strong>Déterminisme</strong> : pour une même entrée, il produit toujours la même sortie</li>
                            <li><strong>Effectivité</strong> : chaque étape doit être réalisable</li>
                        </ul>
                    </div>
                </div>

                <div class="card">
                    <div class="card-title">
                        <div class="card-icon">2</div>
                        <h3>Importance des algorithmes</h3>
                    </div>
                    <p>Les algorithmes sont au cœur de l'informatique et constituent la base de tout programme informatique. Ils permettent de :</p>
                    <ul class="advantages-list">
                        <li>Résoudre des problèmes complexes en les décomposant en étapes simples</li>
                        <li>Automatiser des tâches répétitives</li>
                        <li>Optimiser l'utilisation des ressources (temps, mémoire, etc.)</li>
                        <li>Traiter et analyser de grandes quantités de données</li>
                        <li>Établir des processus de décision cohérents et reproductibles</li>
                    </ul>
                </div>
            </section>

            <section id="principes" class="section">
                <h2>Principes fondamentaux de l'algorithmique</h2>
                
                <div class="grid">
                    <div class="grid-item card">
                        <h3>Structure séquentielle</h3>
                        <p>Les instructions sont exécutées les unes après les autres, dans l'ordre où elles apparaissent.</p>
                        <div class="example">
                            1. Entrer le rayon r<br>
                            2. Calculer l'aire : A = π × r²<br>
                            3. Afficher l'aire A
                        </div>
                    </div>
                    
                    <div class="grid-item card">
                        <h3>Structure conditionnelle</h3>
                        <p>Permet d'exécuter différentes instructions selon qu'une condition est vraie ou fausse.</p>
                        <div class="example">
                            1. Si âge >= 18 alors<br>
                            2. &nbsp;&nbsp;&nbsp;&nbsp;Afficher "Majeur"<br>
                            3. Sinon<br>
                            4. &nbsp;&nbsp;&nbsp;&nbsp;Afficher "Mineur"<br>
                            5. Fin Si
                        </div>
                    </div>
                </div>

                <div class="grid">
                    <div class="grid-item card">
                        <h3>Structure itérative (boucles)</h3>
                        <p>Permet de répéter un bloc d'instructions tant qu'une condition est vérifiée ou un nombre défini de fois.</p>
                        <div class="example">
                            1. Pour i allant de 1 à 5<br>
                            2. &nbsp;&nbsp;&nbsp;&nbsp;Afficher i<br>
                            3. Fin Pour<br><br>
                            // Affichera : 1 2 3 4 5
                        </div>
                    </div>
                    
                    <div class="grid-item card">
                        <h3>Modularité</h3>
                        <p>Consiste à diviser un algorithme en sous-programmes ou fonctions réutilisables qui accomplissent des tâches spécifiques.</p>
                        <div class="example">
                            Fonction calculAire(rayon)<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;Retourner π × rayon²<br>
                            Fin Fonction<br><br>
                            Programme principal<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;r ← 5<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;aire ← calculAire(r)<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;Afficher aire<br>
                            Fin Programme
                        </div>
                    </div>
                </div>
            </section>

            <section id="types" class="section">
                <h2>Types d'algorithmes</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Exemples</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Algorithmes de tri</td>
                            <td>Organisent les éléments d'une collection selon un ordre défini</td>
                            <td>Tri à bulles, tri fusion, tri rapide</td>
                        </tr>
                        <tr>
                            <td>Algorithmes de recherche</td>
                            <td>Trouvent un élément spécifique dans une collection</td>
                            <td>Recherche linéaire, recherche binaire</td>
                        </tr>
                        <tr>
                            <td>Algorithmes récursifs</td>
                            <td>Se définissent et s'appellent eux-mêmes</td>
                            <td>Factorielle, tours de Hanoï, Fibonacci</td>
                        </tr>
                        <tr>
                            <td>Algorithmes gloutons</td>
                            <td>Font le choix optimal local à chaque étape</td>
                            <td>Algorithme de Dijkstra, codage de Huffman</td>
                        </tr>
                        <tr>
                            <td>Algorithmes de diviser pour régner</td>
                            <td>Divisent le problème en sous-problèmes plus petits</td>
                            <td>Tri fusion, recherche binaire</td>
                        </tr>
                        <tr>
                            <td>Algorithmes dynamiques</td>
                            <td>Résolvent des problèmes en stockant les résultats intermédiaires</td>
                            <td>Suite de Fibonacci, plus court chemin</td>
                        </tr>
                    </tbody>
                </table>

                <div class="card">
                    <h3>Focus : Algorithmes de tri</h3>
                    <p>Les algorithmes de tri sont parmi les plus fondamentaux en informatique. Ils illustrent bien les différentes approches algorithmiques et les compromis entre simplicité et efficacité.</p>
                    
                    <div class="example">
                        <strong>Tri à bulles (simple mais inefficace) :</strong><br><br>
                        Pour i allant de 0 à n-2<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;Pour j allant de 0 à n-i-2<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Si tableau[j] > tableau[j+1] alors<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Échanger tableau[j] et tableau[j+1]<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fin Si<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;Fin Pour<br>
                        Fin Pour
                    </div>
                </div>
            </section>

            <section id="complexite" class="section">
                <h2>Complexité algorithmique</h2>
                
                <div class="card">
                    <p>La <strong>complexité algorithmique</strong> mesure l'efficacité d'un algorithme en termes de ressources utilisées (temps et espace). Elle est généralement exprimée à l'aide de la notation Big O, qui décrit le comportement asymptotique d'une fonction.</p>
                    
                    <h3>Complexité temporelle</h3>
                    <p>La complexité temporelle mesure le temps d'exécution d'un algorithme en fonction de la taille des données d'entrée.</p>
                    
                    <div class="grid">
                        <div class="grid-item">
                            <h4>Ordres de complexité courants</h4>
                            <ul>
                                <li><strong>O(1)</strong> - Constant : temps d'exécution indépendant de la taille des données</li>
                                <li><strong>O(log n)</strong> - Logarithmique : très efficace (ex: recherche binaire)</li>
                                <li><strong>O(n)</strong> - Linéaire : le temps croît proportionnellement à la taille des données</li>
                                <li><strong>O(n log n)</strong> - Quasi-linéaire : très bon pour les algorithmes de tri efficaces</li>
                                <li><strong>O(n²)</strong> - Quadratique : acceptable pour petites données (ex: tri à bulles)</li>
                                <li><strong>O(2^n)</strong> - Exponentiel : inefficace pour grandes données</li>
                            </ul>
                        </div>
                        
                        <div class="grid-item">
                            <div class="example">
                                <strong>Comparaison des complexités pour n=1000 :</strong><br><br>
                                O(1) : 1 opération<br>
                                O(log n) : ~10 opérations<br>
                                O(n) : 1 000 opérations<br>
                                O(n log n) : ~10 000 opérations<br>
                                O(n²) : 1 000 000 opérations<br>
                                O(2^n) : nombre astronomique d'opérations
                            </div>
                        </div>
                    </div>
                    
                    <h3>Complexité spatiale</h3>
                    <p>La complexité spatiale mesure la quantité de mémoire nécessaire à l'exécution d'un algorithme en fonction de la taille des données d'entrée.</p>
                </div>
            </section>

            <section id="applications" class="section">
                <h2>Applications des algorithmes</h2>
                
                <div class="grid">
                    <div class="grid-item card">
                        <h3>Intelligence artificielle</h3>
                        <p>Les algorithmes sont au cœur des systèmes d'IA, du machine learning et du deep learning. Ils permettent d'analyser des données, de reconnaître des motifs et de prendre des décisions automatisées.</p>
                        <div class="example">
                            Exemples : algorithmes de classification, réseaux de neurones, algorithmes génétiques
                        </div>
                    </div>
                    
                    <div class="grid-item card">
                        <h3>Science des données</h3>
                        <p>Les algorithmes permettent d'extraire des connaissances à partir de grandes quantités de données, de détecter des tendances et de faire des prédictions.</p>
                        <div class="example">
                            Exemples : k-means clustering, random forest, régression linéaire
                        </div>
                    </div>
                </div>

                <div class="grid">
                    <div class="grid-item card">
                        <h3>Cryptographie</h3>
                        <p>Les algorithmes sont utilisés pour sécuriser les communications, protéger les données et vérifier l'authenticité des informations.</p>
                        <div class="example">
                            Exemples : RSA, AES, SHA-256
                        </div>
                    </div>
                    
                    <div class="grid-item card">
                        <h3>Optimisation</h3>
                        <p>Les algorithmes d'optimisation permettent de trouver la meilleure solution parmi un ensemble de possibilités, en maximisant ou minimisant certaines valeurs.</p>
                        <div class="example">
                            Exemples : algorithmes génétiques, recuit simulé, programmation linéaire
                        </div>
                    </div>
                </div>

                <div class="important">
                    <h3>Applications quotidiennes</h3>
                    <p>Les algorithmes sont omniprésents dans notre vie quotidienne :</p>
                    <ul class="application-list">
                        <li>Recherche sur Internet (PageRank de Google)</li>
                        <li>Recommandations sur les plateformes de streaming</li>
                        <li>Navigation GPS et calcul d'itinéraires</li>
                        <li>Compression de données (images, vidéos, audio)</li>
                        <li>Filtres anti-spam dans les emails</li>
                        <li>Réseaux sociaux (flux d'actualités personnalisés)</li>
                    </ul>
                </div>
            </section>

            <section class="section">
                <h2>Conclusion et perspectives</h2>
                <div class="card">
                    <p>Les algorithmes constituent la pierre angulaire de l'informatique moderne. Leur compréhension est essentielle pour tout développeur ou professionnel du numérique. Avec l'avènement du big data et de l'intelligence artificielle, leur importance ne cesse de croître.</p>
                    
                    <p>L'étude des algorithmes permet de développer une pensée logique et structurée qui s'applique bien au-delà de la programmation informatique. Les compétences algorithmiques sont recherchées dans de nombreux domaines, de la finance à la médecine, en passant par les transports et l'énergie.</p>
                    
                    <p>Pour approfondir vos connaissances en algorithmique, n'hésitez pas à explorer les ressources complémentaires et à mettre en pratique ces concepts à travers des exercices et projets concrets.</p>
                    
                    <a href="AlgoCoursSuite.html" class="btn">Passer à la prochaine leçon →</a>
                </div>
            </section>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="footer-content">
                <p>© 2025 AlgoLearn - Tous droits réservés</p>
                <ul class="footer-links">
                    <li><a href="#">À propos</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Mentions légales</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>
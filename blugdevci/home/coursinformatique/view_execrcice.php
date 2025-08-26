<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aperçu - Tableaux et méthodes de manipulation - DevCommunity</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #ffffff;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #888;
            margin-bottom: 2rem;
            padding: 0.5rem 1rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 8px;
            border-left: 3px solid #00ff88;
        }

        .breadcrumb a {
            color: #00d4ff;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: #00ff88;
        }

        .exercise-header {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 16px;
            padding: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            margin-bottom: 2rem;
            position: relative;
        }

        .exercise-number {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .exercise-title {
            color: #00ff88;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .exercise-subtitle {
            color: #b0b0b0;
            font-size: 1.1rem;
            line-height: 1.5;
            margin-bottom: 1.5rem;
        }

        .exercise-tags {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .tag {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .tag-difficulty-intermediate {
            background: rgba(255, 193, 7, 0.2);
            color: #ffc107;
            border: 1px solid rgba(255, 193, 7, 0.3);
        }

        .tag-topic {
            background: rgba(0, 212, 255, 0.2);
            color: #00d4ff;
            border: 1px solid rgba(0, 212, 255, 0.3);
        }

        .exercise-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .stat-item {
            text-align: center;
            padding: 1rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 8px;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .stat-value {
            color: #00d4ff;
            font-size: 1.3rem;
            font-weight: 600;
            display: block;
            margin-bottom: 0.3rem;
        }

        .stat-label {
            color: #888;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .content-section {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
            margin-bottom: 2rem;
        }

        .section-title {
            color: #00ff88;
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-content {
            color: #b0b0b0;
            line-height: 1.6;
        }

        .section-content p {
            margin-bottom: 1rem;
        }

        .section-content ul {
            margin-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .section-content li {
            margin-bottom: 0.5rem;
        }

        .code-block {
            background: #0f0f0f;
            border: 1px solid rgba(0, 255, 136, 0.2);
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1rem 0;
            overflow-x: auto;
            position: relative;
        }

        .code-block::before {
            content: 'JavaScript';
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            background: rgba(0, 255, 136, 0.2);
            color: #00ff88;
            padding: 0.2rem 0.6rem;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .code-block code {
            color: #00d4ff;
            font-family: 'Courier New', monospace;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .highlight-box {
            background: rgba(0, 255, 136, 0.1);
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 8px;
            padding: 1rem;
            margin: 1rem 0;
        }

        .highlight-box.warning {
            background: rgba(255, 193, 7, 0.1);
            border-color: rgba(255, 193, 7, 0.3);
        }

        .highlight-box.info {
            background: rgba(0, 212, 255, 0.1);
            border-color: rgba(0, 212, 255, 0.3);
        }

        .objectives-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .objective-item {
            background: rgba(0, 255, 136, 0.05);
            padding: 1rem;
            border-radius: 8px;
            border-left: 3px solid #00ff88;
        }

        .objective-title {
            color: #ffffff;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .objective-desc {
            color: #888;
            font-size: 0.9rem;
        }

        .requirements-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .requirement-item {
            background: rgba(0, 212, 255, 0.05);
            padding: 1rem;
            border-radius: 8px;
            border: 1px solid rgba(0, 212, 255, 0.2);
            text-align: center;
        }

        .requirement-icon {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            display: block;
        }

        .requirement-text {
            color: #b0b0b0;
            font-size: 0.9rem;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 3rem;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000000;
            border: none;
            padding: 1rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1rem;
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
        }

        .btn-primary:hover {
            box-shadow: 0 6px 20px rgba(0, 255, 136, 0.4);
        }

        .btn-secondary {
            background: rgba(0, 255, 136, 0.1);
            color: #00ff88;
            border: 1px solid rgba(0, 255, 136, 0.3);
            padding: 1rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1rem;
        }

        .btn-secondary:hover {
            background: rgba(0, 255, 136, 0.2);
            border-color: rgba(0, 255, 136, 0.5);
        }

        .examples-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 1rem;
        }

        .example-box {
            background: #0f0f0f;
            border: 1px solid rgba(0, 255, 136, 0.2);
            border-radius: 8px;
            padding: 1rem;
        }

        .example-title {
            color: #00ff88;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .example-code {
            color: #00d4ff;
            font-family: 'Courier New', monospace;
            font-size: 0.8rem;
            line-height: 1.4;
        }

        .progress-bar {
            background: rgba(0, 255, 136, 0.1);
            border-radius: 20px;
            height: 8px;
            margin: 1rem 0;
            overflow: hidden;
        }

        .progress-fill {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            height: 100%;
            border-radius: 20px;
            width: 0%;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .exercise-header {
                padding: 1.5rem;
            }

            .exercise-number {
                position: static;
                display: inline-block;
                margin-bottom: 1rem;
            }

            .exercise-title {
                font-size: 1.5rem;
            }

            .content-section {
                padding: 1.5rem;
            }

            .examples-container {
                grid-template-columns: 1fr;
            }

            .exercise-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-primary, .btn-secondary {
                width: 100%;
                justify-content: center;
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="breadcrumb">
            <a href="#">Accueil</a> > 
            <a href="#">Exercices</a> > 
            <a href="#">JavaScript</a> > 
            <span>Aperçu</span>
        </div>

        <div class="exercise-header">
            <div class="exercise-number">#003</div>
            <h1 class="exercise-title">Tableaux et méthodes de manipulation</h1>
            <p class="exercise-subtitle">
                Explorez les tableaux JavaScript et leurs méthodes essentielles pour maîtriser la manipulation de données.
            </p>
            
            <div class="exercise-tags">
                <span class="tag tag-difficulty-intermediate">Intermédiaire</span>
                <span class="tag tag-topic">Arrays</span>
                <span class="tag tag-topic">Méthodes</span>
                <span class="tag tag-topic">ES6</span>
            </div>

            <div class="exercise-stats">
                <div class="stat-item">
                    <span class="stat-value">30 min</span>
                    <span class="stat-label">Durée estimée</span>
                </div>
                <div class="stat-item">
                    <span class="stat-value">12 pts</span>
                    <span class="stat-label">Points</span>
                </div>
                <div class="stat-item">
                    <span class="stat-value">5/10</span>
                    <span class="stat-label">Difficulté</span>
                </div>
                <div class="stat-item">
                    <span class="stat-value">✓</span>
                    <span class="stat-label">Corrigé</span>
                </div>
            </div>
        </div>

        <div class="content-section">
            <h2 class="section-title">📝 Description de l'exercice</h2>
            <div class="section-content">
                <p>
                    Cet exercice vous permettra de maîtriser les tableaux JavaScript et leurs méthodes de manipulation les plus importantes. 
                    Vous apprendrez à utiliser les méthodes fonctionnelles modernes pour transformer, filtrer et analyser des données.
                </p>
                <p>
                    Au travers de plusieurs défis pratiques, vous découvrirez comment utiliser efficacement 
                    <strong>map()</strong>, <strong>filter()</strong>, <strong>reduce()</strong>, <strong>forEach()</strong> 
                    et d'autres méthodes essentielles pour le développement moderne en JavaScript.
                </p>
                
                <div class="highlight-box info">
                    <strong>Note importante :</strong> Cet exercice se concentre sur les méthodes fonctionnelles introduites en ES5/ES6. 
                    Une bonne compréhension des fonctions et des callbacks est recommandée.
                </div>
            </div>
        </div>

        <div class="content-section">
            <h2 class="section-title">🎯 Objectifs pédagogiques</h2>
            <div class="objectives-grid">
                <div class="objective-item">
                    <div class="objective-title">Maîtriser map()</div>
                    <div class="objective-desc">Transformer les éléments d'un tableau en créant un nouveau tableau</div>
                </div>
                <div class="objective-item">
                    <div class="objective-title">Utiliser filter()</div>
                    <div class="objective-desc">Filtrer les éléments selon des critères spécifiques</div>
                </div>
                <div class="objective-item">
                    <div class="objective-title">Comprendre reduce()</div>
                    <div class="objective-desc">Réduire un tableau à une seule valeur avec un accumulateur</div>
                </div>
                <div class="objective-item">
                    <div class="objective-title">Chaîner les méthodes</div>
                    <div class="objective-desc">Combiner plusieurs méthodes pour des transformations complexes</div>
                </div>
            </div>
        </div>

        <div class="content-section">
            <h2 class="section-title">📋 Prérequis</h2>
            <div class="requirements-list">
                <div class="requirement-item">
                    <span class="requirement-icon">🔢</span>
                    <div class="requirement-text">Bases des tableaux JavaScript</div>
                </div>
                <div class="requirement-item">
                    <span class="requirement-icon">⚡</span>
                    <div class="requirement-text">Fonctions et callbacks</div>
                </div>
                <div class="requirement-item">
                    <span class="requirement-icon">🔄</span>
                    <div class="requirement-text">Boucles for et while</div>
                </div>
                <div class="requirement-item">
                    <span class="requirement-icon">📦</span>
                    <div class="requirement-text">Variables et opérateurs</div>
                </div>
            </div>
        </div>

        <div class="content-section">
            <h2 class="section-title">💡 Exemple de code de départ</h2>
            <div class="section-content">
                <p>Voici un exemple du type de problèmes que vous devrez résoudre :</p>
                
                <div class="code-block">
                    <code>// Données d'exemple
const products = [
    { name: "Laptop", price: 999, category: "Electronics", inStock: true },
    { name: "Phone", price: 699, category: "Electronics", inStock: false },
    { name: "Book", price: 15, category: "Education", inStock: true },
    { name: "Headphones", price: 199, category: "Electronics", inStock: true }
];

// TODO: Implémenter les fonctions suivantes
// 1. Obtenir tous les produits en stock
// 2. Calculer le prix total des produits électroniques
// 3. Créer un tableau des noms de produits en majuscules</code>
                </div>

                <div class="examples-container">
                    <div class="example-box">
                        <div class="example-title">Résultat attendu (exercice 1)</div>
                        <div class="example-code">
[
  { name: "Laptop", price: 999, ... },
  { name: "Book", price: 15, ... },
  { name: "Headphones", price: 199, ... }
]
                        </div>
                    </div>
                    <div class="example-box">
                        <div class="example-title">Résultat attendu (exercice 3)</div>
                        <div class="example-code">
[
  "LAPTOP",
  "PHONE", 
  "BOOK",
  "HEADPHONES"
]
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-section">
            <h2 class="section-title">✅ Critères d'évaluation</h2>
            <div class="section-content">
                <ul>
                    <li><strong>Syntaxe correcte :</strong> Utilisation appropriée des méthodes de tableaux</li>
                    <li><strong>Efficacité :</strong> Choix de la méthode la plus adaptée à chaque problème</li>
                    <li><strong>Lisibilité :</strong> Code clair et bien structuré</li>
                    <li><strong>Fonctionnalité :</strong> Tous les tests doivent passer avec succès</li>
                    <li><strong>Bonnes pratiques :</strong> Respect des conventions JavaScript modernes</li>
                </ul>

                <div class="highlight-box warning">
                    <strong>Attention :</strong> Évitez d'utiliser des boucles for classiques là où les méthodes de tableaux seraient plus appropriées. 
                    L'objectif est de maîtriser l'approche fonctionnelle.
                </div>
            </div>
        </div>

        <div class="content-section">
            <h2 class="section-title">📚 Ressources utiles</h2>
            <div class="section-content">
                <ul>
                    <li><a href="#" style="color: #00d4ff;">Documentation MDN - Array.prototype.map()</a></li>
                    <li><a href="#" style="color: #00d4ff;">Documentation MDN - Array.prototype.filter()</a></li>
                    <li><a href="#" style="color: #00d4ff;">Documentation MDN - Array.prototype.reduce()</a></li>
                    <li><a href="#" style="color: #00d4ff;">Guide des méthodes de tableaux JavaScript</a></li>
                </ul>
            </div>
        </div>

        <div class="action-buttons">
            <a href="#" class="btn-primary">
                <span>▶️</span>
                <span>Commencer l'exercice</span>
            </a>
            <a href="#" class="btn-secondary">
                <span>📄</span>
                <span>Retour à la liste</span>
            </a>
            <a href="#" class="btn-secondary">
                <span>💾</span>
                <span>Sauvegarder</span>
            </a>
        </div>
    </div>

    <script>
        // Animation de la barre de progression au chargement
        document.addEventListener('DOMContentLoaded', function() {
            const progressBar = document.querySelector('.progress-fill');
            if (progressBar) {
                setTimeout(() => {
                    progressBar.style.width = '60%';
                }, 500);
            }
        });

        // Gestion des boutons d'action
        document.querySelectorAll('.btn-primary, .btn-secondary').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (this.getAttribute('href') === '#') {
                    e.preventDefault();
                    const action = this.textContent.trim();
                    console.log(`Action: ${action}`);
                    
                    if (action.includes('Commencer')) {
                        alert('Redirection vers l\'interface d\'exercice...');
                    } else if (action.includes('Retour')) {
                        alert('Retour à la liste des exercices...');
                    } else if (action.includes('Sauvegarder')) {
                        alert('Exercice ajouté aux favoris !');
                    }
                }
            });
        });

        // Effet de scroll smooth pour les ancres internes
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
    </script>
</body>
</html>
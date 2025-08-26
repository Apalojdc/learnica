<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formation React</title>
    <style>
        body {
            font-family: system-ui, -apple-system, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #20232a;
            color: #61dafb;
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #e1e1e1;
            border-radius: 6px;
        }
        .module {
            background-color: #f8f9fa;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .module h3 {
            margin-top: 0;
            color: #20232a;
        }
        .btn {
            background-color: #61dafb;
            color: #20232a;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
        }
        .btn:hover {
            background-color: #4fa8c9;
        }
        .code-example {
            background-color: #20232a;
            color: #61dafb;
            padding: 15px;
            border-radius: 4px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Formation React</h1>
            <p>Apprenez React depuis les bases jusqu'aux concepts avancés</p>
        </header>

        <section class="section">
            <h2>Programme de la formation</h2>
            
            <div class="module">
                <h3>Module 1: Introduction à React</h3>
                <ul>
                    <li>Qu'est-ce que React ?</li>
                    <li>Configuration de l'environnement de développement</li>
                    <li>Premier composant React</li>
                </ul>
                <a href="introductionReact.php" class="btn">Commencer le module</a>
            </div>

            <div class="module">
                <h3>Module 2: Les Composants</h3>
                <ul>
                    <li>Composants fonctionnels</li>
                    <li>Props et État (State)</li>
                    <li>Cycle de vie des composants</li>
                </ul>
                <a href="Module2.php" class="btn">Commencer le module</a>
            </div>

            <div class="module">
                <h3>Module 3: Les Hooks</h3>
                <ul>
                    <li>useState et useEffect</li>
                    <li>Hooks personnalisés</li>
                    <li>Gestion des effets secondaires</li>
                </ul>
                <a href="#" class="btn">Commencer le module</a>
            </div>
        </section>

        <section class="section">
            <h2>Exemple de code</h2>
            <div class="code-example">
                <pre>
function MonComposant() {
    const [count, setCount] = useState(0);

    return (
        <div>
            <h1>Compteur: {count}</h1>
            <button onClick={() => setCount(count + 1)}>
                Incrémenter
            </button>
        </div>
    );
}</pre>
            </div>
        </section>

        <section class="section">
            <h2>Ressources supplémentaires</h2>
            <ul>
                <li>Documentation officielle React</li>
                <li>Exercices pratiques</li>
                <li>Projets guidés</li>
            </ul>
            <a href="#" class="btn">Accéder aux ressources</a>
        </section>
    </div>
</body>
</html>
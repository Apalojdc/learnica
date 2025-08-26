<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Présentation du Développement Back-End</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .description {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .description p {
            line-height: 1.6;
        }

        .languages {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .language-card {
            background: #fff;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .language-card:hover {
            transform: scale(1.05);
        }

        .language-card img {
            max-width: 80px;
            margin-bottom: 10px;
        }

        .language-card h3 {
            margin: 10px 0;
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Qu'est-ce que le Développement Back-End ?</h1>
        <div class="description">
            <p>
                Le développement <strong>back-end</strong> se concentre sur la partie "invisible" d'une application web ou mobile, 
                notamment le serveur, les bases de données et la logique métier. C'est grâce au back-end que les utilisateurs 
                peuvent interagir avec une application de manière fluide et sécurisée. Il gère les requêtes, traite les données 
                et s'assure que tout fonctionne correctement en arrière-plan.
            </p>
        </div>

        <h2>Langages de Programmation Back-End Populaires</h2>
        <div class="languages">
            <div class="language-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/66/JavaScript-logo.png" alt="JavaScript">
                <h3>JavaScript (Node.js)</h3>
                <p>Utilisé avec Node.js pour créer des applications côté serveur.</p>
            </div>
            <div class="language-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/8/88/Python_logo_and_wordmark.svg" alt="Python">
                <h3>Python</h3>
                <p>Connu pour sa simplicité, utilisé avec des frameworks comme Django ou Flask.</p>
            </div>
            <div class="language-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg" alt="PHP">
                <h3>PHP</h3>
                <p>Souvent utilisé pour les sites web dynamiques et avec WordPress.</p>
            </div>
            <div class="language-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/c/c3/Java_logo.svg" alt="Java">
                <h3>Java</h3>
                <p>Utilisé pour les applications d'entreprise avec des frameworks comme Spring.</p>
            </div>
            <div class="language-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/1/18/C_Programming_Language.svg" alt="C#">
                <h3>C#</h3>
                <p>Utilisé pour le développement web avec ASP.NET.</p>
            </div>
            <div class="language-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" alt="Laravel">
                <h3>Laravel</h3>
                <p>Un framework PHP puissant et facile à utiliser.</p>
            </div>
        </div>
    </div>
</body>
</html>

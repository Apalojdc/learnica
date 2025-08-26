<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Erreur 404 - Page non trouvée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .error-container {
            text-align: center;
            padding: 30px;
            border-radius: 12px;
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
        }

        .error-code {
            font-size: 96px;
            font-weight: bold;
            color: #dc3545;
        }

        .error-message {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .btn-home {
            padding: 10px 25px;
            font-size: 18px;
            border-radius: 50px;
            border: 1px solid skyblue;
        }
        .btn-home:hover {
            border-bottom: 2px solid red;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">😥404</div>
        <div class="error-message">Oups ! La page que vous cherchez est introuvable.</div>
        <p class="text-muted">Elle a peut-être été supprimée, déplacée ou n’a jamais existé.</p>
        <a href="/monblug/backup" class="btn btn-home mt-4">
            🔙 Accueil
        </a>
    </div>
</body>
</html>
